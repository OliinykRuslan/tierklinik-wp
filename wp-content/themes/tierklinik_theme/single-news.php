<?php

$post_id = get_the_ID();
get_header();

include_once('template-parts/app_banner/index.php');

the_title(); ?>
<div class="single-post-cont">
    <div class="container mx-auto">
        <?php
        the_content();
        ?>
    </div>
</div>
<?php
get_footer();
