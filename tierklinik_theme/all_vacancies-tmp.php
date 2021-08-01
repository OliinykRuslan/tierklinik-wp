<?php
/**
 * Template name: Vacancies
 */

$post_id = get_the_ID();
get_header();

include_once('template-parts/app_banner/index.php');
?>
<section class="news-section">
    <div class="container mx-auto">
        <div class="news-wrap">
            <div class="item-wrap">
                <?php include_once('template-parts/vacancies/index.php');?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
