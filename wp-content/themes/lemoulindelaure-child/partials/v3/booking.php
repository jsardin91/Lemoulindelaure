<?php defined( 'ABSPATH' ) || exit; ?>
<main id="contenu" class="v3-main v3-functional v3-booking">
  <section class="v3-functional__intro"><p class="v3-folio">Le Moulin · les rendez-vous</p><h1>Prendre<br><em>rendez-vous.</em></h1><p>Vous pourrez bientôt choisir ici l’accompagnement et le créneau qui vous conviennent.</p></section>
  <section class="v3-functional__content"><div><p class="v3-folio">Prévisualisation</p><h2>Les quatre<br><em>chemins.</em></h2><p>Cette interface présente Timetics en prévisualisation. Le calendrier et les réservations ne sont pas encore ouverts. Les durées, tarifs et disponibilités définitifs restent à confirmer.</p><p>Pour une question, vous pouvez <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">m’écrire</a>.</p></div><div class="lmdl-booking-shell"><?php echo do_shortcode( '[lmdl_booking]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Plugin owns its booking markup. ?></div></section>
</main>
