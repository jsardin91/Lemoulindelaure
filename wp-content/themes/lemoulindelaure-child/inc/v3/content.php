<?php
/** Source-grounded editorial data for the V3 compositions. */
defined( 'ABSPATH' ) || exit;

function lmdl_v3_content() {
  return array(
    'services' => array(
      'earth' => array(
        'slug' => 'communication-animale', 'animal' => 'Écureuil', 'universe' => 'de l’Écureuil', 'title' => 'La communication animalière',
        'path' => '/accompagnements/communication-animale/',
        'door' => 'doors/door-forest.webp', 'painting' => 'art/painting-squirrel-display.webp',
        'preview' => 'brand-derived/v3/squirrel-portal.webp',
        'intro' => 'Mieux comprendre votre animal et le lien qui vous unit.',
        'lead' => 'La communication animalière propose une autre manière d’aborder ce qui se joue dans la relation avec votre compagnon.',
        'body' => 'Je place l’animal, son histoire et ses besoins au centre de mon approche. Je souhaite ouvrir un espace de compréhension, avec respect pour l’animal comme pour la personne qui l’accompagne.',
        'note' => 'L’animal est considéré comme un être à part entière, avec sa sensibilité, son histoire et ses besoins.',
        'practical' => 'Sur rendez-vous, uniquement à distance. Les rendez-vous sont envisagés principalement le soir et le samedi.',
      ),
      'fire' => array(
        'slug' => 'accompagnement-energetique-animalier', 'animal' => 'Phénix', 'universe' => 'du Phénix', 'title' => 'L’accompagnement énergétique',
        'path' => '/accompagnements/accompagnement-energetique-animalier/',
        'door' => 'doors/door-phoenix.webp', 'painting' => 'art/painting-phoenix-display.webp',
        'preview' => 'brand-derived/v3/phoenix-portal.webp',
        'intro' => 'Explorer une approche énergétique pour votre animal.',
        'lead' => 'Cet accompagnement fait partie des quatre univers du Moulin.',
        'body' => 'Je l’inscris dans ma manière de prendre soin du vivant, avec bienveillance et respect. Les modalités propres à cet accompagnement restent à préciser.',
        'note' => 'Bienveillance, écoute, honnêteté et absence de jugement accompagnent nos échanges.',
        'practical' => 'Cet accompagnement se fait sur rendez-vous, uniquement à distance. Les rendez-vous sont envisagés principalement le soir et le samedi.',
      ),
      'water' => array(
        'slug' => 'connexion-defunts', 'animal' => 'Tortue', 'universe' => 'de la Tortue', 'title' => 'La connexion avec les défunts',
        'path' => '/accompagnements/connexion-defunts/',
        'door' => 'doors/door-ocean.webp', 'painting' => 'art/painting-turtle-display.webp',
        'preview' => 'brand-derived/v3/turtle-portal.webp',
        'intro' => 'Explorer le lien lorsque la présence physique n’est plus là.',
        'lead' => 'Je crois que certains liens peuvent continuer à compter quand la présence physique a disparu.',
        'body' => 'Cet accompagnement s’adresse aux adultes qui souhaitent explorer la possibilité d’un message en lien avec une personne décédée. Le sujet peut être sensible : l’échange s’inscrit dans un cadre de respect, d’écoute et de confidentialité.',
        'note' => 'Le lien au-delà de l’absence.',
        'practical' => 'Le déroulement est précisé avec vous lors d’un échange préalable.',
      ),
      'air' => array(
        'slug' => 'guidance-pour-soi', 'animal' => 'Papillon', 'universe' => 'du Papillon', 'title' => 'Une guidance pour soi',
        'path' => '/accompagnements/guidance-pour-soi/',
        'door' => 'brand-derived/v3/door-butterfly-cutout.webp', 'painting' => 'art/painting-butterfly-display.webp',
        'preview' => 'brand-derived/v3/butterfly-portal.webp',
        'intro' => 'Chercher un autre éclairage pour soi.',
        'lead' => 'Ce qui se ressent peut parfois ouvrir une autre façon de comprendre une situation ou un parcours de vie.',
        'body' => 'Cette guidance propose d’explorer un autre regard sur ce que vous traversez. Elle ne promet ni prédiction ni certitude sur l’avenir.',
        'note' => 'Un autre éclairage, sans certitude imposée.',
        'practical' => 'Les modalités de cet accompagnement restent à préciser.',
      ),
    ),
    'about' => array(
      'lead' => 'Un chemin né du lien avec les animaux, devenu une façon d’accompagner la rencontre entre les êtres.',
      'story' => array(
        'Je crois depuis longtemps qu’il existe d’autres façons de communiquer avec les animaux, au-delà des mots, des regards et des gestes.',
        'J’ai d’abord exploré cette relation avec mes propres compagnons, puis avec les animaux de proches et d’amis. Mon chemin s’est ensuite ouvert au-delà de mon entourage.',
      ),
      'practice' => 'Le respect de l’animal et de la personne, l’écoute sans jugement, l’honnêteté et la confidentialité donnent le ton aux échanges.',
      'training' => 'Je suis communicatrice animalière professionnelle. Mon diplôme, délivré le 20 juin 2025 par l’École de formation en Communication Animale, atteste que j’ai complété tous les modules de la formation en communication animale enseignée par Laila del Monte. Ce parcours concerne uniquement la communication animale.',
    ),
    'garden' => array(
      'lead' => 'Un espace pour les rencontres et les regards qui peuvent se compléter autour du vivant.',
      'manifesto' => 'Je crois que des approches différentes peuvent se rencontrer, se compléter et ouvrir de nouveaux chemins.',
      'body' => 'Le Jardin est destiné à présenter des professionnels rencontrés sur mon chemin, avec leur accord. Il occupe une place à part des quatre accompagnements du Moulin.',
    ),
    'journal' => array(
      'lead' => 'Des pages pour explorer le lien avec les animaux, les accompagnements et les questions qui traversent Le Moulin.',
      'empty' => 'Je donnerai forme au Journal au fil des articles publiés.',
    ),
  );
}
