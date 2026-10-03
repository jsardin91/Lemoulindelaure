<?php
/** V3 server-rendered composition router and reusable primitives. */
defined( 'ABSPATH' ) || exit;
require_once __DIR__ . '/content.php';

function lmdl_v3_kind() {
  if ( is_front_page() ) { return 'home'; }
  if ( is_page( 'accompagnements' ) ) { return 'hub'; }
  foreach ( lmdl_v3_content()['services'] as $key => $service ) {
    if ( is_page( $service['slug'] ) ) { return 'detail-' . $key; }
  }
  if ( is_page( 'a-propos' ) ) { return 'about'; }
  if ( is_page( 'le-jardin' ) ) { return 'garden'; }
  if ( is_page( 'journal' ) ) { return 'journal'; }
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
    'brand-derived/v3/squirrel-portal.webp' => array( 709, 720 ),
    'brand-derived/v3/phoenix-portal.webp' => array( 709, 720 ),
    'brand-derived/v3/turtle-portal.webp' => array( 720, 710 ),
    'brand-derived/v3/butterfly-portal.webp' => array( 720, 720 ),
    'logo/embleme-transparent.png' => array( 700, 636 ),
    'logo/signature-transparent.png' => array( 1120, 179 ),
    'logo/devise-transparent.png' => array( 820, 150 ),
    'logo/logo-complet-creme.webp' => array( 1170, 1050 ),
  );
  $size = $dimensions[ $path ] ?? array( 1, 1 );
  return '<img class="' . esc_attr( $classes ) . '" src="' . esc_url( lmdl_v3_asset( $path ) ) . '" width="' . (int) $size[0] . '" height="' . (int) $size[1] . '" alt="' . esc_attr( $alt ) . '" loading="' . ( $eager ? 'eager' : 'lazy' ) . '" decoding="async"' . ( $priority ? ' fetchpriority="high"' : '' ) . '>';
}

function lmdl_v3_portal_visual( $key, $service, $eager = false, $linked = false ) {
  $html = '<div class="v3-portal v3-portal--' . esc_attr( $key ) . '"' . ( $linked ? '' : ' aria-hidden="true"' ) . '><span class="v3-portal__aura" aria-hidden="true"></span><span class="v3-portal__frame" aria-hidden="true">';
  $html .= lmdl_v3_image( $service['preview'], '', 'v3-portal__painting', $eager, $eager && ! $service['door'] );
  if ( $service['door'] ) {
    $html .= lmdl_v3_image( $service['door'], '', 'v3-portal__door', $eager, $eager );
  } else {
    $html .= '<span class="v3-portal__air-leaf v3-portal__air-leaf--one"></span><span class="v3-portal__air-leaf v3-portal__air-leaf--two"></span><span class="v3-portal__air-line"></span>';
  }
  $html .= '</span>';
  if ( $linked ) {
    $html .= '<a class="v3-portal__hit" href="' . esc_url( home_url( $service['path'] ) ) . '" aria-label="Entrer dans l’univers ' . esc_attr( $service['element'] ) . ' : ' . esc_attr( $service['title'] ) . '"></a>';
  }
  return $html . '</div>';
}

function lmdl_v3_portal_article( $key, $service, $context = 'home' ) {
  $title_id = 'v3-' . $context . '-' . $key;
  $heading = 'hub' === $context ? 'h2' : 'h3';
  $html = '<article class="v3-gateway v3-gateway--' . esc_attr( $key ) . '" aria-labelledby="' . esc_attr( $title_id ) . '" data-v3-reveal>';
  $html .= '<div class="v3-gateway__copy"><p class="v3-folio">' . esc_html( $service['element'] ) . ' <span>·</span> ' . esc_html( $service['animal'] ) . ' <span>·</span> ' . esc_html( $service['motif'] ) . '</p>';
  $html .= '<' . $heading . ' id="' . esc_attr( $title_id ) . '">' . esc_html( $service['title'] ) . '</' . $heading . '>';
  $html .= '<p class="v3-gateway__intro">' . esc_html( $service['intro'] ) . '</p>';
  $html .= '<a class="v3-editorial-link" href="' . esc_url( home_url( $service['path'] ) ) . '">Entrer dans l’univers ' . esc_html( $service['element'] ) . ' <span aria-hidden="true">↗</span></a></div>';
  $html .= lmdl_v3_portal_visual( $key, $service, false, true );
  $html .= '<span class="v3-gateway__element" aria-hidden="true">' . esc_html( $service['element'] ) . '</span>';
  return $html . '</article>';
}

function lmdl_v3_close( $heading = 'Et si nous en parlions ?' ) {
  return '<section class="v3-close"><p class="v3-folio">La suite du chemin</p><h2>' . esc_html( $heading ) . '</h2><div><a class="v3-button" href="' . esc_url( home_url( '/prendre-rendez-vous/' ) ) . '">Prendre rendez-vous <span aria-hidden="true">↗</span></a><a class="v3-editorial-link" href="' . esc_url( home_url( '/contact/' ) ) . '">Me contacter <span aria-hidden="true">↗</span></a></div></section>';
}

function lmdl_v3_related( $current ) {
  $html = '<nav class="v3-related" aria-label="Autres accompagnements"><p class="v3-folio">Poursuivre la visite</p><h2>Les autres portes.</h2><div>';
  foreach ( lmdl_v3_content()['services'] as $key => $service ) {
    if ( $key === $current ) { continue; }
    $html .= '<a href="' . esc_url( home_url( $service['path'] ) ) . '"><span>' . esc_html( $service['element'] ) . ' · ' . esc_html( $service['animal'] ) . '</span><strong>' . esc_html( $service['title'] ) . '</strong><span aria-hidden="true">↗</span></a>';
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
