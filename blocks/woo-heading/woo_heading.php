<?php

/**
 * Registers all blocks assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 */
function woo_heading()
{

    if (!function_exists('register_block_type')) {
		return;
	}

	register_block_type(
		WOOBLOCKS_DIR_PATH . 'blocks/woo-heading',
		array(
			'editor_script' => 'wooblocks-editor-script',
			'editor_style'    	=> 'wooblocks-editor-css',
			'render_callback' => function ($attributes, $content) {
				if (!is_admin()) {
					wp_enqueue_style('wooblocks-frontend-style');
				}
				return $content;
			}
		)
	);
}
add_action('init', 'woo_heading');
