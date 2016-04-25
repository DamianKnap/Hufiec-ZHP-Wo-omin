<?php
/**
 * Register sidebars
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
    // Register Sidebars
    function sidebar_post() {

        $args = array(
            'id'            => 'sidebar-post',
            'name'          => 'Post Sidebar',
            'description'   => 'Sidebar for a single post.',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        );
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'sidebar_post' );

    function sidebar_category() {

        $args = array(
            'id'            => 'sidebar-category',
            'name'          => 'Category Sidebar',
            'description'   => 'Sidebar for a category page.',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        );
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'sidebar_category' );

    function sidebar_archive() {

        $args = array(
            'id'            => 'sidebar-archive',
            'name'          => 'Archive Sidebar',
            'description'   => 'Sidebar for a archive page.',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        );
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'sidebar_archive' );
?>
