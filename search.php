<?php

/**
 * Custom Post Type Search result page.
 *
 * @package Aquila
 */
get_header();
global $wp_query;

?>
<div id="primary">
	<main id="main" role="main">
		<div class="search-result">
			<div class="container">
				<?php if (have_posts()) { ?>
					<div class="search-result__results">
						<?php while (have_posts()) {
							the_post();
							get_template_part('post-templates/post-item');
						} ?>
					</div>
					<div class="search-result__pagination">
						<?php
						the_posts_navigation();
						?>
					</div>
				<?php } else {
					get_template_part('template-parts/content', 'none');
				} ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>