<?php
/**
 * Area Hero — cover image + title overlay.
 *
 * Receives data via $args (WordPress 5.5+):
 *   cover_image_url  string|null  Absolute URL to cover photo (null = gradient fallback).
 *   area_title       string       Area name.
 *   area_tagline     string       Short descriptor shown below the title.
 *   area_color       string       Tailwind bg-* class for accent (e.g. 'bg-blue-700').
 *
 * @package TailPress
 */

$cover_image_url = $args['cover_image_url'] ?? null;
$area_title      = $args['area_title']      ?? '';
$area_tagline    = $args['area_tagline']    ?? '';
$area_color      = $args['area_color']      ?? 'bg-alderetes-blue';

?>

<section class="relative h-[420px] md:h-[520px] overflow-hidden flex items-end">

    <?php if ( ! empty( $cover_image_url ) ) : ?>
        <div class="absolute inset-0 bg-cover bg-center scale-105 transition-transform duration-700"
             style="background-image: url('<?php echo esc_url( $cover_image_url ); ?>');"
             aria-hidden="true"></div>
    <?php else : ?>
        <div class="absolute inset-0 bg-gradient-to-br from-alderetes-blue to-blue-900" aria-hidden="true"></div>
        <div class="absolute inset-0 opacity-10"
             style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"
             aria-hidden="true"></div>
    <?php endif; ?>

    <!-- Dark gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent" aria-hidden="true"></div>

    <!-- Breadcrumb -->
    <div class="absolute top-6 left-0 right-0 z-10">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex items-center gap-2 text-white/70 text-sm" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Inicio</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white font-medium"><?php echo esc_html( $area_title ); ?></span>
            </nav>
        </div>
    </div>

    <!-- Title block -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 pb-12 w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider text-white mb-4
                         <?php echo esc_attr( $area_color ?? 'bg-alderetes-blue' ); ?> bg-opacity-80">
                Municipalidad de Alderetes
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-3 leading-tight drop-shadow-lg">
                <?php echo esc_html( $area_title ); ?>
            </h1>
            <?php if ( ! empty( $area_tagline ) ) : ?>
                <p class="text-lg md:text-xl text-white/85 font-light max-w-2xl">
                    <?php echo esc_html( $area_tagline ); ?>
                </p>
            <?php endif; ?>
            <div class="w-20 h-1 bg-alderetes-orange rounded-full mt-5"></div>
        </div>
    </div>

</section>
