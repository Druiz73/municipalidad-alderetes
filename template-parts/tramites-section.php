<?php
/**
 * Tramites Municipales section.
 *
 * @package TailPress
 */

$tramites = [
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>',
        'title'       => 'Rentas',
        'description' => 'Tasas, impuestos y certificaciones',
        'href'        => home_url('/rentas'),
        'gradient'    => 'from-emerald-500 to-emerald-600',
        'hover_text'  => 'text-emerald-700',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 .001M13 16l2-4h3l2 4M13 16H9m4 0h2"/>',
        'title'       => 'Tránsito',
        'description' => 'Licencias, renovaciones y turnos',
        'href'        => home_url('/transito'),
        'gradient'    => 'from-blue-500 to-blue-600',
        'hover_text'  => 'text-blue-700',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>',
        'title'       => 'Tribunal de Faltas',
        'description' => 'Consulta de infracciones y libre deuda',
        'href'        => home_url('/tribunal-de-faltas'),
        'gradient'    => 'from-amber-500 to-amber-600',
        'hover_text'  => 'text-amber-700',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'title'       => 'Catastro',
        'description' => 'Información catastral y planos',
        'href'        => home_url('/catastro'),
        'gradient'    => 'from-purple-500 to-purple-600',
        'hover_text'  => 'text-purple-700',
    ],
];
?>

<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-5xl mx-auto px-4">

        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 text-sm font-medium rounded-full mb-4">
                Servicios Online
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Trámites Municipales
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Realizá tus gestiones de forma rápida y sencilla desde cualquier lugar
            </p>
        </div>

        <div class="grid grid-cols-2 gap-6 md:gap-8">
            <?php foreach ($tramites as $tramite) : ?>
            <a href="<?php echo esc_url($tramite['href']); ?>"
               class="group block bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-transparent">
                <div class="inline-flex p-4 rounded-2xl bg-gradient-to-br <?php echo esc_attr($tramite['gradient']); ?> shadow-lg mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <?php echo $tramite['icon']; ?>
                    </svg>
                </div>
                <h3 class="font-black text-xl text-gray-900 group-hover:text-blue-600 transition-colors mb-2 uppercase tracking-tight leading-tight">
                    <?php echo esc_html($tramite['title']); ?>
                </h3>
                <p class="text-gray-500 text-sm mb-5">
                    <?php echo esc_html($tramite['description']); ?>
                </p>
                <div class="flex items-center gap-2 <?php echo esc_attr($tramite['hover_text']); ?> font-bold text-sm">
                    <span>TRÁMITES</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
