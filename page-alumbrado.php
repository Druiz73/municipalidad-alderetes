<?php
/**
 * Template Name: Alumbrado Público
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/ALUMBRADO-PUBLICO/';
$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = get_the_title();
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-yellow-500';

$gallery_fallback = [
    $base . 'FOTO2.jpg',
    $base . 'FOTO3.jpg',
    $base . 'FOTO4.jpg',
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-yellow-500 pl-4">
                    <?php echo esc_html( tp_content( 'intro_heading' ) ); ?>
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    <?php echo esc_html( tp_content( 'intro_1' ) ); ?>
                </p>

                <h3 class="font-bold text-gray-900 mb-4"><?php echo esc_html( tp_content( 'tasks_heading' ) ); ?></h3>
                <ul class="space-y-3">
                    <?php foreach ( tp_content_lines( 'tasks' ) as $tarea ) : ?>
                        <li class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                            </div>
                            <span class="text-gray-700"><?php echo esc_html( $tarea ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Card lateral -->
            <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100 md:col-span-2 h-fit">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-yellow-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900"><?php echo esc_html( tp_content( 'sidebar_heading' ) ); ?></h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    <?php echo wp_kses_post( tp_content( 'sidebar_text' ) ); ?>
                </p>
                <div class="mt-4 pt-4 border-t border-yellow-100">
                    <p class="text-xs font-semibold text-yellow-700 uppercase tracking-wide mb-1"><?php echo esc_html( tp_content( 'claim_heading' ) ); ?></p>
                    <p class="text-sm text-gray-600"><?php echo esc_html( tp_content( 'claim_text' ) ); ?></p>
                </div>
                <?php $addr = tp_content('address'); $addr_label = tp_content('address_label'); $hrs = tp_content('hours'); $hrs_label = tp_content('hours_label'); if ($addr || $hrs): ?>
                <div class="mt-4 pt-4 border-t border-yellow-100 space-y-3">
                    <?php if ($addr): ?><div><p class="text-xs font-semibold text-yellow-700 uppercase tracking-wide"><?php echo esc_html($addr_label); ?></p><p class="text-sm text-gray-700 whitespace-pre-line"><?php echo esc_html($addr); ?></p></div><?php endif; ?>
                    <?php if ($hrs): ?><div><p class="text-xs font-semibold text-yellow-700 uppercase tracking-wide"><?php echo esc_html($hrs_label); ?></p><p class="text-sm text-gray-700"><?php echo esc_html($hrs); ?></p></div><?php endif; ?>
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
