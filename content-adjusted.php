<?php
/**
 * Template for a category page
 *
 * This template renders excerpts from single category, pagination and sidebar
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<?php
    $prev_post = get_previous_post( true, '' );
    $next_post = get_next_post( true, '' );

    if ( !empty( $prev_post ) || !empty( $next_post ) ):
?>

    <div class="content-area row">
        <h3 class="reply-title"><?php _e( 'More in this category', 'zola' ) ?></h3>
        <div class="small-12 medium-9 column end">

            <?php
                if ( !empty( $prev_post ) ){
                    $post = $prev_post;
                    renderAdjustedCard( $post );
                };
            ?>

            <?php
                if ( !empty( $next_post ) ){
                    $post = $next_post;
                    renderAdjustedCard( $post );
                };
            ?>

        </div><!-- .small-12.collumn -->
    </div><!-- .content-area.row -->

<?php endif; ?><!-- !empty( $prev_post ) || !empty( $next_post ) -->
