<?php
/**
 * Template Name: Trámites - Tránsito
 *
 * @package TailPress
 */

get_header();

$hero_image_url = get_template_directory_uri() . '/resources/images/direccion-transito.jpeg';
$area_title     = 'Tránsito';
$area_tagline   = 'Requisitos para licencias de conducir: renovaciones, ampliaciones y permisos.';

$categorias = [
    [
        "grupo"  => "Renovaciones Profesionales",
        "color"  => "orange",
        "icono"  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
        "items"  => [
            [
                "titulo" => "Renovación Categoría \"C1-C2\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"C\".",
                    "* Casilla de correo obligatoria.",
                ],
            ],
            [
                "titulo" => "Renovación Categoría \"D1-D2-D3\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"D\".",
                    "Certificado Nacional de Antecedentes Penales clase \"D\".",
                    "* Casilla de correo obligatoria.",
                ],
            ],
            [
                "titulo" => "Renovación Categoría \"E2\"",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Informe psicológico clase \"E\".",
                    "* Casilla de correo obligatoria.",
                ],
            ],
            [
                "titulo" => "Renovaciones Profesionales – Interjurisdiccional (Nacional)",
                "reqs"   => [
                    "Sólo impresión: E1 - D2 - D3 - C3.",
                    "Fotocopia de DNI.",
                    "Libre deuda.",
                    "Certificado cargas generales o cargas peligrosas.",
                    "Psicofísico impreso.",
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
                    "* Mayor de 21 años.",
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
                    "* Mayor de 21 años.",
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
                    "* Mayor de 21 años.",
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
                    "* Correo electrónico.",
                ],
            ],
            [
                "titulo" => "Renovación Mayores de 65 Años – Particular",
                "reqs"   => [
                    "Fotocopia de DNI y original a la vista.",
                    "Libre deuda Municipal (llevar cédula de identificación).",
                    "Análisis: Glucemia, Colesterol y Triglicéridos.",
                    "Mayores de 65 años: electrocardiograma más informe.",
                    "* Correo electrónico.",
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
                    "* Saber leer y escribir.",
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
                    "* Saber leer y escribir.",
                    "CURSOS: curso.seguridadvial.gob.ar (Auto, moto, género y estrella amarilla).",
                    "Examen teórico y práctico presenciales (con el vehículo correspondiente a la categoría).",
                ],
            ],
        ],
    ],
];

$color_map = [
    "orange" => [
        "badge"   => "bg-blue-100 text-alderetes-blue",
        "icon"    => "text-alderetes-blue",
        "border"  => "border-alderetes-blue",
        "hover"   => "hover:border-alderetes-blue",
        "dot"     => "bg-alderetes-blue",
        "check"   => "text-alderetes-blue",
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
        "badge"   => "bg-blue-100 text-alderetes-blue",
        "icon"    => "text-alderetes-blue",
        "border"  => "border-alderetes-blue",
        "hover"   => "hover:border-alderetes-blue",
        "dot"     => "bg-alderetes-blue",
        "check"   => "text-alderetes-blue",
    ],
];
?>

<?php get_template_part( 'template-parts/area-hero', null, [
    'cover_image_url' => $hero_image_url,
    'area_title'      => $area_title,
    'area_tagline'    => $area_tagline,
    'area_color'      => 'bg-[#0055a4]',
    'height_classes'  => 'h-[420px] md:h-[520px]',
    'cover_classes'   => 'bg-right-top md:bg-top',
] ); ?>

<!-- Duplicado - destacado arriba -->
<div class="bg-gray-900 py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col sm:flex-row items-center gap-4 bg-white/5 border border-white/10 rounded-2xl px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#0055a4]/20 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#0055a4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    <?php
                    $normal_reqs = [];
                    $featured_reqs = [];
                    foreach ($cat['reqs'] as $req) {
                        if (strpos($req, 'CURSOS') !== false || strpos($req, 'Examen') !== false) {
                            $featured_reqs[] = $req;
                        } else {
                            $normal_reqs[] = $req;
                        }
                    }
                    ?>
                    <ul class="space-y-2.5 flex-1">
                        <?php foreach ($normal_reqs as $req):
                            $display_req = (strpos($req, '*') === 0) ? ltrim($req, '* ') : $req;
                        ?>
                        <li class="flex items-start gap-2.5 text-sm">
                            <svg class="w-4 h-4 <?php echo $c['check']; ?> mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-gray-600"><?php echo esc_html($display_req); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (!empty($featured_reqs)) : ?>
                    <div class="mt-4 space-y-3">
                        <?php foreach ($featured_reqs as $req):
                            $is_curso = (strpos($req, 'CURSOS') !== false);
                            $display_req = (strpos($req, '*') === 0) ? ltrim($req, '* ') : $req;
                        ?>
                        <div class="flex items-start gap-2.5 text-sm bg-blue-50 border border-blue-100 rounded-lg px-3 py-2">
                            <?php if ($is_curso): ?>
                                <svg class="w-4 h-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            <?php else: ?>
                                <svg class="w-4 h-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            <?php endif; ?>
                            <span class="text-blue-700 font-medium"><?php echo esc_html($display_req); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
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
