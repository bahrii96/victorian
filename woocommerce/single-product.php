<?php

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
get_header();
$single_product = get_field('single_product');

if ($single_product) {
	$detal_group = $single_product['detal_group'];
	$material_group = $single_product['material_group'];
	$gallery_group = $single_product['gallery_group'];
	$about_group = $single_product['about_group'];
};
?>


<main>
	<div class="container">
		<?php
		global $product;
		do_action('woocommerce_before_main_content');
		?>
		<section class="hero-block">
			<div class="hero-block__img">
				<?php
				$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
				$post_thumbnail_id = $product->get_image_id();

				?>
				<div class="woocommerce-product-gallery__image">
					<?php
					if ($post_thumbnail_id) {
						$html = wc_get_gallery_image_html($post_thumbnail_id, true);
					} else {
						$wrapper_classname = $product->is_type('variable') && !empty($product->get_available_variations('image')) ?
							'woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder' :
							'woocommerce-product-gallery__image--placeholder';
						$html              = sprintf('<div class="%s">', esc_attr($wrapper_classname));
						$html             .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
						$html             .= '</div>';
					}
					echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);
					?>
				</div>

				<div class="woocommerce-product-gallery" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
					<div class="woocommerce-product-gallery__wrapper">
						<?php
						// Вивід галереї
						do_action('woocommerce_product_thumbnails');
						?>
					</div>
				</div>

				<script>
					jQuery(document).ready(function($) {
						$('.woocommerce-product-gallery__image img').each(function() {
							$(this).parent().attr('data-fancybox', 'gallery');
						});

						$('[data-fancybox="gallery"]').fancybox({});
					});
				</script>
			</div>

			<div class="hero-block__inf">
				<h1><?php echo the_title() ?></h1>
				<div class="hero-block__inf-desc desc">
					<?php
					$product_description = apply_filters('the_content', $product->get_description());
					if ($product_description) {
						echo $product_description;
					}
					?></div>
			</div>
		</section>



		<?php if ($detal_group) :
			$information = $detal_group['information'];
		?>
			<section class="information-block">
				<div class=" desc">
					<?php echo $information ?></div>
			</section>
		<?php endif; ?>


		<?php if ($material_group) :
			$title = $material_group['title'];
			$information = $material_group['information'];
			$list = $material_group['list'];
		?>
			<section class="material-block">
				<?php if ($title): ?>
					<div class="title">
						<strong>
							<?php echo $title ?>
						</strong>
					</div>
				<?php endif; ?>
				<?php if (is_array($list)): ?>
					<div class="material-block__list">
						<?php foreach ($list as $item) {
							$title = $item['title'];
							$image = $item['image'];
						?>

							<div class="material-block__item">
								<?php echo wp_get_attachment_image($image, 'full'); ?>
								<h3><?php echo $title ?></h3>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>
				<?php if ($information): ?>
					<div class="material-block__inf">
						<?php echo $information ?>
					</div>
				<?php endif; ?>
			</section>
		<?php endif; ?>

		<?php if ($gallery_group) :
			$title = $gallery_group['title'];
			$information = $gallery_group['information'];
			$gallery = $gallery_group['gallery'];
		?>
			<section class="gallery-block">
				<?php if ($title): ?>
					<div class="title">
						<strong>
							<?php echo $title ?>
						</strong>
					</div>
				<?php endif; ?>
				<?php if (is_array($gallery)): ?>
					<div class="gallery-block__list flex-container">
						<?php foreach ($gallery as $item) : ?>
							<div class="gallery-block__item">
								<a href="<?php echo wp_get_attachment_url($item); ?>" data-fancybox="gallery" class="gallery-link">
									<?php echo wp_get_attachment_image($item, 'full'); ?>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>



				<?php if ($information): ?>
					<div class="gallery-block__inf">
						<?php echo $information ?>
					</div>
				<?php endif; ?>
			</section>
		<?php endif; ?>

		<?php
		$form_global = get_field('form_global', 'options');
		if ($form_global) {
			$title = isset($form_global['title']) ? $form_global['title'] : null;
			$description = isset($form_global['description']) ? $form_global['description'] : null;
			$form_shortcode = isset($form_global['form_shortcode']) ? $form_global['form_shortcode'] : null;
		?>
			<section class="form-block">
				<div class="container">
					<div class="form-block__box">
						<?php if (!empty($title)): ?>
							<h2><?php echo $title ?></h2>
						<?php endif; ?>
						<?php if (!empty($description)): ?>
							<div class="form-block__desc desc"><?php echo $description ?></div>
						<?php endif; ?>
						<?php if (!empty($form_shortcode)): ?>
							<div class="form-block__form "> <?php echo do_shortcode($form_shortcode); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php
		}
		?>

		<?php if ($about_group) :
			$information = $about_group['information'];
		?>
			<section class="about-block">
				<div class=" desc">
					<?php echo $information ?></div>
			</section>
		<?php endif; ?>


	</div>
</main>

<?php
get_footer();
