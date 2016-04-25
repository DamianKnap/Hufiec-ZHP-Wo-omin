<?php
/**
 * Adding links to additional pages
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
    add_action( 'admin_menu', 'additional_pages' );

    function additional_pages() {

        add_options_page( __( 'Additional pages', 'zola' ), __( 'Additional pages', 'zola' ), 'administrator', 'additional-pages', 'additional_pages_page' );

        //call register settings function
        add_action( 'admin_init', 'additional_pages_settings' );

    }

    function additional_pages_settings() {
        //register our settings
        register_setting( 'additional-pages-settings-group', 'additional_pages_policy_page_id' );
        register_setting( 'additional-pages-settings-group', 'additional_pages_partners_page_id' );

    }

    function additional_pages_page() {

    ?>

    <div class="wrap">
        <h2><?php _e( 'Additional pages', 'zola' ) ?></h2>

        <form method="post" action="options.php">

            <?php settings_fields( 'additional-pages-settings-group' ); ?>
            <?php do_settings_sections( 'additional-pages-settings-group' ); ?>

            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for='additional_pages_policy_page_id'><?php _e( 'Policy page:', 'zola' ) ?></label>
                        </td>
                        <td>

                            <?php
                                // Check if option variable is set (it will not if it were never used before)
                                if ( empty( get_option( 'additional_pages_policy_page_id' ) ) ) :
                                    $selected_value = __( '- None -', 'zola' );
                                else:
                                    $selected_value = get_option( 'additional_pages_policy_page_id' );
                                endif;

                                // List all pages
                                echo wp_dropdown_pages( array(
                                    'name'              => 'additional_pages_policy_page_id',
                                    'selected'          => $selected_value,
                                    'echo'              => false,
                                    'show_option_none'  => __( '- None -', 'zola' )
                                ) );

                            ?>

                        </td>
                        <td>

                            <?php
                                // Add button to preview selected (and saved) page id
                                if ( !empty( get_option( 'additional_pages_policy_page_id' ) )
                                            || get_option( 'additional_pages_policy_page_id' ) == __( '- None -', 'zola' ) ) : ?>

                                <a href="<?php echo get_permalink( get_option( 'additional_pages_policy_page_id' ) ) ?>" class="button-secondary" target="_blank"><?php _e( 'View', 'zola' ); ?></a>

                            <?php endif; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='additional_pages_partners_page_id'><?php _e( 'Partners page:', 'zola' ) ?></label>
                        </td>
                        <td>

                            <?php
                                // Check if option variable is set (it will not if it were never used before)
                                if ( empty( get_option( 'additional_pages_partners_page_id' ) ) ) :
                                    $selected_value = __( '- None -', 'zola' );
                                else:
                                    $selected_value = get_option( 'additional_pages_partners_page_id' );
                                endif;

                                // List all pages
                                echo wp_dropdown_pages( array(
                                    'name'              => 'additional_pages_partners_page_id',
                                    'selected'          => $selected_value,
                                    'echo'              => false,
                                    'show_option_none'  => __( '- None -', 'zola' )
                                ) );

                            ?>

                        </td>
                        <td>

                            <?php
                                // Add button to preview selected (and saved) page id
                                if ( !empty( get_option( 'additional_pages_partners_page_id' ) )
                                            || get_option( 'additional_pages_partners_page_id' ) == __( '- None -', 'zola' ) ) : ?>

                                <a href="<?php echo get_permalink( get_option( 'additional_pages_partners_page_id' ) ) ?>" class="button-secondary" target="_blank"><?php _e( 'View', 'zola' ); ?></a>

                            <?php endif; ?>

                        </td>
                    </tr>
                </tbody>
            </table>


            <?php submit_button(); ?>

        </form>
    </div><!-- .wrap -->

    <?php }
?>
