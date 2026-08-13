<?php
/**
 * Template Name: Turnos – Tránsito
 *
 * @package TailPress
 */

get_header();

$cancelacion_notice = null;
$cancelacion_confirmacion = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar_turno'], $_POST['token'])) {
    $numero_cancelacion = sanitize_text_field(wp_unslash($_POST['cancelar_turno']));

    if (
        !isset($_POST['tp_cancel_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tp_cancel_nonce'])), 'tp_cancelar_' . $numero_cancelacion)
    ) {
        $cancelacion_notice = [
            'ok'      => false,
            'mensaje' => 'La confirmación venció. Volvé a abrir el enlace recibido por email.',
        ];
    } else {
        $resultado_cancelacion = tp_cancelar_turno_por_ciudadano(
            $numero_cancelacion,
            wp_unslash($_POST['token'])
        );

        $cancelacion_notice = [
            'ok'      => !empty($resultado_cancelacion['ok']),
            'mensaje' => $resultado_cancelacion['mensaje'] ?? 'No pudimos procesar la cancelación.',
        ];
    }
} elseif (isset($_GET['cancelar_turno'], $_GET['token'])) {
    $resultado_validacion = tp_validar_cancelacion_turno_por_ciudadano(
        wp_unslash($_GET['cancelar_turno']),
        wp_unslash($_GET['token'])
    );

    if (!empty($resultado_validacion['ok']) && ($resultado_validacion['estado'] ?? '') === 'pendiente') {
        $cancelacion_confirmacion = $resultado_validacion;
    } else {
        $cancelacion_notice = [
            'ok'      => !empty($resultado_validacion['ok']),
            'mensaje' => $resultado_validacion['mensaje'] ?? 'No pudimos procesar la cancelación.',
        ];
    }
}
?>

<!-- Hero -->
<section class="relative py-14 bg-gradient-to-br from-alderetes-blue to-blue-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm"><?php echo esc_html( tp_content( 'hero_badge' ) ); ?></span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php echo esc_html( tp_content( 'hero_title' ) ); ?></h1>
        <p class="text-xl text-white/75 max-w-xl mx-auto"><?php echo esc_html( tp_content( 'hero_text' ) ); ?></p>
        <div class="flex flex-wrap justify-center gap-4 mt-6 text-sm">
            <span class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <?php echo esc_html( tp_content( 'hero_hours' ) ); ?>
            </span>
            <span class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <?php echo esc_html( tp_content( 'hero_interval' ) ); ?>
            </span>
        </div>
    </div>
</section>

