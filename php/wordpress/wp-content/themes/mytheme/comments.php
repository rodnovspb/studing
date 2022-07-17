<?php if(comments_open()) { ?>
	<?php  echo the_comments_navigation()   ?>
    <div class="wrap-comments">
        <h3>Комментарии читателей к статье <?php the_title(); ?></h3>
        <ol class="commentlist">
            <?php wp_list_comments([
                'avatar_size' => 64,
                'reply_text' => 'Ответить',
                'callback' => 'my_comments'
            ]) ?>
        </ol>
		<?php
        $fields = [
            'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . '</label> <input id="author" name="author" type="text" value="" size="30"/></p>',
            'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> <input id="email" name="email" type="text" value="" size="30"/></p>',
            'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label><input id="url" name="url" type="text" value="" size="30"/></p>'];
		$args = array(
            'fields' => apply_filters('comment_form_default_fields', $fields)
        ); ?>
	  	<?php comment_form($args); ?>
    </div>

<?php } else { ?>
    <h3>Обсуждения закрыты для этой страницы</h3>
<?php } ?>

<?php
// стандартный вывод комментариев
function  my_comments($comment, $args, $depth){
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
          <div class="comment-author vcard">
            <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
          </div>
        <?php if ($comment->comment_approved == '0') : ?>
		  <em><?php _e('Your comment is awaiting moderation.') ?></em>
		  <br />
        <?php endif; ?>

	  <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

        <?php comment_text() ?>

	  <div class="reply">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>
        </div>
    <?php }
    ?>



