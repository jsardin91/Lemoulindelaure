<?php defined( 'ABSPATH' ) || exit; ?>
<main id="contenu" class="v3-main v3-functional v3-contact">
  <section class="v3-functional__intro"><p class="v3-folio">Le Moulin · garder le lien</p><h1>Me <em>contacter.</em></h1><p>Une question avant de choisir un accompagnement ? Vous pouvez m’écrire ici.</p></section>
  <section class="v3-functional__content"><div><p class="v3-folio">Votre message</p><h2>Commençons<br><em>par quelques mots.</em></h2><p>Je lirai votre message avec attention. Merci de ne pas transmettre d’information médicale ou sensible dans ce formulaire.</p></div><div class="lmdl-contact-form"><?php echo do_shortcode( '[lmdl_contact_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Plugin owns its form markup. ?></div></section>
  <?php echo lmdl_v3_close( 'Un autre chemin ?' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
</main>
