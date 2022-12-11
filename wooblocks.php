<?php
/**
 * Plugin Name: WooBlocks - Woocommerce Builder
 * Plugin URI:  https://wooblocks.com/
 * Description: WooBlocks is the powerfull WooCommerce template builder for Gutenburg.
 * Version: 1.0.0
 * Author: Md Sharif Miah
 * Author URI:  https://sharifinfo.com
 * Text Domain: wooblokcs
 * Domain Path: /languages
 * License:  GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || exit;

final class WooBlocks {

    public function __construct() {
		add_action('init', [$this, 'i18n']);
		add_action('plugins_loaded', [$this, 'init']);
	}

	public static function plugin_version() {
		return '1.0.0';
	}

	/**
	 * Plugin url
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public static function plugin_url() {
		return trailingslashit(plugin_dir_url(__FILE__));
	}

    /**
	 * Plugin root file.
	 *
	 * @return string
	 * @since 1.0.0
	 *
	 */
	public static function plugin_file() {
		return __FILE__;
	}

	/**
	 * Plugin dir
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public static function plugin_dir() {
		return trailingslashit(plugin_dir_path(__FILE__));
	}

	public function i18n() {

		load_plugin_textdomain('wooblokcs', false, self::plugin_dir() . 'languages/');
	}

	public function init() {

        do_action('wooblocks/before_loaded');

		if(!class_exists('WooCommerce')) {

			$this->missing_woocommerce();

			return;
		}

		 //Check for required woocommerce version.
		 if(!version_compare(WOOCOMMERCE_VERSION, '6.0', '>=')) {

			$this->version_mismatch();

			return;
		}

		// \WooBlocks\Plugin::init();

        do_action('wooblocks/after_loaded');
	}

	public function version_mismatch() {

		return 'woocommerce minimum version does not match';

	}

	public function missing_woocommerce() {
        return 'missing woocommerce';
    }
}

new \WooBlocks();

register_activation_hook(__FILE__, 'activate_wooblocks');

register_deactivation_hook(__FILE__, 'deactivate_wooblocks');

function activate_wooblocks() { 

    //do something
}

function deactivate_wooblocks() {

    //do something
}

