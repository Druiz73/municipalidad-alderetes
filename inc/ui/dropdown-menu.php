<?php
/**
 * Dropdown Menu UI component.
 *
 * Dropdown menu with toggle, outside click, and keyboard support.
 *
 * Usage:
 *   echo tp_ui_dropdown_menu(
 *       tp_ui_button('Opciones', ['variant' => 'outline']),
 *       [
 *           ['label' => 'Ver detalle',  'href' => '/detalle/1'],
 *           ['label' => 'Editar',       'href' => '/editar/1'],
 *           ['separator' => true],
 *           ['label' => 'Eliminar',     'href' => '#', 'class' => 'text-destructive'],
 *       ],
 *       ['align' => 'end']
 *   );
 */

function tp_ui_dropdown_menu( $trigger = '', $items = [], $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id    = $attrs['id'] ?? 'tp-dropdown-' . $counter;
    $align = $attrs['align'] ?? 'start'; // start | end | center
    $class = $attrs['class'] ?? '';

    $align_class = 'left-0';
    if ( $align === 'end' ) {
        $align_class = 'right-0';
    } elseif ( $align === 'center' ) {
        $align_class = 'left-1/2 -translate-x-1/2';
    }

    $html  = '<div id="' . esc_attr( $id ) . '" class="tp-dropdown-menu relative inline-block ' . esc_attr( $class ) . '">';

    // Trigger — wrap in a span to attach the toggle behavior
    $html .= '<div class="tp-dropdown-trigger">' . $trigger . '</div>';

    // Content
    $html .= '<div class="tp-dropdown-content absolute ' . esc_attr( $align_class ) . ' top-full z-50 mt-1 hidden min-w-[8rem] overflow-hidden rounded-md border border-border bg-white p-1 text-zinc-950 shadow-md">';

    foreach ( $items as $item ) {
        if ( ! empty( $item['separator'] ) ) {
            $html .= '<div class="-mx-1 my-1 h-px bg-border" role="separator"></div>';
            continue;
        }

        $label      = $item['label'] ?? '';
        $href       = $item['href'] ?? '#';
        $item_class = $item['class'] ?? '';

        $base_item = 'relative flex cursor-pointer select-none items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-zinc-100 focus:bg-zinc-100 [&>svg]:size-4 [&>svg]:shrink-0';

        $html .= '<a href="' . esc_url( $href ) . '" class="' . esc_attr( trim( "$base_item $item_class" ) ) . '" role="menuitem">';
        $html .= esc_html( $label );
        $html .= '</a>';
    }

    $html .= '</div>'; // content
    $html .= '</div>'; // wrapper

    return $html;
}
