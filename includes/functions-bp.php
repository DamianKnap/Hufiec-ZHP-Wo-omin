<?php
/**
 * BP settings
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

    // Rather ugly hack to change activity page name
    add_filter( 'bp_get_directory_title', 'change_activity_title' );

    function change_activity_title( $data ) {
    	if( $data == 'Cała aktywność w Witrynie' || $data == 'Activity feed for the entire site.' ) {
    		$data = __( 'Activity', 'zola' );
    	}

    	return $data;
    }

    // Change def max bp avatar size
    define( 'BP_AVATAR_FULL_HEIGHT', 260 );
    define( 'BP_AVATAR_FULL_WIDTH', 260 );

    /**
     * Output the form for changing the sort order of notifications.
     *
     * This is overwritten function from bp-notification/bp-notification-template
     *
     * @since 1.9.0
     */
    function bp_custom_notifications_sort_order_form() {

    	// Setup local variables.
    	$orders   = array( 'DESC', 'ASC' );
    	$selected = 'DESC';

    	// Check for a custom sort_order.
    	if ( !empty( $_REQUEST['sort_order'] ) ) {
    		if ( in_array( $_REQUEST['sort_order'], $orders ) ) {
    			$selected = $_REQUEST['sort_order'];
    		}
    	} ?>

    	<form action="" method="get" id="notifications-sort-order">

    		<select id="notifications-sort-order-list" name="sort_order" onchange="this.form.submit();">
    			<option value="DESC" <?php selected( $selected, 'DESC' ); ?>><?php _e( 'Newest First', 'zola' ); ?></option>
    			<option value="ASC"  <?php selected( $selected, 'ASC'  ); ?>><?php _e( 'Oldest First', 'zola' ); ?></option>
    		</select>

    		<noscript>
    			<input id="submit" type="submit" name="form-submit" class="submit" value="<?php esc_attr_e( 'Go', 'zola' ); ?>" />
    		</noscript>
    	</form>

    <?php
    }
?>

<?php

    /**
     * Output the Members directory search form.
     *
     * This is overwritten function from bp_directory_members_search_form
     */
    function bp_custom_directory_members_search_form() {

    	$query_arg = bp_core_get_component_search_query_arg( 'members' );

    	if ( ! empty( $_REQUEST[ $query_arg ] ) ) {
    		$search_value = stripslashes( $_REQUEST[ $query_arg ] );
    	} else {
    		$search_value = bp_get_search_default_text( 'members' );
    	}

    	$search_form_html = '<form action="" method="get" id="search-members-form">
    		<label for="members_search"><input type="text" name="' . esc_attr( $query_arg ) . '" id="members_search" placeholder="'. esc_attr( $search_value ) .'" /></label>
    		<input type="submit" id="members_search_submit" name="members_search_submit" value="' . __( 'Search', 'zola' ) . '" />
    	</form>';

    	/**
    	 * Filters the Members component search form.
    	 *
    	 * @since 1.9.0
    	 *
    	 * @param string $search_form_html HTML markup for the member search form.
    	 */
    	echo apply_filters( 'bp_directory_members_search_form', $search_form_html );
    }

?>
