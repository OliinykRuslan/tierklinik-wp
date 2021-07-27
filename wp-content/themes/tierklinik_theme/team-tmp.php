<?php
/**
 * Template name: Team Template
 */

get_header();
$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
include_once('template-parts/app_banner/index.php');
include_once('template-parts/vet_posts/list_view.php');
?>
    <a href="/" class="btn full-btn bg-green">
        <span class="arrow arrow-left mr-2"></span>
        Home
    </a>

    <div class="overlay overlayJs"></div>
<?php
get_footer();
?>
