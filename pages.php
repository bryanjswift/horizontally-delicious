<?php
/*
Template Name: Page Archive
*/
?>
<?php get_header(); ?>
<div id="content" class="posts singlePage">
	<div class="page post">
		<h2 class="title"><?php _e("Pages"); ?></h2>
		<div class="content">
			<ul class="pages">
				<?php wp_list_pages('title_li=0&sort_column=post_date'); ?>
			</ul>
		</div>
	</div>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>