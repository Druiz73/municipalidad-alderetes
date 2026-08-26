<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

require_once __DIR__ . '/inc/ui.php';
require_once __DIR__ . '/inc/editable-content.php';
require_once __DIR__ . '/inc/security-hardening.php';

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
        ['title' => 'Obras Públicas',  'slug' => 'obras-publicas',   'template' => 'page-obras-publicas.php'],
        ['title' => 'Oficina de Empleo', 'slug' => 'oficina-empleo',   'template' => 'page-oficina-empleo.php'],
        ['title' => 'Educación',       'slug' => 'educacion',        'template' => 'page-educacion.php'],
        ['title' => 'Cultura',         'slug' => 'cultura',          'template' => 'page-cultura.php'],
        ['title' => 'Deporte',         'slug' => 'deporte',          'template' => 'page-deporte.php'],
        ['title' => 'Punto Digital',   'slug' => 'punto-digital',    'template' => 'page-punto-digital.php'],
        ['title' => 'Seguridad',       'slug' => 'seguridad',        'template' => 'page-seguridad.php'],
        ['title' => 'Alumbrado Público', 'slug' => 'alumbrado',      'template' => 'page-alumbrado.php'],
        ['title' => 'Políticas Sociales', 'slug' => 'politicas-sociales', 'template' => 'page-politicas-sociales.php'],
        ['title' => 'Acción Social',   'slug' => 'accion-social',    'template' => 'page-politicas-sociales.php'],
        ['title' => 'CISI',            'slug' => 'cisi',             'template' => 'page-tramites-rentas.php'],
        ['title' => 'Cementerio',      'slug' => 'cementerio',       'template' => 'page-tramites-rentas.php'],
        ['title' => 'TEM',             'slug' => 'tem',              'template' => 'page-tramites-rentas.php'],
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
                ['title' => 'Oficina de Empleo',   'slug' => 'oficina-empleo'],
                ['title' => 'Educación',           'slug' => 'educacion'],
                ['title' => 'Cultura',             'slug' => 'cultura'],
                ['title' => 'Deporte',             'slug' => 'deporte'],
                ['title' => 'Punto Digital',       'slug' => 'punto-digital'],
                ['title' => 'Seguridad',           'slug' => 'seguridad'],
                ['title' => 'Alumbrado Público',   'slug' => 'alumbrado'],
                ['title' => 'Políticas Sociales',  'slug' => 'politicas-sociales'],
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

function tailpress_ensure_punto_digital_page(): void {
    if ( get_option( 'tailpress_punto_digital_page_done' ) ) {
        return;
    }

    $existing = get_page_by_path( 'punto-digital' );

    if ( $existing ) {
        if ( get_page_template_slug( $existing->ID ) !== 'page-punto-digital.php' ) {
            update_post_meta( $existing->ID, '_wp_page_template', 'page-punto-digital.php' );
        }
        update_option( 'tailpress_punto_digital_page_done', true );
        return;
    }

    $page_id = wp_insert_post( [
        'post_title'   => 'Punto Digital',
        'post_name'    => 'punto-digital',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
    ] );

    if ( $page_id && ! is_wp_error( $page_id ) ) {
        update_post_meta( $page_id, '_wp_page_template', 'page-punto-digital.php' );
        update_option( 'tailpress_punto_digital_page_done', true );
    }
}
add_action( 'init', 'tailpress_ensure_punto_digital_page' );

function tailpress_ensure_turnos_transito_page(): void {
    if ( get_option( 'tailpress_turnos_transito_page_done' ) ) {
        return;
    }

    $existing = get_page_by_path( 'turnos-de-transito' );

    if ( $existing ) {
        if ( get_page_template_slug( $existing->ID ) !== 'page-turnos-transito.php' ) {
            update_post_meta( $existing->ID, '_wp_page_template', 'page-turnos-transito.php' );
        }
        update_option( 'tailpress_turnos_transito_page_done', true );
        return;
    }

    $page_id = wp_insert_post( [
        'post_title'   => 'Turnos Tránsito',
        'post_name'    => 'turnos-de-transito',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '',
    ] );

    if ( $page_id && ! is_wp_error( $page_id ) ) {
        update_post_meta( $page_id, '_wp_page_template', 'page-turnos-transito.php' );
        flush_rewrite_rules( false );
        update_option( 'tailpress_turnos_transito_page_done', true );
    }
}
add_action( 'init', 'tailpress_ensure_turnos_transito_page' );

/**
 * Repara páginas de áreas que quedaron sin template o sin crear en instalaciones previas.
 * Cubre los 404 de Oficina de Empleo / Cultura / Educación y áreas con template vacío.
 */
function tailpress_ensure_area_pages(): void {
    // Permitir forzar vía ?tp_fix_pages=1
    $force_pages = isset($_GET['tp_fix_pages']) && current_user_can('edit_pages');
    $map = [
        'obras-publicas'      => 'page-obras-publicas.php',
        'oficina-empleo'      => 'page-oficina-empleo.php',
        'educacion'           => 'page-educacion.php',
        'cultura'             => 'page-cultura.php',
        'deporte'             => 'page-deporte.php',
        'punto-digital'       => 'page-punto-digital.php',
        'seguridad'           => 'page-seguridad.php',
        'alumbrado'           => 'page-alumbrado.php',
        'politicas-sociales'  => 'page-politicas-sociales.php',
        'cisi'                => 'page-tramites-rentas.php',
        'cementerio'          => 'page-tramites-rentas.php',
        'tem'                 => 'page-tramites-rentas.php',
        'accion-social'       => 'page-politicas-sociales.php',
    ];

    // Si todas ya están bien, no tocar rewrites ni DB.
    $did_fix = false;
    foreach ( $map as $slug => $template ) {
        $page = get_page_by_path( $slug, OBJECT, 'page' );
        if ( ! $page ) {
            $title = ucwords( str_replace( '-', ' ', $slug ) );
            // Títulos legibles para los casos especiales.
            $titles = [
                'obras-publicas' => 'Obras Públicas',
                'oficina-empleo' => 'Oficina de Empleo',
                'politicas-sociales' => 'Políticas Sociales',
                'cisi' => 'CISI',
                'cementerio' => 'Cementerio',
                'tem' => 'TEM',
                'accion-social' => 'Acción Social',
                'alumbrado' => 'Alumbrado Público',
            ];
            if ( isset( $titles[ $slug ] ) ) {
                $title = $titles[ $slug ];
            }
            $id = wp_insert_post( [
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ] );
            if ( $id && ! is_wp_error( $id ) ) {
                update_post_meta( $id, '_wp_page_template', $template );
                $did_fix = true;
            }
            continue;
        }
        if ( get_page_template_slug( $page->ID ) !== $template ) {
            update_post_meta( $page->ID, '_wp_page_template', $template );
            $did_fix = true;
        }
        // Rehabilitar páginas en papelera o borrador que causan 404 intermitente.
        if ( $page->post_status !== 'publish' ) {
            wp_update_post( [ 'ID' => $page->ID, 'post_status' => 'publish' ] );
            $did_fix = true;
        }
    }

    if ( $did_fix ) {
        flush_rewrite_rules( false );
    }
}
add_action( 'init', 'tailpress_ensure_area_pages', 20 );

// Aviso en admin si faltan páginas de áreas o galerías están vacías

// Avisos temporales de galerías removidos para mantener el panel limpio.


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
    $form_ts  = absint($_POST['contacto_ts'] ?? 0);

    // Check Honeypot (if filled out, it's a bot)
    if (!empty($_POST['url_website'])) {
        wp_send_json_error('Error al procesar la solicitud. Intente nuevamente.');
    }

    // Tiempo mínimo de completado: evita bots que disparan el form instantáneamente
    if (!$form_ts || (time() - $form_ts) < 4) {
        wp_send_json_error('Detectamos un envío inválido. Esperá unos segundos e intentá nuevamente.');
    }

    // Rate Limiting por IP y huella del mensaje
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $transient_name = 'contacto_limit_' . md5($ip);
    $attempts_name  = 'contacto_attempts_' . md5($ip);
    $fingerprint    = md5(strtolower(trim($nombre . '|' . $apellido . '|' . $telefono . '|' . $consulta)));
    $fingerprint_name = 'contacto_fingerprint_' . $fingerprint;
    
    if (get_transient($transient_name)) {
        wp_send_json_error('Por favor, esperá unos minutos antes de enviar otra consulta.');
    }

    if (get_transient($fingerprint_name)) {
        wp_send_json_error('Ya recibimos una consulta igual hace instantes. Si necesitás agregar algo, esperá unos minutos antes de reenviar.');
    }

    $attempts = get_transient($attempts_name);
    $attempts = is_array($attempts) ? $attempts : [];
    $cutoff   = time() - (15 * MINUTE_IN_SECONDS);
    $attempts = array_values(array_filter($attempts, static function ($ts) use ($cutoff) {
        return is_numeric($ts) && (int) $ts >= $cutoff;
    }));

    if (count($attempts) >= 3) {
        wp_send_json_error('Recibimos varias consultas desde esta conexión en poco tiempo. Esperá 15 minutos antes de enviar otra.');
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
        $attempts[] = time();
        set_transient($attempts_name, $attempts, 15 * MINUTE_IN_SECONDS);
        set_transient($transient_name, true, 3 * MINUTE_IN_SECONDS);
        set_transient($fingerprint_name, true, 10 * MINUTE_IN_SECONDS);
        wp_send_json_success('Consulta enviada exitosamente.');
    } else {
        // En caso de que el hosting todavía no pueda enviar correos
        wp_send_json_error('Error en el servidor al enviar el correo. Por favor contactate por teléfono.');
    }
}
add_action('wp_ajax_submit_contacto_form', 'tailpress_handle_contacto_form');
add_action('wp_ajax_nopriv_submit_contacto_form', 'tailpress_handle_contacto_form');

// Cambiar el nombre y mail del remitente por defecto de WordPress
add_filter('wp_mail_from', function($original_email_address) {
    return 'contacto@municipalidadalderetes.com.ar';
});
add_filter('wp_mail_from_name', function($original_email_from) {
    return 'Web Municipalidad de Alderetes';
});

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

function tp_buscar_turno_por_numero(string $numero): ?int {
    $query = new WP_Query([
        'post_type'      => 'tp_turno',
        'post_status'    => ['publish', 'pending'],
        'posts_per_page' => 1,
        'meta_query'     => [
            ['key' => '_turno_numero', 'value' => $numero, 'compare' => '='],
        ],
        'fields' => 'ids',
    ]);

    return ! empty($query->posts) ? (int) $query->posts[0] : null;
}

