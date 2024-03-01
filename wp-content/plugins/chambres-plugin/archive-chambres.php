<?php
/*
* Template Name: Archive Chambres
*/

get_header(); ?>

 <div id="primary" class="content-area">
  <main id="main" class="site-main">

   <?php
   if ( have_posts() ) : while ( have_posts() ) : the_post();

    the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    the_excerpt();

    echo '<p>Nombre de couchages: ' . get_field('nombre_de_couchages') . '</p>';
    echo '<p>Prix indicatif: ' . get_field('prix_indicatif') . '</p>';
    echo '<p>Type de lits: ' . get_field('type_de_lits') . '</p>';
    echo '<p>Gamme de tarif: ' . get_field('gamme_de_tarif') . '</p>';

   endwhile; endif;
   ?>

  </main><!-- .site-main -->
 </div><!-- .content-area -->

<?php get_footer(); ?>