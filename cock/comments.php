<?php
if (comments_open()) :
    ?>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title text-danger"><?php echo 'Deja tu comentario'; ?></h3>
        
        <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" id="commentform" class="comment-form">
          
            
            <p class="comment-form-comment">
                <textarea name="comment" id="comment" required="required"></textarea>
            </p>
            
            <p class="form-submit">
                <input type="submit" name="submit" id="submit" class="btn btn-outline-danger" value="Enviar comentario" />
                <?php comment_id_fields(); ?>
            </p>
        </form>
    </div>
<?php endif; ?>