<?php

function solarina_sanitize_image($image)
{
    if (is_numeric($image)) {
        return absint($image);
    }

    return esc_url_raw($image);
}

function solarina_customize_register($wp_customize)
{

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

    $wp_customize->add_setting('solarina_white_logo', array(
        'default' => '',
        'sanitize_callback' => 'solarina_sanitize_image',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'solarina_white_logo',
            [
                'label' => 'Logo Branca',
                'section' => 'title_tagline',
                'settings' => 'solarina_white_logo',
                'description' => 'Logo usada no menu transparente, se definida.',
            ]
        )
    );

    $wp_customize->add_section('solarina_social_section', array(
        'title' => 'Redes Sociais',
        'priority' => 30,
    ));

    $wp_customize->add_setting('solarina_instagram', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('solarina_instagram', array(
        'label' => 'Instagram (@usuario)',
        'section' => 'solarina_social_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'solarina_customize_register');

function solarina_theme_setup() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
}
add_action('after_setup_theme', 'solarina_theme_setup');