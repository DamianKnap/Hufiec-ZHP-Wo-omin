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

<?php get_header(); ?>

<div id="primary" class="content-area row">

	<?php
		// Get custom taxonomy for category
		get_template_part( 'tax', 'category' );
	?>

	<main id="main" class="site-main small-12 medium-8 large-9 column" role="main">
		<div class="content-area row">
			<?php
				// Query post from current category (taken from url slug)
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$query = new WP_Query( 'cat=' . $cat .'&paged=' . $paged );

				// This var is needed to check if post is odd or even to put them in proper collumns
				$counter_even = 0;
				$counter_odd = 0;

			?>

			<div class="cards-area small-12 medium-6 column">

				<?php
					// Start the loop
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $counter_odd++;

						if( $counter_odd % 2 != 0 ) {
							// Get and render posts excertps
							get_template_part( 'content', 'card' );
						}

					endwhile;

				?>

			</div><!-- .cards-area.small-12.medium-6-->
			<div class="cards-area small-12 medium-6 column">

				<?php
					// Start the loop
					while ( $query->have_posts() ) : $query->the_post(); $counter_even++;

						if( $counter_even % 2 == 0 ) {
							// Get and render posts excertps
							get_template_part( 'content', 'card' );
						}

					endwhile;

				?>

			</div><!-- .cards-area.small-12.medium-6-->
		</div><!-- .content-area.row -->

		<div class="row">
			<div class="small-12 column">
				<div class="pagination-nav-wrap">
					<div class="pagination-nav">

						<?php
							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'	=> '?paged=%#%',
								'current'	=> max( 1, get_query_var('paged') ),
								'total'		=> $query->max_num_pages,
								'type'		=> 'plain',
								// Next and Prev got reversed names BC of floating
								'prev_text'	=> '&lsaquo; ' . __( 'Next', 'zola' ),
								'next_text'	=> __( 'Prev', 'zola' ) . ' &rsaquo;'
							) );
						?>

					</div><!-- .pagination-nav -->
				</div><!-- .pagination-nav-wrap -->
			</div><!-- .small-12.column -->
		</div><!-- .row -->

		<?php

			wp_reset_postdata();

			else :

		?>

			<p><?php esc_html_e( 'Unfortunately there is no posts that meets such criteria.', 'zola' ) ?></p>

		<?php endif; ?>

    </main><!-- #main.site-main.small-12.medium-8.large-9.column -->

	<?php
		// If sidebar were activated in WP backend
		if( is_active_sidebar( 'sidebar-category' ) ) :
	?>

	    <div id="sidebar" class="hide-for-small-only medium-4 large-3 column">
			<div class="sidebar-wrap">
	            <ul>

	            	<?php
						// Get sidebar for category page
						dynamic_sidebar('sidebar-category');
					?>

	            </ul>
			</div><!-- .sidebar-wrap -->
	    </div><!-- #sidebar.hide-for-small-only.medium-4.large-3.column-->

    <?php else: ?><!-- is_active_sidebar( 'sidebar-category' ) -->

		<div id="sidebar" class="hide-for-small-only medium-4 large-3 column"></div>

	<?php endif; ?><!-- is_active_sidebar( 'sidebar-category' ) -->

</div><!-- #primary.content-area.row -->

<?php get_footer(); ?>
