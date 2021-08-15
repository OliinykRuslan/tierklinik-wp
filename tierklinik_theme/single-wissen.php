<?php
$post_id = get_the_ID();
get_header();

include_once('template-parts/app_banner/index.php');

?>
    <?php
    include_once(get_template_directory().'/template-parts/default_sections/index.php');
    ?>
<?php
get_footer();
