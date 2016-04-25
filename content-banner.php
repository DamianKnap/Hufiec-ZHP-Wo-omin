<?php
/**
 * Template for a banner on index page
 *
 * This template renders title, image, start date and link to event post
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<div class="event-banner-wrap">
    <div class="event-banner-image">

        <?php
            global $post;

            if( get_post_meta( $post->ID, 'meta-image', true ) != '' ) {
                echo '<img src="' . esc_url( get_post_meta( $post->ID, 'meta-image', true ) ) . '" class="attachment-large size-large wp-post-image no-shadow" alt="' . sanitize_text_field( get_the_title() ) . '" sizes="(max-width: 1024px) 100vw, 1024px" height="576" width="1024">';
            } else {
                echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/bg/def_post.jpg" class="attachment-large size-large wp-post-image no-shadow" alt="' . sanitize_text_field( get_the_title() ) . '" sizes="(max-width: 1024px) 100vw, 1024px" height="576" width="1024">';
            }
        ?>

    </div><!-- .event-banner-image -->
    <div class="event-banner-title">
        <h2><span><?php the_title(); ?></span></h2>
    </div><!-- .event-banner-title -->
    <div class="event-banner-date">
        <p><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_post_meta( $post->ID, 'event-date', true ) ) ); ?></p>
    </div><!-- .event-banner-date -->
    <div class="event-banner-button">
        <a href="<?php the_permalink(); ?>"><span><?php _e( 'Read more', 'zola' ) ?></span> &rsaquo;</a>
    </div><!-- .event-banner-button -->
    <div class="event-banner-whitespace-wrap">
        <div class="event-banner-whitespace"></div>
    </div><!-- .event-banner-whitespace-wrap -->
</div><!-- .event-banner-wrap -->
