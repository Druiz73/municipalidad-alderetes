<?php
/**
 * Template Name: Trámites - Rentas
 *
 * @package TailPress
 */

$hero_image_url = tp_content_image_url( 'hero_image', 'rentas' );
$area_title     = 'Rentas';
$area_tagline   = tp_content( 'hero_tagline', 'rentas' );
$area_color     = 'bg-alderetes-green';

get_header();

get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $hero_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => $area_color,
    'height_classes'  => 'h-[360px] md:h-[520px]',
    'cover_classes'   => 'bg-right-top md:bg-top',
] );

$uploads = wp_upload_dir();
$uploads_base_url = isset( $uploads['baseurl'] ) ? untrailingslashit( $uploads['baseurl'] ) : '';
?>

<!-- Horarios de Atención -->
<div class="bg-white border-b border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-6 text-center sm:text-left">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-alderetes-green shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-bold text-gray-800 uppercase tracking-wide text-sm"><?php echo esc_html( tp_content( 'hours_label', 'rentas' ) ); ?></span>
            <span class="text-gray-600 text-sm"><strong class="text-alderetes-green"><?php echo esc_html( tp_content( 'hours', 'rentas' ) ); ?></strong></span>
        </div>
        <span class="hidden sm:block text-gray-300">|</span>
        <a href="<?php echo esc_url(home_url('/rentas')); ?>" class="inline-flex items-center gap-2 bg-alderetes-green text-white font-bold px-5 py-2 rounded-xl hover:brightness-110 transition-colors text-sm shadow">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            TRÁMITES
        </a>
    </div>
</div>

