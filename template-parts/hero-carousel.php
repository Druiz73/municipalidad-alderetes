<?php
/**
 * Hero Carousel section.
 * Preparado para integrarse con ACF en el futuro.
 *
 * @package TailPress
 */

$base   = get_template_directory_uri() . '/resources/images/fotos-areas/CARRUSEL/';
$slides = [
    [
        'image'    => $base . 'FOTO1.jpg',
        'title'    => 'Bienvenidos a Alderetes',
        'subtitle' => 'Trabajando juntos por una ciudad mejor',
    ],
    [
        'image'    => $base . 'FOTO2.jpg',
        'title'    => 'Servicios Municipales',
        'subtitle' => 'Trámites online, rápidos y seguros',
    ],
    [
        'image'    => $base . 'FOTO3.jpg',
        'title'    => 'Desarrollo Urbano',
        'subtitle' => 'Construyendo el futuro de nuestra ciudad',
    ],
    [
        'image'    => $base . 'FOTO12.jpg',
        'title'    => 'Cultura y Comunidad',
        'subtitle' => 'Arte, eventos y programas para todos',
    ],
    [
        'image'    => get_template_directory_uri() . '/resources/images/fotos-areas/OFICINA-EMPLEO/portada.jpeg',
        'title'    => 'Oficina de Empleo',
        'subtitle' => 'Brindando herramientas y oportunidades laborales',
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
            <div class="absolute inset-0 bg-gradient-to-r from-[#102744]/90 via-[#16345c]/60 to-transparent"></div>
            <div class="relative z-10 h-full max-w-7xl mx-auto px-4 flex items-center">
                <div class="max-w-2xl">
                    <p class="text-3xl md:text-4xl lg:text-5xl font-black tracking-[0.2em] uppercase text-white drop-shadow-lg">
                        Para seguir creciendo
                    </p>
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
