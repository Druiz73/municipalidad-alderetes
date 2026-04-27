<?php
/**
 * Template Name: Punto Digital
 *
 * @package TailPress
 */

$hero_filename   = 'ACTIVIDADES EN COORDINACION CON LAS ESCUELAS2.jpg';
$hero_image_url  = get_template_directory_uri() . '/resources/images/punto-digital/' . rawurlencode( $hero_filename );
$logo_image_url  = get_template_directory_uri() . '/resources/images/punto-digital/' . rawurlencode( 'LOGO PUNTO DIGITAL.jpg' );
$area_title      = 'Punto Digital';
$area_tagline    = 'Tecnología, formación y servicios digitales para acompañar a la comunidad de Alderetes';
$area_color      = 'bg-alderetes-blue-light';
$gallery_dir     = get_template_directory() . '/resources/images/punto-digital';
$gallery_images  = [];
$gallery_groups  = [];

if ( is_dir( $gallery_dir ) ) {
    $gallery_files = glob( $gallery_dir . '/*.{jpg,jpeg,JPG,JPEG,png,PNG,webp,WEBP}', GLOB_BRACE );
    $group_dirs     = glob( $gallery_dir . '/*', GLOB_ONLYDIR );

    if ( $gallery_files ) {
        natsort( $gallery_files );

        foreach ( $gallery_files as $file ) {
            $basename = basename( $file );

            if ( $basename === $hero_filename || $basename === 'LOGO PUNTO DIGITAL.jpg' ) {
                continue;
            }

            $gallery_images[] = get_template_directory_uri() . '/resources/images/punto-digital/' . rawurlencode( $basename );
        }
    }

    if ( $group_dirs ) {
        natsort( $group_dirs );

        foreach ( $group_dirs as $dir ) {
            $group_files = glob( $dir . '/*.{jpg,jpeg,JPG,JPEG,png,PNG,webp,WEBP}', GLOB_BRACE );

            if ( ! $group_files ) {
                continue;
            }

            natsort( $group_files );

            $group_name   = trim( basename( $dir ) );
            $group_slug   = sanitize_title( $group_name );
            $group_images = [];

            foreach ( $group_files as $file ) {
                $group_images[] = get_template_directory_uri()
                    . '/resources/images/punto-digital/'
                    . rawurlencode( basename( $dir ) )
                    . '/'
                    . rawurlencode( basename( $file ) );
            }

            $gallery_groups[] = [
                'name'   => $group_name,
                'slug'   => $group_slug,
                'cover'  => $group_images[0],
                'images' => $group_images,
                'count'  => count( $group_images ),
            ];
        }
    }
}

