<?php
/**
 * Card UI component.
 *
 * Usage:
 *   echo tp_ui_card([
 *       'title'       => 'Trámites de Rentas',
 *       'description' => 'Información sobre TEM, CISI y Cementerio.',
 *       'content'     => '<p>Contenido aquí...</p>',
 *       'footer'      => '<a href="/rentas">Ver más</a>',
 *       'class'       => '',
 *   ]);
 *
 * Or build manually:
 *   echo tp_ui_card_open();
 *   echo tp_ui_card_header('Título', 'Descripción');
 *   echo tp_ui_card_content('<p>Contenido</p>');
 *   echo tp_ui_card_footer('<button>Acción</button>');
 *   echo tp_ui_card_close();
 */

function tp_ui_card( $attrs = [] ) {
    $title       = $attrs['title'] ?? '';
    $description = $attrs['description'] ?? '';
    $content     = $attrs['content'] ?? '';
    $footer      = $attrs['footer'] ?? '';
    $class       = $attrs['class'] ?? '';
    $image       = $attrs['image'] ?? '';

    $html = '<div class="rounded-xl border border-border bg-white shadow ' . esc_attr( $class ) . '">';

    if ( $image ) {
        $html .= '<div class="overflow-hidden rounded-t-xl">' . wp_kses_post( $image ) . '</div>';
    }

    if ( $title || $description ) {
        $html .= '<div class="flex flex-col space-y-1.5 p-6">';
        if ( $title ) {
            $html .= '<div class="font-semibold leading-none tracking-tight">' . esc_html( $title ) . '</div>';
        }
        if ( $description ) {
            $html .= '<div class="text-sm text-muted-foreground">' . esc_html( $description ) . '</div>';
        }
        $html .= '</div>';
    }

    if ( $content ) {
        $html .= '<div class="p-6 pt-0">' . wp_kses_post( $content ) . '</div>';
    }

    if ( $footer ) {
        $html .= '<div class="flex items-center p-6 pt-0">' . wp_kses_post( $footer ) . '</div>';
    }

    $html .= '</div>';

    return $html;
}

// Manual building blocks
function tp_ui_card_open( $class = '' ) {
    return '<div class="rounded-xl border border-border bg-white shadow ' . esc_attr( $class ) . '">';
}

function tp_ui_card_header( $title = '', $description = '', $class = '' ) {
    $html = '<div class="flex flex-col space-y-1.5 p-6 ' . esc_attr( $class ) . '">';
    if ( $title ) {
        $html .= '<div class="font-semibold leading-none tracking-tight">' . esc_html( $title ) . '</div>';
    }
    if ( $description ) {
        $html .= '<div class="text-sm text-muted-foreground">' . esc_html( $description ) . '</div>';
    }
    $html .= '</div>';
    return $html;
}

function tp_ui_card_content( $content = '', $class = '' ) {
    return '<div class="p-6 pt-0 ' . esc_attr( $class ) . '">' . wp_kses_post( $content ) . '</div>';
}

function tp_ui_card_footer( $content = '', $class = '' ) {
    return '<div class="flex items-center p-6 pt-0 ' . esc_attr( $class ) . '">' . wp_kses_post( $content ) . '</div>';
}

function tp_ui_card_close() {
    return '</div>';
}
