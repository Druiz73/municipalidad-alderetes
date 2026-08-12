<?php
/**
 * Template Name: Cultura
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/CULTURA/';
$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = get_the_title();
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-pink-500';

$gallery_fallback = [
    $base . 'FOTO3.jpg',
];
$gallery_custom = function_exists('tp_content_gallery_urls') ? tp_content_gallery_urls('gallery') : [];
$gallery_images = !empty($gallery_custom) ? $gallery_custom : $gallery_fallback;

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
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-5 gap-12 items-start">

            <!-- Texto -->
            <div class="md:col-span-3">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-pink-500 pl-4">
                    <?php echo esc_html( tp_content( 'intro_heading' ) ); ?>
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    <?php echo esc_html( tp_content( 'intro_1' ) ); ?>
                </p>
                <p class="text-gray-600 leading-relaxed">
                    <?php echo wp_kses_post( tp_content( 'intro_2' ) ); ?>
                </p>
            </div>

            <!-- Card lateral -->
            <div class="bg-pink-50 rounded-2xl p-6 border border-pink-100 md:col-span-2 h-fit">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900"><?php echo esc_html( tp_content( 'sidebar_heading' ) ); ?></h3>
                </div>
                <ul class="space-y-2 text-sm text-gray-600">
                    <?php foreach ( tp_content_lines( 'sidebar_items' ) as $item ) : ?>
                        <li class="flex items-start gap-2"><span class="text-pink-400 mt-0.5">▸</span> <?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php
                $addr = tp_content('address');
                $addr_label = tp_content('address_label');
                $hrs = tp_content('hours');
                $hrs_label = tp_content('hours_label');
                if ($addr || $hrs): ?>
                <div class="mt-4 pt-4 border-t border-current/10 space-y-3">
                    <?php if ($addr): ?>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide opacity-70"><?php echo esc_html($addr_label); ?></p>
                        <p class="text-sm font-medium whitespace-pre-line"><?php echo esc_html($addr); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if ($hrs): ?>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide opacity-70"><?php echo esc_html($hrs_label); ?></p>
                        <p class="text-sm font-medium"><?php echo esc_html($hrs); ?></p>
                    </div>
                    <?php endif; ?>
                <?php $map_url = tp_content('map_url'); $map_embed = tp_content('map_embed'); if ($map_url || $map_embed): ?>
                <div class="mt-4 pt-4 border-t border-current/10">
                    <?php if ($map_embed): ?>
                    <div class="rounded-xl overflow-hidden border border-current/10 aspect-video bg-white relative [&_iframe]:absolute [&_iframe]:inset-0 [&_iframe]:w-full [&_iframe]:h-full [&_iframe]:border-0"><?php echo wp_kses($map_embed, ['iframe'=>['src'=>[],'width'=>[],'height'=>[],'style'=>[],'allowfullscreen'=>[],'loading'=>[],'referrerpolicy'=>[],'frameborder'=>[],'class'=>[]]]); ?></div>
                    <?php endif; ?>
                    <?php if ($map_url): ?>
                    <a href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener" class="mt-3 inline-flex items-center gap-2 text-sm font-semibold underline underline-offset-4">Ver en Google Maps →</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [ 'gallery_images' => $gallery_images ] ); ?>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h3 class="text-2xl font-bold mb-3"><?php echo esc_html( tp_content( 'cta_title' ) ); ?></h3>
        <p class="text-blue-200 mb-6"><?php echo esc_html( tp_content( 'cta_text' ) ); ?></p>
        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>"
           class="inline-flex items-center gap-2 bg-alderetes-orange hover:bg-orange-600 text-white font-semibold px-7 py-3 rounded-full transition-colors duration-300">
            <?php echo esc_html( tp_content( 'cta_button' ) ); ?>
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
</section>

<?php get_footer(); ?>
