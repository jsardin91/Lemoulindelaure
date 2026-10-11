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
if ( 1 === count( $staff ) ) {
	$host = new Timetics\Core\Staffs\Staff( $staff[0]->ID );
	echo 'STAFF_ACTIVE=' . ( $host->get_status() ? 'yes' : 'no' ) . "\n";
	echo 'STAFF_NAME_MATCHES_LAURE=' . ( false !== stripos( $host->get_full_name(), 'Laure' ) ? 'yes' : 'no' ) . "\n";
}
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

$id = absint( get_option( 'lmdl_timetics_booking_id', 0 ) );
if ( $id && '1' === get_post_meta( $id, '_lmdl_discovery_call', true ) ) {
	$meeting = new Timetics\Core\Appointments\Appointment( $id );
	$host_id = $meeting->get_staff_ids()[0] ?? 0;
	$paris = new DateTimeZone( 'Europe/Paris' );
	$weekday = new DateTimeImmutable( 'today', $paris );
	$weekday = $weekday->modify( '+10 days' );
	while ( (int) $weekday->format( 'N' ) > 5 ) { $weekday = $weekday->modify( '+1 day' ); }
	$weekend = $weekday->modify( 'next saturday' );
	$slot = static function ( $day, $time ) use ( $meeting, $host_id ) {
		return apply_filters( 'timetics_is_slot_available', true, $meeting, array(
			'staff_id' => $host_id, 'start_date' => $day->format( 'Y-m-d' ), 'start_time' => $time, 'timezone' => 'Europe/Paris',
		) );
	};
	echo 'DISCOVERY_RULE_VALID_WEEKDAY=' . ( $slot( $weekday, '6:30pm' ) ? 'yes' : 'no' ) . "\n";
	echo 'DISCOVERY_RULE_EARLY_HOUR=' . ( $slot( $weekday, '6:00pm' ) ? 'yes' : 'no' ) . "\n";
	echo 'DISCOVERY_RULE_LATE_HOUR=' . ( $slot( $weekday, '8:45pm' ) ? 'yes' : 'no' ) . "\n";
	echo 'DISCOVERY_RULE_WEEKEND=' . ( $slot( $weekend, '6:30pm' ) ? 'yes' : 'no' ) . "\n";
	echo 'DISCOVERY_RULE_SAME_DAY=' . ( $slot( new DateTimeImmutable( 'today', $paris ), '6:30pm' ) ? 'yes' : 'no' ) . "\n";
	echo 'CUSTOMER_EMAIL_ENABLED=' . ( timetics_get_option( 'booking_created_customer' ) ? 'yes' : 'no' ) . "\n";
	echo 'HOST_EMAIL_ENABLED=' . ( timetics_get_option( 'booking_created_host' ) ? 'yes' : 'no' ) . "\n";
}
