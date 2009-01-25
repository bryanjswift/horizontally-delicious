<?php
/*
Template Name: Category Archive
*/
?>
<?php get_header(); ?>
<div id="content" class="posts singlePage clearfix">
	<div class="page post">
		<h2 class="title"><?php _e("Categories"); ?></h2>
		<div class="content">
			<ul class="categories">
				<?php wp_list_categories('title_li=0&show_count=1'); ?>
			</ul>
		</div>
	</div>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>
