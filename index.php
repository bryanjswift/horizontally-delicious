<?php get_header(); ?>
<div id="content" class="posts">
	<?php if (have_posts()) : ?> <!-- if there are posts then loop over them -->
		<div class="navigation">
			<div class="previous"><?php next_posts_link(__('&laquo; Older Entries')) ?></div>
			<div class="next"><?php previous_posts_link(__('Newer Entries &raquo;')) ?></div>
		</div>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_date('','<h2 class="date">','</h2>'); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2 class="title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<p class="byline">
					by <span class="author">
						<?php the_author_posts_link(); /* Only use the author or the author posts link not both the_author(); */ ?>
					</span>
					at <span class="time">
						<?php the_time() ?>
					</span>
					<?php edit_post_link(__(' edit')); ?>
				</p>
				<p class="categories"><?php _e('related to'); the_category(' &bull; '); ?></p>
				<div class="content">
					<?php the_content("Read the rest &raquo;"); ?>
				</div>
				<div class="feedback">
					<?php wp_link_pages(); ?>
					<?php comments_popup_link(__('No Reaction'), __('1 Reaction'), __('% Reactions')); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link(__('&laquo; Older Entries')) ?></div>
			<div class="next"><?php previous_posts_link(__('Newer Entries &raquo;')) ?></div>
		</div>
	<?php else: ?> <!-- if there are no posts display this content -->
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div> <!-- end of div.posts -->
<?php get_footer(); ?>
