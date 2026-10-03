<?php
/**
 * Astra child theme assets and reusable presentation helpers.
 *
 * @package LeMoulinDeLaure
 */

defined( 'ABSPATH' ) || exit;

$patterns_file = get_stylesheet_directory() . '/inc/patterns.php';
if ( file_exists( $patterns_file ) ) {
	require_once $patterns_file;
}
$page_patterns_file = get_stylesheet_directory() . '/inc/page-patterns.php';
if ( file_exists( $page_patterns_file ) ) {
	require_once $page_patterns_file;
}
$detail_patterns_file = get_stylesheet_directory() . '/inc/accompaniment-page-patterns.php';
if ( file_exists( $detail_patterns_file ) ) {
	require_once $detail_patterns_file;
}
$editorial_patterns_file = get_stylesheet_directory() . '/inc/editorial-page-patterns.php';
if ( file_exists( $editorial_patterns_file ) ) {
	require_once $editorial_patterns_file;
}
$functional_patterns_file = get_stylesheet_directory() . '/inc/functional-page-patterns.php';
if ( file_exists( $functional_patterns_file ) ) {
	require_once $functional_patterns_file;
}

/** Site-local plugin IDs stay in WordPress options, never in the public patterns. */
add_shortcode( 'lmdl_contact_form', function () {
	$id = absint( get_option( 'lmdl_forminator_contact_id', 0 ) );
	if ( ! $id || ! shortcode_exists( 'forminator_form' ) ) {
		return '<p class="lmdl-functional-unavailable">Le formulaire de contact sera bientôt disponible. Ce site est en cours de finalisation.</p>';
	}
	return do_shortcode( '[forminator_form id="' . $id . '"]' );
} );
add_shortcode( 'lmdl_booking', function () {
	if ( 'list' === get_option( 'lmdl_timetics_booking_mode', '' ) && shortcode_exists( 'timetics-meeting-list' ) ) {
		return do_shortcode( '[timetics-meeting-list limit="4"]' );
	}
	$id = absint( get_option( 'lmdl_timetics_booking_id', 0 ) );
	if ( ! $id || ! shortcode_exists( 'timetics-booking-form' ) ) {
		return '<p class="lmdl-functional-unavailable">Les créneaux de réservation seront bientôt disponibles. Les modalités sont en cours de finalisation.</p>';
	}
	return do_shortcode( '[timetics-booking-form id="' . $id . '"]' );
} );

/** Keep native posts under the approved Journal path. Flush permalinks once on staging. */
add_action( 'init', function () {
	add_rewrite_rule( '^journal/([^/]+)/?$', 'index.php?name=$matches[1]', 'top' );
} );
add_filter( 'post_link', function ( $permalink, $post ) {
	if ( 'post' !== $post->post_type || 'publish' !== $post->post_status ) {
		return $permalink;
	}
	return home_url( user_trailingslashit( 'journal/' . $post->post_name ) );
}, 10, 2 );

/** Keep receipts and Timetics' duplicate meeting URLs crawlable but noindex. */
function lmdl_is_functional_noindex() {
	return (bool) get_option( 'lmdl_preview_noindex', false )
		|| is_page( array( 'merci', 'reservation-confirmee', 'reservation-annulee' ) )
		|| is_singular( 'timetics-appointment' )
		|| is_post_type_archive( 'timetics-appointment' )
		|| is_tax( 'timetics-meeting-category' );
}
add_filter( 'wp_robots', function ( $robots ) {
	if ( lmdl_is_functional_noindex() ) {
		unset( $robots['index'] );
		$robots['noindex'] = true;
		$robots['follow'] = true;
	}
	return $robots;
} );
add_filter( 'rank_math/frontend/robots', function ( $robots ) {
	if ( lmdl_is_functional_noindex() ) {
		$robots['index'] = 'noindex';
		$robots['follow'] = 'follow';
	}
	return $robots;
} );
add_filter( 'rank_math/sitemap/entry', function ( $entry, $type, $object ) {
	if ( 'post' === $type && $object instanceof WP_Post && ( in_array( $object->post_name, array( 'merci', 'reservation-confirmee', 'reservation-annulee' ), true ) || 'timetics-appointment' === $object->post_type ) ) {
		return false;
	}
	return $entry;
}, 10, 3 );
/** WordPress core sitemap fallback when Rank Math's sitemap module is inactive. */
add_filter( 'wp_sitemaps_posts_query_args', function ( $args, $post_type ) {
	if ( 'page' !== $post_type ) {
		return $args;
	}
	$excluded = array();
	foreach ( array( 'merci', 'reservation-confirmee', 'reservation-annulee' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$excluded[] = $page->ID;
		}
	}
	$args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? $args['post__not_in'] : array(), $excluded );
	return $args;
}, 10, 2 );
add_filter( 'wp_sitemaps_post_types', function ( $post_types ) {
	unset( $post_types['timetics-appointment'] );
	return $post_types;
} );

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

/** Load the project presentation CSS inside the block editor as well. */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'editor-styles' );
	add_editor_style( array(
		'style.css',
		'assets/css/components.css',
		'assets/css/pages/home.css',
		'assets/css/pages/accompagnements.css',
		'assets/css/pages/accompaniment-detail.css',
		'assets/css/pages/editorial.css',
		'assets/css/pages/functional.css',
		'assets/css/editor.css',
	) );
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

