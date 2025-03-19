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
    <div class="container mt-5">
        <section class="row">
            <div class="p-5 rounded-lg m-3 bg-danger text-light">
                <h1 class="display-4 fs-1"><?php the_title();?></h1>
                <p class="lead">Lo más destacado</p>
                <hr class="my-4">
            </div>
        </section>
    </div>


   
    <!--Seccion para mostrar los posts-->
    <section class="row d-flex justify-content-center mt-5" style = "background-color:rgb(68, 68, 68);">
    <?php
    //he hecho uso de una consulta para que me traiga todos aquellos posts que sean de tipo post, ya que en phpMyAdmin las paginas y los posts se guardan bajo la misma tabla
    $query = new WP_Query(array('post_type' => 'post'));
        //entonces en el if y en el while le digo que si hay posts y mientras hayan posts que me de el post actual ($query->the_post())
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();?>

            <div class="card col-md-3 border border-light bg-dark text-danger col-md-3 me-5 ms-5 pe-5 ps-5 pt-3 mt-5 mb-5" style="width: 18rem;">
                <?php
                //si el post tiene imagenes destacadas me los muestra con su tamaño completo, mis imagenes miden 200x200 px
                    if(has_post_thumbnail()){                    
                        the_post_thumbnail('full');
                    }?>
                <div class="card-body">
                    <!--Uso el titulo del post actual para ponerlo como cabecero-->
                    <h5 class="card-title text-center"><?php the_title(); ?></h5>
                    <hr>
                    <!--Con substr puedo conseguir que no me muestre todo el contenido del post-->
                    <p class="card-text"><?php substr(the_excerpt(), 0, 200)?></p>
                    <?php 
                    echo "<div hidden>";
                    //obtengo la id del post actual para poder tener un link directo al post y su contenido con get_permalink(the_ID()), la variable lo uso para el boton, ya que al pulsarlo nos llevará a la página del post
                    $id_post = get_permalink(the_ID());
                    echo "</div>";
                    echo "<br><a href='$id_post' class='btn btn-outline-danger mb-3'>Leer más</a>"
                    ?>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
else :
    _e('No hay entradas disponibles.', 'IES Celia Viñas');
endif;
?>
</section>

