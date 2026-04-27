<?php
/**
 * Noticias section vinculada al Facebook oficial del municipio.
 *
 * @package TailPress
 */

$facebook_page_url = 'https://www.facebook.com/MunicipalidaddeAlderetes';
$facebook_embed_url = 'https://www.facebook.com/plugins/page.php?href=' . rawurlencode( $facebook_page_url ) . '&tabs=timeline&width=500&height=660&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false';
?>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex flex-col justify-between items-start gap-4 mb-14">
            <div>
                <span class="inline-block px-4 py-1.5 bg-alderetes-cream text-alderetes-green text-sm font-medium rounded-full mb-4 border border-[#e7dcc8]">
                    Actualidad
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Últimas Noticias</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_500px] gap-8 items-start">
            <div class="bg-gradient-to-br from-alderetes-orange via-alderetes-blue to-alderetes-green rounded-3xl p-8 md:p-10 text-white shadow-xl">
                <span class="inline-flex items-center px-4 py-1.5 bg-white/15 rounded-full text-sm font-medium mb-5">
                    Facebook oficial
                </span>
                <h3 class="text-2xl md:text-3xl font-bold mb-4">
                    Las novedades del municipio se publican automáticamente desde Facebook
                </h3>
                <p class="text-white/85 leading-relaxed mb-6">
                    Cada publicación que realice prensa en la página oficial de la Municipalidad de Alderetes quedará visible en este módulo, manteniendo la web alineada con la comunicación institucional.
                </p>
                <a href="<?php echo esc_url( $facebook_page_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-white text-alderetes-blue font-semibold px-6 py-3 rounded-xl hover:bg-alderetes-cream transition-colors">
                    Ir al Facebook oficial
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-lg overflow-hidden">
                <iframe
                    src="<?php echo esc_url( $facebook_embed_url ); ?>"
                    width="100%"
                    height="660"
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
