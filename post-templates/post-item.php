<?php
$postDay = get_the_date('d');
$postMonth = get_the_date('m');
$postYear = get_the_date('Y');
$terms = get_the_terms($post->ID, 'category'); ?>
<div class="archive-blog__item">
	<a href="<?php the_permalink(); ?>" class="archive-blog__item-top">
		<?php
		if (wp_get_attachment_image(get_post_thumbnail_id())) {
			imageShowPost(get_post_thumbnail_id(), 'full');
		} else {
		?>
			<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/thumbnail-default.jpg'; ?>" />
		<?php
		}
		?>
	</a>
	<div class="archive-blog__item-info">
		<div class="archive-blog__item-meta">
			<div class="date"><?php echo $postDay; ?>.<?php echo $postMonth; ?>.<?php echo $postYear; ?></div>
		</div>
		<h3>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
	</div>
</div>