<?php
/**
 * Tramites Municipales section.
 *
 * @package TailPress
 */

$tramites = [
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h2l2 5 4-12 3 7h3"/>',
        'title'       => 'Tránsito',
        'description' => 'Turnos para carnet, infracciones y más',
        'href'        => home_url('/transito'),
        'color'       => 'from-blue-500 to-blue-600',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>',
        'title'       => 'Rentas',
        'description' => 'Tasas, impuestos y certificaciones',
        'href'        => home_url('/rentas'),
        'color'       => 'from-green-500 to-green-600',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>',
        'title'       => 'Tribunal de Faltas',
        'description' => 'Consulta de infracciones y pagos',
        'href'        => home_url('/tribunal-de-faltas'),
        'color'       => 'from-amber-500 to-amber-600',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'title'       => 'Catastro',
        'description' => 'Información catastral y planos',
        'href'        => home_url('/catastro'),
        'color'       => 'from-purple-500 to-purple-600',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
        'title'       => 'CISI y Cementerio',
        'description' => 'Trámites y requisitos',
        'href'        => home_url('/cisi'),
        'color'       => 'from-rose-500 to-rose-600',
    ],
    [
        'icon'        => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
        'title'       => 'TEM',
        'description' => 'Declaraciones Juradas y más',
        'href'        => home_url('/tem'),
        'color'       => 'from-cyan-500 to-cyan-600',
    ],
];
?>

<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4">

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($tramites as $tramite) : ?>
            <a href="<?php echo esc_url($tramite['href']); ?>"
               class="group block bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-transparent">
                <div class="flex items-start gap-4">
                    <div class="p-3 rounded-xl bg-gradient-to-br <?php echo esc_attr($tramite['color']); ?> shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <?php echo $tramite['icon']; ?>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg text-gray-900 group-hover:text-blue-600 transition-colors">
                            <?php echo esc_html($tramite['title']); ?>
                        </h3>
                        <p class="text-gray-500 text-sm mt-1">
                            <?php echo esc_html($tramite['description']); ?>
                        </p>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
