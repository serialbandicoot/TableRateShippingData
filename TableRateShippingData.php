<?php
/**
* @package TableRateShippingData
*/

/*
Plugin Name: TableRateShippingData
Plugin URI: https://github.com/serialbandicoot/TableRateShippingData
<<<<<<< HEAD
Description: Table Rate Shipping returned in a GET request
=======
Description: This is my first attempt to create a cutom plugin
>>>>>>> 03fe3bb8cd775a673f377fb19c2cfa50c737ef8c
Version: 1.0.0
Author: @serialbandicoot
Author URI: https://github.com/serialbandicoot/TableRateShippingData
License: GPLv2 or later 
Text Domain: TableRateShippingData
*/
	
defined( 'ABSPATH' ) or die('Silence is golden.');

class TableRateShippingData 
{

	function __construct(){
<<<<<<< HEAD
		add_action( 'rest_api_init', array( $this , 'activate_table_rate_shipping_data' ) );
=======
		add_action( 'init', array( $this , 'get_table_rate_shipping_data' ) );
>>>>>>> 03fe3bb8cd775a673f377fb19c2cfa50c737ef8c
	}

	function activate(){
		$this->get_table_rate_shipping_data();
		flush_rewrite_rules();
	}

	function deactivate(){
		flush_rewrite_rules();
	}

<<<<<<< HEAD
	/*
		URL: http://lhost/wp-json/shipping/v1/table_rate_data
	*/

	function activate_table_rate_shipping_data(){
		register_rest_route( 'shipping/v1', '/table_rate_data', array(
				'methods' => 'GET',
				'callback' => 'TableRateShippingData::get_table_rate_shipping_data',
			));
	}

	static function get_table_rate_shipping_data(){
		global $woocommerce;
		global $wpdb;

		$active_methods   = array();
		$shipping_methods = $woocommerce->shipping->load_shipping_methods();

		foreach ( $shipping_methods as $id => $shipping_method ) {

			$data_arr = array( 'title' => $shipping_method->title, 'tax_status' => $shipping_method->tax_status );  

			if( $id == 'table_rate'){ 
					$raw_zones = $wpdb->get_results("SELECT zone_id, zone_name, zone_order FROM {$wpdb->prefix}woocommerce_shipping_zones order by zone_order ASC;");


	 			$shipping = array();
	    		$shippingarr = array();


				foreach ($raw_zones as $raw_zone) {

					$zones = new WC_Shipping_Zone($raw_zone->zone_id);

			        $zone_id 		= $zones->zone_id; 
			        $zone_name 		= $zones->zone_name; 
			        $zone_enabled 	= $zones->zone_enabled; 
			        $zone_type 		= $zones->zone_type; 
			        $zone_order 	= $zones->zone_order; 

			        $shipping['zone_id']  		= $zone_id;
			        $shipping['zone_name'] 		= $zone_name;
			        $shipping['zone_enabled'] 	= $zone_enabled;
			        $shipping['zone_type'] 		= $zone_type;
			        $shipping['zone_order'] 	= $zone_order;

			        $shipping_methods = $zones->shipping_methods; 

					foreach($shipping_methods as $shipping_method){
					    $methodid = $shipping_method["number"];
					    $raw_rates[$methodid]['rates'] = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_shipping_table_rates WHERE shipping_method_id={$methodid};", ARRAY_A);
					}

					$shipping['shipping_methods'] = $raw_rates;
					$raw_country = $wpdb->get_results("SELECT location_code FROM {$wpdb->prefix}woocommerce_shipping_zone_locations WHERE zone_id={$zone_id};", ARRAY_N);
					$shipping['countries'] = $raw_country;
					$shippingarr[] = $shipping;
					


				}

			}


		}

	 
		return $shipping_methods;
=======
	function get_table_rate_shipping_data(){
		//Location to 
>>>>>>> 03fe3bb8cd775a673f377fb19c2cfa50c737ef8c
	}
}

if (class_exists('TableRateShippingData')) {
	$table_rate_shipping_data = new TableRateShippingData();
}

//activate
register_activation_hook( __FILE__, array($table_rate_shipping_data, 'activate') );


//deactivate
register_deactivation_hook( __FILE__, array($table_rate_shipping_data, 'deactivate') );

