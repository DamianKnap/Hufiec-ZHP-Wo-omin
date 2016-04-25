<?php
/**
 * Template for custom login Page
 *
 * IT'S NOT A PART OF BUDDYPRESS!
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */

    // If user is already logged in then redirect him/her to home url
    if( is_user_logged_in() ){
        wp_redirect( home_url() );
        exit;
    }

 	$_GLOBALS[ 'signon_failed' ] = false;

	if( isset( $_POST[ 'log' ] ) && isset( $_POST['pwd'] ) ){
		$creds = array();
		$creds[ 'user_login' ] = $_POST[ 'log' ];
		$creds[ 'user_password' ] = $_POST[ 'pwd' ];
		$creds[ 'remember' ] = true;
		$user = wp_signon( $creds, true );

		if ( !is_wp_error( $user ) ) {
			wp_redirect( home_url() );
			exit;
		} else {
			$_GLOBALS[ 'signon_failed' ] = true;
		}
	}
?>

<?php get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main small-12 medium-offset-3 medium-6 large-offset-4 large-4 column" role="main">
				<div id="buddy">
                    <div class="buddy-form-container">
                        <h2><?php _e( 'Login', 'zola' ); ?></h2>
                        <div class="buddy-form-container-header">
                            <img alt="Login header" title="Login header" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/bg/login_form.jpg" />
                            <div class="buddy-form-container-header-cover">
                                <img alt="Login header" title="Login header" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/bg/login_form.jpg" />
                            </div>
                        </div>

    					<?php
    						if( $_GLOBALS[ 'signon_failed' ] ) :
    					?>

                        <div class="buddy-form-container-error">
    						<p><?php _e( 'These credentials are wrong. Sign on failed.', 'zola' ); ?></p>
                        </div>

    					<?php
    						endif;

    						$args = array(
    							'redirect' => site_url( '/' )
    						);

    						wp_custom_login_form( $args );
    					?>

                    </div>
				</div><!-- #buddy -->
            </div><!-- .page-entry-content -->
		</main><!-- #main.site-main.large-9 -->
    </div><!-- #primary.content-area.row-->

<?php get_footer(); ?>
