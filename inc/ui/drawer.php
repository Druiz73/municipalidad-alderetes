<?php
/**
 * Drawer UI component.
 *
 * Bottom sheet / drawer using native <dialog> + CSS.
 * Slides up from the bottom on mobile, useful for menus and filters.
 *
 * Usage:
 *   echo tp_ui_drawer_trigger('my-drawer', 'Abrir menú');
 *
 *   echo tp_ui_drawer([
 *       'id'          => 'my-drawer',
 *       'title'       => 'Menú',
 *       'description' => 'Seleccione una opción',
 *       'content'     => '<nav>...</nav>',
 *       'footer'      => '<button class="tp-dialog-close w-full ...">Cerrar</button>',
 *   ]);
 */

function tp_ui_drawer( $attrs = [] ) {
    static $counter = 0;
    $counter++;

    $id          = $attrs['id'] ?? 'tp-drawer-' . $counter;
    $title       = $attrs['title'] ?? '';
    $description = $attrs['description'] ?? '';
    $content     = $attrs['content'] ?? '';
    $footer      = $attrs['footer'] ?? '';
    $class       = $attrs['class'] ?? '';

    $html  = '<dialog id="' . esc_attr( $id ) . '" class="tp-drawer ' . esc_attr( $class ) . '">';

    // Handle bar
    $html .= '<div class="mx-auto mt-4 h-2 w-[100px] rounded-full bg-zinc-200"></div>';

    // Header
    if ( $title || $description ) {
        $html .= '<div class="grid gap-1.5 p-4 text-center sm:text-left">';
        if ( $title ) {
            $html .= '<h2 class="text-lg font-semibold leading-none tracking-tight">' . esc_html( $title ) . '</h2>';
        }
        if ( $description ) {
            $html .= '<p class="text-sm text-muted-foreground">' . esc_html( $description ) . '</p>';
        }
        $html .= '</div>';
    }

    // Content
    if ( $content ) {
        $html .= '<div class="p-4">' . wp_kses_post( $content ) . '</div>';
    }

    // Footer
    if ( $footer ) {
        $html .= '<div class="mt-auto flex flex-col gap-2 p-4">';
        $html .= wp_kses_post( $footer );
        $html .= '</div>';
    }

    $html .= '</dialog>';

    return $html;
}

function tp_ui_drawer_trigger( $drawer_id, $text, $attrs = [] ) {
    $class = $attrs['class'] ?? '';

    $html  = '<button type="button" class="tp-dialog-trigger ' . esc_attr( $class ) . '"';
    $html .= ' data-dialog-target="' . esc_attr( $drawer_id ) . '"';
    $html .= '>';
    $html .= esc_html( $text );
    $html .= '</button>';

    return $html;
}
