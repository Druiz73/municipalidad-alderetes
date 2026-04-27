<?php
/**
 * Theme header template.
 *
 * @package TailPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-zinc-900 antialiased'); ?>>
<?php do_action('tailpress_site_before'); ?>

<div id="page" class="min-h-screen flex flex-col">

<header class="bg-white shadow-sm sticky top-0 z-50">

    <!-- Top bar -->
    <div class="bg-gradient-to-r from-alderetes-orange via-alderetes-orange to-alderetes-green text-white py-2 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center text-sm">
            <span class="hidden md:block">Municipalidad de Alderetes - Tucumán, Argentina</span>
            <div class="flex items-center gap-4">
                <a href="https://www.facebook.com/MunicipalidaddeAlderetes" target="_blank" rel="noopener noreferrer" class="hover:text-alderetes-gold transition-colors" aria-label="Facebook Municipalidad de Alderetes">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="https://www.instagram.com/municipalidaddealderetes/" target="_blank" rel="noopener noreferrer" class="hover:text-alderetes-gold transition-colors" aria-label="Instagram Municipalidad de Alderetes">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Main header -->
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
                <img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/resources/images/logo-municipalidad-alderetes.png"
                    alt="Municipalidad de Alderetes"
                    class="h-20 w-20 object-contain"
                >
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-1" id="primary-navigation">

                <!-- Institucional -->
                <div class="relative tp-nav-menu-item group">
                    <button class="tp-nav-menu-trigger flex items-center gap-1 px-4 py-2 text-gray-700 hover:text-alderetes-orange font-medium transition-colors rounded-lg hover:bg-alderetes-cream">
                        Institucional
                        <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="tp-nav-menu-content hidden absolute top-full left-0 w-56 z-50" style="padding-top:6px"><div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2">
                        <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-alderetes-orange hover:bg-alderetes-cream transition-colors">Institucional</a>
                        <a href="<?php echo esc_url(home_url('/organigrama')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-alderetes-orange hover:bg-alderetes-cream transition-colors">Organigrama</a>
                    </div></div>
                </div>

                <!-- Trámites -->
                <div class="relative tp-nav-menu-item group">
                    <button class="tp-nav-menu-trigger flex items-center gap-1 px-4 py-2 text-gray-700 hover:text-alderetes-orange font-medium transition-colors rounded-lg hover:bg-alderetes-cream">
                        Trámites
                        <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="tp-nav-menu-content hidden absolute top-full left-0 w-64 z-50" style="padding-top:6px"><div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2">
                        <span class="block px-4 pt-2 pb-1 text-xs font-bold text-gray-400 uppercase tracking-widest">Rentas</span>
                        <a href="<?php echo esc_url(home_url('/tem')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors text-sm">Comercio (T.E.M)</a>
                        <a href="<?php echo esc_url(home_url('/cisi')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors text-sm">Inmueble (C.I.S.I)</a>
                        <a href="<?php echo esc_url(home_url('/cementerio')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors text-sm">Cementerio (C.I.S.C)</a>
                        <div class="border-t border-gray-100 my-2"></div>
                        <span class="block px-4 pt-2 pb-1 text-xs font-bold text-gray-400 uppercase tracking-widest">Tránsito</span>
                        <a href="<?php echo esc_url(home_url('/transito')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors text-sm">Requisitos</a>
                        <a href="<?php echo esc_url(home_url('/turnos-de-transito')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors text-sm">Solicitar Turno</a>
                        <div class="border-t border-gray-100 my-2"></div>
                        <a href="<?php echo esc_url(home_url('/tribunal-de-faltas')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Tribunal de Faltas</a>
                        <a href="<?php echo esc_url(home_url('/catastro')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Catastro</a>
                    </div></div>
                </div>

                <!-- Áreas -->
                <div class="relative tp-nav-menu-item group">
                    <button class="tp-nav-menu-trigger flex items-center gap-1 px-4 py-2 text-gray-700 hover:text-alderetes-orange font-medium transition-colors rounded-lg hover:bg-alderetes-cream">
                        Áreas
                        <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="tp-nav-menu-content hidden absolute top-full left-0 w-64 z-50" style="padding-top:6px"><div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2">
                        <a href="<?php echo esc_url(home_url('/obras-publicas')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Obras Públicas</a>
                        <a href="<?php echo esc_url(home_url('/salud')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Salud</a>
                        <a href="<?php echo esc_url(home_url('/educacion')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Educación</a>
                        <a href="<?php echo esc_url(home_url('/cultura')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Cultura</a>
                        <a href="<?php echo esc_url(home_url('/deporte')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Deporte</a>
                        <a href="<?php echo esc_url(home_url('/punto-digital')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Punto Digital</a>
                        <a href="<?php echo esc_url(home_url('/seguridad')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Seguridad</a>
                        <a href="<?php echo esc_url(home_url('/alumbrado')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Alumbrado Público</a>
                        <a href="<?php echo esc_url(home_url('/politicas-sociales')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 hover:bg-blue-50 transition-colors">Políticas Sociales</a>
                    </div></div>
                </div>

                <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="px-4 py-2 text-gray-700 hover:text-alderetes-orange font-medium transition-colors rounded-lg hover:bg-alderetes-cream block">Noticias</a>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="px-4 py-2 text-gray-700 hover:text-alderetes-orange font-medium transition-colors rounded-lg hover:bg-alderetes-cream block">Contacto</a>
            </nav>

            <!-- Search + Mobile Toggle -->
            <div class="flex items-center gap-3">
                <button id="search-toggle" class="p-2.5 text-gray-600 hover:text-alderetes-orange hover:bg-alderetes-cream rounded-lg transition-colors" aria-label="Buscar">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                <button id="mobile-menu-toggle" class="lg:hidden p-2.5 text-gray-600 hover:text-alderetes-orange hover:bg-alderetes-cream rounded-lg transition-colors" aria-label="Menú">
                    <svg id="icon-menu" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Search Bar -->
        <div id="search-bar" class="hidden pb-4">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="relative">
                    <input
                        type="search"
                        name="s"
                        value="<?php echo esc_attr( get_search_query() ); ?>"
                        placeholder="Buscar trámites, noticias, información..."
                        class="w-full px-4 py-3 pl-12 bg-alderetes-cream border border-[#e6dcc7] rounded-xl focus:outline-none focus:ring-2 focus:ring-alderetes-orange focus:border-transparent"
                        autocomplete="off"
                    >
                    <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 p-1 text-gray-400 hover:text-alderetes-orange transition-colors" aria-label="Buscar">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 py-4 space-y-2">

            <!-- Institucional Mobile -->
            <div>
                <button class="mobile-submenu-toggle flex items-center justify-between w-full px-4 py-3 text-gray-700 font-medium rounded-lg hover:bg-blue-50">
                    Institucional
                    <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="mobile-submenu hidden ml-4 mt-1 space-y-1">
                    <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Institucional</a>
                    <a href="<?php echo esc_url(home_url('/organigrama')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Organigrama</a>
                </div>
            </div>

            <!-- Trámites Mobile -->
            <div>
                <button class="mobile-submenu-toggle flex items-center justify-between w-full px-4 py-3 text-gray-700 font-medium rounded-lg hover:bg-blue-50">
                    Trámites
                    <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="mobile-submenu hidden ml-4 mt-1 space-y-1">
                    <span class="block px-4 pt-2 pb-1 text-xs font-bold text-gray-400 uppercase tracking-widest">Rentas</span>
                    <a href="<?php echo esc_url(home_url('/tem')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 text-sm">Comercio (T.E.M)</a>
                    <a href="<?php echo esc_url(home_url('/cisi')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 text-sm">Inmueble (C.I.S.I)</a>
                    <a href="<?php echo esc_url(home_url('/cementerio')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 text-sm">Cementerio (C.I.S.C)</a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <span class="block px-4 pt-2 pb-1 text-xs font-bold text-gray-400 uppercase tracking-widest">Tránsito</span>
                    <a href="<?php echo esc_url(home_url('/transito')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 text-sm">Requisitos</a>
                    <a href="<?php echo esc_url(home_url('/turnos-de-transito')); ?>" class="block pl-7 pr-4 py-2 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50 text-sm">Solicitar Turno</a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <a href="<?php echo esc_url(home_url('/tribunal-de-faltas')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Tribunal de Faltas</a>
                    <a href="<?php echo esc_url(home_url('/catastro')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Catastro</a>
                </div>
            </div>

            <!-- Áreas Mobile -->
            <div>
                <button class="mobile-submenu-toggle flex items-center justify-between w-full px-4 py-3 text-gray-700 font-medium rounded-lg hover:bg-blue-50">
                    Áreas
                    <svg class="w-4 h-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="mobile-submenu hidden ml-4 mt-1 space-y-1">
                    <a href="<?php echo esc_url(home_url('/obras-publicas')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Obras Públicas</a>
                    <a href="<?php echo esc_url(home_url('/salud')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Salud</a>
                    <a href="<?php echo esc_url(home_url('/educacion')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Educación</a>
                    <a href="<?php echo esc_url(home_url('/cultura')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Cultura</a>
                    <a href="<?php echo esc_url(home_url('/deporte')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Deporte</a>
                    <a href="<?php echo esc_url(home_url('/punto-digital')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Punto Digital</a>
                    <a href="<?php echo esc_url(home_url('/seguridad')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Seguridad</a>
                    <a href="<?php echo esc_url(home_url('/alumbrado')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Alumbrado Público</a>
                    <a href="<?php echo esc_url(home_url('/politicas-sociales')); ?>" class="block px-4 py-2.5 text-gray-600 hover:text-blue-600 rounded-lg hover:bg-blue-50">Políticas Sociales</a>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="block px-4 py-3 text-gray-700 font-medium rounded-lg hover:bg-blue-50">Noticias</a>
            <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="block px-4 py-3 text-gray-700 font-medium rounded-lg hover:bg-blue-50">Contacto</a>
        </nav>
    </div>

    <script>
    (function () {
        // --- Mobile menu toggle ---
        var mobileToggle = document.getElementById('mobile-menu-toggle');
        var mobileMenu   = document.getElementById('mobile-menu');
        var iconMenu     = document.getElementById('icon-menu');
        var iconClose    = document.getElementById('icon-close');
        var searchToggle = document.getElementById('search-toggle');
        var searchBar    = document.getElementById('search-bar');

        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function () {
                var isOpen = !mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden', isOpen);
                iconMenu.classList.toggle('hidden', !isOpen);
                iconClose.classList.toggle('hidden', isOpen);
            });
        }

        if (searchToggle && searchBar) {
            searchToggle.addEventListener('click', function () {
                searchBar.classList.toggle('hidden');
            });
        }

        document.querySelectorAll('.mobile-submenu-toggle').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var submenu = btn.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle('hidden');
                    var icon = btn.querySelector('svg');
                    if (icon) icon.classList.toggle('rotate-180');
                }
            });
        });

        // --- Desktop dropdown: hover con delay para no perder el foco ---
        document.querySelectorAll('.tp-nav-menu-item').forEach(function (item) {
            var dropdown = item.querySelector('.tp-nav-menu-content');
            var closeTimer = null;

            function openMenu() {
                clearTimeout(closeTimer);
                dropdown.classList.remove('hidden');
            }

            function scheduleClose() {
                closeTimer = setTimeout(function () {
                    dropdown.classList.add('hidden');
                }, 150);
            }

            item.addEventListener('mouseenter', openMenu);
            item.addEventListener('mouseleave', scheduleClose);
            dropdown.addEventListener('mouseenter', openMenu);
            dropdown.addEventListener('mouseleave', scheduleClose);
        });
    })();
    </script>
</header>

<div id="content" class="site-content grow">
    <?php do_action('tailpress_content_start'); ?>
    <main>
