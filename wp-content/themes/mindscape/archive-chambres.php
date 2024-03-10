<?php
/**
 * The template for displaying archive pages for "chambres"
 *
 * @package WordPress
 */

get_header();
?>

    <style>
    .chambre {
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px auto; /* Centrer la carte */
        max-width: 80%; /* Largeur maximale de la carte */
    }

    .chambre h2 {
        margin: 0 0 10px;
    }

    .chambre p {
        margin: 0 0 10px;
    }

    .chambre a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .chambre a:hover {
        background-color: #0056b3;
    }

    .chambre img {
        width: 20%;
        height: auto;
    }
    </style>

<?php
// Récupère les filtres depuis l'URL
$filtres = isset( $_GET['filtres'] ) ? $_GET['filtres'] : [];

// Construit la requête WP_Query
$args = [
	'post_type'      => 'chambres',
	'posts_per_page' => - 1,
	'meta_query'     => [], // à remplir avec les filtres
];

// Ajoute les filtres à la requête
foreach ( $filtres as $key => $value ) {
	$args['meta_query'][] = [
		'key'     => $key,
		'value'   => $value,
		'compare' => 'LIKE',
	];
}

$chambres = new WP_Query( $args );

if ( $chambres->have_posts() ) :
	while ( $chambres->have_posts() ) : $chambres->the_post();
		$id = get_the_ID();
		?>
        <div class="chambre">
			<?php the_post_thumbnail(); ?>
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <p>Couchages : <?php the_field( 'nombre_de_couchages', $id ); ?></p>
            <p>Prix indicatif : <?php the_field( 'prix_indicatif', $id ); ?> €</p>
            <p>Type de lits : <?php echo get_the_term_list( $id, 'type_de_lits', '', ', ' ); ?></p>
            <p >Gamme de tarif : <?php echo get_the_term_list( $id, 'gamme_de_tarif', '', ', ' ); ?></p>
            <a href="<?php the_permalink(); ?>">Voir plus</a>
        </div>
	<?php
	endwhile;
endif;

get_footer();
