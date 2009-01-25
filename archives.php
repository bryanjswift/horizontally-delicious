<?php
/*
Template Name: Archive Index
*/
?>
<?php get_header(); ?>
<div id="content" class="posts singlePage clearfix">
	<div class="page post">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<h2 class="title"><?php _e('Archives by Month:'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<h2 class="title"><?php _e('Archives by Subject:'); ?></h2>
		<ul>
			 <?php wp_list_categories('title_li=0'); ?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>
