<?php
/** V3 server-rendered composition router and reusable primitives. */
defined( 'ABSPATH' ) || exit;
require_once __DIR__ . '/content.php';
require_once __DIR__ . '/faq.php';

function lmdl_v3_kind() {
  if ( is_front_page() ) { return 'home'; }
  if ( is_page( 'accompagnements' ) ) { return 'hub'; }
  foreach ( lmdl_v3_content()['services'] as $key => $service ) {
    if ( is_page( $service['slug'] ) ) { return 'detail-' . $key; }
  }
  if ( is_page( 'a-propos' ) ) { return 'about'; }
  if ( is_page( 'le-jardin' ) ) { return 'garden'; }
  if ( is_page( 'journal' ) ) { return 'journal'; }
  if ( is_page( 'faq' ) ) { return 'faq'; }
  if ( is_page( 'contact' ) ) { return 'contact'; }
  if ( is_page( 'prendre-rendez-vous' ) ) { return 'booking'; }
  return '';
}

function lmdl_v3_asset( $path ) {
  return get_stylesheet_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

function lmdl_v3_image( $path, $alt = '', $classes = '', $eager = false, $priority = false ) {
  $dimensions = array(
    'art/painting-squirrel-display.webp' => array( 945, 960 ),
    'art/painting-phoenix-display.webp' => array( 945, 960 ),
    'art/painting-turtle-display.webp' => array( 960, 946 ),
    'art/painting-butterfly-display.webp' => array( 960, 959 ),
    'doors/door-forest.webp' => array( 512, 768 ),
    'doors/door-phoenix.webp' => array( 512, 768 ),
    'doors/door-ocean.webp' => array( 512, 768 ),
    'doors/door-passage.webp' => array( 512, 768 ),
    'brand-derived/v3/door-butterfly-cutout.webp' => array( 512, 768 ),
    'logo/embleme-transparent.png' => array( 700, 636 ),
    'logo/signature-transparent.png' => array( 1120, 179 ),
    'logo/devise-transparent.png' => array( 820, 150 ),
    'logo/logo-complet-creme.webp' => array( 1170, 1050 ),
    'logo/logo-complet-transparent.png' => array( 1170, 1050 ),
    'photos/laure-accueil.jpg' => array( 1200, 1079 ),
    'photos/laure-portrait.jpg' => array( 1000, 964 ),
    'photos/chat.jpg' => array( 960, 640 ),
    'photos/chien.jpg' => array( 960, 656 ),
    'photos/cheval.jpg' => array( 960, 641 ),
    'photos/oiseau.jpg' => array( 960, 560 ),
    'photos/squirrel.jpg' => array( 1280, 855 ),
    'photos/ibis.jpg' => array( 1280, 964 ),
    'photos/turtle.jpg' => array( 1280, 800 ),
    'photos/butterfly.jpg' => array( 1280, 854 ),
  );
  $size = $dimensions[ $path ] ?? array( 1, 1 );
  return '<img class="' . esc_attr( $classes ) . '" src="' . esc_url( lmdl_v3_asset( $path ) ) . '" width="' . (int) $size[0] . '" height="' . (int) $size[1] . '" alt="' . esc_attr( $alt ) . '" loading="' . ( $eager ? 'eager' : 'lazy' ) . '" decoding="async"' . ( $priority ? ' fetchpriority="high"' : '' ) . '>';
}

function lmdl_v3_portal_visual( $key, $service, $eager = false, $linked = false ) {
  $html = '<div class="v3-portal v3-portal--' . esc_attr( $key ) . '"' . ( $linked ? '' : ' aria-hidden="true"' ) . '><span class="v3-portal__aura" aria-hidden="true"></span><span class="v3-portal__frame" aria-hidden="true">';
  $html .= lmdl_v3_image( $service['door'], '', 'v3-portal__door', $eager, $eager );
  $html .= '</span>';
  if ( $linked ) {
    $html .= '<a class="v3-portal__hit" href="' . esc_url( home_url( $service['path'] ) ) . '" aria-label="Entrer dans l’univers ' . esc_attr( $service['universe'] ) . ' : ' . esc_attr( $service['title'] ) . '"></a>';
  }
  return $html . '</div>';
}

function lmdl_v3_chapter_visual( $key, $service, $photo, $photo_alt, $painting_alt ) {
  $html = '<div class="v3-chapter-visual v3-chapter-visual--' . esc_attr( $key ) . '">';
  $html .= '<figure class="v3-chapter-visual__photo">' . lmdl_v3_image( $photo, $photo_alt ) . '</figure>';
  $html .= '<figure class="v3-chapter-visual__medallion">' . lmdl_v3_image( $service['painting'], $painting_alt ) . '</figure>';
  return $html . '</div>';
}

function lmdl_v3_portal_article( $key, $service, $context = 'home' ) {
  $title_id = 'v3-' . $context . '-' . $key;
  $heading = 'hub' === $context ? 'h2' : 'h3';
  $html = '<article class="v3-gateway v3-gateway--' . esc_attr( $key ) . '" aria-labelledby="' . esc_attr( $title_id ) . '" data-v3-reveal>';
  $html .= '<div class="v3-gateway__copy"><p class="v3-folio">L’univers ' . esc_html( $service['universe'] ) . '</p>';
  $html .= '<' . $heading . ' id="' . esc_attr( $title_id ) . '">' . esc_html( $service['title'] ) . '</' . $heading . '>';
  $html .= '<p class="v3-gateway__intro">' . esc_html( $service['intro'] ) . '</p>';
  $html .= '<a class="v3-editorial-link" href="' . esc_url( home_url( $service['path'] ) ) . '">Entrer dans l’univers ' . esc_html( $service['universe'] ) . ' <span aria-hidden="true">↗</span></a></div>';
  $html .= lmdl_v3_portal_visual( $key, $service, false, true );
  $html .= '<span class="v3-gateway__element" aria-hidden="true">' . esc_html( $service['animal'] ) . '</span>';
  return $html . '</article>';
}

function lmdl_v3_close( $heading = 'Et si nous en parlions ?' ) {
  return '<section class="v3-close"><p class="v3-folio">La suite du chemin</p><h2>' . esc_html( $heading ) . '</h2><div><a class="v3-button" href="' . esc_url( home_url( '/prendre-rendez-vous/' ) ) . '">Prendre rendez-vous <span aria-hidden="true">↗</span></a><a class="v3-editorial-link" href="' . esc_url( home_url( '/contact/' ) ) . '">Me contacter <span aria-hidden="true">↗</span></a></div></section>';
}

function lmdl_v3_related( $current ) {
  $html = '<nav class="v3-related" aria-label="Autres accompagnements"><p class="v3-folio">Poursuivre la visite</p><h2>Les autres portes.</h2><div>';
  foreach ( lmdl_v3_content()['services'] as $key => $service ) {
    if ( $key === $current ) { continue; }
    $html .= '<a href="' . esc_url( home_url( $service['path'] ) ) . '"><span>L’univers ' . esc_html( $service['universe'] ) . '</span><strong>' . esc_html( $service['title'] ) . '</strong><span aria-hidden="true">↗</span></a>';
  }
  return $html . '</div></nav>';
}

function lmdl_v3_render() {
  $kind = lmdl_v3_kind();
  if ( ! $kind ) { return false; }
  $file = get_stylesheet_directory() . '/partials/v3/' . $kind . '.php';
  if ( ! is_readable( $file ) ) { return false; }
  $data = lmdl_v3_content();
  $services = $data['services'];
  require $file;
  return true;
}
