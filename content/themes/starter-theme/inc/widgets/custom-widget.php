<?php
/**
 * Custom Widget
 *
 * @package _s
 */

class Custom_Widget extends WP_Widget {
  /**
   * Constructor
   */
  public function __construct() {
    $widget_args = array(
      'classname' => 'custom-widget',
      'description' => __( 'Custom widget using ACF fields.', '_s' )
    );
    parent::__construct( 'custom_widget', __( 'Custom Widget', '_s' ), $widget_args );
  }

  /**
   * Display
   */
  public function widget( $args, $instance ) {
    // get the widget ID
    // @link https://goo.gl/X1HGhg
    $wid = 'widget_' . $args['widget_id']; ?>

    <section class="widget custom-widget">
      <?php
      /* Headline */
      if ( get_field( 'widget_headline', $wid ) ) { ?>
        <h2 class="widget-headline custom-widget__headline h3 mt0 bold">
          <?php the_field( 'widget_headline', $wid ); ?>
        </h2>
      <?php }
      ?>
    </section>
  <?php }

  /**
   * Form
   */
  public function form( $instance ) {}
}

/**
 * Register
 */
function _s_register_custom_widget() {
  register_widget( 'Custom_Widget' );
}
add_action( 'widgets_init', '_s_register_custom_widget' );
