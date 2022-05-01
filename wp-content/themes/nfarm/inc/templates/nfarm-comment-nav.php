<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav">
				<span class="nfarm-icon nfarm-chevron-left" aria-hidden="true"></span> 
				<?php previous_comments_link( esc_html__( 'Older Comments', 'nfarmtheme' ) ) ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Newer Comments', 'nfarmtheme' ) ) ?>
				<span class="nfarm-icon nfarm-chevron-right" aria-hidden="true"></span>
			</div>
		</div>
	</div><!-- .row -->
</nav>