<?php get_header(); ?>
<div id="content" class="posts singlePost">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them, should only be one post -->
		<?php while (have_posts()) : the_post(); ?>
			<?php the_date('','<h2 class="date">','</h2>'); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2 class="title"><?php the_title(); ?></h2>
				<p class="byline">
					by <span class="author">
						<?php the_author_posts_link(); /* Only use the author or the author posts link not both - the_author(); */ ?>
					</span> at <span class="time"><?php the_time() ?>
				</p>
				<p class="related">
					<span class="categories"><?php _e('categorized as '); the_category(' &bull; '); ?></span>
					<?php the_tags(__(' &#8212; <span class="tags">tagged as '),' &bull; ','</span>'); ?>
				</p>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="feedback">
					<?php comments_template(); ?>
				</div>
				<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
			</div> <!-- end of div.post -->
		<?php endwhile; ?>
	<?php else: ?> <!-- if there are no posts display this content -->
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>