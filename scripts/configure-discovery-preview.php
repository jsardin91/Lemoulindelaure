<?php
/** Configure the sole public discovery call after a verified private backup. */
defined( 'ABSPATH' ) || exit;

if ( 'https://lemoulindelaure.fr' !== get_option( 'home' ) || 'lemoulindelaure-child' !== get_option( 'stylesheet' ) || '1' !== (string) get_option( 'lmdl_preview_noindex' ) ) {
	throw new RuntimeException( 'Preview gate failed.' );
}
if ( ! class_exists( 'Timetics\\Core\\Appointments\\Appointment' ) || ! function_exists( 'timetics_update_option' ) ) {
	throw new RuntimeException( 'Timetics is unavailable.' );
}

$staff = get_users( array( 'role' => 'timetics-staff', 'fields' => array( 'ID' ) ) );
if ( 1 !== count( $staff ) ) {
	throw new RuntimeException( 'Expected exactly one Timetics host.' );
}
$host = new Timetics\Core\Staffs\Staff( $staff[0]->ID );
if ( ! $host->get_status() || ! is_email( $host->get_email() ) || false === stripos( $host->get_full_name(), 'Laure' ) ) {
	throw new RuntimeException( 'Verified Laure host is required.' );
}

$existing = get_posts( array( 'post_type' => 'timetics-appointment', 'post_status' => 'any', 'posts_per_page' => -1, 'meta_key' => '_lmdl_discovery_call', 'meta_value' => '1' ) );
if ( count( $existing ) > 1 ) {
	throw new RuntimeException( 'Multiple discovery meetings found.' );
}
$id = $existing ? (int) $existing[0]->ID : 0;
$today = new DateTimeImmutable( 'today', new DateTimeZone( 'Europe/Paris' ) );
$hours = array( array( 'start' => '6:30pm', 'end' => '9:00pm' ) );
$meeting = new Timetics\Core\Appointments\Appointment( $id );
$meeting->set_props( array(
	'name' => 'Appel découverte gratuit',
	'type' => 'One-to-One',
	'description' => 'Un échange téléphonique de 30 minutes pour faire connaissance. Je vous rappellerai au numéro indiqué lors de votre réservation.',
	'staff' => array( (int) $host->get_id() ),
	'locations' => array( array( 'location_type' => 'attendee-call', 'location' => 'Je vous rappelle par téléphone' ) ),
	'duration' => '30 min',
	'schedule' => array( (int) $host->get_id() => array( 'Mon' => $hours, 'Tue' => $hours, 'Wed' => $hours, 'Thu' => $hours, 'Fri' => $hours, 'Sat' => array(), 'Sun' => array() ) ),
	'blocked_schedule' => array(),
	'price' => array( array( 'ticket_name' => 'Appel découverte gratuit', 'ticket_price' => 0, 'ticket_quantity' => 1 ) ),
	'capacity' => 1,
	'timezone' => 'Europe/Paris',
	'visibility' => 'enabled',
	'availability' => array( 'start' => $today->format( 'Y-m-d' ), 'end' => $today->modify( '+60 days' )->format( 'Y-m-d' ) ),
	'min_notice_time' => '24 hr',
	'buffer_time_before_value' => 0,
	'buffer_time_before_unit' => 'min',
	'buffer_time_after_value' => 15,
	'buffer_time_after_unit' => 'min',
	'notifications' => array(),
	'custom_fields' => array(),
	'guest_enabled' => false,
	'guest_limit' => 1,
) );
$meeting->save();
$id = (int) $meeting->get_id();
if ( ! $id ) {
	throw new RuntimeException( 'Discovery meeting save failed.' );
}
update_post_meta( $id, '_lmdl_discovery_call', '1' );
update_post_meta( $id, 'rank_math_robots', array( 'noindex', 'follow' ) );

$previews = get_posts( array( 'post_type' => 'timetics-appointment', 'post_status' => 'any', 'posts_per_page' => -1, 'meta_key' => '_lmdl_preview_only', 'meta_value' => '1' ) );
foreach ( $previews as $preview ) {
	if ( (int) $preview->ID !== $id ) {
		update_post_meta( $preview->ID, '_tt_apointment_visibility', 'disabled' );
	}
}

timetics_update_option( 'booking_created_customer', 1 );
timetics_update_option( 'booking_created_host', 1 );
timetics_update_option( 'calendar_locale', 'fr' );
timetics_update_option( 'booking_created_customer_email_title', 'Votre appel découverte est confirmé' );
timetics_update_option( 'booking_created_customer_email_body', '<p>Bonjour {%customer_name%},</p><p>Votre appel découverte gratuit avec moi est confirmé pour le {%meeting_date%} à {%meeting_time%} (heure de Paris). Je vous rappellerai au numéro indiqué lors de votre réservation.</p><p>À bientôt,<br>Laure</p>' );
timetics_update_option( 'booking_created_host_email_title', 'Nouvel appel découverte réservé' );
timetics_update_option( 'booking_created_host_email_body', '<p>Bonjour {%host_name%},</p><p>{%customer_name%} a réservé un appel découverte le {%meeting_date%} à {%meeting_time%} (heure de Paris).</p>' );
update_option( 'lmdl_timetics_booking_id', $id );
update_option( 'lmdl_timetics_booking_mode', 'single' );
do_action( 'litespeed_purge_all' );

echo 'DISCOVERY_ID=' . $id . "\n";
echo 'DURATION=30 min;PRICE=0;TIMEZONE=Europe/Paris;NOTICE=24 hr;WEEKDAYS=Mon-Fri;HOURS=18:30-21:00;CALLBACK=yes' . "\n";
echo 'PREVIEW_MEETINGS_DISABLED=' . count( $previews ) . "\n";
echo 'BOOKING_MODE=' . get_option( 'lmdl_timetics_booking_mode' ) . "\n";
