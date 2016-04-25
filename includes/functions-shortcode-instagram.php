<?php
/**
 * Shorcode for instagram
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
// fix SSL request error
    add_action( 'http_request_args', 'no_ssl_http_request_args', 10, 2 );
    function no_ssl_http_request_args( $args, $url ) {
        $args['sslverify'] = false;
        return $args;
    }

    // register shortcode
    add_shortcode( 'instagradam', 'instagradam_embed_shortcode' );

    // define shortcode
    function instagradam_embed_shortcode( $atts, $content = null ) {
        // define main output
        $str    = "";
        // get remote data
        $result = wp_remote_get( "https://api.instagram.com/v1/users/3051725772/media/recent?access_token=3051725772.1654d0c.1cd02393d41d4fb8acea0245dbbd2408" );

        if ( is_wp_error( $result ) ) {
            // error handling
            $error_message = $result->get_error_message();
            $str           = "Something went wrong: $error_message";
        } else {
            // processing further
            $result    = json_decode( $result['body'] );
            $main_data = array();
            $n         = 0;

            // get username and actual thumbnail
            foreach ( $result->data as $d ) {

                $main_data[ $n ]['user']      = $d->user->username;
                $main_data[ $n ]['thumbnail'] = $d->images->standard_resolution->url;
                $n++;
            }

            // create main string, pictures embedded in links
            foreach ( $main_data as $data ) {
                $str .= '<a target="_blank" href="http://instagram.com/'.$data['user'].'"><img class="instagram-pictures" src="'.$data['thumbnail'].'" alt="'.$data['user'].' pictures"></a> ';
            }
        }

        return $str;
    }
?>

<?php

    // register shortcode
    add_shortcode( 'instagradambg', 'instagradambg_embed_shortcode' );

    // define shortcode
    function instagradambg_embed_shortcode( $atts, $content = null ) {
        // define main output
        $str    = "";
        // get remote data
        $result = wp_remote_get( "https://api.instagram.com/v1/users/3051725772/media/recent?access_token=3051725772.1654d0c.1cd02393d41d4fb8acea0245dbbd2408" );

        if ( is_wp_error( $result ) ) {
            // error handling
            $error_message = $result->get_error_message();
            $str           = "Something went wrong: $error_message";
        } else {
            // processing further
            $result    = json_decode( $result['body'] );
            $main_data = array();
            $n         = 0;
            // get actual thumbnail\

            foreach ( $result->data as $d ) if ($n < 18) {
                $main_data[ $n ]['thumbnail'] = $d->images->standard_resolution->url;
                $n++;
            }

            // create main string, pictures embedded in links
            foreach ( $main_data as $data ) {
                $str .='<div class="contener-for-bg-instagram-picture"><img class="bg-picture-social-media" src="'.$data['thumbnail'].'"></div>';
            }
        }

        return $str;
    }
?>