get_header();
get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $hero_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => $area_color,
] );
?>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] gap-10 items-start">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-alderetes-blue-light pl-4">
                    Punto Digital Alderetes
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-5">
                    El Punto Digital de Alderetes es un espacio público destinado a brindar acceso a herramientas tecnológicas y servicios digitales, promoviendo la inclusión y el desarrollo de la comunidad.
                </p>
                <p class="text-gray-600 leading-relaxed mb-5">
                    El Punto Digital es un servicio gratuito para la comunidad, que tiene como objetivo garantizar el acceso igualitario a la tecnología, facilitando el uso de computadoras, el asesoramiento en distintos trámites, el uso de una sala de entretenimiento, la proyección de películas en una sala de cine totalmente equipada, entre otras actividades destinadas a los vecinos de Alderetes.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    A través de este espacio se fortalecen la formación, la recreación y el acompañamiento en gestiones digitales, generando más oportunidades para niños, jóvenes y adultos.
                </p>
            </div>

            <div class="bg-alderetes-cream rounded-3xl border border-[#e7dcc8] p-6 shadow-sm">
                <img
                    src="<?php echo esc_url( $logo_image_url ); ?>"
                    alt="Logo Punto Digital"
                    class="w-36 h-36 object-contain mx-auto mb-5"
                    loading="lazy"
                >
                <p class="font-semibold text-alderetes-blue text-center mb-2">Servicio gratuito para la comunidad</p>
                <p class="text-sm text-gray-700 text-center">Un espacio de acceso tecnológico, formación, recreación y acompañamiento en trámites digitales.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-10">
            <span class="inline-flex items-center px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                Servicios
            </span>
            <h2 class="text-3xl font-bold text-gray-900">¿Qué ofrece el Punto Digital?</h2>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5">
            <?php
            $servicios = [
                [
                    'titulo' => 'Cursos y capacitaciones',
                    'descripcion' => 'Formación en informática y otras materias para ampliar conocimientos y habilidades.',
                    'icono' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>',
                ],
                [
                    'titulo' => 'Asistencia en trámites',
                    'descripcion' => 'Acompañamiento para Mi Argentina, ANSES, PROGRESAR, subsidios de servicios públicos y otras gestiones.',
                    'icono' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
                ],
                [
                    'titulo' => 'Talleres educativos',
                    'descripcion' => 'Espacios educativos y de formación laboral pensados para distintas edades y necesidades.',
                    'icono' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M7 20h10a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>',
                ],
                [
                    'titulo' => 'Sala de entretenimiento',
                    'descripcion' => 'Uso de consolas de videojuegos y propuestas recreativas para niños y jóvenes.',
                    'icono' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.868v4.264a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                ],
            ];

            foreach ( $servicios as $servicio ) : ?>
                <div class="bg-white rounded-2xl border border-[#ebe4d8] p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-2xl bg-alderetes-blue-light flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <?php echo $servicio['icono']; ?>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html( $servicio['titulo'] ); ?></h3>
                    <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html( $servicio['descripcion'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ( ! empty( $gallery_groups ) ) : ?>
<section class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10">
            <div>
                <span class="inline-flex items-center px-4 py-1.5 bg-blue-50 text-alderetes-blue text-sm font-medium rounded-full mb-4 border border-blue-100">
                    Galerías
                </span>
                <h2 class="text-3xl font-bold text-gray-900">Espacios y actividades del Punto Digital</h2>
                <p class="text-gray-600 mt-3 max-w-3xl">Cada carpeta ahora se muestra como una sección propia para ordenar mejor las fotos y el contenido de cada espacio.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mb-12">
            <?php foreach ( $gallery_groups as $group ) : ?>
                <a href="#<?php echo esc_attr( $group['slug'] ); ?>" class="group bg-gray-50 border border-gray-200 rounded-3xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img
                            src="<?php echo esc_url( $group['cover'] ); ?>"
                            alt="<?php echo esc_attr( $group['name'] ); ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <h3 class="font-bold text-gray-900 text-lg leading-tight"><?php echo esc_html( $group['name'] ); ?></h3>
                            <span class="shrink-0 inline-flex items-center justify-center min-w-10 h-10 rounded-full bg-alderetes-blue-light text-white text-sm font-bold">
                                <?php echo esc_html( (string) $group['count'] ); ?>
                            </span>
                        </div>
                        <p class="text-sm text-gray-600">Ver fotos de esta sección</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="space-y-14">
            <?php foreach ( $gallery_groups as $group ) : ?>
                <section id="<?php echo esc_attr( $group['slug'] ); ?>" class="scroll-mt-28">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-alderetes-orange text-white flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900"><?php echo esc_html( $group['name'] ); ?></h3>
                            <p class="text-sm text-gray-500"><?php echo esc_html( (string) $group['count'] ); ?> imágenes en esta galería</p>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php foreach ( $group['images'] as $index => $image_url ) : ?>
                            <figure class="group overflow-hidden rounded-3xl border border-gray-200 bg-gray-50 shadow-sm">
                                <div class="aspect-[4/3] overflow-hidden">
                                    <img
                                        src="<?php echo esc_url( $image_url ); ?>"
                                        alt="<?php echo esc_attr( $group['name'] . ' ' . ( $index + 1 ) ); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </div>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ( ! empty( $gallery_images ) ) : ?>
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="mb-8">
            <span class="inline-flex items-center px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                Destacadas
            </span>
            <h2 class="text-3xl font-bold text-gray-900">Imágenes generales</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ( $gallery_images as $index => $image_url ) : ?>
                <figure class="group overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img
                            src="<?php echo esc_url( $image_url ); ?>"
                            alt="<?php echo esc_attr( 'Punto Digital imagen destacada ' . ( $index + 1 ) ); ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                    </div>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="py-14 bg-gradient-to-br from-alderetes-blue to-alderetes-green text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3">¿Querés acercarte o recibir asesoramiento?</h3>
        <p class="text-white/80 mb-6">Contactá a la Municipalidad de Alderetes para obtener más información sobre actividades y servicios del Punto Digital.</p>
        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>"
           class="inline-flex items-center gap-2 bg-alderetes-orange hover:bg-[#a95c1e] text-white font-semibold px-7 py-3 rounded-full transition-colors duration-300">
            Contactar
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
