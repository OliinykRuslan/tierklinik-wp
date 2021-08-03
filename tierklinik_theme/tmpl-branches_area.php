<?php
/**
 * Template name: Branches
 */

include_once('template-parts/branches/branches_q.php');
$knowledge_list = new Branches();

$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');

get_header();

include_once('template-parts/app_banner/index.php');
?>
<section class="news-section">
    <div class="container mx-auto">
        <div class="news-wrap expertise">
            <div class="item-wrap">
        <?php
        if(!empty($knowledge_list->branches_q)):

            foreach($knowledge_list->branches_q as $key => $item):

                $single_item_permalink      = $item['url'];
                $single_item_thumbnail_src  = $item["thumbnail"]['src'];
                $single_item_thumbnail_alt  = $item["thumbnail"]["alt"]?? null;
                $single_item_title          = $item["name"];
                $single_item_arrow          = false;
                include('template-parts/news/single_item.php');

            endforeach;
        endif; ?>
            </div>
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