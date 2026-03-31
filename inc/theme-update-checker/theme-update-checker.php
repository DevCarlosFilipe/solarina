<?php
require_once __DIR__ . '/plugin-update-checker.php';

if ( !class_exists('Puc_v4_Factory') ) {
    class Puc_v4_Factory {
        public static function buildUpdateChecker($metadataUrl, $pathToFile, $slug) {
            return \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker($metadataUrl, $pathToFile, $slug);
        }
    }
}
