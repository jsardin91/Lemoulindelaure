<?php
/** Shared provisional FAQ copy and rendering for the V3 pages. */
defined( 'ABSPATH' ) || exit;

function lmdl_v3_faq_items() {
	return array(
		'why' => array(
			'question' => 'Pourquoi la communication animale ?',
			'answer'   => 'Elle propose une autre manière de porter attention à votre animal et au lien qui vous unit. Elle peut ouvrir une piste de compréhension, sans remplacer ce que vous observez chaque jour auprès de lui.',
			'link'     => '/accompagnements/communication-animale/',
			'label'    => 'Découvrir la communication animale',
		),
		'how' => array(
			'question' => 'Comment se passe une séance ?',
			'answer'   => 'Le déroulement dépend de l’accompagnement choisi. Avant de vous engager, je vous préciserai le format, les étapes et les informations utiles. Vous pouvez aussi me poser vos questions en amont.',
		),
		'format' => array(
			'question' => 'Est-ce en présentiel ou à distance ?',
			'answer'   => 'Pour la communication animale, les deux formats sont envisagés. Le format des autres accompagnements et les modalités concrètes seront confirmés avec vous avant tout rendez-vous.',
		),
		'feeling' => array(
			'question' => 'Est-ce que l’animal ressent quelque chose ?',
			'answer'   => 'Je ne peux pas prévoir ce qu’un animal ressentira ni promettre une réaction visible. Son rythme et sa sensibilité restent au centre de mon approche. Si son état ou son comportement vous inquiète, demandez l’avis d’un vétérinaire.',
		),
		'choose' => array(
			'question' => 'Je ne sais pas quel accompagnement choisir. Que faire ?',
			'answer'   => 'Vous pouvez parcourir les quatre univers du Moulin pour voir celui qui correspond le mieux à votre question. Si vous hésitez encore, écrivez-moi : nous pourrons clarifier votre demande avant de choisir une suite.',
			'link'     => '/accompagnements/',
			'label'    => 'Explorer les accompagnements',
		),
		'medical' => array(
			'question' => 'Ces accompagnements remplacent-ils un avis médical ou vétérinaire ?',
			'answer'   => 'Non. Je ne pose pas de diagnostic et ces accompagnements ne remplacent ni une consultation médicale ni une consultation vétérinaire. Pour toute question de santé, adressez-vous au professionnel compétent.',
		),
		'deceased' => array(
			'question' => 'Peut-on être certain de recevoir un message d’un défunt ?',
			'answer'   => 'Non. Je ne peux pas garantir qu’un message sera reçu. Ce sujet demande de la délicatesse : votre vécu et vos limites doivent pouvoir être respectés, sans pression ni promesse.',
			'link'     => '/accompagnements/connexion-defunts/',
			'label'    => 'Lire la page Connexion avec les défunts',
		),
		'guidance' => array(
			'question' => 'La guidance pour soi prédit-elle l’avenir ?',
			'answer'   => 'Non. La guidance pour soi invite à explorer un autre regard sur une situation. Elle ne donne ni prédiction ni certitude sur l’avenir ; vos choix vous appartiennent.',
			'link'     => '/accompagnements/guidance-pour-soi/',
			'label'    => 'Lire la page Guidance pour soi',
		),
	);
}

/** Plugin FAQ is an explicit site setting, never inferred from page blocks. */
function lmdl_v3_faq_plugin_selected() {
	return 'plugin' === get_option( 'lmdl_v3_faq_source', 'theme' );
}

function lmdl_v3_faq_plugin_content() {
	if ( ! lmdl_v3_faq_plugin_selected() || ! shortcode_exists( 'structured_faq' ) ) {
		return '';
	}
	$rendered = do_shortcode( '[structured_faq]' );
	$visible = preg_replace( '/<(?:script|style)\b[^>]*>.*?<\/(?:script|style)>/is', '', $rendered );
	return trim( wp_strip_all_tags( $visible ) ) ? $rendered : '';
}

function lmdl_v3_faq_list( $keys = array(), $open_first = false ) {
	$items = lmdl_v3_faq_items();
	if ( ! $keys ) {
		$keys = array_keys( $items );
	}
	$html = '<div class="v3-faq__list">';
	$index = 0;
	foreach ( $keys as $key ) {
		if ( ! isset( $items[ $key ] ) ) {
			continue;
		}
		$item = $items[ $key ];
		$html .= '<details class="v3-faq__item"' . ( $open_first && 0 === $index ? ' open' : '' ) . '><summary>' . esc_html( $item['question'] ) . '</summary><div class="v3-faq__answer"><p>' . esc_html( $item['answer'] ) . '</p>';
		if ( isset( $item['link'] ) ) {
			$html .= '<a href="' . esc_url( home_url( $item['link'] ) ) . '">' . esc_html( $item['label'] ) . ' <span aria-hidden="true">↗</span></a>';
		}
		$html .= '</div></details>';
		++$index;
	}
	return $html . '</div>';
}

function lmdl_v3_faq_preview( $keys, $id, $title = 'Quelques réponses.' ) {
	$html = '<section class="v3-faq-preview" aria-labelledby="' . esc_attr( $id ) . '"><div class="v3-faq-preview__intro"><p class="v3-folio">Questions fréquentes</p><h2 id="' . esc_attr( $id ) . '">' . esc_html( $title ) . '</h2><a class="v3-editorial-link" href="' . esc_url( home_url( '/faq/' ) ) . '">Toutes les questions <span aria-hidden="true">↗</span></a></div>';
	if ( lmdl_v3_faq_plugin_selected() ) {
		$html .= '<p class="v3-faq-preview__plugin-note">Les réponses complètes sont à retrouver dans la FAQ.</p>';
	} else {
		$html .= lmdl_v3_faq_list( $keys );
	}
	return $html . '</section>';
}
