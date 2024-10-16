<?php get_header(); // Підключаємо заголовок 
?>

<section class="content-area">
	<div class="container">
		<?php if (have_posts()) : // Якщо є пости 
		?>
			<?php while (have_posts()) : the_post(); // Проходимо через пости 
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-content">
						<?php the_content(); // Виводимо контент поста 
						?>
					</div>
				</article>
			<?php endwhile; ?>

			<?php the_posts_pagination(); // Додаємо пагінацію, якщо постів більше одного 
			?>
		<?php else : ?>
			<p><?php _e('No content found', 'your-theme-text-domain'); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); // Підключаємо футер 
?>