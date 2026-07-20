<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Reduce public WordPress fingerprinting.
 */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Do not expose login names through the public REST API.
 */
add_filter('rest_endpoints', function (array $endpoints): array {
    if (is_user_logged_in()) {
        return $endpoints;
    }

    foreach (array_keys($endpoints) as $route) {
        if (preg_match('#^/wp/v2/users(?:/|$)#', $route)) {
            unset($endpoints[$route]);
        }
    }

    return $endpoints;
});

/**
 * Author archives disclose the login slug even when the REST route is hidden.
 */
add_action('template_redirect', function (): void {
    if (is_author() && !is_user_logged_in()) {
        wp_safe_redirect(home_url('/'), 301);
        exit;
    }
}, 1);

/**
 * Baseline headers that are safe for the current theme and external embeds.
 * A strict CSP is intentionally omitted until every third-party asset is mapped.
 */
add_filter('wp_headers', function (array $headers): array {
    $headers['X-Content-Type-Options'] = 'nosniff';
    $headers['X-Frame-Options']        = 'SAMEORIGIN';
    $headers['Referrer-Policy']        = 'strict-origin-when-cross-origin';
    $headers['Permissions-Policy']     = 'camera=(), microphone=(), geolocation=()';

    return $headers;
});
