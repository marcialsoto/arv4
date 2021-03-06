<?php if ( is_page( array ( 'gobierno-abierto' ) ) ) { ?>
<section class="widget">
	<h3>Gobierno Abierto</h3>
    <?php
	if (has_nav_menu('transparencia_navigation')) :
		wp_nav_menu(['theme_location' => 'transparencia_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>
<?php } else if ( is_page( array ( 'agro-rural', 'la-institucion', 'antecedentes', 'mision-y-vision', 'organigrama', 'directorio', 'preguntas-frecuentes' ) ) ) {?>
<section class="widget">
	<h3>Quiénes Somos</h3>
    <?php
	if (has_nav_menu('quienes_somos_navigation')) :
		wp_nav_menu(['theme_location' => 'quienes_somos_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav nav-sidebar']);
	endif;
	?>
</section>
<?php } else if ( is_page( array ( 'Proceso de Elecciones' ) ) ) {?>
	<?php if ( is_user_logged_in() ) {
		echo '<section class="widget text-2 widget_text"><h3>Bienvenido</h3>';
			$current_user = wp_get_current_user();
        	printf( '<p class="textwidget">Hola, %s', esc_html( $current_user->user_firstname ), '</p>' );
        	echo '<p class="textwidget"><a href="' . wp_logout_url() . '">Cerrar Sesión</a></p>';
		echo '</section>';
	}else{
		echo '<section class="widget text-2 widget_text"><h3>Inicia Sesión</h3>';
			wp_login_form();
		echo '</section>';
	} 
	?>
<?php } else if ( is_page( array ( 'Contacto'))){ ?>

<section class="widget text-2 widget_text"><h3>La Institución</h3>			<div class="textwidget"><address>
  <strong><a href="<?php echo bloginfo('url'); ?>">AGRO RURAL</a></strong><br>
<a href="https://www.google.com.pe/maps/place/AGRO+RURAL/@-12.0796521,-77.0425728,15z/data=!4m2!3m1!1s0x0:0x6f311078be8946fa">Av. Salaverry 1388,<br>
  Jesús María, Lima 11, PE</a><br>
  <abbr title="Teléfono">T:</abbr> (511) 205-8030
</address>

<address>
  <strong>Contacto</strong><br>
  <a href="mailto:webmaster@agrorural.gob.pe">webmaster@agrorural.gob.pe</a>
</address></div>
		</section>

<?php } elseif ( is_page( array ( 
									'objetivos', 
									'el-proyecto',
									'ambito-de-intervencion-y-grupo-objetivo', 
									'componentes',
									'componente-1',
									'componente-2',
									'componente-3',
									'componente-4'
								) 
						) 
				) 
{?>
    <?php get_template_part('templates/sidebar', 'proyecto-pssa'); ?>
<?php } else {?>
	<?php dynamic_sidebar('sidebar-primary'); ?>
<?php } ?>