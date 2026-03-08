<?php
/**
 * Template Name: Catastro
 *
 * @package TailPress
 */

$cover_image_url = null;
$area_title      = 'Catastro';
$area_tagline    = 'Registro, organización y actualización de la información catastral del ejido municipal';
$area_color      = 'bg-purple-500';

$gallery_images = [];

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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-purple-500 pl-4">
                    Acerca del Área
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-5">
                    El área de Catastro de la Municipalidad de Alderetes tiene como función principal el <strong>registro, organización y actualización</strong> de la información catastral de los inmuebles ubicados dentro del ejido municipal. A través de esta oficina se administran los datos relacionados con terrenos, construcciones, medidas y nomenclaturas catastrales.
                </p>
                <p class="text-gray-600 leading-relaxed mb-5">
                    Este departamento cumple un rol fundamental en el <strong>ordenamiento territorial</strong> de la ciudad, brindando apoyo a diferentes áreas municipales y facilitando trámites vinculados a la regularización de propiedades, subdivisiones, unificaciones de terrenos y certificaciones catastrales.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    De esta manera, el área de Catastro contribuye al <strong>desarrollo urbano planificado</strong> y al crecimiento ordenado de la ciudad de Alderetes.
                </p>
            </div>

            <!-- Card lateral -->
            <div class="bg-purple-50 rounded-2xl p-6 border border-purple-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-purple-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Trámites</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><span class="text-purple-500 mt-0.5">▸</span> Regularización de propiedades</li>
                    <li class="flex items-start gap-2"><span class="text-purple-500 mt-0.5">▸</span> Subdivisiones de terrenos</li>
                    <li class="flex items-start gap-2"><span class="text-purple-500 mt-0.5">▸</span> Unificaciones de parcelas</li>
                    <li class="flex items-start gap-2"><span class="text-purple-500 mt-0.5">▸</span> Certificaciones catastrales</li>
                    <li class="flex items-start gap-2"><span class="text-purple-500 mt-0.5">▸</span> Nomenclaturas catastrales</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Necesitás un trámite catastral?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para iniciar tu gestión.</p>
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
