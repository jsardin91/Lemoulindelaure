<?php
/** Editable V1 page patterns. The markup is made from native core blocks. */
defined( 'ABSPATH' ) || exit;

function lmdl_v1_group( $classes, $content ) {
	$attrs = wp_json_encode( array( 'className' => $classes ), JSON_UNESCAPED_UNICODE );
	return '<!-- wp:group ' . $attrs . ' --><div class="wp-block-group ' . esc_attr( $classes ) . '">' . $content . '</div><!-- /wp:group -->';
}
function lmdl_v1_heading( $text, $level = 2 ) {
	return '<!-- wp:heading {"level":' . (int) $level . '} --><h' . (int) $level . ' class="wp-block-heading">' . esc_html( $text ) . '</h' . (int) $level . '><!-- /wp:heading -->';
}
function lmdl_v1_p( $text, $classes = '' ) {
	$attrs = $classes ? ' ' . wp_json_encode( array( 'className' => $classes ), JSON_UNESCAPED_UNICODE ) : '';
	$class = $classes ? ' class="' . esc_attr( $classes ) . '"' : '';
	return '<!-- wp:paragraph' . $attrs . ' --><p' . $class . '>' . esc_html( $text ) . '</p><!-- /wp:paragraph -->';
}
function lmdl_v1_link( $label, $path, $classes = '', $accessible_label = '' ) {
	$class = $classes ? ' class="' . esc_attr( $classes ) . '"' : '';
	$aria = $accessible_label ? ' aria-label="' . esc_attr( $accessible_label ) . '"' : '';
	return '<!-- wp:paragraph --><p><a' . $class . $aria . ' href="' . esc_url( home_url( $path ) ) . '">' . esc_html( $label ) . '</a></p><!-- /wp:paragraph -->';
}
function lmdl_v1_image( $file, $alt, $classes ) {
	$src = get_stylesheet_directory_uri() . '/assets/' . $file;
	$attrs = wp_json_encode( array( 'sizeSlug' => 'full', 'linkDestination' => 'none', 'className' => $classes ), JSON_UNESCAPED_UNICODE );
	return '<!-- wp:image ' . $attrs . ' --><figure class="wp-block-image size-full ' . esc_attr( $classes ) . '"><img src="' . esc_url( $src ) . '" alt="' . esc_attr( $alt ) . '"/></figure><!-- /wp:image -->';
}
function lmdl_v1_section( $classes, $content ) {
	return lmdl_v1_group( 'lmdl-section ' . $classes, lmdl_v1_group( 'lmdl-container', $content ) );
}
function lmdl_v1_universes( $heading_level = 2 ) {
	$items = array(
		array( 'earth', 'Écureuil', 'Terre', 'Communication animale', '/accompagnements/communication-animale/', 'art/painting-squirrel-display.webp' ),
		array( 'fire', 'Phénix', 'Feu', 'Accompagnement énergétique animalier', '/accompagnements/accompagnement-energetique-animalier/', 'art/painting-phoenix-display.webp' ),
		array( 'water', 'Tortue', 'Eau', 'Connexion avec les défunts', '/accompagnements/connexion-defunts/', 'art/painting-turtle-display.webp' ),
		array( 'air', 'Papillon', 'Air', 'Guidance pour soi', '/accompagnements/guidance-pour-soi/', 'art/painting-butterfly-display.webp' ),
	);
	$panels = '';
	foreach ( $items as $item ) {
		$media = lmdl_v1_image( $item[5], '', 'lmdl-universe-panel__painting' );
		$copy = lmdl_v1_p( $item[1] . ' · ' . $item[2], 'lmdl-universe-panel__identity' )
			. lmdl_v1_heading( $item[3], $heading_level + 1 )
			. lmdl_v1_link( 'Découvrir', $item[4], 'lmdl-universe-panel__link', 'Découvrir ' . $item[3] );
		$panels .= lmdl_v1_group( 'lmdl-universe-panel lmdl-universe-panel--' . $item[0], lmdl_v1_group( 'lmdl-universe-panel__media', $media ) . lmdl_v1_group( 'lmdl-universe-panel__inner', $copy ) );
	}
	return lmdl_v1_group( 'lmdl-universe-field', $panels );
}

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern' ) ) { return; }
	$hero_art = lmdl_v1_image( 'art/painting-squirrel-display.webp', '', 'lmdl-art-collage__lead' )
		. lmdl_v1_image( 'art/painting-butterfly-display.webp', '', 'lmdl-art-collage__second' )
		. lmdl_v1_image( 'art/painting-turtle-display.webp', '', 'lmdl-art-collage__third' )
		. lmdl_v1_image( 'art/painting-phoenix-display.webp', '', 'lmdl-art-collage__fourth' );
	$hero = lmdl_v1_section( 'lmdl-home-intro', lmdl_v1_group( 'lmdl-home-hero',
		lmdl_v1_group( 'lmdl-home-hero__copy', lmdl_v1_heading( 'Le Moulin de Laure', 1 )
			. lmdl_v1_p( 'Au cœur du lien, au-delà des sens.', 'lmdl-home-hero__signature' )
			. lmdl_v1_p( 'Quatre univers pour explorer les liens avec les animaux, les êtres chers et soi-même.' )
			. lmdl_v1_group( 'lmdl-cta-group', lmdl_v1_link( 'Découvrir les accompagnements', '/accompagnements/', 'lmdl-button' ) . lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-text-link' ) ) )
		. lmdl_v1_group( 'lmdl-home-hero__art', lmdl_v1_group( 'lmdl-art-collage', $hero_art ) ) ) );
	$home = $hero;
	$home .= lmdl_v1_section( 'lmdl-home-manifesto', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Pourquoi Le Moulin ?' ) . lmdl_v1_p( 'Un chemin de cœur et quatre ailes : le vivant, l’énergie, la famille et les messages que l’on cherche à comprendre.' ) ) );
	$home .= lmdl_v1_section( 'lmdl-home-universes', lmdl_v1_heading( 'Quatre chemins à découvrir' ) . lmdl_v1_p( 'Chaque univers a son image et sa place. Choisissez celui que vous souhaitez explorer.' ) . lmdl_v1_universes() );
	$home .= lmdl_v1_section( 'lmdl-home-laure', lmdl_v1_group( 'lmdl-editorial-split', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Rencontrer Laure' ) . lmdl_v1_p( 'Découvrez son parcours, son regard sur le vivant et les valeurs qui accompagnent sa pratique.' ) . lmdl_v1_link( 'À propos de Laure', '/a-propos/', 'lmdl-text-link' ) ) . lmdl_v1_image( 'logo/embleme-transparent.png', '', 'lmdl-home-laure__emblem' ) ) );
	$home .= lmdl_v1_section( 'lmdl-home-process', lmdl_v1_heading( 'Comment avancer ?' ) . lmdl_v1_group( 'lmdl-process', lmdl_v1_group( 'lmdl-process__step', lmdl_v1_heading( 'Découvrir', 3 ) . lmdl_v1_p( 'Parcourez les quatre accompagnements.' ) ) . lmdl_v1_group( 'lmdl-process__step', lmdl_v1_heading( 'Poser une question', 3 ) . lmdl_v1_p( 'Contactez Laure si vous souhaitez une précision.' ) ) . lmdl_v1_group( 'lmdl-process__step', lmdl_v1_heading( 'Prendre rendez-vous', 3 ) . lmdl_v1_p( 'Consultez la page de réservation.' ) ) ) );
	$home .= lmdl_v1_section( 'lmdl-home-values lmdl-surface--ink', lmdl_v1_heading( 'Un cadre d’écoute et de respect' ) . lmdl_v1_p( 'Bienveillance, non-jugement, honnêteté et confidentialité guident les échanges.' ) . lmdl_v1_p( 'Laure ne pose pas de diagnostic médical ou vétérinaire. Les professionnels compétents restent essentiels lorsque la situation le demande.' ) );
	$home .= lmdl_v1_section( 'lmdl-home-garden', lmdl_v1_group( 'lmdl-editorial-split', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Le Jardin du Moulin' ) . lmdl_v1_p( 'Un espace pour découvrir les professionnels croisés sur le chemin de Laure, présentés avec leur accord.' ) . lmdl_v1_link( 'Découvrir le Jardin', '/le-jardin/', 'lmdl-text-link' ) ) . lmdl_v1_image( 'art/painting-butterfly-display.webp', '', 'lmdl-home-garden__art' ) ) );
	$home .= lmdl_v1_section( 'lmdl-home-journal', lmdl_v1_heading( 'Le Journal' ) . lmdl_v1_p( 'Un espace éditorial pour les futurs articles du Moulin.' ) . lmdl_v1_link( 'Voir le Journal', '/journal/', 'lmdl-text-link' ) );
	$home .= lmdl_v1_section( 'lmdl-home-close', lmdl_v1_group( 'lmdl-faq-booking', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Une question ?' ) . lmdl_v1_p( 'Retrouvez les questions fréquentes sur les accompagnements.' ) . lmdl_v1_link( 'Consulter la FAQ', '/faq/', 'lmdl-text-link' ) ) . lmdl_v1_group( 'lmdl-home-close__booking', lmdl_v1_heading( 'Prendre rendez-vous' ) . lmdl_v1_p( 'Vous pouvez consulter la page de réservation pour choisir la suite.' ) . lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-button' ) ) ) );
	register_block_pattern( 'lmdl/homepage-v1', array( 'title' => 'LMdL — Page accueil V1', 'description' => 'Composition complète et éditable de la page d’accueil.', 'categories' => array( 'lmdl' ), 'content' => $home ) );

	$hub = lmdl_v1_section( 'lmdl-hub-intro', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Les accompagnements', 1 ) . lmdl_v1_p( 'Quatre chemins pour explorer le lien avec le vivant, les êtres chers et soi-même. Chaque page présente son approche.' ) ) );
	$hub .= lmdl_v1_section( 'lmdl-hub-universes', lmdl_v1_universes( 1 ) );
	$hub .= lmdl_v1_section( 'lmdl-hub-orientation', lmdl_v1_heading( 'Quel chemin explorer ?' ) . lmdl_v1_group( 'lmdl-hub-orientation__list', lmdl_v1_link( 'Mieux comprendre votre animal → Communication animale', '/accompagnements/communication-animale/' ) . lmdl_v1_link( 'Explorer une approche énergétique pour un animal → Accompagnement énergétique animalier', '/accompagnements/accompagnement-energetique-animalier/' ) . lmdl_v1_link( 'Explorer un lien avec un défunt → Connexion avec les défunts', '/accompagnements/connexion-defunts/' ) . lmdl_v1_link( 'Chercher un autre éclairage pour soi → Guidance pour soi', '/accompagnements/guidance-pour-soi/' ) ) );
	$hub .= lmdl_v1_section( 'lmdl-hub-frame', lmdl_v1_heading( 'Une même attention au lien' ) . lmdl_v1_p( 'Bienveillance, respect, honnêteté et confidentialité traversent les quatre univers.' ) );
	$hub .= lmdl_v1_section( 'lmdl-hub-practical', lmdl_v1_group( 'lmdl-editorial-split', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'En pratique' ) . lmdl_v1_p( 'Les rendez-vous sont envisagés principalement en soirée et le samedi. Les modalités propres à chaque accompagnement restent à préciser.' ) ) . lmdl_v1_group( 'lmdl-boundary', lmdl_v1_heading( 'Un cadre responsable', 3 ) . lmdl_v1_p( 'Laure ne pose pas de diagnostic médical ou vétérinaire. Un professionnel compétent reste indispensable lorsque la situation le demande.' ) ) ) );
	$hub .= lmdl_v1_section( 'lmdl-hub-close', lmdl_v1_group( 'lmdl-faq-booking', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Vous avez une question ?' ) . lmdl_v1_link( 'Consulter la FAQ', '/faq/', 'lmdl-text-link' ) ) . lmdl_v1_group( 'lmdl-home-close__booking', lmdl_v1_heading( 'Poursuivre le chemin' ) . lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-button' ) . lmdl_v1_link( 'Me contacter', '/contact/', 'lmdl-text-link' ) ) ) );
	register_block_pattern( 'lmdl/accompagnements-v1', array( 'title' => 'LMdL — Hub Accompagnements V1', 'description' => 'Hub complet de quatre univers avec contenus éditables.', 'categories' => array( 'lmdl' ), 'content' => $hub ) );
}, 20 );
