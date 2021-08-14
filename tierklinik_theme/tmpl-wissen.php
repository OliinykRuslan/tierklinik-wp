<?php
/**
 * Template name: Wissen
 */

include_once('template-parts/knowledge/knowledge_query.php');
$knowledge_list = new Knowledge;

$post_id = get_the_ID();
$add_sections = carbon_get_post_meta($post_id, 'additional_sections');

get_header();

include_once('template-parts/app_banner/index.php');
?>
    <section class="news-section">
        <div class="container mx-auto">

            <div class="filter-wrap">
                <select>
                    <option>Tierart</option>
                    <option>Der Kater</option>
                    <option>Hund</option>
                    <option>Sonstiges</option>
                </select>

                <select>
                    <option>Alle Fachgebiete</option>
                    <option>Alle Fachgebiete</option>
                    <option>Alle Fachgebiete</option>
                    <option>Alle Fachgebiete</option>
                </select>

                <form action="#" class="search-form">
                    <div class="search-wrap">
                        <div class="form-group">
                            <i class="fas fa-search icon-search"></i>
                            <input type="text" class="search-input" placeholder="Suchbegriff" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="" class="search-btn">
                            <button type="button">
                                <i class="fas fa-arrow-right icon-serch-btn"></i>
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>

            <div class="news-wrap expertise">
                <div class="item-wrap">
                    <?php
                    if(!empty($knowledge_list)):

                        foreach($knowledge_list->query_knowledge as $key => $item):

                            $single_item_permalink      = $item['url'];
                            $single_item_thumbnail_src  = $item["thumb_src"];
                            $single_item_thumbnail_alt  = $item["thumb_alt"]?? null;
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
