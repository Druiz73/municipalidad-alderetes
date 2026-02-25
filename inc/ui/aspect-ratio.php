<?php
/**
 * Aspect Ratio UI component.
 *
 * Pure CSS wrapper using the native aspect-ratio property.
 *
 * Usage:
 *   echo tp_ui_aspect_ratio('16/9', '<img src="photo.jpg" alt="" class="object-cover w-full h-full">');
 *   echo tp_ui_aspect_ratio('4/3', '<iframe src="..."></iframe>', ['class' => 'rounded-lg overflow-hidden']);
 */

function tp_ui_aspect_ratio( $ratio = '16/9', $content = '', $attrs = [] ) {
    $class = $attrs['class'] ?? '';

    $ratio = str_replace( ':', '/', $ratio );

    $html  = '<div class="relative overflow-hidden ' . esc_attr( $class ) . '" style="aspect-ratio: ' . esc_attr( $ratio ) . ';">';
    $html .= wp_kses_post( $content );
    $html .= '</div>';

    return $html;
}
