<?php
/**
 * Template Name: Salud
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/SALUD/';
$cover_image_url = $base . 'SALUD1.jpg';
$area_title      = 'Salud';
$area_tagline    = 'Hospital Modular y atención sanitaria para toda la comunidad de Alderetes';
$area_color      = 'bg-red-500';

$gallery_images = [
    $base . 'SALUD2.jpg',
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-red-500 pl-4 not-prose">
                    Acerca del Área
                </h2>
                <p class="mb-5 leading-relaxed">
                    El <strong>Hospital Modular de la ciudad de Alderetes</strong> es un centro de atención sanitaria creado para reforzar el sistema de salud local y brindar asistencia médica a la población de la zona.
                </p>
                <h3 class="text-lg font-bold text-gray-900 mb-3 not-prose">Servicios disponibles</h3>
                <ul class="space-y-2 not-prose">
                    <?php
                    $servicios = [
                        'Guardia médica las 24 horas.',
                        'Farmacia y atención clínica.',
                        'Sala de internación con aproximadamente 10 camas.',
                        'Puestos de hidratación para pacientes.',
                        'Atención de emergencias sanitarias como dengue o COVID-19.',
                        'Proyección de incorporar laboratorio, rayos X y consultorios externos.',
                    ];
                    foreach ( $servicios as $servicio ) :
                    ?>
                        <li class="flex items-start gap-2 text-gray-700">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <?php echo esc_html( $servicio ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Card lateral -->
            <div class="bg-red-50 rounded-2xl p-6 border border-red-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Salud Municipal</h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    El Hospital Modular refuerza el sistema de salud local brindando atención de calidad y accesible a todos los vecinos de la ciudad.
                </p>
                <div class="mt-4 pt-4 border-t border-red-100">
                    <p class="text-xs font-semibold text-red-600 uppercase tracking-wide mb-1">Guardia permanente</p>
                    <p class="text-2xl font-bold text-gray-900">24 hs</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Necesitás comunicarte con el área?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para consultas sobre servicios de salud.</p>
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