<!-- Avisos de Rentas (Nota Importante, novedades) -->
<div class="bg-gray-50 pb-8">
    <div class="max-w-7xl mx-auto px-4 -mt-2">
        <?php
        $rentas_avisos = [];
        for ($i = 1; $i <= 3; $i++) {
            $tt = tp_content('rentas_aviso' . $i . '_titulo', 'rentas');
            if (!$tt) continue;
            $rentas_avisos[] = [
                'titulo'    => $tt,
                'subtitulo' => tp_content('rentas_aviso' . $i . '_subtitulo', 'rentas'),
                'texto'     => tp_content('rentas_aviso' . $i . '_texto', 'rentas'),
                'imagen'    => tp_content_image_url('rentas_aviso' . $i . '_imagen', 'rentas'),
            ];
        }

        if (!empty($rentas_avisos)):
            // Si el único aviso es el de por defecto (sin imagen, sin subtítulo y titulado "Nota Importante")
            // lo mostramos flotando en el formato original.
            $is_only_default = count($rentas_avisos) === 1 && empty($rentas_avisos[0]['imagen']) && empty($rentas_avisos[0]['subtitulo']) && ($rentas_avisos[0]['titulo'] === 'Nota Importante');
            
            if ($is_only_default):
        ?>
                <div class="bg-alderetes-green text-white rounded-3xl shadow-xl border border-white/10 p-6 md:p-8 max-w-2xl ml-auto">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="p-3 bg-alderetes-orange rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="font-bold text-xl"><?php echo esc_html($rentas_avisos[0]['titulo']); ?></span>
                    </div>
                    <p class="text-sm md:text-base text-white/90 uppercase font-bold tracking-wider leading-relaxed">
                        <?php echo esc_html($rentas_avisos[0]['texto']); ?>
                    </p>
                </div>
            <?php else: ?>
                <!-- Si hay múltiples avisos o avisos con imágenes, usamos un grid elegante de ancho completo -->
                <div class="grid gap-6">
                    <?php foreach ($rentas_avisos as $aviso): ?>
                        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-lg flex flex-col md:flex-row gap-6 items-start text-left">
                            <?php if (!empty($aviso['imagen'])): ?>
                                <img src="<?php echo esc_url($aviso['imagen']); ?>" alt="<?php echo esc_attr($aviso['titulo']); ?>" class="w-full md:w-48 h-32 object-cover rounded-2xl flex-shrink-0 border border-gray-100 shadow-sm">
                            <?php endif; ?>
                            <div class="flex-1 min-w-0">
                                <?php if (!empty($aviso['subtitulo'])): ?>
                                    <span class="text-xs font-bold text-alderetes-green uppercase tracking-wider block mb-1">
                                        <?php echo esc_html($aviso['subtitulo']); ?>
                                    </span>
                                <?php endif; ?>
                                <h3 class="text-xl font-bold text-gray-900 leading-snug">
                                    <?php echo esc_html($aviso['titulo']); ?>
                                </h3>
                                <?php if (!empty($aviso['texto'])): ?>
                                    <p class="text-sm text-gray-600 mt-2 leading-relaxed whitespace-pre-line">
                                        <?php echo esc_html($aviso['texto']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

<!-- Tributos Tabs -->
<main class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <!-- Tabs Header -->
            <div class="flex flex-wrap border-b border-gray-100 bg-gray-50/50">
                <button onclick="switchTab('tem')" id="tab-btn-tem" class="tab-btn active flex-1 px-6 py-5 text-base font-bold transition-all border-b-4 border-alderetes-green text-alderetes-green bg-white">
                    COMERCIO (T.E.M.)
                </button>
                <button onclick="switchTab('cisi')" id="tab-btn-cisi" class="tab-btn flex-1 px-6 py-5 text-base font-bold transition-all border-b-4 border-transparent text-gray-400 hover:text-gray-600 hover:bg-white/50">
                    INMUEBLE (C.I.S.I.)
                </button>
                <button onclick="switchTab('cisc')" id="tab-btn-cisc" class="tab-btn flex-1 px-6 py-5 text-base font-bold transition-all border-b-4 border-transparent text-gray-400 hover:text-gray-600 hover:bg-white/50">
                    CEMENTERIO (C.I.S.C.)
                </button>
            </div>

            <!-- Tabs Content -->
            <div class="p-8 lg:p-12">

                <!-- ===================== TEM PANEL ===================== -->
                <div id="tab-content-tem" class="tab-panel">
                    <div class="flex flex-col lg:flex-row gap-10">

                        <!-- Requisitos -->
                        <div class="flex-1 space-y-10">

                            <!-- Inscripción -->
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                    <span class="w-10 h-10 bg-green-100 text-alderetes-green rounded-xl flex items-center justify-center font-black">1</span>
                                    <?php echo esc_html( tp_content( 'tem_signup_heading', 'rentas' ) ); ?>
                                </h2>
                                <ul class="space-y-3">
                                    <?php
                                    $reqs_tem_ins = tp_content_lines( 'tem_signup_items', 'rentas' );
                                    foreach ($reqs_tem_ins as $req): ?>
                                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition-colors">
                                        <svg class="w-5 h-5 text-alderetes-green mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <p class="mt-6 text-center text-sm font-bold text-alderetes-green uppercase tracking-wider bg-green-50 border border-green-100 rounded-xl py-3 px-4">
                                    <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                                </p>
                            </div>

                            <!-- Exención -->
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                    <span class="w-10 h-10 bg-green-100 text-alderetes-green rounded-xl flex items-center justify-center font-black">2</span>
                                    <?php echo esc_html( tp_content( 'tem_exemption_heading', 'rentas' ) ); ?>
                                </h2>
                                <ul class="space-y-3">
                                    <?php
                                    $reqs_tem_exe = tp_content_lines( 'tem_exemption_items', 'rentas' );
                                    foreach ($reqs_tem_exe as $req): ?>
                                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition-colors">
                                        <svg class="w-5 h-5 text-alderetes-green mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div>

                        <!-- Sidebar Descargas -->
                        <div class="lg:w-72 space-y-4">
                            <div class="bg-alderetes-green rounded-2xl p-6 text-white shadow-xl sticky top-24">
                                <h3 class="font-bold text-lg mb-5 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <?php echo esc_html( tp_content( 'tem_downloads_heading', 'rentas' ) ); ?>
                                </h3>
                                <div class="space-y-2">
                                    <?php
                                    $descargas = [];
                                    for ($i = 1; $i <= 4; $i++) {
                                        $nombre = tp_content('rentas_descarga' . $i . '_nombre', 'rentas');
                                        $url = tp_content('rentas_descarga' . $i . '_archivo', 'rentas');
                                        if (!$nombre) continue;
                                        $descargas[] = [
                                            'nombre' => $nombre,
                                            'url'    => $url ?: '#'
                                        ];
                                    }
                                    foreach ($descargas as $doc): ?>
                                    <a href="<?php echo esc_url( $doc['url'] ); ?>" <?php if ( $doc['url'] !== '#' ) echo 'target="_blank" rel="noopener noreferrer"'; ?> class="flex items-center gap-3 p-3 bg-white/10 hover:bg-white/25 rounded-xl text-sm transition-all border border-white/10 group">
                                        <svg class="w-4 h-4 text-alderetes-orange shrink-0 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <?php echo esc_html($doc['nombre']); ?>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===================== CISI PANEL ===================== -->
                <div id="tab-content-cisi" class="tab-panel hidden">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                        <!-- Cambio de Titularidad -->
                        <div class="flex flex-col h-full">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center font-black">1</span>
                                <?php echo esc_html( tp_content( 'cisi_transfer_heading', 'rentas' ) ); ?>
                            </h2>
                            <ul class="space-y-3 flex-1">
                                <?php
                                $cisi_titularidad = tp_content_lines( 'cisi_transfer_items', 'rentas' );
                                foreach ($cisi_titularidad as $req): ?>
                                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-orange-50/50 transition-colors">
                                    <svg class="w-5 h-5 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="mt-5 text-center text-sm font-bold text-alderetes-orange uppercase tracking-wider bg-orange-50 border border-orange-100 rounded-xl py-3 px-4 mt-auto">
                                <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                            </p>
                        </div>

                        <!-- Exención CISI -->
                        <div class="flex flex-col h-full">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center font-black">2</span>
                                <?php echo esc_html( tp_content( 'cisi_exemption_heading', 'rentas' ) ); ?>
                            </h2>
                            <ul class="space-y-3 flex-1">
                                <?php
                                $cisi_exencion = tp_content_lines( 'cisi_exemption_items', 'rentas' );
                                foreach ($cisi_exencion as $req): ?>
                                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-orange-50/50 transition-colors">
                                    <svg class="w-5 h-5 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                </li>
                                <?php endforeach; ?>
                                <!-- Arancel destacado -->
                                <li class="flex items-center gap-3 p-4 bg-orange-50 border-2 border-alderetes-orange rounded-xl">
                                    <svg class="w-5 h-5 text-alderetes-orange shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="font-bold text-alderetes-orange"><?php echo esc_html( tp_content( 'cisi_fee', 'rentas' ) ); ?></span>
                                </li>
                            </ul>
                            <p class="mt-5 text-center text-sm font-bold text-alderetes-orange uppercase tracking-wider bg-orange-50 border border-orange-100 rounded-xl py-3 px-4 mt-auto">
                                <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ===================== CISC (CEMENTERIO) PANEL ===================== -->
                <div id="tab-content-cisc" class="tab-panel hidden">

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                        <!-- Cambio de Titularidad CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-blue-100 text-alderetes-blue rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight"><?php echo esc_html( tp_content( 'cemetery_transfer_heading', 'rentas' ) ); ?></h3>
                            </div>
                            <ul class="space-y-3 mb-5 flex-1">
                                <?php
                                $cisc_titularidad = tp_content_lines( 'cemetery_transfer_items', 'rentas' );
                                foreach ($cisc_titularidad as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-alderetes-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-xs font-bold text-alderetes-blue uppercase tracking-wide bg-blue-50 border border-blue-100 rounded-lg py-2 px-3 text-center mt-auto">
                                <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                            </p>
                        </div>

                        <!-- Exención CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight"><?php echo esc_html( tp_content( 'cemetery_exemption_heading', 'rentas' ) ); ?></h3>
                            </div>
                            <ul class="space-y-3 mb-5 flex-1">
                                <?php
                                $cisc_exencion = tp_content_lines( 'cemetery_exemption_items', 'rentas' );
                                foreach ($cisc_exencion as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-xs font-bold text-alderetes-orange uppercase tracking-wide bg-orange-50 border border-orange-100 rounded-lg py-2 px-3 text-center mt-auto">
                                <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                            </p>
                        </div>

                        <!-- Inhumación CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 flex flex-col h-full">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-gray-200 text-gray-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight"><?php echo esc_html( tp_content( 'cemetery_burial_heading', 'rentas' ) ); ?></h3>
                            </div>
                            <ul class="space-y-3 mb-5 flex-1">
                                <?php
                                $cisc_inhumacion = tp_content_lines( 'cemetery_burial_items', 'rentas' );
                                foreach ($cisc_inhumacion as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide bg-gray-100 border border-gray-200 rounded-lg py-2 px-3 text-center mt-auto">
                                <?php echo esc_html( tp_content( 'notice_text', 'rentas' ) ); ?>
                            </p>
                        </div>

                    </div>
                </div>

            </div><!-- /.p-8 -->
        </div><!-- /.rounded-3xl -->
    </div><!-- /.max-w-7xl -->
</main>

<script>
function switchTab(tabId) {
    document.querySelectorAll('.tab-panel').forEach(function(p) { p.classList.add('hidden'); });
    document.querySelectorAll('.tab-btn').forEach(function(b) {
        b.classList.remove('active', 'border-alderetes-green', 'text-alderetes-green', 'bg-white');
        b.classList.add('border-transparent', 'text-gray-400');
    });
    document.getElementById('tab-content-' + tabId).classList.remove('hidden');
    var btn = document.getElementById('tab-btn-' + tabId);
    btn.classList.add('active', 'border-alderetes-green', 'text-alderetes-green', 'bg-white');
    btn.classList.remove('border-transparent', 'text-gray-400');
}

// Open tab based on URL slug or hash
(function () {
    var path = window.location.pathname.toLowerCase();
    var hash = window.location.hash.replace('#', '').toLowerCase();

    if (hash === 'cisi' || path.indexOf('/cisi') !== -1) {
        switchTab('cisi');
    } else if (hash === 'cisc' || path.indexOf('/cisc') !== -1 || path.indexOf('/cementerio') !== -1) {
        switchTab('cisc');
    }
    // Default tab is TEM (already active on load)
})();
</script>

<?php get_footer(); ?>
