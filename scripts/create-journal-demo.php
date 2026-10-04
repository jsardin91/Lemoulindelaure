<?php
/**
 * Create one clearly labeled Journal demo post in the guarded public preview.
 * Run with WP-CLI only after a verified private backup.
 */
defined( 'ABSPATH' ) || exit;

$local_fixture = '1' === getenv( 'LMDL_JOURNAL_DEMO_LOCAL' ) && '127.0.0.1' === wp_parse_url( home_url(), PHP_URL_HOST );
if ( ( ! $local_fixture && 'https://lemoulindelaure.fr' !== untrailingslashit( home_url() ) ) || 'lemoulindelaure-child' !== get_option( 'stylesheet' ) || '1' !== (string) get_option( 'lmdl_preview_noindex' ) ) {
	throw new RuntimeException( 'Public preview and noindex gate required.' );
}

$slug = 'article-de-demonstration';
$post = get_page_by_path( $slug, OBJECT, 'post' );
if ( $post && '1' !== get_post_meta( $post->ID, '_lmdl_journal_demo', true ) ) {
	throw new RuntimeException( 'Journal slug belongs to another post.' );
}

$content = <<<'HTML'
<!-- wp:paragraph -->
<p>Bienvenue dans cet article de démonstration. Il permet de voir comment les textes, les images et les liens prennent place dans le Journal du Moulin de Laure. Son contenu sera remplacé par un article relu et validé avant la publication du site.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Une première page à parcourir</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Un article peut commencer par quelques lignes, puis laisser de l’espace à la lecture. Ce paragraphe sert à apprécier la taille du texte, sa longueur et son rythme sur un téléphone comme sur un écran plus large.</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><p>Une citation de démonstration pour observer une autre respiration dans la page.</p></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">La lecture continue</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Le Journal accueillera plus tard des textes dont le sujet, les faits et les illustrations auront été choisis avec Laure. Pour l’instant, cette page sert uniquement à valider le design.</p>
<!-- /wp:paragraph -->
HTML;

if ( ! $post ) {
	$id = wp_insert_post( array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_name'    => $slug,
		'post_title'   => 'Article de démonstration',
		'post_excerpt' => 'Une page temporaire pour découvrir la mise en page du Journal.',
		'post_content' => $content,
		'post_author'  => 0,
	), true );
	if ( is_wp_error( $id ) || ! $id ) {
		throw new RuntimeException( 'Could not create Journal demo post.' );
	}
	update_post_meta( $id, '_lmdl_journal_demo', '1' );
	update_post_meta( $id, 'rank_math_robots', array( 'noindex', 'follow' ) );
	WP_CLI::log( 'JOURNAL_DEMO_CREATED=' . $id );
} else {
	$id = (int) $post->ID;
	if ( 'publish' !== $post->post_status ) {
		wp_update_post( array( 'ID' => $id, 'post_status' => 'publish' ) );
	}
	WP_CLI::log( 'JOURNAL_DEMO_REUSED=' . $id );
}

if ( ! has_post_thumbnail( $id ) ) {
	$existing = get_posts( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'posts_per_page' => 1, 'meta_key' => '_lmdl_journal_demo_cover', 'meta_value' => '1' ) );
	if ( $existing ) {
		$attachment_id = (int) $existing[0]->ID;
	} else {
		$source = get_stylesheet_directory() . '/assets/art/painting-butterfly-display.webp';
		if ( ! is_readable( $source ) ) {
			throw new RuntimeException( 'Demo artwork unavailable.' );
		}
		$upload = wp_upload_dir();
		if ( ! empty( $upload['error'] ) ) {
			throw new RuntimeException( 'WordPress upload directory unavailable.' );
		}
		$filename = wp_unique_filename( $upload['path'], 'journal-demo-papillon.webp' );
		$target = trailingslashit( $upload['path'] ) . $filename;
		if ( ! copy( $source, $target ) ) {
			throw new RuntimeException( 'Could not copy demo artwork.' );
		}
		$attachment_id = wp_insert_attachment( array( 'post_mime_type' => 'image/webp', 'post_title' => 'Papillon — image de démonstration', 'post_status' => 'inherit', 'guid' => trailingslashit( $upload['url'] ) . $filename ), $target, $id, true );
		if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
			unlink( $target );
			throw new RuntimeException( 'Could not register demo artwork.' );
		}
		require_once ABSPATH . 'wp-admin/includes/image.php';
		$metadata = wp_generate_attachment_metadata( $attachment_id, $target );
		if ( $metadata ) {
			wp_update_attachment_metadata( $attachment_id, $metadata );
		}
		update_post_meta( $attachment_id, '_wp_attachment_image_alt', 'Papillon aux ailes violettes' );
		update_post_meta( $attachment_id, '_lmdl_journal_demo_cover', '1' );
	}
	set_post_thumbnail( $id, $attachment_id );
}

if ( get_post_status( $id ) !== 'publish' || '1' !== get_post_meta( $id, '_lmdl_journal_demo', true ) || ! has_post_thumbnail( $id ) ) {
	throw new RuntimeException( 'Journal demo verification failed.' );
}
WP_CLI::log( 'JOURNAL_DEMO_READY=' . get_permalink( $id ) );
