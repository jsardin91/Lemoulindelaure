<?php defined( 'ABSPATH' ) || exit; $services = lmdl_v3_content()['services']; ?>
<!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class( 'lmdl-v3' ); ?>><?php wp_body_open(); ?>
<a class="v3-skip" href="#contenu">Aller au contenu</a>
<header class="v3-header">
  <a class="v3-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Le Moulin de Laure, accueil"><img src="<?php echo esc_url( lmdl_v3_asset( 'logo/logo-horizontal-transparent.png' ) ); ?>" width="1200" height="380" alt="Le Moulin de Laure"></a>
  <nav class="v3-header__nav" aria-label="Navigation principale">
    <div class="v3-header__group"><a href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Accompagnements</a><ul class="v3-header__submenu" aria-label="Les quatre accompagnements"><?php foreach ( $services as $service ) : ?><li><a href="<?php echo esc_url( home_url( $service['path'] ) ); ?>"><span><?php echo esc_html( $service['element'] ); ?></span><?php echo esc_html( $service['title'] ); ?></a></li><?php endforeach; ?></ul></div>
    <a href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Le Jardin</a><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">À propos</a><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Journal</a><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
  </nav>
  <a class="v3-header__booking" href="<?php echo esc_url( home_url( '/prendre-rendez-vous/' ) ); ?>">Prendre rendez-vous <span aria-hidden="true">↗</span></a>
  <details class="v3-header__menu"><summary>Menu <span aria-hidden="true">＋</span></summary><nav aria-label="Navigation mobile"><a href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Accompagnements</a><?php foreach ( $services as $service ) : ?><a class="v3-header__mobile-service" href="<?php echo esc_url( home_url( $service['path'] ) ); ?>"><?php echo esc_html( $service['element'] . ' · ' . $service['title'] ); ?></a><?php endforeach; ?><a href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Le Jardin</a><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">À propos</a><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Journal</a><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a><a href="<?php echo esc_url( home_url( '/prendre-rendez-vous/' ) ); ?>">Prendre rendez-vous</a></nav></details>
</header>
