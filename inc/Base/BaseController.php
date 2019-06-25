<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;
	public $extra_url;
	public $title; 
    public $description;

    public function __construct() {

        // Variables for titles before the table in Admin section
		$this->title = 'Cashleo Cashflows for A/C: ' . get_option( 'woocommerce_woocashleo_gateway_settings' )['ugmart_account_name'] . ' ( ' . get_option( 'woocommerce_woocashleo_gateway_settings' )['collection_account'] . ' )';
		
        $this->description = 'These are the latest transactions. Please note that data from the server is refreshed every 5 minutes';

		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/cashleo-woocommerce-payments.php';
		$this->extra_url = 'admin.php?page=wc-settings&tab=checkout&section=woocashleo_gateway';
        
	}
	
}