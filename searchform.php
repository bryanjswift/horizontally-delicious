<form method="get" class="searchform" action="<?php bloginfo('url'); ?>/">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" class="s" />
		<button type="submit" class="searchsubmit"><?php _e('Find It!'); ?></button>
	</div>
</form>