<?php get_header(); ?>
<div id="content" class="posts">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them -->
		<h1 class="postsHeader"><?php _e("Look what we found for you!"); ?></h1>
		<?php require_once('includes/genericPosts.php'); ?>
	<?php else: ?> <!-- if there are no posts display this content -->
		<h2 class="center"><?php _e('No posts found. Try a different search?'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>