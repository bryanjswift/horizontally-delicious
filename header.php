<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- ends in footer.php -->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
		<?php if (is_home() || is_archive()) : ?>
			<meta name="robots" content="noindex,nocache,follow" />
		<?php endif; ?>
		<title><?php wp_title('&laquo;',true,'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
	</head>
	<?php flush(); ?>
	<body> <!-- ends in footer.php -->
		<div id="header" class="wrap">
			<h1 class="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
			<ul id="nav">
				<li class="parent categories">
					<a href="<?php bloginfo('url'); ?>/categories/" title="Categories"><?php _e('Categories'); ?></a>
					<ul class="child">
						<?php wp_list_categories('title_li=0&show_count=1'); ?>
					</ul>
				</li>
				<li class="parent tags">
					<a href="<?php bloginfo('url'); ?>/tags/" title="Tags"><?php _e('Tags'); ?></a>
					<ul class="child">
						<?php wp_tag_cloud('unit=em&smallest=1&largest=1&format=list'); ?>
					</ul>
				</li>
				<li class="parent pages">
					<a href="<?php bloginfo('url'); ?>/pages/" title="Pages"><?php _e('Pages'); ?></a>
					<ul class="child">
						<?php wp_list_pages('title_li=0&sort_column=post_date'); ?>
					</ul>
				</li>
				<li class="parent archives">
					<a href="<?php bloginfo('url'); ?>/archives/" title="Archives"><?php _e('Archives'); ?></a>
					<ul class="child">
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
				</li>
			</ul>
		</div>
		<div id="body" class="wrap"> <!-- ends in footer.php -->
			<!-- content filled in here -->