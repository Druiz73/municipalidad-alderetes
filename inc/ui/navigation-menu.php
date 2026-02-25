<?php
/**
 * Navigation Menu UI component.
 *
 * Horizontal mega-menu with optional submenus. Uses JS for toggle behavior.
 *
 * Usage:
 *   echo tp_ui_nav_menu([
 *       ['label' => 'Inicio', 'href' => '/'],
 *       [
 *           'label'    => 'Trámites',
 *           'children' => [
 *               ['label' => 'Rentas',   'href' => '/tramites/rentas', 'description' => 'TEM, CISI y más'],
 *               ['label' => 'Tránsito', 'href' => '/tramites/transito'],
 *               ['label' => 'Catastro', 'href' => '/tramites/catastro'],
 *           ],
 *       ],
 *       ['label' => 'Noticias', 'href' => '/noticias'],
 *       ['label' => 'Contacto', 'href' => '/contacto'],
 *   ]);
 */

function tp_ui_nav_menu( $items = [], $attrs = [] ) {
    $class = $attrs['class'] ?? '';

    $html  = '<nav class="tp-nav-menu relative z-10 ' . esc_attr( $class ) . '">';
    $html .= '<ul class="flex items-center gap-1">';

    foreach ( $items as $item ) {
        $label    = $item['label'] ?? '';
        $href     = $item['href'] ?? '#';
        $children = $item['children'] ?? [];

        if ( ! empty( $children ) ) {
            // Item with submenu
            $html .= '<li class="tp-nav-menu-item relative">';

            $html .= '<button type="button" class="tp-nav-menu-trigger group inline-flex h-9 items-center justify-center gap-1 rounded-md px-4 py-2 text-sm font-medium transition-colors hover:bg-zinc-100 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">';
            $html .= esc_html( $label );
            $html .= '<svg class="h-3 w-3 shrink-0 text-muted-foreground transition-transform duration-200 group-[.is-open]:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>';
            $html .= '</button>';

            // Submenu
            $html .= '<div class="tp-nav-menu-content absolute left-0 top-full pt-1 hidden">';
            $html .= '<ul class="grid w-[400px] gap-3 rounded-md border border-border bg-white p-4 shadow-lg md:w-[500px] md:grid-cols-2">';

            foreach ( $children as $child ) {
                $child_label = $child['label'] ?? '';
                $child_href  = $child['href'] ?? '#';
                $child_desc  = $child['description'] ?? '';

                $html .= '<li>';
                $html .= '<a href="' . esc_url( $child_href ) . '" class="block select-none space-y-1 rounded-md p-3 leading-none no-underline transition-colors hover:bg-zinc-100 focus:bg-zinc-100 focus:outline-none">';
                $html .= '<div class="text-sm font-medium leading-none">' . esc_html( $child_label ) . '</div>';

                if ( $child_desc ) {
                    $html .= '<p class="line-clamp-2 text-sm leading-snug text-muted-foreground">' . esc_html( $child_desc ) . '</p>';
                }

                $html .= '</a>';
                $html .= '</li>';
            }

            $html .= '</ul>';
            $html .= '</div>'; // content

            $html .= '</li>';
        } else {
            // Simple link
            $html .= '<li class="tp-nav-menu-item">';
            $html .= '<a href="' . esc_url( $href ) . '" class="inline-flex h-9 items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:bg-zinc-100 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">';
            $html .= esc_html( $label );
            $html .= '</a>';
            $html .= '</li>';
        }
    }

    $html .= '</ul>';
    $html .= '</nav>';

    return $html;
}
