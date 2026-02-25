<?php
/**
 * Accordion UI component.
 *
 * Uses native <details>/<summary> elements with Tailwind styling.
 * JS handles "single" mode (only one item open at a time).
 *
 * Usage:
 *   echo tp_ui_accordion([
 *       ['title' => 'Question 1', 'content' => 'Answer 1'],
 *       ['title' => 'Question 2', 'content' => '<p>Answer with <strong>HTML</strong></p>'],
 *   ], [
 *       'type'         => 'single',   // 'single' or 'multiple'
 *       'collapsible'  => true,
 *       'default_open' => 0,          // index of item open by default
 *       'class'        => '',
 *   ]);
 */

function tp_ui_accordion( $items = [], $attrs = [] ) {
    $type         = $attrs['type'] ?? 'single';
    $collapsible  = isset( $attrs['collapsible'] ) ? (bool) $attrs['collapsible'] : true;
    $class        = $attrs['class'] ?? '';
    $default_open = $attrs['default_open'] ?? null;

    $data_attrs = ' data-accordion-type="' . esc_attr( $type ) . '"';
    if ( $collapsible ) {
        $data_attrs .= ' data-accordion-collapsible';
    }

    $html = '<div class="tp-accordion ' . esc_attr( $class ) . '"' . $data_attrs . '>';

    foreach ( $items as $index => $item ) {
        $title      = $item['title'] ?? '';
        $content    = $item['content'] ?? '';
        $item_class = $item['class'] ?? '';
        $is_open    = ( $default_open === $index ) ? ' open' : '';

        $html .= '<details class="border-b border-border group ' . esc_attr( $item_class ) . '"' . $is_open . '>';

        $html .= '<summary class="flex flex-1 items-center justify-between py-4 text-sm font-medium transition-all hover:underline text-left cursor-pointer">';
        $html .= '<span>' . esc_html( $title ) . '</span>';
        $html .= '<svg class="h-4 w-4 shrink-0 text-muted-foreground transition-transform duration-200 group-open:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>';
        $html .= '</summary>';

        $html .= '<div class="tp-accordion-content overflow-hidden text-sm">';
        $html .= '<div class="pb-4 pt-0">' . wp_kses_post( $content ) . '</div>';
        $html .= '</div>';

        $html .= '</details>';
    }

    $html .= '</div>';

    return $html;
}
