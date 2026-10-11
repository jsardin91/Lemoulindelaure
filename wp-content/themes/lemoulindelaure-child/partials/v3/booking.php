<?php
defined( 'ABSPATH' ) || exit;
$discovery_open = (bool) lmdl_discovery_booking_id();
?>
<main id="contenu" class="v3-main v3-functional v3-booking">
  <section class="v3-functional__intro">
    <p class="v3-folio">Le Moulin · les rendez-vous</p>
    <h1>Prendre<br><em>rendez-vous.</em></h1>
    <p><?php echo esc_html( $discovery_open ? 'Choisissez un créneau pour un appel découverte gratuit de 30 minutes. Je vous rappellerai au numéro indiqué lors de votre réservation.' : 'Je proposerai bientôt un appel découverte gratuit ici.' ); ?></p>
  </section>
  <section class="v3-functional__content">
    <div>
      <p class="v3-folio">Un premier échange</p>
      <h2>Faisons<br><em>connaissance.</em></h2>
      <p><?php echo esc_html( $discovery_open ? 'Lors de cet appel, je prendrai le temps de faire connaissance avec vous et de répondre à vos questions. Je propose des créneaux du lundi au vendredi, entre 18 h 30 et 21 h (heure de Paris), avec au moins 24 heures de préavis.' : 'Je vous communiquerai les créneaux dès que mes disponibilités seront confirmées.' ); ?></p>
      <p>Vous préférez écrire ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Écrivez-moi</a>.</p>
    </div>
    <div class="lmdl-booking-shell"><?php echo do_shortcode( '[lmdl_booking]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Plugin owns its booking markup. ?></div>
  </section>
</main>
