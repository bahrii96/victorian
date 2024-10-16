<?php get_header(); ?>

<div class="container single-post-container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="post-meta">
					<span class="post-date"><?php the_date(); ?></span>
					<span class="post-author"><?php the_author(); ?></span>
				</div>
				<div class="post-thumbnail">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('large'); ?>
					<?php endif; ?>
				</div>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile;
	else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'textdomain'); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>