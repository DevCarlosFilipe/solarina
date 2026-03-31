<?php

require_once get_template_directory() . '/inc/theme-update-checker/theme-update-checker.php';

$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/DevCarlosFilipe/solarina',
    get_template_directory() . '/style.css',
    'solarina'
);

$updateChecker->setBranch('main');