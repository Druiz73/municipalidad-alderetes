<?php
/**
 * Template Name: Trámites - Tránsito
 *
 * @package TailPress
 */

get_header();

$categorias = [
    [
        "grupo"  => "Renovaciones Profesionales",
        "color"  => "orange",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
        "items"  => [
            [
                "titulo" => "Renovación Categoría \"C\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"C\".",
                ],
            ],
            [
                "titulo" => "Renovación Categoría \"D\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"D\".",
                    "Certificado Nacional de Antecedentes Penales clase \"D\".",
                ],
            ],
            [
                "titulo" => "Renovación Categoría \"E\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"E\".",
                ],
            ],
        ],
    ],
    [
        "grupo"  => "Ampliaciones",
        "color"  => "blue",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>',
        "items"  => [
            [
                "titulo" => "Ampliación Categoría \"C\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico (principiantes, originales a partir de los 3 meses de su vencimiento y clases \"C\").",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
            [
                "titulo" => "Ampliación Categoría \"D\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico (principiantes, originales a partir de los 3 meses de su vencimiento y clases \"D\").",
                    "Certificado de Antecedentes Penales Nacional (clase \"D\").",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
            [
                "titulo" => "Ampliación Categoría \"E\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico.",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
        ],
    ],
    [
        "grupo"  => "Particulares y Principiantes",
        "color"  => "green",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>',
        "items"  => [
            [
                "titulo" => "Renovación Categoría Particular \"A+B\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                ],
            ],
            [
                "titulo" => "Renovación Mayores de 65 Años – Particular",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Mayores de 65 años: electrocardiograma más informe.",
                ],
            ],
            [
                "titulo" => "Principiantes Mayores de Edad",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "CUIL.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Grupo sanguíneo, Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico (principiantes).",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, moto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
            [
                "titulo" => "Principiantes Menores de Edad",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico (principiantes).",
                    "Menores de 18: autorización de padre, madre o tutor en entidad policial, más copia de DNI.",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, moto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
        ],
    ],
];

$color_map = [
    "orange" => [
        "badge"   => "bg-orange-100 text-alderetes-orange",
        "icon"    => "text-alderetes-orange",
        "border"  => "border-alderetes-orange",
        "hover"   => "hover:border-alderetes-orange",
        "dot"     => "bg-alderetes-orange",
        "check"   => "text-alderetes-orange",
    ],
    "blue" => [
        "badge"   => "bg-blue-100 text-alderetes-blue",
        "icon"    => "text-alderetes-blue",
        "border"  => "border-alderetes-blue",
        "hover"   => "hover:border-alderetes-blue",
        "dot"     => "bg-alderetes-blue",
        "check"   => "text-alderetes-blue",
    ],
    "green" => [
        "badge"   => "bg-green-100 text-green-700",
        "icon"    => "text-green-600",
        "border"  => "border-green-500",
        "hover"   => "hover:border-green-500",
        "dot"     => "bg-green-500",
        "check"   => "text-green-600",
    ],
];
?>

<!-- Hero Section -->
<section class="relative py-16 bg-gradient-to-br from-alderetes-orange to-orange-800 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-center md:text-left">
                <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm">Sección Trámites</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 uppercase tracking-tight">Tránsito</h1>
                <p class="text-xl text-white/80 max-w-xl">Requisitos para licencias de conducir: renovaciones, ampliaciones y permisos.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 .001M13 16l2-4h3l2 4M13 16H9m4 0h2"/>
                </svg>
                <p class="text-white font-bold text-sm uppercase tracking-wider">Dirección de Tránsito</p>
                <p class="text-white/70 text-xs mt-1">Municipalidad de Alderetes</p>
            </div>
        </div>
    </div>
</section>

<!-- Duplicado - destacado arriba -->
<div class="bg-gray-900 py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col sm:flex-row items-center gap-4 bg-white/5 border border-white/10 rounded-2xl px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-alderetes-orange/20 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-alderetes-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-white font-bold uppercase tracking-wide text-sm">Duplicado de Licencia</span>
            </div>
            <div class="flex flex-wrap gap-2 sm:ml-4">
                <span class="bg-white/10 text-white/80 text-xs px-3 py-1.5 rounded-lg border border-white/10">✓ Fotocopia de DNI y original a la vista</span>
                <span class="bg-white/10 text-white/80 text-xs px-3 py-1.5 rounded-lg border border-white/10">✓ Denuncia de extravío</span>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 space-y-16">

        <?php foreach ($categorias as $grupo_data):
            $c = $color_map[$grupo_data['color']];
        ?>
        <div>
            <!-- Group header -->
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-12 rounded-2xl bg-white shadow-md flex items-center justify-center border border-gray-100">
                    <svg class="w-6 h-6 <?php echo $c['icon']; ?>" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <?php echo $grupo_data['icono']; ?>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight"><?php echo esc_html($grupo_data['grupo']); ?></h2>
                    <div class="w-16 h-1 <?php echo $c['dot']; ?> rounded-full mt-1"></div>
                </div>
            </div>

            <!-- Cards grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php foreach ($grupo_data['items'] as $cat): ?>
                <div class="bg-white rounded-2xl shadow-sm border-2 border-gray-100 <?php echo $c['hover']; ?> hover:shadow-lg transition-all duration-300 p-6 flex flex-col">
                    <h3 class="font-bold text-gray-900 mb-4 text-base leading-tight flex items-start gap-2">
                        <span class="w-2 h-2 <?php echo $c['dot']; ?> rounded-full mt-1.5 shrink-0"></span>
                        <?php echo esc_html($cat['titulo']); ?>
                    </h3>
                    <ul class="space-y-2.5 flex-1">
                        <?php foreach ($cat['reqs'] as $req):
                            $is_curso = (strpos($req, 'CURSOS') !== false);
                            $is_examen = (strpos($req, 'Examen') !== false);
                        ?>
                        <li class="flex items-start gap-2.5 text-sm <?php echo ($is_curso || $is_examen) ? 'bg-blue-50 border border-blue-100 rounded-lg px-3 py-2' : ''; ?>">
                            <?php if ($is_curso): ?>
                                <svg class="w-4 h-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                <span class="text-blue-700 font-medium"><?php echo esc_html($req); ?></span>
                            <?php elseif ($is_examen): ?>
                                <svg class="w-4 h-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                <span class="text-blue-700 font-medium"><?php echo esc_html($req); ?></span>
                            <?php else: ?>
                                <svg class="w-4 h-4 <?php echo $c['check']; ?> mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-gray-600"><?php echo esc_html($req); ?></span>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Nota informativa de cursos -->
        <div class="bg-gradient-to-r from-alderetes-blue to-blue-700 rounded-3xl p-8 text-white flex flex-col md:flex-row items-center gap-6 shadow-xl">
            <div class="w-16 h-16 bg-white/15 rounded-2xl flex items-center justify-center shrink-0">
                <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="text-center md:text-left">
                <p class="font-bold text-lg mb-1">Cursos de Seguridad Vial</p>
                <p class="text-blue-200 text-sm mb-3">Los cursos obligatorios se realizan de forma online en la plataforma oficial del gobierno nacional.</p>
                <a href="https://curso.seguridadvial.gob.ar" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 bg-white text-alderetes-blue font-bold px-5 py-2.5 rounded-xl hover:bg-blue-50 transition-colors text-sm shadow">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    curso.seguridadvial.gob.ar
                </a>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
