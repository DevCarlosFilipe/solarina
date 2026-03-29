<?php

function solarina_customize_register($wp_customize) {

    $wp_customize->add_section('hero_section', [
        'title' => 'Hero Slider',
        'priority' => 30,
    ]);

    for ($i = 1; $i <= 3; $i++) {

        // Imagem
        $wp_customize->add_setting("hero_{$i}_image");
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                "hero_{$i}_image",
                [
                    'label' => "Imagem Slide {$i}",
                    'section' => 'hero_section'
                ]
            )
        );

        // Título
        $wp_customize->add_setting("hero_{$i}_title");
        $wp_customize->add_control("hero_{$i}_title", [
            'label' => "Título Slide {$i}",
            'section' => 'hero_section',
            'type' => 'text'
        ]);

        // Texto
        $wp_customize->add_setting("hero_{$i}_text");
        $wp_customize->add_control("hero_{$i}_text", [
            'label' => "Texto Slide {$i}",
            'section' => 'hero_section',
            'type' => 'textarea'
        ]);

        // Link
        $wp_customize->add_setting("hero_{$i}_link");
        $wp_customize->add_control("hero_{$i}_link", [
            'label' => "Link Slide {$i}",
            'section' => 'hero_section',
            'type' => 'url'
        ]);
    }
}

add_action('customize_register', 'solarina_customize_register');