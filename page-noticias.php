<?php
/**
 * Template Name: Noticias
 *
 * @package TailPress
 */

$facebook_page_url  = 'https://www.facebook.com/MunicipalidaddeAlderetes';
$facebook_embed_url = 'https://www.facebook.com/plugins/page.php?href=' . rawurlencode( $facebook_page_url ) . '&tabs=timeline&width=500&height=1200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true';

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
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_420px] gap-8 items-start">
            <div class="space-y-8">
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 md:p-10">
                    <span class="inline-flex items-center px-4 py-1.5 bg-alderetes-cream text-alderetes-green rounded-full text-sm font-medium mb-5 border border-[#e7dcc8]">
                        Noticias automáticas
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        La web se alimenta desde el Facebook oficial del municipio
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Cada publicación realizada por prensa en la página oficial de Facebook de la Municipalidad de Alderetes queda reflejada en esta sección, para mantener actualizada la comunicación institucional.
                    </p>
                    <a href="<?php echo esc_url( $facebook_page_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 bg-alderetes-orange hover:bg-[#a95c1e] text-white font-semibold rounded-xl transition-colors">
                        Ver Facebook oficial
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Canal oficial de novedades</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Si en algún momento quieren volver a manejar noticias internas desde WordPress también se puede, pero por ahora esta página queda conectada directamente a Facebook para que no haya doble carga de contenido.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-lg overflow-hidden">
                <iframe
                    src="<?php echo esc_url( $facebook_embed_url ); ?>"
                    width="100%"
                    height="1200"
                    style="border:none;overflow:hidden"
                    scrolling="no"
                    frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    loading="lazy"
                    title="Facebook Municipalidad de Alderetes">
                </iframe>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>