function tp_validar_cancelacion_turno_por_ciudadano(string $numero, string $token): array {
    $numero = sanitize_text_field($numero);
    $token  = sanitize_text_field($token);

    if (!$numero || !$token) {
        return ['ok' => false, 'mensaje' => 'Faltan datos para cancelar el turno.'];
    }

    $turno_id = tp_buscar_turno_por_numero($numero);

    if (!$turno_id) {
        return ['ok' => false, 'mensaje' => 'No encontramos un turno con ese número.'];
    }

    $token_guardado = (string) get_post_meta($turno_id, '_turno_cancel_token', true);
    if (!$token_guardado || !hash_equals($token_guardado, $token)) {
        return ['ok' => false, 'mensaje' => 'El enlace de cancelación no es válido o venció.'];
    }

    $estado_actual = get_post_meta($turno_id, '_turno_estado', true) ?: 'pendiente';
    if ($estado_actual === 'cancelado') {
        return ['ok' => true, 'estado' => 'cancelado', 'turno_id' => $turno_id, 'mensaje' => 'Este turno ya estaba cancelado.'];
    }

    if ($estado_actual !== 'pendiente') {
        return ['ok' => false, 'estado' => $estado_actual, 'turno_id' => $turno_id, 'mensaje' => 'Este turno ya no puede cancelarse online.'];
    }

    return [
        'ok'       => true,
        'estado'   => $estado_actual,
        'turno_id' => $turno_id,
        'numero'   => get_post_meta($turno_id, '_turno_numero', true),
        'nombre'   => get_post_meta($turno_id, '_turno_nombre', true),
        'fecha'    => get_post_meta($turno_id, '_turno_fecha', true),
        'hora'     => get_post_meta($turno_id, '_turno_hora', true),
    ];
}

function tp_cancelar_turno_por_ciudadano(string $numero, string $token): array {
    $validacion = tp_validar_cancelacion_turno_por_ciudadano($numero, $token);
    if (empty($validacion['ok'])) {
        return $validacion;
    }

    if (($validacion['estado'] ?? '') === 'cancelado') {
        return ['ok' => true, 'mensaje' => 'Este turno ya estaba cancelado.'];
    }

    $turno_id = (int) $validacion['turno_id'];
    $numero   = (string) ($validacion['numero'] ?? $numero);

    update_post_meta($turno_id, '_turno_estado', 'cancelado');
    update_post_meta($turno_id, '_turno_cancelado_por', 'ciudadano');
    update_post_meta($turno_id, '_turno_cancelado_at', current_time('mysql'));

    $email  = get_post_meta($turno_id, '_turno_email', true);
    $nombre = $validacion['nombre'] ?? get_post_meta($turno_id, '_turno_nombre', true);
    $fecha  = $validacion['fecha'] ?? get_post_meta($turno_id, '_turno_fecha', true);
    $hora   = $validacion['hora'] ?? get_post_meta($turno_id, '_turno_hora', true);

    if ($email) {
        tp_enviar_email_cancelacion($email, $nombre, $numero, $fecha, $hora);
    }

    return ['ok' => true, 'mensaje' => 'Tu turno fue cancelado y el horario volvió a quedar disponible.'];
}

