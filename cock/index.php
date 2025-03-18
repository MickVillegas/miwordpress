<!--Obtiene la cabecera creada en header.php-->
<?php get_header();?>

<!--Si la pagina actual es la de inicio hace lo siguiente-->
<?php if(is_page('Inicio')){?>
    <!--Crea un carrusel sin botones con 3 imagenes-->
    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img width = "100%" height = "30%" src="<?php echo get_template_directory_uri(); ?>/img/anuncio1.jpg" alt="cartel bienvenida">
                </div>
                <div class="carousel-item">
                    <img width = "100%" height = "30%" src="<?php echo get_template_directory_uri(); ?>/img/anuncio2.jpg" alt="Anuncio ventas vinilos">
                </div>
                <div class="carousel-item">
                    <img width = "100%" height = "30%" src="<?php echo get_template_directory_uri(); ?>/img/anuncio3.jpg" alt="descuentos en vinilos">
                </div>
            </div>
        </div>
    </div>
    <!--Crea una seccion donde aparece el titulo de la pagina actual con get_title() y una linea-->
    <div class="container">
        <section class="row">
            <div class="p-5 rounded-lg m-3 bg-danger text-light">
                <h1 class="display-4"><?php the_title();?></h1>
                <p class="lead">Lo más destacado</p>
                <hr class="my-4">
            </div>
        </section>
    </div>


   
    <!--Crea otra seccion pero mostrando las entradas creadas en columnas-->
    <section class="me-5 ms-5" style = "background-color:rgb(122, 122, 122);">
        <header class="row">
        </header>
        <section class="row d-flex justify-content-center">
        <?php
        //post_id será usado para obtener las id de los posts
            $post_id = 0; 
            //mientras post_id sea menor que 20 obtendrá un post con la id actual con get_post
            while($post_id < 20){
                $post = get_post($post_id);
                if($post){
                    //si el post obtenido es de tipo post lo muestra, obteniendo su titulo (post_title), obteniendo su contenido (post_content) y obtiene el link del post con get_permalink al que se le asociará un boton
                    if ($post->post_type == 'post') {
                        echo '<article class="border border-light bg-dark text-danger col-md-3 me-5 ms-5 pe-5 ps-5 pt-3 mt-5 mb-5">
                                <div class="caption">';
                                    echo '<h2 class="text-center">' . $post->post_title . '</h2>';
                                    if(has_post_thumbnail()){
                                        the_post_thumbnail('full');
                                    }
                                    echo '<p class="text-start">' . substr(the_excerpt(), 0, 200) . '</p>';
                                    $post_link = get_permalink($post_id);
                                    echo "<p><a href='$post_link' class='btn btn-outline-danger'>Leer más</a></p>
                                </div>
                            </article>";
                    }
                }
                //post_id aumenta un numero más que será usado para volver a buscar un popst con la nueva id que guarda esta variable
                $post_id = $post_id + 1;
        }?>
        </section>
        </section>

<!--Si la pagina es contactanos-->
<?php }        
 else if(is_page('Contactanos')){?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class="container">
        <section class="row">
            <div style = "background-color:rgb(68, 68, 68);" class="p-5 rounded-lg m-3 text-danger">
                <h1 class="display-4"><?php the_title();?></h1>
                <p class="lead">Envianos un mensaje</p>
                <hr class="my-4">
            </div>
        </section>
        <!--Y crea un formulario donde el usuario debe poner nombre, apellidos, su correo y el mensaje que quiere mandar-->
        <section class="container" style = "background-color:rgb(68, 68, 68);">
            <header class="row">
            </header>
            <form class = "text-danger">
                <fieldset disabled>
                    <legend>Escriba sus datos y la razon de su mensaje</legend>
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre:</label>
                        <input type="text" id="Nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="Apellidos" class="form-label">Apellidos:</label>
                        <input type="text" id="Apellidos" class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo Electronico:</label>
                        <input type="text" id="Correo" class="form-control" placeholder="@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <br>
                        <textarea style = "width: 600px; height: 350px;" id="mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </fieldset>
            </form>
        </section>
    </div>
<?php }
//Si la página es Tienda
else if(is_page('Tienda')){?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class = "container">
    <section class="row">
        <div style = "background-color:rgb(68, 68, 68);" class="p-5 rounded-lg m-3 text-danger">
            <h1 class="display-4"><?php the_title();?></h1>
            <p class="lead">Encuentra cualquier vinilo de tu artista favorito</p>
            <hr class="my-4">
        </div>
    </section>

    <?php
$query = new WP_Query(array('post_type' => 'post'));
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();?>
      <h3 class = "bg-danger"><?php the_title(); ?></h3>
      <?php                        
      if(has_post_thumbnail()){                    
        the_post_thumbnail('full');
        }?>
        <div class = "text-danger">
        <p><?php substr(the_excerpt(), 0, 200)?></p>
        </div>
        <p><a href= <?php get_permalink();?> class='btn btn-outline-danger'>Leer más</a></p>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    _e('No hay entradas disponibles.', 'IES Celia Viñas');
endif;
?>

    <section class="row d-flex justify-content-center" style = "background-color:rgb(68, 68, 68);">
    <?php
    //post_id será usado para obtener las id de los posts
        $post_id = 0;
        //mientras post_id sea menor que 20 obtendrá un post con la id actual con get_post
        while($post_id < 20){
            $post = get_post($post_id);
            //si el post obtenido es de tipo post lo muestra, obteniendo su titulo (post_title), obteniendo su contenido (post_content) y obtiene el link del post con get_permalink al que se le asociará un boton
            if($post){
                if ($post->post_type == 'post') {?>
                   <article class="border border-light bg-dark text-danger col-md-3 me-5 ms-5 pe-5 ps-5 pt-3 mt-5 mb-5">
                    <div class="caption">
                       <h2 class="text-center"> <?php the_title();?></h2>
                       <?php
                        if(has_post_thumbnail()){
                        the_post_thumbnail('full');
                        }
                       ?>

                        <p class="text-start"> <?php substr(the_excerpt(), 0, 200)?></p>

                        <?php 
                        $post_link = get_permalink($post_id);
                        echo "<p><a href='$post_link' class='btn btn-outline-danger'>Leer más</a></p>
                    </div>
                </article>";
                }
            }
            //post_id aumenta un numero más que será usado para volver a buscar un popst con la nueva id que guarda esta variable
            $post_id = $post_id + 1;
        }
    ?>
    </section>
    </div>
<!--Si no es ninguna de las paginas anteriores significa que se quiere acceder al contenido de un post-->  
<?php } else{?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class = "row">
        <div class = "col-md-5 me-3 ms-5" style = "background-color: #212121;">
            <header>
                <h1 class="display-4 text-danger"><?php the_title();?></h1>
            </header>
            <div class = "text-danger">
                <p><?php the_content();?></p>
            </div>
        </div>
        <div class = "col-md-5 text-danger me-3 ms-3" style = "background-color: #212121;">
            <!--Obtiene el titulo del post para hacer una consulta a la base de datos-->
            <?php $post_nombre = the_title(); 
            //busca las categorias asociadas al post 
            $categories = get_the_category($post_nombre);
            //si la variable no está vacía significa que el post tiene categorías, recorre cada una de sus categoría y hace una lista con las categorias del post
            if (!empty($categories)) {
                echo "<p>Categorías de la entrada:</p><ul>";
                foreach ($categories as $category) {
                    echo "<li>" . $category->name . "</li>";
                }
                echo "</ul>";
            } ?>
        </div>
    </div>

<br>
<?php
    //comprueba que el usuario esté registrado con is_user_logged_in(), si no lo está (es falso) no aparecerá la caja de comentarios, pero si un enlace que lo lleva a la página para registrarse o iniciar sesion  
    if (is_user_logged_in() == false){?>
        <a class = "link-danger" href="<?php echo wp_registration_url(); ?>">Regístrate para comentar</a>
    <?php }else{ 
        //si está registrado verifica si los comentarios están habilitados con comments_open() y muestra la caja de comentarios con comments_template()
        if (comments_open()) { 
            comments_template(); 
        }
    }
    ?>
    <br>
    <!--Hago una consulta con el titulo de la página para obtener el número total de comentarios hechos con get_comments_number()-->
    <?php $post_nombre = the_title();
    echo "<h2 class = 'text-danger'>Comentarios(" . get_comments_number($post_nombre) . ")</h2><br><br>";
   //hago una consulta haciendo uso del nombre del titulo del post para obtener los comentarios
    $comments;
    $post_nombre = the_title();
    //si el numero total de comentarios es distinto a 0 significa que hay comentarios, obtengo los comentarios con get_comments() y le paso un array por parametros con las condiciones de la consulta
    //donde lepaso la id del post para obtener los comentarios de la entrada, solo mostrará comentarios aprobados y el orden como los muestra será ascendente 
    if(get_comments_number($post_nombre) != 0){
        $comments = get_comments(array(
        'post_id' => $post_nombre, 
        'status'  => 'approve', 
        'order'   => 'ASC'
    ));
    //si exsisten los comentarios los recorro y los pinto
    if ($comments) {
        foreach ($comments as $comment) {
            echo "<div class = 'text-danger'><p><h3>" . $comment->comment_author . "</h3><br></strong>" . $comment->comment_content . "</p><hr></div>";
        }
    } else {
        echo "<p>No hay comentarios en esta publicación.</p>";
    }
    }
?>
<?php }?>

<br>
<br>
<!--Obtiene el footer creado en footer.php-->
<?php get_footer();?>