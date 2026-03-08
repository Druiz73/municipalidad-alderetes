<?php
/**
 * Search Results Template.
 *
 * @package TailPress
 */

get_header();

$search_query = get_search_query();
?>

<!-- Hero -->
<section class="relative py-16 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/G%3E%3C/svg%3E\");" aria-hidden="true"></div>
    <div class="max-w-3xl mx-auto px-4 relative z-10">
        <p class="text-blue-300 text-sm font-semibold uppercase tracking-widest mb-3">Resultados de búsqueda</p>
        <h1 class="text-3xl md:text-4xl font-bold mb-6">
            <?php if ( $search_query ) : ?>
                Búsqueda: <span class="text-alderetes-orange"><?php echo esc_html( $search_query ); ?></span>
            <?php else : ?>
                Ingresá un término de búsqueda
            <?php endif; ?>
        </h1>

        <!-- Search form inside hero -->
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative">
            <input
                type="search"
                name="s"
                value="<?php echo esc_attr( $search_query ); ?>"
                placeholder="Buscar trámites, noticias, información..."
                class="w-full px-5 py-4 pl-14 bg-white/10 border border-white/30 backdrop-blur-sm rounded-2xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-alderetes-orange focus:border-transparent text-lg"
                autocomplete="off"
            >
            <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-white/70 hover:text-white transition-colors" aria-label="Buscar">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </form>
    </div>
</section>

<!-- Results -->
<section class="py-16 bg-gray-50 min-h-[50vh]">
    <div class="max-w-4xl mx-auto px-4">

        <?php if ( have_posts() ) : ?>

            <p class="text-gray-500 text-sm mb-8">
                <?php
                global $wp_query;
                $total = $wp_query->found_posts;
                echo esc_html( $total . ' ' . ( $total === 1 ? 'resultado encontrado' : 'resultados encontrados' ) . ' para "' . $search_query . '"' );
                ?>
            </p>

            <div class="space-y-5">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100' ); ?>>
                        <div class="flex items-start gap-4">

                            <!-- Icon by post type -->
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-alderetes-blue/10 flex items-center justify-center mt-1">
                                <?php if ( get_post_type() === 'post' ) : ?>
                                    <svg class="w-5 h-5 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6"/>
                                    </svg>
                                <?php else : ?>
                                    <svg class="w-5 h-5 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <div class="flex-1 min-w-0">
                                <!-- Post type badge -->
                                <span class="inline-block text-xs font-semibold text-alderetes-blue uppercase tracking-wide mb-1">
                                    <?php echo esc_html( get_post_type() === 'post' ? 'Noticia' : 'Página' ); ?>
                                </span>

                                <!-- Title -->
                                <h2 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-alderetes-blue">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-alderetes-blue transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <!-- Excerpt -->
                                <?php if ( has_excerpt() || get_the_excerpt() ) : ?>
                                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                                        <?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, '...' ) ); ?>
                                    </p>
                                <?php endif; ?>

                                <!-- Meta -->
                                <div class="flex items-center gap-3 mt-3 text-xs text-gray-400">
                                    <?php if ( get_post_type() === 'post' ) : ?>
                                        <span><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?></span>
                                        <span>•</span>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="text-alderetes-blue hover:underline font-medium">
                                        Ver más →
                                    </a>
                                </div>
                            </div>

                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                <div class="mt-10 flex justify-center gap-2">
                    <?php
                    echo paginate_links( [
                        'prev_text' => '← Anterior',
                        'next_text' => 'Siguiente →',
                        'type'      => 'list',
                        'before_page_number' => '<span class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600 transition-colors text-sm">',
                        'after_page_number'  => '</span>',
                    ] );
                    ?>
                </div>
            <?php endif; ?>

        <?php else : ?>

            <!-- No results -->
            <div class="text-center py-20">
                <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">Sin resultados</h2>
                <p class="text-gray-500 max-w-md mx-auto mb-8">
                    No encontramos resultados para <strong>"<?php echo esc_html( $search_query ); ?>"</strong>. Intentá con otros términos o navegá por las secciones del sitio.
                </p>

                <!-- Suggested links -->
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-5 py-2.5 bg-alderetes-blue text-white rounded-full text-sm font-medium hover:bg-blue-800 transition-colors">Inicio</a>
                    <a href="<?php echo esc_url( home_url( '/noticias' ) ); ?>" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-50 transition-colors">Noticias</a>
                    <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-50 transition-colors">Contacto</a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
