<?php

require get_template_directory() . '/inc/customizer.php';

function wpdevs_load_scripts(){
    wp_register_style('styles', get_template_directory_uri() . '/style.css', array(), 1, 'all');
    wp_enqueue_style('styles');
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('slick-slide', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('icon-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('frame-script', get_template_directory_uri() . '/js/frame-script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
    wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true);
}
add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts', 20 );
add_theme_support( 'post-thumbnails' );
add_theme_support('custom-logo', array(
    'width' => 75,
    'height' => 25,
    'flex-height' => true,
    'flex-widht' => true
));


        add_theme_support('menus');

        register_nav_menus(

            array(
                'top-menu' => 'Top Menu',
                'custom-menu' => 'Custom Menu'
            )
            );

              // Ability to add classes to wp_nav_menu LI tags

        add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

        function add_additional_class_on_li($classes, $item, $args)
        {
            if (isset($args->add_li_class))
            {
                $classes[] = $args->add_li_class;
            }
            return $classes;
        }

        add_filter( 'nav_menu_link_attributes', 'add_link_atts');

        function add_link_atts($atts) 
        { 
                $atts['class'] = "nav-link"; 
                return $atts;
        } 


        function custom_video_post_type() {
            $labels = array(
                'name'               => 'Vídeos',
                'singular_name'      => 'Vídeo',
                'menu_name'          => 'Vídeos',
                'add_new'            => 'Adicionar Novo Vídeo',
                'add_new_item'       => 'Adicionar Novo Vídeo',
                'edit_item'          => 'Editar Vídeo',
                'new_item'           => 'Novo Vídeo',
                'view_item'          => 'Ver Vídeo',
                'search_items'       => 'Buscar Vídeos',
                'not_found'          => 'Nenhum vídeo encontrado',
                'not_found_in_trash' => 'Nenhum vídeo encontrado na lixeira',
            );
        
            $args = array(
                'labels'              => $labels,
                'public'              => true,
                'has_archive'         => true,
                'publicly_queryable'  => true,
                'query_var'           => true,
                'rewrite'             => array('slug' => 'video'),
                'capability_type'     => 'post',
                'hierarchical'        => false,
                'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
            );
        
            register_post_type('video', $args);
        }
        
        add_action('init', 'custom_video_post_type');

        function custom_video_taxonomy() {
            $labels = array(
                'name'              => 'Tipos de Vídeo',
                'singular_name'     => 'Tipo de Vídeo',
                'search_items'      => 'Buscar Tipos de Vídeo',
                'all_items'         => 'Todos os Tipos de Vídeo',
                'parent_item'       => 'Tipo de Vídeo Pai',
                'parent_item_colon' => 'Tipo de Vídeo Pai:',
                'edit_item'         => 'Editar Tipo de Vídeo',
                'update_item'       => 'Atualizar Tipo de Vídeo',
                'add_new_item'      => 'Adicionar Novo Tipo de Vídeo',
                'new_item_name'     => 'Novo Nome do Tipo de Vídeo',
                'menu_name'         => 'Tipos de Vídeo',
            );
        
            $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array('slug' => 'video_type'),
            );
        
            register_taxonomy('video_type', array('video'), $args);
        }
        
        add_action('init', 'custom_video_taxonomy');

        function add_custom_fields_to_video() {
            add_meta_box('video_duration', 'Tempo de Duração', 'render_video_duration_field', 'video', 'normal', 'high');
            add_meta_box('video_embed', 'Embed de Vídeo', 'render_video_embed_field', 'video', 'normal', 'high');
        }
        
        function render_video_duration_field() {
            $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
            echo '<input type="text" name="bx_play_video_duration" value="' . esc_attr($video_duration) . '" />';
        }
        
        function render_video_embed_field() {
            $video_embed = get_post_meta(get_the_ID(), 'bx_play_video_ID', true);
            echo '<input type="text" name="bx_play_video_ID" value="' . esc_url($video_embed) . '" />';
        }
        
        function save_custom_fields_for_video($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
            if ($post_id && isset($_POST['bx_play_video_duration'])) {
                update_post_meta($post_id, 'bx_play_video_duration', sanitize_text_field($_POST['bx_play_video_duration']));
            }
            if ($post_id && isset($_POST['bx_play_video_ID'])) {
                update_post_meta($post_id, 'bx_play_video_ID', esc_url($_POST['bx_play_video_ID']));
            }
        }
        
        add_action('add_meta_boxes', 'add_custom_fields_to_video');
        add_action('save_post', 'save_custom_fields_for_video');
        
            
            