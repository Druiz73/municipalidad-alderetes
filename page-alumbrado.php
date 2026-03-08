<?php
/**
 * Template Name: Alumbrado Público
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/ALUMBRADO-PUBLICO/';
$cover_image_url = $base . 'FOTO1.jpg';
$area_title      = 'Alumbrado Público';
$area_tagline    = 'Instalación, mantenimiento y reparación de luminarias en calles, plazas y espacios públicos';
$area_color      = 'bg-yellow-500';

$gallery_images = [
    $base . 'FOTO2.jpg',
    $base . 'FOTO3.jpg',
    $base . 'FOTO4.jpg',
];

get_header();
get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $cover_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => $area_color,
] );
?>

<!-- Descripción principal -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-12 items-start">

            <!-- Texto -->
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-yellow-500 pl-4">
                    Acerca del Área
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    El Alumbrado Público de la Municipalidad de Alderetes es el área encargada de la instalación, mantenimiento y reparación de las luminarias de las calles, plazas y espacios públicos de la ciudad.
                </p>

                <h3 class="font-bold text-gray-900 mb-4">Nuestras principales tareas</h3>
                <?php
                $tareas = [
                    'Instalación de luminarias en calles, avenidas, plazas y barrios.',
                    'Reparación y mantenimiento de lámparas, cables, columnas y tableros eléctricos.',
                    'Reemplazo de luminarias dañadas o quemadas.',
                    'Colocación de nuevas luces LED para mejorar la iluminación y el ahorro de energía.',
                    'Control del encendido y apagado automático de las luces públicas.',
                    'Atención de reclamos de vecinos por falta de iluminación o fallas en el servicio.',
                ];
                ?>
                <ul class="space-y-3">
                    <?php foreach ( $tareas as $tarea ) : ?>
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                            </div>
                            <span class="text-gray-700"><?php echo esc_html( $tarea ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Card lateral -->
            <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-yellow-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">LED</h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Estamos renovando progresivamente el parque de luminarias con tecnología <strong>LED</strong>, mejorando la iluminación y reduciendo el consumo energético.
                </p>
                <div class="mt-4 pt-4 border-t border-yellow-100">
                    <p class="text-xs font-semibold text-yellow-700 uppercase tracking-wide mb-1">Reclamos</p>
                    <p class="text-sm text-gray-600">Podés reportar fallas de iluminación a través de la Municipalidad.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Hay una luminaria sin funcionar en tu barrio?</h3>
        <p class="text-blue-200 mb-6">Reportá la falla a la Municipalidad de Alderetes y la solucionamos.</p>
        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>"
           class="inline-flex items-center gap-2 bg-alderetes-orange hover:bg-orange-600 text-white font-semibold px-7 py-3 rounded-full transition-colors duration-300">
            Reportar falla
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
