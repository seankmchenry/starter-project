<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

  <div id="content" class="site-content">

    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-md-8 mb3 md-mb0">
          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

              <?php
              while ( have_posts() ) : the_post();

                get_template_part( 'templates/content', 'page' );

              endwhile; // End of the loop.
              ?>

            </main><!-- #main -->
          </div><!-- #primary -->
        </div>

        <div class="col-xs-12 col-md-4">
          <?php get_sidebar(); ?>
        </div>

      </div><!-- .row -->
    </div><!-- .container -->

  </div><!-- #content -->

<?php
get_footer();
