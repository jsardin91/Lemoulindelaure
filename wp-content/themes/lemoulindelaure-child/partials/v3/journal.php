<?php defined( 'ABSPATH' ) || exit; $journal = $data['journal']; ?>
<main id="contenu" class="v3-main v3-journal">
  <section class="v3-editorial-hero v3-journal-hero"><div><p class="v3-folio">Le Moulin · cahier de lecture</p><h1>Le <em>Journal.</em></h1><p><?php echo esc_html( $journal['lead'] ); ?></p></div><figure><?php echo lmdl_v3_image( 'art/painting-turtle-display.webp', 'Détail de la peinture de la tortue par Laure', '' ); ?><figcaption>Couverture du Journal · œuvre originale de Laure</figcaption></figure></section>
  <section class="v3-journal-index"><p class="v3-folio">Les pages du Moulin</p><h2>À lire.</h2>
    <?php
    $page = max( 1, (int) get_query_var( 'paged' ) );
    $query = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 6, 'paged' => $page, 'ignore_sticky_posts' => true ) );
    if ( $query->have_posts() ) {
      $index = 0;
      echo '<div class="v3-journal-list">';
      while ( $query->have_posts() ) {
        $query->the_post();
        $index++;
        echo '<article class="v3-journal-entry' . ( 1 === $index ? ' v3-journal-entry--lead' : '' ) . '">';
        if ( has_post_thumbnail() ) { echo '<a class="v3-journal-entry__image" href="' . esc_url( get_permalink() ) . '">'; the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); echo '</a>'; }
        echo '<div><p class="v3-folio"><time datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time></p><h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3>';
        if ( has_excerpt() ) { echo '<p>' . esc_html( get_the_excerpt() ) . '</p>'; }
        echo '</div></article>';
      }
      echo '</div>';
      $pagination = paginate_links( array( 'total' => $query->max_num_pages, 'current' => $page, 'type' => 'list', 'prev_text' => 'Page précédente', 'next_text' => 'Page suivante' ) );
      if ( $pagination ) { echo '<nav class="v3-journal-pagination" aria-label="Pagination du Journal">' . wp_kses_post( $pagination ) . '</nav>'; }
      wp_reset_postdata();
    } else {
      echo '<p class="v3-journal-empty">' . esc_html( $journal['empty'] ) . '</p>';
    }
    ?>
  </section>
  <section class="v3-journal-close"><p class="v3-folio">L’autre porte</p><h2>Les quatre univers du Moulin.</h2><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Explorer les accompagnements <span aria-hidden="true">↗</span></a></section>
</main>
