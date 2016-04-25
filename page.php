<?php
/**
 * Template for a static text page
 *
 * This template static text page (non post page it is)
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
		<main id="main" class="site-main large-9 column" role="main">
            <header class="page-entry-header">

        		<?php
					// Get page title
					the_title( '<h1 class="page-entry-title">', '</h1>' );
				?>

        	</header><!-- .page-entry-header -->

        	<div class="page-entry-content">

                <?php
            		// Start the loop.
            		while ( have_posts() ) : the_post();

            			// Include the page content template.
            			the_content();

            		// End the loop.
            		endwhile;
        		?>

            </div><!-- .page-entry-content -->
		</main><!-- #main.site-main.large-9 -->
    </div><!-- #primary.content-area.row-->

<?php get_footer(); ?>
