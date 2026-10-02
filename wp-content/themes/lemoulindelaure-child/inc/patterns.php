<?php
/**
 * Gutenberg pattern registration for Le Moulin de Laure.
 *
 * Patterns are intentionally structural. Editor-only placeholder notes are
 * hidden on the public site by components.css.
 *
 * @package LeMoulinDeLaure
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'lmdl',
			array( 'label' => __( 'Le Moulin de Laure', 'lemoulindelaure-child' ) )
		);
	}

	register_block_pattern(
		'lmdl/editorial-split',
		array(
			'title'       => __( 'LMdL — Split éditorial', 'lemoulindelaure-child' ),
			'description' => __( 'Deux zones éditables pour texte et visuel, avec repli mobile.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container lmdl-editorial-split"} -->
<div class="wp-block-group lmdl-container lmdl-editorial-split"><!-- wp:group {"layout":{"type":"constrained"},"className":"lmdl-prose"} -->
<div class="wp-block-group lmdl-prose"><!-- wp:heading -->
<h2 class="wp-block-heading">Titre de section</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Texte éditorial à adapter au contenu validé.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lmdl-art-frame"} -->
<div class="wp-block-group lmdl-art-frame"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter ici l’image ou l’œuvre validée.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

	register_block_pattern(
		'lmdl/process-three',
		array(
			'title'       => __( 'LMdL — Processus en 3 étapes', 'lemoulindelaure-child' ),
			'description' => __( 'Trois étapes ordonnées, horizontales sur grand écran et verticales sur mobile.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container"} -->
<div class="wp-block-group lmdl-container"><!-- wp:group {"className":"lmdl-process"} -->
<div class="wp-block-group lmdl-process"><!-- wp:group {"className":"lmdl-process__step"} -->
<div class="wp-block-group lmdl-process__step"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Première étape</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Texte à compléter avec le processus réellement validé.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lmdl-process__step"} -->
<div class="wp-block-group lmdl-process__step"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Deuxième étape</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Texte à compléter avec le processus réellement validé.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lmdl-process__step"} -->
<div class="wp-block-group lmdl-process__step"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Troisième étape</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Texte à compléter avec le processus réellement validé.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

	register_block_pattern(
		'lmdl/responsible-boundary',
		array(
			'title'       => __( 'LMdL — Cadre responsable', 'lemoulindelaure-child' ),
			'description' => __( 'Bloc de clarification pour limites, précautions ou cadre de pratique.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container"} -->
<div class="wp-block-group lmdl-container"><!-- wp:group {"className":"lmdl-boundary"} -->
<div class="wp-block-group lmdl-boundary"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Un cadre clair</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Texte à adapter au cadre exact de l’accompagnement concerné.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

	register_block_pattern(
		'lmdl/booking-cta',
		array(
			'title'       => __( 'LMdL — CTA prise de rendez-vous', 'lemoulindelaure-child' ),
			'description' => __( 'Clôture de page sobre vers la page de réservation canonique.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section lmdl-surface--paper"} -->
<div class="wp-block-group lmdl-section lmdl-surface--paper"><!-- wp:group {"className":"lmdl-container lmdl-prose"} -->
<div class="wp-block-group lmdl-container lmdl-prose"><!-- wp:heading -->
<h2 class="wp-block-heading">Prendre rendez-vous</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter ici une phrase courte et validée avant publication.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"lmdl-cta-group"} -->
<div class="wp-block-buttons lmdl-cta-group"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/prendre-rendez-vous/">Prendre rendez-vous</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

	register_block_pattern(
		'lmdl/accompaniment-hero',
		array(
			'title'       => __( 'LMdL — Hero accompagnement', 'lemoulindelaure-child' ),
			'description' => __( 'Hero structurel pour une page d’accompagnement. Ajouter le modificateur earth, fire, water ou air.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container lmdl-accompaniment-hero"} -->
<div class="wp-block-group lmdl-container lmdl-accompaniment-hero"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"lmdl-accompaniment-hero__identity"} -->
<p class="lmdl-accompaniment-hero__identity">Animal · Élément · Univers</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Nom de l’accompagnement</h1>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Phrase courte à remplacer par le positionnement validé.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"lmdl-cta-group"} -->
<div class="wp-block-buttons lmdl-cta-group"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/prendre-rendez-vous/">Prendre rendez-vous</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"lmdl-art-frame"} -->
<div class="wp-block-group lmdl-art-frame"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter ici l’œuvre correspondante depuis la Médiathèque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);
} );
