<?php
/**
 * Template for a single post page taxonomy
 *
 * This template is for single post page taxonomy
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
    $cat_name = get_the_category( $post );
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
                    <a href='<?php echo esc_url( get_home_url() . "/category/" . $cat_name[0]->slug ); ?>'><?php echo esc_html( $cat_name[0]->name ); ?></a>
                </li>
            </ul>
            <ul>
                <li>&rsaquo;</li>
                <li>
                    <a href="<?php echo get_permalink( $post ); ?>"><?php echo get_the_title( $post ); ?></a>
                </li>
            </ul>
        </div><!-- .taxonomy-nav -->
    </div><!-- .small-12.column -->
</div><!-- .content-area.row -->
