<?php
/*
* Add Settings link to the plugin entry in the plugins + Sub page menu
*/

namespace Inc\Base;

use Inc\Base\BaseController;

Class Settings extends BaseController
{
	
	public function register() {

		add_filter( 'plugin_action_links_' . $this->plugin, array( $this, 'woocashleo_plugin_action_links' ), 10, 2 );
		add_action( 'admin_menu', array( $this, 'register_woocashleo_submenu_page' ), 99 );
		add_filter( 'plugin_row_meta', array( $this, 'woocashleo_extra_links' ), 10, 2 );
		
	}

	/**
	* Add Settings link to the plugin entry in the plugins menu
	**/
	public function woocashleo_plugin_action_links( $links ) {

		$settings_link = '<a href="' . admin_url( $this->extra_url ) . '" aria-label="' . esc_attr__( 'View Cashleo settings', 'woocashleo' ) . '">' . esc_html__( 'Settings', 'woocashleo' ) . '</a>';
		array_unshift( $links, $settings_link );	
		return $links;

	}
	
	/**
	 * Add Admin Sub Page to WooCommerce
	 */
	public function register_woocashleo_submenu_page() {

		add_submenu_page( 'woocommerce', 'Cashleo Settings', 'Cashleo Settings', 'manage_options', $this->extra_url  );
		
	}

	/**
	 * Add Admin Sub Page to WooCommerce
	 */
	public function woocashleo_extra_links( $links, $file ) {

		if ( strpos( $file, 'cashleo-woocommerce-payments.php' ) !== false ) {
			$new_links = array(
				'doc' 		=> '<a href="https://cashleo.com/cashleo-woocommerce-plugin/" target="_blank" aria-label="' . esc_attr__( 'View Cashleo WooCommerce Payments Documentation', 'woocashleo' ) . '">' . esc_html__( 'Documentation', 'woocashleo' ) . '</a>'
			);
			
			$links = array_merge( $links, $new_links );
		}

		return (array) $links;

	}
}