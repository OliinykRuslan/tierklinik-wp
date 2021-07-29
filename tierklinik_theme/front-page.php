<?php
get_header();
$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
$news_posts = apply_filters('news_posts_query', 1);

include_once('template-parts/app_banner/index.php');
include_once('template-parts/cookie_section/index.php');
include_once('template-parts/vet_posts/list_view.php');

if(array_search('recruiting', $add_sections) !== false)
    include('template-parts/recruiting_&_career_sections/index.php');

if($news_posts->have_posts()):?>
    <section class="newsblog-section">
        <div class="container mx-auto">
            <h2 class="section-title">Newsblog</h2>
    <?php
    while ($news_posts->have_posts()):
        $news_posts->the_post();?>
        <div class="newsblog-wrap shadow-lg">
            <div class="img-wrap">
                <picture>
<!--                    <source srcset="assets/images/webp/istockphoto-1207249570-2048x2048.webp" type="image/webp">-->
                    <img src="<?= get_the_post_thumbnail_url()?>" alt="1">
                </picture>
            </div>
            <div class="text-wrap">
                <p class="section-subtitle color-green"><?= the_date()?></p>
                <p class="section-txt"><?= the_title()?></p>
            </div>
        </div>
        <a href="/news" class="btn shadow-lg mx-auto">
            <?= __('zum Blog') ?>
        </a>
    <?php
    endwhile;?>
        </div>
	</section>
<?php
wp_reset_postdata();
endif;


if(array_search('about', $add_sections) !== false)
    include_once('template-parts/about_section/index.php');

if(carbon_get_post_meta($post_id, 'show_gallery'))
    include_once('template-parts/page_gallery/index.php');

if(array_search('contacts', $add_sections) !== false)
    include_once('template-parts/contacts_section/index.php');


get_footer();
