<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if ( ! defined( 'WPESTATE_CHLD_THEME_DIRECTORY_URL' ) ) {
    define( 'WPESTATE_CHLD_THEME_DIRECTORY_URL', get_template_directory_uri() );
}

if ( ! defined( 'WPESTATE_CHLD_THEME_DIRECTORY_PATH' ) ) {
    define( 'WPESTATE_CHLD_THEME_DIRECTORY_PATH', get_stylesheet_directory_uri() );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'twentytwenty-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), 
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-ttt-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );

    wp_enqueue_script( 'forms_action', get_stylesheet_directory_uri() . '/assets/js/theme.js', array('jquery'), time(), true ); // :)
}


// add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
// function my_scripts_method() {
// 	// отменяем зарегистрированный jQuery
// 	// вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
// 	wp_deregister_script( 'jquery-core' );
// 	wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.6.1.min.js');
// 	wp_enqueue_script( 'jquery' );
// }

// ********************* Custom post type Публикация **************************

add_action( 'init', 'create_posttype' );

function create_posttype() {
    register_post_type( 'publication',
        array(
                'labels' => array(
                'name' => __( 'Публикация' ),
                'singular_name' => __( 'Публикация' ),
                'add_new' => __('Новая Публикация'), 
            ),
            'menu_position' => 4,
            'supports' => array('title', 'thumbnail'),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-welcome-widgets-menus',
        )

    );


}


// ********************* Принимаем данные из формы и отправляем на Email  **************************

function create_formToemail(){
    $recepient = "chebykin.m94@gmail.com";
    $siteName = "projecttest";

    $name = trim($_POST["title"]);
    $email = trim($_POST["email"]);
    $message = "Заголовок: $title \nИмейл: $email";

    $pagetitle = "Заявка с сайта \"$siteName\"";
    mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
}








?>