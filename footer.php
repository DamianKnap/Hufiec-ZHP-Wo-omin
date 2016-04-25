<?php
/**
 * Template for a footer
 *
 * This template is included to every page template
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

    <div class="tiny-line"></div>

    <div class="footer-page-map">
        <div class="row">
            <div class="large-3 column">

                <?php
                    wp_nav_menu( array( 'theme_location' => 'header-menu-left', 'menu_class' => 'footer-menu' ) );
                ?>

            </div><!-- .large-3.column -->
            <div class="large-3 end column">

                <?php
                    wp_nav_menu( array( 'theme_location' => 'header-menu-right', 'menu_class' => 'footer-menu' ) );
                ?>

            </div><!-- .large-3.end.column -->
        </div><!-- .row -->
    </div><!-- .footer-page-map -->
    <div class="footer-logo-slider">
        <div class="row text-center">
            <a href="https://bip.zhp.pl" target="_blank"><img class="logo-in-footer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/bip.png" alt="Logotyp Bip"/></a>
            <a href="http://www.stoleczna.zhp.pl" target="_blank"><img class="logo-in-footer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/choragiewwwa.png" alt="Logotyp Chorągwi Stołecznej" /></a>
            <a href="http://www.wagggs.org" target="_blank"><img class="logo-in-footer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/wagggs.png" alt="Logotyp Wagggs" /></a>
            <a href="https://www.scout.org" target="_blank"><img class="logo-in-footer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/wosm.png" alt="Logotyp WOSM" /></a>
            <a href="https://zhp.pl" target="_blank"><img class="logo-in-footer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/zhp.png" alt="Logotyp ZHP" /></a>
        </div><!-- .row.text-center -->
    </div><!-- .footer-logo-slider -->
    <div class="tiny-line"></div>

</body>
</html>
