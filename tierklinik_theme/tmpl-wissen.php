<?php
/**
 * Template name: Wissen
 */

//include_once('template-parts/knowledge/knowledge_query.php');
//$knowledge_list = new Knowledge;

$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');
$posts = apply_filters('get_q_posts', 'wissen', -1);

get_header();

include_once('template-parts/app_banner/index.php');
?>
    <section class="news-section">
        <div class="container mx-auto">
           <div class="item-wrap">
                    <?php
                    if($posts->have_posts()):

                        while($posts->have_posts()):
                            $posts->the_post();

                            $single_item_permalink      = get_the_permalink();
                            $single_item_thumbnail_src  = get_the_post_thumbnail_url();
                            $single_item_thumbnail_alt  = null;
                            $single_item_title          = get_the_title();
                            $single_item_arrow          = true;
                            include('template-parts/news/single_item.php');
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
        </div>
    </section>

<?php
if(array_search('recruiting', $add_sections) !== false)
    include('template-parts/recruiting_&_career_sections/index.php');

include_once('template-parts/go_home_btn/index.php');

if(array_search('contacts', $add_sections) !== false)
    include_once('template-parts/contacts_section/index.php');

get_footer();
