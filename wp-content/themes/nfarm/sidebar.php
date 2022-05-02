<?php /*
	
@package nfarmtheme

*/



if (!is_active_sidebar('nfarm-sidebar')){
	return;
}

?>

<aside id="secondary" class="widget-area" role="complementary">
	
	<?php dynamic_sidebar( 'nfarm-sidebar' ); ?>
	
</aside>