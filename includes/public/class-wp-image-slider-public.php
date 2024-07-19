<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// This class define all the functionality of public side of the plugin.
if ( ! class_exists( 'Wp_Image_Slider_Public' ) ) {    

	class Wp_Image_Slider_Public {

		public function __construct() {
			
		}
		
		/**
		 * Define all the Actions for front side of plugin
		 * 
		 * @since 1.0.0
		 * 
		 * @return void
		 */
		public function hooks() {

			// Front CSS and javascript
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_image_slider_enqueue_styles_scripts' ) );

			// Register the shortcode
			add_shortcode('myslideshow', array( $this, 'wp_image_slider_render_shortcode'));

		}

		/**
		 * Load frontend CSS and Javascript.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function wp_image_slider_enqueue_styles_scripts () {

			wp_enqueue_style('slick-css', WPIS_PLUGIN_URL.'lib/slick/slick.css');
			wp_enqueue_style('slick-theme-css', WPIS_PLUGIN_URL.'lib/slick/slick-theme.css');

			wp_enqueue_script('slick-js',  WPIS_PLUGIN_URL.'lib/slick/slick.min.js', array('jquery'), null, true);
			wp_enqueue_style( WPIS_PLUGIN_SLUG . '-frontend',  WPIS_ASSETS_PLUGIN_URL. '/css/frontend.css', array(), WPIS_VERSION );
			wp_enqueue_script( WPIS_PLUGIN_SLUG . '-frontend',  WPIS_ASSETS_PLUGIN_URL. '/js/frontend.js', array( 'jquery' ), WPIS_VERSION );
		}


		/**
		 * Shortcode handler
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  string	
		 */
		public function wp_image_slider_render_shortcode($atts) {
			// TODO: Implement wp_image_slider_render_shortcode() method.
			$atts = shortcode_atts(array(
				'height' => '400px',
				'width' => '100%'
			), $atts, 'banner_slider');
		
			ob_start();

			$images = get_option('wp_image_slider_images', []);
			if (empty($images)) {
				return __('<p>Please add images for this slider.</p>','wp_image_slider_images');
			}

			ob_start();
			?>
			<div class="wpis-slick-slider" style="width: <?php echo esc_attr($atts['width']); ?>; height: <?php echo esc_attr($atts['height']); ?>;">
				<?php foreach ($images as $image): ?>
					<div>
						<img src="<?php echo esc_url(trim($image)); ?>" style="width: <?php echo esc_attr($atts['width']); ?>; height: <?php echo esc_attr($atts['height']); ?>; object-fit: cover;" />
					</div>
				<?php endforeach; ?>
			</div>
			<?php
			return ob_get_clean();
		}
		
	}
} // End if class_exists check.
?>