<?php
/**
 * Theme Setup.
 */
if ( ! function_exists( 'themes_starter_theme_support' ) ) {
	function themes_starter_theme_support() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'my-theme', __DIR__ . '/languages' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
	}
	add_action( 'after_setup_theme', 'themes_starter_theme_support' );

	// Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}

/**
 * Custom Template part.
 */
function themes_starter_custom_template_part_area( $areas ) {
	array_push(
		$areas,
		array(
			'area'        => 'query',
			'label'       => esc_html__( 'Query', 'my-theme' ),
			'description' => esc_html__( 'Custom query area', 'my-theme' ),
			'icon'        => 'layout',
			'area_tag'    => 'div',
		)
	);
	return $areas;
}
add_filter( 'default_wp_template_part_areas', 'themes_starter_custom_template_part_area' );

/**
 * Enqueue frontend assets.
 */
if ( ! function_exists( 'themes_starter_load_scripts' ) ) {
	function themes_starter_load_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );

		// 1. Styles.
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
		wp_enqueue_style( 'main', get_theme_file_uri( 'assets/dist/main.css' ), array(), $theme_version, 'all' ); // main.scss: Compiled custom styles.

		if ( is_rtl() ) {
			wp_enqueue_style( 'rtl', get_theme_file_uri( 'assets/dist/rtl.css' ), array(), $theme_version, 'all' );
		}

		// 2. Scripts.
		wp_enqueue_script( 'mainjs', get_theme_file_uri( 'assets/dist/main.bundle.js' ), array(), $theme_version, true );
	}
	add_action( 'wp_enqueue_scripts', 'themes_starter_load_scripts' );
}