// --- ¿El día está habilitado? ---
function tp_dia_habilitado(string $fecha): bool {
    $timezone = wp_timezone();
    $hoy = new DateTimeImmutable('today', $timezone);
    $max_fecha = $hoy->modify('+30 days');
    $fecha_obj = DateTimeImmutable::createFromFormat('!Y-m-d', $fecha, $timezone);
    $errores = DateTimeImmutable::getLastErrors();

    if (
        !$fecha_obj
        || ($errores !== false && ($errores['warning_count'] > 0 || $errores['error_count'] > 0))
        || $fecha_obj->format('Y-m-d') !== $fecha
        || $fecha_obj < $hoy
        || $fecha_obj > $max_fecha
    ) {
        return false;
    }

    $dow = (int) $fecha_obj->format('N'); // 1=Lun, 7=Dom
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
        'capability_type' => ['tp_turno','tp_turnos'],
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
        'turno_email'     => '_turno_email',
        'turno_categoria' => '_turno_categoria',
    ];
    if (isset($map[$col])) {
        echo esc_html(get_post_meta($post_id, $map[$col], true));
        return;
    }
    if ($col === 'turno_telefono') {
        $tel = get_post_meta($post_id, '_turno_telefono', true);
        echo esc_html($tel);
        if ($tel) {
            $clean_tel = preg_replace('/[^0-9]/', '', $tel);
            if ($clean_tel !== '') {
                if (substr($clean_tel, 0, 2) !== '54') {
                    $clean_tel = '549' . ltrim($clean_tel, '0');
                }
                $nombre = get_post_meta($post_id, '_turno_nombre', true);
                $fecha  = get_post_meta($post_id, '_turno_fecha', true);
                $hora   = get_post_meta($post_id, '_turno_hora', true);
                $num    = get_post_meta($post_id, '_turno_numero', true);
                $cat    = get_post_meta($post_id, '_turno_categoria', true);
                $msg    = rawurlencode("Hola {$nombre}, te recordamos tu turno de Licencia de Conducir N° {$num} ({$cat}) para el día {$fecha} a las {$hora} hs en la Dirección de Tránsito de Alderetes.");
                $wa_url = "https://web.whatsapp.com/send?phone={$clean_tel}&text={$msg}";
                echo ' <a href="' . esc_url($wa_url) . '" target="_blank" title="Enviar mensaje por WhatsApp al vecino" style="background:#25D366;color:#fff;padding:2px 6px;border-radius:4px;font-size:11px;font-weight:bold;text-decoration:none;margin-left:4px;display:inline-block;">WhatsApp</a>';
            }
        }
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

// Acciones rápidas para la atención diaria. Los estados nunca cambian por el
// paso del tiempo: sólo una persona del área puede confirmar una atención.
add_filter('bulk_actions-edit-tp_turno', function ($actions) {
    $actions['tp_marcar_atendido']  = 'Marcar como atendido';
    $actions['tp_marcar_ausente']   = 'Marcar como ausente';
    $actions['tp_marcar_cancelado'] = 'Marcar como cancelado';
    return $actions;
});

add_filter('handle_bulk_actions-edit-tp_turno', function ($redirect, $action, $post_ids) {
    $estados = [
        'tp_marcar_atendido'  => 'atendido',
        'tp_marcar_ausente'   => 'ausente',
        'tp_marcar_cancelado' => 'cancelado',
    ];
    if (!isset($estados[$action])) return $redirect;

    $actualizados = 0;
    foreach ($post_ids as $post_id) {
        if (!current_user_can('edit_post', $post_id)) continue;
        $estado_anterior = get_post_meta($post_id, '_turno_estado', true) ?: 'pendiente';
        update_post_meta($post_id, '_turno_estado', $estados[$action]);
        if ($estados[$action] === 'cancelado' && $estado_anterior !== 'cancelado') {
            $email = get_post_meta($post_id, '_turno_email', true);
            if ($email) {
                tp_enviar_email_cancelacion(
                    $email,
                    get_post_meta($post_id, '_turno_nombre', true),
                    get_post_meta($post_id, '_turno_numero', true),
                    get_post_meta($post_id, '_turno_fecha', true),
                    get_post_meta($post_id, '_turno_hora', true)
                );
            }
        }
        $actualizados++;
    }
    return add_query_arg('tp_actualizados', $actualizados, $redirect);
}, 10, 3);

add_action('admin_notices', function () {
    if (empty($_GET['tp_actualizados'])) return;
    printf('<div class="notice notice-success is-dismissible"><p>%d turno(s) actualizado(s).</p></div>', (int) $_GET['tp_actualizados']);
});

// Filtro por fecha en el listado admin
add_filter('months_dropdown_results', function ($months, $post_type) {
    // El selector estándar filtra por fecha de creación del registro, no por
    // la fecha del turno; se oculta para evitar resultados engañosos.
    return $post_type === 'tp_turno' ? [] : $months;
}, 10, 2);

add_action('restrict_manage_posts', function ($post_type) {
    if ($post_type !== 'tp_turno') return;
    $desde = isset($_GET['turno_fecha_desde']) ? sanitize_text_field($_GET['turno_fecha_desde']) : '';
    $hasta = isset($_GET['turno_fecha_hasta']) ? sanitize_text_field($_GET['turno_fecha_hasta']) : '';
    echo '<label style="margin-right:4px">Desde <input type="date" name="turno_fecha_desde" value="' . esc_attr($desde) . '"></label>';
    echo '<label style="margin-right:4px">Hasta <input type="date" name="turno_fecha_hasta" value="' . esc_attr($hasta) . '"></label>';
    $export_url = add_query_arg([
        'action'              => 'tp_exportar_turnos_csv',
        'turno_fecha_desde'   => $desde,
        'turno_fecha_hasta'   => $hasta,
    ], admin_url('admin-post.php'));
    $export_url = wp_nonce_url($export_url, 'tp_exportar_turnos_csv');
    echo '<a href="' . esc_url($export_url) . '" class="button" style="margin-left:4px">Exportar CSV</a>';
});

add_action('admin_post_tp_exportar_turnos_csv', function () {
    if (!current_user_can('edit_tp_turnos') && !current_user_can('edit_posts')) wp_die('No tenés permisos para exportar turnos.');
    check_admin_referer('tp_exportar_turnos_csv');

    $desde = isset($_GET['turno_fecha_desde']) ? sanitize_text_field($_GET['turno_fecha_desde']) : '';
    $hasta = isset($_GET['turno_fecha_hasta']) ? sanitize_text_field($_GET['turno_fecha_hasta']) : '';
    $args = ['post_type' => 'tp_turno', 'post_status' => ['publish', 'pending'], 'posts_per_page' => -1];
    $meta_query = ['relation' => 'AND'];
    if ($desde) $meta_query[] = ['key' => '_turno_fecha', 'value' => $desde, 'compare' => '>=', 'type' => 'DATE'];
    if ($hasta) $meta_query[] = ['key' => '_turno_fecha', 'value' => $hasta, 'compare' => '<=', 'type' => 'DATE'];
    if (count($meta_query) > 1) {
        $args['meta_query'] = $meta_query;
    }
    $turnos = get_posts($args);
    usort($turnos, function ($a, $b) {
        return strcmp(get_post_meta($a->ID, '_turno_fecha', true) . get_post_meta($a->ID, '_turno_hora', true), get_post_meta($b->ID, '_turno_fecha', true) . get_post_meta($b->ID, '_turno_hora', true));
    });

    $periodo = $desde || $hasta ? '-' . ($desde ?: 'inicio') . '-a-' . ($hasta ?: 'hoy') : '';
    $nombre = 'turnos-transito' . $periodo . '.csv';
    nocache_headers();
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="' . $nombre . '"');
    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF"); // Excel reconoce correctamente los acentos.
    fputcsv($out, ['N° de turno', 'Fecha', 'Hora', 'Nombre', 'DNI', 'Teléfono', 'Email', 'Categoría', 'Estado'], ';');
    foreach ($turnos as $turno) {
        $id = $turno->ID;
        fputcsv($out, [
            get_post_meta($id, '_turno_numero', true), get_post_meta($id, '_turno_fecha', true), get_post_meta($id, '_turno_hora', true),
            get_post_meta($id, '_turno_nombre', true), get_post_meta($id, '_turno_dni', true), get_post_meta($id, '_turno_telefono', true),
            get_post_meta($id, '_turno_email', true), get_post_meta($id, '_turno_categoria', true), ucfirst(get_post_meta($id, '_turno_estado', true) ?: 'pendiente'),
        ], ';');
    }
    fclose($out);
    exit;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || $query->get('post_type') !== 'tp_turno') return;
    $desde = !empty($_GET['turno_fecha_desde']) ? sanitize_text_field($_GET['turno_fecha_desde']) : '';
    $hasta = !empty($_GET['turno_fecha_hasta']) ? sanitize_text_field($_GET['turno_fecha_hasta']) : '';
    if ($desde || $hasta) {
        $meta_query = ['relation' => 'AND'];
        if ($desde) $meta_query[] = ['key' => '_turno_fecha', 'value' => $desde, 'compare' => '>=', 'type' => 'DATE'];
        if ($hasta) $meta_query[] = ['key' => '_turno_fecha', 'value' => $hasta, 'compare' => '<=', 'type' => 'DATE'];
        $query->set('meta_query', $meta_query);
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
        '_turno_cancel_token' => 'Token de cancelación',
    ];
    wp_nonce_field('tp_turno_save', 'tp_turno_nonce');
    echo '<table class="form-table"><tbody>';
    foreach ($fields as $key => $label) {
        $val = get_post_meta($post->ID, $key, true);
        $readonly = in_array($key, ['_turno_numero', '_turno_cancel_token'], true) ? 'readonly' : '';
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

function tp_horario_ya_reservado(string $fecha, string $hora, int $excepto_id = 0): bool {
    $turnos = get_posts([
        'post_type'      => 'tp_turno',
        'post_status'    => ['publish', 'pending'],
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'post__not_in'   => $excepto_id ? [$excepto_id] : [],
        'meta_query'     => [
            'relation' => 'AND',
            ['key' => '_turno_fecha', 'value' => $fecha, 'compare' => '='],
            ['key' => '_turno_hora', 'value' => $hora, 'compare' => '='],
        ],
    ]);
    foreach ($turnos as $turno_id) {
        if (get_post_meta($turno_id, '_turno_estado', true) !== 'cancelado') return true;
    }
    return false;
}

add_action('save_post_tp_turno', function ($post_id) {
    if (!isset($_POST['tp_turno_nonce']) || !wp_verify_nonce($_POST['tp_turno_nonce'], 'tp_turno_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    $fields = ['_turno_fecha','_turno_hora','_turno_nombre','_turno_dni','_turno_telefono','_turno_email','_turno_categoria','_turno_estado'];
    $old_estado = get_post_meta($post_id, '_turno_estado', true);
    $fecha_nueva = isset($_POST['_turno_fecha']) ? sanitize_text_field($_POST['_turno_fecha']) : get_post_meta($post_id, '_turno_fecha', true);
    $hora_nueva  = isset($_POST['_turno_hora']) ? sanitize_text_field($_POST['_turno_hora']) : get_post_meta($post_id, '_turno_hora', true);
    $estado_nuevo = isset($_POST['_turno_estado']) ? sanitize_text_field($_POST['_turno_estado']) : $old_estado;
    if ($estado_nuevo !== 'cancelado' && tp_horario_ya_reservado($fecha_nueva, $hora_nueva, (int) $post_id)) {
        unset($_POST['_turno_fecha'], $_POST['_turno_hora']);
        set_transient('tp_turno_conflicto_' . get_current_user_id(), true, MINUTE_IN_SECONDS);
    }
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

add_action('admin_notices', function () {
    $key = 'tp_turno_conflicto_' . get_current_user_id();
    if (!get_transient($key)) return;
    delete_transient($key);
    echo '<div class="notice notice-error is-dismissible"><p>No se modificaron la fecha ni la hora: ese horario ya está ocupado por otro turno activo.</p></div>';
});

// --- Página admin: Bloquear fechas ---
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=tp_turno',
        'Bloquear Fechas',
        'Bloquear Fechas',
        'edit_tp_turnos',
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

/**
 * Categorías de licencia válidas para el formulario de turnos.
 * Fuente única de verdad: usada por la validación AJAX y por el <select> del template.
 */
function tp_turnos_categorias_validas(): array {
    return [
        'Renovación A+B1 (Hasta 70 días desde vto.)',
        'Renovación C1-C2 (Hasta 70 días desde vto.)',
        'Renovación D1-D2-D3 (Hasta 70 días desde vto.)',
        'Renovación E2 (Hasta 70 días desde vto.)',
        'Renovación Mayores de 65 años (Hasta 70 días desde vto.)',
        'Duplicado de Licencia',
        // Compatibilidad: valores legacy que aún pueden llegar desde caché/CDN
        'Renovación A+B (Particular)',
        'Renovación C1-C2 (Profesional)',
        'Renovación D1-D2-D3 (Profesional)',
        'Renovación E2 (Profesional)',
        'Ampliación C',
        'Ampliación D',
        'Ampliación E',
        'Principiante Mayor de Edad',
        'Principiante Menor de Edad',
        'Mayores de 65 Años',
        'Duplicado',
    ];
}

// --- AJAX: Reservar turno ---
add_action('wp_ajax_tp_reservar',        'tp_ajax_reservar');
add_action('wp_ajax_nopriv_tp_reservar', 'tp_ajax_reservar');
function tp_ajax_reservar() {
    check_ajax_referer('tp_turnos_nonce', 'nonce');
    $fecha     = sanitize_text_field($_POST['fecha']     ?? '');
    $hora      = sanitize_text_field($_POST['hora']      ?? '');
    $nombre    = sanitize_text_field($_POST['nombre']    ?? '');
    $dni       = preg_replace('/\D+/', '', sanitize_text_field($_POST['dni'] ?? ''));
    $telefono  = sanitize_text_field($_POST['telefono']  ?? '');
    $email     = sanitize_email($_POST['email']          ?? '');
    $categoria = sanitize_text_field($_POST['categoria'] ?? '');
    $form_ts   = absint($_POST['turno_ts'] ?? 0);

    if (!empty($_POST['turno_website'])) {
        wp_send_json_error(['mensaje' => 'No pudimos procesar la solicitud. Intentá nuevamente.']);
    }

    if (!$form_ts || (time() - $form_ts) < 4 || (time() - $form_ts) > HOUR_IN_SECONDS) {
        wp_send_json_error(['mensaje' => 'La sesión del formulario no es válida. Recargá la página e intentá nuevamente.']);
    }

    if (!$fecha || !$hora || !$nombre || !$dni || !$email) {
        wp_send_json_error(['mensaje' => 'Faltan datos obligatorios.']);
    }
    if (!preg_match('/^\d{7,8}$/', $dni)) {
        wp_send_json_error(['mensaje' => 'Ingresá un DNI válido, sin puntos ni espacios.']);
    }
    if (!is_email($email)) {
        wp_send_json_error(['mensaje' => 'Ingresá una dirección de email válida.']);
    }

    $categorias_validas = tp_turnos_categorias_validas();
    if (!in_array($categoria, $categorias_validas, true)) {
        wp_send_json_error(['mensaje' => 'Seleccioná una categoría de licencia válida.']);
    }

    $ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    $rate_key = 'tp_turno_rate_' . md5($ip);
    $attempts = get_transient($rate_key);
    $attempts = is_array($attempts) ? $attempts : [];
    $cutoff = time() - (15 * MINUTE_IN_SECONDS);
    $attempts = array_values(array_filter($attempts, static function ($timestamp) use ($cutoff): bool {
        return is_numeric($timestamp) && (int) $timestamp >= $cutoff;
    }));

    if (count($attempts) >= 5) {
        wp_send_json_error(['mensaje' => 'Se realizaron varias solicitudes desde esta conexión. Esperá 15 minutos antes de intentar nuevamente.']);
    }

    $attempts[] = time();
    set_transient($rate_key, $attempts, 15 * MINUTE_IN_SECONDS);

    $fingerprint_key = 'tp_turno_request_' . md5(strtolower($fecha . '|' . $hora . '|' . $dni . '|' . $email));
    if (get_transient($fingerprint_key)) {
        wp_send_json_error(['mensaje' => 'Esta solicitud ya fue recibida. Revisá tu email antes de volver a intentarlo.']);
    }

    if (!tp_dia_habilitado($fecha)) {
        wp_send_json_error(['mensaje' => 'La fecha seleccionada no está disponible.']);
    }
    $slots_validos = tp_get_slots();
    if (!in_array($hora, $slots_validos, true)) {
        wp_send_json_error(['mensaje' => 'El horario seleccionado no es válido.']);
    }
    $lock_option = '_tp_turno_lock_' . md5($fecha . '|' . $hora);
    if (!add_option($lock_option, time(), '', false)) {
        $lock_created_at = (int) get_option($lock_option, 0);
        if ($lock_created_at < (time() - MINUTE_IN_SECONDS)) {
            delete_option($lock_option);
        }

        if (!add_option($lock_option, time(), '', false)) {
            wp_send_json_error(['mensaje' => 'Ese horario se está procesando. Esperá unos segundos y volvé a intentarlo.']);
        }
    }

    $ocupados = tp_get_turnos_ocupados($fecha);
    if (in_array($hora, $ocupados, true)) {
        delete_option($lock_option);
        wp_send_json_error(['mensaje' => 'Ese horario ya está reservado. Por favor elegí otro.']);
    }

    do {
        $numero = 'T' . strtoupper(wp_generate_password(6, false, false));
    } while (tp_buscar_turno_por_numero($numero));

    $cancel_token = wp_generate_password(32, false, false);

    $post_id = wp_insert_post([
        'post_type'   => 'tp_turno',
        'post_title'  => "Turno {$numero} – {$nombre}",
        'post_status' => 'publish',
    ]);

    if (!$post_id || is_wp_error($post_id)) {
        delete_option($lock_option);
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
        '_turno_cancel_token' => $cancel_token,
    ] as $key => $val) {
        update_post_meta($post_id, $key, $val);
    }

    set_transient($fingerprint_key, true, 10 * MINUTE_IN_SECONDS);
    delete_option($lock_option);

    tp_enviar_email_confirmacion($email, $nombre, $numero, $fecha, $hora, $categoria, $cancel_token);

    wp_send_json_success(['numero' => $numero, 'mensaje' => '¡Turno reservado con éxito!']);
}

// --- Emails ---
function tp_email_headers(): array {
    return ['Content-Type: text/html; charset=UTF-8', 'From: Municipalidad de Alderetes <' . TP_TURNO_EMAIL_ADMIN . '>'];
}

function tp_enviar_email_confirmacion(string $email, string $nombre, string $numero, string $fecha, string $hora, string $categoria, string $cancel_token): void {
    $fecha_fmt = date('d/m/Y', strtotime($fecha));
    $subject   = "✅ Turno confirmado – {$numero} | Municipalidad de Alderetes";
    $cancel_url = add_query_arg([
        'cancelar_turno' => rawurlencode($numero),
        'token'          => rawurlencode($cancel_token),
    ], home_url('/turnos-de-transito/'));
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
        <p style='color:#6b7280;font-size:13px'>Si no podés asistir, podés cancelar tu turno desde este enlace y el horario volverá a quedar disponible.</p>
        <p style='margin-top:20px'>
            <a href='" . esc_url($cancel_url) . "' style='display:inline-block;background:#dc2626;color:#fff;text-decoration:none;padding:12px 18px;border-radius:10px;font-weight:700'>
                Cancelar turno
            </a>
        </p>
        <p style='color:#9ca3af;font-size:12px'>Si el botón no funciona, copiá y pegá este enlace en tu navegador:<br>" . esc_html($cancel_url) . "</p>
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

// --- Roles específicos para Tribunal de Faltas y Tránsito ---
// Se crean en init con capacidades mínimas para gestionar solo lo que necesitan.
add_action('init', function () {
    // Rol Tránsito: gestiona turnos (tp_turno) y lee páginas
    if (!get_role('transito')) {
        add_role('transito', 'Tránsito', [
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
            'publish_posts' => false,
            'upload_files' => true,
        ]);
    }
    // Asegurar caps sobre tp_turno
    $role = get_role('transito');
    if ($role) {
        $caps = ['edit_tp_turno','read_tp_turno','delete_tp_turno','edit_tp_turnos','edit_others_tp_turnos','publish_tp_turnos','read_private_tp_turnos','delete_tp_turnos','delete_private_tp_turnos','delete_published_tp_turnos','delete_others_tp_turnos','edit_private_tp_turnos','edit_published_tp_turnos'];
        foreach ($caps as $cap) { $role->add_cap($cap); }
        $role->add_cap('read'); $role->add_cap('level_1');
        $role->remove_cap('edit_pages');
    }
    // Rol Tribunal de Faltas: gestiona multas (tp_multa) y consulta
    if (!get_role('tribunal_faltas')) {
        add_role('tribunal_faltas', 'Tribunal de Faltas', [
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
            'publish_posts' => false,
            'upload_files' => true,
        ]);
    }
    $role2 = get_role('tribunal_faltas');
    if ($role2) {
        $caps2 = ['edit_tp_multa','read_tp_multa','delete_tp_multa','edit_tp_multas','edit_others_tp_multas','publish_tp_multas','read_private_tp_multas','delete_tp_multas','delete_private_tp_multas','delete_published_tp_multas','delete_others_tp_multas','edit_private_tp_multas','edit_published_tp_multas'];
        foreach ($caps2 as $cap) { $role2->add_cap($cap); }
        $role2->add_cap('read'); $role2->add_cap('level_1');
        $role2->remove_cap('edit_pages');
    }
    // Admin y editor heredan todo
    foreach (['administrator','editor'] as $r) {
        $adm = get_role($r);
        if ($adm) {
            foreach (['edit_tp_turno','edit_tp_turnos','edit_others_tp_turnos','publish_tp_turnos','delete_tp_turnos','read_private_tp_turnos','edit_tp_multa','edit_tp_multas','edit_others_tp_multas','publish_tp_multas'] as $c) { $adm->add_cap($c); }
        }
    }
});

// CPT para Tribunal de Faltas: multas/infracciones
add_action('init', function () {
    register_post_type('tp_multa', [
        'labels' => [
            'name' => 'Tribunal de Faltas',
            'singular_name' => 'Multa',
            'menu_name' => 'Tribunal de Faltas',
            'add_new' => 'Cargar multa',
            'add_new_item' => 'Cargar nueva multa',
            'edit_item' => 'Editar multa',
            'new_item' => 'Nueva multa',
            'view_item' => 'Ver multa',
            'search_items' => 'Buscar multas',
            'not_found' => 'No hay multas cargadas',
            'not_found_in_trash' => 'No hay multas en la papelera',
        ],
        'public' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 27,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => ['title'],
        'capability_type' => ['tp_multa','tp_multas'],
        'map_meta_cap' => true,
        'has_archive' => false,
        'rewrite' => false,
    ]);
});
add_action('add_meta_boxes_tp_multa', function () {
    add_meta_box('tp_multa_datos', 'Datos de la multa', 'tp_multa_metabox_cb', 'tp_multa', 'normal', 'high');
});
function tp_multa_metabox_cb($post) {
    wp_nonce_field('tp_multa_save','tp_multa_nonce');
    $patente = get_post_meta($post->ID, '_tp_multa_patente', true);
    $dni = get_post_meta($post->ID, '_tp_multa_dni', true);
    $infraccion = get_post_meta($post->ID, '_tp_multa_infraccion', true);
    $monto = get_post_meta($post->ID, '_tp_multa_monto', true);
    $estado = get_post_meta($post->ID, '_tp_multa_estado', true) ?: 'pendiente';
    $fecha = get_post_meta($post->ID, '_tp_multa_fecha', true);
    ?>
    <p><label><strong>Patente *</strong></label><br><input type="text" name="tp_multa_patente" value="<?php echo esc_attr($patente); ?>" class="regular-text" style="text-transform:uppercase" placeholder="Ej. AA123BB" required></p>
    <p><label><strong>DNI / CUIT titular</strong></label><br><input type="text" name="tp_multa_dni" value="<?php echo esc_attr($dni); ?>" class="regular-text"></p>
    <p><label><strong>Infracción / acta</strong></label><br><input type="text" name="tp_multa_infraccion" value="<?php echo esc_attr($infraccion); ?>" class="widefat" placeholder="Ej. Exceso de velocidad - Acta 1234"></p>
    <p><label><strong>Monto</strong></label><br><input type="text" name="tp_multa_monto" value="<?php echo esc_attr($monto); ?>" class="regular-text" placeholder="Ej. 15000"></p>
    <p><label><strong>Fecha de la infracción</strong></label><br><input type="date" name="tp_multa_fecha" value="<?php echo esc_attr($fecha); ?>"></p>
    <p><label><strong>Estado</strong></label><br><select name="tp_multa_estado"><option value="pendiente" <?php selected($estado,'pendiente'); ?>>Pendiente</option><option value="pagada" <?php selected($estado,'pagada'); ?>>Pagada</option><option value="anulada" <?php selected($estado,'anulada'); ?>>Anulada</option></select></p>
    <p class="description">La patente se usa para la consulta pública de Libre Deuda (normalizada a mayúsculas sin espacios).</p>
    <?php
}
add_action('save_post_tp_multa', function ($post_id) {
    if (!isset($_POST['tp_multa_nonce']) || !wp_verify_nonce($_POST['tp_multa_nonce'],'tp_multa_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post',$post_id)) return;
    $pat = strtoupper(preg_replace('/\s+/','', sanitize_text_field($_POST['tp_multa_patente'] ?? '')));
    if ($pat !== '') update_post_meta($post_id,'_tp_multa_patente',$pat); else delete_post_meta($post_id,'_tp_multa_patente');
    update_post_meta($post_id,'_tp_multa_dni', sanitize_text_field($_POST['tp_multa_dni'] ?? ''));
    update_post_meta($post_id,'_tp_multa_infraccion', sanitize_text_field($_POST['tp_multa_infraccion'] ?? ''));
    update_post_meta($post_id,'_tp_multa_monto', sanitize_text_field($_POST['tp_multa_monto'] ?? ''));
    update_post_meta($post_id,'_tp_multa_fecha', sanitize_text_field($_POST['tp_multa_fecha'] ?? ''));
    $est = sanitize_key($_POST['tp_multa_estado'] ?? 'pendiente');
    if (!in_array($est,['pendiente','pagada','anulada'],true)) $est='pendiente';
    update_post_meta($post_id,'_tp_multa_estado',$est);
});
add_filter('manage_tp_multa_posts_columns', function ($cols) {
    return ['cb'=>$cols['cb'],'title'=>'Acta / Título','tp_patente'=>'Patente','tp_estado'=>'Estado','tp_monto'=>'Monto','tp_fecha'=>'Fecha','date'=>'Fecha carga'];
});
add_action('manage_tp_multa_posts_custom_column', function ($col,$post_id){
    if ($col==='tp_patente') echo esc_html(get_post_meta($post_id,'_tp_multa_patente',true));
    elseif ($col==='tp_estado'){ $e=get_post_meta($post_id,'_tp_multa_estado',true)?:'pendiente'; $c=['pendiente'=>'#f59e0b','pagada'=>'#10b981','anulada'=>'#6b7280'][$e]??'#6b7280'; printf('<span style="background:%s;color:#fff;padding:2px 8px;border-radius:999px;font-size:12px;font-weight:600">%s</span>',$c,ucfirst($e));}
    elseif ($col==='tp_monto') echo esc_html(get_post_meta($post_id,'_tp_multa_monto',true));
    elseif ($col==='tp_fecha') echo esc_html(get_post_meta($post_id,'_tp_multa_fecha',true));
},10,2);

// Limitar qué ve cada rol en el admin (opcional: ocultar lo que no le compete)
add_action('admin_menu', function (){
    if (current_user_can('administrator')) return;
    if (current_user_can('edit_tp_turno') && !current_user_can('edit_tp_multa')) {
        remove_menu_page('edit.php?post_type=tp_multa');
        remove_menu_page('edit.php?post_type=tp_cargo');
        remove_menu_page('edit.php?post_type=noticia');
    }
    if (current_user_can('edit_tp_multa') && !current_user_can('edit_tp_turno')) {
        remove_menu_page('edit.php?post_type=tp_turno');
        remove_menu_page('edit.php?post_type=tp_cargo');
        remove_menu_page('edit.php?post_type=noticia');
    }
}, 99);


/* =====================================================================
 *  NOTICIAS — Custom Post Type editable desde el admin de WordPress
 *  --------------------------------------------------------------------
 *  Crea un menú "Noticias" en el admin para que el equipo de la
 *  Municipalidad pueda dar de alta noticias con título, bajada, imagen
 *  destacada y categoría. Las noticias se renderizan en la home
 *  (template-parts/noticias-section.php).
 * ===================================================================== */

add_action('init', function () {

    // CPT: noticia
    register_post_type('noticia', [
        'labels' => [
            'name'                  => 'Noticias',
            'singular_name'         => 'Noticia',
            'menu_name'             => 'Noticias',
            'add_new'               => 'Añadir Noticia',
            'add_new_item'          => 'Añadir Nueva Noticia',
            'edit_item'             => 'Editar Noticia',
            'new_item'              => 'Nueva Noticia',
            'view_item'             => 'Ver Noticia',
            'search_items'          => 'Buscar Noticias',
            'not_found'             => 'No se encontraron noticias',
            'not_found_in_trash'    => 'No hay noticias en la papelera',
            'featured_image'        => 'Imagen de la noticia',
            'set_featured_image'    => 'Establecer imagen de la noticia',
            'remove_featured_image' => 'Quitar imagen de la noticia',
            'use_featured_image'    => 'Usar como imagen de la noticia',
        ],
        'public'              => false,           // No se accede por URL pública
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_ui'             => true,            // Aparece en el admin
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-megaphone',
        'supports'            => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive'         => false,
        'rewrite'             => false,
    ]);

    // Taxonomía: categoría de la noticia (Educación, Comunidad, Obras, etc.)
    register_taxonomy('noticia_categoria', 'noticia', [
        'labels' => [
            'name'              => 'Categorías de Noticia',
            'singular_name'     => 'Categoría',
            'menu_name'         => 'Categorías',
            'all_items'         => 'Todas las categorías',
            'edit_item'         => 'Editar categoría',
            'update_item'       => 'Actualizar categoría',
            'add_new_item'      => 'Añadir nueva categoría',
            'new_item_name'     => 'Nombre de la nueva categoría',
            'search_items'      => 'Buscar categorías',
        ],
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => false,
    ]);
});

// Mensaje de ayuda en la pantalla de edición de la noticia
add_action('edit_form_after_title', function ($post) {
    if ($post->post_type !== 'noticia') return;
    echo '<div style="background:#fff8e1;border:1px solid #facc15;border-left:4px solid #f59e0b;padding:12px 16px;margin:12px 0;border-radius:6px;font-size:13px;line-height:1.5">';
    echo '<strong>Cómo se ve esta noticia en la web:</strong><br>';
    echo '· El <em>Título</em> aparece en grande dentro de la tarjeta.<br>';
    echo '· El <em>Resumen</em> (panel "Resumen" a la derecha o más abajo) es el texto corto que aparece debajo del título. Si lo dejás vacío, se usan las primeras palabras del contenido.<br>';
    echo '· La <em>Imagen destacada</em> (panel a la derecha) es la foto principal. Recomendado: 1200×750px.<br>';
    echo '· La <em>Categoría</em> aparece como etiqueta sobre la imagen (ej: "Educación", "Comunidad").';
    echo '</div>';
});

// Asegurar que el panel "Resumen" esté visible por defecto al editar una noticia
add_filter('default_hidden_meta_boxes', function ($hidden, $screen) {
    if ($screen && $screen->post_type === 'noticia') {
        $hidden = array_diff($hidden, ['postexcerpt']);
    }
    return $hidden;
}, 10, 2);

// Columna de imagen destacada en el listado del admin
add_filter('manage_noticia_posts_columns', function ($cols) {
    $new = [];
    foreach ($cols as $key => $label) {
        if ($key === 'title') {
            $new['noticia_thumb'] = 'Imagen';
        }
        $new[$key] = $label;
    }
    return $new;
});

add_action('manage_noticia_posts_custom_column', function ($col, $post_id) {
    if ($col === 'noticia_thumb') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, [60, 40], ['style' => 'border-radius:4px;object-fit:cover']);
        } else {
            echo '<span style="color:#999">—</span>';
        }
    }
}, 10, 2);

/**
 * Devuelve las últimas noticias publicadas, formateadas para el template.
 *
 * @param int $limit  Cantidad máxima de noticias a devolver.
 * @return array
 */
function tp_get_noticias($limit = 10) {
    $query = new WP_Query([
        'post_type'      => 'noticia',
        'post_status'    => 'publish',
        'posts_per_page' => (int) $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'no_found_rows'  => true,
    ]);

    $noticias = [];

    foreach ($query->posts as $post) {
        $thumb_id  = get_post_thumbnail_id($post->ID);
        $image_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : '';

        $tag_terms = get_the_terms($post->ID, 'noticia_categoria');
        $tag       = (!is_wp_error($tag_terms) && !empty($tag_terms)) ? $tag_terms[0]->name : '';

        $excerpt = has_excerpt($post) ? get_the_excerpt($post) : wp_trim_words(strip_shortcodes($post->post_content), 30, '…');

        $noticias[] = [
            'tag'     => $tag,
            'title'   => get_the_title($post),
            'excerpt' => $excerpt,
            'image'   => $image_url,
        ];
    }

    return $noticias;
}

/**
 * Seeder: precarga las 2 noticias por defecto la primera vez que se
 * activa el theme, así el equipo tiene contenido editable desde el día 1.
 *
 * Se ejecuta una sola vez (queda registrada la flag `tp_noticias_seeded`).
 * Si ya existe alguna noticia publicada, no hace nada (evita duplicados).
 */
add_action('admin_init', 'tp_seed_default_noticias');
function tp_seed_default_noticias() {
    if (get_option('tp_noticias_seeded')) {
        return;
    }

    // Si ya hay noticias cargadas, marcar como seedeado y salir.
    $existing = get_posts([
        'post_type'      => 'noticia',
        'post_status'    => 'any',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ]);
    if (! empty($existing)) {
        update_option('tp_noticias_seeded', 1);
        return;
    }

    $defaults = [
        [
            'title'    => 'Importante operativo de salud escolar en la Escuela Secundaria Barrio Rincón del Este',
            'excerpt'  => 'Se realizaron fichas médicas, controles integrales y vacunación para acompañar las trayectorias educativas de los estudiantes del establecimiento.',
            'category' => 'Educación',
            'image'    => 'INICIO 1.jpg',
        ],
        [
            'title'    => 'Acompañamos actividades institucionales y encuentros de vecinos en distintos puntos de Alderetes',
            'excerpt'  => 'La Municipalidad continúa articulando presencia territorial, participación comunitaria y acciones conjuntas para fortalecer el vínculo con cada barrio.',
            'category' => 'Comunidad',
            'image'    => 'INICIO 2.jpg',
        ],
    ];

    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    $images_dir = trailingslashit(get_template_directory()) . 'resources/images/fotos-areas/NOTICIAS/';

    foreach ($defaults as $data) {
        $post_id = wp_insert_post([
            'post_type'    => 'noticia',
            'post_status'  => 'publish',
            'post_title'   => $data['title'],
            'post_excerpt' => $data['excerpt'],
            'post_content' => $data['excerpt'],
        ]);

        if (is_wp_error($post_id) || ! $post_id) {
            continue;
        }

        // Asignar categoría (la crea si no existe).
        wp_set_object_terms($post_id, $data['category'], 'noticia_categoria');

        // Copiar la imagen del theme a la mediateca de WP y asignarla como imagen destacada.
        $src_path = $images_dir . $data['image'];
        if (file_exists($src_path)) {
            $upload_dir    = wp_upload_dir();
            $dest_filename = wp_unique_filename($upload_dir['path'], sanitize_file_name($data['image']));
            $dest_path     = trailingslashit($upload_dir['path']) . $dest_filename;

            if (@copy($src_path, $dest_path)) {
                $filetype  = wp_check_filetype($dest_filename, null);
                $attach_id = wp_insert_attachment([
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => sanitize_file_name(pathinfo($dest_filename, PATHINFO_FILENAME)),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                ], $dest_path, $post_id);

                if (! is_wp_error($attach_id) && $attach_id) {
                    $meta = wp_generate_attachment_metadata($attach_id, $dest_path);
                    wp_update_attachment_metadata($attach_id, $meta);
                    set_post_thumbnail($post_id, $attach_id);
                }
            }
        }
    }

    update_option('tp_noticias_seeded', 1);
}

/* =====================================================================
 *  ORGANIGRAMA — CPT jerárquico editable desde el admin
 *  --------------------------------------------------------------------
 *  Estructura: Secretaría (nivel 0) → Subsecretaría (hija de secretaría)
 *  → Dirección/Jefatura (hija de subsecretaría o de secretaría).
 *  Título = nombre del cargo (ej. "Dirección de Empleo").
 *  Metadatos: titular, foto (ID adjunto), color (solo secretarías).
 *  Si no hay cargos cargados, page-organigrama.php usa el array
 *  hardcodeado del tema (fallback sin romper el front).
 * ===================================================================== */

add_action('init', function () {
    register_post_type('tp_cargo', [
        'labels' => [
            'name'               => 'Organigrama',
            'singular_name'      => 'Cargo',
            'menu_name'          => 'Organigrama',
            'add_new'            => 'Añadir cargo',
            'add_new_item'       => 'Añadir cargo al organigrama',
            'edit_item'          => 'Editar cargo',
            'new_item'           => 'Nuevo cargo',
            'view_item'          => 'Ver cargo',
            'search_items'       => 'Buscar cargos',
            'not_found'          => 'No hay cargos cargados',
            'not_found_in_trash' => 'No hay cargos en la papelera',
            'parent_item_colon'  => 'Cargo superior:',
        ],
        'public'              => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 26,
        'menu_icon'           => 'dashicons-networking',
        'supports'            => ['title', 'page-attributes'],
        'hierarchical'        => true,
        'has_archive'         => false,
        'rewrite'             => false,
        'capability_type'     => 'page',
    ]);
});

// Metabox: titular + foto + color
add_action('add_meta_boxes_tp_cargo', function () {
    add_meta_box('tp_cargo_datos', 'Datos del cargo', 'tp_cargo_metabox_cb', 'tp_cargo', 'normal', 'high');
});

function tp_cargo_metabox_cb($post) {
    wp_nonce_field('tp_cargo_save', 'tp_cargo_nonce');
    $titular = get_post_meta($post->ID, '_tp_cargo_titular', true);
    $foto_id = (int) get_post_meta($post->ID, '_tp_cargo_foto_id', true);
    $color   = get_post_meta($post->ID, '_tp_cargo_color', true) ?: 'blue';
    $foto_url = $foto_id ? wp_get_attachment_image_url($foto_id, 'medium') : '';
    $es_secretaria = (int) $post->post_parent === 0;
    $colores = ['blue'=>'Azul','purple'=>'Violeta','green'=>'Verde','orange'=>'Naranja','pink'=>'Rosa','teal'=>'Turquesa','red'=>'Rojo'];
    ?>
    <p>
        <label for="tp_cargo_titular"><strong>Titular / persona a cargo</strong></label><br>
        <input type="text" id="tp_cargo_titular" name="tp_cargo_titular" value="<?php echo esc_attr($titular); ?>" class="widefat" placeholder="Ej. Lic. Rosana Sansone — dejar vacío si el cargo está vacante">
        <span class="description">Título de la entrada = nombre del cargo (ej. "Secretaría de Gobierno"). Este campo es la persona.</span>
    </p>
    <div style="margin:12px 0">
        <label><strong>Foto del titular</strong></label><br>
        <div id="tp_cargo_foto_preview" style="margin:8px 0">
            <?php if ($foto_url): ?>
                <img src="<?php echo esc_url($foto_url); ?>" style="width:80px;height:80px;object-fit:cover;border-radius:999px;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,.15)">
            <?php else: ?>
                <span style="color:#888;font-size:13px">Sin foto — se mostrará un avatar genérico.</span>
            <?php endif; ?>
        </div>
        <input type="hidden" id="tp_cargo_foto_id" name="tp_cargo_foto_id" value="<?php echo esc_attr($foto_id); ?>">
        <button type="button" class="button" id="tp_cargo_foto_pick">Elegir foto</button>
        <button type="button" class="button" id="tp_cargo_foto_remove" <?php echo $foto_id ? '' : 'style="display:none"'; ?>>Quitar foto</button>
        <p class="description">Recomendado: foto cuadrada o vertical, rostro centrado.</p>
    </div>
    <?php if ($es_secretaria): ?>
    <p>
        <label for="tp_cargo_color"><strong>Color de la secretaría</strong></label><br>
        <select id="tp_cargo_color" name="tp_cargo_color">
            <?php foreach ($colores as $k=>$label): ?>
                <option value="<?php echo esc_attr($k); ?>" <?php selected($color,$k); ?>><?php echo esc_html($label); ?></option>
            <?php endforeach; ?>
        </select>
        <span class="description">Solo para nivel superior (sin cargo superior). Define el acento de color en el front.</span>
    </p>
    <?php else: ?>
        <input type="hidden" name="tp_cargo_color" value="<?php echo esc_attr($color); ?>">
    <?php endif; ?>
    <p class="description" style="background:#f0f6ff;border-left:3px solid #3b82f6;padding:8px 10px">Jerarquía: elegí el <em>Cargo superior</em> (Atributos de página, a la derecha) para anidar. Ej.: Secretaría → Subsecretaría → Dirección. El orden se cambia con <em>Orden</em>.</p>
    <script>
    (function(){
        var frame;
        var pickBtn = document.getElementById('tp_cargo_foto_pick');
        var removeBtn = document.getElementById('tp_cargo_foto_remove');
        var input = document.getElementById('tp_cargo_foto_id');
        var preview = document.getElementById('tp_cargo_foto_preview');
        if(!pickBtn) return;
        pickBtn.addEventListener('click', function(e){
            e.preventDefault();
            if(frame) { frame.open(); return; }
            frame = wp.media({ title:'Elegir foto del titular', button:{text:'Usar esta foto'}, multiple:false, library:{type:'image'} });
            frame.on('select', function(){
                var att = frame.state().get('selection').first().toJSON();
                input.value = att.id;
                preview.innerHTML = '<img src="'+att.sizes.medium.url+'" style="width:80px;height:80px;object-fit:cover;border-radius:999px;border:2px solid #fff;box-shadow:0 2px 8px rgba(0,0,0,.15)">';
                removeBtn.style.display = '';
            });
            frame.open();
        });
        if(removeBtn){
            removeBtn.addEventListener('click', function(e){
                e.preventDefault();
                input.value = '';
                preview.innerHTML = '<span style="color:#888;font-size:13px">Sin foto — se mostrará un avatar genérico.</span>';
                removeBtn.style.display = 'none';
            });
        }
    })();
    </script>
    <?php
}

add_action('save_post_tp_cargo', function ($post_id) {
    if (!isset($_POST['tp_cargo_nonce']) || !wp_verify_nonce($_POST['tp_cargo_nonce'], 'tp_cargo_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    update_post_meta($post_id, '_tp_cargo_titular', sanitize_text_field($_POST['tp_cargo_titular'] ?? ''));
    $foto_id = absint($_POST['tp_cargo_foto_id'] ?? 0);
    if ($foto_id) {
        update_post_meta($post_id, '_tp_cargo_foto_id', $foto_id);
    } else {
        delete_post_meta($post_id, '_tp_cargo_foto_id');
    }
    $color = sanitize_key($_POST['tp_cargo_color'] ?? 'blue');
    $allowed = ['blue','purple','green','orange','pink','teal','red'];
    if (!in_array($color, $allowed, true)) $color = 'blue';
    update_post_meta($post_id, '_tp_cargo_color', $color);
});

// Columnas en el listado
add_filter('manage_tp_cargo_posts_columns', function ($cols) {
    $new = [];
    $new['cb'] = $cols['cb'];
    $new['title'] = 'Cargo';
    $new['tp_titular'] = 'Titular';
    $new['tp_parent'] = 'Depende de';
    $new['tp_foto'] = 'Foto';
    return $new;
});
add_action('manage_tp_cargo_posts_custom_column', function ($col, $post_id) {
    if ($col === 'tp_titular') {
        $t = get_post_meta($post_id, '_tp_cargo_titular', true);
        echo $t ? esc_html($t) : '<span style="color:#999;font-style:italic">Vacante</span>';
    } elseif ($col === 'tp_parent') {
        $parent = wp_get_post_parent_id($post_id);
        echo $parent ? esc_html(get_the_title($parent)) : '<span style="color:#999">— Secretaría —</span>';
    } elseif ($col === 'tp_foto') {
        $fid = (int) get_post_meta($post_id, '_tp_cargo_foto_id', true);
        if ($fid) {
            echo '<img src="'.esc_url(wp_get_attachment_image_url($fid,'thumbnail')).'" style="width:32px;height:32px;object-fit:cover;border-radius:999px">';
        } else {
            echo '<span style="color:#999">—</span>';
        }
    }
}, 10, 2);

// Helper: devuelve la estructura del organigrama desde el CPT, o null si está vacío
function tp_get_organigrama_estructura(): ?array {
    $q = new WP_Query([
        'post_type' => 'tp_cargo',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => true,
    ]);
    if (!$q->have_posts()) return null;

    $by_parent = [];
    $by_id = [];
    foreach ($q->posts as $p) {
        $item = [
            'id'      => $p->ID,
            'cargo'   => $p->post_title,
            'titular' => get_post_meta($p->ID, '_tp_cargo_titular', true),
            'foto_id' => (int) get_post_meta($p->ID, '_tp_cargo_foto_id', true),
            'color'   => get_post_meta($p->ID, '_tp_cargo_color', true) ?: 'blue',
            'parent'  => (int) $p->post_parent,
            'order'   => (int) $p->menu_order,
        ];
        $by_id[$p->ID] = $item;
        $by_parent[$item['parent']][] = $p->ID;
    }

    // Construir árbol recursivo: secretaria -> hijos
    $build = function($parent_id) use (&$build, $by_parent, $by_id) {
        $out = [];
        foreach (($by_parent[$parent_id] ?? []) as $id) {
            $node = $by_id[$id];
            $node['children'] = $build($id);
            $out[] = $node;
        }
        return $out;
    };

    $tree = $build(0);
    return empty($tree) ? null : $tree;
}

// --- Seed organigrama si está vacío (migra el array hardcodeado a tp_cargo) ---
add_action('admin_init', function () {
    if (get_option('tp_organigrama_seeded')) return;
    if (!current_user_can('edit_pages')) return;
    $existing = get_posts(['post_type'=>'tp_cargo','post_status'=>'any','posts_per_page'=>1,'fields'=>'ids','no_found_rows'=>true]);
    if (!empty($existing)) { update_option('tp_organigrama_seeded', 1); return; }
    // Solo si no hay cargos, importar el organigrama hardcodeado del tema
    // Definición mínima (secretaría -> subsecretaría -> dirección) con colores
    $estructura_seed = [
        ['secretaria'=>'Secretaría de Gobierno','titular'=>'Aldo Gabriel Salomón','color'=>'blue','subsecretarias'=>[
            ['cargo'=>'Subsecretaría de Gobierno','titular'=>'Dr. Pablo Saldívar','direcciones'=>[
                ['cargo'=>'Dirección de Despacho','titular'=>'Dra. Jessica Pérez'],
                ['cargo'=>'Dirección de Relaciones Institucionales','titular'=>'Dra. Silvia Moyano'],
                ['cargo'=>'Dirección de Defensa Civil','titular'=>'Adrián Campos'],
                ['cargo'=>'Dirección de la Función Pública','titular'=>'Domingo López'],
            ]]
        ],'direcciones_directas'=>[]],
        ['secretaria'=>'Secretaría de Educación','titular'=>'Lic. Rosana Sansone','color'=>'purple','subsecretarias'=>[],'direcciones_directas'=>[
            ['cargo'=>'Dirección de Integración y Promoción Cultural','titular'=>'Prof. José Romano'],
            ['cargo'=>'Dirección de Coordinación e Integración Educativa','titular'=>'Prof. José Romano'],
        ]],
        ['secretaria'=>'Secretaría de Hacienda','titular'=>'Luis Romano','color'=>'green','subsecretarias'=>[
            ['cargo'=>'Subsecretaría de Economía y Hacienda','titular'=>'Martín Soro','direcciones'=>[
                ['cargo'=>'Dirección de Administración','titular'=>'Ctdor. Franco Casavalle'],
                ['cargo'=>'Dirección de Compras y Contrataciones','titular'=>'César Barrera'],
                ['cargo'=>'Dirección de Sistemas','titular'=>'Ing. Cecilia Palavecino'],
                ['cargo'=>'Dirección de Tesorería General','titular'=>'CPN. Denis Pérez Díaz'],
            ]],
            ['cargo'=>'Subsecretaría de Ingresos Públicos','titular'=>'Dr. Sergio Altamiranda','direcciones'=>[]],
        ],'direcciones_directas'=>[]],
        ['secretaria'=>'Secretaría de Obras Públicas','titular'=>'Patricio Figueroa','color'=>'orange','subsecretarias'=>[
            ['cargo'=>'Subsecretaría de Obras Públicas','titular'=>'','direcciones'=>[
                ['cargo'=>'Dirección de Obras Públicas','titular'=>'Ing. Federico Díaz'],
                ['cargo'=>'Dirección de Alumbrado Público','titular'=>'Osvaldo Escobar'],
                ['cargo'=>'Dirección de Espacios Verdes','titular'=>'Alfredo Sánchez'],
                ['cargo'=>'Jefatura de Saneamiento Ambiental','titular'=>'Raúl Lazarte'],
                ['cargo'=>'Dirección de Información Catastral y Cartografía','titular'=>'Arq. Joaquín García Arenas'],
            ]],
            ['cargo'=>'Unidad Ejecutora Municipal','titular'=>'Ing. Oscar Parrado','direcciones'=>[]],
        ],'direcciones_directas'=>[]],
        ['secretaria'=>'Secretaría de Políticas Sociales','titular'=>'','color'=>'pink','subsecretarias'=>[],'direcciones_directas'=>[
            ['cargo'=>'Dirección de Acción Social','titular'=>'José Amado Ale'],
            ['cargo'=>'Dirección de Deportes y Recreación','titular'=>'Prof. Hernán Caldas'],
        ]],
        ['secretaria'=>'Secretaría de Coordinación','titular'=>'Pablo Caldas','color'=>'teal','subsecretarias'=>[
            ['cargo'=>'Subsecretaría de Información Pública','titular'=>'Juan Mafhoud','direcciones'=>[]],
            ['cargo'=>'Subsecretaría de Multimedios y Difusión','titular'=>'Hugo García','direcciones'=>[]],
        ],'direcciones_directas'=>[
            ['cargo'=>'Dirección de Empleo','titular'=>'Marcos Altamiranda'],
        ]],
        ['secretaria'=>'Secretaría de Protección Ciudadana','titular'=>'','color'=>'red','subsecretarias'=>[],'direcciones_directas'=>[
            ['cargo'=>'Tribunal de Faltas','titular'=>'Dra. María de Los Ángeles Luque'],
        ]],
    ];
    $order = 0;
    foreach ($estructura_seed as $sec) {
        $sec_id = wp_insert_post(['post_type'=>'tp_cargo','post_title'=>$sec['secretaria'],'post_status'=>'publish','post_parent'=>0,'menu_order'=>$order++]);
        if (is_wp_error($sec_id) || !$sec_id) continue;
        update_post_meta($sec_id,'_tp_cargo_titular',$sec['titular']);
        update_post_meta($sec_id,'_tp_cargo_color',$sec['color']);
        foreach (($sec['subsecretarias'] ?? []) as $sub) {
            $sub_id = wp_insert_post(['post_type'=>'tp_cargo','post_title'=>$sub['cargo'],'post_status'=>'publish','post_parent'=>$sec_id,'menu_order'=>$order++]);
            if (is_wp_error($sub_id) || !$sub_id) continue;
            update_post_meta($sub_id,'_tp_cargo_titular',$sub['titular']);
            update_post_meta($sub_id,'_tp_cargo_color','blue');
            foreach (($sub['direcciones'] ?? []) as $dir) {
                $dir_id = wp_insert_post(['post_type'=>'tp_cargo','post_title'=>$dir['cargo'],'post_status'=>'publish','post_parent'=>$sub_id,'menu_order'=>$order++]);
                if (is_wp_error($dir_id) || !$dir_id) continue;
                update_post_meta($dir_id,'_tp_cargo_titular',$dir['titular']);
            }
        }
        foreach (($sec['direcciones_directas'] ?? []) as $dir) {
            $dir_id = wp_insert_post(['post_type'=>'tp_cargo','post_title'=>$dir['cargo'],'post_status'=>'publish','post_parent'=>$sec_id,'menu_order'=>$order++]);
            if (is_wp_error($dir_id) || !$dir_id) continue;
            update_post_meta($dir_id,'_tp_cargo_titular',$dir['titular']);
        }
    }
    update_option('tp_organigrama_seeded', 1);
});

/**
 * Encola los scripts de la biblioteca de medios para el CPT tp_cargo en el admin.
 */
add_action('admin_enqueue_scripts', function ($hook) {
    if (in_array($hook, ['post.php', 'post-new.php'], true)) {
        $screen = get_current_screen();
        if ($screen && $screen->post_type === 'tp_cargo') {
            wp_enqueue_media();
        }
    }
});

/**
 * Precarga las imágenes de los funcionarios en el organigrama.
 * Importa cada foto local de resources/images/funcionarios/ a la mediateca si aún no está asignada.
 */
function tp_organigrama_preload_images(): array {
    $result = ['imported'=>0, 'assigned'=>0, 'skipped'=>0, 'errors'=>[]];
    
    $map = [
        'Secretaría de Gobierno' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/Secretario de Gobierno - ALDO GABRIEL SALOMÓN.jpg',
        'Subsecretaría de Gobierno' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Subsecretario de Gobierno - Dr. Pablo Saldívar.jpg',
        'Dirección de Despacho' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Despacho/Dra. Jessica Pérez.jpg',
        'Dirección de Relaciones Institucionales' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Relaciones Institucionales/Dra. Silvia Moyano.jpg',
        'Dirección de Defensa Civil' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Defensa Civil/Adrián Campos.jpg',
        'Dirección de la Función Pública' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de la Función Pública/Domingo López.jpg',
        'Secretaría de Educación' => 'resources/images/funcionarios/SECRETARIA DE EDUCACIÓN/Secr. de Educación - Lic. Rosana Sansone.jpg',
        'Dirección de Integración y Promoción Cultural' => 'resources/images/funcionarios/SECRETARIA DE EDUCACIÓN/Dirección de Integración y Promoción Cultural/Prof. José Romano.jpg',
        'Dirección de Coordinación e Integración Educativa' => 'resources/images/funcionarios/SECRETARIA DE EDUCACIÓN/Dirección de Coordinación e Integración Educativa/Prof. José Romano.jpg',
        'Secretaría de Hacienda' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Secretario de Hacienda - Luis Romano.jpg',
        'Subsecretaría de Economía y Hacienda' => 'resources/images/funcionarios/Martin Soro - Subsecretaría de Hacienda.jpg',
        'Dirección de Administración' => 'resources/images/funcionarios/Ctdor. Franco Casavalle - Dirección de Administración.jpg',
        'Dirección de Compras y Contrataciones' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Hacienda/Dirección de Compras y Contrataciones/César Barrera.jpg',
        'Dirección de Sistemas' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Hacienda/Dirección de Sistemas/Ing. Cecilia Palavecino.jpg',
        'Dirección de Tesorería General' => 'resources/images/funcionarios/CPN. Denis Pérez Díaz -  Dirección de Tesorería General.jpg',
        'Subsecretaría de Ingresos Públicos' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Ingresos Públicos/Dr. Sergio Altamiranda.jpg',
        'Secretaría de Obras Públicas' => 'resources/images/funcionarios/Patricio Figueroa - Secretario de Obras Públicas.jpg',
        'Dirección de Obras Públicas' => 'resources/images/funcionarios/Ing. Federico Díaz - Dirección de Obras Públicas.jpg',
        'Dirección de Alumbrado Público' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Dirección de Alumbrado Público/Osvaldo Escobar.jpg',
        'Dirección de Espacios Verdes' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Dirección de Espacios Verde/Alfredo Sanchez.jpg',
        'Jefatura de Saneamiento Ambiental' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Jefatura de Saneamiento Ambiental/Raúl Lazarte.jpg',
        'Dirección de Información Catastral y Cartografía' => 'resources/images/funcionarios/Arq. Joaquín García Arenas- Dirección de Información Catastral y Cartografía.jpg',
        'Unidad Ejecutora Municipal' => 'resources/images/funcionarios/Ing. Oscar Parrado -  Unidad Ejecutora Municipal.jpg',
        'Dirección de Acción Social' => 'resources/images/funcionarios/SECRETARIA DE POLÍTICAS SOCIALES/Dirección de Acción Social/José Amado Ale.jpg',
        'Dirección de Deportes y Recreación' => 'resources/images/funcionarios/SECRETARIA DE POLÍTICAS SOCIALES/Dirección de Deportes y Recreación/Prof. Hernán Caldas.jpg',
        'Secretaría de Coordinación' => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Coord. General - Pablo Caldas.jpg',
        'Subsecretaría de Información Pública' => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Subsecretaría de Información Pública/Juan Mafhoud.jpg',
        'Subsecretaría de Multimedios and Difusión' => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Subsecretaría de Multimedios y Difusión/Hugo García.jpg',
        'Dirección de Empleo' => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Dirección de Empleo/Marcos Altamiranda.jpg',
        'Tribunal de Faltas' => 'resources/images/funcionarios/SECRETARIA DE PROTECCIÓN CIUDADANA/Tribunal de Faltas/Dra. María de Los Ángeles Luque.jpg',
    ];
    
    foreach ($map as $cargo_title => $rel_path) {
        $posts = get_posts([
            'post_type' => 'tp_cargo',
            'title' => $cargo_title,
            'posts_per_page' => 1,
            'post_status' => 'publish',
        ]);
        
        if (empty($posts)) {
            $result['errors'][] = $cargo_title . ': cargo no encontrado en base de datos.';
            continue;
        }
        
        $post = $posts[0];
        
        $existing_foto = (int) get_post_meta($post->ID, '_tp_cargo_foto_id', true);
        if ($existing_foto) {
            $result['skipped']++;
            continue;
        }
        
        $abs = trailingslashit(get_template_directory()) . $rel_path;
        if (!is_file($abs)) {
            if (class_exists('Normalizer')) {
                $nfd_abs = Normalizer::normalize($abs, Normalizer::FORM_D);
                $nfc_abs = Normalizer::normalize($abs, Normalizer::FORM_C);
                if (is_file($nfd_abs)) {
                    $abs = $nfd_abs;
                } elseif (is_file($nfc_abs)) {
                    $abs = $nfc_abs;
                } else {
                    $result['errors'][] = $cargo_title . ': archivo de foto no existe en ' . $rel_path;
                    continue;
                }
            } else {
                $result['errors'][] = $cargo_title . ': archivo de foto no existe en ' . $rel_path;
                continue;
            }
        }
        
        if (function_exists('tp_editable_import_theme_image')) {
            $source = ['path' => $abs, 'relative' => $rel_path];
            $att_id = tp_editable_import_theme_image($source, 'Funcionario - ' . $cargo_title);
            
            if (is_wp_error($att_id)) {
                $result['errors'][] = $cargo_title . ': ' . $att_id->get_error_message();
                continue;
            }
            
            update_post_meta($post->ID, '_tp_cargo_foto_id', $att_id);
            $result['assigned']++;
            $result['imported']++;
        } else {
            $result['errors'][] = 'Falta la función tp_editable_import_theme_image en el tema.';
            break;
        }
    }
    
    return $result;
}

/**
 * Hook para disparar la migración de imágenes del organigrama una sola vez.
 */
add_action('admin_init', function () {
    // Permite forzar mediante parámetro en URL
    if (isset($_GET['tp_fix_organigrama_photos']) && current_user_can('edit_pages') && current_user_can('upload_files')) {
        $forced = tp_organigrama_preload_images();
        update_option('tp_organigrama_photos_imported_report', $forced, false);
        add_action('admin_notices', function() use ($forced) {
            $msg = 'Fotos precargadas en organigrama: ' . (int)$forced['assigned'] . ' cargos asignados, ' . count($forced['errors']) . ' errores.';
            echo '<div class="notice notice-success is-dismissible"><p><strong>Organigrama:</strong> ' . esc_html($msg) . '</p></div>';
        });
    }

    if (get_option('tp_organigrama_photos_imported')) {
        return;
    }
    if (!current_user_can('edit_pages') || !current_user_can('upload_files')) {
        return;
    }
    if (!get_option('tp_organigrama_seeded')) {
        return;
    }
    
    $report = tp_organigrama_preload_images();
    update_option('tp_organigrama_photos_imported', 1);
    update_option('tp_organigrama_photos_imported_report', $report);
}, 30);

/**
 * Consulta de patentes / Libre Deuda para el Tribunal de Faltas (Padrón masivo + Multas manuales).
 */
function tp_consultar_patente_tribunal(): void {
    $patente = isset($_POST['patente']) ? strtoupper(preg_replace('/[^A-Z0-9]/', '', sanitize_text_field($_POST['patente']))) : '';

    if (empty($patente)) {
        wp_send_json_error(['mensaje' => 'Por favor ingresá una patente válida.']);
    }

    $registros = [];

    // 1. Consultar en el padrón masivo (JSON indexado)
    $json_file = get_template_directory() . '/inc/infracciones_index.json';
    if (is_file($json_file)) {
        $data = json_decode(file_get_contents($json_file), true);
        if (is_array($data) && isset($data[$patente])) {
            $registros = array_merge($registros, $data[$patente]);
        }
    }

    // 2. Consultar multas manuales cargadas individualmente en WP Admin (CPT tp_multa)
    $manual_query = new WP_Query([
        'post_type'      => 'tp_multa',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            'relation' => 'AND',
            ['key' => '_tp_multa_patente', 'value' => $patente, 'compare' => '='],
            ['key' => '_tp_multa_estado',  'value' => 'pendiente', 'compare' => '='],
        ],
    ]);

    foreach ($manual_query->posts as $post) {
        $infraccion = get_post_meta($post->ID, '_tp_multa_infraccion', true) ?: $post->post_title;
        $monto = get_post_meta($post->ID, '_tp_multa_monto', true);
        $registros[] = [
            'causa'       => $infraccion . ($monto ? " ($" . $monto . ")" : ''),
            'acta'        => 'Manual WP',
            'empadronado' => 'SÍ',
        ];
    }

    if (!empty($registros)) {
        wp_send_json_success([
            'tiene_infraccion' => true,
            'patente'          => $patente,
            'registros'        => $registros,
            'total'            => count($registros),
        ]);
    } else {
        wp_send_json_success([
            'tiene_infraccion' => false,
            'patente'          => $patente,
        ]);
    }
}
add_action('wp_ajax_tp_consultar_patente_tribunal', 'tp_consultar_patente_tribunal');
add_action('wp_ajax_nopriv_tp_consultar_patente_tribunal', 'tp_consultar_patente_tribunal');

/**
 * Submenú e importador de Padrón CSV para Tribunal de Faltas en WP Admin.
 */
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=tp_multa',
        'Importar Padrón CSV',
        'Importar Padrón CSV',
        'edit_tp_multas',
        'tp_importar_padron_tribunal',
        'tp_importar_padron_tribunal_cb'
    );
});

function tp_importar_padron_tribunal_cb() {
    if (!current_user_can('edit_tp_multas')) wp_die('No tenés permisos.');
    $mensaje = '';
    $json_file = get_template_directory() . '/inc/infracciones_index.json';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_padron'])) {
        check_admin_referer('tp_importar_padron_action', 'tp_importar_nonce');
        $file = $_FILES['csv_padron'];
        if (!empty($file['tmp_name']) && is_uploaded_file($file['tmp_name'])) {
            $handle = fopen($file['tmp_name'], 'r');
            if ($handle) {
                $bom = fread($handle, 3);
                if ($bom !== "\xEF\xBB\xBF") {
                    rewind($handle);
                }

                $data = [];
                $count = 0;
                $patentes_set = [];

                $first_line = fgets($handle);
                rewind($handle);
                if ($bom === "\xEF\xBB\xBF") fread($handle, 3);

                $delimiter = (strpos($first_line, ';') !== false) ? ';' : ',';
                fgetcsv($handle, 0, $delimiter); // Saltear encabezado

                while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
                    if (empty($row) || count($row) < 1) continue;
                    $patente = strtoupper(preg_replace('/[^A-Z0-9]/', '', $row[0] ?? ''));
                    if (empty($patente) || $patente === 'DOMINIO' || $patente === 'PATENTE') continue;

                    $causa = trim($row[1] ?? '');
                    $acta = trim($row[2] ?? '');
                    $empadronado = trim($row[3] ?? '0');
                    if (in_array(strtoupper($empadronado), ['1', 'SI', 'SÍ', 'TRUE'], true)) {
                        $empadronado = 'SÍ';
                    } else {
                        $empadronado = 'NO';
                    }

                    if (!isset($data[$patente])) {
                        $data[$patente] = [];
                    }
                    $data[$patente][] = [
                        'causa'       => $causa,
                        'acta'        => $acta,
                        'empadronado' => $empadronado,
                    ];
                    $patentes_set[$patente] = true;
                    $count++;
                }
                fclose($handle);

                file_put_contents($json_file, json_encode($data, JSON_UNESCAPED_UNICODE));
                $mensaje = '<div class="notice notice-success"><p><strong>¡Padrón actualizado con éxito!</strong> Se procesaron ' . number_format($count, 0, ',', '.') . ' infracciones (' . number_format(count($patentes_set), 0, ',', '.') . ' patentes únicas).</p></div>';
            }
        }
    }

    $total_infracciones = 0;
    $total_patentes = 0;
    if (is_file($json_file)) {
        $current_data = json_decode(file_get_contents($json_file), true);
        if (is_array($current_data)) {
            $total_patentes = count($current_data);
            foreach ($current_data as $list) {
                $total_infracciones += count($list);
            }
        }
    }
    ?>
    <div class="wrap">
        <h1>Importar / Actualizar Padrón del Tribunal de Faltas</h1>
        <?php echo $mensaje; ?>

        <div style="display:flex;gap:20px;flex-wrap:wrap;margin-top:20px">
            <!-- Columna 1: Estado e Importación -->
            <div class="card" style="flex:1;min-width:320px;max-width:550px;padding:20px;border-radius:12px;margin:0">
                <h2 style="margin-top:0">Estado del Padrón Masivo</h2>
                <p style="font-size:15px"><strong>Total de Infracciones:</strong> <span class="badge" style="background:#2563eb;color:#fff;padding:3px 10px;border-radius:12px;font-weight:bold"><?php echo number_format($total_infracciones, 0, ',', '.'); ?></span></p>
                <p style="font-size:15px"><strong>Patentes Únicas Registradas:</strong> <strong><?php echo number_format($total_patentes, 0, ',', '.'); ?></strong></p>
                <hr style="margin:20px 0;border-top:1px solid #e5e7eb">
                <h3>Actualizar Padrón desde CSV (Excel / Access)</h3>
                <p>Podés exportar el padrón desde Microsoft Access o Excel en formato <strong>.CSV</strong> y subirlo aquí para actualizar la consulta pública en la web de forma instantánea.</p>

                <form method="post" enctype="multipart/form-data" style="margin-top:15px">
                    <?php wp_nonce_field('tp_importar_padron_action', 'tp_importar_nonce'); ?>
                    <p>
                        <label><strong>Seleccionar archivo CSV (.csv):</strong></label><br>
                        <input type="file" name="csv_padron" accept=".csv,.txt" required style="margin-top:8px">
                    </p>
                    <p>
                        <button type="submit" class="button button-primary button-large">Reemplazar y Actualizar Padrón</button>
                    </p>
                </form>
                <p class="description">El formato del CSV debe contener las columnas: <code>DOMINIO; CAUSA; ACTA; EMPADRONADO</code></p>
            </div>

            <!-- Columna 2: Buscador y Muestra de Patentes en el Admin -->
            <div class="card" style="flex:1;min-width:320px;max-width:550px;padding:20px;border-radius:12px;margin:0">
                <h2 style="margin-top:0">Buscador del Padrón (Admin)</h2>
                <p>Ingresá una patente para verificar qué causas/actas figuran en el padrón masivo:</p>
                
                <div style="display:flex;gap:8px;margin-bottom:20px">
                    <input type="text" id="admin-search-patente" placeholder="Ej: JQD569 o ABC123" class="regular-text" style="text-transform:uppercase;font-family:monospace;font-size:16px">
                    <button type="button" id="admin-btn-buscar" class="button button-secondary">Buscar Patente</button>
                </div>

                <div id="admin-search-result" style="display:none;margin-bottom:20px;padding:12px;border-radius:8px"></div>

                <h3>Muestra de Patentes Registradas</h3>
                <table class="wp-list-table widefat fixed striped" style="margin-top:10px">
                    <thead>
                        <tr>
                            <th>Patente / Dominio</th>
                            <th>N° Causa</th>
                            <th>N° Acta</th>
                            <th>Empadronado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sample_count = 0;
                        if (is_array($current_data)) {
                            foreach ($current_data as $pat => $items) {
                                foreach ($items as $item) {
                                    echo '<tr>';
                                    echo '<td><strong style="font-family:monospace">' . esc_html($pat) . '</strong></td>';
                                    echo '<td>' . esc_html($item['causa'] ?: 'S/N') . '</td>';
                                    echo '<td>' . esc_html($item['acta'] ?: 'S/N') . '</td>';
                                    echo '<td>' . esc_html($item['empadronado'] ?: 'NO') . '</td>';
                                    echo '</tr>';
                                    $sample_count++;
                                    if ($sample_count >= 10) break 2;
                                }
                            }
                        }
                        if ($sample_count === 0) {
                            echo '<tr><td colspan="4">No hay patentes cargadas en el padrón.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('admin-btn-buscar').addEventListener('click', function() {
        var patente = document.getElementById('admin-search-patente').value.trim().toUpperCase();
        var resDiv = document.getElementById('admin-search-result');
        if (!patente) return;
        
        resDiv.style.display = 'block';
        resDiv.style.background = '#f0f4f8';
        resDiv.style.border = '1px solid #cbd5e1';
        resDiv.innerHTML = 'Consultando...';

        var body = new URLSearchParams({ action: 'tp_consultar_patente_tribunal', patente: patente });
        fetch(ajaxurl, { method: 'POST', body: body })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success && res.data.tiene_infraccion) {
                    resDiv.style.background = '#fef2f2';
                    resDiv.style.border = '1px solid #fca5a5';
                    var html = '<strong style="color:#b91c1c">INFRACCIÓN REGISTRADA para ' + patente + ' (' + res.data.total + ' registro/s):</strong><ul style="margin:8px 0 0 16px">';
                    res.data.registros.forEach(function(item) {
                        html += '<li>Causa N° ' + (item.causa || 'S/N') + ' | Acta N° ' + (item.acta || 'S/N') + '</li>';
                    });
                    html += '</ul>';
                    resDiv.innerHTML = html;
                } else {
                    resDiv.style.background = '#f0fdf4';
                    resDiv.style.border = '1px solid #86efac';
                    resDiv.innerHTML = '<strong style="color:#15803d">LIBRE DEUDA:</strong> La patente ' + patente + ' no registra infracciones en el padrón.';
                }
            })
            .catch(function() {
                resDiv.innerHTML = 'Error al consultar.';
            });
    });
    </script>
    <?php
}

// Banner informativo en edit.php?post_type=tp_multa
add_action('admin_notices', function () {
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if ($screen && $screen->id === 'edit-tp_multa') {
        $import_url = admin_url('edit.php?post_type=tp_multa&page=tp_importar_padron_tribunal');
        echo '<div class="notice notice-info"><p><strong>Tribunal de Faltas — Padrón Masivo Activo:</strong> La consulta de la web responde automáticamente a <strong>54.131 infracciones</strong> importadas. Desde este menú podés cargar multas manuales individuales adicionales o ir a <a href="' . esc_url($import_url) . '"><strong>Importar Padrón CSV</strong></a> para subir un nuevo archivo masivo.</p></div>';
    }
});

