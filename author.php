<?php get_header(); ?>
<div id="content" class="posts">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them -->
		<?php
			if(isset($_GET['author_name'])) :
				$currentAuthor = get_userdatabylogin($author_name);
			else :
				$currentAuthor = get_userdata(intval($author));
			endif;
		?>
		<h1 class="postsHeader"><?php _e('Everything written by "'); echo $currentAuthor->display_name; _e('":'); ?></h1>
		<div class="aboutAuthor">
			<p class="memberSince"><?php echo $currentAuthor->user_registered; ?></p>
			<p class="description"><?php echo $currentAuthor->description; ?>
		</div>
		<?php require_once('includes/genericPosts.php'); ?>
	<?php else: ?> <!-- if there are no posts display this content -->
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>