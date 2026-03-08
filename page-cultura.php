<?php
/**
 * Template Name: Cultura
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/CULTURA/';
$cover_image_url = $base . 'FOTO2.jpg';
$area_title      = 'Cultura';
$area_tagline    = 'Apoyo a artistas, instituciones y comunidades para el acceso democrático a la cultura';
$area_color      = 'bg-pink-500';

$gallery_images = [
    $base . 'FOTO3.jpg',
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-pink-500 pl-4">
                    Acerca del Área
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    En el área de Cultura se trabaja de manera articulada con artistas, academias, instituciones educativas, centros comunitarios y organizaciones sociales, brindando apoyo económico, logístico y artístico para la concreción de eventos, viajes, celebraciones y programas culturales.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Estas acciones reflejan el compromiso sostenido de la gestión con la <strong>identidad cultural</strong>, la participación ciudadana y el acceso democrático a la cultura en sus diversas expresiones.
                </p>
            </div>

            <!-- Card lateral -->
            <div class="bg-pink-50 rounded-2xl p-6 border border-pink-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Apoyamos</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> Artistas locales</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> Academias y escuelas de arte</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> Centros comunitarios</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> Eventos y celebraciones</li>
                    <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> Programas culturales barriales</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Querés participar o consultar?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para sumarte a los programas culturales.</p>
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
