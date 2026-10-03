<?php
/**
 * Template Name: LMdL — Pages éditoriales V3
 * Template Post Type: page
 *
 * Keep the existing page assignment and stored content for rollback.
 * Art-directed pages use server-rendered V3 partials; functional pages retain
 * their stored plugin-aware WordPress content.
 */

defined( 'ABSPATH' ) || exit;

get_header( 'v3' );
if ( ! lmdl_v3_render() ) {
  while ( have_posts() ) {
    the_post();
    echo '<main id="contenu" class="v3-functional">';
    the_content();
    echo '</main>';
  }
}
get_footer( 'v3' );
