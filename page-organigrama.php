<?php
/**
 * Template Name: Organigrama
 *
 * @package TailPress
 */

get_header();

$estructura = [
    [
        'secretaria' => 'Secretaría de Gobierno',
        'titular'    => 'Aldo Gabriel Salomón',
        'color'      => 'blue',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Gobierno',
                'titular' => 'Dr. Pablo Saldívar',
                'direcciones' => [
                    ['cargo' => 'Dirección de Despacho',                  'titular' => 'Dra. Jessica Pérez'],
                    ['cargo' => 'Dirección de Relaciones Institucionales', 'titular' => 'Dra. Silvia Moyano'],
                    ['cargo' => 'Dirección de Defensa Civil',              'titular' => 'Adrián Campos'],
                    ['cargo' => 'Dirección de la Función Pública',         'titular' => 'Domingo López'],
                    ['cargo' => 'Dirección de Transporte Público',         'titular' => 'Rodríguez'],
                ],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Cultura y Educación',
        'titular'    => 'Lic. Rosana Sansone',
        'color'      => 'purple',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Integración y Promoción Cultural',      'titular' => 'Prof. José Romano'],
            ['cargo' => 'Dirección de Coordinación e Integración Educativa',  'titular' => 'Lic. David Ponce'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Hacienda',
        'titular'    => 'Luis Romano',
        'color'      => 'green',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Economía y Hacienda',
                'titular' => 'Martín Soro',
                'direcciones' => [
                    ['cargo' => 'Dirección de Administración',            'titular' => 'Ctdor. Franco Casavalle'],
                    ['cargo' => 'Dirección de Compras y Contrataciones',  'titular' => 'César Barrera'],
                    ['cargo' => 'Dirección de Sistemas',                  'titular' => 'Ing. Cecilia Palavecino'],
                    ['cargo' => 'Dirección de Tesorería General',         'titular' => 'C.P.N. Denis Pérez Díaz'],
                ],
            ],
            [
                'cargo'   => 'Subsecretaría de Ingresos Públicos',
                'titular' => '',
                'direcciones' => [],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Obras Públicas',
        'titular'    => 'Patricio Figueroa',
        'color'      => 'orange',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Obras Públicas',
                'titular' => 'Ing. Gustavo Bossini',
                'direcciones' => [
                    ['cargo' => 'Dirección de Obras Públicas',                              'titular' => 'Ing. Federico Díaz'],
                    ['cargo' => 'Dirección de Alumbrado Público',                           'titular' => 'Osvaldo Escobar'],
                    ['cargo' => 'Dirección de Servicios Públicos',                          'titular' => 'Víctor Jaime'],
                    ['cargo' => 'Dirección de Espacios Verdes',                             'titular' => 'Alfredo Sánchez'],
                    ['cargo' => 'Dirección de Cuidados del Ambiente y Gestión de Residuos', 'titular' => 'Arq. Manuel Flores'],
                    ['cargo' => 'Jefatura de Mantenimiento Urbano',                         'titular' => 'Antonio Cardozo'],
                    ['cargo' => 'Jefatura de Saneamiento Ambiental',                        'titular' => 'Raúl Lazarte'],
                    ['cargo' => 'Dirección de Información Catastral y Cartografía',         'titular' => 'Arq. Joaquín García Arenas'],
                    ['cargo' => 'Dirección de Proyectos y Hábitat',                         'titular' => 'Arq. Adrián Serrizuela'],
                ],
            ],
            [
                'cargo'   => 'Unidad Ejecutora Municipal',
                'titular' => 'Ing. Oscar Parrado',
                'direcciones' => [],
            ],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Políticas Sociales',
        'titular'    => 'Dra. Noemí Salomón',
        'color'      => 'pink',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Acción Social',         'titular' => 'José Amado Ale'],
            ['cargo' => 'Dirección de Deportes y Recreación', 'titular' => 'Prof. Hernán Caldas'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Coordinación',
        'titular'    => 'Pablo Caldas',
        'color'      => 'teal',
        'subsecretarias' => [
            [
                'cargo'   => 'Subsecretaría de Información Pública',
                'titular' => 'Juan Mafhoud',
                'direcciones' => [],
            ],
            [
                'cargo'   => 'Subsecretaría de Multimedios y Difusión',
                'titular' => 'Hugo García',
                'direcciones' => [],
            ],
        ],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Desarrollo y Economía Social',        'titular' => 'Ramón Galarce'],
            ['cargo' => 'Dirección de Empleo y Emprendimiento Productivo',  'titular' => 'Marcos Altamiranda'],
        ],
    ],
    [
        'secretaria' => 'Secretaría de Protección Ciudadana',
        'titular'    => 'Julio Romano',
        'color'      => 'red',
        'subsecretarias' => [],
        'direcciones_directas' => [
            ['cargo' => 'Dirección de Prevención del Delito y la Violencia', 'titular' => 'Genaro Soria'],
            ['cargo' => 'Tribunal de Faltas',                                'titular' => 'Dra. María de los Ángeles Luque'],
        ],
    ],
];

