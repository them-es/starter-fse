( function () {
	'use strict';

	// Style comment form.
	const commentButton = document.querySelector( '.comment-form .form-submit' );
	if ( document.body.contains( commentButton ) ) {
		commentButton.classList.add( 'wp-block-button' );
		commentButton.querySelector( '.submit' ).classList.add( 'wp-block-button__link' );
	}

	// Style password protected post form.
	const passwordButton = document.querySelector( '.post-password-form [type="submit"]' );
	if ( document.body.contains( passwordButton ) ) {
		const passwordButtonWrapper = document.createElement( 'div' );
		passwordButtonWrapper.classList.add( 'wp-block-button' );
		passwordButton.parentNode.insertBefore( passwordButtonWrapper, passwordButton );
		passwordButtonWrapper.appendChild( passwordButton );
		
		passwordButton.classList.add( 'wp-block-button__link' );
	}
} )();
