<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- ends in footer.php -->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
		<?php if (is_home() || is_archive()) : ?>
			<meta name="robots" content="noindex,nocache,follow" />
		<?php endif; ?>
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_get_archives('type=monthly&format=link'); ?>
	</head>
	<?php flush(); ?>
	<body> <!-- ends in footer.php -->
		<?php
			$requestUri = $_SERVER['REQUEST_URI'];
			$wpPages = wp_list_pages('title_li=0&echo=0&sort_column=post_date&depth=1');
		?>
		<div id="header" class="wrap">
			<h1 class="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
			<?php if (isset($wpPages) && "" != $wpPages) : ?>
				<ul class="pages">
					<?php echo $wpPages; ?>
				</ul>
			<?php else : ?>
				<div class="clear">&nbsp;</div>
			<?php endif; ?>
		</div>
		<div id="body" class="wrap"> <!-- ends in footer.php -->
			<!-- content filled in here -->