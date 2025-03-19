<?php
//añado soporte para el logo e imagenes destacadas de la web y posts
add_theme_support('post-thumbnails');

include_once("walker_nav_menu.php");

// añade soporte para el menu
function cv_registrar_menu(){
    register_nav_menu('header', __('Menú de la cabecera') ); 
} 
//el menu aparecerá en el inicio
add_action('init', 'cv_registrar_menu');

//funcion para enlazar los estilos bootstrap
function cv_add_theme_scripts(){
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap.js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
}
add_action('wp_enqueue_scripts', 'cv_add_theme_scripts');

?>