$color_map = [
    'blue'   => ['bg' => 'bg-blue-600',   'light' => 'bg-blue-50',   'border' => 'border-blue-200',  'text' => 'text-blue-700',  'dot' => 'bg-blue-400'],
    'purple' => ['bg' => 'bg-purple-600', 'light' => 'bg-purple-50', 'border' => 'border-purple-200','text' => 'text-purple-700','dot' => 'bg-purple-400'],
    'green'  => ['bg' => 'bg-emerald-600','light' => 'bg-emerald-50','border' => 'border-emerald-200','text' => 'text-emerald-700','dot' => 'bg-emerald-400'],
    'orange' => ['bg' => 'bg-orange-500', 'light' => 'bg-orange-50', 'border' => 'border-orange-200','text' => 'text-orange-700','dot' => 'bg-orange-400'],
    'pink'   => ['bg' => 'bg-pink-600',   'light' => 'bg-pink-50',   'border' => 'border-pink-200',  'text' => 'text-pink-700',  'dot' => 'bg-pink-400'],
    'teal'   => ['bg' => 'bg-teal-600',   'light' => 'bg-teal-50',   'border' => 'border-teal-200',  'text' => 'text-teal-700',  'dot' => 'bg-teal-400'],
    'red'    => ['bg' => 'bg-red-600',    'light' => 'bg-red-50',    'border' => 'border-red-200',   'text' => 'text-red-700',   'dot' => 'bg-red-400'],
];
?>

<!-- Hero -->
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
                        <div class="w-3 h-3 rounded-full <?php echo $c['dot']; ?> shrink-0"></div>
                        <div>
                            <p class="font-bold text-gray-900 text-base leading-tight"><?php echo esc_html($sec['secretaria']); ?></p>
                            <?php if (!empty($sec['titular'])): ?>
                                <p class="text-sm text-gray-500 mt-0.5"><?php echo esc_html($sec['titular']); ?></p>
                            <?php else: ?>
                                <p class="text-sm text-gray-300 italic mt-0.5">— Por confirmar —</p>
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
                    <div class="<?php echo $c['light']; ?> <?php echo $c['border']; ?> border rounded-xl p-4">
                        <p class="text-xs font-bold <?php echo $c['text']; ?> uppercase tracking-wide mb-0.5">Subsecretaría</p>
                        <p class="font-bold text-gray-800"><?php echo esc_html($sub['cargo']); ?></p>
                        <?php if (!empty($sub['titular'])): ?>
                            <p class="text-sm text-gray-500"><?php echo esc_html($sub['titular']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($sub['direcciones'])): ?>
                        <div class="mt-3 space-y-2 pl-3 border-l-2 <?php echo $c['border']; ?>">
                            <?php foreach ($sub['direcciones'] as $dir): ?>
                            <div class="flex items-start gap-2">
                                <div class="w-1.5 h-1.5 rounded-full <?php echo $c['dot']; ?> mt-1.5 shrink-0"></div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-700 leading-tight"><?php echo esc_html($dir['cargo']); ?></p>
                                    <?php if (!empty($dir['titular'])): ?>
                                        <p class="text-xs text-gray-400"><?php echo esc_html($dir['titular']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                    <?php if ($has_dir_directas): ?>
                    <div class="space-y-2 pl-3 border-l-2 <?php echo $c['border']; ?>">
                        <?php foreach ($sec['direcciones_directas'] as $dir): ?>
                        <div class="flex items-start gap-2">
                            <div class="w-1.5 h-1.5 rounded-full <?php echo $c['dot']; ?> mt-1.5 shrink-0"></div>
                            <div>
                                <p class="text-sm font-semibold text-gray-700 leading-tight"><?php echo esc_html($dir['cargo']); ?></p>
                                <?php if (!empty($dir['titular'])): ?>
                                    <p class="text-xs text-gray-400"><?php echo esc_html($dir['titular']); ?></p>
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
        <div class="mt-10 bg-gradient-to-r from-gray-800 to-gray-900 rounded-3xl p-8 text-white text-center shadow-xl">
            <svg class="w-10 h-10 mx-auto mb-4 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
            </svg>
            <span class="inline-block bg-white/10 text-white/80 text-xs font-bold px-4 py-1 rounded-full mb-3 uppercase tracking-wider">Poder Legislativo Local</span>
            <h3 class="text-2xl font-black mb-2">Honorable Concejo Deliberante</h3>
            <p class="text-gray-400 max-w-lg mx-auto text-sm leading-relaxed">
                Funciona de manera independiente del Ejecutivo Municipal para sancionar normativas, ordenanzas y políticas públicas en beneficio de la comunidad de Alderetes.
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
