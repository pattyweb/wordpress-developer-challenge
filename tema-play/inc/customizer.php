<?php

function wpdevs_customizer( $wp_customize ){

            $wp_customize->add_section(
                'sec_hero',
                array(
                    'title' => 'Hero Section'
                )
            );


            $wp_customize->add_setting(
                'set_hero_title',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Adicione um Título',
                    'sanitize_callback' => 'sanitize_textarea_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_title',
                array(
                    'label' => 'Hero Title',
                    'description' => 'Escreva seu Título',
                    'section' => 'sec_hero',
                    'type' => 'textarea'
                )
            );  


            $wp_customize->add_setting(
                'set_hero_button_text',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Saiba mais',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text',
                array(
                    'label' => 'Hero button text',
                    'description' => 'Adicione o texto de seu botão',
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );

            $wp_customize->add_setting(
                'set_hero_button_link',
                array(
                    'type' => 'theme_mod',
                    'default' => '#',
                    'sanitize_callback' => 'esc_url_raw'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_link',
                array(
                    'label' => 'Hero button link',
                    'description' => 'Adicione o link do seu botão',
                    'section' => 'sec_hero',
                    'type' => 'url'
                )
            ); 


            $wp_customize->add_setting(
                'set_hero_button_text_1',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Saiba mais',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text_1',
                array(
                    'label' => 'Hero button text',
                    'description' => 'Adicione o texto de seu botão',
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );

            $wp_customize->add_setting(
                'set_hero_button_link_1',
                array(
                    'type' => 'theme_mod',
                    'default' => '#',
                    'sanitize_callback' => 'esc_url_raw'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_link_1',
                array(
                    'label' => 'Hero button link_1',
                    'description' => 'Adicione o link do seu botão',
                    'section' => 'sec_hero',
                    'type' => 'url'
                )
            ); 

            $wp_customize->add_setting(
                'set_hero_button_text_2',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Saiba mais',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text_2',
                array(
                    'label' => 'Hero button text',
                    'description' => 'Adicione o texto de seu botão',
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );


            $wp_customize->add_setting(
                'set_hero_button_link_2',
                array(
                    'type' => 'theme_mod',
                    'default' => '#',
                    'sanitize_callback' => 'esc_url_raw'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_link_2',
                array(
                    'label' => 'Hero button link_2',
                    'description' => 'Adicione o link do seu botão',
                    'section' => 'sec_hero',
                    'type' => 'url'
                )
            ); 
          

            $wp_customize->add_setting(
                'set_hero_background',
                array(
                    'type' => 'theme_mod',
                    'sanitize_callback' => 'absint'
                )
            );

            $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,
                'set_hero_background',
                array(
                    'label' => 'Hero Image',
                    'section'   => 'sec_hero',
                    'mime_type' => 'image'
                )));

}
add_action( 'customize_register', 'wpdevs_customizer' );