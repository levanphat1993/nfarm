<?php /*
	
@package nfarmtheme

*/



if (!is_active_sidebar('nfarm-sidebar')){
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">

	<div class="visible-xs">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'nav navbar-nav navbar-collapse',
				'walker' => new Nfarm_Walker_Nav_Primary()
			));	
		?>
	</div>

	
	<?php dynamic_sidebar( 'nfarm-sidebar' ); ?>
	
</aside>