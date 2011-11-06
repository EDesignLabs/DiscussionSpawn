<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('Enter your password to view comments.'); ?></p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<div class="allcomments">
	
	<?php if ($comments) : ?>
	<h3><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?> to '<?php the_title(); ?>'</h3>
	
	<?php foreach ($comments as $comment) : ?>
		<div class="commentbox" id="comment-<?php comment_ID() ?>">
			<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em>
		    <?php endif; ?>
			<div class="commentmeta">
				<span class="avatar"><?php echo get_avatar( $comment, 32 ); ?></span>
            	<strong><?php comment_author_link() ?></strong><br />
            	<small><?php comment_date() ?></small>				
            </div>
			<div class="commenttext">
            	<?php comment_text() ?>
            </div>
		</div>
	<?php endforeach; ?>
	<?php else : ?>
		<?php if ('open' == $post->comment_status) : ?>
			<p><?php _e('No comments yet.'); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if ('open' == $post->comment_status) : ?>
		<h3><?php _e('Leave a comment'); ?></h3>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<h3><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></h3>
		<?php else : ?>
		<div id="commentform">
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
			<p>
				<?php if ( $user_ID ) : ?>
					Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a><br/><br/>
				<?php else : ?>
					<label for="author">Name <?php if ($req) _e('<strong>required</strong>'); ?></label><br/>
					<input type="text" name="author" id="name" class="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><br/>

					<label for="email">Mail (will not be published) <?php if ($req) _e('<strong>required</strong>'); ?></label><br/>
					<input type="text" name="email" id="email" class="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /><br/>

					<label for="url">URL</label><br/>
					<input type="text" name="url" id="website" class="text" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><br/>
				<?php endif; ?>

				<label for="message">Comment</label><br/>
				<textarea name="comment" id="message" tabindex="4" rows="9" cols="10"></textarea>
				<br/><br/>
				<input name="submit" type="submit" class="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit Comment')); ?>" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<?php do_action('comment_form', $post->ID); ?>
			</p>
			</form>		
		</div>
	<?php endif; ?>
	<?php endif; ?>
</div>