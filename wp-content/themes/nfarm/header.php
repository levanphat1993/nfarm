<?php 
	
	/*
		This is the template for the hedaer
		
		@package nfarmtheme
	*/
	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<body <?php body_class(); ?>>
	
	<div class="container">
		
		<div class="row">
			<div class="col-xs-12">
				
				<div class="header-container background-image text-center" style="background-image: url(<?php header_image(); ?>);">
					
					<div class="header-content table">
						<div class="table-cell">
							<h1 class="site-title sunset-icon">
								<span class="nfarm-logo"></span>
								<span class="hide"><?php bloginfo( 'name' ); ?></span>
							</h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div><!-- .table-cell -->
					</div><!-- .header-content -->
					
					<div class="nav-container"></div><!-- .nav-container -->
					
				</div><!-- .header-container -->
				
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
		
	</div><!-- .container-fluid -->