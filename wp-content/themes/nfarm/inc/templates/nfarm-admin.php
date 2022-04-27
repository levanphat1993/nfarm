<h1>Nfarm Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('nfarm-settings-group'); ?>
    <?php do_settings_sections('alecaddd_nfarm'); ?>
    <?php submit_button(); ?>
</form>