<?php 
	$title = '';
	if(get_field('title')){
		$title = get_field('title');
	}
	else{
		$title = get_the_title();
	}
?>
<section class="container mb-80">
	<h1 class="title title--common" <?php if(get_field('shadow_title')){echo 'data-shadow="'.get_field('shadow_title').'"'; }?>><?php echo $title; ?></h1>
</section>