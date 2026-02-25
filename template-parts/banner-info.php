<?php
/**
 * Banner Info section.
 * Usage: get_template_part('template-parts/banner-info', null, ['variant' => 'primary']);
 * variant: 'primary' (azul) | 'secondary' (verde)
 *
 * @package TailPress
 */

$variant = $args['variant'] ?? 'primary';
?>

<?php if ($variant === 'primary') : ?>

<section class="py-6 bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div class="text-white">
                    <h3 class="font-bold text-xl">¡Nuevo sistema de turnos online!</h3>
                    <p class="text-white/80">Sacá tu turno para el carnet de manejo sin salir de casa</p>
                </div>
            </div>
            <a href="<?php echo esc_url(home_url('/transito')); ?>" class="flex items-center gap-2 px-6 py-3 bg-white text-blue-700 font-semibold rounded-xl hover:bg-blue-50 transition-colors shadow-lg">
                Solicitar turno
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>

<?php else : ?>

<section class="py-12 bg-gradient-to-r from-green-600 to-emerald-700 relative overflow-hidden">
    <div class="absolute right-0 top-0 w-1/3 h-full opacity-10">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <path fill="#FFFFFF" d="M47.5,-57.5C59.1,-45.2,64.5,-27.6,66.1,-10.3C67.8,7,65.6,24,56.8,36.8C48,49.6,32.5,58.2,15.3,63.6C-1.9,69,-20.8,71.2,-36.4,64.4C-52,57.6,-64.3,41.8,-69.1,24.2C-73.9,6.6,-71.2,-12.8,-62.3,-28.6C-53.4,-44.4,-38.3,-56.6,-22.2,-66C-6.1,-75.4,10.9,-81.9,25.9,-77.5C40.9,-73.1,53.9,-57.8,47.5,-57.5Z" transform="translate(100 100)"/>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-white/20 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div class="text-white">
                    <p class="text-white/70 text-sm">Línea de atención</p>
                    <p class="font-bold text-lg">(0381) 123-4567</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="p-3 bg-white/20 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-white">
                    <p class="text-white/70 text-sm">Horario de atención</p>
                    <p class="font-bold text-lg">Lunes a Viernes 8:00 - 14:00</p>
                </div>
            </div>
            <div class="flex justify-center md:justify-end">
                <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="flex items-center gap-2 px-6 py-3 bg-white text-green-700 font-semibold rounded-xl hover:bg-green-50 transition-colors shadow-lg">
                    Contactanos
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>
