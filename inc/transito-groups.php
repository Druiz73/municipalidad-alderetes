<?php
/**
 * Grupos dinámicos de Tránsito.
 *
 * La página de Tránsito mostraba 3 grupos fijos (group1..3 + req1..11).
 * Como cambian todo el tiempo, los grupos y sus tarjetas ahora se editan
 * en la caja "Grupos de Tránsito" del editor de la página, con botones
 * para agregar, eliminar y reordenar.
 *
 * Compatibilidad: si la página nunca guardó grupos dinámicos, se usan los
 * campos históricos de ACF (con sus valores editados o los predeterminados).
 * En la primera edición, el formulario se precarga con ese contenido para
 * no perder nada.
 *
 * @package TailPress
 */

defined('ABSPATH') || exit;

const TP_TRANSITO_GROUPS_META = 'transito_groups';
const TP_TRANSITO_SLUG = 'transito';
const TP_TRANSITO_TEMPLATE = 'page-tramites-transito.php';

/**
 * ID de la página de Tránsito, o null si no existe.
 */
function tp_transito_groups_post_id(): ?int
{
    $page = get_page_by_path(TP_TRANSITO_SLUG, OBJECT, 'page');

    return $page ? (int) $page->ID : null;
}

/**
 * ¿Es esta la página de Tránsito? (por slug o por plantilla asignada).
 */
function tp_transito_is_groups_page(int $post_id): bool
{
    if (get_post_field('post_name', $post_id) === TP_TRANSITO_SLUG) {
        return true;
    }

    return get_page_template_slug($post_id) === TP_TRANSITO_TEMPLATE;
}

/**
 * Reconstruye los grupos desde los campos históricos (ACF o defaults).
 *
 * @return array<int, array{grupo:string, items:array<int, array{titulo:string, reqs:string[]}>}>
 */
function tp_transito_legacy_groups(?int $post_id = null): array
{
    $slug = TP_TRANSITO_SLUG;
    if (!$post_id) {
        $post_id = tp_transito_groups_post_id();
    }

    $card = static function (int $n) use ($slug, $post_id): array {
        return [
            'titulo' => (string) tp_content('req' . $n . '_title', $slug, $post_id),
            'reqs'   => tp_content_lines('req' . $n . '_items', $slug, $post_id),
        ];
    };

    return [
        [
            'grupo' => (string) tp_content('group1_heading', $slug, $post_id),
            'items' => [$card(1), $card(2), $card(3), $card(4)],
        ],
        [
            'grupo' => (string) tp_content('group2_heading', $slug, $post_id),
            'items' => [$card(5), $card(6), $card(7)],
        ],
        [
            'grupo' => (string) tp_content('group3_heading', $slug, $post_id),
            'items' => [$card(8), $card(9), $card(10), $card(11)],
        ],
    ];
}

/**
 * Normaliza grupos (guardados o históricos) a la forma que usa la plantilla.
 * Acepta tarjetas con 'tarjetas'/'items' y requisitos como string o lista.
 * Elimina grupos y tarjetas totalmente vacíos.
 *
 * @param mixed $raw
 * @return array<int, array{grupo:string, items:array<int, array{titulo:string, reqs:string[]}>}>
 */
function tp_transito_normalize_groups($raw): array
{
    if (!is_array($raw)) {
        return [];
    }

    $out = [];
    foreach ($raw as $group) {
        if (!is_array($group)) {
            continue;
        }
        $titulo = trim((string) ($group['titulo'] ?? $group['grupo'] ?? ''));
        $tarjetas = $group['tarjetas'] ?? $group['items'] ?? [];
        if (!is_array($tarjetas)) {
            $tarjetas = [];
        }

        $items = [];
        foreach ($tarjetas as $card) {
            if (!is_array($card)) {
                continue;
            }
            $card_title = trim((string) ($card['titulo'] ?? ''));
            $req = $card['requisitos'] ?? $card['reqs'] ?? '';
            $lines = is_array($req) ? $req : preg_split('/\r\n|\r|\n/', (string) $req);
            $lines = array_values(array_filter(
                array_map('trim', (array) $lines),
                static fn($line) => $line !== ''
            ));
            if ($card_title === '' && $lines === []) {
                continue;
            }
            $items[] = ['titulo' => $card_title, 'reqs' => $lines];
        }

        if ($titulo === '' && $items === []) {
            continue;
        }
        $out[] = ['grupo' => $titulo, 'items' => $items];
    }

    return $out;
}

