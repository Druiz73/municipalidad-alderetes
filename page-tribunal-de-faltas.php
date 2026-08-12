<?php
/**
 * Template Name: Tribunal de Faltas
 *
 * @package TailPress
 */

get_header();

$cover_image_url = tp_content_image_url( 'hero_image' );
$area_title      = 'Tribunal de Faltas';
$area_tagline    = tp_content( 'hero_tagline' );
$area_color      = 'bg-alderetes-blue';

get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $cover_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => $area_color,
    'height_classes'  => 'h-[360px] md:h-[520px]',
    'cover_classes'   => 'bg-right-top md:bg-top',
] );
?>

<!-- Libre Deuda Vehicular -->
<section class="py-16 bg-gray-50 border-b border-gray-100">
    <div class="max-w-3xl mx-auto px-4">

        <div class="text-center mb-10">
            <span class="inline-block px-4 py-1.5 bg-blue-100 text-alderetes-blue text-sm font-medium rounded-full mb-4"><?php echo esc_html( tp_content( 'query_badge' ) ); ?></span>
            <h2 class="text-3xl font-bold text-gray-900 mb-3"><?php echo esc_html( tp_content( 'query_heading' ) ); ?></h2>
            <p class="text-gray-600"><?php echo esc_html( tp_content( 'query_text' ) ); ?></p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

            <form id="form-libre-deuda" class="flex flex-col sm:flex-row gap-3 mb-6">
                <input
                    type="text"
                    id="input-patente"
                    placeholder="Ej: ABC 123 o AB 123 CD"
                    maxlength="10"
                    class="flex-1 px-5 py-4 border-2 border-gray-200 rounded-2xl text-lg font-mono uppercase focus:outline-none focus:border-alderetes-blue transition-colors"
                    autocomplete="off"
                    spellcheck="false"
                />
                <button type="submit"
                        class="px-8 py-4 bg-alderetes-blue text-white font-bold rounded-2xl hover:bg-blue-800 transition-colors shadow-lg whitespace-nowrap">
                    <?php echo esc_html( tp_content( 'query_button' ) ); ?>
                </button>
            </form>

            <!-- Resultado: LIBRE DEUDA -->
            <div id="result-libre" class="hidden">
                <div class="flex flex-col items-center gap-5 p-8 bg-green-50 border-2 border-green-200 rounded-2xl text-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-green-700 uppercase tracking-wide mb-2">Libre Deuda</p>
                        <p class="text-gray-600">No se registran infracciones pendientes para la patente <span id="patente-libre" class="font-mono font-bold text-gray-900"></span>.</p>
                    </div>
                </div>
            </div>

            <!-- Resultado: INFRACCIÓN -->
            <div id="result-infraccion" class="hidden">
                <div class="flex flex-col gap-5 p-6 bg-red-50 border-2 border-red-200 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center shadow-lg shrink-0">
                            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xl font-black text-red-700 uppercase tracking-wide">Infracción Registrada</p>
                            <p class="text-gray-600 text-sm mt-1">Se encontraron registros de infracción para la patente <span id="patente-infraccion" class="font-mono font-bold text-gray-900"></span>.</p>
                        </div>
                    </div>

                    <!-- Detalle de causas/actas -->
                    <div class="bg-white rounded-2xl p-5 border border-red-100">
                        <p class="text-xs font-bold text-red-600 uppercase tracking-wider mb-3">Detalle de actas pendientes:</p>
                        <div id="infracciones-lista" class="space-y-2 max-h-48 overflow-y-auto pr-1"></div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-red-100 space-y-4">
                        <p class="font-bold text-gray-800">Para regularizar tu situación, dirigite a:</p>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-alderetes-blue mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <p class="font-bold text-gray-900">Tribunal de Faltas</p>
                                <p class="text-gray-600">Rivadavia 1000, Alderetes</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-alderetes-blue shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-600">
                                <span class="font-bold text-gray-900">Horario:</span>
                                de 08:00 a 13:00 hs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
document.getElementById('form-libre-deuda').addEventListener('submit', function (e) {
    e.preventDefault();
    var input = document.getElementById('input-patente');
    var patente = input.value.trim().toUpperCase();
    if (!patente) return;

    var resLibre = document.getElementById('result-libre');
    var resInfraccion = document.getElementById('result-infraccion');
    resLibre.classList.add('hidden');
    resInfraccion.classList.add('hidden');

    var submitBtn = this.querySelector('button[type="submit"]');
    var originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Consultando...';

    var body = new URLSearchParams({
        action: 'tp_consultar_patente_tribunal',
        patente: patente
    });

    fetch('<?php echo esc_js(admin_url('admin-ajax.php')); ?>', { method: 'POST', body: body })
        .then(function(r) { return r.json(); })
        .then(function(res) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;

            if (res.success && res.data.tiene_infraccion) {
                document.getElementById('patente-infraccion').textContent = patente;
                var lista = document.getElementById('infracciones-lista');
                lista.innerHTML = '';
                (res.data.registros || []).forEach(function(item) {
                    var div = document.createElement('div');
                    div.className = 'flex items-center justify-between p-3 bg-red-50/50 rounded-xl text-sm border border-red-100';
                    div.innerHTML = '<span class="font-bold text-gray-800">Causa N° ' + (item.causa || 'S/N') + '</span><span class="text-gray-600">Acta N° ' + (item.acta || 'S/N') + '</span>';
                    lista.appendChild(div);
                });
                resInfraccion.classList.remove('hidden');
            } else {
                document.getElementById('patente-libre').textContent = patente;
                resLibre.classList.remove('hidden');
            }
        })
        .catch(function() {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
            document.getElementById('patente-libre').textContent = patente;
            resLibre.classList.remove('hidden');
        });
});
</script>

