<?php
/** Read-only Timetics audit. Run with wp eval-file on the preview only. */
defined( 'ABSPATH' ) || exit;

if ( 'https://lemoulindelaure.fr' !== get_option( 'home' ) || '1' !== (string) get_option( 'lmdl_preview_noindex' ) ) {
	throw new RuntimeException( 'Preview/noindex gate failed.' );
}
if ( ! class_exists( 'Timetics\\Core\\Appointments\\Appointment' ) ) {
	throw new RuntimeException( 'Timetics is inactive.' );
}

$staff = get_users( array( 'role' => 'timetics-staff', 'fields' => array( 'ID' ) ) );
echo 'STAFF_COUNT=' . count( $staff ) . "\n";
echo 'STAFF_EMAILS_PRESENT=' . ( count( $staff ) && count( array_filter( $staff, static function ( $user ) { return (bool) get_userdata( $user->ID )->user_email; } ) ) === count( $staff ) ? 'yes' : 'no' ) . "\n";
echo 'TIMEZONE=' . wp_timezone_string() . "\n";
echo 'BOOKING_MODE=' . get_option( 'lmdl_timetics_booking_mode', '' ) . "\n";
echo 'BOOKING_ID_SET=' . ( get_option( 'lmdl_timetics_booking_id', 0 ) ? 'yes' : 'no' ) . "\n";

$appointments = get_posts( array( 'post_type' => 'timetics-appointment', 'post_status' => 'any', 'posts_per_page' => -1 ) );
echo 'APPOINTMENT_COUNT=' . count( $appointments ) . "\n";
foreach ( $appointments as $post ) {
	$meeting = new Timetics\Core\Appointments\Appointment( $post->ID );
	echo 'APPOINTMENT=' . wp_json_encode( array(
		'id' => $post->ID,
		'title' => $post->post_title,
		'status' => $post->post_status,
		'visibility' => $meeting->get_visibility(),
		'preview_only' => get_post_meta( $post->ID, '_lmdl_preview_only', true ),
		'discovery' => get_post_meta( $post->ID, '_lmdl_discovery_call', true ),
	) ) . "\n";
}