/**
 * Grupos a mostrar en la portada: dinámicos si existen, históricos si no.
 *
 * @return array<int, array{grupo:string, items:array<int, array{titulo:string, reqs:string[]}>}>
 */
function tp_transito_groups(?int $post_id = null): array
{
    if (!$post_id) {
        $post_id = tp_transito_groups_post_id();
    }

    if ($post_id && metadata_exists('post', $post_id, TP_TRANSITO_GROUPS_META)) {
        return tp_transito_normalize_groups(get_post_meta($post_id, TP_TRANSITO_GROUPS_META, true));
    }

    return tp_transito_normalize_groups(tp_transito_legacy_groups($post_id));
}

/**
 * Grupos en forma editable (requisitos como texto con saltos de línea).
 * Si nunca se guardó nada dinámico, precarga desde el contenido histórico.
 *
 * @return array<int, array{titulo:string, tarjetas:array<int, array{titulo:string, requisitos:string}>}>
 */
function tp_transito_editable_groups(int $post_id): array
{
    if (metadata_exists('post', $post_id, TP_TRANSITO_GROUPS_META)) {
        $saved = get_post_meta($post_id, TP_TRANSITO_GROUPS_META, true);
        $editable = [];
        foreach ((array) $saved as $group) {
            if (!is_array($group)) {
                continue;
            }
            $tarjetas = [];
            foreach ((array) ($group['tarjetas'] ?? []) as $card) {
                if (!is_array($card)) {
                    continue;
                }
                $req = $card['requisitos'] ?? '';
                $tarjetas[] = [
                    'titulo'     => (string) ($card['titulo'] ?? ''),
                    'requisitos' => is_array($req) ? implode("\n", $req) : (string) $req,
                ];
            }
            $editable[] = [
                'titulo'   => (string) ($group['titulo'] ?? $group['grupo'] ?? ''),
                'tarjetas' => $tarjetas,
            ];
        }

        return $editable;
    }

    $editable = [];
    foreach (tp_transito_legacy_groups($post_id) as $group) {
        $tarjetas = [];
        foreach ($group['items'] as $card) {
            $tarjetas[] = [
                'titulo'     => $card['titulo'],
                'requisitos' => implode("\n", $card['reqs']),
            ];
        }
        $editable[] = ['titulo' => $group['grupo'], 'tarjetas' => $tarjetas];
    }

    return $editable;
}

/**
 * Sanitiza lo recibido del formulario. Descarta grupos/tarjetas vacíos.
 *
 * @param mixed $raw
 * @return array<int, array{titulo:string, tarjetas:array<int, array{titulo:string, requisitos:string}>}>
 */
function tp_transito_sanitize_groups($raw): array
{
    if (!is_array($raw)) {
        return [];
    }

    $groups = [];
    foreach ($raw as $group) {
        if (!is_array($group)) {
            continue;
        }
        $titulo = isset($group['titulo']) ? sanitize_text_field((string) $group['titulo']) : '';
        $tarjetas_raw = (isset($group['tarjetas']) && is_array($group['tarjetas'])) ? $group['tarjetas'] : [];

        $tarjetas = [];
        foreach ($tarjetas_raw as $card) {
            if (!is_array($card)) {
                continue;
            }
            $card_title = isset($card['titulo']) ? sanitize_text_field((string) $card['titulo']) : '';
            $req = isset($card['requisitos']) ? sanitize_textarea_field((string) $card['requisitos']) : '';
            $req = trim((string) preg_replace("/\r\n|\r/", "\n", $req));
            if ($card_title === '' && $req === '') {
                continue;
            }
            $tarjetas[] = ['titulo' => $card_title, 'requisitos' => $req];
            if (count($tarjetas) >= 20) {
                break;
            }
        }

        if ($titulo === '' && $tarjetas === []) {
            continue;
        }
        $groups[] = ['titulo' => $titulo, 'tarjetas' => $tarjetas];
        if (count($groups) >= 20) {
            break;
        }
    }

    return $groups;
}