<!--Si la pagina es contactanos-->
<?php }        
 else if(is_page('Contactanos')){?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class="container mt-5">
        <section class="row">
            <div class="p-5 rounded-lg m-3 text-light bg-danger">
                <h1 class="display-4 fs-1"><?php the_title();?></h1>
                <p class="lead">Envianos un mensaje</p>
                <hr class="my-4">
            </div>
        </section>
    </div>
        <!--Y crea un formulario donde el usuario debe poner nombre, apellidos, su correo y el mensaje que quiere mandar-->
        <section class="mt-5" style = "background-color:rgb(68, 68, 68);">
            <form class = "text-danger pt-5 pb-5">
            <div class="row border border-light pt-5 pb-5 pe-3 ps-3 me-5 ms-5" style = "background-color: #212121;">

                <div class = "col-md-6">
                <fieldset disabled>
                    <legend class = "fs-3">Escriba sus datos</legend>
                    <hr>
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
                    </div>
                    <div class = "col-md-6">
                    <div class="mb-3">
                        <label for="mensaje" class="form-label fs-3">Mensaje</label>
                        <br>
                        <textarea style = "width: 600px; height: 350px;" id="mensaje"></textarea>
                    </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-outline-danger btn-lg">Enviar</button>
            </div>
            </form>
        </section>
<?php }
//Si la página es Tienda
else if(is_page('Tienda')){?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class = "container mt-5">
    <section class="row">
        <div class="p-5 rounded-lg m-3 bg-danger text-light">
            <h1 class="display-4 fs-1"><?php the_title();?></h1>
            <p class="lead">Encuentra cualquier vinilo de tu artista favorito</p>
            <hr class="my-4">
        </div>
    </section>
<!--Seccion para mostrar los posts-->
    <section class="row d-flex justify-content-center mt-5" style = "background-color:rgb(68, 68, 68);">
    <?php
    //he hecho uso de una consulta para que me traiga todos aquellos posts que sean de tipo post, ya que en phpMyAdmin las paginas y los posts se guardan bajo la misma tabla
    $query = new WP_Query(array('post_type' => 'post'));
        //entonces en el if y en el while le digo que si hay posts y mientras hayan posts que me de el post actual ($query->the_post())
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();?>
                            <div class="card col-md-3 border border-light bg-dark text-danger col-md-3 me-5 ms-5 pe-5 ps-5 pt-3 mt-5 mb-5" style="width: 18rem;">
                <?php
                //si el post tiene imagenes destacadas me los muestra con su tamaño completo, mis imagenes miden 200x200 px
                    if(has_post_thumbnail()){                    
                        the_post_thumbnail('full');
                    }?>
                <div class="card-body">
                    <!--Uso el titulo del post actual para ponerlo como cabecero-->
                    <h5 class="card-title text-center"><?php the_title(); ?></h5>
                    <hr>
                    <!--Con substr puedo conseguir que no me muestre todo el contenido del post-->
                    <p class="card-text"><?php substr(the_excerpt(), 0, 200)?></p>
                    <?php 
                    echo "<div hidden>";
                    //obtengo la id del post actual para poder tener un link directo al post y su contenido con get_permalink(the_ID()), la variable lo uso para el boton, ya que al pulsarlo nos llevará a la página del post
                    $id_post = get_permalink(the_ID());
                    echo "</div>";
                    echo "<br><a href='$id_post' class='btn btn-outline-danger mb-3'>Leer más</a>"
                    ?>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
else :
    _e('No hay entradas disponibles.', 'IES Celia Viñas');
endif;
?>
</section>
   
    </div>
<!--Si no es ninguna de las paginas anteriores significa que se quiere acceder al contenido de un post-->  
<?php } else{?>
    <!--Crea una seccion con el titulo de la pagina actual con get_title()-->
    <div class = "row pt-5 pb-5 mt-5 mb-5" style = "background-color:rgb(68, 68, 68);">
        <div class = "border border-light col-md-7 me-3 ms-5 pt-4 ps-3 pe-3" style = "background-color: #212121;">
            <header>
                <h1 class="display-4 text-danger fs-1"><?php the_title();?></h1>
                <hr>
            </header>
            <div class = "text-danger">
                <p><?php the_content();?></p>
            </div>
        </div>
        <div class = "border border-light col-md-3 text-danger me-3 ms-3 pt-4 ps-3 pe-3" style = "background-color: #212121;">
            <!--Obtiene el titulo del post para hacer una consulta a la base de datos-->
            <div class = "fs-4">
            <?php $post_nombre = the_title(); 
            //busca las categorias asociadas al post 
            $categories = get_the_category($post_nombre);
            //si la variable no está vacía significa que el post tiene categorías, recorre cada una de sus categoría y hace una lista con las categorias del post
            if (!empty($categories)) {
                echo "<p>Categorías de la entrada:</p></div><ul>";
                foreach ($categories as $category) {
                    echo "<li>" . $category->name . "</li>";
                }
                echo "</ul>";
            } ?>
        </div>
    </div>

<br>

<div class = "ms-5 me-5">
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
    <?php 
    echo "<h2 class = 'text-danger'>Comentarios(" . get_comments_number(the_ID()) . ")</h2><br><br>";
   //hago una consulta haciendo uso del nombre del titulo del post para obtener los comentarios
    $comments;

    //si el numero total de comentarios es distinto a 0 significa que hay comentarios, obtengo los comentarios con get_comments() y le paso un array por parametros con las condiciones de la consulta
    //donde lepaso la id del post para obtener los comentarios de la entrada, solo mostrará comentarios aprobados y el orden como los muestra será ascendente 
    if(get_comments_number(the_ID()) != 0){
        $comments = get_comments(array(
        'post_id' => the_ID(), 
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
</div>
<?php }?>

<br>
<br>
<!--Obtiene el footer creado en footer.php-->
<?php get_footer();?>