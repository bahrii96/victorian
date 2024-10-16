<?php


// Rank Math breadcrumbs before the article
function breacrumbs_template()
{
  if (function_exists('rank_math_the_breadcrumbs')) {
    rank_math_the_breadcrumbs('<div id="breadcrumbs" class="breadcrumbs_inner">', '</div>');
  }
}

function breadcrumbs_before()
{
  $content_socshare = '<div class="hero-illustration__nav">';
  ob_start();
  breacrumbs_template();
  $content_socshare .= ob_get_clean();
  $content_socshare .= '</div>';

  return $content_socshare;
}

add_filter(
  'rank_math/frontend/breadcrumb/items',
  function ($crumbs) {
    foreach ($crumbs as &$crumb) {
      global $post;
      if (isset($post) && $post) {
        $post_id = $post->ID;
        $post_options = get_field('post_options', $post_id);
        if (is_array($post_options) && array_key_exists('short_title', $post_options)) {
          $short_title = $post_options['short_title'];
          if (is_post_type_archive('swir-in-the-news')) {
            $crumbs[count($crumbs) - 1][0] = 'SWIR in the News';
          } else if ($short_title) {
            $crumbs[count($crumbs) - 1][0] = $short_title;
          }
        }
      }
    }
    return $crumbs;
  },
  10,
  2
);
