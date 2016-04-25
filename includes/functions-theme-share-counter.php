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

    function getPostShares( $postID ) {
        $count_key = 'post_shares_count';
        $count = get_post_meta( $postID, $count_key, true );
        if( $count == '' ) {
            delete_post_meta( $postID, $count_key );
            add_post_meta( $postID, $count_key, '0' );
            return '0';
        }
        return $count;
    }

    function setPostShares( $postID, $postURL ) {
        $json_file = file_get_contents( esc_url( 'https://graph.facebook.com/?id=' . $postURL ) );

        $json_file = json_decode( $json_file );

        $count_key = 'post_shares_count';
        $count = get_post_meta( $postID, $count_key, true );

        if( $count == '' ) {
            $count = 0;
            delete_post_meta( $postID, $count_key );
            add_post_meta( $postID, $count_key, '0' );
        } else {
            if( isset( $json_file->shares ) ) {
                update_post_meta( $postID, $count_key, $json_file->shares );
            }
        }
    }

?>
