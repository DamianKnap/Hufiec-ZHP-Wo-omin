<?php
/**
 * Template for 404 error page
 *
 * This template renders 404 error message
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<?php get_header(); ?>

<div class="row content-area">
    <div class="small-12 column">
        <h1><?php _e( 'Oops!', 'zola' ) ?></h1>
        <h2><?php _e( 'Page you are looking for do not exist.', 'zola' ) ?></h2>
    </div><!-- .small-12.column -->
</div><!-- .row.content-area -->

<?php get_footer(); ?>
