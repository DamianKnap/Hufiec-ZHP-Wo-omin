<?php
/**
 * Shorcode for google maps
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
    add_shortcode( 'googlemap', 'googlemap_embed_shortcode' );

    function googlemap_embed_shortcode( $atts ) {
        $arr = shortcode_atts( array(
            'map' => '',
        ), $atts );

        $before = '<iframe src="https://www.google.com/maps/embed';
        $after = '" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';

        return $before . $arr['map'] . $after;
    }
?>
