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

<header class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
<img class="rounded-circle" width = "100px" height = "100px" src="<?php echo get_template_directory_uri(); ?>/img/DALL·E 2025-03-08 15.13.13 - A minimalist vinyl record logo with red lines on a black background. The vinyl record is simple, with a circular shape and grooves represented by slee.webp" alt="Logo vinilo">
                    <a class="navbar-brand text-danger" href="#"><?php bloginfo('name'); ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link link-danger" href="#"><?php wp_nav_menu(array('theme_location' => 'header')); ?></a>
                            </li>
                            <li>                
                                <?php if (is_user_logged_in() == false){?>
                                    <a class = "link-danger" href="<?php echo wp_registration_url(); ?>">Regístrate</a>
                              <?php }else{ ?>
                             
                        
                                    <a class = "link-danger" href="<?php echo wp_logout_url('http://localhost/wordpress/index.php/inicio/'); ?>">Cerrar sesión</a>
                             
                                <?php }?>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>