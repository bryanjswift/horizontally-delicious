<!-- start sidebar -->
<div class="sidebar">
	<ul class="widgets">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : /* Widgetized sidebar, if you have the plugin installed. */ ?>
			<?php wp_list_bookmarks('title_li=0&class=widget&title_after=:</h2>&title_before=<h2 class="title">'); ?>
			<li id="search" class="widget">
				<h2 class="title"><label for="s"><?php _e('Search:'); ?></label></h2>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>
			<li id="meta" class="widget">
				<h2 class="title"><?php _e('Meta:'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif; ?>
	</ul>
</div>
<!-- end sidebar -->