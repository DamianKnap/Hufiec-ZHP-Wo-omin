<?php
/**
 * Template for a sidebar
 *
 * This template is for sidebar
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @subpackage	Single Page
 * @category	Template
 * @since		1.0.0
 */
?>

<div id="sidebar-side" class="widget-area clearfix" role="complementary">

	<?php if ( !dynamic_sidebar( 'sidebar-category' ) ) : ?>

	<?php endif; // !dynamic_sidebar( 'sidebar-category' ) ?>

</div><!-- #sidebar.widget-area -->
