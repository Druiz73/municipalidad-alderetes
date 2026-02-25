<?php
/**
 * Alert Dialog UI component.
 *
 * Uses the native <dialog> element. JS handles open/close and backdrop click.
 *
 * Usage:
 *   // 1. Render the trigger button
 *   echo tp_ui_alert_dialog_trigger('my-dialog', 'Delete account', [
 *       'class' => 'rounded-md bg-primary px-4 py-2 text-sm text-white',
 *   ]);
 *
 *   // 2. Render the dialog (can be anywhere in the page)
 *   echo tp_ui_alert_dialog([
 *       'id'           => 'my-dialog',
 *       'title'        => 'Are you sure?',
 *       'description'  => 'This action cannot be undone.',
 *       'confirm_text' => 'Yes, delete',
 *       'cancel_text'  => 'Cancel',
 *   ]);
 */

function tp_ui_alert_dialog( $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id           = $attrs['id'] ?? 'tp-alert-dialog-' . $counter;
    $title        = $attrs['title'] ?? '';
    $description  = $attrs['description'] ?? '';
    $confirm_text = $attrs['confirm_text'] ?? __( 'Continue', 'tailpress' );
    $cancel_text  = $attrs['cancel_text'] ?? __( 'Cancel', 'tailpress' );
    $class        = $attrs['class'] ?? '';

    $html  = '<dialog id="' . esc_attr( $id ) . '" class="tp-alert-dialog ' . esc_attr( $class ) . '">';

    // Header
    if ( $title || $description ) {
        $html .= '<div class="flex flex-col space-y-2 text-center sm:text-left">';
        if ( $title ) {
            $html .= '<h2 class="text-lg font-semibold">' . esc_html( $title ) . '</h2>';
        }
        if ( $description ) {
            $html .= '<p class="text-sm text-muted-foreground">' . esc_html( $description ) . '</p>';
        }
        $html .= '</div>';
    }

    // Footer
    $html .= '<div class="mt-4 flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">';
    $html .= '<button type="button" class="tp-dialog-cancel inline-flex items-center justify-center rounded-md border border-border bg-white px-4 py-2 text-sm font-medium hover:bg-zinc-100 mt-2 sm:mt-0">';
    $html .= esc_html( $cancel_text );
    $html .= '</button>';
    $html .= '<button type="button" class="tp-dialog-confirm inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:opacity-90">';
    $html .= esc_html( $confirm_text );
    $html .= '</button>';
    $html .= '</div>';

    $html .= '</dialog>';

    return $html;
}

function tp_ui_alert_dialog_trigger( $dialog_id, $text, $attrs = [] ) {
    $class = $attrs['class'] ?? '';
    $tag   = $attrs['tag'] ?? 'button';

    $html  = '<' . tag_escape( $tag );
    if ( $tag === 'button' ) {
        $html .= ' type="button"';
    }
    $html .= ' class="tp-dialog-trigger ' . esc_attr( $class ) . '"';
    $html .= ' data-dialog-target="' . esc_attr( $dialog_id ) . '"';
    $html .= '>';
    $html .= esc_html( $text );
    $html .= '</' . tag_escape( $tag ) . '>';

    return $html;
}
