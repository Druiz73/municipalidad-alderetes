<?php
/**
 * Template Name: Seguridad
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/SEGURIDAD/';
$cover_image_url = $base . 'SEGURIDAD2.jpg';
$area_title      = 'Seguridad';
$area_tagline    = 'Secretaría de Protección Ciudadana — Policía Local de Alderetes al servicio de la comunidad';
$area_color      = 'bg-blue-600';

$gallery_images = [
    $base . 'SEGURIDAD1.JPG',
    $base . 'SEGURIDAD3.JPG',
    $base . 'SEGURIDAD4.JPG',
    $base . 'SEGURIDAD5.jpg',
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-blue-600 pl-4">
                    Secretaría de Protección Ciudadana
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-5">
                    En la Secretaría de Protección Ciudadana se encuentra la <strong>Policía Local de Alderetes (P.L.A.)</strong>, una fuerza que depende del municipio de Alderetes y que realiza tareas de prevención, patrullaje urbano y apoyo a operativos de seguridad.
                </p>

                <!-- Hitos 2025 -->
                <div class="space-y-4 mt-8">
                    <h3 class="font-bold text-gray-900 text-lg mb-4">Logros 2025</h3>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Nuevo Destacamento en la Costanera</p>
                            <p class="text-gray-600 text-sm mt-1">En 2025 se inauguró un destacamento de la Policía Local en la costanera del río Salí, con nuevos efectivos y vehículos para reforzar la seguridad.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Patrullaje con motos, bicicletas y camionetas</p>
                            <p class="text-gray-600 text-sm mt-1">La fuerza cuenta con motos, bicicletas y camionetas para patrullajes en toda la ciudad.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Custodia de establecimientos estratégicos</p>
                            <p class="text-gray-600 text-sm mt-1">Se reforzó la custodia y preservación de establecimientos escolares, edificios públicos y locales comerciales de la ciudad.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card lateral -->
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">P.L.A.</h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    La Policía Local de Alderetes es una fuerza municipal que garantiza la seguridad y convivencia de todos los vecinos.
                </p>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-0.5">▸</span> Prevención del delito</li>
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-0.5">▸</span> Patrullaje urbano</li>
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-0.5">▸</span> Apoyo a operativos</li>
                    <li class="flex items-start gap-2"><span class="text-blue-500 mt-0.5">▸</span> Protección ciudadana</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Necesitás comunicarte con el área?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para consultas sobre seguridad ciudadana.</p>
        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>"
           class="inline-flex items-center gap-2 bg-alderetes-orange hover:bg-orange-600 text-white font-semibold px-7 py-3 rounded-full transition-colors duration-300">
            Contactar
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
