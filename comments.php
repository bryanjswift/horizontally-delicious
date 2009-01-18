<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('Please do not load this page directly. Thanks!');
	}
	$commentsOpen = comments_open();
?>
<div class="comments">
	<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) : ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php return; endif; ?>
	
	<h3 id="comments" class="header">
		<?php if ($commentsOpen) : ?>
			<a href="#postcomment" title="<?php _e("Leave a comment"); ?>">
		<?php endif; ?>
		<?php comments_number(__('No Reaction'), __('One Reaction'), __('% Reactions')); ?>
		<?php if ($commentsOpen) : ?>
			</a>
		<?php endif; ?>
	</h3>
	<p class="commentLinks">
		<?php post_comments_feed_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?>
		<?php if ( pings_open() ) : ?>
			<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack URL'); ?></a>
		<?php endif; ?>
	</p>
	<?php if ( $comments ) : /* iterate over the comments */ ?>
		<ol id="commentlist" class="comments">
			<?php foreach ($comments as $comment) : ?>
				<li id="comment-<?php comment_ID() ?>" class="comment<?php if(!isset($themeOptions)) { $themeOptions = get_option('Horizontally Delicious'); } if ($themeOptions["owner_id"] == $comment->user_id) { echo ' author'; } ?>">
					<?php echo get_avatar( $comment, 32 ); ?>
					<?php comment_text() ?>
					<p>
						<cite>
							<?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>
						</cite>
						<?php edit_comment_link(__("edit"), ' |'); ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php endif; ?>
	
	<?php if ($commentsOpen) : /* Show the comment form */ ?>
		<h3 id="postcomment"><?php _e('React'); ?></h3>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php printf(__('You must be <a href="%s">logged in</a> to write a reaction.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( $user_ID ) : ?>
					<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out') ?>"><?php _e('log out'); ?></a></p>
				<?php else : ?>
					<fieldset>
						<p class="text">
							<label for="author"><small><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></small></label>
							<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
						</p>
						<p class="text">
							<label for="email"><small><?php _e('Mail'); ?> <?php if ($req) _e('(required)'); ?></small></label>
							<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
						</p>
						<p class="text">
							<label for="url"><small><?php _e('Website'); ?></small></label>
							<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
						</p>
					</fieldset>
				<?php endif; ?>
				<fieldset>
					<p class="textarea"><textarea name="comment" id="comment" cols="75" rows="10" tabindex="4"></textarea></p>
					<p class="submit">
						<input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Submit Reaction')); ?>" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					</p>
					<?php do_action('comment_form', $post->ID); ?>
				</fieldset>
			</form>
		<?php endif; /* If registration required and not logged in */ ?>
	<?php else : /* Comments are closed */ ?>
		<p><?php _e('Written reactions are not permitted at this time.'); ?></p>
	<?php endif; ?>
</div>