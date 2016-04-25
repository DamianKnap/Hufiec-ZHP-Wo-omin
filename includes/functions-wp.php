<?php
/**
 * WP settings
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
    // Set text-domain for translations
    load_theme_textdomain( 'zola', get_template_directory() . '/languages' );

    // Enable thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails

    // Disable the theme / plugin text editor in Admin
    define( 'DISALLOW_FILE_EDIT', true );

    // Custom CSS for the login page
    // Create wp-login.css in your theme folder
    function wpfme_loginCSS() {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo( 'template_directory' ) . '/wp-login.css"/>';
    }
    add_action( 'login_head', 'wpfme_loginCSS' );
?>
