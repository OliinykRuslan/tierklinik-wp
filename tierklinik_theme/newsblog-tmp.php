<?php
/**
 * Template name: News blog
 */
$post_id = get_the_ID();
get_header();
$news_posts = apply_filters('news_posts_query', -1);
include_once('template-parts/app_banner/index.php');
?>
<div class="news-prev-wrap">
<?php
if($news_posts->have_posts()):
    while ($news_posts->have_posts()):
        $news_posts->the_post();

        $img            = get_the_post_thumbnail_url();
        $st             = get_the_date();
        $t              = get_the_title();
        $l              = get_the_permalink();
        $btn_txt        = __('More');

        include('template-parts/recruiting_&_career_sections/index.php');
    endwhile;
wp_reset_postdata();
endif;
?>
</div>