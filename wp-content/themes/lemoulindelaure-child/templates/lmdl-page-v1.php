<?php
/**
 * Template Name: LMdL — Page éditoriale V2
 * Template Post Type: page
 *
 * Keep the existing page assignment while rendering the art-directed V2.
 * Supporting pages continue to use their source-safe Gutenberg content.
 */

defined( 'ABSPATH' ) || exit;

get_header( 'v2' );
if ( ! lmdl_v2_render() ) {
  while ( have_posts() ) {
    the_post();
    echo '<main id="contenu" class="v2-content">';
    the_content();
    echo '</main>';
  }
}
get_footer( 'v2' );
