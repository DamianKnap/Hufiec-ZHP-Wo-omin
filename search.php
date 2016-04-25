<?php
/**
 * Template for search results page
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

	<div id="primary" class="content-area row">
		<main id="main" class="site-main small-12 medium-9 column" role="main">
			<header class="page-entry-header">
				<h1 class="page-entry-title">

					<?php echo __( 'Search results for', 'zola' ) . ' "' . esc_html( get_search_query( false ) ) . '"' ?>

				</h1><!-- .page-entry-title -->
			</header><!-- .page-entry-header -->

			<?php

				global $query_string;

				$query_args = explode( "&", $query_string );
				$search_query = array();

				if( strlen( $query_string ) > 0 ) {
					foreach( $query_args as $key => $string ) {
						$query_split = explode( "=", $string );
						$search_query[ $query_split[0] ] = urldecode( $query_split[1] );
					} // foreach
				} //if

				$search = new WP_Query( $search_query );

			    if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post();

			        get_template_part( 'content', 'card' );

			    endwhile;

			    	wp_reset_postdata();

			    else : ?>

			    	<h2><?php _e( 'Unfortunately there is no posts that meets such criteria.', 'zola' ); ?></h2>

		    <?php endif; ?>
			
		</main><!-- #main.site-main.large-9 -->
	</div><!-- #primary.content-area.row-->

<?php get_footer(); ?>
