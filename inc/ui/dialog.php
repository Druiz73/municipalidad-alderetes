<?php
/**
 * Dialog (Modal) UI component.
 *
 * Uses native <dialog> element with close button (X).
 * Unlike AlertDialog, this is for general content modals.
 *
 * Usage:
 *   echo tp_ui_dialog_trigger('my-modal', 'Abrir modal', [
 *       'class' => tp_ui_button_classes('default'),
 *   ]);
 *
 *   echo tp_ui_dialog([
 *       'id'          => 'my-modal',
 *       'title'       => 'Información',
 *       'description' => 'Detalles adicionales.',
 *       'content'     => '<p>Contenido del modal...</p>',
 *       'footer'      => tp_ui_button('Cerrar', ['class' => 'tp-dialog-close']),
 *   ]);
 */

function tp_ui_dialog( $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id          = $attrs['id'] ?? 'tp-dialog-' . $counter;
    $title       = $attrs['title'] ?? '';
    $description = $attrs['description'] ?? '';
    $content     = $attrs['content'] ?? '';
    $footer      = $attrs['footer'] ?? '';
    $class       = $attrs['class'] ?? '';

    $html  = '<dialog id="' . esc_attr( $id ) . '" class="tp-dialog ' . esc_attr( $class ) . '">';

    // Close button
    $html .= '<button type="button" class="tp-dialog-close absolute right-4 top-4 rounded-sm opacity-70 transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">';
    $html .= '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>';
    $html .= '<span class="sr-only">Cerrar</span>';
    $html .= '</button>';

    // Header
    if ( $title || $description ) {
        $html .= '<div class="flex flex-col space-y-1.5 text-center sm:text-left">';
        if ( $title ) {
            $html .= '<h2 class="text-lg font-semibold leading-none tracking-tight">' . esc_html( $title ) . '</h2>';
        }
        if ( $description ) {
            $html .= '<p class="text-sm text-muted-foreground">' . esc_html( $description ) . '</p>';
        }
        $html .= '</div>';
    }

    // Content
    if ( $content ) {
        $html .= '<div class="mt-4">' . wp_kses_post( $content ) . '</div>';
    }

    // Footer
    if ( $footer ) {
        $html .= '<div class="mt-4 flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">';
        $html .= wp_kses_post( $footer );
        $html .= '</div>';
    }

    $html .= '</dialog>';

    return $html;
}

function tp_ui_dialog_trigger( $dialog_id, $text, $attrs = [] ) {
    $class = $attrs['class'] ?? '';

    $html  = '<button type="button" class="tp-dialog-trigger ' . esc_attr( $class ) . '"';
    $html .= ' data-dialog-target="' . esc_attr( $dialog_id ) . '"';
    $html .= '>';
    $html .= esc_html( $text );
    $html .= '</button>';

    return $html;
}