<!-- Stepper visual -->
<div class="bg-white border-b border-gray-100 py-4">
    <div class="max-w-4xl mx-auto px-4">
        <div class="flex items-center justify-center gap-0">
            <div class="flex items-center gap-2" id="step-indicator-1">
                <div class="w-8 h-8 rounded-full bg-alderetes-blue text-white text-sm font-bold flex items-center justify-center shrink-0">1</div>
                <span class="text-sm font-medium text-alderetes-blue hidden sm:block">Elegí una fecha</span>
            </div>
            <div class="w-12 h-0.5 bg-gray-200 mx-2"></div>
            <div class="flex items-center gap-2 opacity-40" id="step-indicator-2">
                <div class="w-8 h-8 rounded-full bg-gray-400 text-white text-sm font-bold flex items-center justify-center shrink-0">2</div>
                <span class="text-sm font-medium text-gray-500 hidden sm:block">Elegí un horario</span>
            </div>
            <div class="w-12 h-0.5 bg-gray-200 mx-2"></div>
            <div class="flex items-center gap-2 opacity-40" id="step-indicator-3">
                <div class="w-8 h-8 rounded-full bg-gray-400 text-white text-sm font-bold flex items-center justify-center shrink-0">3</div>
                <span class="text-sm font-medium text-gray-500 hidden sm:block">Tus datos</span>
            </div>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<main class="py-10 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">

        <?php if ($cancelacion_notice) : ?>
        <div class="mb-6 rounded-3xl border px-6 py-5 <?php echo $cancelacion_notice['ok'] ? 'bg-green-50 border-green-200 text-green-800' : 'bg-red-50 border-red-200 text-red-800'; ?>">
            <div class="flex items-start gap-3">
                <div class="mt-0.5">
                    <?php if ($cancelacion_notice['ok']) : ?>
                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <?php else : ?>
                    <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <?php endif; ?>
                </div>
                <div>
                    <p class="font-bold mb-1"><?php echo $cancelacion_notice['ok'] ? 'Turno cancelado' : 'No se pudo cancelar'; ?></p>
                    <p class="text-sm"><?php echo esc_html($cancelacion_notice['mensaje']); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($cancelacion_confirmacion) : ?>
        <div class="mb-6 rounded-3xl border border-orange-200 bg-orange-50 px-6 py-6 text-orange-900">
            <div class="flex items-start gap-4">
                <svg class="w-6 h-6 text-orange-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1">
                    <p class="font-bold text-lg mb-2">Confirmar cancelación del turno</p>
                    <p class="text-sm mb-4">Estás por cancelar este turno. Esta acción liberará el horario para que otra persona pueda reservarlo.</p>
                    <div class="bg-white/70 border border-orange-100 rounded-2xl p-4 text-sm mb-5">
                        <p><strong>N° de Turno:</strong> <?php echo esc_html($cancelacion_confirmacion['numero']); ?></p>
                        <p><strong>Nombre:</strong> <?php echo esc_html($cancelacion_confirmacion['nombre']); ?></p>
                        <p><strong>Fecha:</strong> <?php echo esc_html(date_i18n('d/m/Y', strtotime($cancelacion_confirmacion['fecha']))); ?></p>
                        <p><strong>Hora:</strong> <?php echo esc_html($cancelacion_confirmacion['hora']); ?> hs</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <form method="post" class="inline">
                            <?php wp_nonce_field('tp_cancelar_' . $cancelacion_confirmacion['numero'], 'tp_cancel_nonce'); ?>
                            <input type="hidden" name="cancelar_turno" value="<?php echo esc_attr($cancelacion_confirmacion['numero']); ?>">
                            <input type="hidden" name="token" value="<?php echo esc_attr(wp_unslash($_GET['token'])); ?>">
                            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-semibold text-white hover:bg-red-700 transition-colors">
                                Sí, cancelar turno
                            </button>
                        </form>
                        <a href="<?php echo esc_url(home_url('/turnos-de-transito/')); ?>" class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-700 border border-gray-200 hover:bg-gray-50 transition-colors">
                            No, mantener turno
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- PASO 1: Selección de fecha -->
        <div id="paso-1" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <span class="w-8 h-8 bg-alderetes-blue text-white rounded-full flex items-center justify-center text-sm font-bold">1</span>
                Seleccioná una fecha disponible
            </h2>

            <!-- Navegación del calendario -->
            <div class="flex items-center justify-between mb-4">
                <button id="btn-mes-ant" class="p-2 hover:bg-gray-100 rounded-xl transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <h3 class="font-bold text-gray-800 text-lg" id="mes-titulo"></h3>
                <button id="btn-mes-sig" class="p-2 hover:bg-gray-100 rounded-xl transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

            <!-- Grilla del calendario -->
            <div class="grid grid-cols-7 gap-1 mb-2">
                <?php foreach (['Lun','Mar','Mié','Jue','Vie','Sáb','Dom'] as $d): ?>
                <div class="text-center text-xs font-bold text-gray-400 py-2"><?php echo $d; ?></div>
                <?php endforeach; ?>
            </div>
            <div id="calendario-grid" class="grid grid-cols-7 gap-1"></div>

            <!-- Leyenda -->
            <div class="flex flex-wrap gap-4 mt-4 text-xs text-gray-500">
                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-alderetes-blue inline-block"></span> Disponible</span>
                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-orange-400 inline-block"></span> Pocos turnos</span>
                <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-full bg-gray-200 inline-block"></span> Sin turnos / No hábil</span>
            </div>
        </div>

        <!-- PASO 2: Selección de horario (oculto inicialmente) -->
        <div id="paso-2" class="hidden bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3">
                    <span class="w-8 h-8 bg-alderetes-blue text-white rounded-full flex items-center justify-center text-sm font-bold">2</span>
                    Elegí tu horario
                </h2>
                <button id="btn-cambiar-fecha" class="text-sm text-alderetes-blue hover:underline flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Cambiar fecha
                </button>
            </div>
            <div class="inline-flex items-center gap-2 bg-blue-50 text-alderetes-blue px-4 py-2 rounded-xl text-sm font-medium mb-6">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span id="fecha-seleccionada-label"></span>
            </div>
            <div id="slots-loading" class="hidden text-center py-8 text-gray-400">
                <svg class="w-8 h-8 animate-spin mx-auto mb-2 text-alderetes-blue" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                Cargando horarios...
            </div>
            <div id="slots-grid" class="grid grid-cols-2 sm:grid-cols-4 gap-3"></div>
        </div>

        <!-- PASO 3: Formulario de datos (oculto inicialmente) -->
        <div id="paso-3" class="hidden bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3">
                    <span class="w-8 h-8 bg-alderetes-blue text-white rounded-full flex items-center justify-center text-sm font-bold">3</span>
                    Completá tus datos
                </h2>
                <button id="btn-cambiar-hora" class="text-sm text-alderetes-blue hover:underline flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Cambiar horario
                </button>
            </div>

            <!-- Resumen del turno -->
            <div class="flex flex-wrap gap-3 mb-6">
                <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-2 text-sm font-semibold text-alderetes-blue flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span id="resumen-fecha"></span>
                </div>
                <div class="bg-orange-50 border border-orange-100 rounded-xl px-4 py-2 text-sm font-semibold text-alderetes-orange flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span id="resumen-hora"></span>
                </div>
            </div>

            <form id="form-turno" class="space-y-4">
                <input type="hidden" id="turno-ts" value="<?php echo esc_attr(time()); ?>">
                <div class="absolute left-[-10000px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
                    <label for="turno-website">Sitio web</label>
                    <input type="text" id="turno-website" tabindex="-1" autocomplete="off">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nombre completo *</label>
                        <input type="text" id="input-nombre" required placeholder="Ej: Juan Pérez"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-alderetes-blue focus:ring-2 focus:ring-blue-100 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">DNI *</label>
                        <input type="text" id="input-dni" required placeholder="Ej: 30123456"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-alderetes-blue focus:ring-2 focus:ring-blue-100 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Teléfono</label>
                        <input type="tel" id="input-telefono" placeholder="Ej: 381-123-4567"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-alderetes-blue focus:ring-2 focus:ring-blue-100 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email *</label>
                        <input type="email" id="input-email" required placeholder="Ej: juan@ejemplo.com"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-alderetes-blue focus:ring-2 focus:ring-blue-100 transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Categoría de licencia *
                        <span class="text-xs text-alderetes-blue font-semibold block sm:inline sm:ml-1">(HASTA 70 DÍAS DESDE EL VENCIMIENTO)</span>
                    </label>
                    <select id="input-categoria" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-alderetes-blue focus:ring-2 focus:ring-blue-100 transition-all bg-white">
                        <option value="">Seleccioná una opción...</option>
                        <?php
                        // Opciones generadas desde la fuente única tp_turnos_categorias_validas().
                        // Mostramos solo las 6 opciones vigentes para el vecino.
                        $cats_vigentes = array_slice(tp_turnos_categorias_validas(), 0, 6);
                        foreach ($cats_vigentes as $cat) : ?>
                            <option value="<?php echo esc_attr($cat); ?>"><?php echo esc_html($cat); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="form-error" class="hidden bg-red-50 border border-red-200 rounded-xl px-4 py-3 text-sm text-red-700"></div>
                <button type="submit" id="btn-reservar"
                        class="w-full bg-alderetes-blue hover:bg-blue-800 text-white font-bold py-4 rounded-2xl transition-all duration-200 flex items-center justify-center gap-2 text-base shadow-lg shadow-blue-200 hover:shadow-xl hover:shadow-blue-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Confirmar Turno
                </button>
                <p class="text-xs text-gray-400 text-center">Recibirás un email de confirmación con tu número de turno.</p>
            </form>
        </div>

        <!-- PASO 4: Confirmación (oculto inicialmente) -->
        <div id="paso-4" class="hidden bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center mb-6">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-black text-gray-900 mb-2">¡Turno confirmado!</h2>
            <p class="text-gray-500 mb-6">Revisá tu email, te enviamos la confirmación con todos los detalles.</p>
            <div class="bg-gray-50 rounded-2xl p-6 inline-block text-left mb-6">
                <p class="text-xs text-gray-400 uppercase font-bold mb-1">N° de Turno</p>
                <p class="text-3xl font-black text-alderetes-blue" id="confirmacion-numero"></p>
                <div class="mt-4 space-y-1">
                    <p class="text-sm text-gray-600"><strong>Fecha:</strong> <span id="confirmacion-fecha"></span></p>
                    <p class="text-sm text-gray-600"><strong>Hora:</strong> <span id="confirmacion-hora"></span> hs</p>
                </div>
            </div>
            <p class="text-sm text-gray-500 mb-6">
                📍 <strong>Lugar:</strong> Dirección de Tránsito, Av. San Martín – Municipalidad de Alderetes<br>
                ⏱️ Presentate <strong>5 minutos antes</strong> con tu DNI en mano.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <a id="btn-whatsapp-confirmacion" href="#" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-2.5 rounded-xl transition-colors text-sm shadow">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.205 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    Enviar recordatorio a mi WhatsApp
                </a>
                <a href="<?php echo esc_url(home_url('/transito')); ?>" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                    Ver requisitos de licencia
                </a>
                <p class="text-xs text-gray-400 w-full">Si no podés asistir, usá el enlace de cancelación que te enviamos por email para liberar el horario.</p>
            </div>
        </div>

    </div>
