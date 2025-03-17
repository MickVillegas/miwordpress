<?php
//añado soporte para el logo de la web
add_theme_support('post-thumbnails');

include_once("walker_nav_menu.php");

// una funcion para mostrar el menu en la pagina
function cv_registrar_menu(){
    register_nav_menu('header', __('Menú de la cabecera') ); 
} 
//el menu aparecerá en el inicio
add_action('init', 'cv_registrar_menu');

?>

