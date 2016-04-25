<?php
/**
 * Custom login page
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

    // This hook allows you to check to see if the request url needs
    // To be redirected
    add_action( 'template_redirect', 'custom_login_redirect' );

    // This hook allows you to change the page title
    // BC normally WP will show 404 error title
    add_filter( 'wp_title', 'custom_login_title', 10, 3 );

    function custom_login_redirect() {
    	global $wp_query;

        $page_title                     = 'login';
        $page_title_trans               = __( 'login', 'zola' );

        if( preg_match( '/\/' . $page_title_trans . '(|\/)$/i', $_SERVER[ 'REQUEST_URI' ] ) ||
            preg_match( '/\/' . $page_title . '(|\/)$/i', $_SERVER[ 'REQUEST_URI' ] ) ) {

            // Make sure the server responds with 200 instead of error code 404
            if ( !headers_sent() ) {
                header( 'HTTP/1.1 200 OK' );
            }

    	    $path = locate_template( 'buddypress/members/login.php' );
    	    load_template( $path );

            // Kill off the request so server doesn't render the 404 message
            die();
    	}
    }

    function custom_login_title( $title, $sep, $seplocation ) {
        $page_title                 = 'login';
        $page_title_trans           = __( 'login', 'zola' );

        if( preg_match( '/\/' . $page_title_trans . '(|\/)$/i', $_SERVER[ 'REQUEST_URI' ] ) ||
            preg_match( '/\/' . $page_title . '(|\/)$/i', $_SERVER[ 'REQUEST_URI' ] ))
            $title = __( 'Log in', 'zola' ) . $sep;
            return $title;
    }

    // Changed wp_login_form
    // Stock wp_login_form function were redirecting to wp-login when user used
    // wrong credentials.
    function wp_custom_login_form( $args = array() ) {
    	$defaults = array(
    		'echo' => true,
    		// Default 'redirect' value takes the user back to the request URI.
    		'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
    		'form_id' => 'loginform',
    		'label_username' => __( 'Username' ),
    		'label_password' => __( 'Password' ),
    		'label_remember' => __( 'Remember Me' ),
    		'label_log_in' => __( 'Log In' ),
    		'id_username' => 'user_login',
    		'id_password' => 'user_pass',
    		'id_remember' => 'rememberme',
    		'id_submit' => 'wp-submit',
    		'remember' => true,
    		'value_username' => '',
    		// Set 'value_remember' to true to default the "Remember me" checkbox to checked.
    		'value_remember' => false,
    	);

    	/**
    	 * Filter the default login form output arguments.
    	 *
    	 * @since 3.0.0
    	 *
    	 * @see wp_login_form()
    	 *
    	 * @param array $defaults An array of default login form arguments.
    	 */
    	$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );

    	$form = '
    		<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( '/' . __( 'login', 'zola' ) ) ) . '" method="post">
    			<p class="login-username">
    				<label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
    				<input type="text" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input" value="' . esc_attr( $args['value_username'] ) . '" size="20" required/>
    			</p>
    			<p class="login-password">
    				<label for="' . esc_attr( $args['id_password'] ) . '">' . esc_html( $args['label_password'] ) . '</label>
    				<input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input" value="" size="20" required/>
    			</p>
                <div class="buddy-form-container-footer">
        			<p class="login-submit">
        				<input type="submit" name="wp-submit" class="submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button-primary" value="' . esc_attr( $args['label_log_in'] ) . '" />
        				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
                        <p><a href="">' . __( "Remind password", "zola" ) . '</a></p>
                        <p><a href="' . get_permalink( get_option( "additional_pages_privacy_page_id" ) ) . '">' . __( "Privacy policy", "zola" ) . '</a></p>
        			</p>
                </div>
    		</form>';

    	if ( $args['echo'] )
    		echo $form;
    	else
    		return $form;
    }
?>
