<?php
/*
* Template Name: Archive Chambres
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// Démarrez la boucle.
			if ( have_posts() ) : while ( have_posts() ) : the_post();

				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				the_excerpt();

			endwhile; endif;
			// Fin de boucle
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?><?php
