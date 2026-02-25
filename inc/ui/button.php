<?php
/**
 * Button UI component.
 *
 * Usage:
 *   echo tp_ui_button('Enviar', ['variant' => 'default', 'size' => 'default']);
 *   echo tp_ui_button('Cancelar', ['variant' => 'outline']);
 *   echo tp_ui_button('Ver más', ['tag' => 'a', 'href' => '/tramites', 'variant' => 'link']);
 *   echo tp_ui_button('<svg ...>', ['variant' => 'ghost', 'size' => 'icon']);
 *
 * Variants: default, destructive, outline, secondary, ghost, link
 * Sizes: default, sm, lg, icon
 */

function tp_ui_button( $text = '', $attrs = [] ) {
    $variant  = $attrs['variant'] ?? 'default';
    $size     = $attrs['size'] ?? 'default';
    $tag      = $attrs['tag'] ?? 'button';
    $href     = $attrs['href'] ?? '';
    $class    = $attrs['class'] ?? '';
    $type     = $attrs['type'] ?? 'button';
    $disabled = ! empty( $attrs['disabled'] );
    $id       = $attrs['id'] ?? '';
    $raw      = ! empty( $attrs['raw'] ); // if true, $text is not escaped (for icons)

    $base = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0';

    $variants = [
        'default'     => 'bg-primary text-white shadow hover:bg-primary/90',
        'destructive' => 'bg-destructive text-white shadow-sm hover:bg-destructive/90',
        'outline'     => 'border border-border bg-white shadow-sm hover:bg-zinc-100',
        'secondary'   => 'bg-secondary text-white shadow-sm hover:bg-secondary/80',
        'ghost'       => 'hover:bg-zinc-100',
        'link'        => 'text-primary underline-offset-4 hover:underline',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm'      => 'h-8 rounded-md px-3 text-xs',
        'lg'      => 'h-10 rounded-md px-8',
        'icon'    => 'h-9 w-9',
    ];

    $variant_class = $variants[ $variant ] ?? $variants['default'];
    $size_class    = $sizes[ $size ] ?? $sizes['default'];

    $classes = trim( "$base $variant_class $size_class $class" );

    if ( $tag === 'a' ) {
        $html  = '<a href="' . esc_url( $href ) . '" class="' . esc_attr( $classes ) . '"';
        if ( $id ) {
            $html .= ' id="' . esc_attr( $id ) . '"';
        }
        $html .= '>';
        $html .= $raw ? $text : esc_html( $text );
        $html .= '</a>';
    } else {
        $html  = '<button type="' . esc_attr( $type ) . '" class="' . esc_attr( $classes ) . '"';
        if ( $disabled ) {
            $html .= ' disabled';
        }
        if ( $id ) {
            $html .= ' id="' . esc_attr( $id ) . '"';
        }
        // Pass through data attributes
        foreach ( $attrs as $key => $val ) {
            if ( str_starts_with( $key, 'data-' ) ) {
                $html .= ' ' . esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
            }
        }
        $html .= '>';
        $html .= $raw ? $text : esc_html( $text );
        $html .= '</button>';
    }

    return $html;
}

/**
 * Returns variant classes for use in other components (like AlertDialog).
 */
function tp_ui_button_classes( $variant = 'default', $size = 'default' ) {
    $base = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50';

    $variants = [
        'default'     => 'bg-primary text-white shadow hover:bg-primary/90',
        'destructive' => 'bg-destructive text-white shadow-sm hover:bg-destructive/90',
        'outline'     => 'border border-border bg-white shadow-sm hover:bg-zinc-100',
        'secondary'   => 'bg-secondary text-white shadow-sm hover:bg-secondary/80',
        'ghost'       => 'hover:bg-zinc-100',
        'link'        => 'text-primary underline-offset-4 hover:underline',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm'      => 'h-8 rounded-md px-3 text-xs',
        'lg'      => 'h-10 rounded-md px-8',
        'icon'    => 'h-9 w-9',
    ];

    $v = $variants[ $variant ] ?? $variants['default'];
    $s = $sizes[ $size ] ?? $sizes['default'];

    return trim( "$base $v $s" );
}
