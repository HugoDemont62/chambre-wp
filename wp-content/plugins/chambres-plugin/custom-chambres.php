<?php
/**
 * Plugin Name: Custom Chambres
 * Description: This plugin adds a custom post type "Chambres"
 * Version: 1.1
 * Author: Hugo DEMONT
 **/

function create_chambres_post_type() {
	$labels = [
		'name'                  => __( 'Chambres' ),
		'singular_name'         => __( 'Chambre' ),
		'add_new_item'          => __( 'Ajouter nouvelle Chambre' ),
		'edit_item'             => __( 'Modifier Chambre' ),
		'new_item'              => __( 'Nouvelle Chambre' ),
		'view_item'             => __( 'Voir Chambre' ),
		'view_items'            => __( 'Voir Chambres' ),
		'search_items'          => __( 'Rechercher Chambres' ),
		'not_found'             => __( 'Non trouvé' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille' ),
		'all_items'             => __( 'Toutes les Chambres' ),
		'archives'              => __( 'Archives des Chambres' ),
		'attributes'            => __( 'Attributs des Chambres' ),
		'insert_into_item'      => __( 'Insérer dans Chambre' ),
		'uploaded_to_this_item' => __( 'Téléchargé sur cette Chambre' ),
	];

	$args = [
		'labels'      => $labels,
		'public'      => true,
		'has_archive' => true,
		'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
	];

	register_post_type( 'chambres', $args );
}

add_action( 'init', 'create_chambres_post_type' );

if ( function_exists( 'acf_add_local_field_group' ) ):
	acf_add_local_field_group( [
		'key'      => 'group_1',
		'title'    => 'Détails de la chambre',
		'fields'   => [
			[
				'key'   => 'field_1',
				'label' => 'Nombre de couchages',
				'name'  => 'nombre_de_couchages',
				'type'  => 'number',
			],
			[
				'key'   => 'field_2',
				'label' => 'Prix indicatif',
				'name'  => 'prix_indicatif',
				'type'  => 'number',
			],
			[
				'key'     => 'field_3',
				'label'   => 'Type de lits',
				'name'    => 'type_de_lits',
				'type'    => 'select',
				'choices' => [
					'simples' => 'Simples',
					'doubles' => 'Doubles',
				],
			],
			[
				'key'     => 'field_4',
				'label'   => 'Gamme de tarif',
				'name'    => 'gamme_de_tarif',
				'type'    => 'select',
				'choices' => [
					'bas'   => 'Bas',
					'moyen' => 'Moyen',
					'haut'  => 'Haut',
				],
			],
		],
		'location' => [
			[
				[
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'chambres',
				],
			],
		],
	] );

endif;