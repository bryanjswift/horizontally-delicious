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
		<?php if ($themeOptions["include_sifr"] == 1 || (isset($themeOptions["sifr_alternate_path"]) && $themeOptions["sifr_alternate_path"] != '')) : ?>
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sIFR-print.css" type="text/css" media="print" />
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/sIFR-screen.css" type="text/css" media="screen" />
		<?php endif; ?>
		<?php 
			wp_get_archives('type=monthly&format=link');
			$themeOptions = get_option('Horizontally Delicious');
			echo stripslashes($themeOptions["additional_head"]);
		?>
	</head>
	<?php flush(); ?>
	<body> <!-- ends in footer.php -->
		<div id="header" class="wrap">
			<h1 class="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
			<ul id="nav">
				<li class="parent categories">
					<?php if ($themeOptions["categories_is_link"] == 1) : ?><a href="<?php bloginfo('url'); ?>/categories/" title="Categories"><?php endif; _e('Categories'); ?><?php if ($themeOptions["categories_is_link"] == 1) : ?></a><?php endif; ?>
					<ul class="child">
						<?php wp_list_categories('title_li=0&show_count=1&depth=-1'); ?>
					</ul>
				</li>
				<li class="parent tags">
					<?php if ($themeOptions["tags_is_link"] == 1) : ?><a href="<?php bloginfo('url'); ?>/tags/" title="Tags"><?php endif; _e('Tags'); ?><?php if ($themeOptions["tags_is_link"] == 1) : ?></a><?php endif; ?>
					<?php bjs_wp_tag_cloud('unit=em&smallest=1&largest=1.01&format=list'); ?>
				</li>
				<li class="parent pages">
					<?php if ($themeOptions["pages_is_link"] == 1) : ?><a href="<?php bloginfo('url'); ?>/pages/" title="Pages"><?php endif; _e('Pages'); ?><?php if ($themeOptions["pages_is_link"] == 1) : ?></a><?php endif; ?>
					<ul class="child">
						<?php wp_list_pages('title_li=0&sort_column=post_date'); ?>
					</ul>
				</li>
				<li class="parent archives">
					<?php if ($themeOptions["archives_is_link"] == 1) : ?><a href="<?php bloginfo('url'); ?>/archives/" title="Archives"><?php endif; _e('Archives'); ?><?php if ($themeOptions["archives_is_link"] == 1) : ?></a><?php endif; ?>
					<ul class="child">
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
				</li>
			</ul>
		</div>
		<div id="body" class="wrap"> <!-- ends in footer.php -->
			<!-- content filled in here -->