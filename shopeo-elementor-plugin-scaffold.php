<?php
/**
 * Plugin Name: SHOPEO Elementor Plugin Scaffold
 * Plugin URI: https://wordpress.org/plugins/shopeo-elementor-plugin-scaffold
 * Description:
 * Author: Shopeo
 * Version: 0.0.1
 * Author URI: https://shopeo.cn
 * License: GPL3+
 * Text Domain: shopeo-elementor-plugin-scaffold
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once 'vendor/autoload.php';
}

use Shopeo\ShopeoElementorPluginScaffold\Widgets\ShopeoHelloWidget;

if (!defined('SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE')) {
	define('SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE', __FILE__);
}

if (!function_exists('shopeo_elementor_plugin_scaffold_activation')) {
	function shopeo_elementor_plugin_scaffold_activation()
	{

	}
}

register_activation_hook(SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE, 'shopeo_elementor_plugin_scaffold_activation');

if (!function_exists('shopeo_elementor_plugin_scaffold_deactivation')) {
	function shopeo_elementor_plugin_scaffold_deactivation()
	{

	}
}

register_deactivation_hook(SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE, 'shopeo_elementor_plugin_scaffold_deactivation');

if (!function_exists('shopeo_elementor_plugin_scaffold_init')) {
	function shopeo_elementor_plugin_scaffold_init()
	{

		//load text domain
		load_plugin_textdomain('shopeo-elementor-plugin-scaffold', false, dirname(plugin_basename(SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE)) . '/languages');
	}
}

add_action('init', 'shopeo_elementor_plugin_scaffold_init');

add_action('admin_enqueue_scripts', function () {
	$plugin_version = get_plugin_data(SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE)['Version'];
	//style

	//script
	wp_enqueue_script('shopeo-elementor-plugin-scaffold-admin-script', plugins_url('/assets/js/admin.js', SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE), array('jquery'), $plugin_version);
	wp_localize_script('shopeo-elementor-plugin-scaffold-admin-script', 'shopeo_elementor_plugin_scaffold', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));
});

add_action('wp_enqueue_scripts', function () {
	$plugin_version = get_plugin_data(SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE)['Version'];
	//style
	wp_enqueue_style('shopeo-elementor-plugin-scaffold-style', plugins_url('/assets/css/style.css', SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE), array(), $plugin_version);
	wp_style_add_data('shopeo-elementor-plugin-scaffold-style', 'rtl', 'replace');

	//script
	wp_enqueue_script('shopeo-elementor-plugin-scaffold-script', plugins_url('/assets/js/app.js', SHOPEO_PLUGIN_SCAFFOLD_PLUGIN_FILE), array('jquery'), $plugin_version);
	wp_localize_script('shopeo-elementor-plugin-scaffold-script', 'shopeo_elementor_plugin_scaffold', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));
});

if (!function_exists('shopeo_elemetor_plugin_scaffold_register_categories')) {
	function shopeo_elemetor_plugin_scaffold_register_categories($elements_manager)
	{
		$elements_manager->add_category(
			'shopeo', [
				'title' => esc_html__('Shopeo', 'se_elementor'),
			]
		);
	}
}

add_action('elementor/elements/categories_registered', 'shopeo_elemetor_plugin_scaffold_register_categories');


if (!function_exists('shopeo_elemetor_plugin_scaffold_register_widgets')) {
	function shopeo_elemetor_plugin_scaffold_register_widgets($widgets_manager)
	{
		$widgets_manager->register(new ShopeoHelloWidget());
	}
}

add_action('elementor/widgets/register', 'shopeo_elemetor_plugin_scaffold_register_widgets');
