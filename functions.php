<?php
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Left Nav',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="title">',
			'after_title' => '</h2>',
		));
	}
?>
<?php
	function bjs_widget_search($args) {
		extract($args);
		echo $before_widget;
		echo $before_title;
		_e("Search");
		echo $after_title;
		include (TEMPLATEPATH . '/searchform.php');
		echo $after_widget;
	}
?>
<?php
	$widgetOptions = array('classname' => 'widget_search', 'description' => __( "A search form for your blog"));
	wp_register_sidebar_widget('search',__('Search'),'bjs_widget_search',$widgetOptions);
?>