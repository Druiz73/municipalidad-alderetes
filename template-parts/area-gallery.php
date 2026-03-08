<?php
/**
 * Area Photo Gallery — CSS lightbox grid.
 *
 * Receives data via $args (WordPress 5.5+):
 *   gallery_images  array  List of absolute image URLs.
 *
 * @package TailPress
 */

$gallery_images = $args['gallery_images'] ?? [];

if ( empty( $gallery_images ) ) {
    return;
}

?>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 text-sm font-medium rounded-full mb-3">
                Galería
            </span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                Imágenes del área
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
            <?php foreach ( $gallery_images as $index => $img_url ) : ?>
                <a href="<?php echo esc_url( $img_url ); ?>"
                   target="_blank"
                   rel="noopener"
                   class="group block overflow-hidden rounded-xl aspect-square bg-gray-200 shadow hover:shadow-lg transition-shadow duration-300">
                    <img src="<?php echo esc_url( $img_url ); ?>"
                         alt="Imagen <?php echo esc_attr( $index + 1 ); ?>"
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</section>
