<?php
/** Source-grounded editorial data for the V3 compositions. */
defined( 'ABSPATH' ) || exit;

function lmdl_v3_content() {
  return array(
    'services' => array(
      'earth' => array(
        'slug' => 'communication-animale', 'element' => 'Terre', 'animal' => 'Écureuil',
        'motif' => 'Le vivant', 'title' => 'Communication animale',
        'path' => '/accompagnements/communication-animale/',
        'door' => 'doors/door-forest.webp', 'painting' => 'art/painting-squirrel-display.webp',
        'preview' => 'brand-derived/v3/squirrel-portal.webp',
        'intro' => 'Mieux comprendre votre animal et le lien qui vous unit.',
        'lead' => 'La communication animale propose une autre manière d’aborder ce qui se joue dans la relation avec votre compagnon.',
        'body' => 'Laure place l’animal, son histoire et ses besoins au centre de son approche. L’intention est d’ouvrir un espace de compréhension, avec respect pour l’animal comme pour la personne qui l’accompagne.',
        'note' => 'L’animal est considéré comme un être à part entière, avec sa sensibilité, son histoire et ses besoins.',
        'practical' => 'Sur rendez-vous, à distance ou en présentiel. Les rendez-vous sont envisagés principalement le soir et le samedi.',
      ),
      'fire' => array(
        'slug' => 'accompagnement-energetique-animalier', 'element' => 'Feu', 'animal' => 'Phénix',
        'motif' => 'L’énergie', 'title' => 'Accompagnement énergétique animalier',
        'path' => '/accompagnements/accompagnement-energetique-animalier/',
        'door' => 'doors/door-phoenix.webp', 'painting' => 'art/painting-phoenix-display.webp',
        'preview' => 'brand-derived/v3/phoenix-portal.webp',
        'intro' => 'Explorer une approche énergétique pour votre animal.',
        'lead' => 'Cet accompagnement fait partie des quatre univers du Moulin.',
        'body' => 'Laure l’inscrit dans sa manière de prendre soin du vivant, avec bienveillance et respect. Les modalités propres à cet accompagnement restent à préciser avec elle.',
        'note' => 'Bienveillance, écoute, honnêteté et absence de jugement accompagnent les échanges avec Laure.',
        'practical' => 'Les accompagnements se font sur rendez-vous, principalement le soir et le samedi.',
      ),
      'water' => array(
        'slug' => 'connexion-defunts', 'element' => 'Eau', 'animal' => 'Tortue',
        'motif' => 'La famille', 'title' => 'Connexion avec les défunts',
        'path' => '/accompagnements/connexion-defunts/',
        'door' => 'doors/door-ocean.webp', 'painting' => 'art/painting-turtle-display.webp',
        'preview' => 'brand-derived/v3/turtle-portal.webp',
        'intro' => 'Explorer le lien lorsque la présence physique n’est plus là.',
        'lead' => 'Dans l’approche de Laure, certains liens peuvent continuer à compter quand la présence physique a disparu.',
        'body' => 'Cet accompagnement s’adresse aux adultes qui souhaitent explorer la possibilité d’un message en lien avec une personne décédée. Le sujet peut être sensible : l’échange s’inscrit dans un cadre de respect, d’écoute et de confidentialité, sans promesse de message.',
        'note' => 'Le lien au-delà de l’absence.',
        'practical' => 'Des échanges en individuel ou en groupe sont envisagés. Leurs modalités restent à préciser.',
      ),
      'air' => array(
        'slug' => 'guidance-pour-soi', 'element' => 'Air', 'animal' => 'Papillon',
        'motif' => 'Le messager', 'title' => 'Guidance pour soi',
        'path' => '/accompagnements/guidance-pour-soi/',
        'door' => '', 'painting' => 'art/painting-butterfly-display.webp',
        'preview' => 'brand-derived/v3/butterfly-portal.webp',
        'intro' => 'Chercher un autre éclairage pour soi.',
        'lead' => 'Ce qui se ressent peut parfois ouvrir une autre façon de comprendre une situation ou un parcours de vie.',
        'body' => 'Cette guidance propose d’explorer un autre regard sur ce que vous traversez. Elle ne promet ni prédiction ni certitude sur l’avenir.',
        'note' => 'Un autre éclairage, sans certitude imposée.',
        'practical' => 'Les rendez-vous sont envisagés principalement le soir et le samedi.',
      ),
    ),
    'about' => array(
      'lead' => 'Un chemin né du lien avec les animaux, devenu une façon d’accompagner la rencontre entre les êtres.',
      'story' => array(
        'Laure croit depuis longtemps qu’il existe d’autres façons de communiquer avec les animaux, au-delà des mots, des regards et des gestes.',
        'Elle a d’abord exploré cette relation avec ses propres compagnons, puis avec les animaux de proches et d’amis. Son chemin s’est ensuite ouvert au-delà de son entourage.',
      ),
      'practice' => 'Le respect de l’animal et de la personne, l’écoute sans jugement, l’honnêteté et la confidentialité donnent le ton aux échanges.',
      'training' => 'Laure a suivi une formation en communication animale. Elle inscrit ce parcours dans une approche faite d’écoute, de respect et d’humilité.',
    ),
    'garden' => array(
      'lead' => 'Un espace pour les rencontres et les regards qui peuvent se compléter autour du vivant.',
      'manifesto' => 'Pour Laure, des approches différentes peuvent se rencontrer, se compléter et ouvrir de nouveaux chemins.',
      'body' => 'Le Jardin est destiné à présenter des professionnels rencontrés sur le chemin de Laure, avec leur accord. Il occupe une place à part des quatre accompagnements du Moulin.',
    ),
    'journal' => array(
      'lead' => 'Des pages pour explorer le lien avec les animaux, les accompagnements et les questions qui traversent Le Moulin.',
      'empty' => 'Le Journal prendra forme au fil des articles publiés par Laure.',
    ),
  );
}