/**
 * Registra la caja solo en el editor de la página de Tránsito.
 */
add_action('add_meta_boxes_page', static function ($post): void {
    if (!$post instanceof WP_Post || !tp_transito_is_groups_page((int) $post->ID)) {
        return;
    }
    add_meta_box(
        'tp_transito_groups',
        'Grupos de Tránsito',
        'tp_transito_groups_meta_box',
        'page',
        'normal',
        'high'
    );
});

/**
 * Dibuja una tarjeta dentro del formulario.
 */
function tp_transito_card_field(int $gi, int $ci, array $card): void
{
    $base = 'tp_transito_groups[' . $gi . '][tarjetas][' . $ci . ']';
    ?>
    <div class="tp-tg-card" data-card>
        <div class="tp-tg-card-grid">
            <label class="tp-tg-label">Título de la tarjeta
                <input type="text" class="widefat" data-c-titulo
                       name="<?php echo esc_attr($base . '[titulo]'); ?>"
                       value="<?php echo esc_attr($card['titulo']); ?>"
                       placeholder="Ej: Renovación Categoría &quot;C1-C2&quot;">
            </label>
            <label class="tp-tg-label">Requisitos (uno por línea)
                <textarea class="widefat" rows="4" data-c-req
                          name="<?php echo esc_attr($base . '[requisitos]'); ?>"
                          placeholder="Fotocopia de DNI..."><?php echo esc_textarea($card['requisitos']); ?></textarea>
            </label>
        </div>
        <div class="tp-tg-row-actions">
            <button type="button" class="button button-small" data-move-up-card title="Subir tarjeta">↑</button>
            <button type="button" class="button button-small" data-move-down-card title="Bajar tarjeta">↓</button>
            <button type="button" class="button button-small button-link-delete" data-del-card>Eliminar tarjeta</button>
        </div>
    </div>
    <?php
}

/**
 * Dibuja un grupo dentro del formulario.
 */
function tp_transito_group_field(int $gi, array $group): void
{
    ?>
    <div class="tp-tg-group" data-group>
        <div class="tp-tg-group-head">
            <span class="tp-tg-group-num">Grupo <strong data-g-num><?php echo (int) ($gi + 1); ?></strong></span>
            <input type="text" class="widefat" data-g-titulo
                   name="<?php echo esc_attr('tp_transito_groups[' . $gi . '][titulo]'); ?>"
                   value="<?php echo esc_attr($group['titulo']); ?>"
                   placeholder="Ej: Ampliaciones">
            <span class="tp-tg-row-actions">
                <button type="button" class="button button-small" data-move-up-group title="Subir grupo">↑</button>
                <button type="button" class="button button-small" data-move-down-group title="Bajar grupo">↓</button>
                <button type="button" class="button button-small button-link-delete" data-del-group>Eliminar grupo</button>
            </span>
        </div>
        <div class="tp-tg-cards" data-cards>
            <?php foreach ($group['tarjetas'] as $ci => $card) :
                tp_transito_card_field($gi, (int) $ci, $card);
            endforeach; ?>
        </div>
        <p><button type="button" class="button" data-add-card>＋ Agregar tarjeta</button></p>
    </div>
    <?php
}

/**
 * Caja "Grupos de Tránsito" en el editor de la página.
 */
