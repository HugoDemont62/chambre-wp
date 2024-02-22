<?php
/*
* Template Name: Single Chambres
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// Démarrez la boucle.
			while ( have_posts() ) : the_post();

				the_title( '<h1>', '</h1>' );
				the_content();

				// Fin de la boucle.
			endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?><?php
