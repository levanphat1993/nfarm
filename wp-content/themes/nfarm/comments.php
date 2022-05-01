<?php /*
	
@package nfarmtheme

*/

if( post_password_required() ){
	return;
}

?>

<div id="comments" class="comments-area">
	
	<?php 
		if(have_comments()) {
		//We have comments
	?>

	<h2 class="comment-title">
		<?php
			
			printf(
				esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'nfarmtheme' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
				
		?>
	</h2>

	<?php nfarm_get_post_navigation(); ?>
	
	<ol class="comment-list">
		
		<?php 
			
			$args = array(
				'walker'			=> null,
				'max_depth' 		=> '',
				'style'				=> 'ol',
				'callback'			=> null,
				'end-callback'		=> null,
				'type'				=> 'all',
				'reply_text'		=> 'Reply',
				'page'				=> '',
				'per_page'			=> '',
				'avatar_size'		=> 32,
				'reverse_top_level' => null,
				'reverse_children'	=> '',
				'format'			=> 'html5',
				'short_ping'		=> false,
				'echo'				=> true
			);
			
			wp_list_comments($args);
		?>
		
	</ol>
	
	<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
		
		<nav id="comment-nav-bottom" class="comment-navigation" role="navigation">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="post-link-nav">
						<span class="nfarm-icon nfarm-chevron-left" aria-hidden="true"></span> 
						<?php previous_comments_link(esc_html__('Older Comments', 'nfarmtheme')) ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 text-right">
					<div class="post-link-nav">
						<?php next_comments_link(esc_html__('Newer Comments', 'nfarmtheme')) ?>
						<span class="nfarm-icon nfarm-chevron-right" aria-hidden="true"></span>
					</div>
				</div>
			</div><!-- .row -->
		</nav>
		
	<?php } ?>
	
	<?php 
		if( !comments_open() && get_comments_number() ) {
	?>
		 
		 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nfarmtheme' ); ?></p>
		 
	<?php }} ?>
		
	<?php 
		
		$fields = array(
			
			'author' =>
				'<div class="form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
				
			// old_version 'email' => 
			// 	'<div class="form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
				
			// old_version 'url' =>
			// 	'<div class="form-group last-field"><label for="url">' . __( 'Website', 'domainreference' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
				
		);
		
		$args = array(
			
			'class_submit' => 'btn btn-block btn-lg btn-warning',
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' =>
				'<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control" name="comment" rows="4" required="required"></textarea></p>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		comment_form( $args ); 
		
	?>
	
	
</div><!-- .comments-area -->