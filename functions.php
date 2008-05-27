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
<?php
	/* Copies of wp_tag_cloud and wp_generate_tag_cloud slightly modified from wp-includes/category-template.php */
	function bjs_wp_tag_cloud( $args = '' ) {
		$defaults = array(
			'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
			'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
			'exclude' => '', 'include' => ''
		);
		$args = wp_parse_args( $args, $defaults );
		$tags = get_tags( array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) ); // Always query top tags
		if ( empty($tags) )
			return;
		$return = bjs_wp_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args
		if ( is_wp_error( $return ) )
			return false;
		$return = apply_filters( 'wp_tag_cloud', $return, $args );
		if ( 'array' == $args['format'] )
			return $return;
		echo $return;
	}
	
	function bjs_wp_generate_tag_cloud( $tags, $args = '' ) {
		global $wp_rewrite;
		$defaults = array(
			'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
			'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
		);
		$args = wp_parse_args( $args, $defaults );
		extract($args);
		if ( !$tags )
			return;
		$counts = $tag_links = array();
		foreach ( (array) $tags as $tag ) {
			$counts[$tag->name] = $tag->count;
			$tag_links[$tag->name] = get_tag_link( $tag->term_id );
			if ( is_wp_error( $tag_links[$tag->name] ) )
				return $tag_links[$tag->name];
			$tag_ids[$tag->name] = $tag->term_id;
		}
		$min_count = min($counts);
		$spread = max($counts) - $min_count;
		if ( $spread <= 0 )
			$spread = 1;
		$font_spread = $largest - $smallest;
		if ( $font_spread <= 0 )
			$font_spread = 1;
		$font_step = $font_spread / $spread;
		// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
		if ( 'name' == $orderby )
			uksort($counts, 'strnatcasecmp');
		else
			asort($counts);
		if ( 'DESC' == $order )
			$counts = array_reverse( $counts, true );
		elseif ( 'RAND' == $order ) {
			$keys = array_rand( $counts, count($counts) );
			foreach ( $keys as $key )
				$temp[$key] = $counts[$key];
			$counts = $temp;
			unset($temp);
		}
		$a = array();
		$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="tag"' : '';
		foreach ( $counts as $tag => $count ) {
			$tag_id = $tag_ids[$tag];
			$tag_link = clean_url($tag_links[$tag]);
			$tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
			$a[] = "<a href='$tag_link' class='tag-link-$tag_id' title='" . attribute_escape( sprintf( __ngettext('%d topic','%d topics',$count), $count ) ) . "'$rel style='font-size: " .
				( $smallest + ( ( $count - $min_count ) * $font_step ) )
				. "$unit;'>$tag</a>";
		}
		switch ( $format ) :
		case 'array' :
			$return =& $a;
			break;
		case 'list' :
			$return = "<ul class='child wp-tag-cloud'>\n\t<li>";
			$return .= join("</li>\n\t<li>", $a);
			$return .= "</li>\n</ul>\n";
			break;
		default :
			$return = join("\n", $a);
			break;
		endswitch;
		return apply_filters( 'wp_generate_tag_cloud', $return, $tags, $args );
	}
?>