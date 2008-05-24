<?php get_header(); ?>
<div id="content" class="fourOhFour">
	<h2 class="header"><?php _e("404 - We can't find what you're looking for"); ?></h2>
	<h3 class="title"><?php _e('In fact you look a little lost.'); ?></h3>
	<p><?php _e("Let's see if we can't get you back on track"); ?></p>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<div class="option">
		<p><?php _e("Check out the recent happenings"); ?>
		<?php
			$r = new WP_Query("showposts=5&what_to_show=posts&nopaging=0&post_status=publish");
			if ($r->have_posts()) :
			?>
				<ul>
					<?php  while ($r->have_posts()) : $r->the_post(); ?>
						<li><a href="<?php the_permalink() ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?> </a><?php _e(" on "); the_time('F j, Y'); ?></li>
					<?php endwhile; ?>
				</ul>
				<?php
				wp_reset_query();  // Restore global post data stomped by the_post().
			endif;
		?>
	</div>
	<div class="option">
		<p><?php _e("or the archives"); ?>
		<ul>
			<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
		</ul>
	</div>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>