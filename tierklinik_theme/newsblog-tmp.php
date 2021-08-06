<?php
/**
 * Template name: News blog
 */
$post_id = get_the_ID();
$page_slug = get_post_field( 'post_name' );
$posts = apply_filters('news_posts_query', -1);
get_header();
if($page_slug == 'wissen'){
    $posts = apply_filters('wissen_posts_query', -1);
}elseif($page_slug == 'kundenmagazin'){
    $posts = apply_filters('kundenmagazin_posts_query', -1);
}

include_once('template-parts/app_banner/index.php');
?>
<div class="news-prev-wrap">
<?php
if($posts->have_posts()):
    while ($posts->have_posts()):
        $posts->the_post();

        $img            = get_the_post_thumbnail_url();
        $st             = get_the_date();
        $t              = get_the_title();
        $l              = get_the_permalink();
        $btn_txt        = __('More');

        if($page_slug == 'kundenmagazin'){
            $date    = strtotime(get_the_date());
            $date_f  = date('F Y', $date);
            $btn_txt = __('Magazin lesen');
            $l       = carbon_get_post_meta(get_the_ID(), 'pdf_file');
            $l_b_attr = 'download';
            $st         = 'Ausgabe ' . $date_f;
        }


        include('template-parts/recruiting_&_career_sections/index.php');
    endwhile;
wp_reset_postdata();
endif;
?>
</div>