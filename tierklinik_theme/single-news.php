<?php
$post_id = get_the_ID();
get_header();

include_once('template-parts/app_banner/index.php');

?>
    <div class="single-post-cont">
        <div class="container mx-auto">
            <h2 style="font-size: 2em;text-align: center;margin: 2rem auto;"><?php the_title()?></h2>
            <?php
            the_content();
            ?>
        </div>
    </div>
<?php
get_footer();
