<?php
/**
 * Template for a post content
 *
 * This template renders post content
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
			if( has_post_thumbnail() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/bg/def_post.jpg" class="attachment-large size-large wp-post-image" alt="' . sanitize_text_field( get_the_title() ) . '" sizes="(max-width: 1024px) 100vw, 1024px" height="576" width="1024">';
			}
		?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="post-excerpt no-shadow">
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
				<div class="post-excerpt-author-stats">
					<table>
						<tr>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/views.png" alt="<?php _e( 'Views', 'zola' ) ?>">
							</td>
							<td>
								<p><?php echo getPostViews( $post->ID ); ?></p>
							</td>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/comments.png" alt="<?php _e( 'Comments', 'zola' ) ?>">
							</td>
							<td>
								<p><?php comments_number( '0', '1', '%' ); ?></p>
							</td>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/facebook_dark.png" alt="<?php _e( 'Facebook', 'zola' ) ?>">
							</td>
							<td>
								<p><?php echo getPostShares( $post->ID ); ?></p>
							</td>
						</tr>
					</table>
				</div><!-- .post-excerpt-author-stats -->
	        </div><!-- .post-excerpt-author -->
			<hr>
		</div><!-- .post-excerpt.no-shadow -->

		<?php
			// Redner whole post content
			the_content();
		?>

		<div class="share-fb-button">
			<a href="javascript:fbshareCurrentPage()" target="_blank" alt="<?php _e( 'Share', 'zola' ); ?>">
				<table>
					<tr>
						<td>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/facebook.png" alt="Facebook">
						</td>
						<td>
							<p><?php _e( 'Share', 'zola' ); ?></p>
						</td>
					</tr>
				</table>
			</a>
		</div>

		<div class="post-excerpt no-shadow">
			<hr>
			<div class="post-excerpt-author">

	            <?php echo get_avatar( get_the_author_meta( "user_email" ), 60 ); ?>

	            <div class="post-excerpt-author-date">
	                <p><?php the_time('d');?></p>
	    			<p><?php the_time('M');?></p>
	            </div>
	            <div class="post-excerpt-author-tags">

	                <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>

	            </div><!-- .post-excerpt-author-tags -->
				<div class="post-excerpt-author-stats">
					<table>
						<tr>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/views.png" alt="<?php _e( 'Views', 'zola' ) ?>">
							</td>
							<td>
								<p><?php echo getPostViews( $post->ID ); ?></p>
							</td>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/comments.png" alt="<?php _e( 'Comments', 'zola' ) ?>">
							</td>
							<td>
								<p><?php comments_number( '0', '1', '%' ); ?></p>
							</td>
							<td>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/facebook_dark.png" alt="<?php _e( 'Facebook', 'zola' ) ?>">
							</td>
							<td>
								<p><?php echo getPostShares( $post->ID ); ?></p>
							</td>
						</tr>
					</table>
				</div><!-- .post-excerpt-author-stats -->
	        </div><!-- .post-excerpt-author -->
			<hr>
		</div><!-- .post-excerpt.no-shadow -->
	</div><!-- .entry-content -->

</article><!-- #post-## -->
