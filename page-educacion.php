<?php
/**
 * Template Name: Educación
 *
 * @package TailPress
 */

$base    = get_template_directory_uri() . '/resources/images/fotos-areas/EDUCACION/';
$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = get_the_title();
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-indigo-500';

$gallery_fallback = [
    $base . 'FOTO5.jpg',
    $base . 'FOTO6.jpg',
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
            <div class="md:col-span-3">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-indigo-500 pl-4">
                        <?php echo esc_html( tp_content( 'intro_heading' ) ); ?>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed max-w-3xl">
                        <?php echo esc_html( tp_content( 'intro_1' ) ); ?>
                    </p>
                </div>

                <!-- Funciones en grid de cards -->
        <?php
        $function_colors = ['bg-indigo-500', 'bg-blue-500', 'bg-purple-500', 'bg-violet-500', 'bg-sky-500'];
        $funciones = [];
        foreach ( tp_content_rows( 'functions' ) as $index => $row ) {
            $funciones[] = [
                'titulo' => $row[0] ?? '',
                'color'  => $function_colors[$index] ?? 'bg-indigo-500',
                'items'  => array_values( array_filter( array_slice( $row, 1 ) ) ),
            ];
        }
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

            <!-- Lateral: Dirección / Horario / Mapa (derecha, debajo del hero) -->
            <div class="bg-indigo-50 rounded-2xl p-6 border border-indigo-100 h-fit md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Contacto</h3>
                </div>
                <?php $addr = tp_content('address'); $addr_label = tp_content('address_label'); $hrs = tp_content('hours'); $hrs_label = tp_content('hours_label'); $map_url = tp_content('map_url'); $map_embed = tp_content('map_embed'); ?>
                <?php if ($addr): ?><div class="pb-4"><p class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-1"><?php echo esc_html($addr_label ?: 'Dirección'); ?></p><p class="text-sm text-gray-700 whitespace-pre-line"><?php echo esc_html($addr); ?></p></div><?php endif; ?>
                <?php if ($hrs): ?><div class="pt-4 border-t border-indigo-100"><p class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-1"><?php echo esc_html($hrs_label ?: 'Horario'); ?></p><p class="text-sm text-gray-700"><?php echo esc_html($hrs); ?></p></div><?php endif; ?>
                <?php if ($map_embed): ?><div class="mt-4 pt-4 border-t border-indigo-100"><div class="rounded-xl overflow-hidden border border-indigo-100 aspect-video bg-white relative [&_iframe]:absolute [&_iframe]:inset-0 [&_iframe]:w-full [&_iframe]:h-full [&_iframe]:border-0"><?php echo wp_kses($map_embed, ['iframe'=>['src'=>[],'width'=>[],'height'=>[],'style'=>[],'allowfullscreen'=>[],'loading'=>[],'referrerpolicy'=>[],'frameborder'=>[],'class'=>[]]]); ?></div></div><?php endif; ?>
                <?php if ($map_url): ?><a href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 underline">Ver en Google Maps →</a><?php endif; ?>
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
