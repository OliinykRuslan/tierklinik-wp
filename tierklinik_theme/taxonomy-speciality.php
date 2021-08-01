<?php

$tax_terms = get_queried_object();
$post_id = $tax_terms->term_id;
get_header();

include_once('template-parts/app_banner/index.php');
?>

<?php
get_footer();
