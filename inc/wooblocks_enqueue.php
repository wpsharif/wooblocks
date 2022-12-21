<?php

defined('ABSPATH') || exit;

class WooBlocksEnqueue {

    public function __construct(){

        add_action('enqueue_block_editor_assets', [$this, 'wooblocks_enqueue_block_assets']);
        add_action('enqueue_block_editor_assets', [$this, 'wooblocks_fronend_backend_assets']);

    }

    public function wooblocks_enqueue_block_assets(){
        wp_enqueue_script( 'WooBlocksScript', WOOBLOCKS_URL . "build/index.js", ["wp-blocks"]);
    }

    public function wooblocks_fronend_backend_assets(){

    }

}