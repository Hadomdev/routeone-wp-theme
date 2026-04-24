<?php 
add_action('after_setup_theme', 'routeone_register_image_sizes');
function routeone_register_image_sizes(){
	add_image_size('post-thumbnail', 400, 200, array('center', 'center'));
}
function any_thumbnail($post_id, $size, $classes = []){
	$featured_image_id = get_post_thumbnail_id($post_id);
	$featured_image_url = wp_get_attachment_image_src($featured_image_id, 'post-thumbnail');
	$featured_image_url = $featured_image_url[0];
	$featured_image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
	$classes_string = '';
	if($classes){
		foreach ($classes as $key => $value) {
			$classes_string .= ' ' . $value;
		}
	}
	if(empty($featured_image_alt)){
		$featured_image_alt = get_the_title($post_id);
	}
	return '<img src="' . $featured_image_url . '" alt="'.$featured_image_alt.'" class="'.$classes_string.'"'.'>';
}
function get_first_cat_name($post_id){
	$categories = wp_get_post_categories($post_id);
	if(!empty($categories)){
		$category = get_term_by('term_id', $categories[0], 'category');
		if($category){
			//$category_link = get_term_link($category, 'category');
			echo $category->name;
		}
	}
	
}

add_filter('the_content', 'modify_post_content');
function modify_post_content($content) {
    if (is_singular('post')) {
        $pattern = '/ class="(.*?)wp-block-heading(.*?)"/i';
	    $content = preg_replace($pattern, '', $content);

        $content = preg_replace_callback(
            '/<h([1-6])>(.*?)<\/h\1>/',
            function ($match) {
                $heading_level = $match[1];
                $title = $match[2];
                $title_with_class = '</div><div class="single-article__article"><h' . $heading_level . ' class="title title--0' . $heading_level . ' no-padding" id="' . sanitize_title($title) . '">' . $title . '</h' . $heading_level . '>';
                return $title_with_class;
            },
            $content
        );
        return $content . '</div>';
    }
    return $content;
}

function routeone_reading_time($post_id = 0){
	if(!$post_id){
		$post_id = get_the_id();
	}
	$readingtime = get_post_meta($post_id, '_yoast_wpseo_estimated-reading-time-minutes', true);
	if(!empty($readingtime)){
		if($readingtime == 1){
			$readingtime .= ' min';
		}
		elseif($readingtime > 1){
			$readingtime .= ' mins';
		}
	}
	return $readingtime;
}

/**
 * Add new gutenberg block category.
 */
function new_gutenberg_block_category( $categories ) {
    array_unshift(
        $categories,
        array(
            'slug'  => 'blocks-category',
            'title' => 'Block'
        ),
    );

    return $categories;
}

add_filter( 'block_categories', 'new_gutenberg_block_category', 10, 2 );

/**
 * Remove fetchpriority attribute for img.
 */
function remove_fetchpriority_attribute( $attributes ) {
    if ( isset( $attributes['fetchpriority'] ) ) {
        unset( $attributes['fetchpriority'] );
    }

    return $attributes;
}

add_filter( 'wp_get_loading_optimization_attributes', 'remove_fetchpriority_attribute' );