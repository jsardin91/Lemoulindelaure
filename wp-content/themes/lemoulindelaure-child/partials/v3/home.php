<?php defined( 'ABSPATH' ) || exit; ?>
<main id="contenu" class="v3-main v3-home">
  <section class="v3-home-hero" aria-labelledby="v3-home-title">
    <div class="v3-home-hero__copy">
      <p class="v3-folio">Le Moulin de Laure <span>·</span> Un chemin de cœur et quatre ailes</p>
      <h1 id="v3-home-title">Au cœur<br><em>du lien.</em></h1>
      <p class="v3-home-hero__motto">Au-delà des sens.</p>
      <p class="v3-home-hero__lead">Quatre univers pour explorer les liens avec les animaux, les êtres chers et soi-même.</p>
      <a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Découvrir les accompagnements <span aria-hidden="true">↗</span></a>
    </div>
    <div class="v3-home-hero__art" aria-hidden="true">
      <?php echo lmdl_v3_image( 'art/painting-phoenix-display.webp', '', 'v3-home-hero__phoenix', true, true ); ?>
      <?php echo lmdl_v3_image( 'art/painting-butterfly-display.webp', '', 'v3-home-hero__butterfly', true ); ?>
    </div>
    <p class="v3-home-hero__caption">Le chemin commence ici <span aria-hidden="true">↓</span></p>
  </section>

  <section class="v3-manifesto" aria-labelledby="v3-manifesto-title">
    <p class="v3-folio">Pourquoi Le Moulin ?</p>
    <h2 id="v3-manifesto-title">Le vivant a mille façons de nous <em>relier.</em></h2>
    <p>Un chemin de cœur et quatre ailes : le vivant, l’énergie, la famille et les messages que l’on cherche à comprendre.</p>
    <?php echo lmdl_v3_image( 'logo/devise-transparent.png', '', 'v3-manifesto__devise' ); ?>
  </section>

  <section class="v3-passage" aria-labelledby="v3-passage-title" data-v3-reveal>
    <div class="v3-passage__copy"><p class="v3-folio">Le passage commun</p><h2 id="v3-passage-title">Il y a toujours<br>un seuil à franchir.</h2><p>Au cœur du Moulin, quatre univers se déploient autour du même lien.</p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Explorer les quatre portes <span aria-hidden="true">↗</span></a></div>
    <figure class="v3-passage__art"><?php echo lmdl_v3_image( 'doors/door-passage.webp', 'Porte ouverte sur un chemin', '', false ); ?><figcaption>Le Passage</figcaption></figure>
    <span class="v3-passage__side" aria-hidden="true">Au cœur du lien</span>
  </section>

  <section class="v3-gateways" aria-labelledby="v3-gateways-title">
    <header class="v3-gateways__intro"><p class="v3-folio">Quatre ailes · quatre mondes</p><h2 id="v3-gateways-title">Choisir une porte.<br><em>Entrer dans un univers.</em></h2><p>Chaque seuil mène à un accompagnement distinct. Les noms et les chemins restent visibles avant même d’ouvrir la porte.</p></header>
    <?php foreach ( $services as $key => $service ) { echo lmdl_v3_portal_article( $key, $service, 'home' ); } // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
  </section>

  <section class="v3-home-laure" aria-labelledby="v3-laure-title">
    <div class="v3-home-laure__mark"><?php echo lmdl_v3_image( 'logo/embleme-transparent.png', '', '' ); ?></div>
    <div class="v3-home-laure__copy"><p class="v3-folio">Mon chemin</p><h2 id="v3-laure-title">Laure,<br><em>et le lien.</em></h2><p><?php echo esc_html( $data['about']['lead'] ); ?></p><p><?php echo esc_html( $data['about']['practice'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">Découvrir mon parcours <span aria-hidden="true">↗</span></a></div>
    <span class="v3-home-laure__margin">Respect · écoute · confidentialité</span>
  </section>

  <section class="v3-home-garden" aria-labelledby="v3-garden-title"><div class="v3-home-garden__art"><?php echo lmdl_v3_image( 'art/painting-butterfly-display.webp', 'Papillon dans l’univers Air', '' ); ?></div><div><p class="v3-folio">Une parenthèse</p><h2 id="v3-garden-title">Le Jardin<br><em>du Moulin.</em></h2><p><?php echo esc_html( $data['garden']['lead'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Découvrir le Jardin <span aria-hidden="true">↗</span></a></div></section>

  <section class="v3-home-journal" aria-labelledby="v3-journal-title"><p class="v3-folio">Pages à venir</p><div><h2 id="v3-journal-title">Le <em>Journal.</em></h2><p><?php echo esc_html( $data['journal']['lead'] ); ?></p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Ouvrir le Journal <span aria-hidden="true">↗</span></a></div><figure><?php echo lmdl_v3_image( 'art/painting-turtle-display.webp', 'Tortue dans l’univers Eau', '' ); ?><figcaption>Une page · mille regards</figcaption></figure></section>
  <?php echo lmdl_v3_close(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
</main>
