<?php
/**
 * Customizing comments section
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
    function comments_section( $comment, $args, $depth ) {

        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>

        <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>">

        <?php if ( 'div' != $args['style'] ) : ?>

        <div id="div-comment" class="comment-body">

            <?php endif; ?>

            <div class="comment-author">
                <div class="comment-section-profile">
					<div class="comment-section-profile-img-wrapper">

                        <?php
                            if ( $args['avatar_size'] != 0 )
                                printf( '<a href="%s" alt="%s">%s</a>', get_comment_author_url(), get_comment_author(), get_avatar( $comment, $args['avatar_size'] ) );
                        ?>

                    </div><!-- .comment-section-profile-img-wrapper -->
                    <div class="comment-section-profile-text-wrapper">
                        <h3><?php echo get_comment_author() ?></h3>
                    </div><!-- .comment-section-profile-text-wrapper -->
                </div><!-- .comment-section-profile -->
                <div class="comment-section-profile-text-wrapper float-right">
					<h3><?php printf( '%1$s, %2$s', get_comment_date('j M'),  get_comment_time() ); ?></h3>
				</div><!-- .comment-section-profile-text-wrapper.float-right -->
            </div><!-- .comment-author -->
            <div class="comment-text-contener">

                <?php
                    // Get comment content
                    comment_text();
                ?>

            </div><!-- .comment-text-contener -->
            <p class="form-submit">

                <?php
                    $reply_link_args = array(
                        'add_below' => $add_below,
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => __( 'Reply', 'zola' ),
		                'reply_to_text' => __( 'Reply to %s', 'zola' ),
                    );

                    comment_reply_link( $reply_link_args );
                ?>

            </p><!-- .form-submit -->

            <?php if ( 'div' != $args['style'] ) : ?>

        </div><!-- #div-comment.comment-body -->

        <?php endif; ?>
    <?php }
?>
