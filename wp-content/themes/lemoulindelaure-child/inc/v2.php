<?php
/** Art-directed V2 pages. Their HTML is kept alongside the CSS for visual QA. */
defined( 'ABSPATH' ) || exit;

function lmdl_v2_page_kind() {
  if ( is_front_page() ) { return 'selected'; }
  if ( is_page( 'accompagnements' ) ) { return 'hub'; }
  if ( is_page( array( 'communication-animale', 'accompagnement-energetique-animalier', 'connexion-defunts', 'guidance-pour-soi' ) ) ) { return 'terre'; }
  return '';
}

function lmdl_v2_render() {
  $kind = lmdl_v2_page_kind();
  if ( ! $kind ) { return false; }
  $path = get_stylesheet_directory() . '/assets/v2/' . $kind . '.html';
  if ( ! is_readable( $path ) ) { return false; }
  $html = file_get_contents( $path ); // Local, versioned theme resource.
  if ( ! preg_match( '/<main id="contenu">.*?<\/main>/s', $html, $matches ) ) { return false; }
  $html = $matches[0];
  if ( 'terre' === $kind && ! is_page( 'communication-animale' ) ) {
    $variants = array(
      'accompagnement-energetique-animalier' => array( 'Terre', 'Feu', 'Écureuil', 'Phénix', 'Communication animale', 'Accompagnement énergétique animalier', 'painting-squirrel-display.webp', 'painting-phoenix-display.webp', 'Un autre regard sur la relation avec votre animal.', 'Explorer une approche énergétique pour votre animal.', 'La communication animale ouvre un espace pour mieux comprendre votre animal et le lien qui vous unit.', 'L’accompagnement énergétique animalier propose une approche énergétique pour votre animal.' ),
      'connexion-defunts' => array( 'Terre', 'Eau', 'Écureuil', 'Tortue', 'Communication animale', 'Connexion avec les défunts', 'painting-squirrel-display.webp', 'painting-turtle-display.webp', 'Un autre regard sur la relation avec votre animal.', 'Explorer le lien lorsque la présence physique n’est plus là.', 'La communication animale ouvre un espace pour mieux comprendre votre animal et le lien qui vous unit.', 'Cette page explore le lien avec les êtres chers lorsque la présence physique n’est plus là.' ),
      'guidance-pour-soi' => array( 'Terre', 'Air', 'Écureuil', 'Papillon', 'Communication animale', 'Guidance pour soi', 'painting-squirrel-display.webp', 'painting-butterfly-display.webp', 'Un autre regard sur la relation avec votre animal.', 'Chercher un autre éclairage pour soi.', 'La communication animale ouvre un espace pour mieux comprendre votre animal et le lien qui vous unit.', 'La guidance pour soi ouvre un espace pour chercher un autre éclairage, sans prédiction ni certitude.' ),
    );
    $slug = get_post_field( 'post_name', get_queried_object_id() );
    if ( isset( $variants[ $slug ] ) ) {
      $v = $variants[ $slug ];
      $html = str_replace( array( $v[0], $v[2], $v[4], $v[6], $v[8], $v[10] ), array( $v[1], $v[3], $v[5], $v[7], $v[9], $v[11] ), $html );
      $html = str_replace( 'Communication<br>animale', esc_html( $v[5] ), $html );
      $html = str_replace( 'Le lien avec le vivant.', 'Un autre regard sur le lien.', $html );
      $html = str_replace( 'Le lien avec le vivant', 'Un autre regard sur le lien', $html );
    }
  }
  $asset_root = get_stylesheet_directory_uri() . '/assets/';
  $html = str_replace( '../../../wp-content/themes/lemoulindelaure-child/assets/', esc_url( $asset_root ), $html );
  $replacements = array(
    'href="selected.html#jardin"' => 'href="' . esc_url( home_url( '/le-jardin/' ) ) . '"',
    'href="selected.html#journal"' => 'href="' . esc_url( home_url( '/journal/' ) ) . '"',
    'href="selected.html#laure"' => 'href="' . esc_url( home_url( '/a-propos/' ) ) . '"',
    'href="selected.html"' => 'href="' . esc_url( home_url( '/' ) ) . '"',
    'href="hub.html#feu"' => 'href="' . esc_url( home_url( '/accompagnements/accompagnement-energetique-animalier/' ) ) . '"',
    'href="hub.html#eau"' => 'href="' . esc_url( home_url( '/accompagnements/connexion-defunts/' ) ) . '"',
    'href="hub.html#air"' => 'href="' . esc_url( home_url( '/accompagnements/guidance-pour-soi/' ) ) . '"',
    'href="hub.html"' => 'href="' . esc_url( home_url( '/accompagnements/' ) ) . '"',
    'href="terre.html"' => 'href="' . esc_url( home_url( '/accompagnements/communication-animale/' ) ) . '"',
    'href="feu.html"' => 'href="' . esc_url( home_url( '/accompagnements/accompagnement-energetique-animalier/' ) ) . '"',
    'href="eau.html"' => 'href="' . esc_url( home_url( '/accompagnements/connexion-defunts/' ) ) . '"',
    'href="air.html"' => 'href="' . esc_url( home_url( '/accompagnements/guidance-pour-soi/' ) ) . '"',
    'href="#contact">Me contacter' => 'href="' . esc_url( home_url( '/contact/' ) ) . '">Me contacter',
    'href="#contact">À propos de Laure' => 'href="' . esc_url( home_url( '/a-propos/' ) ) . '">À propos de Laure',
    'href="#contact">Découvrir le Jardin' => 'href="' . esc_url( home_url( '/le-jardin/' ) ) . '">Découvrir le Jardin',
    'href="#contact">Voir le Journal' => 'href="' . esc_url( home_url( '/journal/' ) ) . '">Voir le Journal',
    'href="#contact">Entrer dans l’univers' => 'href="' . esc_url( home_url( '/accompagnements/' ) ) . '">Entrer dans l’univers',
    'href="#contact">Prendre rendez-vous' => 'href="' . esc_url( home_url( '/prendre-rendez-vous/' ) ) . '">Prendre rendez-vous',
  );
  $html = strtr( $html, $replacements );
  echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Versioned HTML with URL substitutions escaped above.
  return true;
}
