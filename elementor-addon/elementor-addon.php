<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Custom Elementor extension which includes custom widgets.
 * Plugin URI:  https://mdniajmakhdum.me/
 * Version:     1.0.0
 * Author:      Md Niaj Makhdum
 * Author URI:  https://mdniajmakhdum.me/
 * Text Domain: elementor-addon
 * Domain Path: /languages
 */

 function register_elementor_test_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/elementor-test.php' );


	$widgets_manager->register( new \Elementor_Test_Widget() );
	

}
add_action( 'elementor/widgets/register', 'register_elementor_test_widget' );

// Registering a new category for Elementor widgets

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'elementor-addon',
		[
			'title' => esc_html__( 'Elementor Addon', 'elementor-addon' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

