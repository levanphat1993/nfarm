<?php	
/*
	
@package nfarmtheme
	
	========================
		WIDGET CLASS
	========================
*/

class Nfarm_Profile_Widget extends WP_Widget {
	
	
	//setup the widget name, description, etc...
	public function __construct()
    {
        $widget_ops = array(
			'classname' => 'nfarm-profile-widget',
			'description' => 'Custom Nfarm Profile Widget',
		);

		parent::__construct('nfarm_profile', 'Nfarm Profile', $widget_ops);
	}
	
	//back-end display of widget
	public function form($instance)
    {
        echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields of this Widget from <a href="./admin.php?page=alecaddd_nfarm">This Page</a></p>';
    }
	
	//front-end display of widget
	public function widget($args, $instance) 
    {
        $picture = esc_attr(get_option('profile_picture'));
		$firstName = esc_attr(get_option('first_name'));
		$lastName = esc_attr(get_option('last_name'));
		$fullName = $firstName . ' ' . $lastName;
		$description = esc_attr(get_option('user_description'));
		
		$twitter_icon = esc_attr(get_option('twitter_handler'));
		$facebook_icon = esc_attr(get_option('facebook_handler'));
		$gplus_icon = esc_attr(get_option('gplus_handler'));
		
		echo $args['before_widget'];
		?>
		<div class="text-center">
			<div class="image-container">
				<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
			</div>
			<h1 class="nfarm-username"><?php print $fullName; ?></h1>
			<h2 class="nfarm-description"><?php print $description; ?></h2>
			<div class="icons-wrapper">
				<?php if( !empty( $twitter_icon ) ): ?>
					<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="nfarm-icon-sidebar nfarm-icon nfarm-twitter"></span></a>
				<?php endif; 
				if( !empty( $gplus_icon ) ): ?>
					<a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="nfarm-icon-sidebar nfarm-icon nfarm-googleplus"></span></a>
				<?php endif; 
				if( !empty( $facebook_icon ) ): ?>
					<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="nfarm-icon-sidebar nfarm-icon nfarm-facebook"></span></a>
				<?php endif; ?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
}

add_action( 'widgets_init', function() {
	register_widget( 'Nfarm_Profile_Widget' );
} );


/*
	Edit default WordPress widgets
*/

function nfarm_tag_cloud_font_change($args) // Check old version wp 3.5
{
	$args['smallest'] = 8;
	$args['largest'] = 8;

	return $args;
}

add_filter( 'widget_tag_cloud_args', 'nfarm_tag_cloud_font_change' );



