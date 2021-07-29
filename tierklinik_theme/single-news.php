<?php

$post_id = get_the_ID();
get_header();

include_once('template-parts/app_banner/index.php');

the_title(); ?>
<div class="single-post-cont">
    <?php
    the_content();
    ?>
</div>
<?php
get_footer();
