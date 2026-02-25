<?php
/**
 * Table UI component.
 *
 * Styled data table with header, body, footer and caption.
 *
 * Usage:
 *   echo tp_ui_table([
 *       'caption' => 'Listado de infracciones',
 *       'head'    => ['DNI', 'Nombre', 'Fecha', 'Monto'],
 *       'body'    => [
 *           ['12345678', 'Juan Pérez', '15/01/2026', '$5.000'],
 *           ['87654321', 'María López', '20/01/2026', '$3.500'],
 *       ],
 *       'foot' => ['', '', 'Total', '$8.500'],
 *   ]);
 */

function tp_ui_table( $attrs = [] ) {
    $head    = $attrs['head'] ?? [];
    $body    = $attrs['body'] ?? [];
    $foot    = $attrs['foot'] ?? [];
    $caption = $attrs['caption'] ?? '';
    $class   = $attrs['class'] ?? '';

    $html = '<div class="relative w-full overflow-auto">';
    $html .= '<table class="w-full caption-bottom text-sm ' . esc_attr( $class ) . '">';

    // Caption
    if ( $caption ) {
        $html .= '<caption class="mt-4 text-sm text-muted-foreground">' . esc_html( $caption ) . '</caption>';
    }

    // Head
    if ( ! empty( $head ) ) {
        $html .= '<thead class="[&_tr]:border-b"><tr class="border-b transition-colors hover:bg-muted/50">';
        foreach ( $head as $cell ) {
            $html .= '<th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground">';
            $html .= esc_html( $cell );
            $html .= '</th>';
        }
        $html .= '</tr></thead>';
    }

    // Body
    if ( ! empty( $body ) ) {
        $html .= '<tbody class="[&_tr:last-child]:border-0">';
        foreach ( $body as $row ) {
            $html .= '<tr class="border-b transition-colors hover:bg-muted/50">';
            foreach ( $row as $cell ) {
                $html .= '<td class="p-2 align-middle">' . esc_html( $cell ) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
    }

    // Footer
    if ( ! empty( $foot ) ) {
        $html .= '<tfoot class="border-t bg-muted/50 font-medium"><tr>';
        foreach ( $foot as $cell ) {
            $html .= '<td class="p-2 align-middle">' . esc_html( $cell ) . '</td>';
        }
        $html .= '</tr></tfoot>';
    }

    $html .= '</table>';
    $html .= '</div>';

    return $html;
}

/**
 * Table with raw HTML cells (for links, badges, actions, etc.).
 *
 * Usage:
 *   echo tp_ui_table_raw([
 *       'head' => ['DNI', 'Nombre', 'Acciones'],
 *       'body' => [
 *           ['12345678', 'Juan Pérez', '<a href="/detalle/1">Ver</a>'],
 *       ],
 *   ]);
 */
function tp_ui_table_raw( $attrs = [] ) {
    $head    = $attrs['head'] ?? [];
    $body    = $attrs['body'] ?? [];
    $foot    = $attrs['foot'] ?? [];
    $caption = $attrs['caption'] ?? '';
    $class   = $attrs['class'] ?? '';

    $html = '<div class="relative w-full overflow-auto">';
    $html .= '<table class="w-full caption-bottom text-sm ' . esc_attr( $class ) . '">';

    if ( $caption ) {
        $html .= '<caption class="mt-4 text-sm text-muted-foreground">' . wp_kses_post( $caption ) . '</caption>';
    }

    if ( ! empty( $head ) ) {
        $html .= '<thead class="[&_tr]:border-b"><tr class="border-b transition-colors hover:bg-muted/50">';
        foreach ( $head as $cell ) {
            $html .= '<th class="h-10 px-2 text-left align-middle font-medium text-muted-foreground">' . wp_kses_post( $cell ) . '</th>';
        }
        $html .= '</tr></thead>';
    }

    if ( ! empty( $body ) ) {
        $html .= '<tbody class="[&_tr:last-child]:border-0">';
        foreach ( $body as $row ) {
            $html .= '<tr class="border-b transition-colors hover:bg-muted/50">';
            foreach ( $row as $cell ) {
                $html .= '<td class="p-2 align-middle">' . wp_kses_post( $cell ) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
    }

    if ( ! empty( $foot ) ) {
        $html .= '<tfoot class="border-t bg-muted/50 font-medium"><tr>';
        foreach ( $foot as $cell ) {
            $html .= '<td class="p-2 align-middle">' . wp_kses_post( $cell ) . '</td>';
        }
        $html .= '</tr></tfoot>';
    }

    $html .= '</table>';
    $html .= '</div>';

    return $html;
}
