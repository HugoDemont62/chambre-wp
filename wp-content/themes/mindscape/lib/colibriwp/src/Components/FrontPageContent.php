<?php

namespace ColibriWP\Theme\Components;

class FrontPageContent extends PageContent{

	public function renderContent( $parameters = [] ) {
		?>
        <div class="page-content">
            <section>
                <h1>Bienvenue à notre chambre d'hôtes</h1>
                <p>Présentation rapide de la chambre d'hôtes...</p>
            </section>

            <section>
                <h2>Nos chambres</h2>
				<?php
				$chambres = new \WP_Query( [
					'post_type'      => 'chambres',
					'posts_per_page' => - 1,
				] );

				if ( $chambres->have_posts() ) : ?>
                    <div class="chambres-gallery">
						<?php while ( $chambres->have_posts() ) : $chambres->the_post(); ?>
                            <div class="chambre">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large' ); ?>
								<?php endif; ?>
                                <h3><?php the_title(); ?></h3>
                            </div>
						<?php endwhile; ?>
                    </div>
				<?php endif; ?>
                <a href="<?php echo get_post_type_archive_link( 'chambres' ); ?>">Voir toutes les chambres</a>
            </section>

            <section>
                <h2>Contactez-nous</h2>
                <p>Adresse : ...</p>
                <p>Numéro de téléphone : ...</p>
            </section>

			<?php
			while ( have_posts() ) :
			the_post();
			?>
            <div id="content" class="content">
				<?php
				the_content();
				endwhile;
				?>
            </div>
			<?php
			get_template_part( 'comments-page' );
			?>
        </div>
		<?php
	}
}