<?php
/** Reusable animated door links. The visible label is real HTML. */

defined( 'ABSPATH' ) || exit;

add_shortcode( 'lmdl_portal', function ( $atts ) {
	$atts = shortcode_atts( array( 'href' => '', 'label' => '', 'art' => '' ), $atts, 'lmdl_portal' );
	$doors = array(
		'forest'    => array( 'painting-squirrel-display.webp', 945, 960 ),
		'phoenix'   => array( 'painting-phoenix-display.webp', 945, 960 ),
		'ocean'     => array( 'painting-turtle-display.webp', 960, 946 ),
		'butterfly' => array( 'painting-butterfly-display.webp', 960, 959 ),
	);
	$art   = sanitize_key( $atts['art'] );
	$label = trim( (string) $atts['label'] );
	$href  = esc_url( trim( (string) $atts['href'] ) );
	if ( ! isset( $doors[ $art ] ) || '' === $label || '' === $href ) {
		return '';
	}

	$script = get_stylesheet_directory() . '/assets/js/door-portals.js';
	if ( file_exists( $script ) ) {
		wp_enqueue_script( 'lmdl-door-portals', get_stylesheet_directory_uri() . '/assets/js/door-portals.js', array(), (string) filemtime( $script ), true );
	}
	$base = get_stylesheet_directory_uri() . '/assets/';
	$painting = $doors[ $art ];

	return '<a class="lmdl-portal lmdl-portal--' . esc_attr( $art ) . '" href="' . $href . '">'
		. '<span class="lmdl-portal__scene" aria-hidden="true">'
		. '<img class="lmdl-portal__world" src="' . esc_url( $base . 'art/' . $painting[0] ) . '" width="' . $painting[1] . '" height="' . $painting[2] . '" loading="lazy" decoding="async" alt="">'
		. '<img class="lmdl-portal__door" src="' . esc_url( $base . 'doors/door-' . $art . '.webp' ) . '" width="512" height="768" loading="lazy" decoding="async" alt="">'
		. '</span><span class="lmdl-portal__label">' . esc_html( $label ) . '</span></a>';
} );
