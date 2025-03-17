<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style = "background-color: #0a0a0a;">

<!--El navbar de la web, que pinta el nombre de la web con bloginfo('name')-->

<nav class="navbar navbar-expand-md navbar-light bg-danger pt-5 pb-5">
    <div class="container-fluid">
        <a class="navbar-brand ms-3 text-light" href="#"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse ms-3" id="main-menu">

            <!--Crea los enlaces a las distintas páginas y categorias creadas en wordpress-->

            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
            <!--La barra de busqueda con su boton buscar-->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <button class="btn btn-outline-light me-3 ms-5">
            <!--Link para cerrar o iniciar sesion, donde si el usuario está registrado, se mostrará el enlace cerrar sesion-->
            <!--Si el usuario no ha iniciado sesion se mostrará el link para que cree una cuenta nueva o inicie sesion-->
            <?php if (is_user_logged_in() == false){?>
            <a class = "link-light" href="<?php echo wp_registration_url(); ?>">Regístrate</a>
            <?php }else{ ?>
                <a class = "link-light" href="<?php echo wp_logout_url('http://localhost/wordpress/index.php/inicio/'); ?>">Cerrar sesión</a>
            <?php }?>
            </button>
        </div>
    </div>
</nav>

<br>

