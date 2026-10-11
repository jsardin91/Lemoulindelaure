<?php defined( 'ABSPATH' ) || exit; ?>
<main id="contenu" class="v3-main v3-home">
  <section class="v3-home-hero" aria-labelledby="v3-home-title">
    <div class="v3-home-hero__copy">
      <p class="v3-folio">Un lieu pour faire connaissance</p>
      <h1 id="v3-home-title">Bienvenue<br>au Moulin de Laure.</h1>
      <p class="v3-home-hero__motto">Au cœur du lien, au-delà des sens.</p>
      <p class="v3-home-hero__lead">Quatre univers pour explorer les liens avec les animaux, les êtres chers et soi-même.</p>
      <a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Découvrir les accompagnements <span aria-hidden="true">↗</span></a>
    </div>
    <figure class="v3-home-hero__art"><?php echo lmdl_v3_image( 'photos/laure-accueil.jpg', 'Laure dans un paysage de campagne', 'v3-home-hero__photo', true, true ); ?></figure>
    <p class="v3-home-hero__caption">Le chemin commence ici <span aria-hidden="true">↓</span></p>
  </section>

  <section class="v3-home-animals" aria-label="Chats, chiens, chevaux et oiseaux"><figure><?php echo lmdl_v3_image( 'photos/chat.jpg', 'Chat tigré au repos' ); ?></figure><figure><?php echo lmdl_v3_image( 'photos/chien.jpg', 'Chien dans un chemin boisé' ); ?></figure><figure><?php echo lmdl_v3_image( 'photos/cheval.jpg', 'Cheval dans une prairie' ); ?></figure><figure><?php echo lmdl_v3_image( 'photos/oiseau.jpg', 'Rouge-gorge' ); ?></figure></section>

  <section class="v3-manifesto" aria-labelledby="v3-manifesto-title">
    <p class="v3-folio">Pourquoi Le Moulin ?</p>
    <h2 id="v3-manifesto-title">Au-delà des sens, il y a <em>le lien.</em></h2>
    <p>Quatre univers pour prendre le temps d’explorer le lien avec les animaux, les êtres chers et vous-même.</p>
    <?php echo lmdl_v3_image( 'logo/devise-transparent.png', '', 'v3-manifesto__devise' ); ?>
  </section>

  <section class="v3-passage" aria-labelledby="v3-passage-title" data-v3-reveal>
    <div class="v3-passage__copy"><p class="v3-folio">L’entrée du Moulin</p><h2 id="v3-passage-title">Il y a toujours<br>un seuil à franchir.</h2><p>Au cœur du Moulin, quatre univers se déploient autour du même lien.</p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Explorer les quatre portes <span aria-hidden="true">↗</span></a></div>
    <figure class="v3-passage__art"><?php echo lmdl_v3_image( 'doors/door-passage.webp', 'Porte ouverte sur un chemin', '', false ); ?><figcaption>L’entrée du Moulin</figcaption></figure>
    <span class="v3-passage__side" aria-hidden="true">Au cœur du lien</span>
  </section>

  <section class="v3-gateways" aria-labelledby="v3-gateways-title">
    <header class="v3-gateways__intro"><p class="v3-folio">Quatre univers</p><h2 id="v3-gateways-title">Choisir une porte.<br><em>Entrer dans un univers.</em></h2><p>Chaque porte mène à un accompagnement distinct, présenté par son nom et l’animal qui lui est associé.</p></header>
    <?php foreach ( $services as $key => $service ) { echo lmdl_v3_portal_article( $key, $service, 'home' ); } // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
  </section>

  <section class="v3-home-laure" aria-labelledby="v3-laure-title">
    <div class="v3-home-laure__mark"><?php echo lmdl_v3_image( 'logo/embleme-transparent.png', '', '' ); ?></div>
    <div class="v3-home-laure__copy"><p class="v3-folio">Mon chemin</p><h2 id="v3-laure-title">Laure,<br><em>et le lien.</em></h2><p><?php echo esc_html( $data['about']['lead'] ); ?></p><p><?php echo esc_html( $data['about']['practice'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">Découvrir mon parcours <span aria-hidden="true">↗</span></a></div>
    <span class="v3-home-laure__margin">Respect · écoute · confidentialité</span>
  </section>

  <section class="v3-home-garden" aria-labelledby="v3-garden-title"><figure class="v3-home-garden__art"><?php echo lmdl_v3_image( 'photos/cheval.jpg', 'Cheval dans une prairie', '' ); ?></figure><div><p class="v3-folio">Une parenthèse</p><h2 id="v3-garden-title">Le Jardin<br><em>du Moulin.</em></h2><p><?php echo esc_html( $data['garden']['lead'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Découvrir le Jardin <span aria-hidden="true">↗</span></a></div></section>

  <section class="v3-home-journal" aria-labelledby="v3-journal-title"><p class="v3-folio">Pages à venir</p><div><h2 id="v3-journal-title">Le <em>Journal.</em></h2><p><?php echo esc_html( $data['journal']['lead'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Ouvrir le Journal <span aria-hidden="true">↗</span></a></div><figure><?php echo lmdl_v3_image( 'photos/oiseau.jpg', 'Rouge-gorge posé sur une branche', '' ); ?></figure></section>
  <?php echo lmdl_v3_faq_preview( array( 'choose', 'how' ), 'v3-home-faq-title', 'Avant de choisir.' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
  <?php echo lmdl_v3_close(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
</main>
