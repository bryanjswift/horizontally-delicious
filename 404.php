<?php get_header(); ?>
<div id="content" class="fourOhFour">
	<h2 class="header"><?php _e("404 - We can't find what you're looking for"); ?></h2>
	<h3 class="title"><?php _e('Inf fact you look a little lost.'); ?></h3>
	<p><?php _e("Let's see if we can't get you back on track"); ?></p>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>