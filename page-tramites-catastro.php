<?php
/**
 * Template Name: Trámites - Catastro
 *
 * @package TailPress
 */

get_header();

$descargas = [
    [
        "nombre" => "Solicitud de Inicio de Permiso de Obra",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
    ],
    [
        "nombre" => "Solicitud de Línea Municipal",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
    ],
    [
        "nombre" => "Solicitud de Visado de Documentación",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
    ],
    [
        "nombre" => "Conforme a Obra (Requisitos)",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
    ],
    [
        "nombre" => "Anteproyecto – Lista de Requisitos",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>',
    ],
    [
        "nombre" => "Presentación de Documentación Técnica",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>',
    ],
];
?>

<!-- Hero -->
<section class="relative py-16 bg-gradient-to-br from-gray-800 to-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-center md:text-left">
                <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm">Sección Trámites</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 uppercase tracking-tight">Catastro</h1>
                <p class="text-xl text-white/70 max-w-xl">Gestión, registro y actualización de la información territorial del municipio.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                </svg>
                <p class="text-white font-bold text-sm uppercase tracking-wider">Área de Catastro</p>
                <p class="text-white/60 text-xs mt-1">Municipalidad de Alderetes</p>
            </div>
        </div>
    </div>
</section>

<!-- Contenido -->
<main class="py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Columna principal -->
            <div class="flex-1">

                <!-- Texto institucional -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-alderetes-blue/10 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">¿Qué hacemos?</h2>
                    </div>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            El Área de Catastro de la Municipalidad de Alderetes es responsable de la <strong class="text-gray-800">gestión, registro y actualización</strong> de la información territorial del municipio. Esta área mantiene el registro de todas las parcelas, propiedades y modificaciones territoriales dentro del ejido municipal.
                        </p>
                        <p>
                            Brindamos servicios de <strong class="text-gray-800">consulta catastral, emisión de certificados, aprobación de planos de mensura y subdivisión</strong>, y asesoramiento técnico para trámites relacionados con la propiedad inmueble.
                        </p>
                    </div>
                </div>

                <!-- Descargas -->
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <svg class="w-6 h-6 text-alderetes-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-900">Descargas</h2>
                        <div class="flex-1 h-px bg-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($descargas as $archivo): ?>
                        <a href="#" class="group flex items-center gap-4 bg-white rounded-2xl border-2 border-gray-100 hover:border-alderetes-blue hover:shadow-lg transition-all duration-300 p-5">
                            <!-- Ícono del documento -->
                            <div class="w-12 h-12 bg-alderetes-blue/10 group-hover:bg-alderetes-blue rounded-xl flex items-center justify-center shrink-0 transition-all duration-300">
                                <svg class="w-6 h-6 text-alderetes-blue group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <?php echo $archivo['icono']; ?>
                                </svg>
                            </div>
                            <!-- Nombre y chip PDF -->
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-800 group-hover:text-alderetes-blue transition-colors text-sm leading-tight"><?php echo esc_html($archivo['nombre']); ?></p>
                                <span class="inline-flex items-center gap-1 mt-1.5 text-xs bg-gray-100 group-hover:bg-alderetes-blue/10 text-gray-500 group-hover:text-alderetes-blue px-2 py-0.5 rounded-full transition-all">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    Descargar PDF
                                </span>
                            </div>
                            <!-- Flecha -->
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-alderetes-blue group-hover:translate-x-1 transition-all duration-300 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-72">
                <div class="sticky top-24 space-y-4">

                    <!-- Atención técnica -->
                    <div class="bg-gray-900 text-white rounded-2xl p-6 shadow-xl">
                        <h3 class="font-bold text-base mb-5 pb-3 border-b border-white/20 uppercase tracking-wider">Atención Técnica</h3>
                        <div class="space-y-5">
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-white/10 rounded-lg shrink-0">
                                    <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-white/50 uppercase font-bold mb-0.5">Dirección</p>
                                    <p class="text-sm text-white/80">Edificio Municipal – Sector Planeamiento</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-white/10 rounded-lg shrink-0">
                                    <svg class="w-5 h-5 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-white/50 uppercase font-bold mb-0.5">Horario</p>
                                    <p class="text-sm text-white/80">Lunes a Viernes<br>08:00 a 13:00 hs</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to action -->
                    <div class="bg-alderetes-blue rounded-2xl p-6 text-white shadow-xl">
                        <svg class="w-8 h-8 mb-3 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="font-bold mb-2">¿Necesitás asesoramiento?</h3>
                        <p class="text-sm text-blue-200 mb-4">Nuestro equipo técnico puede orientarte en tu consulta.</p>
                        <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="block text-center bg-white text-alderetes-blue font-bold text-sm py-2.5 rounded-xl hover:bg-blue-50 transition-colors">
                            Contactar
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
