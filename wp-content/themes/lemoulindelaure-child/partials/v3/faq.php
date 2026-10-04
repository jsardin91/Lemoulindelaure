<?php
/** Provisional answers for visual review; Laure must approve the final wording. */
defined( 'ABSPATH' ) || exit;

$questions = array(
	array(
		'question' => 'Pourquoi la communication animale ?',
		'answer'   => 'Elle propose une autre manière de porter attention à votre animal et au lien qui vous unit. Elle peut ouvrir une piste de compréhension, sans remplacer ce que vous observez chaque jour auprès de lui.',
		'link'     => '/accompagnements/communication-animale/',
		'label'    => 'Découvrir la communication animale',
	),
	array(
		'question' => 'Comment se passe une séance ?',
		'answer'   => 'Le déroulement dépend de l’accompagnement choisi. Avant de vous engager, je vous préciserai le format, les étapes et les informations utiles. Vous pouvez aussi me poser vos questions en amont.',
	),
	array(
		'question' => 'Est-ce en présentiel ou à distance ?',
		'answer'   => 'Pour la communication animale, les deux formats sont envisagés. Le format des autres accompagnements et les modalités concrètes seront confirmés avec vous avant tout rendez-vous.',
	),
	array(
		'question' => 'Est-ce que l’animal ressent quelque chose ?',
		'answer'   => 'Je ne peux pas prévoir ce qu’un animal ressentira ni promettre une réaction visible. Son rythme et sa sensibilité restent au centre de mon approche. Si son état ou son comportement vous inquiète, demandez l’avis d’un vétérinaire.',
	),
	array(
		'question' => 'Je ne sais pas quel accompagnement choisir. Que faire ?',
		'answer'   => 'Vous pouvez parcourir les quatre univers du Moulin pour voir celui qui correspond le mieux à votre question. Si vous hésitez encore, écrivez-moi : nous pourrons clarifier votre demande avant de choisir une suite.',
		'link'     => '/accompagnements/',
		'label'    => 'Explorer les accompagnements',
	),
	array(
		'question' => 'Ces accompagnements remplacent-ils un avis médical ou vétérinaire ?',
		'answer'   => 'Non. Je ne pose pas de diagnostic et ces accompagnements ne remplacent ni une consultation médicale ni une consultation vétérinaire. Pour toute question de santé, adressez-vous au professionnel compétent.',
	),
	array(
		'question' => 'Peut-on être certain de recevoir un message d’un défunt ?',
		'answer'   => 'Non. Je ne peux pas garantir qu’un message sera reçu. Ce sujet demande de la délicatesse : votre vécu et vos limites doivent pouvoir être respectés, sans pression ni promesse.',
		'link'     => '/accompagnements/connexion-defunts/',
		'label'    => 'Lire la page Connexion avec les défunts',
	),
	array(
		'question' => 'La guidance pour soi prédit-elle l’avenir ?',
		'answer'   => 'Non. La guidance pour soi invite à explorer un autre regard sur une situation. Elle ne donne ni prédiction ni certitude sur l’avenir ; vos choix vous appartiennent.',
		'link'     => '/accompagnements/guidance-pour-soi/',
		'label'    => 'Lire la page Guidance pour soi',
	),
);
?>
<main id="contenu" class="v3-main v3-functional v3-faq">
  <section class="v3-functional__intro">
    <p class="v3-folio">Le Moulin · quelques repères</p>
    <h1>Vos <em>questions.</em></h1>
    <p>Quelques réponses pour avancer à votre rythme et mieux comprendre le cadre des accompagnements.</p>
  </section>
  <section class="v3-faq__content" aria-labelledby="v3-faq-title">
    <div class="v3-faq__heading">
      <p class="v3-folio">À lire tranquillement</p>
      <h2 id="v3-faq-title">Faire<br><em>le point.</em></h2>
      <p>Chaque situation est différente. Ces réponses donnent des repères ; vous pouvez m’écrire si votre question n’y figure pas.</p>
    </div>
    <div class="v3-faq__list">
      <?php foreach ( $questions as $index => $item ) : ?>
        <details class="v3-faq__item"<?php echo 0 === $index ? ' open' : ''; ?>>
          <summary><?php echo esc_html( $item['question'] ); ?></summary>
          <div class="v3-faq__answer">
            <p><?php echo esc_html( $item['answer'] ); ?></p>
            <?php if ( isset( $item['link'] ) ) : ?>
              <a href="<?php echo esc_url( home_url( $item['link'] ) ); ?>"><?php echo esc_html( $item['label'] ); ?> <span aria-hidden="true">↗</span></a>
            <?php endif; ?>
          </div>
        </details>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="v3-faq__close">
    <p class="v3-folio">Une autre question ?</p>
    <h2>Écrivez-moi.</h2>
    <a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Me contacter <span aria-hidden="true">↗</span></a>
  </section>
</main>
