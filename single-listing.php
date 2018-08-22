<?php
/**
 * The template for displaying single listing
 *
 * @package Superlist
 * @since Superlist 1.0.0
 */

get_header(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div id="primary">
<div class="center-img"><?php the_post_thumbnail(); ?></div>
                <?php dynamic_sidebar( 'content-top' ); ?>
					

                    <?php if ( have_posts() ) : ?>
                        <div class="content">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php include Inventor_Template_Loader::locate( 'content-listing' ); ?>
                            <?php endwhile; ?>

                            <?php superlist_pagination(); ?>
                        </div><!-- /.content -->
                    <?php else : ?>
                        <?php get_template_part( 'templates/content', 'none' ); ?>
                    <?php endif; ?>

                <?php dynamic_sidebar( 'content-bottom' ); ?>

            </div><!-- #primary -->
        </div><!-- /.col-* -->

        <?php get_sidebar() ?>
    </div><!-- /.row -->

<?php get_footer(); ?>
