<?php get_header(); ?>

<main>

	<section class="success-block">
		<div class="container">
			<h1>404</h1>
			<div class="success-block__desc">
				Такої сторінки не існує на сайті. Ви можете скористатись навігаційним меню або повернутись до головної.
			</div>
			<div class="success-block__link">
				<a href="/" class="btn">До головної</a>
			</div>

		</div>
	</section>
</main>
<?php get_footer(); ?>

<style>
	.success-block {
		min-height: 70vh;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		text-align: center;
	}

	.success-block__desc {
		max-width: 800px;
		margin: 0 auto 24px;
		font-size: 24px;
	}
</style>