function tp_transito_groups_meta_box($post): void
{
    $groups = tp_transito_editable_groups((int) $post->ID);
    wp_nonce_field('tp_transito_groups_save', 'tp_transito_groups_nonce');
    ?>
    <input type="hidden" name="tp_transito_groups_present" value="1">
    <p>Estos son los grupos que ve el vecino en la página de Tránsito, en orden.
    Podés <strong>agregar</strong> grupos nuevos, <strong>eliminarlos</strong> y
    <strong>subirlos/bajarlos</strong> para ordenarlos (por ejemplo, para poner uno nuevo antes del grupo 2).
    Lo mismo vale para las tarjetas dentro de cada grupo.</p>
    <p>En <em>Requisitos</em> escribí uno por línea. Las líneas que mencionen
    <strong>CURSOS</strong> o <strong>Examen</strong> se destacan en azul en la página.
    Nada se guarda hasta que presiones <strong>Actualizar</strong>.</p>

    <div id="tp-tg-list">
        <?php foreach ($groups as $gi => $group) :
            tp_transito_group_field((int) $gi, $group);
        endforeach; ?>
    </div>
    <p id="tp-tg-empty" class="tp-tg-empty" <?php echo $groups ? 'hidden' : ''; ?>>
        No hay grupos. Usá el botón de abajo para crear el primero.
    </p>
    <p><button type="button" class="button button-primary" id="tp-tg-add-group">＋ Agregar grupo</button></p>

    <template id="tp-tg-group-tpl">
        <div class="tp-tg-group" data-group>
            <div class="tp-tg-group-head">
                <span class="tp-tg-group-num">Grupo <strong data-g-num>?</strong></span>
                <input type="text" class="widefat" data-g-titulo name="" value="" placeholder="Ej: Ampliaciones">
                <span class="tp-tg-row-actions">
                    <button type="button" class="button button-small" data-move-up-group title="Subir grupo">↑</button>
                    <button type="button" class="button button-small" data-move-down-group title="Bajar grupo">↓</button>
                    <button type="button" class="button button-small button-link-delete" data-del-group>Eliminar grupo</button>
                </span>
            </div>
            <div class="tp-tg-cards" data-cards></div>
            <p><button type="button" class="button" data-add-card>＋ Agregar tarjeta</button></p>
        </div>
    </template>

    <template id="tp-tg-card-tpl">
        <div class="tp-tg-card" data-card>
            <div class="tp-tg-card-grid">
                <label class="tp-tg-label">Título de la tarjeta
                    <input type="text" class="widefat" data-c-titulo name="" value="" placeholder="Ej: Renovación Categoría &quot;C1-C2&quot;">
                </label>
                <label class="tp-tg-label">Requisitos (uno por línea)
                    <textarea class="widefat" rows="4" data-c-req name="" placeholder="Fotocopia de DNI..."></textarea>
                </label>
            </div>
            <div class="tp-tg-row-actions">
                <button type="button" class="button button-small" data-move-up-card title="Subir tarjeta">↑</button>
                <button type="button" class="button button-small" data-move-down-card title="Bajar tarjeta">↓</button>
                <button type="button" class="button button-small button-link-delete" data-del-card>Eliminar tarjeta</button>
            </div>
        </div>
    </template>

    <style>
        .tp-tg-group { border: 1px solid #c3c4c7; background: #fff; padding: 12px; margin: 12px 0; }
        .tp-tg-group-head { display: flex; gap: 8px; align-items: center; margin-bottom: 8px; }
        .tp-tg-group-head input { flex: 1; }
        .tp-tg-group-num { white-space: nowrap; color: #50575e; }
        .tp-tg-cards { margin-left: 8px; border-left: 3px solid #e5e7eb; padding-left: 12px; }
        .tp-tg-card { background: #f6f7f7; border: 1px solid #dcdcde; padding: 10px; margin: 8px 0; }
        .tp-tg-card-grid { display: grid; gap: 8px; }
        .tp-tg-label { display: grid; gap: 4px; font-weight: 600; }
        .tp-tg-row-actions { display: flex; gap: 6px; align-items: center; margin-top: 6px; }
        .tp-tg-group-head .tp-tg-row-actions { margin-top: 0; white-space: nowrap; }
        .tp-tg-empty { color: #50575e; font-style: italic; }
    </style>

    <script>
    (function () {
        var list = document.getElementById('tp-tg-list');
        var emptyHint = document.getElementById('tp-tg-empty');
        if (!list) return;

        function reindex() {
            var groups = list.querySelectorAll('[data-group]');
            groups.forEach(function (gEl, gi) {
                gEl.querySelector('[data-g-titulo]').name = 'tp_transito_groups[' + gi + '][titulo]';
                var num = gEl.querySelector('[data-g-num]');
                if (num) num.textContent = String(gi + 1);
                gEl.querySelectorAll('[data-card]').forEach(function (cEl, ci) {
                    cEl.querySelector('[data-c-titulo]').name = 'tp_transito_groups[' + gi + '][tarjetas][' + ci + '][titulo]';
                    cEl.querySelector('[data-c-req]').name = 'tp_transito_groups[' + gi + '][tarjetas][' + ci + '][requisitos]';
                });
            });
            if (emptyHint) emptyHint.hidden = groups.length > 0;
        }

        function move(node, dir) {
            var sib = dir < 0 ? node.previousElementSibling : node.nextElementSibling;
            if (!sib) return;
            if (dir < 0) node.parentNode.insertBefore(node, sib);
            else node.parentNode.insertBefore(sib, node);
            reindex();
        }

        document.getElementById('tp-tg-add-group').addEventListener('click', function () {
            var tpl = document.getElementById('tp-tg-group-tpl');
            list.appendChild(tpl.content.cloneNode(true));
            reindex();
            var titles = list.querySelectorAll('[data-group]:last-child [data-g-titulo]');
            if (titles.length) titles[0].focus();
        });

        list.addEventListener('click', function (ev) {
            var btn = ev.target.closest('button');
            if (!btn) return;
            var group = btn.closest('[data-group]');
            var card = btn.closest('[data-card]');

            if (btn.hasAttribute('data-add-card') && group) {
                var tpl = document.getElementById('tp-tg-card-tpl');
                group.querySelector('[data-cards]').appendChild(tpl.content.cloneNode(true));
                reindex();
                return;
            }
            if (btn.hasAttribute('data-del-group') && group) {
                var n = group.querySelectorAll('[data-card]').length;
                var msg = n > 0
                    ? '¿Eliminar este grupo y sus ' + n + ' tarjeta(s)? (Se aplica al presionar Actualizar)'
                    : '¿Eliminar este grupo vacío? (Se aplica al presionar Actualizar)';
                if (window.confirm(msg)) { group.remove(); reindex(); }
                return;
            }
            if (btn.hasAttribute('data-del-card') && card) {
                card.remove(); reindex(); return;
            }
            if (btn.hasAttribute('data-move-up-group') && group) { move(group, -1); return; }
            if (btn.hasAttribute('data-move-down-group') && group) { move(group, 1); return; }
            if (btn.hasAttribute('data-move-up-card') && card) { move(card, -1); return; }
            if (btn.hasAttribute('data-move-down-card') && card) { move(card, 1); return; }
        });

        reindex();
    })();
    </script>
    <?php
}

/**
 * Guarda los grupos dinámicos al actualizar la página de Tránsito.
 */
add_action('save_post_page', static function ($post_id): void {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['tp_transito_groups_present'])) {
        return;
    }
    if (!isset($_POST['tp_transito_groups_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tp_transito_groups_nonce'])), 'tp_transito_groups_save')
    ) {
        return;
    }
    if (!current_user_can('edit_page', $post_id)) {
        return;
    }
    if (!tp_transito_is_groups_page((int) $post_id)) {
        return;
    }

    $raw = (isset($_POST['tp_transito_groups']) && is_array($_POST['tp_transito_groups']))
        ? wp_unslash($_POST['tp_transito_groups'])
        : [];

    update_post_meta((int) $post_id, TP_TRANSITO_GROUPS_META, tp_transito_sanitize_groups($raw));
}, 20);

/**
 * Marca los campos fijos históricos como respaldo para no confundir.
 */
add_filter('acf/prepare_field', static function ($field) {
    if (!is_array($field) || !is_admin()) {
        return $field;
    }

    $post_id = isset($_GET['post']) ? absint($_GET['post']) : 0;
    if (!$post_id && isset($_POST['post_ID'])) {
        $post_id = absint($_POST['post_ID']);
    }
    if (!$post_id || get_post_field('post_name', $post_id) !== TP_TRANSITO_SLUG) {
        return $field;
    }

    static $legacy = null;
    if ($legacy === null) {
        $legacy = ['group1_heading', 'group2_heading', 'group3_heading'];
        for ($i = 1; $i <= 11; $i++) {
            $legacy[] = 'req' . $i . '_title';
            $legacy[] = 'req' . $i . '_items';
        }
    }

    if (in_array($field['name'] ?? '', $legacy, true)) {
        $field['label'] .= ' (respaldo)';
        $field['instructions'] = 'Contenido original de respaldo. Para agregar, eliminar o reordenar grupos usá la caja “Grupos de Tránsito” de más abajo. '
            . ($field['instructions'] ?? '');
    }

    return $field;
});
