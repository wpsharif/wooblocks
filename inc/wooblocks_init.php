<?php

defined('ABSPATH') || exit;

/**
 * All plugin file will load here
 */
class WooBlocksInit {

    protected static $_instance = null;

    private $enabled_blocks = [];

    public static function get_instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        $this->wooblocks_dependencies();
        
        // new WooBlocksEnqueue();

	}

    public function wooblocks_dependencies(){

        // require_once WOOBLOCKS_DIR_PATH . "inc/wooblocks_enqueue.php";
        // require_once WOOBLOCKS_DIR_PATH . "blocks/woo-heading/woo_heading.php";

    }
}