<?php
/*
Plugin Name: FooDocs
Plugin URI: https://github.com/fooplugins/foodocs
Description: Organized documentation for your digital products
Author: FooPlugins
Author URI: http://fooplugins.com
Version: 0.1-alpha
*/

if ( !class_exists('FooDocs') ) {
	class FooDocs {
		function __construct() {
			//this runs when the class is instantiated
		}

		function register_custom_post_type() {
			//this is where I will register my custom post type
		}
	}
}

$GLOBALS['FooDocs'] = new FooDocs();