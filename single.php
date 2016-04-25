<?php
/**
 * Template for a single post page
 *
 * This template renders whole single post with taxonomy, sidebar and comments section
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */
?>

<?php get_header(); ?>

<?php
	global $post;
	setPostViews( $post->ID );
	setPostShares( $post->ID, get_permalink() );
?>

<?php
	// Get custom taxonomy.
	get_template_part( 'tax', 'single' );
?>

<div id="primary" class="content-area row">

	<main id="main" class="site-main small-12 medium-8 large-9 column" role="main">

		<?php
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'post' );

			endwhile;

		?>

	</main><!-- #main.site-main.small-12.medium-8.large-9.column -->

	<div class="hide-for-small-only medium-4 large-3 column">

		<?php if( is_active_sidebar( 'sidebar-post' ) ) : ?>

			<div id="sidebar">
				<div class="sidebar-wrap">
					<ul>

						<?php
							// Get sidebar template.
							dynamic_sidebar( 'sidebar-post' );
						?>

					</ul>
				</div>
			</div>

		<?php endif; ?>

	</div><!-- .hide-for-small-only.medium-4.large-3.column -->
</div><!-- #primary.content-area.row -->

<?php
	// Render prev and next post cards if there are any
	get_template_part( 'content', 'adjusted' );
?>

<div class="coments-contener content-area row">
	<div class="small-12 large-9 column">

		<?php
			while ( have_posts() ) : the_post();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
		?>

	</div><!-- .small-12.large-9.column -->
</div><!-- .coments-contener.content-area.row -->

<?php get_footer(); ?>
