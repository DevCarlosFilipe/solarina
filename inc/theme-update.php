<?php

add_action('after_setup_theme', function () {

    // UPDATE CHECKER
    require_once get_template_directory() . '/inc/theme-update-checker/theme-update-checker.php';

    $updateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/DevCarlosFilipe/solarina',
        get_template_directory(),
        'solarina'
    );

    $updateChecker->setBranch('main');

});