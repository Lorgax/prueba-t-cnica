<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function getDataAjax() {
	$data = $_POST["dataJson"];
	$currentPage = $_POST["currentPage"];
	$recordsPerPage = $_POST["recordsPerPage"];

	$startIndex = ($currentPage - 1) * $recordsPerPage;
	$endIndex = $startIndex + $recordsPerPage;

	for ($i = $startIndex; $i < $endIndex && $i < count($data["usuarios"]); $i++) {
		$user = $data["usuarios"][$i];
		echo "<tr><td>". $user["name"] . "</td> <td>" . $user["surname1"]. "</td> <td>". $user["surname2"]. "</td> <td>" . $user["email"] . "</td></tr>";
	}

	wp_send_json( $data );
}

add_action( "wp_ajax_my_custom_function", "getDataAjax" );
add_action( "wp_ajax_nopriv_my_custom_function", "getDataAjax" );

function getFilterData() {
	
	if( isset( $_POST["input"] ) ) {
		
		$input = $_POST["input"];
		$data = $_POST["dataJson"];

		$filteredData = [];

		foreach ($data["usuarios"] as $value) {
			if (stripos($value['name'], $input) !== false ||
				stripos($value['surname1'], $input) !== false ||
				stripos($value['surname2'], $input) !== false ||
				stripos($value['email'], $input) !== false) {
				$filteredData[] = $value;
			}
		}

		if (empty($filteredData)) {
			foreach( $data["usuarios"] as $value ) {
				echo "<tr><td>". $value["name"] . "</td> <td>" . $value["surname1"]. "</td> <td>". $value["surname2"]. "</td> <td>" . $value["email"] . "</td></tr>";
			}
		} else {
			foreach( $filteredData as $value ) {
				echo "<tr><td>". $value["name"] . "</td> <td>" . $value["surname1"]. "</td> <td>". $value["surname2"]. "</td> <td>" . $value["email"] . "</td></tr>";
			}
		}
	
		wp_send_json( $data );

	} 
}

add_action( "wp_ajax_filter_data", "getFilterData" );
add_action( "wp_ajax_nopriv_filter_data", "getFilterData" );
