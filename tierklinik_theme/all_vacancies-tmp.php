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
    <section class="not-found-section">
            <h2 class="section-title"><?= __('Momentan ist unser Team komplett')?></h2>

        <a href="/" class="btn shadow-lg mx-auto">
            <?= __('Zurück zur Startseite') ?>
        </a>
    </section>

    <picture>
        <!--            <source srcset="dist/assets/images/webp/Fotobanner_Desktop.webp" type="image/webp">-->
        <img src=<?= get_template_directory_uri() . "/dist/assets/images/Fotobanner_Desktop.jpg"?> alt="">
    </picture>
<?php

    include_once('template-parts/go_home_btn/index.php');
endif;
get_footer();
