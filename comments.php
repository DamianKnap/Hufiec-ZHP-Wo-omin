<?php
/**
 * Template for comments section
 *
 * This template renders comments, with add comment section (if user is logged in)
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<?php
	// Return if post with that comment section is password protected
	if ( post_password_required() ) {
		return;
	}
?>

<div id="comments" class="comments-area">

	<?php
		// Prepare vars for add comment form
		global $current_user;

		$user_name 		= $current_user->user_login;
		$user_avatar 	= get_avatar( get_current_user_id(), 60 );
		$post_title 	= get_the_title( $post->ID );

		$args =  array(
			'comment_field' =>
				'<textarea id="comment" name="comment" cols="10" rows="5" aria-required="true">' .
				'</textarea>',
			'must_log_in' =>
				'<div class="must-log-in">' .
					'<p>' . __( 'You must be logged in to post a comment.', 'zola' ) . '</p>' .
					'<div class="must-log-in-extras no-shadow">' .
						'<a href="' .  site_url( '/' . __( 'login', 'zola' ) ) . '">' .
							'<p>' . __( 'Log in', 'zola' ) . '</p>' .
						'</a>' .
						'<a href="' . wp_registration_url() . '">' .
							'<p>' . __( 'Register', 'zola' ) . '</p>' .
						'</a>' .
					'</div>' .
				'</div>',
			'logged_in_as' =>
				'<div class="comment-section-profile">' .
					'<div class="comment-section-profile-img-wrapper">' .
						$user_avatar .
					'</div>' .
					'<div class="comment-section-profile-text-wrapper">' .
						'<h3>' . $user_name . '</h3>' .
					'</div>' .
				'</div>' .
				'<div class="comment-section-profile-text-wrapper float-right">' .
					'<h3>' . __( 'Reply to', 'zola' ) . ' ' . $post_title . '</h3>' .
				'</div>',

			'title_reply' =>
				__( 'Comments', 'zola' ),
			'title_reply_to' =>
				 __( 'Comments', 'zola' ),
			'cancel_reply_link' =>
				' ',

			'class_submit' =>
				'submit comment-submit',
			'title_reply' =>
				__( 'Comments', 'zola' ),
			'label_submit' =>
			 	__( 'Post Comment', 'zola' ),
		);

		// Render comment form
		comment_form( $args, $post->ID );
	?>

	<?php if ( have_comments() ) : ?>

		<ul class="commentlist">

			<?php
				// Render all comments
				wp_list_comments( 'type=comment&callback=comments_section&avatar_size=60' );
			?>

		</ul><!-- .comment-list -->

		<div class="row">
			<div class="small-12 column">
				<div class="pagination-nav-wrap">
					<div class="pagination-nav">

						<?php

							paginate_comments_links( array(
								'prev_text' => '&lsaquo; ' . __( 'Prev', 'zola' ),
								'next_text' => __( 'Next', 'zola' ) . ' &rsaquo;' )
							);

						?>

					</div><!-- .pagination-nav -->
				</div><!-- .pagination-nav-wrap -->
			</div><!-- .small-12.column -->
		</div><!-- .row -->

	<?php endif; // have_comments() ?>

	<?php
		// Check if comment section is closed
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<!-- There should be a comment for closed comments -->

	<?php endif; // ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' )? ?>

</div><!-- #comments.comments-area -->
