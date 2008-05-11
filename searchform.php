<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<button type="submit" id="searchsubmit"><?php _e('Find It!'); ?></button>
	</div>
</form>