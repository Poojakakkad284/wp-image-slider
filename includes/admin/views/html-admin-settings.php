<div class="wrap wp-image-slider-settings">
    <h1><?php _e('WP Image Slider Settings', 'wp-image-slider'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('wp_image_slider_options');
        do_settings_sections('wp_image_slider_options');
        ?>
        <h2><?php _e('Slider Images', 'wp-image-slider'); ?></h2>
        <button id="add_image" class="btn wp-add-image"><?php _e('Add Images', 'wp-image-slider'); ?></button>
        <table class="form-table">
        <tr valign="top">
                <td>
                    <ul id="wp_image_slider_images">
                        <?php $images = get_option('wp_image_slider_images', []); ?>
                        <?php if (!empty($images)): ?>
                            <?php foreach ($images as $image): ?>
                                <li>
                                    <img src="<?php echo esc_url($image); ?>"/>
                                    <input type="hidden" name="wp_image_slider_images[]" value="<?php echo esc_url($image); ?>">
                                    <button class="remove-image">x</button>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    
                </td>
            </tr>
        </table>
        <p><?php _e('Add images to the slider by clicking the "Add Image" button below. You can also drag and drop images to reorder them.', 'wp-image-slider'); ?></p>
        <p><?php _e('Note: Only images with the following extensions are allowed: jpg, jpeg, png, gif', 'wp-image-slider'); ?></p> 
        <p><?php _e('<strong>[myslideshow width="" height=""]</strong> use this shortcode to display the slider in your posts/pages.', 'wp-image-slider'); ?></p> 
        
        <?php submit_button(); ?>
    </form>
</div>