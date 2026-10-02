<?php
/** Editable editorial pages; Journal entries remain ordinary WordPress posts. */
defined( 'ABSPATH' ) || exit;

function lmdl_editorial_paths() {
	$paths = array(
		array( 'Communication animale', '/accompagnements/communication-animale/' ),
		array( 'Accompagnement énergétique animalier', '/accompagnements/accompagnement-energetique-animalier/' ),
		array( 'Connexion avec les défunts', '/accompagnements/connexion-defunts/' ),
		array( 'Guidance pour soi', '/accompagnements/guidance-pour-soi/' ),
	);
	$content = '';
	foreach ( $paths as $path ) {
		$content .= lmdl_v1_link( $path[0], $path[1], 'lmdl-editorial-paths__link' );
	}
	return lmdl_v1_group( 'lmdl-editorial-paths', $content );
}

function lmdl_journal_query_markup() {
	return '<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"lmdl-journal-query"} -->'
		. '<div class="wp-block-query lmdl-journal-query">'
		. '<!-- wp:post-template {"className":"lmdl-journal-list"} -->'
		. '<!-- wp:post-featured-image {"isLink":true} /-->'
		. '<!-- wp:post-date /-->'
		. '<!-- wp:post-title {"isLink":true,"level":2} /-->'
		. '<!-- wp:post-excerpt {"moreText":""} /-->'
		. '<!-- /wp:post-template -->'
		. '<!-- wp:query-pagination {"className":"lmdl-journal-pagination"} -->'
		. '<!-- wp:query-pagination-previous {"label":"Page précédente"} /--><!-- wp:query-pagination-numbers /--><!-- wp:query-pagination-next {"label":"Page suivante"} /-->'
		. '<!-- /wp:query-pagination -->'
		. '<!-- wp:query-no-results -->'
		. lmdl_v1_p( 'Le Journal prendra forme au fil des articles publiés par Laure.', 'lmdl-journal-empty' )
		. '<!-- /wp:query-no-results -->'
		. '</div><!-- /wp:query -->';
}

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern' ) ) { return; }
	$jardin = lmdl_v1_section( 'lmdl-jardin-hero', lmdl_v1_group( 'lmdl-jardin-hero__layout',
		lmdl_v1_group( 'lmdl-jardin-hero__copy', lmdl_v1_heading( 'Le Jardin du Moulin', 1 )
			. lmdl_v1_p( 'Un espace pour les rencontres et les regards qui peuvent se compléter autour du vivant.', 'lmdl-editorial-lead' ) )
		. lmdl_v1_image( 'logo/embleme-transparent.png', '', 'lmdl-jardin-hero__emblem' ) ) );
	$jardin .= lmdl_v1_section( 'lmdl-jardin-manifesto', lmdl_v1_group( 'lmdl-jardin-manifesto__inner', lmdl_v1_heading( 'Des chemins qui se croisent' )
		. lmdl_v1_p( 'Pour Laure, des approches différentes peuvent se rencontrer, se compléter et ouvrir de nouveaux chemins.', 'lmdl-editorial-statement' ) ) );
	$jardin .= lmdl_v1_section( 'lmdl-jardin-intention lmdl-surface--paper', lmdl_v1_group( 'lmdl-editorial-columns', lmdl_v1_heading( 'Un jardin de rencontres choisies' )
		. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Le Jardin est destiné à présenter des professionnels rencontrés sur le chemin de Laure, avec leur accord. Il occupe une place à part des quatre accompagnements du Moulin.' )
		. lmdl_v1_p( 'Chaque personne y aura sa propre présentation et un moyen de découvrir son activité lorsque ses informations auront été confirmées.' ) ) )
		. lmdl_v1_p( 'Éditeur : ne publier que des profils réels avec accord explicite, nom, activité, description et coordonnées approuvés. Ajouter les groupes Humains/Animaux uniquement si chacun contient au moins un profil autorisé. Insérer le pattern « Profil du Jardin » puis retirer sa classe de masquage après validation.', 'lmdl-pattern-placeholder' ) );
	$jardin .= lmdl_v1_section( 'lmdl-jardin-close', lmdl_v1_heading( 'Continuer la visite' )
		. lmdl_v1_p( 'Les accompagnements de Laure et le Jardin ont chacun leur place dans le Moulin.' )
		. lmdl_v1_group( 'lmdl-cta-group', lmdl_v1_link( 'Les accompagnements', '/accompagnements/', 'lmdl-text-link' ) . lmdl_v1_link( 'Contacter Laure', '/contact/', 'lmdl-text-link' ) ) );
	register_block_pattern( 'lmdl/le-jardin-v1', array( 'title' => 'LMdL — Le Jardin du Moulin V1', 'description' => 'Page Jardin sans faux profil, avec notes éditeur pour les futures rencontres.', 'categories' => array( 'lmdl' ), 'content' => $jardin ) );

	$profile = lmdl_v1_group( 'lmdl-profile lmdl-pattern-placeholder', lmdl_v1_group( 'lmdl-profile__media', lmdl_v1_p( 'Portrait ou logo réel, facultatif.' ) )
		. lmdl_v1_group( 'lmdl-profile__copy', lmdl_v1_heading( 'Nom réel à renseigner', 3 ) . lmdl_v1_p( 'Activité approuvée à renseigner.' )
		. lmdl_v1_p( 'Une phrase descriptive validée par la personne.' ) . lmdl_v1_p( 'Lien ou contact approuvé à ajouter ici.' ) ) );
	register_block_pattern( 'lmdl/jardin-profile-entry', array( 'title' => 'LMdL — Profil du Jardin (brouillon)', 'description' => 'Modèle masqué en public jusqu’à l’accord de la personne et la suppression de la classe lmdl-pattern-placeholder.', 'categories' => array( 'lmdl' ), 'content' => $profile ) );

	$about = lmdl_v1_section( 'lmdl-about-hero', lmdl_v1_group( 'lmdl-about-hero__layout',
		lmdl_v1_group( 'lmdl-about-hero__copy', lmdl_v1_heading( 'À propos de Laure', 1 )
			. lmdl_v1_p( 'Un chemin né du lien avec les animaux, devenu une façon d’accompagner la rencontre entre les êtres.', 'lmdl-editorial-lead' )
			. lmdl_v1_link( 'Découvrir les accompagnements', '/accompagnements/', 'lmdl-button' ) )
		. lmdl_v1_group( 'lmdl-about-hero__art', lmdl_v1_image( 'logo/embleme-transparent.png', '', 'lmdl-about-hero__emblem' )
			. lmdl_v1_p( 'Éditeur : remplacer cette composition par un portrait professionnel réel de Laure, avec son accord et un alt adapté.', 'lmdl-pattern-placeholder' ) ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-story', lmdl_v1_group( 'lmdl-editorial-columns', lmdl_v1_heading( 'Pourquoi ce chemin ?' )
		. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Laure croit depuis longtemps qu’il existe d’autres façons de communiquer avec les animaux, au-delà des mots, des regards et des gestes.' )
		. lmdl_v1_p( 'Elle a d’abord exploré cette relation avec ses propres compagnons, puis avec les animaux de proches et d’amis. Son chemin s’est ensuite ouvert au-delà de son entourage.' )
		. lmdl_v1_p( 'Cette démarche est portée par le désir de mieux comprendre les animaux et le lien qui les unit aux personnes qui les accompagnent.' ) ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-training lmdl-surface--paper', lmdl_v1_group( 'lmdl-editorial-columns', lmdl_v1_heading( 'De l’intuition à la formation' )
		. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Laure a suivi une formation en communication animale. Elle inscrit ce parcours dans une approche faite d’écoute, de respect et d’humilité.' )
		. lmdl_v1_p( 'Éditeur : vérifier avec Laure le diplôme, le nom officiel de l’école, la durée qu’elle souhaite publier et le libellé exact. Ne jamais écrire « certifiée par Laila Del Monte » sans preuve et validation.', 'lmdl-pattern-placeholder' ) ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-posture', lmdl_v1_group( 'lmdl-editorial-columns', lmdl_v1_heading( 'Sa façon d’accompagner' )
		. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Laure considère l’animal comme un être à part entière, avec sa sensibilité, son histoire et ses besoins.' )
		. lmdl_v1_p( 'Le respect de l’animal et de la personne, l’écoute sans jugement, l’honnêteté et la confidentialité donnent le ton aux échanges.' ) ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-signature', lmdl_v1_group( 'lmdl-about-signature__layout', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Au cœur du lien' )
		. lmdl_v1_p( 'Au cœur du lien, au-delà des sens.', 'lmdl-editorial-statement' )
		. lmdl_v1_p( 'Pour Laure, la communication animale est une manière d’explorer la relation, bien au-delà de la seule recherche de réponses.' ) )
		. lmdl_v1_image( 'art/painting-squirrel-display.webp', '', 'lmdl-about-signature__art' ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-boundary', lmdl_v1_group( 'lmdl-boundary', lmdl_v1_heading( 'Un cadre responsable' )
		. lmdl_v1_p( 'Laure n’est ni vétérinaire ni médecin et ne pose pas de diagnostic. Lorsqu’une situation le demande, les professionnels compétents restent essentiels.' ) ) );
	$about .= lmdl_v1_section( 'lmdl-about-paths lmdl-surface--paper', lmdl_v1_heading( 'Quatre chemins à découvrir' ) . lmdl_editorial_paths() . lmdl_v1_link( 'Tous les accompagnements', '/accompagnements/', 'lmdl-text-link' ) );
	$about .= lmdl_v1_section( 'lmdl-about-close', lmdl_v1_group( 'lmdl-editorial-columns', lmdl_v1_heading( 'Une question pour Laure ?' )
		. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Vous pouvez lui écrire avant de choisir un accompagnement.' ) . lmdl_v1_link( 'Contacter Laure', '/contact/', 'lmdl-button' ) ) ) );
	register_block_pattern( 'lmdl/a-propos-v1', array( 'title' => 'LMdL — À propos V1', 'description' => 'Parcours de Laure, source-safe et éditable, sans portrait ou diplôme inventé.', 'categories' => array( 'lmdl' ), 'content' => $about ) );

	$journal = lmdl_v1_section( 'lmdl-journal-hero', lmdl_v1_group( 'lmdl-journal-hero__layout', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Journal', 1 )
		. lmdl_v1_p( 'Des pages pour explorer le lien avec les animaux, les accompagnements et les questions qui traversent Le Moulin.', 'lmdl-editorial-lead' ) )
		. lmdl_v1_image( 'logo/embleme-transparent.png', '', 'lmdl-journal-hero__emblem' ) ) );
	$journal .= lmdl_v1_section( 'lmdl-journal-articles', lmdl_v1_heading( 'À lire dans le Journal' ) . lmdl_journal_query_markup() );
	$journal .= lmdl_v1_section( 'lmdl-journal-close', lmdl_v1_p( 'Le Journal accompagne la découverte des quatre univers du Moulin.' )
		. lmdl_v1_link( 'Explorer les accompagnements', '/accompagnements/', 'lmdl-text-link' ) );
	register_block_pattern( 'lmdl/journal-v1', array( 'title' => 'LMdL — Journal V1', 'description' => 'Index éditorial avec Query Loop WordPress et état vide.', 'categories' => array( 'lmdl' ), 'content' => $journal ) );
}, 22 );
