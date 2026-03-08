<?php
/**
 * Main template file.
 *
 * @package TailPress
 */

get_header();

if (is_front_page()) :
    get_template_part('template-parts/hero-carousel');
    get_template_part('template-parts/banner-info', null, ['variant' => 'primary']);
    get_template_part('template-parts/tramites-section'); // Desactivado: sección visible solo en página Trámites
    get_template_part('template-parts/areas-section');
    get_template_part('template-parts/noticias-section');
    get_template_part('template-parts/banner-info', null, ['variant' => 'secondary']);
else :
?>

<div class="container mx-auto space-y-24 lg:space-y-32">
    <?php if (!is_singular()) : ?>
        <?php if (is_archive()) : ?>
            <header class="mb-8"><h1 class="text-3xl font-semibold"><?php the_archive_title(); ?></h1></header>
        <?php elseif (is_search()) : ?>
            <header class="mb-8"><h1 class="text-3xl font-semibold"><?php printf(__('Search results for: %s', 'tailpress'), get_search_query()); ?></h1></header>
        <?php elseif (is_404()) : ?>
            <header class="mb-8"><h1 class="text-3xl font-semibold"><?php _e('Page Not Found', 'tailpress'); ?></h1></header>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', is_singular() ? 'single' : ''); ?>
        <?php endwhile; ?>
        <?php TailPress\Pagination::render(); ?>
    <?php endif; ?>
</div>

<?php endif; ?>

<?php get_footer();

