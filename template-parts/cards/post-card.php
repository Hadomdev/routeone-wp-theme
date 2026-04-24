<?php 
	$post_id = get_the_id();
	$max_characters = 20;
	if(get_the_excerpt()){
		$excerpt = get_the_excerpt();
		$trimmed_content = wp_trim_words($excerpt, $max_characters);
	}
	else{
		$post_content = get_post_field('post_content', $post_id);
		$trimmed_content = wp_trim_words($post_content, $max_characters);
	}
?>
<a href="<?php the_permalink(); ?>" class="blog-cards__item">
	<?php echo any_thumbnail($post_id, 'post-thumbnail', ['blog-cards__item-image']); ?>
	<div class="blog-cards__item-description">
		<div class="blog-cards__item-row">
			<span class="blog-cards__item-type"><?php get_first_cat_name($post_id); ?></span>
			<span class="blog-cards__item-date"><?php echo get_the_modified_date(); ?></span>
		</div>
		<p class="blog-cards__item-title"><?php the_title(); ?></p>
		<p class="blog-cards__item-text">
			<?php echo $trimmed_content; ?>
		</p>
	</div>
</a>