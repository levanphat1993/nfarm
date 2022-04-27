<h1>Nfarm Theme Support</h1>
<?php settings_errors(); ?>

<?php 

?>

<form method="post" action="options.php" class="nfarm-general-form" >
    <?php settings_fields('nfarm-theme-support') ?>
    <?php do_settings_sections('alecaddd_nfarm_theme') ?>
    <?php submit_button(); ?>
</form>