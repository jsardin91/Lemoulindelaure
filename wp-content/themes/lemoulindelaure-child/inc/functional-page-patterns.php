<?php
/** Editable functional pages. Plugins own form submission and booking. */
defined( 'ABSPATH' ) || exit;

function lmdl_functional_shortcode_block( $shortcode, $class ) {
	return lmdl_v1_group( $class, '<!-- wp:shortcode -->' . esc_html( $shortcode ) . '<!-- /wp:shortcode -->' );
}

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern' ) ) { return; }

	$faq = lmdl_v1_section( 'lmdl-functional-hero lmdl-faq-hero', lmdl_v1_heading( 'Questions fréquentes', 1 )
		. lmdl_v1_p( 'Vous cherchez un repère avant de choisir un accompagnement ? Vous pouvez parcourir les quatre chemins du Moulin ou écrire à Laure.', 'lmdl-functional-lead' ) );
	$faq .= lmdl_v1_section( 'lmdl-faq-body', lmdl_v1_group( 'lmdl-functional-split',
		lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Un échange avant de décider' )
			. lmdl_v1_p( 'Les modalités de chaque accompagnement sont présentées sur sa page. Si votre question reste ouverte, vous pouvez la poser directement à Laure.' )
			. lmdl_v1_link( 'Découvrir les accompagnements', '/accompagnements/', 'lmdl-text-link' ) ) .
		lmdl_v1_group( 'lmdl-faq-list', lmdl_v1_p( 'Éditeur : quatre questions sont fournies dans le brief, mais pas leurs réponses. Ne publier des blocs Détails qu’après validation des réponses par Laure : Pourquoi la communication animale ? Comment se passe une séance ? Est-ce en présentiel ou à distance ? Est-ce que l’animal ressent quelque chose ?', 'lmdl-pattern-placeholder' ) ) ) );
	$faq .= lmdl_v1_section( 'lmdl-functional-close', lmdl_v1_group( 'lmdl-functional-split', lmdl_v1_heading( 'Une autre question ?' ) .
		lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Vous pouvez écrire à Laure pour demander une précision.' )
			. lmdl_v1_link( 'Contacter Laure', '/contact/', 'lmdl-button' ) ) ) );
	register_block_pattern( 'lmdl/faq-v1', array( 'title' => 'LMdL — FAQ V1', 'description' => 'Page FAQ sans réponse inventée, prête pour les Détails natifs après validation.', 'categories' => array( 'lmdl' ), 'content' => $faq ) );

	$answer = '<!-- wp:details {"className":"lmdl-faq-item lmdl-pattern-placeholder"} -->'
		. '<details class="wp-block-details lmdl-faq-item lmdl-pattern-placeholder"><summary>Question validée à renseigner</summary>'
		. lmdl_v1_p( 'Réponse approuvée par Laure à renseigner.' ) . '</details><!-- /wp:details -->';
	register_block_pattern( 'lmdl/faq-answer-entry', array( 'title' => 'LMdL — Réponse FAQ (brouillon)', 'description' => 'Renseigner question et réponse, puis retirer la classe de masquage après approbation.', 'categories' => array( 'lmdl' ), 'content' => $answer ) );

	$contact = lmdl_v1_section( 'lmdl-functional-hero lmdl-contact-hero', lmdl_v1_heading( 'Contact', 1 )
		. lmdl_v1_p( 'Une question à poser à Laure ? Le formulaire de contact ouvrira après confirmation de son destinataire.', 'lmdl-functional-lead' ) );
	$contact .= lmdl_v1_section( 'lmdl-contact-body', lmdl_v1_group( 'lmdl-functional-split',
		lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Écrire à Laure' )
			. lmdl_v1_p( 'Votre nom, votre adresse email et votre message suffisent pour prendre contact.' )
			. lmdl_v1_p( 'Éditeur : définir le destinataire et les informations de confidentialité avec Laure avant la mise en ligne. Ne pas publier d’adresse non approuvée.', 'lmdl-pattern-placeholder' ) ) .
		lmdl_functional_shortcode_block( '[lmdl_contact_form]', 'lmdl-contact-form' ) ) );
	$contact .= lmdl_v1_section( 'lmdl-functional-close lmdl-contact-close', lmdl_v1_group( 'lmdl-functional-split',
		lmdl_v1_heading( 'Vous souhaitez réserver ?' ) .
		lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Découvrez les accompagnements. Les créneaux seront affichés lorsque leurs modalités seront confirmées.' )
			. lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-button' ) ) ) );
	register_block_pattern( 'lmdl/contact-v1', array( 'title' => 'LMdL — Contact V1', 'description' => 'Contact éditable avec Forminator configuré par option de site.', 'categories' => array( 'lmdl' ), 'content' => $contact ) );

	$booking = lmdl_v1_section( 'lmdl-functional-hero lmdl-booking-hero', lmdl_v1_heading( 'Prendre rendez-vous', 1 )
		. lmdl_v1_p( 'Découvrez les quatre accompagnements. Les créneaux apparaîtront ici dès que leurs modalités seront confirmées.', 'lmdl-functional-lead' ) );
	$paths = array(
		array( 'Écureuil · Terre', 'Communication animale', '/accompagnements/communication-animale/' ),
		array( 'Phénix · Feu', 'Accompagnement énergétique animalier', '/accompagnements/accompagnement-energetique-animalier/' ),
		array( 'Tortue · Eau', 'Connexion avec les défunts', '/accompagnements/connexion-defunts/' ),
		array( 'Papillon · Air', 'Guidance pour soi', '/accompagnements/guidance-pour-soi/' ),
	);
	$list = '';
	foreach ( $paths as $path ) {
		$list .= lmdl_v1_group( 'lmdl-booking-choice', lmdl_v1_p( $path[0], 'lmdl-booking-choice__identity' )
			. lmdl_v1_heading( $path[1], 3 )
			. lmdl_v1_link( 'En savoir plus', $path[2], 'lmdl-text-link', 'En savoir plus sur ' . $path[1] ) );
	}
	$booking .= lmdl_v1_section( 'lmdl-booking-paths', lmdl_v1_heading( 'Les quatre accompagnements' )
		. lmdl_v1_group( 'lmdl-booking-services', $list ) );
	$booking .= lmdl_v1_section( 'lmdl-booking-main', lmdl_v1_heading( 'Choisir un créneau' )
		. lmdl_v1_p( 'Les créneaux et les informations de réservation apparaîtront ici après leur confirmation.' )
		. lmdl_functional_shortcode_block( '[lmdl_booking]', 'lmdl-booking-shell' )
		. lmdl_v1_p( 'Éditeur : les durées, tarifs, horaires, formats et règles d’annulation restent à confirmer avec Laure. Configurer Timetics avant publication ; ne pas reprendre les données TEST LOCAL.', 'lmdl-pattern-placeholder' ) );
	$booking .= lmdl_v1_section( 'lmdl-functional-close', lmdl_v1_group( 'lmdl-functional-split',
		lmdl_v1_heading( 'Une question avant de réserver ?' ) .
		lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Si vous avez besoin d’une précision, vous pouvez écrire à Laure.' )
			. lmdl_v1_link( 'Contacter Laure', '/contact/', 'lmdl-text-link' ) ) ) );
	register_block_pattern( 'lmdl/booking-v1', array( 'title' => 'LMdL — Prendre rendez-vous V1', 'description' => 'Choix des accompagnements et réservation Timetics configurée par option de site.', 'categories' => array( 'lmdl' ), 'content' => $booking ) );

	$thanks = lmdl_v1_section( 'lmdl-functional-receipt', lmdl_v1_heading( 'Merci pour votre message', 1 )
		. lmdl_v1_p( 'Votre message a été transmis par le formulaire.' )
		. lmdl_v1_link( 'Retour à l’accueil', '/', 'lmdl-text-link' ) );
	register_block_pattern( 'lmdl/merci-v1', array( 'title' => 'LMdL — Merci V1', 'description' => 'Confirmation simple, à placer en noindex.', 'categories' => array( 'lmdl' ), 'content' => $thanks ) );

	$confirmed = lmdl_v1_section( 'lmdl-functional-receipt', lmdl_v1_heading( 'Réservation confirmée', 1 )
		. lmdl_v1_p( 'Votre réservation a été enregistrée dans le module de rendez-vous.' )
		. lmdl_v1_link( 'Retour à l’accueil', '/', 'lmdl-text-link' ) );
	register_block_pattern( 'lmdl/reservation-confirmee-v1', array( 'title' => 'LMdL — Réservation confirmée V1', 'description' => 'À utiliser seulement si Timetics redirige réellement ici ; page noindex.', 'categories' => array( 'lmdl' ), 'content' => $confirmed ) );
}, 23 );
