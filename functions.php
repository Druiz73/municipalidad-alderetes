<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

require_once __DIR__ . '/inc/ui.php';

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

/**
 * Auto-setup: crea páginas y menú la primera vez que se activa el tema.
 */
function tailpress_setup_pages(): void {
    if (get_option('tailpress_alderetes_setup_done')) {
        return;
    }

    $pages = [
        ['title' => 'Inicio',          'slug' => 'inicio',           'template' => ''],
        ['title' => 'Noticias',        'slug' => 'noticias',         'template' => 'page-noticias.php'],
        ['title' => 'Contacto',        'slug' => 'contacto',         'template' => 'page-contacto.php'],
        ['title' => 'Institucional',   'slug' => 'institucional',    'template' => 'page-institucional.php'],
        ['title' => 'Organigrama',     'slug' => 'organigrama',      'template' => 'page-organigrama.php'],
        ['title' => 'Rentas',          'slug' => 'rentas',           'template' => 'page-tramites-rentas.php'],
        ['title' => 'Tránsito',        'slug' => 'transito',         'template' => 'page-tramites-transito.php'],
        ['title' => 'Tribunal de Faltas', 'slug' => 'tribunal-de-faltas', 'template' => 'page-tribunal-de-faltas.php'],
        ['title' => 'Catastro',        'slug' => 'catastro',         'template' => 'page-tramites-catastro.php'],
        ['title' => 'Obras Públicas',  'slug' => 'obras-publicas',   'template' => ''],
        ['title' => 'Salud',           'slug' => 'salud',            'template' => ''],
        ['title' => 'Educación y Cultura', 'slug' => 'educacion',   'template' => ''],
        ['title' => 'Deporte',         'slug' => 'deporte',          'template' => ''],
        ['title' => 'Seguridad',       'slug' => 'seguridad',        'template' => ''],
        ['title' => 'Alumbrado Público', 'slug' => 'alumbrado',      'template' => ''],
        ['title' => 'Acción Social',   'slug' => 'accion-social',    'template' => ''],
        ['title' => 'CISI y Cementerio', 'slug' => 'cisi',           'template' => ''],
        ['title' => 'TEM',             'slug' => 'tem',              'template' => ''],
        ['title' => 'Turnos Tránsito', 'slug' => 'turnos-de-transito', 'template' => 'page-turnos-transito.php'],
    ];

    $page_ids = [];

    foreach ($pages as $page) {
        $existing = get_page_by_path($page['slug']);
        if ($existing) {
            $page_ids[$page['slug']] = $existing->ID;
            continue;
        }

        $args = [
            'post_title'   => $page['title'],
            'post_name'    => $page['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ];

        $id = wp_insert_post($args);

        if ($id && !is_wp_error($id) && $page['template']) {
            update_post_meta($id, '_wp_page_template', $page['template']);
        }

        $page_ids[$page['slug']] = $id;
    }

    // Configurar página de inicio estática
    $home = get_page_by_path('inicio');
    if ($home) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);
    }

    // Crear menú principal
    $menu_name = 'Menú Principal';
    $menu_id   = wp_create_nav_menu($menu_name);

    if (!is_wp_error($menu_id)) {
        $menu_structure = [
            ['title' => 'Institucional', 'slug' => 'institucional', 'children' => [
                ['title' => 'Institucional', 'slug' => 'institucional'],
                ['title' => 'Organigrama',   'slug' => 'organigrama'],
            ]],
            ['title' => 'Trámites', 'slug' => '', 'children' => [
                ['title' => 'Rentas',              'slug' => 'rentas'],
                ['title' => 'Tránsito',            'slug' => 'transito'],
                ['title' => 'Tribunal de Faltas',  'slug' => 'tribunal-de-faltas'],
                ['title' => 'Catastro',            'slug' => 'catastro'],
            ]],
            ['title' => 'Áreas', 'slug' => '', 'children' => [
                ['title' => 'Obras Públicas',      'slug' => 'obras-publicas'],
                ['title' => 'Salud',               'slug' => 'salud'],
                ['title' => 'Educación y Cultura', 'slug' => 'educacion'],
                ['title' => 'Deporte',             'slug' => 'deporte'],
                ['title' => 'Seguridad',           'slug' => 'seguridad'],
                ['title' => 'Alumbrado Público',   'slug' => 'alumbrado'],
            ]],
            ['title' => 'Noticias', 'slug' => 'noticias', 'children' => []],
            ['title' => 'Contacto', 'slug' => 'contacto', 'children' => []],
        ];

        foreach ($menu_structure as $item) {
            $page_id = isset($page_ids[$item['slug']]) ? $page_ids[$item['slug']] : 0;

            $parent_item_id = wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'     => $item['title'],
                'menu-item-object'    => $page_id ? 'page' : 'custom',
                'menu-item-object-id' => $page_id,
                'menu-item-type'      => $page_id ? 'post_type' : 'custom',
                'menu-item-url'       => $page_id ? '' : '#',
                'menu-item-status'    => 'publish',
            ]);

            foreach (($item['children'] ?? []) as $child) {
                $child_page_id = isset($page_ids[$child['slug']]) ? $page_ids[$child['slug']] : 0;
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'      => $child['title'],
                    'menu-item-object'     => 'page',
                    'menu-item-object-id'  => $child_page_id,
                    'menu-item-type'       => 'post_type',
                    'menu-item-parent-id'  => $parent_item_id,
                    'menu-item-status'     => 'publish',
                ]);
            }
        }

        // Asignar menú a la ubicación 'primary'
        $locations = get_theme_mod('nav_menu_locations', []);
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    update_option('tailpress_alderetes_setup_done', true);
}

