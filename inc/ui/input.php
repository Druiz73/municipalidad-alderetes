<?php
/**
 * Input UI component.
 *
 * Usage:
 *   echo tp_ui_input([
 *       'type'        => 'text',
 *       'name'        => 'dni',
 *       'id'          => 'dni',
 *       'placeholder' => 'Ingrese su DNI',
 *       'required'    => true,
 *   ]);
 *
 *   echo tp_ui_input([
 *       'type' => 'email',
 *       'name' => 'email',
 *       'placeholder' => 'correo@ejemplo.com',
 *       'class' => 'max-w-sm',
 *   ]);
 */

function tp_ui_input( $attrs = [] ) {
    $type        = $attrs['type'] ?? 'text';
    $name        = $attrs['name'] ?? '';
    $id          = $attrs['id'] ?? '';
    $placeholder = $attrs['placeholder'] ?? '';
    $value       = $attrs['value'] ?? '';
    $class       = $attrs['class'] ?? '';
    $disabled    = ! empty( $attrs['disabled'] );
    $required    = ! empty( $attrs['required'] );
    $readonly    = ! empty( $attrs['readonly'] );

    $base = 'flex h-9 w-full rounded-md border border-border bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm';

    $classes = trim( "$base $class" );

    $html = '<input type="' . esc_attr( $type ) . '" class="' . esc_attr( $classes ) . '"';

    if ( $name ) {
        $html .= ' name="' . esc_attr( $name ) . '"';
    }
    if ( $id ) {
        $html .= ' id="' . esc_attr( $id ) . '"';
    }
    if ( $placeholder ) {
        $html .= ' placeholder="' . esc_attr( $placeholder ) . '"';
    }
    if ( $value !== '' ) {
        $html .= ' value="' . esc_attr( $value ) . '"';
    }
    if ( $disabled ) {
        $html .= ' disabled';
    }
    if ( $required ) {
        $html .= ' required';
    }
    if ( $readonly ) {
        $html .= ' readonly';
    }

    // Pass through data and aria attributes
    foreach ( $attrs as $key => $val ) {
        if ( str_starts_with( $key, 'data-' ) || str_starts_with( $key, 'aria-' ) ) {
            $html .= ' ' . esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
        }
    }

    $html .= '>';

    return $html;
}
