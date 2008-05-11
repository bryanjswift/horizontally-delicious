<?php get_header(); ?>
<div id="content" class="posts">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them -->
		<h1 class="postsHeader"><?php _e("Archives"); ?></h1>
		<?php require_once('includes/genericPosts.php'); ?>
	<?php else: ?> <!-- if there are no posts display this content -->
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>