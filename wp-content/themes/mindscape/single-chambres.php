<?php
/**
 * The template for displaying all single posts of type "chambres"
 *
 * @package WordPress
 */

get_header(); ?>

    <style>
    .single-chambres {
        padding: 20px;
        background-color: #f9f9f9;
    }

    .single-chambres .info {
        flex: 1;
    }

    .single-chambres .image {
        margin-left: 20px;
    }

    .single-chambres .image img {
        width: 30%;
        height: auto;
    }

    .single-chambres h1 {
        font-size: 2em;
        color: #333;
    }

    .single-chambres p {
        font-size: 1em;
        color: #666;
    }

    .related-chambres {
        margin-top: 40px;
        padding-top: 20px;
    }

    .related-chambres h2 {
        font-size: 1.5em;
        color: #333;
    }

    .related-chambres h3 {
        font-size: 1.2em;
        margin-top: 20px;
    }
    </style>

    <main id='main' class='single-chambres'>
		<?php
		while ( have_posts() ) : the_post();

			the_title( '<h1 class="single-chambres h1">', '</h1>' );
			?>
            <div class="info">
                <b class="single-chambres b">
					<?php
					the_content();
					?>
                </b>
				<?php
				echo '<p class="single-chambres p">Nombre de couchages : ' . get_field( 'nombre_de_couchages' ) . '</p>';
				echo '<p class="single-chambres p">Prix indicatif : ' . get_field( 'prix_indicatif' ) . '</p>';

				echo '<p class="single-chambres p">Type de lits : ' . get_the_term_list( get_the_ID(), 'type_de_lits', '', ', ' ) . '</p>';
				echo '<p class="single-chambres p">Gamme de tarif : ' . get_the_term_list( get_the_ID(), 'gamme_de_tarif', '', ', ' ) . '</p>';
				?>
            </div>
            <div class="image">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				?>
            </div>
		<?php
		endwhile;
		$terms = get_the_terms( get_the_ID(), 'gamme_de_tarif' );

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$term         = array_pop( $terms );
			$related_args = [
				'post_type'      => 'chambres',
				'posts_per_page' => 3, // Change this to the number of posts you want to display
				'tax_query'      => [
					[
						'taxonomy' => 'gamme_de_tarif',
						'field'    => 'slug',
						'terms'    => $term->slug,
					],
				],
				'post__not_in'   => [ get_the_ID() ], // Exclude the current post
			];

			$related_query = new WP_Query( $related_args );

			if ( $related_query->have_posts() ) {
				echo '<div class="related-chambres">';
				echo '<h2 class="related-chambres h2">Chambres en relation</h2>';
				while ( $related_query->have_posts() ) {
					$related_query->the_post();
					// Display the title and link to the post
					echo '<h3 class="related-chambres h3"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
				}
				echo '</div>';
			}

			// Restore original Post Data
			wp_reset_postdata();
		}
		?>
    </main>

<?php get_footer(); ?>