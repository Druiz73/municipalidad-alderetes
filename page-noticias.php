<?php
/**
 * Template Name: Noticias
 *
 * @package TailPress
 */

$facebook_page_url  = 'https://www.facebook.com/MunicipalidaddeAlderetes';
$facebook_embed_url = 'https://www.facebook.com/plugins/page.php?href=' . rawurlencode( $facebook_page_url ) . '&tabs=timeline&width=1400&height=1200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true';

get_header();
?>

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-br from-alderetes-orange via-alderetes-blue to-alderetes-green overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-6 backdrop-blur-sm">Actualidad</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Noticias</h1>
        <p class="text-xl text-white/80 max-w-2xl mx-auto">
            Mantenete informado sobre las últimas novedades de nuestra ciudad
        </p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-[1400px] mx-auto px-4">
        <div class="bg-white rounded-3xl border border-gray-100 shadow-lg overflow-hidden w-full">
            <div class="w-full">
                <iframe
                    src="<?php echo esc_url( $facebook_embed_url ); ?>"
                    id="facebook-page-widget"
                    width="1200"
                    height="1200"
                    
                    scrolling="no"
                    frameborder="0"
                  
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    loading="lazy"
                    title="Facebook Municipalidad de Alderetes">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
