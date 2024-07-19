<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// This class define all the functionality of admin side of plugin
if ( ! class_exists( 'WP_Image_Slider_Admin' ) ) {  

	class WP_Image_Slider_Admin {

		public function __construct() {

		}

		/**
		 * Define all the Actions for admin side of plugin
		 * 
		 * @since 1.0.0
		 * 
		 * @return void
		 */
		public function hooks() {

			// Admin CSS and javascript
			add_action( 'admin_enqueue_scripts', array( $this, 'wp_image_slider_admin_enqueue_styles' ) );

			// Admin Menu
			add_action('admin_menu', array( $this, 'wp_image_slider_add_admin_menu'));

			// Register settings
			add_action('admin_init', array( $this, 'wp_image_register_settings'));
			
		}

		/**
		 * Load admin CSS and Javascript.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function wp_image_slider_admin_enqueue_styles($hook) {

			if ($hook !== 'toplevel_page_wp-image-slider') {
				return;
			}
			wp_enqueue_media();
			wp_enqueue_style( WPIS_PLUGIN_TEXT_DOMAIN. '-admin', WPIS_ASSETS_PLUGIN_URL. '/css/admin.css', array(), WPIS_VERSION );
			wp_enqueue_script(WPIS_PLUGIN_TEXT_DOMAIN. '-admin', WPIS_ASSETS_PLUGIN_URL. '/js/admin.js', array( 'jquery', 'jquery-ui-sortable' ), WPIS_VERSION );
		}

		/**
		 * Add the settings page to the admin menu.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void	
		 */
		public function wp_image_slider_add_admin_menu() {
			add_menu_page( __('WP Image Slider', 'wp-image-slider'), __('WP Image Slider', 'wp-image-slider'), 'manage_options', 'wp-image-slider', array( $this, 'wp_image_slider_admin_page' ), 'dashicons-images-alt2', 6 );
		}


		/**
		 * Register the settings.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function wp_image_register_settings() {
			register_setting('wp_image_slider_options', 'wp_image_slider_images');
		}

		/**
		 * Add the settings page to the admin menu.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function wp_image_slider_admin_page() {
			require_once( WPIS_PLUGIN_DIR . 'includes/admin/views/html-admin-settings.php' );
		}

	}
} // End if class_exists check.
?>