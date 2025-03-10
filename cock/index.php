
    <?php get_header();?>

<?php if(is_page('Inicio')){
    ?>

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

<div class="container">
        <section class="row">
            <div style = "background-color: #212121;" class="p-5 rounded-lg m-3 text-danger">
                <h1 class="display-4"><?php the_title();?></h1>
                <p class="lead">Lo más destacado</p>
                <hr class="my-4">
            </div>
            </div>

        </section>
        <section class="me-5 ms-5" style = "background-color: #212121;">
            <header class="row">

            </header>

            <section class="row d-flex justify-content-center">

            <?php
$post_id = 0; // ID del post que deseas obtener

while($post_id < 20){
$post = get_post($post_id);
if($post){
if ($post->post_type == 'post') {
    echo '<article style = "background-color:rgba(0, 0, 0, 0.2);" class="text-danger col-md-3 me-5 ms-5 pe-5 ps-5 pt-3 mt-5 mb-5">
            <div class="caption">';
    echo '<h2 class="text-center">' . $post->post_title . '</h2>';
    echo '<p class="text-start">' . $post->post_content . '</p>';
    $post_link = get_permalink($post_id);
    echo "<p><a href='$post_link' class='btn btn-primary'>Leer más</a></p>
                        </div>
                </article>";
}
}
$post_id = $post_id + 1;
}


?>

        <?php }
        
        else if(is_page('Contactanos')){
            
            ?>
                <div class="container">
        <section class="row">
            <div style = "background-color: #212121;" class="p-5 rounded-lg m-3 text-danger">
                <h1 class="display-4"><?php the_title();?></h1>
                <p class="lead">Envianos un mensaje</p>
                <hr class="my-4">
            </div>

        </section>
        <section class="container" style = "background-color: #212121;">
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
            <textarea style = "  width: 600px;
  height: 350px;" id="mensaje"></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Submit</button>
  </fieldset>
</form>

            <?php }
            
            else{?>

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
        <?php $post_nombre = the_title(); // ID del post
        $categories = get_the_category($post_nombre);
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

if (is_user_logged_in() == false){?>
    <a class = "link-danger" href="<?php echo wp_registration_url(); ?>">Regístrate para comentar</a>
<?php }else{ 

if (comments_open()) { // Verifica si los comentarios están habilitados
    comments_template(); // Muestra solo el formulario de comentarios
}
}
?>
<br>
<?php $post_nombre = the_title();
echo "<h2 class = 'text-danger'>Comentarios(" . get_comments_number($post_nombre) . ")</h2><br><br>";

$comments = get_comments(array(
    'post_id' => $post_nombre, // Obtener comentarios de esta entrada
    'status'  => 'approve', // Solo comentarios aprobados
    'order'   => 'ASC' // Orden ascendente (del más antiguo al más nuevo)
));

if ($comments) {
    foreach ($comments as $comment) {
        echo "<div class = 'text-danger'><p><h3>" . $comment->comment_author . "</h3><br></strong>" . $comment->comment_content . "</p><hr></div>";
    }
} else {
    echo "<p>No hay comentarios en esta publicación.</p>";
}
?>

<?php }?>

<?php get_footer();?>