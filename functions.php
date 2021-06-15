<?php
if ( ! function_exists( 'themes_starter_theme_support' ) ) {
	function themes_starter_theme_support() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'my-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to <head>.
		add_theme_support( 'automatic-feed-links' );
		// Add support for post thumbnails and featured images.
		add_theme_support( 'post-thumbnails' );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide alignment.
		add_theme_support( 'align-wide' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		// Add support for padding controls.
		add_theme_support( 'custom-spacing' );
		// Add support for Editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue Editor styles.
		add_editor_style(
			array(
				'./assets/dist/main.css',
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
function themes_starter_register_styles() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// 1. Styles
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/dist/main.css', array(), $theme_version, 'all' ); // main.scss: Compiled Framework source + custom styles.

	// 2. Scripts.
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/dist/main.bundle.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'themes_starter_register_styles' );
