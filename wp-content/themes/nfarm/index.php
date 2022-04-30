<?php 

        /*
            
        @package nfarmtheme

        */

get_header(); ?>


<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container nfarm-posts-container">
				<?php 
					if (have_posts()) {

						echo '<div class="page-limit" data-page="/' . nfarm_check_paged() . '">';
						
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
				<a class="nfarm-sunset-load nfarm-load-more" data-page="<?php echo nfarm_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<span class="sunset-icon nfarm-loading"></span>
					<span class="text">Load More</span>
				</a>
			</div><!-- .container -->

		</main>
</div><!-- #primary -->


<?php get_footer(); ?>