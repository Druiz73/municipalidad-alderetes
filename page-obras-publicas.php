<?php
/**
 * Template Name: Obras Públicas
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/OBRAS-PUBLICAS/';
$cover_image_url = $base . 'FOTO6.jpg';
$area_title      = 'Obras Públicas';
$area_tagline    = 'Infraestructura y desarrollo urbano para mejorar la calidad de vida de los vecinos';
$area_color      = 'bg-orange-500';

$gallery_images = [
    $base . 'FOTO4.jpg',
    $base . 'FOTO5.jpg',
    $base . 'FOTO6.jpg',
    $base . 'FOTO10.JPG',
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
            <div class="md:col-span-2 prose prose-lg max-w-none text-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-alderetes-orange pl-4 not-prose">
                    Acerca del Área
                </h2>
                <p class="mb-5 leading-relaxed">
                    La Secretaría o Dirección de Obras Públicas de la municipalidad es el área encargada de planificar, construir y mantener la infraestructura de la ciudad para mejorar la calidad de vida de los vecinos.
                </p>
                <p class="leading-relaxed">
                    Durante el período 2025, la Municipalidad de Alderetes llevó adelante un programa sostenido de inversión en infraestructura urbana, enmarcado en un <strong>Plan Integral y Estratégico de Obras Públicas</strong>, orientado a mejorar la calidad de vida de los vecinos, fortalecer la conectividad urbana, optimizar el sistema hidráulico y consolidar el desarrollo ordenado de la ciudad.
                </p>
            </div>

            <!-- Card lateral -->
            <div class="bg-orange-50 rounded-2xl p-6 border border-orange-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Obras Públicas</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-0.5">▸</span>
                        Planificación de infraestructura urbana
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-0.5">▸</span>
                        Conectividad vial y accesibilidad
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-0.5">▸</span>
                        Optimización del sistema hidráulico
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-0.5">▸</span>
                        Desarrollo urbano ordenado
                    </li>
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
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para consultas sobre obras en tu barrio.</p>
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
