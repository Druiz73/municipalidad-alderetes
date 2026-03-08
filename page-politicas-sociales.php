<?php
/**
 * Template Name: Políticas Sociales
 *
 * @package TailPress
 */

$cover_image_url = null;
$area_title      = 'Políticas Sociales';
$area_tagline    = 'Promovemos la inclusión, la igualdad de oportunidades y el bienestar de toda la comunidad';
$area_color      = 'bg-pink-500';

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

        <div class="mb-10 max-w-3xl">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-pink-500 pl-4">
                Acerca del Área
            </h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-5">
                La Secretaría de Políticas Sociales de la Municipalidad de Alderetes trabaja para promover la inclusión, la igualdad de oportunidades y el bienestar de todos los vecinos de la ciudad.
            </p>
            <p class="text-gray-600 leading-relaxed mb-5">
                A través de distintos programas y acciones, se brinda acompañamiento a familias en situación de vulnerabilidad, fortaleciendo el acceso a derechos fundamentales como la alimentación, la educación, la salud y el trabajo.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Asimismo, se articulan esfuerzos con organismos provinciales y nacionales para ampliar el alcance de las políticas públicas y mejorar la calidad de vida de la comunidad.
            </p>
        </div>

        <!-- Ejes de acción -->
        <?php
        $ejes = [
            [
                'titulo' => 'Asistencia Social',
                'icono'  => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'color'  => 'bg-pink-500',
                'desc'   => 'Acompañamiento a familias en situación de vulnerabilidad y acceso a derechos fundamentales.',
            ],
            [
                'titulo' => 'Niñez y Adolescencia',
                'icono'  => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'color'  => 'bg-rose-500',
                'desc'   => 'Programas específicos de apoyo a niños, niñas y adolescentes de la ciudad.',
            ],
            [
                'titulo' => 'Capacitación Laboral',
                'icono'  => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'color'  => 'bg-fuchsia-500',
                'desc'   => 'Programas de formación y capacitación laboral para vecinos en búsqueda de empleo.',
            ],
            [
                'titulo' => 'Políticas de Género',
                'icono'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'color'  => 'bg-purple-500',
                'desc'   => 'Acciones orientadas a la igualdad de género y la protección de derechos.',
            ],
            [
                'titulo' => 'Inclusión Comunitaria',
                'icono'  => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064',
                'color'  => 'bg-violet-500',
                'desc'   => 'Iniciativas de inclusión social y articulación con organismos provinciales y nacionales.',
            ],
        ];
        ?>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ( $ejes as $eje ) : ?>
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="inline-flex w-10 h-10 rounded-xl <?php echo esc_attr( $eje['color'] ); ?> items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr( $eje['icono'] ); ?>"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html( $eje['titulo'] ); ?></h3>
                    <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html( $eje['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Mensaje institucional -->
<section class="py-14 bg-pink-50 border-t border-pink-100">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <svg class="w-10 h-10 text-pink-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
        </svg>
        <blockquote class="text-xl text-gray-700 font-medium italic leading-relaxed">
            "El compromiso de la Municipalidad es continuar impulsando políticas sociales que promuevan una sociedad más justa, solidaria e inclusiva para todos los vecinos de Alderetes."
        </blockquote>
    </div>
</section>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Necesitás asistencia o información?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Secretaría de Políticas Sociales de la Municipalidad de Alderetes.</p>
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
