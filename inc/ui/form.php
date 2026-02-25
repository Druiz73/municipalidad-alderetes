<?php
/**
 * Form group UI component.
 *
 * Generates a form field wrapper with label, input, description and error.
 *
 * Usage:
 *   echo tp_ui_form_group([
 *       'label'       => 'Nombre completo',
 *       'name'        => 'nombre',
 *       'input'       => tp_ui_input(['name' => 'nombre', 'id' => 'nombre', 'required' => true]),
 *       'description' => 'Ingrese su nombre tal como aparece en el DNI.',
 *       'error'       => '',
 *   ]);
 *
 *   // With error
 *   echo tp_ui_form_group([
 *       'label' => 'DNI',
 *       'name'  => 'dni',
 *       'input' => tp_ui_input(['name' => 'dni', 'id' => 'dni', 'aria-invalid' => 'true']),
 *       'error' => 'El DNI ingresado no es válido.',
 *   ]);
 */

function tp_ui_form_group( $attrs = [] ) {
    $label       = $attrs['label'] ?? '';
    $name        = $attrs['name'] ?? '';
    $input       = $attrs['input'] ?? '';
    $description = $attrs['description'] ?? '';
    $error       = $attrs['error'] ?? '';
    $class       = $attrs['class'] ?? '';

    $id      = $name ? $name : uniqid( 'field-' );
    $desc_id = $id . '-description';
    $err_id  = $id . '-error';

    $html = '<div class="tp-form-group space-y-2 ' . esc_attr( $class ) . '">';

    // Label
    if ( $label ) {
        $html .= tp_ui_label( $label, [ 'for' => $id ] );
    }

    // Input (passed as pre-rendered HTML)
    if ( $input ) {
        $html .= $input;
    }

    // Description
    if ( $description ) {
        $html .= '<p id="' . esc_attr( $desc_id ) . '" class="text-[0.8rem] text-muted-foreground">';
        $html .= esc_html( $description );
        $html .= '</p>';
    }

    // Error
    if ( $error ) {
        $html .= '<p id="' . esc_attr( $err_id ) . '" class="text-[0.8rem] font-medium text-destructive">';
        $html .= esc_html( $error );
        $html .= '</p>';
    }

    $html .= '</div>';

    return $html;
}
