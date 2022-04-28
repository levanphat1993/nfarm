<h1>Nfarm Contact Form</h1>
<?php settings_errors(); ?>

<?php 

?>

<form method="post" action="options.php" class="nfarm-general-form">
	<?php settings_fields( 'nfarm-contact-options' ); ?>
	<?php do_settings_sections( 'alecaddd_nfarm_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>