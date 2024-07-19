<?php
/**
 * Plugin Name:       Image Slider
 * Description: A simple WordPress plugin to create a slideshow using a shortcode.
 * Author:            Pooja Kakkad
 * Version:           1.0.0
 * Text Domain:       wp-image-slider
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Domain Path:       /languages
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package           wp-image-slider
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The code that runs during plugin activation. 
 */
function activate_wp_image_slider() {
	
}
register_activation_hook( __FILE__, 'activate_wp_image_slider' );

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_wp_image_slider() {
	
}
register_deactivation_hook( __FILE__, 'deactivate_wp_image_slider' );

require plugin_dir_path( __FILE__ ) . 'includes/class-wp-image-slider.php';

function run_wp_image_slider() {

    define( 'WPIS_VERSION', '1.0.0' );
    define( 'WPIS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    define( 'WPIS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    define( 'WPIS_PLUGIN_FILE', __FILE__ );
    define( 'WPIS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );  
    define( 'WPIS_PLUGIN_SLUG', 'wp-image-slider' );
    define( 'WPIS_PLUGIN_TEXT_DOMAIN', 'wp-image-slider' );
    define( 'WPIS_INCLUDES_PLUGIN_DIR', plugin_dir_path( __FILE__ )."includes" );
    define( 'WPIS_ASSETS_PLUGIN_DIR', plugin_dir_path( __FILE__ )."assets" );
    define( 'WPIS_ASSETS_PLUGIN_URL', plugin_dir_url( __FILE__ )."assets" );

    
	$plugin = new Wp_Image_Slider();
	$plugin->run();

}
run_wp_image_slider();
?>