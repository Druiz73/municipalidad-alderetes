<?php
/**
 * Noticias section con mock editoral + widget de Facebook.
 *
 * @package TailPress
 */

$facebook_page_url  = 'https://www.facebook.com/MunicipalidaddeAlderetes';
$facebook_embed_url = 'https://www.facebook.com/plugins/page.php?href=' . rawurlencode( $facebook_page_url ) . '&tabs=timeline&width=500&height=660&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false';
$news_base          = get_template_directory_uri() . '/resources/images/fotos-areas/NOTICIAS/';

$mock_news = [
    [
        'tag'         => 'Educación',
        'title'       => 'Importante operativo de salud escolar en la Escuela Secundaria Barrio Rincón del Este',
        'excerpt'     => 'Se realizaron fichas médicas, controles integrales y vacunación para acompañar las trayectorias educativas de los estudiantes del establecimiento.',
        'image'       => $news_base . rawurlencode( 'INICIO 1.jpg' ),
        'image_class' => 'object-cover',
    ],
    [
        'tag'         => 'Comunidad',
        'title'       => 'Acompañamos actividades institucionales y encuentros de vecinos en distintos puntos de Alderetes',
        'excerpt'     => 'La Municipalidad continúa articulando presencia territorial, participación comunitaria y acciones conjuntas para fortalecer el vínculo con cada barrio.',
        'image'       => $news_base . rawurlencode( 'INICIO 2.jpg' ),
        'image_class' => 'object-cover',
    ],
];
?>

<section class="py-12 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex flex-col justify-between items-start gap-4 mb-8 md:mb-14">
            <div>
                <span class="inline-block px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                    Actualidad
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Últimas Noticias</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1fr)_500px] gap-8 items-start">
            <div class="grid md:grid-cols-2 gap-6 xl:items-stretch">
                <?php foreach ( $mock_news as $item ) : ?>
                    <article class="group h-full bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
                        <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-alderetes-cream to-white">
                            <img
                                src="<?php echo esc_url( $item['image'] ); ?>"
                                alt="<?php echo esc_attr( $item['title'] ); ?>"
                                class="w-full h-full <?php echo esc_attr( $item['image_class'] ); ?> transition-transform duration-700 group-hover:scale-105"
                                loading="lazy"
                            >
                            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
                            <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 bg-white/90 text-alderetes-blue text-xs font-bold uppercase tracking-wider rounded-full shadow-sm">
                                <?php echo esc_html( $item['tag'] ); ?>
                            </span>
                        </div>

                        <div class="p-6 flex flex-col flex-1">
                            <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                                <span>Municipalidad de Alderetes</span>
                                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                <span>Prensa</span>
                            </div>

                            <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-3">
                                <?php echo esc_html( $item['title'] ); ?>
                            </h3>

                            <p class="text-gray-600 leading-relaxed">
                                <?php echo esc_html( $item['excerpt'] ); ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-lg overflow-hidden">
                <iframe
                    src="<?php echo esc_url( $facebook_embed_url ); ?>"
                    width="100%"
                    height="660"
                    style="border:none;overflow:hidden"
                    scrolling="no"
                    frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    loading="lazy"
                    title="Facebook Municipalidad de Alderetes">
                </iframe>
            </div>
        </div>
    </div>
</section>
