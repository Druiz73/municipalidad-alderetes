<?php
/**
 * Template Name: Educación
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/EDUCACION/';
$cover_image_url = $base . 'EDUCACION.JPG';
$area_title      = 'Educación';
$area_tagline    = 'Planificamos y coordinamos políticas educativas para garantizar el acceso al aprendizaje';
$area_color      = 'bg-indigo-500';

$gallery_images = [
    $base . 'FOTO5.jpg',
    $base . 'FOTO6.jpg',
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

        <div class="mb-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-indigo-500 pl-4">
                Acerca del Área
            </h2>
            <p class="text-lg text-gray-700 leading-relaxed max-w-3xl">
                El trabajo de la Secretaría de Educación consiste en planificar, coordinar y ejecutar las políticas educativas para mejorar la educación y garantizar el acceso al aprendizaje de la población.
            </p>
        </div>

        <!-- Funciones en grid de cards -->
        <?php
        $funciones = [
            [
                'titulo' => 'Diseñar políticas educativas',
                'color'  => 'bg-indigo-500',
                'items'  => [
                    'Crear proyectos y planes para mejorar la educación en la comunidad.',
                    'Promover programas educativos para niños, jóvenes y adultos.',
                ],
            ],
            [
                'titulo' => 'Coordinar con escuelas e instituciones',
                'color'  => 'bg-blue-500',
                'items'  => [
                    'Trabajar junto a escuelas, docentes, universidades y organizaciones educativas.',
                    'Articular acciones con los ministerios de educación provincial o nacional.',
                ],
            ],
            [
                'titulo' => 'Garantizar el acceso a la educación',
                'color'  => 'bg-purple-500',
                'items'  => [
                    'Impulsar programas de inclusión educativa.',
                    'Promover igualdad de oportunidades para todos los estudiantes.',
                ],
            ],
            [
                'titulo' => 'Supervisar proyectos educativos',
                'color'  => 'bg-violet-500',
                'items'  => [
                    'Controlar que los programas, cursos y capacitaciones se desarrollen correctamente.',
                    'Evaluar resultados y proponer mejoras en el sistema educativo.',
                ],
            ],
            [
                'titulo' => 'Promover capacitaciones y formación',
                'color'  => 'bg-sky-500',
                'items'  => [
                    'Organizar talleres, cursos y capacitaciones para docentes y estudiantes.',
                    'Fomentar el uso de tecnología e innovación educativa.',
                ],
            ],
        ];
        ?>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ( $funciones as $funcion ) : ?>
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="inline-flex w-9 h-9 rounded-lg <?php echo esc_attr( $funcion['color'] ); ?> items-center justify-center mb-4">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-3"><?php echo esc_html( $funcion['titulo'] ); ?></h3>
                    <ul class="space-y-1.5">
                        <?php foreach ( $funcion['items'] as $item ) : ?>
                            <li class="text-sm text-gray-600 flex items-start gap-1.5">
                                <span class="text-indigo-400 mt-0.5">•</span>
                                <?php echo esc_html( $item ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Necesitás comunicarte con el área?</h3>
        <p class="text-blue-200 mb-6">Contactá a la Municipalidad de Alderetes para consultas sobre programas educativos.</p>
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
