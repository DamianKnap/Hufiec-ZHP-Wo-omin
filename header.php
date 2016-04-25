<?php
/**
 * Template for a header
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

<?php
	// Cookies hendling and message (if needed)
	$cookie_name = "cookie_message";

	if( isset( $_COOKIE[ $cookie_name ] ) && $_COOKIE[ $cookie_name ] == 'true' ) :
		$GLOBALS[ 'show_cookie_message' ] = true;
	elseif( isset( $_COOKIE[ $cookie_name ] ) && $_COOKIE[ $cookie_name ] == 'false' ) :
		$GLOBALS[ 'show_cookie_message' ] = false;
	endif;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php
		$blog_name = get_bloginfo( 'name' );
		$sep = ' &rsaquo; ';
		if( is_home() || is_front_page() ) {
			$page_title = __( 'Welcome', 'zola' );
		} else {
			$page_title = wp_title( '', false, 'right' );
		}
	?>

	<title><?php echo $blog_name . $sep . $page_title; ?></title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php echo bloginfo( 'description' ) ?>">

	<?php
		global $post;

		// Check if this is a single post page, if so - set open graph meta data (mainly for facebook)
		if( isset( $post ) ) : if( is_single( $post->ID ) ) :
		?>

			<meta name="author" content="<?php echo the_author_meta( 'display_name', get_post_field( 'post_author', $post->ID) ) ?>">

		<?php
		endif; // is_single()
		endif; // isset( $post )
	?>


	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/main.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/fancybox.min.js"></script>

	<?php
		if( is_home() || is_front_page() ) :
	?>

		<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/owl.carousel.min.js"></script>

	<?php endif; // is_home() || is_front_page() ?>

	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ajax/core.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/app.js"></script>

	<?php
		global $post;

		// Check if this is a single post page, if so - set open graph meta data (mainly for facebook)
		if( isset( $post ) ) : if( is_single( $post->ID ) ) :

			$excerpt_arr = get_extended ( $post->post_content );

			if( has_post_thumbnail() ) {
				$thumb_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			} else {
				$thumb_image = esc_url( get_template_directory_uri() ) . '/assets/bg/def_post.jpg';
			}
	?>

			<meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:title" content="<?php echo the_title( '', '' ) ?>" />
			<meta property="og:description" content="<?php echo esc_attr( $excerpt_arr[ 'main' ] ) ?>" />
			<meta property="og:image" content="<?php echo $thumb_image ?>" />

	<?php
		endif; // is_single()
		endif; // isset( $post )
	?>

	<?php
		//wp_head();
		//wp_title();
	?>

	<!-- <script type="text/javascript">
	    window.smartlook||(function(d) {
	    var o=smartlook=function(){ o.api.push(arguments)},s=d.getElementsByTagName('script')[0];
	    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
	    c.charset='utf-8';c.src='//rec.getsmartlook.com/bundle.js';s.parentNode.insertBefore(c,s);
	    })(document);
	    smartlook('init', '6aa54f9f70694d4c4e16a2da65bf3a5985385434');
	</script> -->
</head>

<body>
	<!-- iframe for cookies handling -->
	<iframe class="cookie-message-frame" srcdoc="<?php
		$cookie_name = "cookie_message";

	    if( !isset( $_COOKIE[ $cookie_name ] ) ) :
	        setcookie( $cookie_name, 'true', time() + ( 86400 * 30 ), '/' );
	        $GLOBALS[ 'show_cookie_message' ] = true;
	    endif;
	?>"></iframe>

	<?php
		// Check if we shoulda show cookie message
		if( isset( $GLOBALS[ 'show_cookie_message' ] ) && $GLOBALS[ 'show_cookie_message' ] ) :
	?>

		<div class="cookie-message-container">
			<div class="tiny-line"></div>
			<div class="row content-area">
				<div class="small-12 column">
					<table>
						<tbody>
							<tr>
								<th>
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/icons/pictograms/cookie.png' ?>" alt="<?php _e( 'Cookie message', 'zola' ) ?>" title="<?php _e( 'Cookie message', 'zola' ) ?>">
								</th>
								<th>
									<p><?php _e( 'This page is leaving cookies. For more info visit our', 'zola' ) ?>&nbsp;<a href="<?php echo get_permalink( get_option( 'additional_pages_privacy_page_id' ) ) ?>"><?php _e( 'privacy policy', 'zola' ) ?></a>&nbsp;<?php _e( 'page.', 'zola' ) ?></p>
								</th>
								<th>
									<form id="disable_cookies_message" action="<?php echo get_template_directory_uri() . '/scripts/ajax/disable_cookies_message.php' ?>">
										<input id="submit" type="submit" name="disable_cookies_message" class="submit" value="<?php esc_attr_e( 'OK', 'zola' ); ?>" />
									</form>
								</th>
							</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<div class="tiny-line"></div>
	<div class="header-picture">

		<?php
			// Checks if mourning is on (is_mourning option stores bool var user can set in WP backend settings page)
			if( get_option('is_mourning') ){

				echo '<div class="mourning"></div>';
			}
		?>

		<div class="header-extras-wrap">
			<div class="header-extras row">
				<div class="small-9 medium-5 column">
					<div class="header-extras row">
						<div class="medium-only-12 hide-for-small-only hide-for-large">
							<div class="header-extras-spacer">
							</div><!-- . -->
						</div><!-- .medium-only-12.hide-for-small-only.hide-for-large -->
						<div class="medium-only-12">
							<div class="header-extras-profile">

								<?php if( is_user_logged_in() ) { ?>
									<?php echo get_avatar( get_current_user_id(), 32 ); ?>

									<a href="<?php echo bp_core_get_user_domain( get_current_user_id() ); ?>">
										<p><?php _e( 'Profile', 'zola') ?></p>
									</a>
									<a href="<?php echo wp_logout_url( site_url( '/' ) ); ?>">
										<p><?php _e( 'Log out', 'zola' ) ?></p>
									</a>

								<?php } else { ?>
									<?php echo get_avatar( get_current_user_id(), 32 ); ?>

									<a href="<?php echo esc_url( site_url( '/' . __( 'login', 'zola' ) ) ); ?>">
										<p><?php _e( 'Log in', 'zola' ) ?></p>
									</a>
									<a href="<?php echo wp_registration_url(); ?>">
										<p><?php _e( 'Register', 'zola' ) ?></p>
									</a>

								<?php } ?>

							</div><!-- .header-extras-profile -->
						</div><!-- .medium-only-12 -->
					</div><!-- .header-extras.row -->
				</div><!-- .small-9.medium-5.column -->
				<div class="medium-offset-2 small-3 medium-5 column end">
					<div class="header-extras row">
						<div class="small-12 large-4 column">
							<div class="header-extras-icons">
								<a href="<?php echo ( home_url() . '/feed/atom' );?>">
									<div class="social-icon icon-rss"></div>
								</a>
								<a href="<?php echo get_option( 'social_links_facebook' ) ?>" alt="Facebook" target="_blank">
									<div class="social-icon icon-facebook"></div>
								</a>
								<a href="<?php echo get_option( 'social_links_instagram' ) ?>" alt="Instagram" target="_blank">
									<div class="social-icon icon-instagram"></div>
								</a>
							</div><!-- .header-extras-icons -->
						</div><!-- .small-12.large-4.column -->
						<div class="hide-for-small-only large-8 column">
							<div class="search-bar">
								<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
									<div class="input-group">
										<input type="text" value="<?php echo the_search_query(); ?>" name="s" id="s" />
										<div class="input-group-button">
											<input type="submit" id="searchsubmit" class="button" value="<?php _e( 'Search', 'zola' ) ?>" />
										</div><!-- .input-group-button -->
									</div><!-- .input-group -->
								</form><!-- #searchform.searchform -->
							</div><!-- .search-bar -->
						</div><!-- .hide-for-small-only.large-8.column -->
					</div><!-- .header-extras.row -->
				</div><!-- .medium-offset-2.small-3.medium-5.column.end -->
			</div><!-- .header-extras.row -->
		</div><!-- .header-extras-wrap -->
	</div><!-- .header-picture -->

	<div class="tiny-line"></div>

	<div class="nav-bar-wrap">
		<div class="nav-bar row">
			<!-- Left navigation links (up to 4) -->
			<div class="hide-for-small-only medium-5 large-5 column">

				<?php
					wp_nav_menu( array( 'theme_location' => 'header-menu-left', 'container_class' => 'nav-list float-left' ) );
				?>

			</div><!-- .hide-for-small-only.medium-5.large-5.column -->
			<div class="show-for-small-only small-4 column">

				<?php
					wp_nav_menu( array( 'theme_location' => 'header-menu-mobile-left', 'container_class' => 'nav-list float-left' ) );
				?>

			</div><!-- .show-for-small-only.small-4.column -->
			<!-- Logo -->
			<div class="small-2 column">
					<a href="<?php echo get_home_url(); ?>"><img class="logo-on-bar small-4 medium-2 column" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logos/hufiecwwl.png" /></a>
			</div><!-- .small-2.column -->
			<!-- Right navigation links (up to 4) -->
			<div class="hide-for-small-only medium-5 large-5 column float-right">

				<?php
					wp_nav_menu( array( 'theme_location' => 'header-menu-right', 'container_class' => 'nav-list float-right' ) );
				?>

			</div><!-- .hide-for-small-only.medium-5.large-5.column.float-right -->
			<div class="show-for-small-only small-4 column">
				<div class="float-right mobile-nav">
					<p>Menu</p>
					<div class="mobile-nav-sub">

						<?php
							wp_nav_menu( array( 'theme_location' => 'header-menu-left', 'container_class' => 'nav-list' ) );
							wp_nav_menu( array( 'theme_location' => 'header-menu-right', 'container_class' => 'nav-list' ) );
						?>

					</div><!-- .mobile-nav-sub -->
				</div><!-- .float-right.mobile-nav -->
			</div><!-- .show-for-small-only.small-4.column -->
		</div><!-- .nav-bar.row -->
	</div><!-- .nav-bar-wrap -->

	<div class="tiny-line"></div>
