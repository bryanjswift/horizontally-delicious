<?php get_header(); ?>
<div id="content" class="posts singlePage">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them, should only be one post -->
		<?php while (have_posts()) : the_post(); ?>
			<div class="page post clearfix" id="post-<?php the_ID(); ?>">
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="meta">
					<p class="byline">
						by <span class="author">
							<?php the_author_posts_link(); /* Only use the author or the author posts link not both - the_author(); */ ?>
						</span> at <span class="time"><?php the_time() ?>
					</p>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
				<div class="feedback">
					<?php wp_link_pages(); ?>
					<?php comments_popup_link(__('No Reaction'), __('One Reaction'), __('% Reactions')); ?>
				</div>
			</div> <!-- end of div.post -->
		<?php endwhile; ?>
	<?php else: ?> <!-- if there are no posts display this content -->
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>
