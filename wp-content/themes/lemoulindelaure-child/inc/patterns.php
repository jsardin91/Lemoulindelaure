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
	register_block_pattern(
		'lmdl/home-hero-shell',
		array(
			'title'       => __( 'LMdL — Hero accueil', 'lemoulindelaure-child' ),
			'description' => __( 'Hero accueil asymétrique avec CTA et quatre emplacements d’œuvres.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container lmdl-home-hero"} -->
<div class="wp-block-group lmdl-container lmdl-home-hero"><!-- wp:group {"className":"lmdl-home-hero__copy lmdl-prose","layout":{"type":"constrained"}} -->
<div class="wp-block-group lmdl-home-hero__copy lmdl-prose"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Le Moulin de Laure</h1>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Au cœur du lien, au-delà des sens.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter ici la courte phrase d’introduction SEO/UX validée.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"lmdl-cta-group"} -->
<div class="wp-block-buttons lmdl-cta-group"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/accompagnements/">Découvrir les accompagnements</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/prendre-rendez-vous/">Prendre rendez-vous</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-home-hero__art"} -->
<div class="wp-block-group lmdl-home-hero__art"><!-- wp:group {"className":"lmdl-art-collage"} -->
<div class="wp-block-group lmdl-art-collage"><!-- wp:group {"className":"lmdl-art-slot"} -->
<div class="wp-block-group lmdl-art-slot"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Œuvre principale — remplacer par une image depuis la Médiathèque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-art-slot"} -->
<div class="wp-block-group lmdl-art-slot"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Œuvre secondaire — remplacer par une image depuis la Médiathèque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-art-slot"} -->
<div class="wp-block-group lmdl-art-slot"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Œuvre secondaire — remplacer par une image depuis la Médiathèque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-art-slot"} -->
<div class="wp-block-group lmdl-art-slot"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Œuvre secondaire — remplacer par une image depuis la Médiathèque.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

	register_block_pattern(
		'lmdl/four-universe-panels',
		array(
			'title'       => __( 'LMdL — Quatre univers', 'lemoulindelaure-child' ),
			'description' => __( 'Quatre panneaux accessibles pour présenter les quatre accompagnements.', 'lemoulindelaure-child' ),
			'categories'  => array( 'lmdl' ),
			'content'     => <<<'HTML'
<!-- wp:group {"className":"lmdl-section"} -->
<div class="wp-block-group lmdl-section"><!-- wp:group {"className":"lmdl-container"} -->
<div class="wp-block-group lmdl-container"><!-- wp:group {"className":"lmdl-prose"} -->
<div class="wp-block-group lmdl-prose"><!-- wp:heading -->
<h2 class="wp-block-heading">Un chemin de cœur et 4 ailes</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter ici l’introduction courte validée de la section.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-field"} -->
<div class="wp-block-group lmdl-universe-field"><!-- wp:group {"className":"lmdl-universe-panel lmdl-universe-panel--earth"} -->
<div class="wp-block-group lmdl-universe-panel lmdl-universe-panel--earth"><!-- wp:group {"className":"lmdl-universe-panel__media","layout":{"type":"constrained"}} -->
<div class="wp-block-group lmdl-universe-panel__media"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter la porte/l’œuvre Terre après vérification du mapping des assets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel__inner"} -->
<div class="wp-block-group lmdl-universe-panel__inner"><!-- wp:group {"className":"lmdl-universe-panel__content"} -->
<div class="wp-block-group lmdl-universe-panel__content"><!-- wp:paragraph {"className":"lmdl-kicker"} -->
<p class="lmdl-kicker">Écureuil · Terre · Vivant</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Communication animale</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->

<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="/accompagnements/communication-animale/">Découvrir</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel lmdl-universe-panel--fire"} -->
<div class="wp-block-group lmdl-universe-panel lmdl-universe-panel--fire"><!-- wp:group {"className":"lmdl-universe-panel__media","layout":{"type":"constrained"}} -->
<div class="wp-block-group lmdl-universe-panel__media"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter la porte/l’œuvre Feu après vérification du mapping des assets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel__inner"} -->
<div class="wp-block-group lmdl-universe-panel__inner"><!-- wp:group {"className":"lmdl-universe-panel__content"} -->
<div class="wp-block-group lmdl-universe-panel__content"><!-- wp:paragraph {"className":"lmdl-kicker"} -->
<p class="lmdl-kicker">Phénix · Feu · Énergie</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Accompagnement énergétique animalier</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><a href="/accompagnements/accompagnement-energetique-animalier/">Découvrir</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel lmdl-universe-panel--water"} -->
<div class="wp-block-group lmdl-universe-panel lmdl-universe-panel--water"><!-- wp:group {"className":"lmdl-universe-panel__media","layout":{"type":"constrained"}} -->
<div class="wp-block-group lmdl-universe-panel__media"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter la porte/l’œuvre Eau après vérification du mapping des assets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel__inner"} -->
<div class="wp-block-group lmdl-universe-panel__inner"><!-- wp:group {"className":"lmdl-universe-panel__content"} -->
<div class="wp-block-group lmdl-universe-panel__content"><!-- wp:paragraph {"className":"lmdl-kicker"} -->
<p class="lmdl-kicker">Tortue · Eau · Famille</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Connexion avec les défunts</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><a href="/accompagnements/connexion-defunts/">Découvrir</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel lmdl-universe-panel--air"} -->
<div class="wp-block-group lmdl-universe-panel lmdl-universe-panel--air"><!-- wp:group {"className":"lmdl-universe-panel__media","layout":{"type":"constrained"}} -->
<div class="wp-block-group lmdl-universe-panel__media"><!-- wp:paragraph {"className":"lmdl-pattern-placeholder"} -->
<p class="lmdl-pattern-placeholder">Ajouter la porte/l’œuvre Air après vérification du mapping des assets.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"lmdl-universe-panel__inner"} -->
<div class="wp-block-group lmdl-universe-panel__inner"><!-- wp:group {"className":"lmdl-universe-panel__content"} -->
<div class="wp-block-group lmdl-universe-panel__content"><!-- wp:paragraph {"className":"lmdl-kicker"} -->
<p class="lmdl-kicker">Papillon · Air · Messager</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Guidance pour soi</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><a href="/accompagnements/guidance-pour-soi/">Découvrir</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML,
		)
	);

} );
