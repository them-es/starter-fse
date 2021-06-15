( function () {
	'use strict';

	const commentButton = document.querySelector( '.comment-form .form-submit' );
	if ( document.body.contains( commentButton ) ) {
		commentButton.classList.add( 'wp-block-button' );
		commentButton.querySelector( '.submit' ).classList.add( 'wp-block-button__link' );
	}
} )();
