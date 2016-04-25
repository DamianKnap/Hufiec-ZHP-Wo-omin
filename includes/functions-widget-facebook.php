<?php
/**
 * Facebook widget you can add to sidebars
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
    /**
     * Adds Facebook widget.
     */
    class Facebook_Widget extends WP_Widget {

    	/**
    	 * Register widget with WordPress.
    	 */
    	function __construct() {
    		parent::__construct(
    			'facebook_widget', // Base ID
    			'Facebook', // Name
    			array( 'description' => 'Facebook Widget', ) // Args
    		);
    	}

    	/**
    	 * Front-end display of widget.
    	 *
    	 * @see WP_Widget::widget()
    	 *
    	 * @param array $args     Widget arguments.
    	 * @param array $instance Saved values from database.
    	 */
    	public function widget( $args, $instance ) {
    		echo $args['before_widget'];
    		echo $args['before_title'] . apply_filters( 'widget_title', 'Facebook' ). $args['after_title'];
            echo "<ul><li>";
    		printf( '<div id="fb-root" class="widget-body"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5";
                  fjs.parentNode.insertBefore(js, fjs);
              }(document, "script", "facebook-jssdk"));</script>
                    <div class="fb-page"
                    data-href="%s"

                    data-small-header="true"
                    data-adapt-container-width="true"
                    data-hide-cover="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="%s">
                                <a href="%s">Hufiec ZHP Wołomin</a>
                            </blockquote>
                        </div>
                    </div>', $instance['fb_addr'], $instance['fb_addr'], $instance['fb_addr'] );
            echo "</li></ul>";
    		echo $args['after_widget'];
    	}

    	/**
    	 * Back-end widget form.
    	 *
    	 * @see WP_Widget::form()
    	 *
    	 * @param array $instance Previously saved values from database.
    	 */
    	public function form( $instance ) {
    		$title = ! empty( $instance['fb_addr'] ) ? $instance['fb_addr'] : 'Facebook addr:';
    		?>
    		<p>
    		<label for="<?php echo $this->get_field_id( 'fb_addr' ); ?>"><?php echo 'Facebook addr:'; ?></label>
    		<input class="widefat" id="<?php echo $this->get_field_id( 'fb_addr' ); ?>" name="<?php echo $this->get_field_name( 'fb_addr' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    		</p>
    		<?php
    	}

    	/**
    	 * Sanitize widget form values as they are saved.
    	 *
    	 * @see WP_Widget::update()
    	 *
    	 * @param array $new_instance Values just sent to be saved.
    	 * @param array $old_instance Previously saved values from database.
    	 *
    	 * @return array Updated safe values to be saved.
    	 */
    	public function update( $new_instance, $old_instance ) {
    		$instance = array();
    		$instance['fb_addr'] = ( ! empty( $new_instance['fb_addr'] ) ) ? strip_tags( $new_instance['fb_addr'] ) : '';

    		return $instance;
    	}

    } // class Foo_Widget

    // register Foo_Widget widget
    function register_facebook_widget() {
        register_widget( 'Facebook_Widget' );
    }
    add_action( 'widgets_init', 'register_facebook_widget' );
?>
