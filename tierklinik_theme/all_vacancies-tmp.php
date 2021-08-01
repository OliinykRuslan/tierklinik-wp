<?php
/**
 * Template name: Vacancies
 */

$post_id = get_the_ID();
include_once('template-parts/vacancies/v-query.php');
$vacancies = new Vacancies;
get_header();

include_once('template-parts/app_banner/index.php');

if(!empty($vacancies->terms)):
?>
<section class="news-section vacancy">
    <div class="container mx-auto">
        <div class="news-wrap">
            <div class="item-wrap">
                <?php include_once('template-parts/vacancies/index.php');?>
            </div>
        </div>
    </div>
</section>
<?php
else: ?>
    <section>
        <div class="container mx-auto">
            <h2><?= __('Momentan ist unser Team komplett')?></h2>
        </div>
    </section>
<?php
endif;
get_footer();
