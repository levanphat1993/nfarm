<h1>Nfarm Sidebar Options</h1>
<?php settings_errors(); ?>
<?php 

    $picture = esc_attr(get_option('profile_picture'));
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName =  $firstName . ' ' . $lastName;
    $desperation = esc_attr(get_option('user_desperation'));
    

?>

<div class="nfarm-sidebar-preview">
    <div clas="nfarm-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture  ?>);"></div>
        </div>
        <h1 class="nfarm-username"><?php print($fullName); ?></h1>
        <h2 class="nfarm-description"><?php print($desperation); ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>


<form method="post" action="options.php" class="nfarm-general-form">
    <?php settings_fields('nfarm-settings-group'); ?>
    <?php do_settings_sections('alecaddd_nfarm'); ?>
    <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>