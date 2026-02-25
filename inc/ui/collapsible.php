<?php
/**
 * Collapsible UI component.
 *
 * Uses native <details>/<summary>. Similar to accordion but standalone.
 *
 * Usage:
 *   echo tp_ui_collapsible(
 *       'Ver requisitos',                    // trigger text
 *       '<ul><li>DNI</li><li>CUIL</li></ul>', // content
 *       ['open' => false, 'class' => '']
 *   );
 */

function tp_ui_collapsible( $trigger = '', $content = '', $attrs = [] ) {
    $open          = ! empty( $attrs['open'] );
    $class         = $attrs['class'] ?? '';
    $trigger_class = $attrs['trigger_class'] ?? '';
    $content_class = $attrs['content_class'] ?? '';

    $html  = '<details class="tp-collapsible group ' . esc_attr( $class ) . '"' . ( $open ? ' open' : '' ) . '>';

    $html .= '<summary class="flex cursor-pointer items-center justify-between text-sm font-medium list-none [&::-webkit-details-marker]:hidden ' . esc_attr( $trigger_class ) . '">';
    $html .= esc_html( $trigger );
    $html .= '<svg class="h-4 w-4 shrink-0 text-muted-foreground transition-transform duration-200 group-open:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>';
    $html .= '</summary>';

    $html .= '<div class="tp-collapsible-content overflow-hidden ' . esc_attr( $content_class ) . '">';
    $html .= wp_kses_post( $content );
    $html .= '</div>';

    $html .= '</details>';

    return $html;
}
