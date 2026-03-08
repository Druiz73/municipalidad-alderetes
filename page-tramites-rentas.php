<?php
/**
 * Template Name: Trámites - Rentas
 *
 * @package TailPress
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-alderetes-blue to-blue-800 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-center md:text-left">
                <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm">Sección Trámites</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 uppercase tracking-tight">Rentas</h1>
                <p class="text-xl text-white/80 max-w-xl">Gestión de tributos municipales, requisitos y beneficios.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20">
                <div class="flex items-center gap-4 mb-3">
                    <div class="p-3 bg-alderetes-orange rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <span class="font-bold text-lg">Nota Importante</span>
                </div>
                <p class="text-sm text-white/90 uppercase font-bold tracking-wider leading-relaxed">
                    "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Horarios de Atención -->
<div class="bg-white border-b border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-6 text-center sm:text-left">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-alderetes-blue shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-bold text-gray-800 uppercase tracking-wide text-sm">Horarios de Atención:</span>
            <span class="text-gray-600 text-sm">Lunes a Viernes · <strong class="text-alderetes-blue">8:00 a 13:30 hs</strong></span>
        </div>
        <span class="hidden sm:block text-gray-300">|</span>
        <a href="<?php echo esc_url(home_url('/rentas')); ?>" class="inline-flex items-center gap-2 bg-alderetes-blue text-white font-bold px-5 py-2 rounded-xl hover:bg-blue-800 transition-colors text-sm shadow">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            TRÁMITES
        </a>
    </div>
</div>

<!-- Tributos Tabs -->
<main class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <!-- Tabs Header -->
            <div class="flex flex-wrap border-b border-gray-100 bg-gray-50/50">
                <button onclick="switchTab('tem')" id="tab-btn-tem" class="tab-btn active flex-1 px-6 py-5 text-base font-bold transition-all border-b-4 border-alderetes-blue text-alderetes-blue bg-white">
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
                                    <span class="w-10 h-10 bg-blue-100 text-alderetes-blue rounded-xl flex items-center justify-center font-black">1</span>
                                    Requisitos para Inscripción T.E.M.
                                </h2>
                                <ul class="space-y-3">
                                    <?php
                                    $reqs_tem_ins = [
                                        "Fotocopia de DNI.",
                                        "Constancia de CUIL.",
                                        "Fotocopia boleta de servicios (particular y local comercial).",
                                        "Original y fotocopia de contrato de locación (si fuese locatorio).",
                                        "Original y fotocopia de contrato social (si fuese persona jurídica).",
                                        "Constancia de inscripción en A.F.I.P. y D.G.R. (si está inscripto).",
                                        "Arancel Administrativo.",
                                    ];
                                    foreach ($reqs_tem_ins as $req): ?>
                                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-blue-50/50 transition-colors">
                                        <svg class="w-5 h-5 text-alderetes-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <p class="mt-6 text-center text-sm font-bold text-alderetes-blue uppercase tracking-wider bg-blue-50 border border-blue-100 rounded-xl py-3 px-4">
                                    "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                                </p>
                            </div>

                            <!-- Exención -->
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                    <span class="w-10 h-10 bg-blue-100 text-alderetes-blue rounded-xl flex items-center justify-center font-black">2</span>
                                    Requisitos para Exención T.E.M.
                                </h2>
                                <ul class="space-y-3">
                                    <?php
                                    $reqs_tem_exe = [
                                        "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, solicitando exención y explicando motivo.",
                                        "Fotocopia de DNI.",
                                        "Carnet de Discapacidad actualizado (si corresponde).",
                                        "Fotocopia última boleta de sueldo (si corresponde).",
                                        "Boleta de un servicio.",
                                        "Constancia de CUIL.",
                                        "Arancel administrativo.",
                                    ];
                                    foreach ($reqs_tem_exe as $req): ?>
                                    <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-blue-50/50 transition-colors">
                                        <svg class="w-5 h-5 text-alderetes-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div>

                        <!-- Sidebar Descargas -->
                        <div class="lg:w-72 space-y-4">
                            <div class="bg-alderetes-blue rounded-2xl p-6 text-white shadow-xl sticky top-24">
                                <h3 class="font-bold text-lg mb-5 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    Descargas T.E.M.
                                </h3>
                                <div class="space-y-2">
                                    <?php
                                    $descargas = [
                                        "Formulario R708 - Inscripción",
                                        "Declaración Jurada",
                                        "Código Tributario",
                                        "Calendario de Vencimientos",
                                        "Ordenanza Tributaria",
                                    ];
                                    foreach ($descargas as $doc): ?>
                                    <a href="#" class="flex items-center gap-3 p-3 bg-white/10 hover:bg-white/25 rounded-xl text-sm transition-all border border-white/10 group">
                                        <svg class="w-4 h-4 text-alderetes-orange shrink-0 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <?php echo esc_html($doc); ?>
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
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center font-black">1</span>
                                Cambio de Titularidad C.I.S.I.
                            </h2>
                            <ul class="space-y-3">
                                <?php
                                $cisi_titularidad = [
                                    "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón de la propiedad.",
                                    "Original y fotocopia de la Escritura.",
                                    "Informe del Registro Inmobiliario – Av. Salta N.º 19 S.M. de Tucumán.",
                                    "Fotocopia DNI del titular del inmueble.",
                                    "Arancel administrativo.",
                                ];
                                foreach ($cisi_titularidad as $req): ?>
                                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-orange-50/50 transition-colors">
                                    <svg class="w-5 h-5 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="mt-5 text-center text-sm font-bold text-alderetes-orange uppercase tracking-wider bg-orange-50 border border-orange-100 rounded-xl py-3 px-4">
                                "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                            </p>
                        </div>

                        <!-- Exención CISI -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center font-black">2</span>
                                Requisitos para Exención C.I.S.I.
                            </h2>
                            <ul class="space-y-3">
                                <?php
                                $cisi_exencion = [
                                    "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón de la propiedad.",
                                    "Fotocopia de DNI.",
                                    "Original y fotocopia de la Escritura.",
                                    "Fotocopia última boleta de sueldo.",
                                    "Informe del Registro Inmobiliario – Av. Salta N.º 19 S.M. de Tucumán.",
                                ];
                                foreach ($cisi_exencion as $req): ?>
                                <li class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:bg-orange-50/50 transition-colors">
                                    <svg class="w-5 h-5 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-gray-700"><?php echo esc_html($req); ?></span>
                                </li>
                                <?php endforeach; ?>
                                <!-- Arancel destacado -->
                                <li class="flex items-center gap-3 p-4 bg-orange-50 border-2 border-alderetes-orange rounded-xl">
                                    <svg class="w-5 h-5 text-alderetes-orange shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="font-bold text-alderetes-orange">Arancel Administrativo: $2.000</span>
                                </li>
                            </ul>
                            <p class="mt-5 text-center text-sm font-bold text-alderetes-orange uppercase tracking-wider bg-orange-50 border border-orange-100 rounded-xl py-3 px-4">
                                "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ===================== CISC (CEMENTERIO) PANEL ===================== -->
                <div id="tab-content-cisc" class="tab-panel hidden">

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                        <!-- Cambio de Titularidad CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-blue-100 text-alderetes-blue rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight">Cambio de Titularidad C.I.S.C.</h3>
                            </div>
                            <ul class="space-y-3 mb-5">
                                <?php
                                $cisc_titularidad = [
                                    "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, por duplicado con certificación de firma de autoridad policial.",
                                    "Fotocopia de Acta de Defunción del Titular.",
                                    "Acta de Nacimiento del nuevo titular y/o acta de matrimonio.",
                                    "Fotocopia de DNI del nuevo titular.",
                                    "Arancel administrativo.",
                                ];
                                foreach ($cisc_titularidad as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-alderetes-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-xs font-bold text-alderetes-blue uppercase tracking-wide bg-blue-50 border border-blue-100 rounded-lg py-2 px-3 text-center">
                                "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                            </p>
                        </div>

                        <!-- Exención CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-orange-100 text-alderetes-orange rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight">Exención C.I.S.C. (Cementerio)</h3>
                            </div>
                            <ul class="space-y-3 mb-5">
                                <?php
                                $cisc_exencion = [
                                    "Nota dirigida a la Intendente de la Municipalidad de Alderetes Sra. Graciela Gutiérrez, indicando N.º de Padrón.",
                                    "Fotocopia de DNI.",
                                    "Original y fotocopia de la Escritura.",
                                    "Fotocopia última boleta de sueldo.",
                                    "Arancel Administrativo.",
                                ];
                                foreach ($cisc_exencion as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-alderetes-orange mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-xs font-bold text-alderetes-orange uppercase tracking-wide bg-orange-50 border border-orange-100 rounded-lg py-2 px-3 text-center">
                                "LOS TRÁMITES SON PERSONALES SIN EXCEPCIÓN ALGUNA"
                            </p>
                        </div>

                        <!-- Inhumación CISC -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 bg-gray-200 text-gray-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 leading-tight">Inhumación C.I.S.C. (Cementerio)</h3>
                            </div>
                            <ul class="space-y-3">
                                <?php
                                $cisc_inhumacion = [
                                    "Fotocopia de DNI de la persona que hace el trámite.",
                                    "Estar al día con el impuesto.",
                                    "La persona que realice el trámite tiene que ser el titular.",
                                    "Si el titular falleció, debe hacer cambio de titularidad.",
                                    "Certificado de Defunción.",
                                ];
                                foreach ($cisc_inhumacion as $item): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html($item); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
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
        b.classList.remove('active', 'border-alderetes-blue', 'text-alderetes-blue', 'bg-white');
        b.classList.add('border-transparent', 'text-gray-400');
    });
    document.getElementById('tab-content-' + tabId).classList.remove('hidden');
    var btn = document.getElementById('tab-btn-' + tabId);
    btn.classList.add('active', 'border-alderetes-blue', 'text-alderetes-blue', 'bg-white');
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
