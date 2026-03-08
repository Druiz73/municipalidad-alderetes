<?php
/**
 * Template Name: Noticias
 *
 * @package TailPress
 */


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'paged'          => $paged,
];

$query = new WP_Query($args);

$all_posts = [];
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        
        $categories = get_the_category();
        $cat_name = !empty($categories) ? $categories[0]->name : 'Sin categoría';
        
        // Verifica si tiene el tag destacado
        $tags = get_the_tags();
        $is_featured = false;
        if ($tags) {
            foreach($tags as $tag) {
                if(strtolower($tag->name) === 'destacada') {
                    $is_featured = true;
                    break;
                }
            }
        }

        $all_posts[] = [
            'id'       => get_the_ID(),
            'image'    => has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
            'category' => $cat_name,
            'title'    => get_the_title(),
            'excerpt'  => get_the_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20, '...'),
            'date'     => get_the_date(),
            'readTime' => ceil(str_word_count(strip_tags(get_the_content())) / 200) . ' min',
            'featured' => $is_featured,
            'permalink'=> get_permalink()
        ];
    }
    wp_reset_postdata();
}

$featured   = null;
$rest       = [];
foreach ($all_posts as $n) {
    if ($n['featured'] && $featured === null) {
        $featured = $n;
    } else {
        $rest[] = $n;
    }
}

get_header();
?>

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-6 backdrop-blur-sm">Actualidad</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Noticias</h1>
        <p class="text-xl text-white/80 max-w-2xl mx-auto">
            Mantenete informado sobre las últimas novedades de nuestra ciudad
        </p>
    </div>
</section>

<!-- Barra de filtros -->
<div class="py-6 bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:w-96">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input id="noticias-search" type="text" placeholder="Buscar noticias..."
                    class="w-full h-11 pl-10 pr-4 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="flex gap-2 overflow-x-auto pb-1 md:pb-0 w-full md:w-auto" id="categorias-container">
                <?php
                // Obtener categorias que tengan al menos 1 post
                $categorias_db = get_categories(['hide_empty' => true]);
                $categorias = ['Todas'];
                foreach($categorias_db as $cat) {
                    $categorias[] = $cat->name;
                }
                
                foreach ($categorias as $cat) :
                    $active = $cat === 'Todas' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50';
                ?>
                <button
                    class="categoria-btn whitespace-nowrap px-4 py-2 rounded-xl text-sm font-medium transition-colors <?php echo $active; ?>"
                    data-categoria="<?php echo esc_attr($cat); ?>">
                    <?php echo esc_html($cat); ?>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Noticias -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Noticia destacada -->
        <?php if ($featured) : ?>
        <article id="noticia-destacada" class="mb-16" data-category="<?php echo esc_attr($featured['category']); ?>" data-title="<?php echo esc_attr($featured['title']); ?>" data-excerpt="<?php echo esc_attr(wp_strip_all_tags($featured['excerpt'])); ?>">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                <div class="relative overflow-hidden h-72 lg:h-auto">
                    <img src="<?php echo esc_url($featured['image']); ?>" alt="<?php echo esc_attr($featured['title']); ?>" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded-full">Destacada</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col justify-center">
                    <span class="text-blue-600 text-sm font-medium mb-2"><?php echo esc_html($featured['category']); ?></span>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html($featured['title']); ?></h2>
                    <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3"><?php echo esc_html(wp_strip_all_tags($featured['excerpt'])); ?></p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <?php echo esc_html($featured['date']); ?>
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <?php echo esc_html($featured['readTime']); ?>
                        </span>
                    </div>
                    <a href="<?php echo esc_url($featured['permalink']); ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors w-fit">
                        Leer noticia completa
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </article>
        <?php endif; ?>

        <!-- Grid -->
        <div id="noticias-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($rest as $noticia) : ?>
            <article
                class="noticia-card group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col"
                data-category="<?php echo esc_attr($noticia['category']); ?>"
                data-title="<?php echo esc_attr($noticia['title']); ?>"
                data-excerpt="<?php echo esc_attr(wp_strip_all_tags($noticia['excerpt'])); ?>"
            >
                <a href="<?php echo esc_url($noticia['permalink']); ?>" class="block relative overflow-hidden flex-shrink-0">
                    <img src="<?php echo esc_url($noticia['image']); ?>" alt="<?php echo esc_attr($noticia['title']); ?>"
                        class="w-full h-52 object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-700 text-xs font-medium rounded-full shadow-sm">
                            <?php echo esc_html($noticia['category']); ?>
                        </span>
                    </div>
                </a>
                <div class="p-6 flex flex-col flex-grow">
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
                    <a href="<?php echo esc_url($noticia['permalink']); ?>" class="block group-hover:text-blue-600 transition-colors">
                        <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2">
                            <?php echo esc_html($noticia['title']); ?>
                        </h3>
                    </a>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow"><?php echo esc_html(wp_strip_all_tags($noticia['excerpt'])); ?></p>
                    <div class="mt-auto">
                        <a href="<?php echo esc_url($noticia['permalink']); ?>" class="inline-flex items-center gap-1 text-blue-600 text-sm font-medium hover:gap-2 transition-all">
                            Leer más
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- Estado vacío -->
        <div id="no-results" class="<?php echo empty($all_posts) ? '' : 'hidden'; ?> text-center py-16">
            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">No hay noticias disponibles</h3>
            <p class="text-gray-600">Por el momento no hay noticias publicadas.</p>
        </div>

    </div>
</section>

<script>
(function () {
    var searchInput   = document.getElementById('noticias-search');
    var catBtns       = document.querySelectorAll('.categoria-btn');
    var cards         = document.querySelectorAll('.noticia-card');
    var featured      = document.getElementById('noticia-destacada');
    var noResults     = document.getElementById('no-results');
    var currentCat    = 'Todas';

    function filter() {
        var query = searchInput.value.toLowerCase().trim();
        var visible = 0;

        cards.forEach(function (card) {
            var cat     = card.dataset.category || '';
            var title   = (card.dataset.title || '').toLowerCase();
            var excerpt = (card.dataset.excerpt || '').toLowerCase();
            
            var matchCat    = currentCat === 'Todas' || cat === currentCat;
            var matchSearch = !query || title.includes(query) || excerpt.includes(query);
            var show = matchCat && matchSearch;
            
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        if (featured) {
            var fCat     = featured.dataset.category || '';
            var fTitle   = (featured.dataset.title || '').toLowerCase();
            var fExcerpt = (featured.dataset.excerpt || '').toLowerCase();
            
            var showFeat = currentCat === 'Todas' && !query;
            if (!showFeat && (currentCat !== 'Todas' || query)) {
                var matchFCat    = currentCat === 'Todas' || fCat === currentCat;
                var matchFSearch = !query || fTitle.includes(query) || fExcerpt.includes(query);
                showFeat = matchFCat && matchFSearch;
                if (showFeat) visible++;
            } else if (showFeat) {
                visible++;
            }
            featured.style.display = showFeat ? '' : 'none';
        }

        if (noResults) {
            noResults.classList.toggle('hidden', visible > 0);
        }
    }

    catBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            currentCat = btn.dataset.categoria;
            catBtns.forEach(function (b) {
                b.classList.remove('bg-blue-600', 'text-white');
                b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
            });
            btn.classList.add('bg-blue-600', 'text-white');
            btn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
            filter();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', filter);
    }
})();
</script>

<?php get_footer(); ?>
