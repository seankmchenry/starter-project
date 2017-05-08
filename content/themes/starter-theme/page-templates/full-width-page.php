<?php
/**
 * Template Name: Full-Width Page
 *
 * A full-width (no sidebar) page template
 *
 * @package _s
 */

get_header(); ?>

  <div id="content" class="site-content">

    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

              <?php
              while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                  </header><!-- .entry-header -->

                  <div class="entry-content">
                    <?php
                      the_content();

                      wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
                        'after'  => '</div>',
                      ) );
                    ?>
                  </div><!-- .entry-content -->

                  <?php if ( get_edit_post_link() ) : ?>
                    <footer class="entry-footer">
                      <?php
                        edit_post_link(
                          sprintf(
                            /* translators: %s: Name of current post */
                            esc_html__( 'Edit %s', '_s' ),
                            the_title( '<span class="screen-reader-text hide">"', '"</span>', false )
                          ),
                          '<span class="edit-link">',
                          '</span>'
                        );
                      ?>
                    </footer><!-- .entry-footer -->
                  <?php endif; ?>
                </article><!-- #post-## -->

              <?php endwhile; // End of the loop.
              ?>

            </main><!-- #main -->
          </div><!-- #primary -->

        </div>
      </div><!-- .row -->
    </div><!-- .container -->

  </div><!-- #content -->

<?php
get_footer();