<!-- Descripción principal -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Descripción -->
            <div class="lg:col-span-2">
                <span class="inline-block px-4 py-1.5 bg-blue-100 text-alderetes-blue text-sm font-semibold rounded-full mb-6 uppercase tracking-wide">
                    <?php echo esc_html( tp_content( 'intro_badge' ) ); ?>
                </span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6"><?php echo esc_html( tp_content( 'intro_heading' ) ); ?></h2>
                <div class="prose prose-lg text-gray-600 space-y-4">
                    <p><?php echo esc_html( tp_content( 'intro_1' ) ); ?></p>
                    <p><?php echo esc_html( tp_content( 'intro_2' ) ); ?></p>
                    <p><?php echo wp_kses_post( tp_content( 'intro_3' ) ); ?></p>
                </div>

                <!-- Funciones -->
                <h3 class="text-xl font-bold text-gray-900 mt-10 mb-5"><?php echo esc_html( tp_content( 'functions_heading' ) ); ?></h3>
                <ul class="space-y-3">
                    <?php
                    $funciones = tp_content_lines( 'functions' );
                    foreach ( $funciones as $f ) : ?>
                    <li class="flex items-center gap-3 text-gray-600">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <?php echo esc_html( $f ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Documentación necesaria -->
                <div class="mt-10 p-6 bg-blue-50 border border-blue-200 rounded-2xl">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 p-2.5 bg-blue-100 rounded-xl">
                            <svg class="w-6 h-6 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2"><?php echo esc_html( tp_content( 'documents_heading' ) ); ?></h4>
                            <p class="text-gray-600 text-sm"><?php echo esc_html( tp_content( 'documents_text' ) ); ?></p>
                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <?php foreach ( tp_content_lines( 'documents' ) as $document ) : ?>
                                    <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-alderetes-blue flex-shrink-0"></span><?php echo esc_html( $document ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card lateral -->
            <div class="space-y-5">

                <!-- Información de contacto -->
                <div class="bg-gradient-to-br from-alderetes-blue to-blue-900 rounded-2xl p-6 text-white shadow-lg">
                    <h3 class="font-bold text-xl mb-5"><?php echo esc_html( tp_content( 'attention_heading' ) ); ?></h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 p-2 bg-white/20 rounded-lg">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/70 text-xs font-medium uppercase tracking-wide"><?php echo esc_html( tp_content( 'address_label' ) ); ?></p>
                                <?php foreach ( tp_content_lines( 'address' ) as $index => $line ) : ?>
                                    <p class="<?php echo esc_attr( $index === 0 ? 'font-semibold' : 'text-white/80 text-sm' ); ?>"><?php echo esc_html( $line ); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 p-2 bg-white/20 rounded-lg">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/70 text-xs font-medium uppercase tracking-wide"><?php echo esc_html( tp_content( 'hours_label' ) ); ?></p>
                                <p class="font-semibold"><?php echo esc_html( tp_content( 'hours_heading' ) ); ?></p>
                                <p class="text-white/80 text-sm"><?php echo esc_html( tp_content( 'hours' ) ); ?></p>
                            </div>
                        </div>
                    </div>

                    <a
                        href="https://maps.google.com/?q=Rivadavia+1000,+Alderetes,+Tucumán"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-5 flex items-center justify-center gap-2 w-full py-2.5 bg-white/20 hover:bg-white/30 rounded-xl text-sm font-medium transition-colors"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        <?php echo esc_html( tp_content( 'map_button' ) ); ?>
                    </a>
                </div>

                <!-- Aviso provisorio -->
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-gray-500 text-sm">
                            <?php echo esc_html( tp_content( 'pending_note' ) ); ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- CTA Contacto -->
<section class="py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-3"><?php echo esc_html( tp_content( 'cta_title' ) ); ?></h2>
        <p class="text-white/80 mb-8"><?php echo esc_html( tp_content( 'cta_text' ) ); ?></p>
        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>"
           class="inline-block px-8 py-3.5 bg-white text-alderetes-blue font-semibold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
            <?php echo esc_html( tp_content( 'cta_button' ) ); ?>
        </a>
    </div>
</section>

<?php get_footer(); ?>
