<div class="shop-block__item">
	<a href="<?php the_permalink(); ?>" class="archive-blog__item-top">
		<?php
		if (wp_get_attachment_image(get_post_thumbnail_id())) {
			imageShowPost(get_post_thumbnail_id(), 'full');
		} else {
		?>
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/img.jpg'; ?>" />
		<?php
		}
		?>
		<h3>
			<?php the_title(); ?>
		</h3>
	</a>
</div>