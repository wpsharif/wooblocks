<?php
/**
 * Plugin Name: WooBlocks
 * Plugin URI:  https://wooblocks.com/
 * Description:  Gutenberg Blocks for Woocommerce.
 * Version: 1.0.0
 * Author: Md Sharif Miah
 * Author URI:  https://sharifinfo.com
 * Text Domain: wooblokcs
 * Domain Path: /languages
 * License:  GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/inc/wooblocks_init.php';

final class WooBlocks {

    public function __construct() {

		$this->define_constant();

		add_action('init', [$this, 'i18n']);
		add_action('plugins_loaded', [$this, 'init']);
		add_action( 'init', [$this, 'create_block_starter_block_block_init'] );

	}

	public function create_block_starter_block_block_init() {
		register_block_type( WOOBLOCKS_DIR_PATH . '/build/blocks/woo-header' );
		register_block_type( WOOBLOCKS_DIR_PATH . '/build/blocks/woo-product-list' );
	}	

	/**
	 * Define all constant here
	 * 
	 * @return void 
	 * 
	 * @since 1.0.0
	 */
	public function define_constant(){

		define('WOOBLOCKS_VERSION', '1.0.0');
		define('WOOBLOCKS_NAME', 'essensial-blocks');
		define('WOOBLOCKS_URL', plugin_dir_url(__FILE__));
		define('WOOBLOCKS_ADMIN_URL', plugin_dir_url(__FILE__));
		define('WOOBLOCKS_DIR_PATH', plugin_dir_path(__FILE__));
		define('WOOBLOCKS_FILE', __FILE__);

	}

    /**
     * Load text domain
     * 
     * @return void
     * 
     * @since 1.0.0
     */
	public function i18n() {

		load_plugin_textdomain('wooblokcs', false, WOOBLOCKS_URL . 'languages/');
	}

    /**
     * Plugin main class loading
     * 
     * @return void
     * 
     * @since 1.0.0
     */
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
		
		\WooBlocksInit::get_instance();
        do_action('wooblocks/after_loaded');
	}

    /**
     * Minimum version not match notice
     * 
     * @return string
     * 
     * @since 1.0.0
     */
	public function version_mismatch() {

		return 'woocommerce minimum version does not match';

	}

    /**
     * Woocommerce missing notice
     * 
     * @return string
     * 
     * @since 1.0.0
     */
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
