<?php
/**
 * Template for a category page taxonomy
 *
 * This template is for category page taxonomy
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */
?>

<div class="content-area row">
    <div class="small-12 column">
        <div class="taxonomy-nav">
            <a href="<?php echo get_home_url(); ?>" alt="<?php _e( 'Homepage', 'zola' ) ?>">
                <div class="tax-house"></div>
            </a>
            <ul>
                <li>&rsaquo;</li>
                <li>
                    <a href="<?php echo get_category_link( $cat ); ?>"><?php echo single_cat_title( "", false ); ?></a>
                </li>
            </ul>
        </div><!-- .taxonomy-nav -->
    </div><!-- .small-12.column -->
</div><!-- .content-area.row -->
