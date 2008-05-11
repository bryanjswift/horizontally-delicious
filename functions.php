<?php
if (function_exists('register_sidebar'))
	register_sidebar(array(
		'name' => 'Left Nav',
		'before_widget' => '<li class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
?>
