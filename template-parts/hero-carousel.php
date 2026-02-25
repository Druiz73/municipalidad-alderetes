<?php
/**
 * Hero Carousel section.
 * Preparado para integrarse con ACF en el futuro.
 *
 * @package TailPress
 */

$slides = [
    [
        'image'    => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=1920&q=80',
        'title'    => 'Bienvenidos a Alderetes',
        'subtitle' => 'Trabajando juntos por una ciudad mejor',
        'cta'      => 'Conocer más',
        'cta_url'  => esc_url(home_url('/institucional')),
    ],
    [
        'image'    => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=1920&q=80',
        'title'    => 'Servicios Municipales',
        'subtitle' => 'Trámites online, rápidos y seguros',
        'cta'      => 'Ver trámites',
        'cta_url'  => esc_url(home_url('/rentas')),
    ],
    [
        'image'    => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80',
        'title'    => 'Desarrollo Urbano',
        'subtitle' => 'Construyendo el futuro de nuestra ciudad',
        'cta'      => 'Ver proyectos',
        'cta_url'  => esc_url(home_url('/obras-publicas')),
    ],
];
?>

<div
    class="tp-carousel relative h-[500px] md:h-[600px] lg:h-[700px] overflow-hidden"
    data-carousel-autoplay="6000"
    data-carousel-loop
>
    <!-- Track -->
    <div class="tp-carousel-track flex h-full transition-transform duration-700 ease-in-out">
        <?php foreach ($slides as $slide) : ?>
        <div class="tp-carousel-slide relative flex-shrink-0 w-full h-full">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($slide['image']); ?>')"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-900/50 to-transparent"></div>
            <div class="relative z-10 h-full max-w-7xl mx-auto px-4 flex items-center">
                <div class="max-w-2xl">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                        <?php echo esc_html($slide['title']); ?>
                    </h2>
                    <p class="text-xl md:text-2xl text-white/90 mb-8">
                        <?php echo esc_html($slide['subtitle']); ?>
                    </p>
                    <a href="<?php echo $slide['cta_url']; ?>" class="inline-block px-8 py-4 bg-white text-blue-700 font-semibold rounded-xl hover:bg-blue-50 transition-colors shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform duration-200">
                        <?php echo esc_html($slide['cta']); ?>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Prev -->
    <button class="tp-carousel-prev absolute left-4 top-1/2 -translate-y-1/2 z-20 p-3 bg-white/20 backdrop-blur-sm rounded-full text-white hover:bg-white/30 transition-colors" aria-label="Anterior">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>

    <!-- Next -->
    <button class="tp-carousel-next absolute right-4 top-1/2 -translate-y-1/2 z-20 p-3 bg-white/20 backdrop-blur-sm rounded-full text-white hover:bg-white/30 transition-colors" aria-label="Siguiente">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        <?php foreach ($slides as $i => $slide) : ?>
        <button
            class="tp-carousel-dot h-2 rounded-full transition-all duration-300 <?php echo $i === 0 ? 'w-8 bg-white' : 'w-2 bg-white/50 hover:bg-white/70'; ?>"
            data-slide="<?php echo $i; ?>"
            aria-label="Slide <?php echo $i + 1; ?>">
        </button>
        <?php endforeach; ?>
    </div>
</div>
