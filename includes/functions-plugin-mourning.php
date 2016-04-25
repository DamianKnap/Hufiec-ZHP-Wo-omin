<?php
/**
 * Mourning plugin
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
    // Mourning plugin
    add_action( 'admin_menu', 'mourning_plugin' );

    function mourning_plugin() {

        add_options_page( 'Żałoba', 'Żałoba', 'administrator', 'zaloba', 'mourning_plugin_page' );

        //call register settings function
        add_action( 'admin_init', 'mourning_plugin_settings' );

    }

    function mourning_plugin_settings() {
        //register our settings
        register_setting( 'mourning-plugin-settings-group', 'is_mourning' );

    }

    function mourning_plugin_page() {

    ?>
    <div class="wrap">
    <h2>Żałoba</h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'mourning-plugin-settings-group' ); ?>
        <?php do_settings_sections( 'mourning-plugin-settings-group' ); ?>
        <p>W przypadku żałoby narodowej zaznacz checkbox poniżej (powinien pojawić się 'ptaszek', który świadczy o zaznaczeniu checkboksa) i kliknij w przycisk 'Zapisz zmiany'. Gdy żałoba się skończy kliknij w checkbox poniżej ('ptaszek' powinien zniknąć) i kliknij przycisk 'Zapisz zmiany'.</p>
        <input type="checkbox" name="is_mourning" id="is_mourning" value="1" <?php checked( get_option('is_mourning'), 1 ); ?> />

        <?php submit_button(); ?>
    </form>
    </div>

    <?php }
?>
