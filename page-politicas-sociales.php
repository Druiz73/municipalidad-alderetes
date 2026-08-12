<?php
/**
 * Template Name: Políticas Sociales
 *
 * @package TailPress
 */

$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = get_the_title();
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-pink-500';

$gallery_dir = get_template_directory() . '/resources/images/fotos-areas/POLITICAS-SOCIALES';
$gallery_fallback = [];

if ( is_dir( $gallery_dir ) ) {
    $gallery_files = glob( $gallery_dir . '/*.{jpg,jpeg,JPG,JPEG,png,PNG,webp,WEBP}', GLOB_BRACE );

    if ( $gallery_files ) {
        natsort( $gallery_files );

        foreach ( $gallery_files as $file ) {
            $gallery_fallback[] = get_template_directory_uri() . '/resources/images/fotos-areas/POLITICAS-SOCIALES/' . basename( $file );
        }
    }
}
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

            <!-- Texto + ejes (izquierda, 2 cols) -->
            <div class="md:col-span-3">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-pink-500 pl-4">
                        <?php echo esc_html( tp_content( 'intro_heading' ) ); ?>
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-5">
                        <?php echo esc_html( tp_content( 'intro_1' ) ); ?>
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-5">
                        <?php echo esc_html( tp_content( 'intro_2' ) ); ?>
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        <?php echo esc_html( tp_content( 'intro_3' ) ); ?>
                    </p>
                </div>

                <!-- Ejes de acción -->
                <?php
                $axis_rows = tp_content_rows( 'axes' );
        $ejes = [
            [
                'titulo' => $axis_rows[0][0] ?? '',
                'icono'  => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                'color'  => 'bg-pink-500',
                'desc'   => $axis_rows[0][1] ?? '',
            ],
            [
                'titulo' => $axis_rows[1][0] ?? '',
                'icono'  => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                'color'  => 'bg-rose-500',
                'desc'   => $axis_rows[1][1] ?? '',
            ],
            [
                'titulo' => $axis_rows[2][0] ?? '',
                'icono'  => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'color'  => 'bg-fuchsia-500',
                'desc'   => $axis_rows[2][1] ?? '',
            ],
            [
                'titulo' => $axis_rows[3][0] ?? '',
                'icono'  => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'color'  => 'bg-purple-500',
                'desc'   => $axis_rows[3][1] ?? '',
            ],
            [
                'titulo' => $axis_rows[4][0] ?? '',
                'icono'  => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064',
                'color'  => 'bg-violet-500',
                'desc'   => $axis_rows[4][1] ?? '',
            ],
        ];
        ?>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ( $ejes as $eje ) : ?>
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="inline-flex w-10 h-10 rounded-xl <?php echo esc_attr( $eje['color'] ); ?> items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr( $eje['icono'] ); ?>"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html( $eje['titulo'] ); ?></h3>
                    <p class="text-sm text-gray-600 leading-relaxed"><?php echo esc_html( $eje['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
                </div>
            </div>

            <!-- Lateral: Dirección / Horario / Mapa (derecha, debajo del hero) -->
            <div class="bg-pink-50 rounded-2xl p-6 border border-pink-100 h-fit md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-500 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Contacto</h3>
                </div>
                <?php $addr = tp_content('address'); $addr_label = tp_content('address_label'); $hrs = tp_content('hours'); $hrs_label = tp_content('hours_label'); $map_url = tp_content('map_url'); $map_embed = tp_content('map_embed'); ?>
                <?php if ($addr): ?>
                <div class="pb-4">
                    <p class="text-xs font-bold text-pink-600 uppercase tracking-wide mb-1"><?php echo esc_html($addr_label ?: 'Dirección'); ?></p>
                    <p class="text-sm text-gray-700 whitespace-pre-line"><?php echo esc_html($addr); ?></p>
                </div>
                <?php endif; ?>
                <?php if ($hrs): ?>
                <div class="pt-4 border-t border-pink-100">
                    <p class="text-xs font-bold text-pink-600 uppercase tracking-wide mb-1"><?php echo esc_html($hrs_label ?: 'Horario'); ?></p>
                    <p class="text-sm text-gray-700"><?php echo esc_html($hrs); ?></p>
                </div>
                <?php endif; ?>
                <?php if ($map_embed): ?>
                <div class="mt-4 pt-4 border-t border-pink-100"><div class="rounded-xl overflow-hidden border border-pink-100 aspect-video bg-white relative [&_iframe]:absolute [&_iframe]:inset-0 [&_iframe]:w-full [&_iframe]:h-full [&_iframe]:border-0"><?php echo wp_kses($map_embed, ['iframe'=>['src'=>[],'width'=>[],'height'=>[],'style'=>[],'allowfullscreen'=>[],'loading'=>[],'referrerpolicy'=>[],'frameborder'=>[],'class'=>[]]]); ?></div></div>
                <?php endif; ?>
                <?php if ($map_url): ?>
                <a href="<?php echo esc_url($map_url); ?>" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-pink-600 hover:text-pink-700 underline underline-offset-4">Ver en Google Maps →</a>
                <?php endif; ?>
                <?php if (!$addr && !$hrs && !$map_url && !$map_embed): ?>
                <p class="text-sm text-gray-500 italic">Completá dirección y horario en <em>Páginas → Políticas Sociales</em>.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/area-gallery', null, [
    'gallery_images' => $gallery_images,
] ); ?>

<!-- Mensaje institucional -->
<section class="py-14 bg-pink-50 border-t border-pink-100">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <svg class="w-10 h-10 text-pink-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
        </svg>
        <blockquote class="text-xl text-gray-700 font-medium italic leading-relaxed">
            “<?php echo esc_html( tp_content( 'quote' ) ); ?>”
        </blockquote>
    </div>
</section>

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
