<?php

/**
 *
 * @link              https://sevengits.com
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Integrate PhonePe with WooCommerce
 * Plugin URI:        https://sevengits.com/plugin/phonepe
 * Description:       Allows customers to use PhonePe payment gateway with the WooCommerce.
 * Version:           1.1.5
 * Author:            Sevengits
 * Author URI:        https://sevengits.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-phonepe
 * Domain Path:       /languages
 * WC requires at least: 3.7
 * WC tested up to: 	 8.1
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

if (!function_exists('get_plugin_data')) {
	require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

if (!defined('SGPPY_VERSION')) {
	define('SGPPY_VERSION', get_plugin_data(__FILE__)['Version']);
}

define('SGPPY_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-phonepe.php';
require plugin_dir_path(__FILE__) . 'plugin-deactivation-survey/deactivate-feedback-form.php';
/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function sgppy_run_phonepe()
{

	$plugin = new Phonepe();
	$plugin->run();
}

// Make sure WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
	sgppy_run_phonepe();
}
add_filter('sgits_deactivate_feedback_form_plugins', function ($plugins) {

	$plugins[] = (object)array(
		'slug'		=> 'wc-phonepe',
		'version'	=> SGPPY_VERSION
	);

	return $plugins;
});
if (!class_exists('\SGPPY\Reviews\Notice')) {
	require plugin_dir_path(__FILE__) . 'includes/packages/plugin-review/notice.php';
}
function sgppy_review()
{
	// delete_site_option('sgppy_reviews_time'); // FOR testing purpose only. this helps to show message always
	$message = sprintf(__("Hello! Seems like you have been using %s for a while – that’s awesome! Could you please do us a BIG favor and give it a 5-star rating on WordPress? This would boost our motivation and help us spread the word.", 'wc-phonepe'), "<b>" . get_plugin_data(__FILE__)['Name'] . "</b>");
	$actions = array(
		'review'  => __('Ok, you deserve it', 'wc-phonepe'),
		'later'   => __('Nope, maybe later I', 'wc-phonepe'),
		'dismiss' => __('already did', 'wc-phonepe'),
	);
	if (class_exists('\SGPPY\Reviews\Notice')) {
		$notice = \SGPPY\Reviews\Notice::get(
			'wc-phonepe',
			get_plugin_data(__FILE__)['Name'],
			array(
				'days'          => 7,
				'message'       => $message,
				'action_labels' => $actions,
				'prefix' => "sgppy"
			)
		);
		$notice->render();
	}
}
add_action('admin_notices', 'sgppy_review');
