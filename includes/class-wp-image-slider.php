<?php 
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Image_Slider' ) ) { 

	class WP_Image_Slider {

		/**
		 * The single instance of WP_Image_Slider.
		 *
		 * @var    object
		 * @access private
		 * @since  1.0.0
		 */
		private static $_instance = null;

		/**
		 * Constructor function.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct () {      
			
		}	
		
		/**
		 * Load plugin localisation
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_plugin_textdomain () {
			$domain = 'wp-image-slider';
			$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

			load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
			load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		
		public function run() {

			if(is_admin()) {
				require_once( WPIS_INCLUDES_PLUGIN_DIR . '/admin/class-wp-image-slider-admin.php' );
				$admin = new WP_Image_Slider_Admin();
				$this->admin = $admin;
				$this->admin->hooks();
			} else {
				require_once( WPIS_INCLUDES_PLUGIN_DIR . '/public/class-wp-image-slider-public.php' );
				$public = new WP_Image_Slider_Public();
				$this->public = $public;
				$this->public->hooks();
			}   

			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		}
		
	}

} // End if class_exists check.