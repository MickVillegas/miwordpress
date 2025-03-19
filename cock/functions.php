<?php
//añado soporte para el logo e imagenes destacadas de la web y posts
add_theme_support('post-thumbnails');

include_once("walker_nav_menu.php");

// este metodo ayuda a que el menú sea automático generando los ítems desde el backend
function cv_registrar_menu(){
    register_nav_menu('header', __('Menú de la cabecera') ); 
} 
//el menu aparecerá en el inicio
add_action('init', 'cv_registrar_menu');

?>

