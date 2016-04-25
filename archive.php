<?php
/**
 * Template for a archive page
 *
 * This template renders archives and sidebar
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
        <main id="main" class="site-main large-9 column" role="main">
            <header class="page-entry-header">
    		          <h1 class="page-entry-title"><?php _e( 'Archives', 'zola' ) ?></h1>
            </header><!-- .page-entry-header -->

    		<h2>Archives by Month:</h2>
    		<ul>
    			<?php wp_get_archives('type=alpha'); ?>
    		</ul>

    	</main><!-- #main.site-main.large-9.column -->

        <div class="hide-for-small-only medium-4 large-3 column">

            <?php if( is_active_sidebar( 'sidebar-archive' ) ) : ?>

                <div id="sidebar">
                    <div class="sidebar-wrap">
                        <ul>
                            <?php
                                // Get sidebar template.
                                dynamic_sidebar( 'sidebar-archive' );
                            ?>
                        </ul>
                    </div>
                </div>

            <?php endif; ?>

        </div><!-- .hide-for-small-only.medium-4.large-3.column -->
    </div><!-- #primary.content-area.row -->


<?php get_footer(); ?>
