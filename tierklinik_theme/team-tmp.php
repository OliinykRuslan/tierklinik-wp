<?php
/**
 * Template name: Team Template
 */

get_header();
$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
$vet_single = null;
$vets_term  = null;
include_once('template-parts/app_banner/index.php');
include_once('template-parts/vet_posts/list_view.php');
include_once('template-parts/go_home_btn/index.php');
?>

    <div class="overlay overlayJs"></div>
<?php
get_footer();
