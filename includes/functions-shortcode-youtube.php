<?php
/**
 * Shorcode for youtube videos
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
    // register shortcode
    add_shortcode( 'youtube', 'youtube_embed_shortcode' );

    function youtube_embed_shortcode( $atts ) {
        $arr = shortcode_atts( array(
            'video' => '',
        ), $atts );

        $before = '<iframe class="youtube-embed" width="560" height="315" src="https://www.youtube.com/embed/';
        $after = '" frameborder="0" allowfullscreen></iframe>';

        return $before . $arr['video'] . $after;
    }
?>
