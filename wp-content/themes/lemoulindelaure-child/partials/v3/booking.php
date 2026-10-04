<?php
defined( 'ABSPATH' ) || exit;
$discovery_open = (bool) lmdl_discovery_booking_id();
?>
<main id="contenu" class="v3-main v3-functional v3-booking">
  <section class="v3-functional__intro">
    <p class="v3-folio">Le Moulin · les rendez-vous</p>
    <h1>Prendre<br><em>rendez-vous.</em></h1>
    <p><?php echo esc_html( $discovery_open ? 'Choisissez un créneau pour un appel découverte gratuit avec Laure.' : 'Un appel découverte gratuit sera bientôt proposé ici.' ); ?></p>
  </section>
  <section class="v3-functional__content">
    <div>
      <p class="v3-folio">Un premier échange</p>
      <h2>Faisons<br><em>connaissance.</em></h2>
      <p><?php echo esc_html( $discovery_open ? 'Cet appel gratuit permet de faire connaissance et de poser vos questions avant de choisir la suite.' : 'Les créneaux ouvriront dès que les disponibilités seront confirmées.' ); ?></p>
      <p>Vous préférez écrire ? <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contactez Laure</a>.</p>
    </div>
    <div class="lmdl-booking-shell"><?php echo do_shortcode( '[lmdl_booking]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Plugin owns its booking markup. ?></div>
  </section>
</main>
