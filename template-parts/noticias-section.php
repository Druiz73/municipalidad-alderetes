<?php
/**
 * Noticias (Últimas Noticias) section.
 * TODO: Reemplazar el array $noticias por WP_Query cuando el CPT 'noticias' esté configurado.
 *
 * @package TailPress
 */

$noticias = [
    [
        'image'    => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80',
        'category' => 'Obras Públicas',
        'title'    => 'Nueva pavimentación en el barrio Centro',
        'excerpt'  => 'Se finalizaron las obras de pavimentación en las calles principales del centro de la ciudad, mejorando la conectividad.',
        'date'     => '5 de Diciembre, 2025',
        'readTime' => '3 min',
        'href'     => home_url('/noticias'),
    ],
    [
        'image'    => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&q=80',
        'category' => 'Salud',
        'title'    => 'Jornada de vacunación gratuita',
        'excerpt'  => 'El próximo sábado se realizará una jornada de vacunación gratuita en el centro de salud municipal.',
        'date'     => '4 de Diciembre, 2025',
        'readTime' => '2 min',
        'href'     => home_url('/noticias'),
    ],
    [
        'image'    => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?w=600&q=80',
        'category' => 'Cultura',
        'title'    => 'Festival de verano en la plaza principal',
        'excerpt'  => 'Este fin de semana comenzará el tradicional festival de verano con espectáculos para toda la familia.',
        'date'     => '3 de Diciembre, 2025',
        'readTime' => '4 min',
        'href'     => home_url('/noticias'),
    ],
];
?>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-14">
            <div>
                <span class="inline-block px-4 py-1.5 bg-blue-100 text-blue-700 text-sm font-medium rounded-full mb-4">
                    Actualidad
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Últimas Noticias</h2>
            </div>
            <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="flex items-center gap-2 text-blue-600 font-medium hover:text-blue-700 transition-colors">
                Ver todas las noticias
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($noticias as $noticia) : ?>
            <article class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="relative overflow-hidden">
                    <img
                        src="<?php echo esc_url($noticia['image']); ?>"
                        alt="<?php echo esc_attr($noticia['title']); ?>"
                        class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500"
                        loading="lazy"
                    >
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-700 text-xs font-medium rounded-full">
                            <?php echo esc_html($noticia['category']); ?>
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <?php echo esc_html($noticia['date']); ?>
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <?php echo esc_html($noticia['readTime']); ?>
                        </span>
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-blue-600 transition-colors line-clamp-2">
                        <?php echo esc_html($noticia['title']); ?>
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        <?php echo esc_html($noticia['excerpt']); ?>
                    </p>
                    <a href="<?php echo esc_url($noticia['href']); ?>" class="inline-flex items-center gap-1 text-blue-600 text-sm font-medium hover:gap-2 transition-all">
                        Leer más
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
