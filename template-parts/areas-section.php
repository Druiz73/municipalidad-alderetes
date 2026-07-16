<?php
/**
 * Areas del Municipio section.
 *
 * @package TailPress
 */

$areas = [
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'title'       => 'Obras Públicas',
        'description' => 'Infraestructura y desarrollo urbano',
        'href'        => home_url('/obras-publicas'),
        'color'       => 'bg-alderetes-orange',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />',
        'title'       => 'Oficina de Empleo',
        'description' => 'Oportunidades laborales y capacitación',
        'href'        => home_url('/oficina-empleo'),
        'color'       => 'bg-alderetes-green',
    ],
    [
        'icon'        => '<path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>',
        'title'       => 'Educación',
        'description' => 'Actividades educativas y culturales',
        'href'        => home_url('/educacion'),
        'color'       => 'bg-alderetes-blue',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>',
        'title'       => 'Cultura',
        'description' => 'Arte, eventos y programas culturales',
        'href'        => home_url('/cultura'),
        'color'       => 'bg-alderetes-orange',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>',
        'title'       => 'Deporte',
        'description' => 'Espacios deportivos y eventos',
        'href'        => home_url('/deporte'),
        'color'       => 'bg-alderetes-green',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
        'title'       => 'Seguridad',
        'description' => 'Protección ciudadana',
        'href'        => home_url('/seguridad'),
        'color'       => 'bg-alderetes-blue',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
        'title'       => 'Alumbrado Público',
        'description' => 'Mantenimiento e iluminación',
        'href'        => home_url('/alumbrado'),
        'color'       => 'bg-alderetes-gold',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
        'title'       => 'Catastro',
        'description' => 'Gestión territorial',
        'href'        => home_url('/catastro'),
        'color'       => 'bg-alderetes-blue-light',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
        'title'       => 'Políticas Sociales',
        'description' => 'Programas comunitarios e inclusión',
        'href'        => home_url('/politicas-sociales'),
        'color'       => 'bg-alderetes-green',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1.25-3M15 7h.01M12 7h.01M9 7h.01M7 10h10M7 14h6m-8 7h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>',
        'title'       => 'Punto Digital',
        'description' => 'Tecnología, cursos y trámites digitales',
        'href'        => home_url('/punto-digital'),
        'color'       => 'bg-alderetes-blue-light',
    ],
];

foreach (tp_content_rows('areas_cards', 'inicio') as $index => $row) {
    if (!isset($areas[$index])) {
        break;
    }
    $areas[$index]['title'] = $row[0] ?? $areas[$index]['title'];
    $areas[$index]['description'] = $row[1] ?? $areas[$index]['description'];
}
?>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                <?php echo esc_html( tp_content( 'areas_badge', 'inicio' ) ); ?>
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <?php echo esc_html( tp_content( 'areas_title', 'inicio' ) ); ?>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                <?php echo esc_html( tp_content( 'areas_text', 'inicio' ) ); ?>
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <?php foreach ($areas as $area) : ?>
            <a href="<?php echo esc_url($area['href']); ?>"
               class="group block bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-[#eee5d7] hover:border-transparent">
                <div class="inline-flex p-4 rounded-2xl <?php echo esc_attr($area['color']); ?> mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <?php echo $area['icon']; ?>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-alderetes-orange transition-colors">
                    <?php echo esc_html($area['title']); ?>
                </h3>
                <p class="text-gray-500 text-sm">
                    <?php echo esc_html($area['description']); ?>
                </p>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
