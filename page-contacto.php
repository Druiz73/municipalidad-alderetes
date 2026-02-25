<?php
/**
 * Template Name: Contacto
 *
 * @package TailPress
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-white/20 text-white text-sm font-medium rounded-full mb-6 backdrop-blur-sm">
            Estamos para ayudarte
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Contacto</h1>
        <p class="text-xl text-white/80 max-w-2xl mx-auto">
            Comunicate con nosotros para realizar consultas, sugerencias o cualquier inquietud
        </p>
    </div>
</section>

<!-- Contenido -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Información de contacto -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Información de Contacto</h2>
                    <p class="text-gray-600">Estamos a tu disposición para atender tus consultas y brindarte la mejor atención.</p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-3 bg-blue-100 rounded-xl flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Dirección</h3>
                            <p class="text-gray-600 text-sm mt-1">Av. San Martín 1234<br>Alderetes, Tucumán, Argentina</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-3 bg-green-100 rounded-xl flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Teléfono</h3>
                            <p class="text-gray-600 text-sm mt-1">(0381) 123-4567</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-3 bg-purple-100 rounded-xl flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Email</h3>
                            <p class="text-gray-600 text-sm mt-1">contacto@alderetes.gob.ar</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-3 bg-amber-100 rounded-xl flex-shrink-0">
                            <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Horario de Atención</h3>
                            <p class="text-gray-600 text-sm mt-1">Lunes a Viernes<br>8:00 - 14:00 hs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">

                    <!-- Estado: enviado -->
                    <div id="form-success" class="hidden text-center py-12">
                        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">¡Consulta enviada!</h3>
                        <p class="text-gray-600 mb-6">Gracias por comunicarte. Te responderemos a la brevedad.</p>
                        <button onclick="resetForm()" class="px-6 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                            Enviar otra consulta
                        </button>
                    </div>

                    <!-- Formulario -->
                    <div id="form-container">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Envianos tu consulta</h2>
                        <form id="contacto-form" class="space-y-6" novalidate>
                            <?php wp_nonce_field('contacto_form', 'contacto_nonce'); ?>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                                        Nombre <span class="text-red-500">*</span>
                                    </label>
                                    <input id="nombre" name="nombre" type="text" required placeholder="Tu nombre"
                                        class="w-full h-12 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                </div>
                                <div class="space-y-2">
                                    <label for="apellido" class="block text-sm font-medium text-gray-700">
                                        Apellido <span class="text-red-500">*</span>
                                    </label>
                                    <input id="apellido" name="apellido" type="text" required placeholder="Tu apellido"
                                        class="w-full h-12 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="telefono" class="block text-sm font-medium text-gray-700">
                                        Teléfono <span class="text-red-500">*</span>
                                    </label>
                                    <input id="telefono" name="telefono" type="tel" required placeholder="Tu teléfono"
                                        class="w-full h-12 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                </div>
                                <div class="space-y-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email <span class="text-gray-400 font-normal">(opcional)</span>
                                    </label>
                                    <input id="email" name="email" type="email" placeholder="tu@email.com"
                                        class="w-full h-12 px-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="consulta" class="block text-sm font-medium text-gray-700">
                                    Consulta <span class="text-red-500">*</span>
                                </label>
                                <textarea id="consulta" name="consulta" required rows="5" placeholder="Escribí tu consulta, sugerencia o inquietud..."
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none"></textarea>
                            </div>

                            <button type="submit" id="submit-btn"
                                class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                Enviar consulta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="mt-16 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-900">Ubicación</h2>
                <p class="text-gray-600 text-sm mt-1">Encontranos en el centro de Alderetes</p>
            </div>
            <div class="h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14244.123456789!2d-65.1234567!3d-26.8234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjbCsDQ5JzI0LjQiUyA2NcKwMDcnMjQuNCJX!5e0!3m2!1ses!2sar!4v1234567890"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Ubicación Municipalidad de Alderetes">
                </iframe>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    var form       = document.getElementById('contacto-form');
    var container  = document.getElementById('form-container');
    var success    = document.getElementById('form-success');
    var submitBtn  = document.getElementById('submit-btn');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin w-5 h-5" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/></svg> Enviando...';

        setTimeout(function () {
            container.classList.add('hidden');
            success.classList.remove('hidden');
        }, 1500);
    });

    window.resetForm = function () {
        form.reset();
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg> Enviar consulta';
        success.classList.add('hidden');
        container.classList.remove('hidden');
    };
})();
</script>

<?php get_footer(); ?>
