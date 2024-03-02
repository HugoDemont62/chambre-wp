<?php
/**
 * The template for displaying archive pages for "chambres"
 *
 * @package WordPress
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();

            the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
            the_excerpt();

        endwhile;

        the_posts_navigation();

    else :

        echo 'No posts found';

    endif;
    ?>
</main>

<?php get_footer(); ?><?php
