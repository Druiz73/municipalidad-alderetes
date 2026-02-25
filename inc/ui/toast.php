<?php
/**
 * Toast UI component.
 *
 * Notification toasts that appear at the bottom-right.
 * Uses JS to show/hide with auto-dismiss.
 *
 * Usage (PHP — render the container once, usually in footer):
 *   echo tp_ui_toast_container();
 *
 * Usage (JS — trigger from JavaScript):
 *   window.tpToast({ title: 'Enviado', description: 'Su consulta fue enviada correctamente.' });
 *   window.tpToast({ title: 'Error', description: 'No se pudo enviar.', variant: 'destructive' });
 *
 * Usage (PHP — render a toast directly, e.g. after form submit):
 *   echo tp_ui_toast([
 *       'title'       => 'Formulario enviado',
 *       'description' => 'Nos comunicaremos a la brevedad.',
 *       'variant'     => 'default',
 *       'auto_show'   => true,
 *   ]);
 */

/**
 * Render the toast container (place once in footer.php).
 */
function tp_ui_toast_container( $attrs = [] ) {
    $class = $attrs['class'] ?? '';

    return '<div id="tp-toast-container" class="fixed bottom-0 right-0 z-[100] flex max-h-screen w-full flex-col gap-2 p-4 sm:max-w-[420px] ' . esc_attr( $class ) . '" aria-live="polite"></div>';
}

/**
 * Render a single toast element.
 */
function tp_ui_toast( $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id          = $attrs['id'] ?? 'tp-toast-' . $counter;
    $title       = $attrs['title'] ?? '';
    $description = $attrs['description'] ?? '';
    $variant     = $attrs['variant'] ?? 'default';
    $auto_show   = ! empty( $attrs['auto_show'] );
    $class       = $attrs['class'] ?? '';

    $variants = [
        'default'     => 'border bg-white text-zinc-950',
        'destructive' => 'border-destructive bg-destructive text-white',
    ];

    $variant_class = $variants[ $variant ] ?? $variants['default'];

    $base = 'tp-toast group pointer-events-auto relative flex w-full items-center justify-between gap-4 overflow-hidden rounded-md border p-4 pr-8 shadow-lg transition-all';

    $hidden = $auto_show ? '' : ' hidden';

    $html  = '<div id="' . esc_attr( $id ) . '" class="' . esc_attr( trim( "$base $variant_class $class" ) ) . '"' . $hidden . ' role="status" data-toast-variant="' . esc_attr( $variant ) . '">';

    $html .= '<div class="grid gap-1">';
    if ( $title ) {
        $html .= '<div class="text-sm font-semibold">' . esc_html( $title ) . '</div>';
    }
    if ( $description ) {
        $html .= '<div class="text-sm opacity-90">' . esc_html( $description ) . '</div>';
    }
    $html .= '</div>';

    // Close button
    $html .= '<button type="button" class="tp-toast-close absolute right-1 top-1 rounded-md p-1 text-zinc-950/50 opacity-0 transition-opacity hover:text-zinc-950 focus:opacity-100 group-hover:opacity-100" aria-label="Cerrar">';
    $html .= '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>';
    $html .= '</button>';

    $html .= '</div>';

    return $html;
}
