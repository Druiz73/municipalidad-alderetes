<?php
/**
 * Template Name: Organigrama
 *
 * @package TailPress
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-alderetes-blue to-blue-900 overflow-hidden text-white">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm">Período 2023 – 2027</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Organigrama Municipal</h1>
        <div class="w-20 h-1 bg-alderetes-orange mx-auto rounded-full mb-4"></div>
        <p class="text-white/70 max-w-xl mx-auto text-lg">Estructura de gobierno de la Municipalidad de Alderetes bajo la gestión de la Intendente Graciela Gutiérrez.</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">

        <!-- ===================== NIVEL 1: INTENDENTE ===================== -->
        <div class="flex justify-center mb-6">
            <div class="bg-white rounded-3xl shadow-xl border-2 border-alderetes-orange p-8 text-center w-full max-w-sm relative">
                <!-- Ícono avatar placeholder -->
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-alderetes-orange to-orange-400 flex items-center justify-center shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="inline-block bg-alderetes-orange/10 text-alderetes-orange text-xs font-bold px-3 py-1 rounded-full mb-3 uppercase tracking-wider">Intendente</span>
                <h2 class="text-2xl font-black text-gray-900">Graciela Gutiérrez</h2>
                <p class="text-gray-400 text-sm mt-1">Período 2023 – 2027</p>
                <!-- Badge Ejecutivo -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-alderetes-orange text-white text-xs font-bold px-4 py-1 rounded-full shadow">
                    Poder Ejecutivo
                </div>
            </div>
        </div>

        <!-- Conector vertical -->
        <div class="flex justify-center mb-6">
            <div class="w-0.5 h-10 bg-gray-300"></div>
        </div>

        <!-- ===================== NIVEL 2: SECRETARÍAS ===================== -->
        <div class="relative mb-6">
            <!-- Línea horizontal -->
            <div class="hidden md:block absolute top-0 left-1/4 right-1/4 h-0.5 bg-gray-300 translate-y-0"></div>
            <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">Secretarías y Coordinación</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                <?php
                $secretarias = [
                    [
                        "cargo"  => "Secretaría de Gobierno y Desarrollo",
                        "nombre" => "",
                        "color"  => "blue",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                    ],
                    [
                        "cargo"  => "Secretaría de Hacienda",
                        "nombre" => "",
                        "color"  => "blue",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    ],
                    [
                        "cargo"  => "Secretaría de Seguridad",
                        "nombre" => "Julio Romano",
                        "color"  => "blue",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    ],
                    [
                        "cargo"  => "Secretaría de Coordinación General",
                        "nombre" => "Pablo Caldas",
                        "color"  => "blue",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h7"/>',
                    ],
                    [
                        "cargo"  => "Secretaría de Educación y Cultura",
                        "nombre" => "Roxana Sansone",
                        "color"  => "blue",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>',
                    ],
                ];
                foreach ($secretarias as $s):
                    $has_nombre = !empty($s['nombre']);
                ?>
                <div class="bg-white rounded-2xl border-2 border-gray-100 hover:border-alderetes-blue hover:shadow-lg transition-all duration-300 p-5 text-center group">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-alderetes-blue/10 group-hover:bg-alderetes-blue flex items-center justify-center transition-all duration-300">
                        <svg class="w-7 h-7 text-alderetes-blue group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <?php echo $s['icono']; ?>
                        </svg>
                    </div>
                    <p class="text-xs font-bold text-alderetes-blue uppercase tracking-wide mb-1 leading-tight"><?php echo esc_html($s['cargo']); ?></p>
                    <?php if ($has_nombre): ?>
                        <p class="font-bold text-gray-800 text-sm"><?php echo esc_html($s['nombre']); ?></p>
                    <?php else: ?>
                        <p class="text-gray-300 text-xs italic">— Por confirmar —</p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===================== NIVEL 3: DIRECCIONES ===================== -->
        <div class="mt-10">
            <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Direcciones Municipales</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <?php
                $direcciones = [
                    [
                        "area"   => "Dirección de Alumbrado Público",
                        "nombre" => "Osvaldo Escobar",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
                    ],
                    [
                        "area"   => "Mantenimiento Urbano y Servicios Públicos",
                        "nombre" => "",
                        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
                    ],
                ];
                foreach ($direcciones as $d):
                    $has_nombre = !empty($d['nombre']);
                ?>
                <div class="bg-white rounded-2xl border border-gray-200 hover:border-alderetes-orange hover:shadow-md transition-all duration-300 p-5 flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-xl bg-alderetes-orange/10 group-hover:bg-alderetes-orange flex items-center justify-center shrink-0 transition-all duration-300">
                        <svg class="w-6 h-6 text-alderetes-orange group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <?php echo $d['icono']; ?>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-alderetes-orange uppercase tracking-wide"><?php echo esc_html($d['area']); ?></p>
                        <?php if ($has_nombre): ?>
                            <p class="font-bold text-gray-800 text-sm mt-0.5"><?php echo esc_html($d['nombre']); ?></p>
                        <?php else: ?>
                            <p class="text-gray-300 text-xs italic mt-0.5">— Por confirmar —</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ===================== CONCEJO DELIBERANTE ===================== -->
        <div class="mt-12 bg-gradient-to-r from-gray-800 to-gray-900 rounded-3xl p-8 text-white text-center shadow-xl">
            <svg class="w-10 h-10 mx-auto mb-4 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
            </svg>
            <span class="inline-block bg-white/10 text-white/80 text-xs font-bold px-4 py-1 rounded-full mb-3 uppercase tracking-wider">Poder Legislativo Local</span>
            <h3 class="text-2xl font-black mb-2">Honorable Concejo Deliberante</h3>
            <p class="text-gray-400 max-w-lg mx-auto text-sm leading-relaxed">
                Funciona de manera independiente del Ejecutivo Municipal para sancionar normativas, ordenanzas y políticas públicas en beneficio de la comunidad de Alderetes.
            </p>
        </div>

        <!-- Nota -->
        <p class="text-center text-xs text-gray-400 mt-8 italic">
            * La información del organigrama se actualiza conforme a los cambios oficiales en la estructura municipal.
        </p>

    </div>
</section>

<?php get_footer(); ?>
