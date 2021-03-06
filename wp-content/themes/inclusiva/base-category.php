<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
  <?php get_template_part('lib/ga'); ?>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <?php 
	    $cat = get_query_var('cat'); 
      $get_cat = get_category ($cat); 
	    $category_id = get_cat_ID( $get_cat->name );
		  $category_link = get_category_link( $category_id );
      $category_name = $get_cat->name;
      $category_slug = $get_cat->slug;
	   ?>

    <?php get_template_part('templates/masshead'); ?>

    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main" role="main">
          <?php get_template_part('templates/section', 'category'); ?>
        </main><!-- /.main -->
        <aside class="sidebar" role="complementary">
          <?php get_template_part('templates/sidebar', 'category' ); ?>
        </aside><!-- /.sidebar -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
