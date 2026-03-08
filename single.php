<?php
/**
 * Single post template file.
 *
 * @package TailPress
 */

get_header();
?>

<!-- Hero Section Background -->
<section class="relative pt-10 pb-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                
                <?php get_template_part('template-parts/content', 'single'); ?>

                <?php if (comments_open() || get_comments_number()): ?>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mt-8">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
                
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
