<?php defined( 'ABSPATH' ) || exit; ?>
<main id="contenu" class="v3-main v3-hub">
  <section class="v3-hub-hero"><p class="v3-folio">Le Moulin de Laure · Accompagnements</p><h1>La salle des<br><em>quatre portes.</em></h1><div><p>Quatre chemins pour explorer le lien avec le vivant, les êtres chers et soi-même. Chaque porte ouvre sur un élément et un accompagnement.</p><span aria-hidden="true">↓</span></div></section>
  <div class="v3-hub-portals" aria-label="Les quatre univers du Moulin">
    <?php foreach ( $services as $key => $service ) { echo lmdl_v3_portal_article( $key, $service, 'hub' ); } // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
  </div>
  <section class="v3-hub-after"><p class="v3-folio">Un seul lien</p><h2>Quatre portes.<br><em>Une même attention.</em></h2><p>Bienveillance, respect, honnêteté et confidentialité traversent les quatre univers.</p><div class="v3-hub-after__boundary"><h3>Un cadre clair</h3><p>Je ne pose pas de diagnostic médical ou vétérinaire. Les professionnels compétents restent essentiels lorsque la situation le demande.</p></div></section>
  <?php echo lmdl_v3_close( 'Une question avant d’entrer ?' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
</main>
