<?php /* Template name: Success Page */
get_header();
$page_success = get_field('page_success');

if ($page_success) {
	$title = $page_success['title'];
	$caption = $page_success['caption'];
	$link = $page_success['link'];
};
?>
<main>

	<section class="success-block">
		<div class="container">
			<?php if ($title): ?>
				<h1><?php echo $title ?></h1>
			<?php endif; ?>

			<?php if ($caption): ?>
				<div class="success-block__desc">
					<?php echo $caption ?>
				</div>
			<?php endif; ?>

			<?php if ($link): ?>
				<div class="success-block__link">
					<?php echo initLinkHref($link, 'btn') ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>