<?php
/**
 * Pagination UI component.
 *
 * Usage:
 *   echo tp_ui_pagination([
 *       'current_page' => 3,
 *       'total_pages'  => 10,
 *       'base_url'     => '/noticias?page=%d',
 *   ]);
 *
 *   // With WP paged
 *   echo tp_ui_pagination([
 *       'current_page' => get_query_var('paged', 1),
 *       'total_pages'  => $wp_query->max_num_pages,
 *       'base_url'     => get_pagenum_link() . '%d',
 *   ]);
 */

function tp_ui_pagination( $attrs = [] ) {
    $current  = max( 1, intval( $attrs['current_page'] ?? 1 ) );
    $total    = max( 1, intval( $attrs['total_pages'] ?? 1 ) );
    $base_url = $attrs['base_url'] ?? '?page=%d';
    $class    = $attrs['class'] ?? '';

    if ( $total <= 1 ) {
        return '';
    }

    $link_base = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring h-9 px-4 py-2';
    $link_default  = $link_base . ' border border-border bg-white shadow-sm hover:bg-zinc-100';
    $link_active   = $link_base . ' bg-primary text-white shadow hover:bg-primary/90';
    $link_disabled = $link_base . ' pointer-events-none opacity-50';
    $ellipsis_cls  = 'flex h-9 w-9 items-center justify-center';

    $chevron_left  = '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>';
    $chevron_right = '<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';

    $html = '<nav role="navigation" aria-label="paginación" class="mx-auto flex w-full justify-center ' . esc_attr( $class ) . '">';
    $html .= '<ul class="flex flex-row items-center gap-1">';

    // Previous
    if ( $current > 1 ) {
        $html .= '<li>';
        $html .= '<a href="' . esc_url( sprintf( $base_url, $current - 1 ) ) . '" class="' . esc_attr( $link_default ) . '" aria-label="Página anterior">';
        $html .= $chevron_left . ' <span class="hidden sm:inline">Anterior</span>';
        $html .= '</a></li>';
    } else {
        $html .= '<li><span class="' . esc_attr( $link_disabled ) . '" aria-disabled="true">';
        $html .= $chevron_left . ' <span class="hidden sm:inline">Anterior</span>';
        $html .= '</span></li>';
    }

    // Page numbers
    $pages = tp_ui_pagination_range( $current, $total );

    foreach ( $pages as $page ) {
        if ( $page === '...' ) {
            $html .= '<li><span class="' . esc_attr( $ellipsis_cls ) . '" aria-hidden="true">&hellip;</span></li>';
        } elseif ( (int) $page === $current ) {
            $html .= '<li><span class="' . esc_attr( $link_active ) . '" aria-current="page">' . $page . '</span></li>';
        } else {
            $html .= '<li><a href="' . esc_url( sprintf( $base_url, $page ) ) . '" class="' . esc_attr( $link_default ) . '">' . $page . '</a></li>';
        }
    }

    // Next
    if ( $current < $total ) {
        $html .= '<li>';
        $html .= '<a href="' . esc_url( sprintf( $base_url, $current + 1 ) ) . '" class="' . esc_attr( $link_default ) . '" aria-label="Página siguiente">';
        $html .= '<span class="hidden sm:inline">Siguiente</span> ' . $chevron_right;
        $html .= '</a></li>';
    } else {
        $html .= '<li><span class="' . esc_attr( $link_disabled ) . '" aria-disabled="true">';
        $html .= '<span class="hidden sm:inline">Siguiente</span> ' . $chevron_right;
        $html .= '</span></li>';
    }

    $html .= '</ul></nav>';

    return $html;
}

/**
 * Calculate which page numbers to show: 1 ... 4 5 [6] 7 8 ... 20
 */
function tp_ui_pagination_range( $current, $total, $delta = 2 ) {
    $range  = [];
    $left   = max( 2, $current - $delta );
    $right  = min( $total - 1, $current + $delta );

    // Always include page 1
    $range[] = 1;

    if ( $left > 2 ) {
        $range[] = '...';
    }

    for ( $i = $left; $i <= $right; $i++ ) {
        $range[] = $i;
    }

    if ( $right < $total - 1 ) {
        $range[] = '...';
    }

    // Always include last page
    if ( $total > 1 ) {
        $range[] = $total;
    }

    return $range;
}
