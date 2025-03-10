<?php
add_theme_support('post-thumbnails');

function cv_registrar_menu(){
    register_nav_menu('header', __('Menú de la cabecera') ); 
} 

add_action('init', 'cv_registrar_menu')

?>