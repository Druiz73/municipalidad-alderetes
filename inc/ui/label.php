<?php
/**
 * Label UI component.
 *
 * Usage:
 *   echo tp_ui_label('Nombre completo', ['for' => 'nombre']);
 *   echo tp_ui_label('Email', ['for' => 'email', 'class' => 'mb-2']);
 */

function tp_ui_label( $text = '', $attrs = [] ) {
    $for   = $attrs['for'] ?? '';
    $class = $attrs['class'] ?? '';

    $base = 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70';

    $classes = trim( "$base $class" );

    $html = '<label class="' . esc_attr( $classes ) . '"';

    if ( $for ) {
        $html .= ' for="' . esc_attr( $for ) . '"';
    }

    $html .= '>';
    $html .= esc_html( $text );
    $html .= '</label>';

    return $html;
}
