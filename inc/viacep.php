<?php
add_action(
    'wp_enqueue_scripts',
    function () {

        wp_enqueue_script(
            'viacep',
            'https://viacep.com.br/ws/',
            [],
            null,
            true
        );

    }
);