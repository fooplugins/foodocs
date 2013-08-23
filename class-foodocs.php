<?php
/**
 * FooDocs class
 *
 * @package foodocs
 * @author  Brad Vincent
 */
if ( !class_exists( 'FooDocs' ) ) {
	class FooDocs {

		protected $version = '0.2.0';
		protected $plugin_slug = 'foodocs';

		function __construct() {
			//this runs when the class is instantiated

			//setup translations
			add_action( 'init', array($this, 'load_plugin_textdomain') );

			//register my custom post types
			add_action( 'init', array($this, 'register_custom_post_type') );
		}

		function load_plugin_textdomain() {
			$domain = $this->plugin_slug;
			$mo_file = WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . get_locale() . '.mo';

			load_textdomain( $domain, $mo_file );
			load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
		}

		function register_custom_post_type() {
			$labels = array(
				'name'               => __( 'Documentation', 'foodocs' ),
				'singular_name'      => __( 'Documentation', 'foodocs' ),
				'add_new'            => __( 'Add New', 'foodocs' ),
				'add_new_item'       => __( 'Add New Documentation', 'foodocs' ),
				'edit_item'          => __( 'Edit Documentation', 'foodocs' ),
				'new_item'           => __( 'New Documentation', 'foodocs' ),
				'view_item'          => __( 'View Documentation', 'foodocs' ),
				'search_items'       => __( 'Search Documentation', 'foodocs' ),
				'not_found'          => __( 'No documentation found', 'foodocs' ),
				'not_found_in_trash' => __( 'No documentation found in Trash', 'foodocs' ),
				'parent_item_colon'  => __( 'Parent Documentation:', 'foodocs' ),
				'menu_name'          => __( 'FooDocs', 'foodocs' ),
				'all_items'          => __( 'Documentation', 'foodocs' )
			);

			$args = array(
				'labels'              => $labels,
				'hierarchical'        => true,
				'description'         => __( 'Documentation for a your digital products', 'foodocs' ),
				'supports'            => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'comments'),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => true,
				'capability_type'     => 'page'
			);

			register_post_type( 'foodocs', $args );
		}
	}
}