add_action('after_switch_theme', 'tailpress_setup_pages');

/**
 * Handle Contact Form Submission via AJAX
 */
function tailpress_handle_contacto_form() {
    // Check Nonce for security
    if (!isset($_POST['contacto_nonce']) || !wp_verify_nonce($_POST['contacto_nonce'], 'contacto_form')) {
        wp_send_json_error('Error de seguridad. Recargá la página e intentá nuevamente.');
    }

    // Sanitize input data
    $nombre   = sanitize_text_field($_POST['nombre'] ?? '');
    $apellido = sanitize_text_field($_POST['apellido'] ?? '');
    $telefono = sanitize_text_field($_POST['telefono'] ?? '');
    $email    = sanitize_email($_POST['email'] ?? '');
    $consulta = sanitize_textarea_field($_POST['consulta'] ?? '');

    // Check Honeypot (if filled out, it's a bot)
    if (!empty($_POST['url_website'])) {
        wp_send_json_error('Error al procesar la solicitud. Intente nuevamente.');
    }

    // Rate Limiting (Session/Transient based)
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_name = 'contacto_limit_' . md5($ip);
    
    if (get_transient($transient_name)) {
        wp_send_json_error('Por favor, esperá un minuto antes de enviar otra consulta para prevenir spam.');
    }

    // Basic validation
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($consulta)) {
        wp_send_json_error('Por favor, completá todos los campos obligatorios.');
    }

    // Configure email
    $to = 'contacto@municipalidadalderetes.com.ar'; // Reemplazar con el correo final cuando se cree
    $subject = 'Nueva consulta desde la web - ' . $nombre . ' ' . $apellido;
    
    $body = "Has recibido una nueva consulta desde el formulario web:\n\n";
    $body .= "Nombre: $nombre $apellido\n";
    $body .= "Teléfono: $telefono\n";
    $body .= "Email: " . ($email ? $email : 'No especificado') . "\n\n";
    $body .= "Mensaje:\n$consulta\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8');
    if ($email) {
        $headers[] = 'Reply-To: ' . $nombre . ' <' . $email . '>';
    }

    // Send email using wp_mail
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        // Establecer el rate limit a 60 segundos después de mandar exitosamente un mail
        set_transient($transient_name, true, 60);
        wp_send_json_success('Consulta enviada exitosamente.');
    } else {
        // En caso de que el hosting todavía no pueda enviar correos
        wp_send_json_error('Error en el servidor al enviar el correo. Por favor contactate por teléfono.');
    }
}
add_action('wp_ajax_submit_contacto_form', 'tailpress_handle_contacto_form');
add_action('wp_ajax_nopriv_submit_contacto_form', 'tailpress_handle_contacto_form');

/**
 * Deshabilitar completamente los comentarios en todo el sitio web.
 */
