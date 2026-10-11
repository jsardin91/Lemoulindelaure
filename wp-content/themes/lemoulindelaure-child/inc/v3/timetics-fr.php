<?php
/** French wording for the public Timetics booking form. No plugin files are changed. */
defined( 'ABSPATH' ) || exit;

/** Keep Timetics' own calendar in French and use French date/time conventions. */
add_filter( 'timetics_frontned_localize_data', function ( $data ) {
	if ( is_page( 'prendre-rendez-vous' ) && is_array( $data ) ) {
		$data['locale_name'] = 'fr-fr';
		$data['date_format'] = 'j F Y';
		$data['time_format'] = 'H:i';
	}
	return $data;
} );

/** Translate the few PHP labels Timetics appends to its configurable emails. */
add_filter( 'gettext', function ( $translated, $text, $domain ) {
	if ( 'timetics' !== $domain ) {
		return $translated;
	}
	$labels = array(
		'Location:' => 'Téléphone :',
		'Need to make changes to this meeting?' => 'Besoin de modifier ce rendez-vous ?',
		'Reschedule' => 'Déplacer le rendez-vous',
		'Cancel' => 'Annuler',
		'Thank you!' => 'Merci !',
	);
	return $labels[ $text ] ?? $translated;
}, 10, 3 );

/** Timetics 1.0.63/1.0.64 calls wp.i18n for its booking copy but ships no French catalog here. */
add_action( 'wp_footer', function () {
	if ( ! is_page( 'prendre-rendez-vous' ) || ! wp_script_is( 'timetics-frontend-scripts', 'enqueued' ) ) {
		return;
	}
	$strings = array(
		'Choose a time that works for you.' => 'Choisissez le créneau qui vous convient.',
		'Please select a date to see available time' => 'Choisissez une date pour voir les créneaux disponibles.',
		'No slot available' => 'Aucun créneau disponible',
		'Select Date & Time' => 'Choisir une date et une heure',
		'Select a time' => 'Choisir une heure',
		'Timezone: ' => 'Fuseau horaire : ',
		'Timezone' => 'Fuseau horaire',
		'Duration' => 'Durée',
		'Location' => 'Lieu',
		'Location is required!' => 'Indiquez le lieu du rendez-vous.',
		'Select Meeting location' => 'Choisir le mode de rendez-vous',
		'Organizer Phone Number' => 'Numéro de téléphone de Laure',
		'Attendee Phone Number' => 'Votre numéro de téléphone',
		'In Person Meeting' => 'Rendez-vous en personne',
		'Give your information' => 'Indiquez vos coordonnées',
		'Enter Information' => 'Indiquer mes coordonnées',
		'Name' => 'Nom',
		'First Name' => 'Prénom',
		'Last Name' => 'Nom',
		'Email' => 'Adresse e-mail',
		'E-mail' => 'Adresse e-mail',
		'E-Mail' => 'Adresse e-mail',
		'Phone' => 'Téléphone',
		'Enter your name' => 'Saisissez votre nom',
		'Enter your name!' => 'Saisissez votre nom.',
		'Enter your first name' => 'Saisissez votre prénom',
		'Enter your last name' => 'Saisissez votre nom',
		'Enter your email' => 'Saisissez votre adresse e-mail',
		'Enter your e-mail' => 'Saisissez votre adresse e-mail',
		'Enter your e-mail!' => 'Saisissez votre adresse e-mail.',
		'Enter your phone number' => 'Saisissez votre numéro de téléphone',
		'First name is required!' => 'Le prénom est obligatoire.',
		'Last name is required!' => 'Le nom est obligatoire.',
		'Email is required!' => 'L’adresse e-mail est obligatoire.',
		'A valid phone number is required!' => 'Un numéro de téléphone valide est obligatoire.',
		'That doesn\'t look like an email address' => 'Cette adresse e-mail ne semble pas valide.',
		'Please share anything that will help us prepare for the meeting' => 'Indiquez ce que vous souhaitez partager avant notre échange.',
		'Additional notes' => 'Précisions complémentaires',
		'Additional Notes' => 'Précisions complémentaires',
		'Back' => 'Retour',
		'Go back' => 'Retour',
		'Confirm Booking' => 'Confirmer le rendez-vous',
		'Continue booking?' => 'Continuer la réservation ?',
		'Free' => 'Gratuit',
		'Price' => 'Prix',
		'Total Price: ' => 'Prix total : ',
		'This meeting is scheduled' => 'Votre rendez-vous est confirmé',
		'When' => 'Quand',
		'Where' => 'Où',
		'What' => 'Quoi',
		'with' => 'avec',
		'Add to Calendar' => 'Ajouter à mon agenda',
		'Need to make a change? ' => 'Besoin de modifier votre rendez-vous ? ',
		'Reschedule' => 'Déplacer le rendez-vous',
		'Reschedule Booking' => 'Déplacer le rendez-vous',
		'Cancel Appointment' => 'Annuler le rendez-vous',
		'Cancel ' => 'Annuler ',
		'Booking canceled.' => 'Rendez-vous annulé.',
		'Oops, it seems your booking was canceled.' => 'Votre rendez-vous semble avoir été annulé.',
		'No meetings found.' => 'Aucun rendez-vous disponible.',
		'Couldn\'t schedule this booking' => 'La réservation n’a pas pu être effectuée.',
		'Something went wrong, Please try again.' => 'Une erreur est survenue. Veuillez réessayer.',
		'Could not reach the server. Please check your connection and try again.' => 'Le serveur est inaccessible. Vérifiez votre connexion puis réessayez.',
		'Well, Something\'s Wrong. Please contact your admin to fix it.' => 'Une erreur est survenue. Veuillez nous contacter.',
	);
	$locale_data = array( '' => array( 'domain' => 'timetics', 'lang' => 'fr_FR' ) );
	foreach ( $strings as $source => $translation ) {
		$locale_data[ $source ] = array( $translation );
	}
	// These footer bundles depend on one another, so defer them in document order.
	// Keep both inline snippets before the bundles: an "after" snippet would make
	// WordPress fall back to blocking script tags for the dependency chain.
	foreach ( array( 'timetics-flatpickr-scripts', 'timetics-packages', 'timetics-frontend-scripts', 'calendar-locale' ) as $handle ) {
		if ( wp_script_is( $handle, 'enqueued' ) ) {
			wp_script_add_data( $handle, 'strategy', 'defer' );
		}
	}
	wp_add_inline_script(
		'timetics-frontend-scripts',
		'wp.i18n.setLocaleData(' . wp_json_encode( $locale_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . ', "timetics");',
		'before'
	);
	// Timetics hardcodes the US dialling code in its bundled phone input.
	wp_add_inline_script( 'timetics-frontend-scripts', <<<'JS'
(function () {
  const initialized = new WeakSet();
  const useFrenchDialCode = () => {
    const flag = document.querySelector('.v3-booking .tt-country-phone-code .selected-flag');
    if (!flag || initialized.has(flag)) return;
    initialized.add(flag);
    if (!flag.querySelector('.flag.us')) return;
    flag.click();
    requestAnimationFrame(() => {
      const france = document.querySelector('.v3-booking .tt-country-phone-code [data-country-code="fr"]');
      if (france) france.click();
    });
  };
  new MutationObserver(useFrenchDialCode).observe(document.body, { childList: true, subtree: true });
  useFrenchDialCode();
}());
JS
		,
		'before'
	);
}, 5 );
