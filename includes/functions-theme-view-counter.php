<?php
/**
 * To count and get post views
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */

    function getPostViews( $postID ) {
        $count_key = 'post_views_count';
        $count = get_post_meta( $postID, $count_key, true );
        if( $count=='' ) {
            delete_post_meta( $postID, $count_key );
            add_post_meta( $postID, $count_key, '0' );
            return '0';
        }
        return $count;
    }

    function setPostViews( $postID ) {
        $count_key = 'post_views_count';
        $count = get_post_meta( $postID, $count_key, true );

        if( $count=='' ) {
            $count = 0;
            delete_post_meta( $postID, $count_key );
            add_post_meta( $postID, $count_key, '0' );
        } else {
            $count++;
            update_post_meta( $postID, $count_key, $count );
        }
    }

    // Remove issues with prefetching adding extra views
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

?>
