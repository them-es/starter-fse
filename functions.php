<?php
if ( ! function_exists( 'themes_starter_theme_support' ) ) {
	function themes_starter_theme_support() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Enqueue Editor styles.
		add_editor_style(
			array(
				//'./assets/dist/main.css',
				'./style-editor.css',
			)
		);
	}
	add_action( 'after_setup_theme', 'themes_starter_theme_support' );

	// Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}


/**
 * Register and Enqueue Styles.
 */
function themes_starter_load_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// 1. Styles
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/dist/main.css', array(), $theme_version, 'all' ); // main.scss: Compiled Framework source + custom styles.

	if ( is_rtl() ) {
		wp_enqueue_style( 'rtl', get_template_directory_uri() . '/assets/dist/rtl.css', array(), $theme_version, 'all' );
	}

	// 2. Scripts.
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/dist/main.bundle.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'themes_starter_load_scripts' );
