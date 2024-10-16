<?php get_header(); ?>
<div class="container">
	<h1><?php single_cat_title(); ?></h1>
	<div class="post-grid">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-item">
					<?php if (has_post_thumbnail()) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium'); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="post-content">
						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="post-excerpt">
							<?php
							// Retrieve meta description
							$meta_description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
							// Display excerpt or meta description if available
							if (!empty($meta_description)) {
								echo wp_trim_words($meta_description, 10, '...');
							} else {
								echo wp_trim_words(get_the_excerpt(), 10, '...');
							}
							?>
						</div>
						<a href="<?php the_permalink(); ?>" class="button main-item__button"><span><?php echo __('Read More', 'paripesa'); ?></span></a>

					</div>
				</div>
			<?php endwhile;
		else : ?>
			<p><?php esc_html_e('No posts found in this category.', 'textdomain'); ?></p>
		<?php endif; ?>
	</div>
	<div class="pagination">
		<?php
		the_posts_pagination(array(
			'prev_text' => esc_html__('Previous', 'textdomain'),
			'next_text' => esc_html__('Next', 'textdomain'),
		));
		?>
	</div>
</div>
<?php get_footer(); ?>