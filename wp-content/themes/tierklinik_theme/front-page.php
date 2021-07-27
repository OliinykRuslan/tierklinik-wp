<?php
get_header();
$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
include_once('template-parts/app_banner/index.php');
include_once('template-parts/cookie_section/index.php');
include_once('template-parts/vet_posts/list_view.php');

if(array_search('recruiting', $add_sections) !== false)
    include_once('template-parts/recruiting_&_career_sections/recruiting_view.php');

if(array_search('about', $add_sections) !== false)
    include_once('template-parts/about_section/index.php');

if(carbon_get_post_meta($post_id, 'show_gallery'))
    include_once('template-parts/page_gallery/index.php');

if(array_search('contacts', $add_sections) !== false)
    include_once('template-parts/contacts_section/index.php');


get_footer();
