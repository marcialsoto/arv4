<article <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="alignright">
	<?php the_post_thumbnail('thumb-noticias');  ?>
		</figure>
	<?php } ?>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_advanced_excerpt(); ?>
  </div>
</article>