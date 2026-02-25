<?php
/**
 * Tabs UI component.
 *
 * Tabbed content panels. Uses JS to toggle visibility.
 *
 * Usage:
 *   echo tp_ui_tabs([
 *       'default' => 'rentas',
 *       'tabs'    => [
 *           'rentas'   => ['label' => 'Rentas',   'content' => '<p>Info de Rentas...</p>'],
 *           'transito' => ['label' => 'Tránsito', 'content' => '<p>Info de Tránsito...</p>'],
 *           'catastro' => ['label' => 'Catastro',  'content' => '<p>Info de Catastro...</p>'],
 *       ],
 *   ]);
 */

function tp_ui_tabs( $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id       = $attrs['id'] ?? 'tp-tabs-' . $counter;
    $tabs     = $attrs['tabs'] ?? [];
    $default  = $attrs['default'] ?? '';
    $class    = $attrs['class'] ?? '';

    if ( empty( $tabs ) ) {
        return '';
    }

    // Default to first tab if not specified
    if ( ! $default || ! isset( $tabs[ $default ] ) ) {
        $default = array_key_first( $tabs );
    }

    $html = '<div id="' . esc_attr( $id ) . '" class="tp-tabs ' . esc_attr( $class ) . '" data-tabs-default="' . esc_attr( $default ) . '">';

    // Tab list
    $html .= '<div class="tp-tabs-list inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground" role="tablist">';

    foreach ( $tabs as $key => $tab ) {
        $label    = $tab['label'] ?? $key;
        $active   = ( $key === $default );
        $btn_cls  = 'tp-tabs-trigger inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';

        if ( $active ) {
            $btn_cls .= ' bg-white text-zinc-950 shadow';
        }

        $html .= '<button type="button" role="tab" class="' . esc_attr( $btn_cls ) . '" data-tabs-value="' . esc_attr( $key ) . '" aria-selected="' . ( $active ? 'true' : 'false' ) . '">';
        $html .= esc_html( $label );
        $html .= '</button>';
    }

    $html .= '</div>';

    // Tab panels
    foreach ( $tabs as $key => $tab ) {
        $content = $tab['content'] ?? '';
        $active  = ( $key === $default );
        $hidden  = $active ? '' : ' hidden';

        $html .= '<div class="tp-tabs-content mt-2' . $hidden . '" role="tabpanel" data-tabs-panel="' . esc_attr( $key ) . '">';
        $html .= wp_kses_post( $content );
        $html .= '</div>';
    }

    $html .= '</div>';

    return $html;
}
