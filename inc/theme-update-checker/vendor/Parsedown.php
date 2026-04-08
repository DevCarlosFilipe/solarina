<?php

class Parsedown {
    protected static $instance;

    public static function instance() {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function text($text) {
        if ( !is_string($text) ) {
            return '';
        }

        $text = str_replace("\r\n", "\n", $text);
        $text = htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
        return nl2br($text);
    }
}
