<?php
/**
 * One-time, idempotent public preview setup. Execute with WP-CLI only after a
 * private database/theme backup. Never import local TEST LOCAL fixtures.
 */
if ( ! defined( 'WP_CLI' ) || ! WP_CLI || '1' !== getenv( 'LMDL_PREVIEW_APPLY' ) ) {
	throw new RuntimeException( 'Explicit WP-CLI preview execution required.' );
}
if ( ! in_array( wp_parse_url( home_url(), PHP_URL_HOST ), array( 'lemoulindelaure.fr', '127.0.0.1' ), true ) ) {
	throw new RuntimeException( 'Unexpected site host.' );
}
if ( 'lemoulindelaure-child' !== get_stylesheet() ) {
	throw new RuntimeException( 'The expected child theme is not active.' );
}

$pages = array(
	array( 'key' => 'home', 'path' => 'accueil', 'slug' => 'accueil', 'title' => 'Accueil', 'pattern' => 'lmdl/homepage-v1' ),
	array( 'key' => 'hub', 'path' => 'accompagnements', 'slug' => 'accompagnements', 'title' => 'Accompagnements', 'pattern' => 'lmdl/accompagnements-v1' ),
	array( 'key' => 'earth', 'path' => 'accompagnements/communication-animale', 'slug' => 'communication-animale', 'title' => 'Communication animale', 'pattern' => 'lmdl/earth-accompaniment-v1', 'parent' => 'hub' ),
	array( 'key' => 'fire', 'path' => 'accompagnements/accompagnement-energetique-animalier', 'slug' => 'accompagnement-energetique-animalier', 'title' => 'Accompagnement énergétique animalier', 'pattern' => 'lmdl/fire-accompaniment-v1', 'parent' => 'hub' ),
	array( 'key' => 'water', 'path' => 'accompagnements/connexion-defunts', 'slug' => 'connexion-defunts', 'title' => 'Connexion avec les défunts', 'pattern' => 'lmdl/water-accompaniment-v1', 'parent' => 'hub' ),
	array( 'key' => 'air', 'path' => 'accompagnements/guidance-pour-soi', 'slug' => 'guidance-pour-soi', 'title' => 'Guidance pour soi', 'pattern' => 'lmdl/air-accompaniment-v1', 'parent' => 'hub' ),
	array( 'key' => 'jardin', 'path' => 'le-jardin', 'slug' => 'le-jardin', 'title' => 'Le Jardin du Moulin', 'pattern' => 'lmdl/le-jardin-v1' ),
	array( 'key' => 'about', 'path' => 'a-propos', 'slug' => 'a-propos', 'title' => 'À propos', 'pattern' => 'lmdl/a-propos-v1' ),
	array( 'key' => 'journal', 'path' => 'journal', 'slug' => 'journal', 'title' => 'Journal', 'pattern' => 'lmdl/journal-v1' ),
	array( 'key' => 'faq', 'path' => 'faq', 'slug' => 'faq', 'title' => 'FAQ', 'pattern' => 'lmdl/faq-v1' ),
	array( 'key' => 'contact', 'path' => 'contact', 'slug' => 'contact', 'title' => 'Contact', 'pattern' => 'lmdl/contact-v1' ),
	array( 'key' => 'booking', 'path' => 'prendre-rendez-vous', 'slug' => 'prendre-rendez-vous', 'title' => 'Prendre rendez-vous', 'pattern' => 'lmdl/booking-v1' ),
);

/* Complete every preflight before the first database write. */
$registry = WP_Block_Patterns_Registry::get_instance();
$pattern_content = array();
foreach ( $pages as $page ) {
	$registered = $registry->get_registered( $page['pattern'] );
	if ( ! $registered || empty( $registered['content'] ) || ! parse_blocks( $registered['content'] ) ) {
		throw new RuntimeException( 'Missing or empty approved pattern: ' . $page['pattern'] );
	}
	$pattern_content[ $page['key'] ] = $registered['content'];
	if ( 'https' === wp_parse_url( home_url(), PHP_URL_SCHEME ) ) {
		$pattern_content[ $page['key'] ] = str_replace( 'http://lemoulindelaure.fr/', 'https://lemoulindelaure.fr/', $pattern_content[ $page['key'] ] );
	}
	$existing = get_page_by_path( $page['path'] );
	if ( $existing && trim( (string) $existing->post_content ) && get_post_meta( $existing->ID, '_lmdl_preview_pattern', true ) !== $page['pattern'] ) {
		throw new RuntimeException( 'Existing nonempty target page requires manual review: ' . $page['path'] );
	}
}
if ( get_option( 'lmdl_forminator_contact_id', 0 ) || get_option( 'lmdl_timetics_booking_id', 0 ) || get_option( 'lmdl_timetics_booking_mode', '' ) ) {
	throw new RuntimeException( 'Existing plugin integration options require manual review before public preview.' );
}

