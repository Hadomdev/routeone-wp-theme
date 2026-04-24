<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RouteOne
 */

get_header();
?>

	<main id="primary" class="site-main page__main">
		<?php if ( have_rows( 'page_404', 'option' ) ) : ?>
			<?php while ( have_rows( 'page_404', 'option' ) ) : the_row(); ?>
				<?php
					$image = get_sub_field( 'image' ); 
					$text = get_sub_field( 'text' );
				?>
				<div class="error-page mb-128">
					<div class="error-page__wrapper mb-24">
						<div class="error-page__content">
							<span class="error-page__content-item">4</span> 
							<span class="error-page__content-item">0</span>
							<span class="error-page__content-item error-page__content-item--animate">4</span>
						</div>
						<?php if(!empty($image)):?>
							<div class="error-page__img-box">
								<img class="error-page__img" src="<?= $image['url'];?>" alt="<?= $image['alt'];?>"/>
							</div>
						<?php endif;?>
					</div>
					<?php if(!empty($text)):?>
						<div class="error-page__text">
							<?= $text;?>
						</div>
					<?php endif;?>
					<?php if ( have_rows( 'buttons_list' ) ) : ?>
						<div class="error-page__actions">
							<?php while ( have_rows( 'buttons_list' ) ) : the_row(); ?>
								<?php $link = get_sub_field( 'link' ); ?>
								<?php if(!empty($link)):?>
									<a class="btn" href="<?= $link['url'];?>" <?= $link['target']?'target="_blank" rel="noopener"':'';?>>
										<?= $link['title'];?>
									</a>
								<?php endif;?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</main>

<?php
get_footer();
