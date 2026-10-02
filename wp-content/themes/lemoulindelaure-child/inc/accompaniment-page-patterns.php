<?php
/** Four editable, source-grounded accompaniment pages. */
defined( 'ABSPATH' ) || exit;

function lmdl_detail_note( $text ) {
	return lmdl_v1_p( $text, 'lmdl-pattern-placeholder' );
}

function lmdl_detail_related( $current, $services ) {
	$links = '';
	foreach ( $services as $key => $service ) {
		if ( $key === $current ) { continue; }
		$links .= lmdl_v1_group( 'lmdl-detail-related__item',
			lmdl_v1_p( $service['identity'], 'lmdl-detail-related__identity' )
			. lmdl_v1_link( $service['title'], $service['path'], 'lmdl-detail-related__link' )
		);
	}
	return lmdl_v1_section( 'lmdl-detail-related', lmdl_v1_heading( 'Explorer les autres accompagnements' )
		. lmdl_v1_group( 'lmdl-detail-related__grid', $links )
		. lmdl_v1_link( 'Voir les quatre univers', '/accompagnements/', 'lmdl-text-link' ) );
}

add_action( 'init', function () {
	if ( ! function_exists( 'register_block_pattern' ) ) { return; }
	$services = array(
		'earth' => array( 'title' => 'Communication animale', 'identity' => 'Écureuil · Terre · Vivant', 'path' => '/accompagnements/communication-animale/', 'art' => 'art/painting-squirrel-display.webp' ),
		'fire' => array( 'title' => 'Accompagnement énergétique animalier', 'identity' => 'Phénix · Feu · Énergie', 'path' => '/accompagnements/accompagnement-energetique-animalier/', 'art' => 'art/painting-phoenix-display.webp' ),
		'water' => array( 'title' => 'Connexion avec les défunts', 'identity' => 'Tortue · Eau · Famille', 'path' => '/accompagnements/connexion-defunts/', 'art' => 'art/painting-turtle-display.webp' ),
		'air' => array( 'title' => 'Guidance pour soi', 'identity' => 'Papillon · Air · Messager', 'path' => '/accompagnements/guidance-pour-soi/', 'art' => 'art/painting-butterfly-display.webp' ),
	);
	foreach ( $services as $key => $service ) {
		$copy = lmdl_v1_link( 'Tous les accompagnements', '/accompagnements/', 'lmdl-detail-back' )
			. lmdl_v1_p( $service['identity'], 'lmdl-accompaniment-hero__identity' )
			. lmdl_v1_heading( $service['title'], 1 );
		$lead = array(
			'earth' => 'Une autre façon d’explorer le lien avec votre animal et de mieux le comprendre.',
			'fire' => 'Dans l’approche de Laure, prendre soin du vivant peut aussi passer par une dimension énergétique.',
			'water' => 'Un espace d’écoute autour des liens qui comptent, même après une absence.',
			'air' => 'Un autre éclairage pour aborder une situation ou votre parcours de vie.',
		);
		$copy .= lmdl_v1_p( $lead[ $key ], 'lmdl-accompaniment-hero__lead' )
			. lmdl_v1_group( 'lmdl-cta-group', lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-button' ) . lmdl_v1_link( 'Poser une question', '/contact/', 'lmdl-text-link' ) );
		$hero = lmdl_v1_section( 'lmdl-detail-intro lmdl-detail-intro--' . $key,
			lmdl_v1_group( 'lmdl-accompaniment-hero lmdl-accompaniment-hero--' . $key,
				lmdl_v1_group( 'lmdl-accompaniment-hero__copy', $copy )
				. lmdl_v1_group( 'lmdl-accompaniment-hero__art', lmdl_v1_image( $service['art'], '', 'lmdl-detail-hero__image' ) )
			)
		);
		$body = '';
		switch ( $key ) {
			case 'earth':
				$body .= lmdl_v1_section( 'lmdl-detail-story lmdl-detail-story--earth', lmdl_v1_group( 'lmdl-detail-story__layout',
					lmdl_v1_heading( 'Un autre chemin pour se comprendre' )
					. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'La communication animale propose une autre manière d’aborder ce qui se joue dans la relation avec votre compagnon. Laure place l’animal, son histoire et ses besoins au centre de son approche.' )
					. lmdl_v1_p( 'L’intention est d’ouvrir un espace de compréhension, avec respect pour l’animal comme pour la personne qui l’accompagne.' ) ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-audience lmdl-surface--paper', lmdl_v1_heading( 'À qui s’adresse cet accompagnement ?' )
					. lmdl_v1_group( 'lmdl-detail-audience__rows', lmdl_v1_group( 'lmdl-detail-audience__row', lmdl_v1_heading( 'À celles et ceux qui vivent avec un animal', 3 ) . lmdl_v1_p( 'Chien, chat, oiseau, cheval ou autre compagnon de vie.' ) )
					. lmdl_v1_group( 'lmdl-detail-audience__row', lmdl_v1_heading( 'Aux professionnels en lien avec les animaux', 3 ) . lmdl_v1_p( 'Notamment les éleveurs et les personnes qui en prennent soin.' ) ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-situations', lmdl_v1_heading( 'Dans quelles situations ?' )
					. lmdl_v1_group( 'lmdl-situations-list', lmdl_v1_p( 'Chercher un autre regard sur une situation.', 'lmdl-situations-list__item' ) . lmdl_v1_p( 'Mieux comprendre la relation avec son animal.', 'lmdl-situations-list__item' ) . lmdl_v1_p( 'Cultiver un lien plus proche au quotidien.', 'lmdl-situations-list__item' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-posture lmdl-detail-posture--earth', lmdl_v1_group( 'lmdl-detail-posture__layout', lmdl_v1_heading( 'L’animal au centre' ) . lmdl_v1_p( 'Dans l’approche de Laure, chaque animal est un être à part entière, avec sa sensibilité, son histoire et ses besoins. L’écoute se fait sans jugement et dans le respect de chacun.' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-practical lmdl-surface--paper', lmdl_v1_heading( 'En pratique' )
					. lmdl_v1_group( 'lmdl-practical-grid', lmdl_v1_group( 'lmdl-practical-grid__item', lmdl_v1_heading( 'Modalités', 3 ) . lmdl_v1_p( 'Sur rendez-vous, à distance ou en présentiel.' ) )
					. lmdl_v1_group( 'lmdl-practical-grid__item', lmdl_v1_heading( 'Temps et disponibilités', 3 ) . lmdl_v1_p( 'La communication peut s’étendre sur environ trois jours. Les rendez-vous sont envisagés principalement le soir et le samedi.' ) ) )
					. lmdl_detail_note( 'À confirmer avec Laure : déroulé exact, restitution, durée du rendez-vous, tarif, préparation et libellé précis de la formation.' ) );
				$body .= lmdl_v1_section( 'lmdl-detail-boundary', lmdl_v1_group( 'lmdl-boundary', lmdl_v1_heading( 'Un cadre clair' ) . lmdl_v1_p( 'Laure n’est ni vétérinaire ni médecin et ne pose pas de diagnostic. Lorsqu’une situation le demande, les professionnels compétents restent essentiels.' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-questions', lmdl_v1_heading( 'Une question avant de réserver ?' ) . lmdl_v1_p( 'Vous pouvez écrire à Laure pour demander une précision sur cet accompagnement.' ) . lmdl_v1_link( 'Me contacter', '/contact/', 'lmdl-text-link' ) . lmdl_detail_note( 'FAQ : les questions du brief existent, mais leurs réponses doivent être rédigées et validées par Laure avant publication.' ) );
				break;
			case 'fire':
				$body .= lmdl_v1_section( 'lmdl-detail-story lmdl-detail-story--fire', lmdl_v1_group( 'lmdl-detail-story__layout', lmdl_v1_heading( 'Une approche énergétique du vivant' )
					. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Cet accompagnement fait partie des quatre univers du Moulin. Laure l’inscrit dans sa manière de prendre soin du vivant, avec bienveillance et respect.' ) ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-posture lmdl-detail-posture--fire', lmdl_v1_group( 'lmdl-detail-posture__layout', lmdl_v1_heading( 'Une attention respectueuse' )
					. lmdl_v1_p( 'Bienveillance, écoute, honnêteté et absence de jugement accompagnent les échanges avec Laure.' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-practical lmdl-surface--paper', lmdl_v1_heading( 'En pratique' ) . lmdl_v1_p( 'Les accompagnements se font sur rendez-vous, principalement le soir et le samedi.' )
					. lmdl_detail_note( 'À confirmer avec Laure : description exacte, public et situations, déroulé, modalités à distance ou en présentiel, durée, tarif et FAQ.' ) );
				$body .= lmdl_v1_section( 'lmdl-detail-boundary', lmdl_v1_group( 'lmdl-boundary', lmdl_v1_heading( 'Un cadre clair' ) . lmdl_v1_p( 'Laure ne pose pas de diagnostic médical ou vétérinaire. Les professionnels compétents restent essentiels lorsque la situation le demande.' ) ) );
				break;
			case 'water':
				$body .= lmdl_v1_section( 'lmdl-detail-statement lmdl-detail-statement--water', lmdl_v1_group( 'lmdl-detail-statement__inner', lmdl_v1_heading( 'Le lien au-delà de l’absence' )
					. lmdl_v1_p( 'Dans l’approche de Laure, certains liens peuvent continuer à compter quand la présence physique a disparu.', 'lmdl-detail-statement__quote' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-story lmdl-detail-story--water', lmdl_v1_group( 'lmdl-detail-story__layout', lmdl_v1_heading( 'Pour qui ?' )
					. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Cet accompagnement s’adresse aux adultes qui souhaitent explorer la possibilité d’un message en lien avec une personne décédée.' )
					. lmdl_v1_p( 'Le sujet peut être sensible. L’échange s’inscrit dans un cadre de respect, d’écoute et de confidentialité, sans promesse de message.' ) ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-posture lmdl-detail-posture--water', lmdl_v1_group( 'lmdl-detail-posture__layout', lmdl_v1_heading( 'Écoute et confidentialité' )
					. lmdl_v1_p( 'Laure souhaite accueillir ces échanges avec bienveillance, honnêteté et sans jugement.' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-practical lmdl-surface--paper', lmdl_v1_heading( 'En pratique' )
					. lmdl_v1_group( 'lmdl-practical-grid', lmdl_v1_group( 'lmdl-practical-grid__item', lmdl_v1_heading( 'Formats', 3 ) . lmdl_v1_p( 'Des échanges en individuel ou en groupe sont envisagés. Leurs modalités restent à préciser.' ) )
					. lmdl_v1_group( 'lmdl-practical-grid__item', lmdl_v1_heading( 'Rendez-vous', 3 ) . lmdl_v1_p( 'Les créneaux sont envisagés principalement le soir et le samedi.' ) ) )
					. lmdl_detail_note( 'À confirmer avec Laure : déroulé, formats individuel et groupe, distance ou présentiel, durée, tarif, préparation, limites et FAQ.' ) );
				break;
			case 'air':
				$body .= lmdl_v1_section( 'lmdl-detail-statement lmdl-detail-statement--air', lmdl_v1_group( 'lmdl-detail-statement__inner', lmdl_v1_heading( 'Un autre éclairage' )
					. lmdl_v1_p( 'Dans l’approche de Laure, ce qui se ressent peut parfois ouvrir une autre façon de comprendre une situation ou un parcours de vie.', 'lmdl-detail-statement__quote' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-story lmdl-detail-story--air', lmdl_v1_group( 'lmdl-detail-story__layout', lmdl_v1_heading( 'Une place pour la perspective' )
					. lmdl_v1_group( 'lmdl-prose', lmdl_v1_p( 'Cette guidance propose d’explorer un autre regard sur ce que vous traversez. Elle ne promet ni prédiction ni certitude sur l’avenir.' ) ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-posture lmdl-detail-posture--air', lmdl_v1_group( 'lmdl-detail-posture__layout', lmdl_v1_heading( 'Écoute, respect, liberté' )
					. lmdl_v1_p( 'Bienveillance, humilité, honnêteté et confidentialité font partie du cadre commun aux accompagnements du Moulin.' ) ) );
				$body .= lmdl_v1_section( 'lmdl-detail-practical lmdl-surface--paper', lmdl_v1_heading( 'En pratique' ) . lmdl_v1_p( 'Les rendez-vous sont envisagés principalement le soir et le samedi.' )
					. lmdl_detail_note( 'À confirmer avec Laure : définition précise, situations, déroulé, modalités à distance ou en présentiel, durée, tarif, limites et FAQ.' ) );
				break;
		}
		$close = lmdl_v1_section( 'lmdl-detail-close lmdl-detail-close--' . $key,
			lmdl_v1_group( 'lmdl-detail-close__layout', lmdl_v1_group( 'lmdl-prose', lmdl_v1_heading( 'Poursuivre le chemin' )
				. lmdl_v1_p( 'Vous pouvez prendre rendez-vous ou poser une question à Laure avant de choisir.' ) )
				. lmdl_v1_group( 'lmdl-cta-group', lmdl_v1_link( 'Prendre rendez-vous', '/prendre-rendez-vous/', 'lmdl-button' ) . lmdl_v1_link( 'Me contacter', '/contact/', 'lmdl-text-link' ) ) ) );
		register_block_pattern( 'lmdl/' . $key . '-accompaniment-v1', array(
			'title' => 'LMdL — ' . $service['title'] . ' V1',
			'description' => 'Page accompagnement éditable, avec notes de contenu visibles uniquement dans l’éditeur.',
			'categories' => array( 'lmdl' ),
			'content' => $hero . $body . $close . lmdl_detail_related( $key, $services ),
		) );
	}
}, 21 );
