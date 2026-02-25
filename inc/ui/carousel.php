<?php
/**
 * Carousel UI component.
 *
 * Lightweight carousel using CSS scroll-snap + vanilla JS.
 * No external dependencies.
 *
 * Usage:
 *   echo tp_ui_carousel([
 *       '<img src="slide1.jpg" alt="Slide 1" class="w-full h-auto">',
 *       '<img src="slide2.jpg" alt="Slide 2" class="w-full h-auto">',
 *       '<div class="bg-primary p-8 text-white">Custom HTML slide</div>',
 *   ], [
 *       'autoplay'  => 5000,       // ms, 0 to disable
 *       'loop'      => true,
 *       'arrows'    => true,
 *       'class'     => '',
 *   ]);
 */

function tp_ui_carousel( $slides = [], $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id       = $attrs['id'] ?? 'tp-carousel-' . $counter;
    $autoplay = $attrs['autoplay'] ?? 0;
    $loop     = isset( $attrs['loop'] ) ? (bool) $attrs['loop'] : true;
    $arrows   = isset( $attrs['arrows'] ) ? (bool) $attrs['arrows'] : true;
    $class    = $attrs['class'] ?? '';

    if ( empty( $slides ) ) {
        return '';
    }

    $data_attrs = '';
    if ( $autoplay ) {
        $data_attrs .= ' data-carousel-autoplay="' . intval( $autoplay ) . '"';
    }
    if ( $loop ) {
        $data_attrs .= ' data-carousel-loop';
    }

    $html  = '<div id="' . esc_attr( $id ) . '" class="tp-carousel relative ' . esc_attr( $class ) . '"' . $data_attrs . ' role="region" aria-roledescription="carousel">';

    // Track
    $html .= '<div class="tp-carousel-viewport overflow-hidden">';
    $html .= '<div class="tp-carousel-track flex transition-transform duration-300 ease-out">';

    foreach ( $slides as $index => $slide ) {
        $html .= '<div class="tp-carousel-slide min-w-0 shrink-0 grow-0 basis-full" role="group" aria-roledescription="slide" aria-label="' . esc_attr( ( $index + 1 ) . ' de ' . count( $slides ) ) . '">';
        $html .= wp_kses_post( $slide );
        $html .= '</div>';
    }

    $html .= '</div>'; // track
    $html .= '</div>'; // viewport

    // Arrows
    if ( $arrows && count( $slides ) > 1 ) {
        $arrow_base = 'absolute top-1/2 -translate-y-1/2 h-8 w-8 rounded-full border border-border bg-white shadow-sm flex items-center justify-center hover:bg-zinc-100 disabled:opacity-50 transition-colors z-10';

        $html .= '<button type="button" class="tp-carousel-prev ' . $arrow_base . ' left-3" aria-label="Anterior">';
        $html .= '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>';
        $html .= '</button>';

        $html .= '<button type="button" class="tp-carousel-next ' . $arrow_base . ' right-3" aria-label="Siguiente">';
        $html .= '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
        $html .= '</button>';
    }

    // Dots
    if ( count( $slides ) > 1 ) {
        $html .= '<div class="tp-carousel-dots flex justify-center gap-2 mt-4">';
        foreach ( $slides as $index => $slide ) {
            $active = $index === 0 ? ' bg-primary' : ' bg-zinc-300';
            $html .= '<button type="button" class="tp-carousel-dot h-2 w-2 rounded-full transition-colors' . $active . '" data-slide="' . $index . '" aria-label="Ir a slide ' . ( $index + 1 ) . '"></button>';
        }
        $html .= '</div>';
    }

    $html .= '</div>'; // wrapper

    return $html;
}
