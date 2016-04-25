<?php
/**
 * functions.php
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */

    ob_start();
    include_once( 'includes/functions-wp.php' );
    include_once( 'includes/functions-bp.php' );
    include_once( 'includes/functions-theme-menu.php' );
    include_once( 'includes/functions-theme-sidebar.php' );
    include_once( 'includes/functions-theme-comments.php' );
    include_once( 'includes/functions-theme-meta.php' );
    include_once( 'includes/functions-theme-additional-pages.php' );
    include_once( 'includes/functions-theme-view-counter.php' );
    include_once( 'includes/functions-theme-share-counter.php' );
    include_once( 'includes/functions-theme-login-page.php' );
    include_once( 'includes/functions-plugin-mourning.php' );
    include_once( 'includes/functions-plugin-socials.php' );
    include_once( 'includes/functions-shortcode-gallery.php' );
    include_once( 'includes/functions-shortcode-instagram.php' );
    include_once( 'includes/functions-shortcode-youtube.php' );
    // include_once( 'includes/functions-shortcode-googlemap.php' );
    include_once( 'includes/functions-widget-facebook.php' );
?>

<?php

    /**
     * This function renders cards in single post page
     *
     * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
     * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
     * @package		Zola Template
     * @since		1.0.0
     *
     * @param       $which_post
     */

    function renderAdjustedCard( $which_post ){
?>
    <div class="adjusted-excerpt-wrap">
        <div class="post-excerpt">
            <div class="post-excerpt-thumb">

                <?php
                    if( has_post_thumbnail() ) {
                        the_post_thumbnail( 'large' );
                    } else {
                        echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/bg/def_post.jpg" class="attachment-large size-large wp-post-image" alt="' . sanitize_text_field( get_the_title() ) . '" sizes="(max-width: 1024px) 100vw, 1024px" height="576" width="1024">';
                    }
                ?>

            </div><!-- .post-excerpt-thumb -->
            <div class="post-excerpt-text">
                <h2><?php the_title(); ?></h2>

                <?php
                    $arr = get_extended ( $which_post->post_content );
                ?>

                <p><?php echo $arr['main']; ?></p>
            </div><!-- .post-excerpt-text -->
            <hr>
            <div class="post-excerpt-author">

                <?php echo get_avatar( get_the_author_meta( "user_email" ), 60 ); ?>

                <div class="post-excerpt-author-date">
                    <p><?php the_time('d');?></p>
                    <p><?php the_time('M');?></p>
                </div><!-- .post-excerpt-author-date -->
                <div class="post-excerpt-author-tags">

                    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>

                </div><!-- .post-excerpt-author-tags -->
                <div class="post-excerpt-author-button">
                    <a href="<?php the_permalink(); ?>"><span><?php _e( 'Read more', 'zola' ) ?></span> &rsaquo;</a>
                </div><!-- .post-excerpt-author-button -->
            </div><!-- .post-excerpt-thumb -->
        </div><!-- .post-excerpt -->
    </div><!-- .post-excerpt-wrap -->

    <?php }
?>
