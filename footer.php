<?php
/**
 * Theme footer template.
 *
 * @package TailPress
 */
?>
    </main>
    <?php do_action('tailpress_content_end'); ?>
</div><!-- #content -->

<footer class="bg-gradient-to-b from-gray-900 to-gray-950 text-white">
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Columna 1: Logo y Contacto -->
            <div class="space-y-6">
                <div class="inline-block bg-white rounded-xl p-2 shadow-sm">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/resources/images/logo-municipalidad-alderetes.png"
                        alt="Municipalidad de Alderetes"
                        class="h-20 w-auto object-contain"
                    >
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <p class="text-gray-300 text-sm">Av. San Martín 1234<br>Alderetes, Tucumán, Argentina</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <p class="text-gray-300 text-sm">(0381) 123-4567</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <p class="text-gray-300 text-sm">contacto@municipalidadalderetes.com.ar</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-gray-300 text-sm">Lunes a Viernes<br>8:00 - 14:00 hs</p>
                    </div>
                </div>
            </div>

            <!-- Columna 2: Áreas (1ra mitad) -->
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Áreas del Municipio</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/alumbrado')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Alumbrado Público</a></li>
                    <li><a href="<?php echo esc_url(home_url('/catastro')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Catastro</a></li>
                    <li><a href="<?php echo esc_url(home_url('/deporte')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Deporte</a></li>
                    <li><a href="<?php echo esc_url(home_url('/educacion')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Educación y Cultura</a></li>
                    <li><a href="<?php echo esc_url(home_url('/obras-publicas')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Obras y Servicios Públicos</a></li>
                </ul>
            </div>

            <!-- Columna 3: Áreas (2da mitad) -->
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white opacity-0">.</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/rentas')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Rentas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/salud')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Salud</a></li>
                    <li><a href="<?php echo esc_url(home_url('/seguridad')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Seguridad</a></li>
                    <li><a href="<?php echo esc_url(home_url('/transito')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Tránsito</a></li>
                    <li><a href="<?php echo esc_url(home_url('/tribunal-de-faltas')); ?>" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Tribunal de Faltas</a></li>
                </ul>
            </div>

            <!-- Columna 4: Mapa + Redes -->
            <div>
                <h4 class="font-semibold text-lg mb-6 text-white">Ubicación</h4>
                <div class="rounded-xl overflow-hidden shadow-lg h-48">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14244.123456789!2d-65.1234567!3d-26.8234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDQ5JzI0LjQiUyA2NcKwMDcnMjQuNCJX!5e0!3m2!1ses!2sar!4v1234567890"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Ubicación Municipalidad de Alderetes">
                    </iframe>
                </div>

                <div class="mt-6">
                    <h4 class="font-semibold text-sm mb-3 text-gray-400">Seguinos</h4>
                    <div class="flex gap-3">
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 hover:bg-pink-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 hover:bg-sky-500 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom bar -->
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm text-center md:text-left">
                    &copy; <?php echo date('Y'); ?> Municipalidad de Alderetes. Todos los derechos reservados.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="text-gray-500 hover:text-blue-400 transition-colors">Políticas de Privacidad</a>
                    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="text-gray-500 hover:text-blue-400 transition-colors">Términos y Condiciones</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php do_action('tailpress_site_after'); ?>
<?php wp_footer(); ?>
</body>
</html>
