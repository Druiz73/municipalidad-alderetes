<?php
/**
 * Template Name: Deporte
 *
 * @package TailPress
 */

$cover_image_url = null;
$area_title      = 'Deporte';
$area_tagline    = 'El deporte como herramienta de transformación social, salud preventiva y cohesión comunitaria';
$area_color      = 'bg-green-500';

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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-green-500 pl-4">
                    Política Deportiva Municipal
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-5">
                    La política deportiva municipal se consolidó como una herramienta de <strong>transformación social</strong>, entendiendo al deporte como inversión en salud preventiva, cohesión comunitaria y reducción de factores de riesgo social.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Se trabajó bajo un criterio central: convertir el gasto público en <strong>inversión social inteligente</strong>, fortaleciendo infraestructura, profesionalización y territorialidad.
                </p>
            </div>

            <!-- Card lateral -->
            <div class="bg-green-50 rounded-2xl p-6 border border-green-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-green-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Objetivos</h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-start gap-2"><span class="text-green-500 mt-0.5">▸</span> Salud preventiva comunitaria</li>
                    <li class="flex items-start gap-2"><span class="text-green-500 mt-0.5">▸</span> Cohesión social y barrial</li>
                    <li class="flex items-start gap-2"><span class="text-green-500 mt-0.5">▸</span> Fortalecimiento de infraestructura</li>
                    <li class="flex items-start gap-2"><span class="text-green-500 mt-0.5">▸</span> Profesionalización deportiva</li>
                    <li class="flex items-start gap-2"><span class="text-green-500 mt-0.5">▸</span> Alcance territorial en toda la ciudad</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Querés sumarte al deporte municipal?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para conocer los espacios deportivos disponibles.</p>
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
