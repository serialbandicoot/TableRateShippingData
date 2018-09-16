<?php
/**
* @package TableRateShippingData
*/

/*
Plugin Name: TableRateShippingData
Plugin URI: https://github.com/serialbandicoot/TableRateShippingData
Description: This is my first attempt to create a cutom plugin
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
		add_action( 'init', array( $this , 'get_table_rate_shipping_data' ) );
	}

	function activate(){
		$this->get_table_rate_shipping_data();
		flush_rewrite_rules();
	}

	function deactivate(){
		flush_rewrite_rules();
	}

	function get_table_rate_shipping_data(){
		//Location to 
	}
}

if (class_exists('TableRateShippingData')) {
	$table_rate_shipping_data = new TableRateShippingData();
}

//activate
register_activation_hook( __FILE__, array($table_rate_shipping_data, 'activate') );


//deactivate
register_deactivation_hook( __FILE__, array($table_rate_shipping_data, 'deactivate') );

