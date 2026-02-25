<?php
/**
 * Alert UI component.
 *
 * Pure HTML/CSS — no JS required.
 *
 * Usage:
 *   echo tp_ui_alert([
 *       'variant'     => 'default',        // 'default' or 'destructive'
 *       'title'       => 'Heads up!',
 *       'description' => 'You can add components to your app.',
 *       'icon'        => '<svg ...>...</svg>',  // optional SVG string
 *       'class'       => '',
 *   ]);
 */

function tp_ui_alert( $attrs = [] ) {
    $variant     = $attrs['variant'] ?? 'default';
    $title       = $attrs['title'] ?? '';
    $description = $attrs['description'] ?? '';
    $icon        = $attrs['icon'] ?? '';
    $class       = $attrs['class'] ?? '';

    $base = 'relative w-full rounded-lg border px-4 py-3 text-sm';

    $variants = [
        'default'     => 'bg-white text-zinc-950 border-border',
        'destructive' => 'border-destructive/50 text-destructive [&>svg]:text-destructive',
    ];

    $variant_class = $variants[ $variant ] ?? $variants['default'];

    if ( $icon ) {
        $base .= ' [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-current [&>svg~*]:pl-7';
    }

    $html = '<div role="alert" class="' . esc_attr( trim( "$base $variant_class $class" ) ) . '">';

    if ( $icon ) {
        $html .= wp_kses( $icon, [
            'svg'    => [ 'class' => true, 'xmlns' => true, 'width' => true, 'height' => true, 'viewbox' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true ],
            'path'   => [ 'd' => true ],
            'circle' => [ 'cx' => true, 'cy' => true, 'r' => true ],
            'line'   => [ 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ],
        ] );
    }

    if ( $title ) {
        $html .= '<h5 class="mb-1 font-medium leading-none tracking-tight">' . esc_html( $title ) . '</h5>';
    }

    if ( $description ) {
        $html .= '<div class="text-sm [&_p]:leading-relaxed">' . wp_kses_post( $description ) . '</div>';
    }

    $html .= '</div>';

    return $html;
}
