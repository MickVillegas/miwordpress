<?php
//este archivo es usado para personalizar la caja de comentarios de las entradas
if (comments_open()) :
    ?>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title text-danger mb-5"><?php echo 'Deja tu comentario'; ?></h3>
        <!--Los comentarios se publicarán a wp-comments-post.php-->
        <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" id="commentform" class="comment-form">
          
            
            <p class="comment-form-comment">
                <textarea style = "width: 700px; height: 50px;" name="comment" id="comment" required="required"></textarea>
            </p>
            
            <p class="form-submit">
                <input type="submit" name="submit" id="submit" class="btn btn-outline-danger" value="Enviar comentario" />
                <!--El area de comentarios creados en las entradas-->
                <?php comment_id_fields(); ?>
            </p>
        </form>
    </div>
<?php endif; ?>