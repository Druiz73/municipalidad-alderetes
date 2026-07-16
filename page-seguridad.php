<?php
/**
 * Template Name: Seguridad
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/SEGURIDAD/';
$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = get_the_title();
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-blue-600';

$gallery_images = [
    $base . 'SEGURIDAD1.JPG',
    $base . 'SEGURIDAD3.JPG',
    $base . 'SEGURIDAD4.JPG',
    $base . 'SEGURIDAD5.jpg',
];

get_header();
get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $cover_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => $area_color,
] );
$achievements = array_pad( tp_content_rows( 'achievements' ), 3, ['', ''] );
?>

<!-- Descripción principal -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-12 items-start">

            <!-- Texto -->
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-blue-600 pl-4">
                    <?php echo esc_html( tp_content( 'intro_heading' ) ); ?>
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-5">
                    <?php echo wp_kses_post( tp_content( 'intro_1' ) ); ?>
                </p>

                <!-- Hitos 2025 -->
                <div class="space-y-4 mt-8">
                    <h3 class="font-bold text-gray-900 text-lg mb-4"><?php echo esc_html( tp_content( 'achievements_heading' ) ); ?></h3>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php echo esc_html( $achievements[0][0] ?? '' ); ?></p>
                            <p class="text-gray-600 text-sm mt-1"><?php echo esc_html( $achievements[0][1] ?? '' ); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php echo esc_html( $achievements[1][0] ?? '' ); ?></p>
                            <p class="text-gray-600 text-sm mt-1"><?php echo esc_html( $achievements[1][1] ?? '' ); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-blue-50 rounded-xl p-4 border border-blue-100">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm"><?php echo esc_html( $achievements[2][0] ?? '' ); ?></p>
                            <p class="text-gray-600 text-sm mt-1"><?php echo esc_html( $achievements[2][1] ?? '' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card lateral -->
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900"><?php echo esc_html( tp_content( 'sidebar_heading' ) ); ?></h3>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">
                    <?php echo esc_html( tp_content( 'sidebar_text' ) ); ?>
                </p>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    <?php foreach ( tp_content_lines( 'sidebar_items' ) as $item ) : ?>
                        <li class="flex items-start gap-2"><span class="text-blue-500 mt-0.5">▸</span> <?php echo esc_html( $item ); ?></li>
                    <?php endforeach; ?>
                </ul>
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
