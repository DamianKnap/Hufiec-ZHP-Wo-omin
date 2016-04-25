<?php
/**
 * Custom meta data
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */
?>

<?php

    function add_exhibit_meta_box() {
        add_meta_box( 'exhibit-meta-box', __( 'Exhibit that event', 'zola' ), 'exhibit_meta_box', 'post', 'side', 'low', null );
    }

    function add_banner_meta_box() {
        add_meta_box( 'banner-meta-box', __( 'Event banner picture', 'zola' ), 'banner_meta_box', 'post', 'side', 'low', null );
    }

    function add_eventdate_meta_box() {
        add_meta_box( 'eventdate-meta-box', __( 'Event starting date', 'zola' ), 'eventdate_meta_box', 'post', 'side', 'low', null );
    }

    function exhibit_meta_box( $object ) {
        wp_nonce_field( basename(__FILE__), 'exhibit-meta-box-nonce' );

        ?>
            <div>
                <label for="exhibit-meta-box-checkbox"><?php _e( 'Exhibit', 'zola' ) ?></label>
                <?php
                    $checkbox_value = get_post_meta( $object->ID, 'exhibit-meta-box-checkbox', true ) ;

                    if( $checkbox_value == '' )
                    {
                        ?>
                            <input name="exhibit-meta-box-checkbox" type="checkbox" value="true">
                        <?php
                    }
                    else if( $checkbox_value == 'true' )
                    {
                        ?>
                            <input name="exhibit-meta-box-checkbox" type="checkbox" value="true" checked>
                        <?php
                    }
                ?>
            </div>
        <?php
    }

    function banner_meta_box() {
        global $post;
        wp_nonce_field( basename(__FILE__), 'banner-meta-box-nonce' );

        $baner_stored_meta = get_post_meta( $post->ID );

        ?>

            <script>
                jQuery(document).ready(function($){

                    // Instantiates the variable that holds the media library frame.
                    var meta_image_frame;

                    // Runs when the image button is clicked.
                    $('#meta-image-button').click(function(e){

                        // Prevents the default action from occuring.
                        e.preventDefault();

                        // If the frame already exists, re-open it.
                        if ( meta_image_frame ) {
                            meta_image_frame.open();
                            return;
                        }

                        // Sets up the media library frame
                        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                            title: meta_image.title,
                            button: { text:  meta_image.button },
                            library: { type: 'image' }
                        });

                        // Runs when an image is selected.
                        meta_image_frame.on('select', function(){

                            // Grabs the attachment selection and creates a JSON representation of the model.
                            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                            // Sends the attachment URL to our custom image input field.
                            $('#meta-image').val(media_attachment.url);
                        });

                        // Opens the media library frame.
                        meta_image_frame.open();
                    });
                });
            </script>

            <p>
                <label for="meta-image" class="prfx-row-title"><?php _e( 'Choose banner image', 'zola' )?></label>
                <input type="text" name="meta-image" id="meta-image" value="<?php if ( isset ( $baner_stored_meta['meta-image'] ) ) echo $baner_stored_meta['meta-image'][0]; ?>" />
                <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'zola' )?>" />
            </p>

        <?php
    }

    function eventdate_meta_box( $object ) {
        wp_nonce_field( basename(__FILE__), 'eventdate-meta-box-nonce' );

        // Retrieve current date for cookie
        $event_date = get_post_meta( $object->ID, 'event-date', true  );

        ?>

            <script>
                jQuery(document).ready(function(){
                    jQuery('#event-date-picker').datepicker({
                        dateFormat : 'dd.mm.yy'
                    });
                });
            </script>

            <p>
                <label for="event-date-picker" class="prfx-row-title"><?php _e( 'Choose starting date of this event', 'zola' )?></label>
                <input type="text" name="event-date" id="event-date-picker" value="<?php echo $event_date; ?>" /></td>
            </p>

        <?php
    }

    function banner_image_enqueue() {
        global $typenow;
        if( $typenow == 'post' ) {
            wp_enqueue_media();

            wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'meta-box-image.js', array( 'jquery' ) );
            wp_localize_script( 'meta-box-image', 'meta_image',
                array(
                    'title' => __( 'Choose or Upload an Image', 'zola' ),
                    'button' => __( 'Use this image', 'zola' ),
                )
            );
            wp_enqueue_script( 'meta-box-image' );
        }
    }

    function eventdate_enqueue() {
        // Enqueue Datepicker + jQuery UI CSS
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true );
    }

    function save_exhibit_meta_box( $post_id, $post, $update )
    {
        if ( !isset( $_POST[ 'exhibit-meta-box-nonce' ] ) || !wp_verify_nonce( $_POST[ 'exhibit-meta-box-nonce' ], basename( __FILE__ ) ) )
            return $post_id;

        if( !current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        $slug = 'post';
        if( $slug != $post->post_type )
            return $post_id;

        $meta_box_checkbox_value = '';

        if( isset( $_POST[ 'exhibit-meta-box-checkbox' ] ) )
        {
            $meta_box_checkbox_value = $_POST[ 'exhibit-meta-box-checkbox' ];
        }
        update_post_meta( $post_id, 'exhibit-meta-box-checkbox', $meta_box_checkbox_value );
    }

    function save_banner_meta_box( $post_id, $post, $update )
    {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'banner-meta-box-nonce' ] ) && wp_verify_nonce( $_POST[ 'banner-meta-box-nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }

        // Checks for input and saves if needed
        if( isset( $_POST[ 'meta-image' ] ) ) {
            update_post_meta( $post_id, 'meta-image', $_POST[ 'meta-image' ] );
        }
    }

    function save_eventdate_meta_box( $post_id, $post, $update )
    {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'eventdate-meta-box-nonce' ] ) && wp_verify_nonce( $_POST[ 'eventdate-meta-box-nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }

        // Checks for input and saves if needed
        if( isset( $_POST[ 'event-date' ] ) ) {
            update_post_meta( $post_id, 'event-date', $_POST[ 'event-date' ] );
        }
    }

    add_action( 'add_meta_boxes', 'add_exhibit_meta_box' );
    add_action( 'add_meta_boxes', 'add_banner_meta_box' );
    add_action( 'add_meta_boxes', 'add_eventdate_meta_box' );

    add_action( 'save_post', 'save_exhibit_meta_box', 10, 3 );
    add_action( 'save_post', 'save_banner_meta_box', 10, 3 );
    add_action( 'save_post', 'save_eventdate_meta_box', 10, 3 );

    add_action( 'admin_enqueue_scripts', 'banner_image_enqueue' );
    add_action( 'admin_enqueue_scripts', 'eventdate_enqueue' );

?>
