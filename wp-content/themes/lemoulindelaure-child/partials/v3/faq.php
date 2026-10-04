<?php defined( 'ABSPATH' ) || exit; ?>
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
    <?php
    $editor_faq = lmdl_v3_faq_editor_content();
    if ( $editor_faq ) {
      echo '<div class="v3-faq__list v3-faq__list--editor">' . $editor_faq . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Filtered WordPress content or shortcode output.
    } else {
      echo lmdl_v3_faq_list( array(), true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper.
    }
    ?>
  </section>
  <section class="v3-faq__close">
    <p class="v3-folio">Une autre question ?</p>
    <h2>Écrivez-moi.</h2>
    <a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Me contacter <span aria-hidden="true">↗</span></a>
  </section>
</main>
