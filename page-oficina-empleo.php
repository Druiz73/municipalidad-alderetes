<?php
/**
 * Template Name: Oficina de Empleo
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/OFICINA-EMPLEO/';
$cover_image_url = $base . 'portada.jpeg';
$area_title      = 'Oficina de Empleo';
$area_tagline    = 'Acompañamos a vecinos y vecinas brindando herramientas y oportunidades para mejorar su inserción laboral';
$area_color      = 'bg-emerald-600';

$gallery_images = [
    $base . '1.jpeg',
    $base . '2.jpeg',
    $base . '3.jpeg',
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-emerald-600 pl-4 not-prose">
                    Acerca del Área
                </h2>
                <p class="mb-5 leading-relaxed">
                    La <strong>Oficina de Empleo</strong> acompaña a vecinos y vecinas brindando herramientas y oportunidades para mejorar su inserción laboral. Ofrecemos asesoramiento, orientación laboral, capacitación y apoyo en la búsqueda de empleo, fortaleciendo las habilidades y posibilidades de crecimiento de cada persona.
                </p>
                <p class="mb-5 leading-relaxed">
                    Trabajamos por más oportunidades para nuestra comunidad, coordinando programas y servicios diseñados para ayudarte a construir un mejor futuro laboral.
                </p>
                
                <h3 class="text-lg font-bold text-gray-900 mb-3 not-prose">Servicios y programas</h3>
                <ul class="space-y-2 not-prose">
                    <?php
                    $servicios = [
                        'Asesoramiento y orientación laboral personalizada.',
                        'Capacitación laboral y talleres para el fortalecimiento de habilidades.',
                        'Apoyo y asistencia en la búsqueda activa de empleo.',
                        'Vinculación con programas de empleo nacionales y provinciales.',
                        'Intermediación laboral con comercios y empresas locales.',
                    ];
                    foreach ( $servicios as $servicio ) :
                    ?>
                        <li class="flex items-start gap-2 text-gray-700">
                            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <?php echo esc_html( $servicio ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Card lateral -->
            <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Oficina de Empleo</h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed mb-4">
                    Acercate y conocé los programas y servicios disponibles para ayudarte a construir un mejor futuro laboral.
                </p>
                
                <div class="border-t border-emerald-100 pt-4 space-y-3">
                    <div>
                        <p class="text-xs font-semibold text-emerald-700 uppercase tracking-wide">Horario de atención</p>
                        <p class="text-sm text-gray-900 font-medium">Lunes a Viernes de 08:00 a 13:00 hs</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-emerald-700 uppercase tracking-wide">Lugar</p>
                        <p class="text-sm text-gray-900 font-medium">Benjamin Aráoz 100 entre Caseros y pasaje Junín</p>
                    </div>
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
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para consultas sobre la Oficina de Empleo.</p>
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
