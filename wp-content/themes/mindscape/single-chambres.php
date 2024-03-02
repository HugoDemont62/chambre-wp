<?php
/**
 * The template for displaying all single posts of type "chambres"
 * @package WordPress
 *
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    while ( have_posts() ) : the_post();

        the_title( '<h1>', '</h1>' );
        the_content();

        // Display custom fields
        echo '<p>Nombre de couchages : ' . get_field('nombre_de_couchages') . '</p>';
        echo '<p>Prix indicatif: ' . get_field('prix_indicatif') . '</p>';

        // Display taxonomies
        echo '<p>Type de lits: ' . get_the_term_list( get_the_ID(), 'type_de_lits', '', ', ' ) . '</p>';
        echo '<p>Gamme de tarif: ' . get_the_term_list( get_the_ID(), 'gamme_de_tarif', '', ', ' ) . '</p>';

    endwhile;
    ?>
</main>

<?php get_footer(); ?><?php
