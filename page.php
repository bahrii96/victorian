<?php
get_header();
?>
<main>
	<div class="container">


		<div class="default-template">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>', true);
			}
			?>
			<?php the_content(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>