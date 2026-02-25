<?php
/**
 * Breadcrumb UI component.
 *
 * Usage:
 *   echo tp_ui_breadcrumb([
 *       ['label' => 'Inicio', 'href' => '/'],
 *       ['label' => 'Trámites', 'href' => '/tramites'],
 *       ['label' => 'Rentas'],  // last item = current page (no href)
 *   ]);
 */

function tp_ui_breadcrumb( $items = [], $attrs = [] ) {
    $class     = $attrs['class'] ?? '';
    $separator = $attrs['separator'] ?? null;

    $chevron_svg = '<svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>';

    $sep = $separator ?? $chevron_svg;

    $html = '<nav aria-label="breadcrumb" class="' . esc_attr( $class ) . '">';
    $html .= '<ol class="flex flex-wrap items-center gap-1.5 break-words text-sm text-muted-foreground sm:gap-2.5">';

    $total = count( $items );

    foreach ( $items as $i => $item ) {
        $label = $item['label'] ?? '';
        $href  = $item['href'] ?? '';
        $is_last = ( $i === $total - 1 );

        $html .= '<li class="inline-flex items-center gap-1.5">';

        if ( $is_last || empty( $href ) ) {
            $html .= '<span role="link" aria-disabled="true" aria-current="page" class="font-normal text-zinc-950">';
            $html .= esc_html( $label );
            $html .= '</span>';
        } else {
            $html .= '<a href="' . esc_url( $href ) . '" class="transition-colors hover:text-zinc-950">';
            $html .= esc_html( $label );
            $html .= '</a>';
        }

        $html .= '</li>';

        if ( ! $is_last ) {
            $html .= '<li role="presentation" aria-hidden="true" class="[&>svg]:w-3.5 [&>svg]:h-3.5">' . $sep . '</li>';
        }
    }

    $html .= '</ol>';
    $html .= '</nav>';

    return $html;
}
