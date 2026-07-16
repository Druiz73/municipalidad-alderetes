<?php
/**
 * Template Name: Institucional
 *
 * @package TailPress
 */

get_header();
$timeline = array_pad( tp_content_rows( 'timeline' ), 6, ['', '', ''] );
?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-alderetes-orange via-alderetes-blue to-alderetes-green overflow-hidden text-white">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo esc_html( tp_content( 'hero_title' ) ); ?></h1>
        <div class="w-24 h-1 bg-alderetes-orange mx-auto rounded-full"></div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="prose prose-lg max-w-none text-gray-700">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-alderetes-orange pl-4 uppercase"><?php echo esc_html( tp_content( 'intro_heading' ) ); ?></h2>
            
            <p class="mb-6 leading-relaxed">
                <?php echo esc_html( tp_content( 'intro_1' ) ); ?>
            </p>

            <div class="bg-alderetes-cream p-8 rounded-2xl border border-[#eadfcf] my-10">
                <h3 class="text-xl font-bold text-alderetes-green mb-4"><?php echo esc_html( tp_content( 'mission_heading' ) ); ?></h3>
                <p><?php echo esc_html( tp_content( 'mission_text' ) ); ?></p>
            </div>

            <p class="mb-6 leading-relaxed">
                <?php echo esc_html( tp_content( 'intro_2' ) ); ?>
            </p>
        </div>
    </div>
</section>

<!-- Historia de Alderetes -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
    <div class="max-w-5xl mx-auto px-4">

        <!-- Encabezado de sección -->
        <div class="text-center mb-16">
            <span class="inline-block text-alderetes-orange text-sm font-semibold tracking-widest uppercase mb-3"><?php echo esc_html( tp_content( 'history_badge' ) ); ?></span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html( tp_content( 'history_heading' ) ); ?></h2>
            <div class="w-20 h-1 bg-alderetes-orange mx-auto rounded-full mb-6"></div>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                <?php echo esc_html( tp_content( 'history_intro' ) ); ?>
            </p>
        </div>

        <!-- Línea de tiempo -->
        <div class="relative">
            <!-- Línea vertical central -->
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-alderetes-blue via-alderetes-orange to-alderetes-blue transform -translate-x-1/2"></div>

            <!-- Hito 1: Siglo XVIII -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 mb-16 group">
                <div class="md:w-1/2 md:pr-16 md:text-right order-2 md:order-1">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                        <span class="inline-block bg-alderetes-blue/10 text-alderetes-blue text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[0][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[0][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[0][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-blue flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-3 hidden md:block"></div>
            </div>

            <!-- Hito 2: Mediados Siglo XIX -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 mb-16 group">
                <div class="md:w-1/2 md:pr-16 order-2 md:order-1 hidden md:block"></div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-orange flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-2 md:order-3">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                        <span class="inline-block bg-alderetes-orange/10 text-alderetes-orange text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[1][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[1][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[1][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Hito 3: Comienzos Siglo XX -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 mb-16 group">
                <div class="md:w-1/2 md:pr-16 md:text-right order-2 md:order-1">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                        <span class="inline-block bg-alderetes-blue/10 text-alderetes-blue text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[2][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[2][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[2][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-blue flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-3 hidden md:block"></div>
            </div>

            <!-- Hito 4: Segunda mitad Siglo XX -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 mb-16 group">
                <div class="md:w-1/2 md:pr-16 order-2 md:order-1 hidden md:block"></div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-orange flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-2 md:order-3">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                        <span class="inline-block bg-alderetes-orange/10 text-alderetes-orange text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[3][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[3][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[3][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Hito 5: 1980s - Municipio -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 mb-16 group">
                <div class="md:w-1/2 md:pr-16 md:text-right order-2 md:order-1">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                        <span class="inline-block bg-alderetes-blue/10 text-alderetes-blue text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[4][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[4][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[4][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-blue flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-3 hidden md:block"></div>
            </div>

            <!-- Hito 6: Hoy -->
            <div class="relative flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-0 group">
                <div class="md:w-1/2 md:pr-16 order-2 md:order-1 hidden md:block"></div>
                <!-- Ícono central -->
                <div class="relative z-10 flex-shrink-0 order-1 md:order-2">
                    <div class="w-14 h-14 rounded-full bg-alderetes-orange flex items-center justify-center shadow-lg ring-4 ring-white group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-16 order-2 md:order-3">
                    <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100 border-l-4 border-l-alderetes-orange">
                        <span class="inline-block bg-alderetes-orange/10 text-alderetes-orange text-xs font-bold px-3 py-1 rounded-full mb-3 tracking-wide"><?php echo esc_html( $timeline[5][0] ?? '' ); ?></span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html( $timeline[5][1] ?? '' ); ?></h3>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            <?php echo wp_kses_post( $timeline[5][2] ?? '' ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dato destacado -->
        <div class="mt-20 bg-gradient-to-br from-alderetes-blue to-blue-900 rounded-3xl p-10 text-white text-center shadow-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto mb-4 text-alderetes-orange" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <p class="text-alderetes-orange font-semibold text-sm tracking-widest uppercase mb-2"><?php echo esc_html( tp_content( 'location_label' ) ); ?></p>
            <h3 class="text-2xl md:text-3xl font-bold mb-3"><?php echo esc_html( tp_content( 'location_heading' ) ); ?></h3>
            <p class="text-blue-200 max-w-lg mx-auto"><?php echo wp_kses_post( tp_content( 'location_text' ) ); ?></p>
        </div>

    </div>
</section>

<?php get_footer(); ?>
