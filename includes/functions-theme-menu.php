<?php
/**
 * Register theme menus
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
    // Enable navigation customization. One for left nav nad one for right.
    function register_my_menus() {
        register_nav_menus( array(
            'header-menu-left' => 'Header Left',
            'header-menu-mobile-left' => 'Header Mobile Left',
            'header-menu-right' => 'Header Right'
        ));
    }
    add_action( 'init', 'register_my_menus' );
?>
