<?php
get_header();
?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$category = get_the_category($post->ID);
$post_per_page = get_option('posts_per_page');
$terms = get_the_terms($post->ID, 'category');
$author_id = get_post_field('post_author', $post->ID);

$postsCategories = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => $post_per_page,
  'post_status' => 'publish',
  'category__in' => $category[0]->cat_ID,
  'author' => $author_id,
  'paged' => $paged,
));
?>

<section class="entry-page blog-index-page">
  <div class="container">
    <div class="blog-index-page__wrapper">
      <div data-aos="fade-up" class="blog-index-page__list">
        <?php {
          if ($postsCategories->have_posts()) {
            while ($postsCategories->have_posts()) : $postsCategories->the_post(); ?>
              <?php get_template_part('post-templates/post-item', get_post_format()); ?>
        <?php endwhile;
            wp_reset_query();
            wp_reset_postdata();
          } else {
            echo ('<p>Posts is empty.</p>');
            wp_reset_query();
            wp_reset_postdata();
          }
        }
        ?>
      </div>
      <div class="blog-index-page__pagination show pagination">
        <?php pagination_bar($postsCategories); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>