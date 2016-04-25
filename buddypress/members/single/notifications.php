<?php
/**
 * Template buddy single member notifications
 *
 * @author		Edwin Jabłoński & Damian Knap <https://ejdk.pl>
 * @copyright	Copyright (c) 2016, Edwin Jabłoński & Damian Knap
 * @package		Zola Template
 * @category	Template
 * @since		1.0.0
 */
?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>

		<li id="members-order-select" class="last filter">
			<?php bp_custom_notifications_sort_order_form(); ?>
		</li>
	</ul>
</div>

<?php
switch ( bp_current_action() ) :

	case 'unread' :
		bp_get_template_part( 'members/single/notifications/unread' );
		break;

	case 'read' :
		bp_get_template_part( 'members/single/notifications/read' );
		break;

	// Any other actions.
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
