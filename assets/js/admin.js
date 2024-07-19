jQuery(document).ready(function ($) {
    var frame;

    $('#add_image').on('click', function (e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select or Upload Images',
            button: {
                text: 'Use this image'
            },
            multiple: true
        });

        frame.on('select', function () {
            var attachments = frame.state().get('selection').toJSON();
            attachments.forEach(function (attachment) {
                $('#wp_image_slider_images').append('<li><img src="' + attachment.url + '" /><input type="hidden" name="wp_image_slider_images[]" value="' + attachment.url + '"><button class="remove-image">x</button></li>');
            });
        });

        frame.open();
    });

    $('#wp_image_slider_images').on('click', '.remove-image', function (e) {
        e.preventDefault();
        $(this).closest('li').remove();
    });

    $('#wp_image_slider_images').sortable();
});