<?php
/**
 * Checkbox UI component.
 *
 * Uses native HTML checkbox with Tailwind styling.
 *
 * Usage:
 *   echo tp_ui_checkbox(['name' => 'terms', 'label' => 'Acepto los términos']);
 *   echo tp_ui_checkbox(['name' => 'news', 'label' => 'Recibir noticias', 'checked' => true]);
 */

function tp_ui_checkbox( $attrs = [] ) {
    $name    = $attrs['name'] ?? '';
    $id      = $attrs['id'] ?? ( $name ? 'chk-' . $name : 'chk-' . wp_unique_id() );
    $label   = $attrs['label'] ?? '';
    $value   = $attrs['value'] ?? '1';
    $checked = ! empty( $attrs['checked'] );
    $class   = $attrs['class'] ?? '';

    $html  = '<div class="flex items-center space-x-2 ' . esc_attr( $class ) . '">';

    $html .= '<input type="checkbox"';
    $html .= ' id="' . esc_attr( $id ) . '"';
    if ( $name ) {
        $html .= ' name="' . esc_attr( $name ) . '"';
    }
    $html .= ' value="' . esc_attr( $value ) . '"';
    if ( $checked ) {
        $html .= ' checked';
    }
    $html .= ' class="peer h-4 w-4 shrink-0 rounded-sm border border-primary shadow focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 accent-primary"';
    $html .= '>';

    if ( $label ) {
        $html .= '<label for="' . esc_attr( $id ) . '" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">';
        $html .= esc_html( $label );
        $html .= '</label>';
    }

    $html .= '</div>';

    return $html;
}
