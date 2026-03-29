<?php

// Captura erros no shutdown
function solarina_capture_errors() {

    if (is_admin()) return;

    $error = error_get_last();

    if ($error !== NULL) {

        // Evita loop infinito
        if (isset($_GET['erro'])) return;

        set_transient('solarina_last_error', print_r($error, true), 60);

        wp_redirect(home_url('/erro?erro=1'));
        exit;
    }
}

add_action('shutdown', 'solarina_capture_errors');


// Criar rota /erro
function solarina_rewrite_error() {
    add_rewrite_rule('^erro/?$', 'index.php?solarina_error=1', 'top');
}
add_action('init', 'solarina_rewrite_error');


// Query var
function solarina_query_vars($vars) {
    $vars[] = 'solarina_error';
    return $vars;
}
add_filter('query_vars', 'solarina_query_vars');


// Carregar template
function solarina_template_redirect() {

    if (get_query_var('solarina_error')) {

        include get_template_directory() . '/error.php';
        exit;
    }
}

add_action('template_redirect', 'solarina_template_redirect');