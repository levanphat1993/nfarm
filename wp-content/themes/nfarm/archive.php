<?php 

        /*
            
        @package nfarmtheme

        */

        get_header(); 

?>


<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if(is_paged()) { ?>
			
			<div class="container text-center container-load-previous">
            <a class="btn-sunset-load sunset-load-more"
                data-prev="1" 
                data-archive="<?php echo nfarm_grab_current_uri(); ?>" 
                data-page="<?php echo nfarm_check_paged(1); ?>" 
                data-url="<?php echo admin_url('admin-ajax.php'); ?>">

					<span class="sunset-icon nfarm-loading"></span>
					<span class="text">Load Previous</span>
				</a>
			</div><!-- .container -->
			
		<?php } ?>

			<div class="container nfarm-posts-container">
				<?php 
					if (have_posts()) {
                ?>
                    <header class="archive-header text-center">
                        <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                    </header>

                <?php

                        echo '<div class="page-limit" data-page="' . $_SERVER["REQUEST_URI"] . '">';						
						
                        while(have_posts()): the_post();	
							/*
							$class = 'reveal';
							set_query_var( 'post-class', $class );
							*/
							get_template_part('template-parts/content', get_post_format());
						endwhile;

						echo '</div>';
					}
				?>
				
			</div><!-- .container -->

			<div class="container text-center">
				<a class="btn-nfarm-load nfarm-load-more"
                data-page="<?php echo nfarm_check_paged(1); ?>" 
                data-archive="<?php echo nfarm_grab_current_uri(); ?>" 
                data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<span class="sunset-icon nfarm-loading"></span>
					<span class="text">Load More</span>
				</a>
			</div><!-- .container -->

		</main>
</div><!-- #primary -->


<?php get_footer(); ?>