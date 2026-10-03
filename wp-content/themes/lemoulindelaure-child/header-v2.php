<?php defined( 'ABSPATH' ) || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class( 'lmdl-v2' ); ?>><?php wp_body_open(); ?>
<a class="v2-skip" href="#contenu">Aller au contenu</a>
<header class="v2-header">
  <a class="v2-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Le Moulin de Laure, accueil"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/logo/logo-horizontal-transparent.png' ); ?>" width="1200" height="380" alt="Le Moulin de Laure"></a>
  <nav aria-label="Navigation principale"><a href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Accompagnements</a><a href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Le Jardin</a><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Journal</a><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">À propos</a></nav>
  <a class="v2-header-cta" href="<?php echo esc_url( home_url( '/prendre-rendez-vous/' ) ); ?>">Prendre rendez-vous <span aria-hidden="true">↗</span></a>
  <details class="v2-mobile-menu"><summary>Menu <span aria-hidden="true">＋</span></summary><nav aria-label="Navigation mobile"><a href="<?php echo esc_url( home_url( '/accompagnements/' ) ); ?>">Accompagnements</a><a href="<?php echo esc_url( home_url( '/le-jardin/' ) ); ?>">Le Jardin</a><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Journal</a><a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">À propos</a><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a><a href="<?php echo esc_url( home_url( '/prendre-rendez-vous/' ) ); ?>">Prendre rendez-vous</a></nav></details>
</header>