</main>

<script>
(function () {
    const AJAX_URL = '<?php echo esc_js(admin_url('admin-ajax.php')); ?>';
    const NONCE    = '<?php echo esc_js(wp_create_nonce('tp_turnos_nonce')); ?>';
    const FERIADOS = <?php echo json_encode(tp_feriados_argentina()); ?>;
    const BLOQUEADOS = <?php echo json_encode((array) get_option('tp_dias_bloqueados', [])); ?>;

    const MESES = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    const hoy = new Date();
    hoy.setHours(0,0,0,0);
    const maxFecha = new Date(hoy);
    maxFecha.setDate(maxFecha.getDate() + 30);

    let mesActual = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
    let fechaSeleccionada = null;
    let horaSeleccionada  = null;

    function pad(n){ return String(n).padStart(2,'0'); }
    function fechaStr(d){ return d.getFullYear() + '-' + pad(d.getMonth()+1) + '-' + pad(d.getDate()); }
    function esDiaHabil(d){
        const dow = d.getDay(); // 0=Dom,6=Sáb
        if(dow === 0 || dow === 6) return false;
        const str = fechaStr(d);
        if(FERIADOS.includes(str)) return false;
        if(BLOQUEADOS.includes(str)) return false;
        if(d < hoy || d > maxFecha) return false;
        return true;
    }

    function renderCalendario(){
        const grid = document.getElementById('calendario-grid');
        const titulo = document.getElementById('mes-titulo');
        titulo.textContent = MESES[mesActual.getMonth()] + ' ' + mesActual.getFullYear();
        grid.innerHTML = '';

        const primerDia = new Date(mesActual.getFullYear(), mesActual.getMonth(), 1);
        let dowInicio = primerDia.getDay(); // 0=Dom
        dowInicio = dowInicio === 0 ? 6 : dowInicio - 1; // Ajustar a Lun=0

        for(let i = 0; i < dowInicio; i++){
            const blank = document.createElement('div');
            grid.appendChild(blank);
        }

        const diasEnMes = new Date(mesActual.getFullYear(), mesActual.getMonth()+1, 0).getDate();
        for(let dia = 1; dia <= diasEnMes; dia++){
            const fecha = new Date(mesActual.getFullYear(), mesActual.getMonth(), dia);
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = dia;
            btn.className = 'w-full aspect-square flex items-center justify-center text-sm rounded-xl font-medium transition-all ';
            const str = fechaStr(fecha);

            if(!esDiaHabil(fecha)){
                btn.className += 'text-gray-300 cursor-not-allowed bg-gray-50';
                btn.disabled = true;
            } else if(str === (fechaSeleccionada || '')){
                btn.className += 'bg-alderetes-blue text-white shadow-md scale-110 ring-2 ring-offset-1 ring-alderetes-blue';
            } else {
                btn.className += 'hover:bg-blue-50 hover:text-alderetes-blue text-gray-700 hover:scale-105';
                btn.addEventListener('click', () => seleccionarFecha(fecha, str));
            }
            grid.appendChild(btn);
        }

        document.getElementById('btn-mes-ant').disabled = mesActual <= new Date(hoy.getFullYear(), hoy.getMonth(), 1);
        document.getElementById('btn-mes-sig').disabled = mesActual >= new Date(hoy.getFullYear(), hoy.getMonth()+1, 1);
    }

    function seleccionarFecha(fecha, str){
        fechaSeleccionada = str;
        horaSeleccionada  = null;
        renderCalendario();

        const label = document.getElementById('fecha-seleccionada-label');
        const parts = str.split('-');
        label.textContent = parts[2] + ' de ' + MESES[parseInt(parts[1])-1] + ' ' + parts[0];

        mostrarPaso(2);
        cargarSlots(str);
    }

    function cargarSlots(fecha){
        document.getElementById('slots-loading').classList.remove('hidden');
        document.getElementById('slots-grid').innerHTML = '';

        const body = new URLSearchParams({ action:'tp_get_slots', nonce: NONCE, fecha: fecha });
        fetch(AJAX_URL, { method:'POST', body })
            .then(r => r.json())
            .then(res => {
                document.getElementById('slots-loading').classList.add('hidden');
                if(!res.success){ renderSlotsError(); return; }
                renderSlots(res.data.slots, res.data.ocupados);
            })
            .catch(() => { document.getElementById('slots-loading').classList.add('hidden'); renderSlotsError(); });
    }

    function renderSlots(todos, ocupados){
        const grid = document.getElementById('slots-grid');
        grid.innerHTML = '';
        todos.forEach(hora => {
            const libre = !ocupados.includes(hora);
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.innerHTML = '<span class="text-lg font-bold">' + hora + '</span><span class="text-xs block mt-0.5">' + (libre ? 'Disponible' : 'Ocupado') + '</span>';
            btn.className = 'py-4 px-3 rounded-2xl border-2 text-center transition-all duration-200 ';
            if(!libre){
                btn.className += 'border-gray-100 bg-gray-50 text-gray-300 cursor-not-allowed';
                btn.disabled = true;
            } else if(hora === horaSeleccionada){
                btn.className += 'border-alderetes-blue bg-alderetes-blue text-white shadow-md scale-105';
            } else {
                btn.className += 'border-gray-200 hover:border-alderetes-blue hover:bg-blue-50 hover:text-alderetes-blue text-gray-700 hover:scale-105';
                btn.addEventListener('click', () => seleccionarHora(hora));
            }
            grid.appendChild(btn);
        });
    }

    function renderSlotsError(){
        document.getElementById('slots-grid').innerHTML = '<p class="col-span-4 text-center text-red-500 text-sm py-4">No se pudieron cargar los horarios. Intentá de nuevo.</p>';
    }

    function seleccionarHora(hora){
        horaSeleccionada = hora;
        cargarSlots(fechaSeleccionada); // re-render con la hora activa marcada

        const parts = fechaSeleccionada.split('-');
        const fechaFmt = parts[2] + ' de ' + MESES[parseInt(parts[1])-1] + ' ' + parts[0];
        document.getElementById('resumen-fecha').textContent = fechaFmt;
        document.getElementById('resumen-hora').textContent = hora + ' hs';

        mostrarPaso(3);
    }

    function mostrarPaso(num){
        [1,2,3,4].forEach(n => {
            document.getElementById('paso-' + n).classList.toggle('hidden', n !== num);
        });
        [1,2,3].forEach(n => {
            const ind = document.getElementById('step-indicator-' + n);
            ind.classList.toggle('opacity-40', n > num);
        });
        if(num > 1) document.getElementById('paso-2').classList.remove('hidden');
        if(num > 2) document.getElementById('paso-3').classList.remove('hidden');
        if(num === 4){ document.getElementById('paso-1').classList.add('hidden'); document.getElementById('paso-2').classList.add('hidden'); document.getElementById('paso-3').classList.add('hidden'); }
    }

    // Botones navegación meses
    document.getElementById('btn-mes-ant').addEventListener('click', () => {
        const hoyMes = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
        if(mesActual <= hoyMes) return;
        mesActual = new Date(mesActual.getFullYear(), mesActual.getMonth()-1, 1);
        renderCalendario();
    });
    document.getElementById('btn-mes-sig').addEventListener('click', () => {
        const maxMes = new Date(hoy.getFullYear(), hoy.getMonth()+1, 1);
        if(mesActual >= maxMes) return;
        mesActual = new Date(mesActual.getFullYear(), mesActual.getMonth()+1, 1);
        renderCalendario();
    });

    document.getElementById('btn-cambiar-fecha').addEventListener('click', () => mostrarPaso(1));
    document.getElementById('btn-cambiar-hora').addEventListener('click', () => mostrarPaso(2));

    // Submit formulario
    document.getElementById('form-turno').addEventListener('submit', function(e){
        e.preventDefault();
        const errorDiv = document.getElementById('form-error');
        errorDiv.classList.add('hidden');

        const nombre    = document.getElementById('input-nombre').value.trim();
        const dni       = document.getElementById('input-dni').value.trim();
        const telefono  = document.getElementById('input-telefono').value.trim();
        const email     = document.getElementById('input-email').value.trim();
        const categoria = document.getElementById('input-categoria').value;
        const btn       = document.getElementById('btn-reservar');

        if(!nombre || !dni || !email || !categoria){
            errorDiv.textContent = 'Por favor completá todos los campos obligatorios (*)';
            errorDiv.classList.remove('hidden');
            return;
        }

        btn.disabled = true;
        btn.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Reservando...';

        const body = new URLSearchParams({
            action: 'tp_reservar', nonce: NONCE,
            fecha: fechaSeleccionada, hora: horaSeleccionada,
            nombre, dni, telefono, email, categoria,
            turno_ts: document.getElementById('turno-ts').value,
            turno_website: document.getElementById('turno-website').value
        });

        fetch(AJAX_URL, { method:'POST', body })
            .then(r => r.json())
            .then(res => {
                if(res.success){
                    const parts = fechaSeleccionada.split('-');
                    const confirmFmt = parts[2] + ' de ' + MESES[parseInt(parts[1])-1] + ' ' + parts[0];
                    document.getElementById('confirmacion-numero').textContent = res.data.numero;
                    document.getElementById('confirmacion-fecha').textContent = confirmFmt;
                    document.getElementById('confirmacion-hora').textContent = horaSeleccionada;

                    const waText = encodeURIComponent("¡Hola! Confirmé mi turno para Licencia de Conducir en la Municipalidad de Alderetes:\n\n📌 *N° de Turno:* " + res.data.numero + "\n👤 *Nombre:* " + nombre + "\n🆔 *DNI:* " + dni + "\n📋 *Categoría:* " + categoria + "\n📅 *Fecha:* " + confirmFmt + "\n⏰ *Hora:* " + horaSeleccionada + " hs\n📍 *Lugar:* Dirección de Tránsito (Av. San Martín)");
                    const btnWa = document.getElementById('btn-whatsapp-confirmacion');
                    if (btnWa) {
                        btnWa.href = "https://api.whatsapp.com/send?text=" + waText;
                    }

                    mostrarPaso(4);
                    window.scrollTo({top: 0, behavior:'smooth'});
                } else {
                    errorDiv.textContent = res.data.mensaje || 'Ocurrió un error. Intentá de nuevo.';
                    errorDiv.classList.remove('hidden');
                    btn.disabled = false;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Confirmar Turno';
                }
            })
            .catch(() => {
                errorDiv.textContent = 'Error de conexión. Verificá tu internet e intentá de nuevo.';
                errorDiv.classList.remove('hidden');
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Confirmar Turno';
            });
    });

    // Init
    renderCalendario();
    mostrarPaso(1);
})();
</script>

<?php get_footer(); ?>
