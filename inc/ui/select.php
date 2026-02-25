<?php
/**
 * Select UI component.
 *
 * Native <select> styled to match the design system.
 *
 * Usage:
 *   echo tp_ui_select([
 *       'name'        => 'departamento',
 *       'id'          => 'departamento',
 *       'placeholder' => 'Seleccione un departamento',
 *       'options'     => [
 *           'rentas'   => 'Rentas',
 *           'transito' => 'Tránsito',
 *           'catastro' => 'Catastro',
 *       ],
 *       'value'    => '',
 *       'required' => true,
 *   ]);
 *
 *   // With option groups
 *   echo tp_ui_select([
 *       'name'    => 'tramite',
 *       'options' => [
 *           'Rentas' => [
 *               'tem'  => 'TEM',
 *               'cisi' => 'CISI',
 *           ],
 *           'Tránsito' => [
 *               'licencia' => 'Licencia de conducir',
 *               'multas'   => 'Consulta de multas',
 *           ],
 *       ],
 *   ]);
 */

function tp_ui_select( $attrs = [] ) {
    $name        = $attrs['name'] ?? '';
    $id          = $attrs['id'] ?? '';
    $placeholder = $attrs['placeholder'] ?? '';
    $options     = $attrs['options'] ?? [];
    $value       = $attrs['value'] ?? '';
    $class       = $attrs['class'] ?? '';
    $disabled    = ! empty( $attrs['disabled'] );
    $required    = ! empty( $attrs['required'] );

    $base = 'flex h-9 w-full items-center justify-between whitespace-nowrap rounded-md border border-border bg-transparent px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50';

    $classes = trim( "$base $class" );

    $html = '<select class="' . esc_attr( $classes ) . '"';

    if ( $name ) {
        $html .= ' name="' . esc_attr( $name ) . '"';
    }
    if ( $id ) {
        $html .= ' id="' . esc_attr( $id ) . '"';
    }
    if ( $disabled ) {
        $html .= ' disabled';
    }
    if ( $required ) {
        $html .= ' required';
    }

    // Pass through data and aria attributes
    foreach ( $attrs as $key => $val ) {
        if ( str_starts_with( $key, 'data-' ) || str_starts_with( $key, 'aria-' ) ) {
            $html .= ' ' . esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
        }
    }

    $html .= '>';

    // Placeholder option
    if ( $placeholder ) {
        $html .= '<option value=""' . ( $value === '' ? ' selected' : '' ) . ' disabled>';
        $html .= esc_html( $placeholder );
        $html .= '</option>';
    }

    // Options — supports flat array or grouped (optgroup)
    foreach ( $options as $key => $opt ) {
        if ( is_array( $opt ) ) {
            // Option group
            $html .= '<optgroup label="' . esc_attr( $key ) . '">';
            foreach ( $opt as $opt_val => $opt_label ) {
                $selected = ( (string) $opt_val === (string) $value ) ? ' selected' : '';
                $html .= '<option value="' . esc_attr( $opt_val ) . '"' . $selected . '>' . esc_html( $opt_label ) . '</option>';
            }
            $html .= '</optgroup>';
        } else {
            $selected = ( (string) $key === (string) $value ) ? ' selected' : '';
            $html .= '<option value="' . esc_attr( $key ) . '"' . $selected . '>' . esc_html( $opt ) . '</option>';
        }
    }

    $html .= '</select>';

    return $html;
}
