<h1>Nfarm Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="nfarm-general-form">
	<?php settings_fields('nfarm-custom-css-options'); ?>
	<?php do_settings_sections('alecaddd_nfarm_css'); ?>
	<?php submit_button(); ?>
</form>