<?php
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
<h3 id="comments"><?php comments_number('コメントはありません', 'コメント１件', 'コメント%件');?></h3>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf('コメントを書くには<a href="%s">ログイン</a>が必要です', get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>
<?php wp_list_comments(); ?>
<?php paginate_comments_links(); ?>
<?php endif; ?>

<?php
	$args=array(
		'label_submit' => 'Submit',
		'comment_field' => '<textarea id="comment" name="comment" cols="65" rows="9" maxlength="65525" required="required"></textarea>',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'title_reply' => 'Comment',
		'logged_in_as' => '',
		'title_reply_before' => '',
		'title_reply_after' => '',
		'cancel_reply_before' => '',
		'cancel_reply_after' => '',
		'fields' => array(
		'email' => '',
		'url' => '',
		'author' => '<p class="comment-form-author"><label for="author">名前(任意) </label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" /></p>' ,
		'cookies' => '',
	),);
?>
<?php comment_form($args); ?>
<?php endif; ?>
