<?php
/*
Template Name: Tag Archive
*/
?>
<?php get_header(); ?>
<div id="content" class="posts singlePage">
	<div class="page post">
		<h2 class="title"><?php _e("Tags"); ?></h2>
		<div class="content">
			<?php wp_tag_cloud('unit=em&smallest=0.9&largest=2'); ?>
		</div>
	</div>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>