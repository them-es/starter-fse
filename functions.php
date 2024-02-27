<?php
if ( ! function_exists( 'themes_starter_theme_support' ) ) {
	/**
	 * General Theme Settings.
	 *
	 * @since v1.0
	 *
	 * @return void
	 */
	function themes_starter_theme_support() {
		// Make theme available for translation: Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'my-theme', __DIR__ . '/languages' );

		// Add support for Post thumbnails.
		add_theme_support( 'post-thumbnails' );
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for Editor Styles.
		add_theme_support( 'editor-styles' );
		// Enqueue Editor Styles.
		add_editor_style(
			'style-editor.css'
		);
	}
	add_action( 'after_setup_theme', 'themes_starter_theme_support' );

	/**
	 * Enqueue editor stylesheet (for iframed Post Editor):
	 * https://make.wordpress.org/core/2023/07/18/miscellaneous-editor-changes-in-wordpress-6-3/#post-editor-iframed
	 *
	 * @since v1.2.2
	 *
	 * @return void
	 */
	function themes_starter_load_editor_styles() {
		if ( is_admin() ) {
			wp_enqueue_style( 'editor-style', get_theme_file_uri( 'style-editor.css' ) );
		}
	}
	add_action( 'enqueue_block_assets', 'themes_starter_load_editor_styles' );

	// Disable Block Directory: https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/filters/editor-filters.md#block-directory
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );
}

/**
 * Custom Template part.
 *
 * @param array $areas Template part areas.
 *
 * @return array
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

if ( ! function_exists( 'themes_starter_load_scripts' ) ) {
	/**
	 * Enqueue CSS Stylesheets and Javascript files.
	 *
	 * @return void
	 */
	function themes_starter_load_scripts() {
		$theme_version = wp_get_theme()->get( 'Version' );

		// 1. Styles.
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme_version );
		wp_enqueue_style( 'main', get_theme_file_uri( 'build/main.css' ), array(), $theme_version, 'all' ); // main.scss: Compiled custom styles.

		if ( is_rtl() ) {
			wp_enqueue_style( 'rtl', get_theme_file_uri( 'build/rtl.css' ), array(), $theme_version, 'all' );
		}

		// 2. Scripts.
		wp_enqueue_script( 'mainjs', get_theme_file_uri( 'build/main.js' ), array(), $theme_version, true );
	}
	add_action( 'wp_enqueue_scripts', 'themes_starter_load_scripts' );
}
