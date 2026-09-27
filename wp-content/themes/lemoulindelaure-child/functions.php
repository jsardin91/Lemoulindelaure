<?php
/**
 * Astra child theme assets and reusable portal link.
 *
 * @package LeMoulinDeLaure
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'lemoulindelaure-child',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}, 20 );

/**
 * Usage: [lmdl_door href="/service/" label="Nom du service" art="ocean"]
 * Available art: ocean, forest, phoenix, passage. Set a real URL and a real service name.
 */
add_shortcode( 'lmdl_door', function ( $atts ) {
	$atts = shortcode_atts( array( 'href' => '', 'label' => '', 'art' => 'passage' ), $atts, 'lmdl_door' );
	$art  = sanitize_key( $atts['art'] );
	$arts = array( 'ocean', 'forest', 'phoenix', 'passage' );
	if ( ! in_array( $art, $arts, true ) || '' === trim( $atts['href'] ) || '' === trim( $atts['label'] ) ) {
		return '';
	}
	$url = get_stylesheet_directory_uri() . '/assets/doors/door-' . $art . '.webp';
	$open_url = get_stylesheet_directory_uri() . '/assets/doors/door-passage.webp';
	return '<a class="lmdl-door-link" href="' . esc_url( $atts['href'] ) . '"><span class="lmdl-door-link__scene" aria-hidden="true"><img class="lmdl-door-link__art" src="' . esc_url( $url ) . '" width="512" height="768" loading="lazy" decoding="async" alt=""><img class="lmdl-door-link__open" src="' . esc_url( $open_url ) . '" width="512" height="768" loading="lazy" decoding="async" alt=""></span><span class="lmdl-door-link__label">' . esc_html( $atts['label'] ) . '</span></a>';
} );
