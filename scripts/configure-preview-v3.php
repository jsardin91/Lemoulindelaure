<?php
/**
 * Run with `wp eval-file` only after a verified private backup.
 * Configures the public preview without client commercial terms or email routing.
 */
defined( 'ABSPATH' ) || exit;

if ( 'lemoulindelaure-child' !== get_option( 'stylesheet' ) || '1' !== (string) get_option( 'lmdl_preview_noindex' ) ) {
  throw new RuntimeException( 'Preview theme and noindex gate required.' );
}
if ( ! class_exists( 'Forminator_Template_Contact_Form' ) || ! class_exists( 'Timetics\\Core\\Appointments\\Appointment' ) ) {
  throw new RuntimeException( 'Forminator and Timetics must be active.' );
}

// Keep the nine Astra slots aligned with theme.json and the child theme.
$palette = lmdl_astra_palette();
$palettes = get_option( 'astra-color-palettes', array() );
if ( ! is_array( $palettes ) ) { $palettes = array(); }
if ( ! isset( $palettes['palettes'] ) || ! is_array( $palettes['palettes'] ) ) { $palettes['palettes'] = array(); }
echo 'ASTRA_PREVIOUS_PALETTE=' . wp_json_encode( $palettes['palettes']['palette_1'] ?? null ) . "\n";
$palettes['palettes']['palette_1'] = $palette;
$palettes['currentPalette'] = 'palette_1';
update_option( 'astra-color-palettes', $palettes );
$settings = get_option( ASTRA_THEME_SETTINGS, array() );
if ( ! is_array( $settings ) ) { $settings = array(); }
foreach ( array( 'global-color-palette', 'body-text-color', 'headings-color', 'link-color', 'theme-color', 'site-background-color', 'content-bg-color', 'button-color', 'button-bg-color' ) as $key ) {
  echo 'ASTRA_PREVIOUS_' . $key . '=' . wp_json_encode( $settings[ $key ] ?? null ) . "\n";
}
$settings['global-color-palette'] = array( 'palette' => $palette );
$settings['body-text-color'] = '#173f54';
$settings['headings-color'] = '#173f54';
$settings['link-color'] = '#165a77';
$settings['theme-color'] = '#165a77';
$settings['site-background-color'] = '#faf7ef';
$settings['content-bg-color'] = '#fffdf8';
$settings['button-color'] = '#faf7ef';
$settings['button-bg-color'] = '#173f54';
update_option( ASTRA_THEME_SETTINGS, $settings );
echo 'ASTRA_PALETTE_SYNCHRONIZED=yes' . "\n";

$name = 'Prévisualisation — Contact Moulin';
$existing = get_posts( array( 'post_type' => 'forminator_forms', 'post_status' => 'any', 'posts_per_page' => -1, 's' => $name ) );
$id = 0;
foreach ( $existing as $form ) { if ( $form->post_title === $name ) { $id = (int) $form->ID; break; } }
if ( ! $id ) {
  $template = new Forminator_Template_Contact_Form();
  $model = new Forminator_Form_Model();
  $model->name = $name;
  $model->status = Forminator_Form_Model::STATUS_PUBLISH;
  $model->settings = $template->settings();
  $model->settings['thankyou-message'] = 'Votre message a été reçu. Merci de m’avoir écrit.';
  $model->settings['submitData']['custom-submit-text'] = 'Envoyer';
  $model->settings['submitData']['custom-invalid-form-message'] = 'Vérifiez les champs indiqués avant d’envoyer.';
  $model->settings['enable-ajax'] = 'true';
  $model->notifications = array();
  foreach ( $template->fields() as $row ) {
    foreach ( $row['fields'] as $field_data ) {
      if ( 'phone' === $field_data['type'] ) { continue; }
      if ( 'name' === $field_data['type'] ) { $field_data = array( 'element_id' => 'text-1', 'type' => 'text', 'cols' => '12', 'required' => 'true', 'field_label' => 'Nom' ); }
      if ( 'email' === $field_data['type'] ) { $field_data['field_label'] = 'Email'; }
      if ( 'textarea' === $field_data['type'] ) { $field_data['field_label'] = 'Message'; $field_data['required'] = 'true'; unset( $field_data['limit'], $field_data['limit_type'] ); }
      $field = new Forminator_Form_Field_Model();
      $field->form_id = $row['wrapper_id'];
      $field->slug = $field_data['element_id'];
      unset( $field_data['element_id'] );
      $field->import( $field_data );
      $model->add_field( $field );
    }
  }
  $id = $model->save();
  if ( is_wp_error( $id ) || ! $id ) { throw new RuntimeException( 'Forminator save failed.' ); }
}
update_option( 'lmdl_forminator_contact_id', (int) $id );
echo 'FORMINATOR_CONTACT_ID=' . (int) $id . ';notifications=none' . "\n";

// Real Timetics entries display the native UI, but no public slot can be booked.
$services = array( 'Communication animale', 'Accompagnement énergétique animalier', 'Connexion avec les défunts', 'Guidance pour soi' );
foreach ( $services as $service ) {
  $title = 'Prévisualisation — ' . $service;
  $matches = get_posts( array( 'post_type' => 'timetics-appointment', 'post_status' => 'any', 'posts_per_page' => -1, 's' => $title ) );
  $meeting_id = 0;
  foreach ( $matches as $match ) { if ( $match->post_title === $title ) { $meeting_id = (int) $match->ID; break; } }
  $meeting = new Timetics\Core\Appointments\Appointment( $meeting_id );
  $meeting->set_props( array(
    'name' => $title, 'type' => 'One-to-One',
    'description' => 'Prévisualisation de l’interface uniquement. Aucun créneau ni tarif officiel n’est publié.',
    'staff' => array(), 'locations' => array(), 'duration' => '15 min',
    'schedule' => array(), 'blocked_schedule' => array(),
    'price' => array( array( 'ticket_name' => 'Prévisualisation', 'ticket_price' => 0, 'ticket_quantity' => 1 ) ),
    'capacity' => 1, 'timezone' => 'Europe/Paris', 'visibility' => 'enabled',
    'availability' => array( 'start' => '2020-01-01', 'end' => '2020-01-02' ),
    'notifications' => array(), 'custom_fields' => array(),
  ) );
  $meeting->save();
  $meeting_id = (int) $meeting->get_id();
  if ( ! $meeting_id ) { throw new RuntimeException( 'Timetics save failed.' ); }
  update_post_meta( $meeting_id, '_lmdl_preview_only', '1' );
  update_post_meta( $meeting_id, 'rank_math_robots', array( 'noindex', 'follow' ) );
  echo 'TIMETICS_PREVIEW_ID=' . $meeting_id . ';service=' . $service . ';availability=expired' . "\n";
}
update_option( 'lmdl_timetics_booking_mode', 'list' );
do_action( 'litespeed_purge_all' );
echo 'PREVIEW_CONFIGURED=yes' . "\n";
