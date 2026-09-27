<?php
/**
 * Astra child theme assets and reusable portal link.
 *
 * @package LeMoulinDeLaure
 */

defined( 'ABSPATH' ) || exit;

/** Nine slots matching Astra's native Global Palette (0–8). */
function lmdl_astra_palette() {
	return array( '#165a77', '#306c67', '#173f54', '#3f5355', '#faf7ef', '#fffdf8', '#dcd4bd', '#666294', '#b68631' );
}

/**
 * Set Astra Customizer defaults on first activation only. Later client edits win.
 * Both Astra's palette selector and its active theme settings need updating.
 */
add_action( 'after_switch_theme', function () {
	if ( ! defined( 'ASTRA_THEME_SETTINGS' ) || get_option( 'lmdl_brand_defaults_installed' ) ) {
		return;
	}
	$colors = lmdl_astra_palette();
	$palettes = get_option( 'astra-color-palettes', array() );
	if ( ! is_array( $palettes ) ) {
		$palettes = array();
	}
	if ( ! isset( $palettes['palettes'] ) || ! is_array( $palettes['palettes'] ) ) {
		$palettes['palettes'] = array();
	}
	$palettes['palettes']['palette_1'] = $colors;
	$palettes['currentPalette'] = 'palette_1';
	update_option( 'astra-color-palettes', $palettes );

	$settings = get_option( ASTRA_THEME_SETTINGS, array() );
	if ( ! is_array( $settings ) ) {
		$settings = array();
	}
	$settings['global-color-palette'] = array( 'palette' => $colors );
	$settings['body-font-family'] = 'Source Sans 3';
	$settings['body-font-weight'] = '400';
	$settings['body-line-height'] = '1.65';
	$settings['headings-font-family'] = 'Lora';
	$settings['headings-font-weight'] = '600';
	update_option( ASTRA_THEME_SETTINGS, $settings );
	update_option( 'lmdl_brand_defaults_installed', '1' );
} );

/** Fonts stay selectable in Astra; their files are served by the child theme. */
add_filter( 'astra_render_fonts', function ( $fonts ) {
	if ( is_array( $fonts ) ) {
		unset( $fonts['Lora'], $fonts['Source Sans 3'] );
	}
	return $fonts;
} );

/** Use the theme artwork as a logo until one is selected in WordPress Media. */
add_filter( 'astra_logo', function ( $html ) {
	if ( has_custom_logo() ) {
		return $html;
	}
	$src = get_stylesheet_directory_uri() . '/assets/logo/logo-horizontal-transparent.png';
	return '<span class="site-logo-img lmdl-site-logo"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '"><img src="' . esc_url( $src ) . '" width="1200" height="380" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" decoding="async"></a></span>';
}, 10, 1 );

/** Let an explicitly selected WordPress site icon take priority. */
add_filter( 'get_site_icon_url', function ( $url, $size ) {
	if ( $url ) {
		return $url;
	}
	$asset_size = $size <= 32 ? 32 : ( $size <= 180 ? 180 : 512 );
	return get_stylesheet_directory_uri() . '/assets/logo/icone-' . $asset_size . '.png';
}, 10, 2 );

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
