<?php 

// Argumentos
$args  = array(
	'post_type' => 'Banners', 
	'posiciones' => 'Slider Home',
	'posts_per_page' => 5
);
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
	<div class="owl-carousel sl__home">

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php // ACF 
			$banner__url = get_field('banner__url'); 
			$banner__btn_title = get_field('banner__btn_title');
			$banner__ht = get_field('banner__ht');
			$banner__txt = get_field('banner__txt');
			$banner__ht_url = get_field('banner__ht_url');

			$banner__vig = get_field('banner__vig');
			$hoy = date( 'Ymd', current_time( 'timestamp', 1 ));
			//var_dump($hoy);

			if ( $banner__vig && ( intval ( $banner__vig ) < intval( $hoy ) ) ){
		        change_post_status( $post->ID, 'draft' );
		    } 
		?>
		<div class="item">
			<figure>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php 
						$thumb__ID = get_post_thumbnail_id( $post->ID );
						$thumb__attr = wp_get_attachment_image_src( $thumb__ID, 'full' );
						$thumb__URI = $thumb__attr[0];
						$thumb__width = $thumb__attr[1];
						$thumb__height = $thumb__attr[2];
					?>
					<?php if ($banner__txt == 1) { ?>
						<img class="img-responsive hidden" src="<?php echo $thumb__URI; ?>" alt="" width="<?php echo $thumb__width; ?>" height="<?php echo $thumb__height; ?>" />
					<?php }else{ ?>
						<a class="banner__txt" href="<?php if ($banner__url) { echo $banner__url; } else { echo bloginfo( 'url' ); } ?>" class="cta__danger">
							<img class="img-responsive hidden" src="<?php echo $thumb__URI; ?>" alt="" width="<?php echo $thumb__width; ?>" height="<?php echo $thumb__height; ?>" />
						</a>
					<?php } ?>
				<?php } ?>
				<?php if ($banner__txt == 1) { ?>
					<figcaption class="hidden">
						<div class="sl__home__hashtag">
		    				<a href="<?php if ($banner__ht_url) { echo $banner__ht_url; } else { echo bloginfo( 'url' ); } ?>" target="_blank"><?php if ($banner__ht) { echo '#'.$banner__ht; } else { echo bloginfo( 'url' ); } ?></a>
		    			</div>
		    			<div class="sl__home__title">
		    				<h3><a href="<?php if ($banner__url) { echo $banner__url; } else { echo bloginfo( 'url' ); } ?>"><?php the_title(); ?></a></h3>
		    			</div>
		    			<div class="sl__home__content">
		    				<?php the_content(); ?>
		    			</div>
			    		<div class="sl__home__link">
			    			<p><a href="<?php if ($banner__url) { echo $banner__url; } else { echo bloginfo( 'url' ); } ?>" class="cta__danger"><?php if ($banner__btn_title) { echo $banner__btn_title; } else { echo 'Saber más'; } ?></a></p>
			    		</div>
					</figcaption>
				<?php } ?>
				<i class="fa fa-circle-o-notch fa-spin spinner"></i>
			</figure>
		</div>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>
	</div>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>