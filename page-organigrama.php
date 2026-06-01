<?php
/**
 * Template Name: Organigrama
 *
 * @package TailPress
 */

get_header();

if (!function_exists('alderetes_funcionario_image_url')) {
    function alderetes_funcionario_image_url($path) {
        $segments = array_map('rawurlencode', explode('/', $path));
        return get_template_directory_uri() . '/' . implode('/', $segments);
    }
}

$estructura = [
    [
        'secretaria' => 'Secretaría de Gobierno',
        'titular'    => 'Aldo Gabriel Salomón',
        'imagen'     => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/Secretario de Gobierno - ALDO GABRIEL SALOMÓN.jpg',
        'color'      => 'blue',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Gobierno',
                'titular' => 'Dr. Pablo Saldívar',
                'imagen'  => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Subsecretario de Gobierno - Dr. Pablo Saldívar.jpg',
                'direcciones' => [
                    ['cargo' => 'Dirección de Despacho',                  'titular' => 'Dra. Jessica Pérez', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Despacho/Dra. Jessica Pérez.jpg'],
                    ['cargo' => 'Dirección de Relaciones Institucionales', 'titular' => 'Dra. Silvia Moyano', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Relaciones Institucionales/Dra. Silvia Moyano.jpg'],
                    ['cargo' => 'Dirección de Defensa Civil',              'titular' => 'Adrián Campos',      'imagen' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de Defensa Civil/Adrián Campos.jpg'],
                    ['cargo' => 'Dirección de la Función Pública',         'titular' => 'Domingo López',      'imagen' => 'resources/images/funcionarios/SECRETARIA DE GOBIERNO/SUBSECRETARIA DE GOBIERNO/Dirección de la Función Pública/Domingo López.jpg'],
                ],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Educación',
        'titular'    => 'Lic. Rosana Sansone',
        'imagen'     => 'resources/images/funcionarios/SECRETARIA DE EDUCACIÓN/Secr. de Educación - Lic. Rosana Sansone.jpg',
        'color'      => 'purple',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Integración y Promoción Cultural',     'titular' => 'Prof. José Romano', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE EDUCACIÓN/Dirección de Integración y Promoción Cultural/Prof. José Romano.jpg'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Hacienda',
        'titular'    => 'Luis Romano',
        'imagen'     => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Secretario de Hacienda - Luis Romano.jpg',
        'color'      => 'green',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Economía y Hacienda',
                'titular' => '',
                'direcciones' => [
                    ['cargo' => 'Dirección de Compras y Contrataciones', 'titular' => 'César Barrera',          'imagen' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Hacienda/Dirección de Compras y Contrataciones/César Barrera.jpg'],
                    ['cargo' => 'Dirección de Sistemas',                 'titular' => 'Ing. Cecilia Palavecino', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Hacienda/Dirección de Sistemas/Ing. Cecilia Palavecino.jpg'],
                ],
            ],
            [
                'cargo'   => 'Subsecretaría de Ingresos Públicos',
                'titular' => 'Dr. Sergio Altamiranda',
                'imagen'  => 'resources/images/funcionarios/SECRETARIA DE HACIENDA/Subsecretaría de Ingresos Públicos/Dr. Sergio Altamiranda.jpg',
                'direcciones' => [],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Obras Públicas',
        'titular'    => '',
        'color'      => 'orange',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Obras Públicas',
                'titular' => '',
                'direcciones' => [
                    ['cargo' => 'Dirección de Alumbrado Público',    'titular' => 'Osvaldo Escobar',  'imagen' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Dirección de Alumbrado Público/Osvaldo Escobar.jpg'],
                    ['cargo' => 'Dirección de Espacios Verdes',      'titular' => 'Alfredo Sánchez',  'imagen' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Dirección de Espacios Verde/Alfredo Sanchez.jpg'],
                    ['cargo' => 'Jefatura de Saneamiento Ambiental', 'titular' => 'Raúl Lazarte',     'imagen' => 'resources/images/funcionarios/SECRETARÍA DE OBRAS PÚBLICAS/SUBSECRETARÍA DE OBRAS PÚBLICAS/Jefatura de Saneamiento Ambiental/Raúl Lazarte.jpg'],
                ],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Políticas Sociales',
        'titular'    => '',
        'color'      => 'pink',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Acción Social',         'titular' => 'José Amado Ale',     'imagen' => 'resources/images/funcionarios/SECRETARIA DE POLÍTICAS SOCIALES/Dirección de Acción Social/José Amado Ale.jpg'],
            ['cargo' => 'Dirección de Deportes y Recreación', 'titular' => 'Prof. Hernán Caldas', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE POLÍTICAS SOCIALES/Dirección de Deportes y Recreación/Prof. Hernán Caldas.jpg'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Coordinación',
        'titular'    => 'Pablo Caldas',
        'imagen'     => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Coord. General - Pablo Caldas.jpg',
        'color'      => 'teal',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Información Pública',
                'titular' => 'Juan Mafhoud',
                'imagen'  => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Subsecretaría de Información Pública/Juan Mafhoud.jpg',
                'direcciones' => [],
            ],
            [
                'cargo'   => 'Subsecretaría de Multimedios y Difusión',
                'titular' => 'Hugo García',
                'imagen'  => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Subsecretaría de Multimedios y Difusión/Hugo García.jpg',
                'direcciones' => [],
            ],
        ],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Empleo', 'titular' => 'Marcos Altamiranda', 'imagen' => 'resources/images/funcionarios/SECRETARÍA DE COORDINACIÓN/Dirección de Empleo/Marcos Altamiranda.jpg'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Protección Ciudadana',
        'titular'    => '',
        'color'      => 'red',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Tribunal de Faltas', 'titular' => 'Dra. María de Los Ángeles Luque', 'imagen' => 'resources/images/funcionarios/SECRETARIA DE PROTECCIÓN CIUDADANA/Tribunal de Faltas/Dra. María de Los Ángeles Luque.jpg'],
        ],
    ],
];

$color_map = [
    'blue'   => ['hex' => '#60a5fa'],
    'purple' => ['hex' => '#c084fc'],
    'green'  => ['hex' => '#34d399'],
    'orange' => ['hex' => '#fb923c'],
    'pink'   => ['hex' => '#f472b6'],
    'teal'   => ['hex' => '#2dd4bf'],
    'red'    => ['hex' => '#f87171'],
];
?>

<!-- Hero -->
<section class="relative py-20 bg-gradient-to-br from-alderetes-orange via-alderetes-blue to-alderetes-green overflow-hidden text-white">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-4 backdrop-blur-sm">Período 2023 – 2027</span>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Organigrama Municipal</h1>
        <div class="w-20 h-1 bg-alderetes-orange mx-auto rounded-full mb-4"></div>
        <p class="text-white/70 max-w-xl mx-auto text-lg">Estructura de gobierno de la Municipalidad de Alderetes bajo la gestión de la Intendenta Graciela Gutiérrez.</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">

        <!-- Intendenta -->
        <div class="flex justify-center mb-10">
            <div class="bg-white rounded-3xl shadow-xl border-2 border-alderetes-orange p-8 text-center w-full max-w-sm relative">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-alderetes-orange text-white text-xs font-bold px-4 py-1 rounded-full shadow">
                    Poder Ejecutivo
                </div>
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-alderetes-orange to-orange-400 flex items-center justify-center shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="inline-block bg-alderetes-orange/10 text-alderetes-orange text-xs font-bold px-3 py-1 rounded-full mb-2 uppercase tracking-wider">Intendenta</span>
                <h2 class="text-2xl font-black text-gray-900">Graciela Gutiérrez</h2>
                <p class="text-gray-400 text-sm mt-1">Período 2023 – 2027</p>
            </div>
        </div>

        <!-- Conector -->
        <div class="flex justify-center mb-8">
            <div class="w-0.5 h-8 bg-gray-300"></div>
        </div>

        <!-- Secretarías -->
        <div class="space-y-4">
            <?php foreach ($estructura as $i => $sec):
                $c = $color_map[$sec['color']];
                $has_subsec = !empty($sec['subsecretarias']);
                $has_dir_directas = !empty($sec['direcciones_directas']);
                $id = 'sec-' . $i;
            ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <!-- Header secretaría -->
                <button onclick="toggleSec('<?php echo $id; ?>')"
                        class="w-full flex items-center justify-between gap-4 p-5 text-left hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <?php if (!empty($sec['imagen'])): ?>
                            <img src="<?php echo esc_url(alderetes_funcionario_image_url($sec['imagen'])); ?>"
                                 alt="<?php echo esc_attr($sec['titular']); ?>"
                                 class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md shrink-0">
                        <?php else: ?>
                            <div class="w-20 h-20 rounded-full shrink-0 flex items-center justify-center bg-gray-50 border border-gray-100">
                                <span class="w-3 h-3 rounded-full" style="background-color:<?php echo esc_attr($c['hex']); ?>"></span>
                            </div>
                        <?php endif; ?>
                        <div>
                            <p class="font-bold text-gray-900 text-base leading-tight"><?php echo esc_html($sec['secretaria']); ?></p>
                            <?php if (!empty($sec['titular'])): ?>
                                <p class="text-sm text-gray-500 mt-0.5"><?php echo esc_html($sec['titular']); ?></p>
                            <?php else: ?>
                                <p class="text-sm text-gray-300 italic mt-0.5">Área municipal</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <svg id="<?php echo $id; ?>-icon" class="w-5 h-5 text-gray-400 shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Contenido expandible -->
                <div id="<?php echo $id; ?>" class="hidden border-t border-gray-100 px-5 pb-5 pt-4 space-y-4">

                    <?php foreach ($sec['subsecretarias'] as $sub): ?>
                    <div class="rounded-xl border border-gray-100 bg-white p-4 shadow-sm" style="border-left:4px solid <?php echo esc_attr($c['hex']); ?>;">
                        <div class="flex items-center gap-4">
                            <?php if (!empty($sub['imagen'])): ?>
                                <img src="<?php echo esc_url(alderetes_funcionario_image_url($sub['imagen'])); ?>"
                                     alt="<?php echo esc_attr($sub['titular']); ?>"
                                     class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md shrink-0">
                            <?php endif; ?>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide mb-1" style="color:<?php echo esc_attr($c['hex']); ?>;">Subsecretaría</p>
                                <p class="font-bold text-gray-900 leading-tight"><?php echo esc_html($sub['cargo']); ?></p>
                                <?php if (!empty($sub['titular'])): ?>
                                    <p class="text-sm text-gray-500 mt-0.5"><?php echo esc_html($sub['titular']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!empty($sub['direcciones'])): ?>
                        <div class="mt-4 space-y-3 pl-4 border-l border-gray-200">
                            <?php foreach ($sub['direcciones'] as $dir): ?>
                            <div class="flex items-center gap-4 rounded-lg bg-gray-50/80 p-3">
                                <?php if (!empty($dir['imagen'])): ?>
                                    <img src="<?php echo esc_url(alderetes_funcionario_image_url($dir['imagen'])); ?>"
                                         alt="<?php echo esc_attr($dir['titular']); ?>"
                                         class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md shrink-0">
                                <?php else: ?>
                                    <div class="w-20 h-20 rounded-full shrink-0 flex items-center justify-center bg-white border border-gray-100">
                                        <span class="w-2 h-2 rounded-full" style="background-color:<?php echo esc_attr($c['hex']); ?>"></span>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wide mb-1" style="color:<?php echo esc_attr($c['hex']); ?>;">Dirección</p>
                                    <p class="text-sm font-semibold text-gray-800 leading-tight"><?php echo esc_html($dir['cargo']); ?></p>
                                    <?php if (!empty($dir['titular'])): ?>
                                        <p class="text-sm text-gray-500 mt-0.5"><?php echo esc_html($dir['titular']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                    <?php if ($has_dir_directas): ?>
                    <div class="space-y-3">
                        <?php foreach ($sec['direcciones_directas'] as $dir): ?>
                        <div class="flex items-center gap-4 rounded-xl border border-gray-100 bg-white p-4 shadow-sm" style="border-left:4px solid <?php echo esc_attr($c['hex']); ?>;">
                            <?php if (!empty($dir['imagen'])): ?>
                                <img src="<?php echo esc_url(alderetes_funcionario_image_url($dir['imagen'])); ?>"
                                     alt="<?php echo esc_attr($dir['titular']); ?>"
                                     class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md shrink-0">
                            <?php else: ?>
                                <div class="w-20 h-20 rounded-full shrink-0 flex items-center justify-center bg-gray-50 border border-gray-100">
                                    <span class="w-2 h-2 rounded-full" style="background-color:<?php echo esc_attr($c['hex']); ?>"></span>
                                </div>
                            <?php endif; ?>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide mb-1" style="color:<?php echo esc_attr($c['hex']); ?>;">Dirección</p>
                                <p class="text-sm font-semibold text-gray-800 leading-tight"><?php echo esc_html($dir['cargo']); ?></p>
                                <?php if (!empty($dir['titular'])): ?>
                                    <p class="text-sm text-gray-500 mt-0.5"><?php echo esc_html($dir['titular']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Concejo Deliberante -->
        <div class="mt-10 bg-gradient-to-r from-[#6f1d2b] to-[#8d2337] rounded-3xl p-8 text-white text-center shadow-xl">
            <svg class="w-10 h-10 mx-auto mb-4 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
            </svg>
            <span class="inline-block bg-white/10 text-white/80 text-xs font-bold px-4 py-1 rounded-full mb-3 uppercase tracking-wider">Poder Legislativo Local</span>
            <h3 class="text-2xl font-black mb-2">Honorable Concejo Deliberante</h3>
            <p class="text-gray-400 max-w-lg mx-auto text-sm leading-relaxed">
                El HCD es el órgano legislativo del Municipio, encargado de representar a la comunidad y de dictar las normas que regulan la vida local.
            </p>
        </div>

        <p class="text-center text-xs text-gray-400 mt-8 italic">
            * La información del organigrama se actualiza conforme a los cambios oficiales en la estructura municipal.
        </p>

    </div>
</section>

<script>
function toggleSec(id) {
    var content = document.getElementById(id);
    var icon    = document.getElementById(id + '-icon');
    var hidden  = content.classList.toggle('hidden');
    icon.style.transform = hidden ? '' : 'rotate(180deg)';
}
</script>

<?php get_footer(); ?>
