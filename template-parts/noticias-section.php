<?php
/**
 * Noticias section.
 *
 * Lee las noticias publicadas desde el CPT `noticia` (editable desde el
 * panel de WordPress en Admin → Noticias). Si todavía no hay ninguna
 * noticia publicada, usa contenido mock como fallback para no romper la
 * vista de la home.
 *
 * Comportamiento:
 *   - 1 noticia  → card sola.
 *   - 2 noticias → grid de 2 columnas (sin carrousel).
 *   - 3+ noticias → carrousel deslizable (2 visibles en desktop, 1 en mobile).
 *
 * @package TailPress
 */

$facebook_page_url  = 'https://www.facebook.com/MunicipalidaddeAlderetes';
$facebook_embed_url = 'https://www.facebook.com/plugins/page.php?href=' . rawurlencode( $facebook_page_url ) . '&tabs=timeline&width=500&height=660&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false';

// Traer noticias publicadas (función definida en functions.php).
$noticias = function_exists( 'tp_get_noticias' ) ? tp_get_noticias( 10 ) : [];

// Fallback al contenido original si todavía no hay noticias cargadas.
if ( empty( $noticias ) ) {
    $news_base = get_template_directory_uri() . '/resources/images/fotos-areas/NOTICIAS/';
    $noticias  = [
        [
            'tag'     => 'Educación',
            'title'   => 'Importante operativo de salud escolar en la Escuela Secundaria Barrio Rincón del Este',
            'excerpt' => 'Se realizaron fichas médicas, controles integrales y vacunación para acompañar las trayectorias educativas de los estudiantes del establecimiento.',
            'image'   => $news_base . rawurlencode( 'INICIO 1.jpg' ),
        ],
        [
            'tag'     => 'Comunidad',
            'title'   => 'Acompañamos actividades institucionales y encuentros de vecinos en distintos puntos de Alderetes',
            'excerpt' => 'La Municipalidad continúa articulando presencia territorial, participación comunitaria y acciones conjuntas para fortalecer el vínculo con cada barrio.',
            'image'   => $news_base . rawurlencode( 'INICIO 2.jpg' ),
        ],
    ];
}

$total       = count( $noticias );
$use_carousel = $total > 2;

/**
 * Renderiza una card individual. Se reutiliza tanto en el grid estático
 * como dentro del carrousel para mantener el mismo diseño exacto.
 */
$render_card = function ( $item ) {
    $image   = ! empty( $item['image'] ) ? $item['image'] : '';
    $tag     = ! empty( $item['tag'] ) ? $item['tag'] : '';
    $title   = ! empty( $item['title'] ) ? $item['title'] : '';
    $excerpt = ! empty( $item['excerpt'] ) ? $item['excerpt'] : '';
    ?>
    <article class="group h-full bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
        <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-alderetes-cream to-white">
            <?php if ( $image ) : ?>
                <img
                    src="<?php echo esc_url( $image ); ?>"
                    alt="<?php echo esc_attr( $title ); ?>"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    loading="lazy"
                >
            <?php endif; ?>
            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-gray-900/60 to-transparent"></div>
            <?php if ( $tag ) : ?>
                <span class="absolute top-4 left-4 inline-flex items-center px-3 py-1 bg-white/90 text-alderetes-blue text-xs font-bold uppercase tracking-wider rounded-full shadow-sm">
                    <?php echo esc_html( $tag ); ?>
                </span>
            <?php endif; ?>
        </div>

        <div class="p-6 flex flex-col flex-1">
            <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                <span>Municipalidad de Alderetes</span>
                <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                <span>Prensa</span>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-3">
                <?php echo esc_html( $title ); ?>
            </h3>

            <p class="text-gray-600 leading-relaxed">
                <?php echo esc_html( $excerpt ); ?>
            </p>
        </div>
    </article>
    <?php
};
?>

<section class="py-12 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex flex-col justify-between items-start gap-4 mb-8 md:mb-14">
            <div>
                <span class="inline-block px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                    <?php echo esc_html( tp_content( 'news_badge', 'inicio' ) ); ?>
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900"><?php echo esc_html( tp_content( 'news_title', 'inicio' ) ); ?></h2>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1fr)_500px] gap-8 items-start">

            <div>
                <?php if ( ! $use_carousel ) : ?>

                    <!-- 1 o 2 noticias: grid estático -->
                    <div class="grid <?php echo $total === 1 ? 'md:grid-cols-1' : 'md:grid-cols-2'; ?> gap-6 xl:items-stretch">
                        <?php foreach ( $noticias as $item ) : ?>
                            <?php $render_card( $item ); ?>
                        <?php endforeach; ?>
                    </div>

                <?php else : ?>

                    <!-- 3+ noticias: carrousel multi-item -->
                    <div
                        class="tp-news-carousel relative"
                        data-items-desktop="2"
                        data-items-mobile="1"
                    >
                        <div class="overflow-hidden">
                            <div class="tp-news-carousel-track flex transition-transform duration-500 ease-in-out -mx-3">
                                <?php foreach ( $noticias as $item ) : ?>
                                    <div class="tp-news-carousel-slide flex-shrink-0 w-full md:w-1/2 px-3 box-border">
                                        <?php $render_card( $item ); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Controles -->
                        <button
                            type="button"
                            class="tp-news-carousel-prev absolute -left-3 md:-left-5 top-1/3 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center bg-white shadow-lg rounded-full text-alderetes-blue hover:bg-alderetes-cream transition-colors disabled:opacity-40 disabled:cursor-not-allowed"
                            aria-label="Noticia anterior"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button
                            type="button"
                            class="tp-news-carousel-next absolute -right-3 md:-right-5 top-1/3 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center bg-white shadow-lg rounded-full text-alderetes-blue hover:bg-alderetes-cream transition-colors disabled:opacity-40 disabled:cursor-not-allowed"
                            aria-label="Siguiente noticia"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <!-- Dots -->
                        <div class="tp-news-carousel-dots flex justify-center gap-2 mt-6"></div>
                    </div>

                <?php endif; ?>
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
