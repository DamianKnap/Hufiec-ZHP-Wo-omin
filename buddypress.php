<?php
/**
 * Template for buddypress pages.
 *
 * It's basically same as page.php page but without the_title() function.
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
		<main id="main" class="site-main small-12 column" role="main">
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