update_option( 'blog_public', 0 );
update_option( 'lmdl_preview_noindex', 1 );
$ids = array();
foreach ( $pages as $page ) {
	$existing = get_page_by_path( $page['path'] );
	$parent_id = isset( $page['parent'] ) ? $ids[ $page['parent'] ] : 0;
	if ( $existing ) {
		$id = (int) $existing->ID;
		if ( ! trim( (string) $existing->post_content ) || ( '1' === getenv( 'LMDL_PREVIEW_REFRESH' ) && get_post_meta( $id, '_lmdl_preview_pattern', true ) === $page['pattern'] ) ) {
			$result = wp_update_post( array( 'ID' => $id, 'post_content' => $pattern_content[ $page['key'] ], 'post_status' => 'publish', 'post_parent' => $parent_id ), true );
			if ( is_wp_error( $result ) ) { throw new RuntimeException( 'Failed to populate ' . $page['path'] ); }
		}
		$action = 'REUSED';
	} else {
		$id = wp_insert_post( array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'post_title' => $page['title'],
			'post_name' => $page['slug'],
			'post_parent' => $parent_id,
			'post_content' => $pattern_content[ $page['key'] ],
			'comment_status' => 'closed',
		), true );
		if ( is_wp_error( $id ) || ! $id ) { throw new RuntimeException( 'Failed to create ' . $page['path'] ); }
		$action = 'CREATED';
	}
	update_post_meta( $id, '_wp_page_template', 'templates/lmdl-page-v1.php' );
	update_post_meta( $id, '_lmdl_preview_pattern', $page['pattern'] );
	$ids[ $page['key'] ] = (int) $id;
	WP_CLI::log( $action . ' /' . $page['path'] . '/ ID=' . $id );
}

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $ids['home'] );
update_option( 'page_for_posts', 0 );

/* Never show the untouched WordPress sample page/post in the V1 navigation or Journal. */
$sample = get_page_by_path( 'sample-page' );
if ( $sample && 'publish' === $sample->post_status && 'Sample Page' === $sample->post_title && false !== strpos( $sample->post_content, 'This is an example page' ) ) {
	wp_update_post( array( 'ID' => $sample->ID, 'post_status' => 'draft' ) );
	WP_CLI::log( 'DRAFTED default WordPress sample page' );
}
$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
if ( $hello && 'publish' === $hello->post_status && 'Hello world!' === $hello->post_title && false !== strpos( $hello->post_content, 'Welcome to WordPress' ) ) {
	wp_update_post( array( 'ID' => $hello->ID, 'post_status' => 'draft' ) );
	WP_CLI::log( 'DRAFTED default WordPress sample post' );
}

function lmdl_preview_menu( $name ) {
	$menu = wp_get_nav_menu_object( $name );
	if ( $menu ) { return (int) $menu->term_id; }
	$id = wp_create_nav_menu( $name );
	if ( is_wp_error( $id ) || ! $id ) { throw new RuntimeException( 'Could not create preview navigation.' ); }
	return (int) $id;
}
function lmdl_preview_menu_page( $menu_id, $page_id, $parent_item = 0, $classes = '' ) {
	$items = wp_get_nav_menu_items( $menu_id );
	foreach ( $items ? $items : array() as $item ) {
		if ( 'post_type' === $item->type && (int) $item->object_id === (int) $page_id && (int) $item->menu_item_parent === (int) $parent_item ) {
			return (int) $item->ID;
		}
	}
	$result = wp_update_nav_menu_item( $menu_id, 0, array(
		'menu-item-title' => get_the_title( $page_id ),
		'menu-item-object-id' => $page_id,
		'menu-item-object' => 'page',
		'menu-item-type' => 'post_type',
		'menu-item-status' => 'publish',
		'menu-item-parent-id' => $parent_item,
		'menu-item-classes' => $classes,
	) );
	if ( is_wp_error( $result ) || ! $result ) { throw new RuntimeException( 'Could not add preview navigation item.' ); }
	return (int) $result;
}

$primary = lmdl_preview_menu( 'Navigation LMdL V1' );
$hub_item = lmdl_preview_menu_page( $primary, $ids['hub'] );
foreach ( array( 'earth', 'fire', 'water', 'air' ) as $key ) {
	lmdl_preview_menu_page( $primary, $ids[ $key ], $hub_item );
}
foreach ( array( 'jardin', 'about', 'journal', 'faq', 'contact' ) as $key ) {
	lmdl_preview_menu_page( $primary, $ids[ $key ] );
}
lmdl_preview_menu_page( $primary, $ids['booking'], 0, 'lmdl-nav-booking' );

$footer = lmdl_preview_menu( 'Pied de page LMdL V1' );
foreach ( array( 'hub', 'jardin', 'about', 'journal', 'faq', 'contact', 'booking' ) as $key ) {
	lmdl_preview_menu_page( $footer, $ids[ $key ] );
}
$locations = get_theme_mod( 'nav_menu_locations', array() );
if ( ! is_array( $locations ) ) { $locations = array(); }
$locations['primary'] = $primary;
$locations['mobile_menu'] = $primary;
$locations['footer_menu'] = $footer;
set_theme_mod( 'nav_menu_locations', $locations );

/* Use Astra's native footer builder. Replace its untouched default credit only. */
if ( function_exists( 'astra_get_option' ) && function_exists( 'astra_update_option' ) ) {
	$credit = (string) astra_get_option( 'footer-copyright-editor' );
	if ( false !== strpos( $credit, '[theme_author]' ) ) {
		astra_update_option( 'footer-copyright-editor', '© [current_year] [site_title]' );
	}
	$footer_layout = astra_get_option( 'footer-desktop-items' );
	if ( is_array( $footer_layout ) && isset( $footer_layout['above']['above_1'] ) && is_array( $footer_layout['above']['above_1'] ) && ! in_array( 'menu', $footer_layout['above']['above_1'], true ) ) {
		$footer_layout['above']['above_1'][] = 'menu';
		astra_update_option( 'footer-desktop-items', $footer_layout );
	}
}

flush_rewrite_rules( false );
if ( has_action( 'litespeed_purge_all' ) ) { do_action( 'litespeed_purge_all' ); }
update_option( 'lmdl_preview_applied_sha', (string) getenv( 'LMDL_PREVIEW_SOURCE_SHA' ) );
WP_CLI::success( 'Preview pages, navigation and temporary noindex configured.' );
