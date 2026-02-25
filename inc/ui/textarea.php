<?php
/**
 * Textarea UI component.
 *
 * Usage:
 *   echo tp_ui_textarea([
 *       'name'        => 'consulta',
 *       'id'          => 'consulta',
 *       'placeholder' => 'Escriba su consulta...',
 *       'rows'        => 4,
 *       'required'    => true,
 *   ]);
 */

function tp_ui_textarea( $attrs = [] ) {
    $name        = $attrs['name'] ?? '';
    $id          = $attrs['id'] ?? '';
    $placeholder = $attrs['placeholder'] ?? '';
    $value       = $attrs['value'] ?? '';
    $class       = $attrs['class'] ?? '';
    $rows        = $attrs['rows'] ?? 3;
    $disabled    = ! empty( $attrs['disabled'] );
    $required    = ! empty( $attrs['required'] );
    $readonly    = ! empty( $attrs['readonly'] );

    $base = 'flex min-h-[60px] w-full rounded-md border border-border bg-transparent px-3 py-2 text-base shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm';

    $classes = trim( "$base $class" );

    $html = '<textarea class="' . esc_attr( $classes ) . '"';

    if ( $name ) {
        $html .= ' name="' . esc_attr( $name ) . '"';
    }
    if ( $id ) {
        $html .= ' id="' . esc_attr( $id ) . '"';
    }
    if ( $placeholder ) {
        $html .= ' placeholder="' . esc_attr( $placeholder ) . '"';
    }
    if ( $rows ) {
        $html .= ' rows="' . intval( $rows ) . '"';
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

    $html .= '>' . esc_textarea( $value ) . '</textarea>';

    return $html;
}
