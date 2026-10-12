<?php
/** Read-only, allowlisted LiteSpeed configuration audit for the preview site. */
defined( 'ABSPATH' ) || exit;

$option = get_option( 'litespeed-cache-conf', array() );
$option = is_array( $option ) ? $option : array();
$keys = array(
	'cache', 'cache-priv', 'cache-mobile', 'cache-browser', 'cache-ttl_pub',
	'guest', 'guest_optm', 'optm-css_min', 'optm-css_comb', 'optm-css_async',
	'optm-js_min', 'optm-js_comb', 'optm-js_defer', 'optm-html_min',
	'media-lazy', 'optm-emoji_rm', 'object',
);

echo 'LITESPEED_ACTIVE=' . ( in_array( 'litespeed-cache/litespeed-cache.php', (array) get_option( 'active_plugins', array() ), true ) ? 'yes' : 'no' ) . "\n";
echo 'LITESPEED_VERSION=' . ( defined( 'LSCWP_V' ) ? LSCWP_V : 'unknown' ) . "\n";
echo 'CONFIG_ARRAY_KEYS=' . count( $option ) . "\n";
foreach ( $keys as $key ) {
	$value = get_option( 'litespeed.conf.' . $key, null );
	if ( null === $value && array_key_exists( $key, $option ) ) {
		$value = $option[ $key ];
	}
	if ( null === $value ) {
		$value = 'unset';
	} elseif ( is_bool( $value ) ) {
		$value = $value ? '1' : '0';
	} elseif ( ! is_scalar( $value ) ) {
		$value = 'complex';
	}
	echo $key . '=' . preg_replace( '/[^a-zA-Z0-9_.-]/', '', (string) $value ) . "\n";
}
echo 'PREVIEW_NOINDEX=' . (string) get_option( 'lmdl_preview_noindex', '' ) . "\n";
