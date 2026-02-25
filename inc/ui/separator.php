<?php
/**
 * Separator UI component.
 *
 * Simple horizontal or vertical divider line.
 *
 * Usage:
 *   echo tp_ui_separator();
 *   echo tp_ui_separator(['orientation' => 'vertical', 'class' => 'h-6']);
 *   echo tp_ui_separator(['class' => 'my-4']);
 */

function tp_ui_separator( $attrs = [] ) {
    $orientation = $attrs['orientation'] ?? 'horizontal';
    $class       = $attrs['class'] ?? '';

    $base = 'shrink-0 bg-border';

    if ( $orientation === 'vertical' ) {
        $orientation_class = 'h-full w-[1px]';
    } else {
        $orientation_class = 'h-[1px] w-full';
    }

    $classes = trim( "$base $orientation_class $class" );

    return '<div role="separator" aria-orientation="' . esc_attr( $orientation ) . '" class="' . esc_attr( $classes ) . '"></div>';
}