/** Enqueue a child-theme stylesheet with a filemtime cache-busting version. */
function lmdl_enqueue_css( $handle, $relative_path, $dependencies = array() ) {
	$path = get_stylesheet_directory() . '/' . ltrim( $relative_path, '/' );
	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_style(
		$handle,
		get_stylesheet_directory_uri() . '/' . ltrim( $relative_path, '/' ),
		$dependencies,
		(string) filemtime( $path )
	);
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'lemoulindelaure-child',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	lmdl_enqueue_css( 'lmdl-components', 'assets/css/components.css', array( 'lemoulindelaure-child' ) );

	if ( is_front_page() ) {
		lmdl_enqueue_css( 'lmdl-home', 'assets/css/pages/home.css', array( 'lmdl-components' ) );
	}

	if ( is_front_page() || is_page( 'accompagnements' ) ) {
		lmdl_enqueue_css( 'lmdl-accompagnements', 'assets/css/pages/accompagnements.css', array( 'lmdl-components' ) );
	}

	if ( is_page( array(
		'communication-animale',
		'accompagnement-energetique-animalier',
		'connexion-defunts',
		'guidance-pour-soi',
	) ) ) {
		lmdl_enqueue_css( 'lmdl-accompaniment-detail', 'assets/css/pages/accompaniment-detail.css', array( 'lmdl-components' ) );
	}

	if ( is_page( array( 'le-jardin', 'a-propos', 'journal' ) ) || is_singular( 'post' ) ) {
		lmdl_enqueue_css( 'lmdl-editorial-pages', 'assets/css/pages/editorial.css', array( 'lmdl-components' ) );
	}

	if ( is_page( array( 'faq', 'contact', 'prendre-rendez-vous', 'merci', 'reservation-confirmee', 'reservation-annulee' ) ) ) {
		lmdl_enqueue_css( 'lmdl-functional-pages', 'assets/css/pages/functional.css', array( 'lmdl-components' ) );
	}
}, 20 );

/** Timetics globally queues its React bundle; content without a booking embed does not need it. */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_page( 'prendre-rendez-vous' ) && ( is_front_page() || is_page( 'accompagnements' ) || is_page_template( 'templates/lmdl-page-v1.php' ) || is_singular( 'post' ) ) ) {
		$content = (string) get_post_field( 'post_content', get_queried_object_id() );
		if ( false === stripos( $content, 'timetics' ) ) {
			wp_dequeue_script( 'timetics-packages' );
		}
	}
}, 100 );

/** The page template is an explicit editor setting, independent of page copy. */
function lmdl_is_v1_page() {
	return is_page_template( 'templates/lmdl-page-v1.php' );
}

/** Let the V1 core-block compositions reach the page edges inside Astra. */
add_filter( 'body_class', function ( $classes ) {
	if ( lmdl_is_v1_page() ) {
		$classes[] = 'lmdl-page-v1';
	}
	return $classes;
} );

/** Gutenberg patterns include their own H1, so suppress Astra's page title. */
add_filter( 'astra_the_title_enabled', function ( $enabled ) {
	return lmdl_is_v1_page() ? false : $enabled;
} );

/** The full desktop menu needs more room than Astra's default tablet switch. */
add_filter( 'astra_tablet_breakpoint', function () {
	return 1199;
} );

/** Keep serialized core/image blocks valid while sizing the bundled art. */
add_filter( 'render_block', function ( $html, $block ) {
	if ( 'core/image' !== $block['blockName'] || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $html;
	}
	$classes = isset( $block['attrs']['className'] ) ? (string) $block['attrs']['className'] : '';
	if ( false === strpos( $classes, 'lmdl-' ) ) {
		return $html;
	}
	$image = new WP_HTML_Tag_Processor( $html );
	if ( ! $image->next_tag( 'img' ) ) {
		return $html;
	}
	$asset = basename( (string) wp_parse_url( (string) $image->get_attribute( 'src' ), PHP_URL_PATH ) );
	$sizes = array(
		'painting-squirrel-display.webp' => array( 945, 960 ),
		'painting-phoenix-display.webp'  => array( 945, 960 ),
		'painting-turtle-display.webp'   => array( 960, 946 ),
		'painting-butterfly-display.webp' => array( 960, 959 ),
		'embleme-transparent.png'       => array( 700, 636 ),
	);
	if ( isset( $sizes[ $asset ] ) && ! $image->get_attribute( 'width' ) ) {
		$image->set_attribute( 'width', (string) $sizes[ $asset ][0] );
		$image->set_attribute( 'height', (string) $sizes[ $asset ][1] );
	}
	if ( false !== strpos( $classes, 'lmdl-art-collage__' ) || false !== strpos( $classes, 'lmdl-detail-hero__image' ) ) {
		$image->set_attribute( 'loading', 'eager' );
		if ( false !== strpos( $classes, 'lmdl-art-collage__lead' ) || false !== strpos( $classes, 'lmdl-detail-hero__image' ) ) {
			$image->set_attribute( 'fetchpriority', 'high' );
		}
	}
	return $image->get_updated_html();
}, 10, 2 );

/**
 * Legacy prototype shortcode.
 *
 * Usage: [lmdl_door href="/service/" label="Nom du service" art="ocean"]
 * Available art: ocean, forest, phoenix, passage.
 *
 * This remains useful for a simple decorative link but is not the planned
 * production implementation for the coordinated four-universe hub.
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
