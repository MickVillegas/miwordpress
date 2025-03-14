<?php
add_theme_support('post-thumbnails');

include_once("walker_nav_menu.php");

function cv_registrar_menu(){
    register_nav_menu('header', __('Menú de la cabecera') ); 
} 

add_action('init', 'cv_registrar_menu');

?>

