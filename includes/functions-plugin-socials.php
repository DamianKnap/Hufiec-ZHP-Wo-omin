<?php
/**
 * Social links plugin
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
    // Social icons hrefs
    add_action( 'admin_menu', 'socials_links_plugin' );

    function socials_links_plugin() {

        add_options_page( 'Sociale', 'Sociale', 'administrator', 'social_links', 'socials_links_page' );

        //call register settings function
        add_action( 'admin_init', 'socials_links_settings' );

    }

    function socials_links_settings() {
        //register our settings
        register_setting( 'socials-links-settings-group', 'social_links_facebook' );
        register_setting( 'socials-links-settings-group', 'social_links_instagram' );
    }

    function socials_links_page() {

    ?>
    <div class="wrap">
        <h2>Sociale</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'socials-links-settings-group' ); ?>
            <?php do_settings_sections( 'socials-links-settings-group' ); ?>
            <p>Wstaw linki do social mediów. Nie zapomnij o 'https://www'. Powodzenia.</p>
                <div>
                <label>Facebook:</label>
                <input type="text" name="social_links_facebook" id="social_links_facebook" value="<?php echo get_option('social_links_facebook') ?>" />
            </div>
            <div>
                <label>Instagram:</label>
                <input type="text" name="social_links_instagram" id="social_links_instagram" value="<?php echo get_option('social_links_instagram') ?>" />
            </div>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php }
?>