add_action('admin_init', function () {
    // Redirigir si alguien intenta acceder a la página de comentarios directamente
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }
    // Remover metaboxes de comentarios en post/page
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
// Cerrar comentarios en el frontend
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
// Ocultar comentarios existentes
add_filter('comments_array', '__return_empty_array', 10, 2);
// Quitar opción de menú de comentarios del administrador
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
// Quitar del admin bar de arriba
add_action('wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

// Permite reejecutar el setup manualmente desde WP Admin → Apariencia
add_action('admin_notices', function () {
    if (!current_user_can('manage_options')) return;
    if (isset($_GET['tailpress_reset_setup'])) {
        delete_option('tailpress_alderetes_setup_done');
        tailpress_setup_pages();
        echo '<div class="notice notice-success"><p><strong>Setup del tema ejecutado correctamente.</strong></p></div>';
    }
    if (get_option('tailpress_alderetes_setup_done')) return;
    $url = admin_url('?tailpress_reset_setup=1');
    echo '<div class="notice notice-warning"><p><strong>TailPress Alderetes:</strong> El setup inicial no se ha ejecutado. <a href="' . esc_url($url) . '">Ejecutar ahora</a>.</p></div>';
});

// =============================================================================
// SISTEMA DE TURNOS - TRÁNSITO MUNICIPAL
// =============================================================================

// --- Configuración central ---
define('TP_TURNO_HORA_INICIO', '08:00');
define('TP_TURNO_HORA_FIN',    '13:00');
define('TP_TURNO_INTERVALO',   30); // minutos
define('TP_TURNO_EMAIL_ADMIN', get_option('admin_email'));

// --- Feriados nacionales Argentina 2025-2026 (inamovibles + puentes ya conocidos) ---
function tp_feriados_argentina(): array {
    return [
        // 2025
        '2025-01-01', '2025-03-03', '2025-03-04', // Año Nuevo, Carnaval
        '2025-03-24', '2025-04-02',                 // Memoria, Malvinas
        '2025-04-17', '2025-04-18',                 // Semana Santa
        '2025-05-01', '2025-05-25',                 // Trabajo, Revolución
        '2025-06-16', '2025-06-20',                 // Belgrano (puente), Belgrano
        '2025-07-09', '2025-08-17',                 // Independencia, San Martín
        '2025-10-12', '2025-11-21',                 // Diversidad, Soberanía
        '2025-12-08', '2025-12-25',                 // Inmaculada, Navidad
        // 2026
        '2026-01-01', '2026-02-16', '2026-02-17',  // Año Nuevo, Carnaval
        '2026-03-24', '2026-04-02',
        '2026-04-02', '2026-04-03',                 // Semana Santa 2026
        '2026-05-01', '2026-05-25',
        '2026-06-15', '2026-06-20',
        '2026-07-09', '2026-08-16',
        '2026-10-12', '2026-11-20',
        '2026-12-08', '2026-12-25',
    ];
}

// --- Slots disponibles para un día ---
function tp_get_slots(): array {
    $slots = [];
    $inicio = strtotime(TP_TURNO_HORA_INICIO);
    $fin    = strtotime(TP_TURNO_HORA_FIN);
    $intervalo = TP_TURNO_INTERVALO * 60;
    for ($t = $inicio; $t < $fin; $t += $intervalo) {
        $slots[] = date('H:i', $t);
    }
    return $slots;
}

// --- Turnos ya reservados para una fecha ---
function tp_get_turnos_ocupados(string $fecha): array {
    $query = new WP_Query([
        'post_type'      => 'tp_turno',
        'post_status'    => ['publish', 'pending'],
        'posts_per_page' => -1,
        'meta_query'     => [
            ['key' => '_turno_fecha', 'value' => $fecha, 'compare' => '='],
        ],
        'fields' => 'ids',
    ]);
    $ocupados = [];
    foreach ($query->posts as $id) {
        $estado = get_post_meta($id, '_turno_estado', true);
        if ($estado !== 'cancelado') {
            $ocupados[] = get_post_meta($id, '_turno_hora', true);
        }
    }
    return $ocupados;
}

// --- ¿El día está habilitado? ---
function tp_dia_habilitado(string $fecha): bool {
    $ts = strtotime($fecha);
    $dow = (int) date('N', $ts); // 1=Lun, 7=Dom
    if ($dow >= 6) return false; // Sábado/Domingo
    if (in_array($fecha, tp_feriados_argentina(), true)) return false;
    $bloqueados = get_option('tp_dias_bloqueados', []);
    if (in_array($fecha, (array) $bloqueados, true)) return false;
    return true;
}

// --- Register CPT ---
add_action('init', function () {
    register_post_type('tp_turno', [
        'labels' => [
            'name'               => 'Turnos de Tránsito',
            'singular_name'      => 'Turno',
            'add_new'            => 'Nuevo Turno',
            'add_new_item'       => 'Nuevo Turno',
            'edit_item'          => 'Editar Turno',
            'view_item'          => 'Ver Turno',
            'search_items'       => 'Buscar Turno',
            'not_found'          => 'No se encontraron turnos',
            'not_found_in_trash' => 'No hay turnos en la papelera',
        ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_position' => 25,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => ['title'],
        'capabilities'  => ['create_posts' => 'do_not_allow'],
        'map_meta_cap'  => true,
    ]);
});

// --- Columnas admin personalizadas ---
add_filter('manage_tp_turno_posts_columns', function ($cols) {
    return [
        'cb'              => $cols['cb'],
        'turno_fecha'     => 'Fecha',
        'turno_hora'      => 'Hora',
        'turno_nombre'    => 'Nombre',
        'turno_dni'       => 'DNI',
        'turno_telefono'  => 'Teléfono',
        'turno_email'     => 'Email',
        'turno_categoria' => 'Categoría',
        'turno_estado'    => 'Estado',
    ];
});

add_action('manage_tp_turno_posts_custom_column', function ($col, $post_id) {
    $map = [
        'turno_fecha'     => '_turno_fecha',
        'turno_hora'      => '_turno_hora',
        'turno_nombre'    => '_turno_nombre',
        'turno_dni'       => '_turno_dni',
        'turno_telefono'  => '_turno_telefono',
        'turno_email'     => '_turno_email',
        'turno_categoria' => '_turno_categoria',
    ];
    if (isset($map[$col])) {
        echo esc_html(get_post_meta($post_id, $map[$col], true));
        return;
    }
    if ($col === 'turno_estado') {
        $estado = get_post_meta($post_id, '_turno_estado', true) ?: 'pendiente';
        $colors = [
            'pendiente'  => '#f59e0b',
            'atendido'   => '#10b981',
            'ausente'    => '#ef4444',
            'cancelado'  => '#6b7280',
        ];
        $color = $colors[$estado] ?? '#6b7280';
        printf(
            '<span style="background:%s;color:#fff;padding:2px 8px;border-radius:999px;font-size:12px;font-weight:600;">%s</span>',
            $color,
            ucfirst($estado)
        );
    }
}, 10, 2);

add_filter('manage_edit-tp_turno_sortable_columns', function ($cols) {
    $cols['turno_fecha'] = 'turno_fecha';
    return $cols;
});

// Filtro por fecha en el listado admin
add_action('restrict_manage_posts', function ($post_type) {
    if ($post_type !== 'tp_turno') return;
    $fecha = isset($_GET['turno_fecha_filter']) ? sanitize_text_field($_GET['turno_fecha_filter']) : '';
    echo '<input type="date" name="turno_fecha_filter" value="' . esc_attr($fecha) . '" style="margin-right:4px">';
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || $query->get('post_type') !== 'tp_turno') return;
    if (!empty($_GET['turno_fecha_filter'])) {
        $query->set('meta_query', [[
            'key'     => '_turno_fecha',
            'value'   => sanitize_text_field($_GET['turno_fecha_filter']),
            'compare' => '=',
        ]]);
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
    } else {
        $query->set('meta_key', '_turno_hora');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
    }
});

// --- Meta box en el CPT para ver/editar estado y datos ---
add_action('add_meta_boxes', function () {
    add_meta_box('turno_datos', 'Datos del Turno', 'tp_turno_metabox_cb', 'tp_turno', 'normal', 'high');
});

function tp_turno_metabox_cb($post) {
    $fields = [
        '_turno_fecha'     => 'Fecha',
        '_turno_hora'      => 'Hora',
        '_turno_nombre'    => 'Nombre completo',
        '_turno_dni'       => 'DNI',
        '_turno_telefono'  => 'Teléfono',
        '_turno_email'     => 'Email',
        '_turno_categoria' => 'Categoría',
        '_turno_numero'    => 'N° de Turno',
    ];
    wp_nonce_field('tp_turno_save', 'tp_turno_nonce');
    echo '<table class="form-table"><tbody>';
    foreach ($fields as $key => $label) {
        $val = get_post_meta($post->ID, $key, true);
        $readonly = $key === '_turno_numero' ? 'readonly' : '';
        echo "<tr><th><label>{$label}</label></th><td><input type='text' name='{$key}' value='" . esc_attr($val) . "' class='regular-text' {$readonly}></td></tr>";
    }
    $estado = get_post_meta($post->ID, '_turno_estado', true) ?: 'pendiente';
    echo "<tr><th><label>Estado</label></th><td><select name='_turno_estado'>
        <option value='pendiente'" . selected($estado, 'pendiente', false) . ">Pendiente</option>
        <option value='atendido'" . selected($estado, 'atendido', false) . ">Atendido</option>
        <option value='ausente'"  . selected($estado, 'ausente', false)  . ">Ausente</option>
        <option value='cancelado'" . selected($estado, 'cancelado', false) . ">Cancelado</option>
    </select></td></tr>";
    echo '</tbody></table>';
}

add_action('save_post_tp_turno', function ($post_id) {
    if (!isset($_POST['tp_turno_nonce']) || !wp_verify_nonce($_POST['tp_turno_nonce'], 'tp_turno_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    $fields = ['_turno_fecha','_turno_hora','_turno_nombre','_turno_dni','_turno_telefono','_turno_email','_turno_categoria','_turno_estado'];
    $old_estado = get_post_meta($post_id, '_turno_estado', true);
    foreach ($fields as $f) {
        if (isset($_POST[$f])) {
            update_post_meta($post_id, $f, sanitize_text_field($_POST[$f]));
        }
    }
    // Enviar email si se canceló desde admin
    $new_estado = $_POST['_turno_estado'] ?? '';
    if ($new_estado === 'cancelado' && $old_estado !== 'cancelado') {
        $email   = get_post_meta($post_id, '_turno_email', true);
        $nombre  = get_post_meta($post_id, '_turno_nombre', true);
        $fecha   = get_post_meta($post_id, '_turno_fecha', true);
        $hora    = get_post_meta($post_id, '_turno_hora', true);
        $numero  = get_post_meta($post_id, '_turno_numero', true);
        if ($email) tp_enviar_email_cancelacion($email, $nombre, $numero, $fecha, $hora);
    }
});

// --- Página admin: Bloquear fechas ---
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=tp_turno',
        'Bloquear Fechas',
        'Bloquear Fechas',
        'manage_options',
        'tp_bloquear_fechas',
        'tp_bloquear_fechas_page'
    );
});

function tp_bloquear_fechas_page() {
    if (isset($_POST['tp_guardar_bloqueos']) && check_admin_referer('tp_bloquear_fechas')) {
        $dias = array_filter(array_map('sanitize_text_field', (array)($_POST['dias_bloqueados'] ?? [])));
        update_option('tp_dias_bloqueados', array_values($dias));
        echo '<div class="notice notice-success"><p>Fechas bloqueadas actualizadas.</p></div>';
    }
    if (isset($_POST['tp_agregar_dia']) && check_admin_referer('tp_bloquear_fechas')) {
        $nuevo = sanitize_text_field($_POST['nueva_fecha'] ?? '');
        if ($nuevo) {
            $dias = (array) get_option('tp_dias_bloqueados', []);
            $dias[] = $nuevo;
            $dias = array_unique($dias);
            sort($dias);
            update_option('tp_dias_bloqueados', array_values($dias));
        }
    }
    $dias_bloqueados = (array) get_option('tp_dias_bloqueados', []);
    sort($dias_bloqueados);
    ?>
    <div class="wrap">
        <h1>Bloquear Fechas (Asuetos / Feriados extra)</h1>
        <p>Agregá fechas en las que <strong>no se otorgarán turnos</strong> (además de los feriados nacionales y los fines de semana que ya están bloqueados automáticamente).</p>
        <form method="post">
            <?php wp_nonce_field('tp_bloquear_fechas'); ?>
            <table class="widefat" style="max-width:500px">
                <thead><tr><th>Fecha bloqueada</th><th>Acción</th></tr></thead>
                <tbody>
                <?php if (empty($dias_bloqueados)): ?>
                    <tr><td colspan="2"><em>No hay fechas bloqueadas adicionales.</em></td></tr>
                <?php else: ?>
                    <?php foreach ($dias_bloqueados as $i => $d): ?>
                    <tr>
                        <td><input type="date" name="dias_bloqueados[<?php echo $i; ?>]" value="<?php echo esc_attr($d); ?>"></td>
                        <td><label><input type="checkbox" name="eliminar_dia[<?php echo $i; ?>]"> Eliminar</label></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <p><input type="submit" name="tp_guardar_bloqueos" class="button button-secondary" value="Guardar cambios"></p>
        </form>
        <hr>
        <h2>Agregar nueva fecha bloqueada</h2>
        <form method="post" style="display:flex;gap:8px;align-items:center">
            <?php wp_nonce_field('tp_bloquear_fechas'); ?>
            <input type="date" name="nueva_fecha" required>
            <input type="submit" name="tp_agregar_dia" class="button button-primary" value="Bloquear esta fecha">
        </form>
        <hr>
        <h2>Feriados Nacionales 2025-2026 (bloqueados automáticamente)</h2>
        <ul><?php foreach (tp_feriados_argentina() as $f): ?>
            <li><?php echo esc_html(date('d/m/Y', strtotime($f))); ?></li>
        <?php endforeach; ?></ul>
    </div>
    <?php
}

// --- AJAX: Obtener slots disponibles ---
add_action('wp_ajax_tp_get_slots',        'tp_ajax_get_slots');
add_action('wp_ajax_nopriv_tp_get_slots', 'tp_ajax_get_slots');
function tp_ajax_get_slots() {
    check_ajax_referer('tp_turnos_nonce', 'nonce');
    $fecha = sanitize_text_field($_POST['fecha'] ?? '');
    if (!$fecha || !tp_dia_habilitado($fecha)) {
        wp_send_json_error(['mensaje' => 'Fecha no disponible.']);
    }
    $todos    = tp_get_slots();
    $ocupados = tp_get_turnos_ocupados($fecha);
    wp_send_json_success(['slots' => $todos, 'ocupados' => $ocupados]);
}

// --- AJAX: Reservar turno ---
add_action('wp_ajax_tp_reservar',        'tp_ajax_reservar');
add_action('wp_ajax_nopriv_tp_reservar', 'tp_ajax_reservar');
function tp_ajax_reservar() {
    check_ajax_referer('tp_turnos_nonce', 'nonce');
    $fecha     = sanitize_text_field($_POST['fecha']     ?? '');
    $hora      = sanitize_text_field($_POST['hora']      ?? '');
    $nombre    = sanitize_text_field($_POST['nombre']    ?? '');
    $dni       = sanitize_text_field($_POST['dni']       ?? '');
    $telefono  = sanitize_text_field($_POST['telefono']  ?? '');
    $email     = sanitize_email($_POST['email']          ?? '');
    $categoria = sanitize_text_field($_POST['categoria'] ?? '');

    if (!$fecha || !$hora || !$nombre || !$dni || !$email) {
        wp_send_json_error(['mensaje' => 'Faltan datos obligatorios.']);
    }
    if (!tp_dia_habilitado($fecha)) {
        wp_send_json_error(['mensaje' => 'La fecha seleccionada no está disponible.']);
    }
    $slots_validos = tp_get_slots();
    if (!in_array($hora, $slots_validos, true)) {
        wp_send_json_error(['mensaje' => 'El horario seleccionado no es válido.']);
    }
    $ocupados = tp_get_turnos_ocupados($fecha);
    if (in_array($hora, $ocupados, true)) {
        wp_send_json_error(['mensaje' => 'Ese horario ya está reservado. Por favor elegí otro.']);
    }

    $numero = 'T' . strtoupper(substr(md5($fecha . $hora . $dni), 0, 6));

    $post_id = wp_insert_post([
        'post_type'   => 'tp_turno',
        'post_title'  => "Turno {$numero} – {$nombre}",
        'post_status' => 'publish',
    ]);

    if (!$post_id || is_wp_error($post_id)) {
        wp_send_json_error(['mensaje' => 'Error al guardar el turno. Intentá de nuevo.']);
    }

    foreach ([
        '_turno_fecha'     => $fecha,
        '_turno_hora'      => $hora,
        '_turno_nombre'    => $nombre,
        '_turno_dni'       => $dni,
        '_turno_telefono'  => $telefono,
        '_turno_email'     => $email,
        '_turno_categoria' => $categoria,
        '_turno_estado'    => 'pendiente',
        '_turno_numero'    => $numero,
    ] as $key => $val) {
        update_post_meta($post_id, $key, $val);
    }

    tp_enviar_email_confirmacion($email, $nombre, $numero, $fecha, $hora, $categoria);

    wp_send_json_success(['numero' => $numero, 'mensaje' => '¡Turno reservado con éxito!']);
}

// --- Emails ---
function tp_email_headers(): array {
    return ['Content-Type: text/html; charset=UTF-8', 'From: Municipalidad de Alderetes <' . TP_TURNO_EMAIL_ADMIN . '>'];
}

function tp_enviar_email_confirmacion(string $email, string $nombre, string $numero, string $fecha, string $hora, string $categoria): void {
    $fecha_fmt = date('d/m/Y', strtotime($fecha));
    $subject   = "✅ Turno confirmado – {$numero} | Municipalidad de Alderetes";
    $body = "
    <div style='font-family:sans-serif;max-width:560px;margin:0 auto;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden'>
      <div style='background:#1e4fa0;padding:24px;text-align:center'>
        <h2 style='color:#fff;margin:0'>Turno Confirmado</h2>
        <p style='color:#93c5fd;margin:4px 0 0'>Dirección de Tránsito – Municipalidad de Alderetes</p>
      </div>
      <div style='padding:24px'>
        <p>Hola <strong>" . esc_html($nombre) . "</strong>, tu turno fue reservado exitosamente.</p>
        <table style='width:100%;border-collapse:collapse;margin:16px 0'>
          <tr style='background:#f3f4f6'><td style='padding:8px 12px;font-weight:bold'>N° de Turno</td><td style='padding:8px 12px'><strong style='color:#1e4fa0'>{$numero}</strong></td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold'>Fecha</td><td style='padding:8px 12px'>{$fecha_fmt}</td></tr>
          <tr style='background:#f3f4f6'><td style='padding:8px 12px;font-weight:bold'>Hora</td><td style='padding:8px 12px'>{$hora} hs</td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold'>Categoría</td><td style='padding:8px 12px'>" . esc_html($categoria) . "</td></tr>
        </table>
        <p style='color:#374151'>📍 <strong>Lugar:</strong> Dirección de Tránsito – Municipalidad de Alderetes, Av. San Martín.</p>
        <p style='color:#374151'>⏰ Presentate <strong>5 minutos antes</strong> de tu turno con DNI en mano.</p>
        <p style='color:#6b7280;font-size:13px'>Si no podés asistir, comunicate con nosotros para cancelar tu turno.</p>
      </div>
    </div>";
    wp_mail($email, $subject, $body, tp_email_headers());
}

function tp_enviar_email_cancelacion(string $email, string $nombre, string $numero, string $fecha, string $hora): void {
    $fecha_fmt = date('d/m/Y', strtotime($fecha));
    $subject   = "❌ Turno cancelado – {$numero} | Municipalidad de Alderetes";
    $body = "
    <div style='font-family:sans-serif;max-width:560px;margin:0 auto;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden'>
      <div style='background:#dc2626;padding:24px;text-align:center'>
        <h2 style='color:#fff;margin:0'>Turno Cancelado</h2>
        <p style='color:#fca5a5;margin:4px 0 0'>Dirección de Tránsito – Municipalidad de Alderetes</p>
      </div>
      <div style='padding:24px'>
        <p>Hola <strong>" . esc_html($nombre) . "</strong>, te informamos que tu turno fue <strong>cancelado</strong>.</p>
        <table style='width:100%;border-collapse:collapse;margin:16px 0'>
          <tr style='background:#f3f4f6'><td style='padding:8px 12px;font-weight:bold'>N° de Turno</td><td style='padding:8px 12px'>{$numero}</td></tr>
          <tr><td style='padding:8px 12px;font-weight:bold'>Fecha</td><td style='padding:8px 12px'>{$fecha_fmt}</td></tr>
          <tr style='background:#f3f4f6'><td style='padding:8px 12px;font-weight:bold'>Hora</td><td style='padding:8px 12px'>{$hora} hs</td></tr>
        </table>
        <p>Si necesitás un nuevo turno, podés reservarlo en nuestra página web.</p>
      </div>
    </div>";
    wp_mail($email, $subject, $body, tp_email_headers());
}


