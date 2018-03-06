<?php
/**
 * The template for the search form
 *
 * @package _s
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <!-- Label -->
  <label class="search-label hide"><?php echo _x( 'Search for:', 'label' ) ?></label>
  <!-- Search -->
  <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  <!-- Submit -->
  <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
