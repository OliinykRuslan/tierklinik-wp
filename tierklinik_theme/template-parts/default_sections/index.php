<?php
$def_page_content = carbon_get_post_meta($post_id, 'def_page_content');
$svg = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#fff"
        viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" class="btn-ico">
            <path d="M443.733,307.2c-9.426,0-17.067,7.641-17.067,17.067v102.4c0,9.426-7.641,17.067-17.067,17.067H68.267
                c-9.426,0-17.067-7.641-17.067-17.067v-102.4c0-9.426-7.641-17.067-17.067-17.067s-17.067,7.641-17.067,17.067v102.4
                c0,28.277,22.923,51.2,51.2,51.2H409.6c28.277,0,51.2-22.923,51.2-51.2v-102.4C460.8,314.841,453.159,307.2,443.733,307.2z"/>
            <path d="M335.947,295.134c-6.614-6.387-17.099-6.387-23.712,0L256,351.334V17.067C256,7.641,248.359,0,238.933,0
                s-17.067,7.641-17.067,17.067v334.268l-56.201-56.201c-6.78-6.548-17.584-6.36-24.132,0.419c-6.388,6.614-6.388,17.099,0,23.713
                l85.333,85.333c6.657,6.673,17.463,6.687,24.136,0.031c0.01-0.01,0.02-0.02,0.031-0.031l85.333-85.333
                C342.915,312.486,342.727,301.682,335.947,295.134z"/>
        </svg>';
$svg_arrow_to_right = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 476.213 476.213">
            <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5
								345.606,368.713 476.213,238.106 "/>
        </svg>';


function link_banner_block_double_generate($content=false){
    $thmb       = carbon_get_theme_option('recruiting_img');
    $subtitle   = carbon_get_theme_option('recruiting_slogan');
    $title      = carbon_get_theme_option('recruiting_tile');
    $btn_txt    = carbon_get_theme_option('recruiting_btn_txt');
    $btn_link   = $content["double_block_btn_link"]   ?? '#';

    if(!empty($content["double_block_img"])){
        $attachment = get_post($content["double_block_img"]);
        $thmb = $attachment->guid;
    }
    if(!empty($content["double_block_subtitle"])){
        $subtitle = $content["double_block_subtitle"];
    }
    if(!empty($content["double_block_title"])){
        $title = $content["double_block_title"];
    }
    if(!empty($content["double_block_btn_txt"])){
        $btn_txt = $content["double_block_btn_txt"];
    }
    if(!empty($content["double_block_btn_link"])){
        $btn_link = $content["double_block_btn_link"];
    }

    $res = '<section class="competence-section" style="background: ' . carbon_get_theme_option("recruiting_container_bg") . '">
                <div class="competence-wrap">
                      <div class="competence-img" style="background-image: url(' . $thmb . ');"></div>
                      <div class="text-item">
                          <p class="section-subtitle color-green">' . $subtitle . '</p>
                          <h2 class="section-title">' . $title . '</h2>
                          <a href="' . $btn_link . '" class="btn shadow-lg">' . $btn_txt . '</a>
                      </div>
                </div>
            </section>';
    return $res;
}

function vacancies_block_generate($content, $arrow){
    $array = $content["vacancies_list"];
    $title = $content["vacancies_block_title"];

    $res = '<section class="news-section vacancy" style="background: #fff">
                <div class="container mx-auto">
                     <div class="_news-wrap">
                          <div class="title-wrap" style="margin: 0 auto"><h2>'.wpautop($title).'</h2></div>
                                <div class="item-wrap">';
                              foreach($array as $v):
                              $post = get_post($v);
                              $persent = carbon_get_post_meta($v, 'vacancy_employment_percentage');
                         $res .= '<a href="'.get_post_permalink($v).'" class="news-item">
                                     <div class="news-description">
                                          <p class="news-title">'.
                                            $post->post_title.
                                            '<span class="percent">'.$persent.'</span>
                                          </p>
                                     </div>
                                     <div class="arrow">'.$arrow.'</div>
                                  </a>';
                           endforeach;
                $res .= '</div>
                    </div>
                </div>
            </section>';
            return $res;
}

function facts_section_generate($content){
    $attachment = get_post($content['facts_section_bg']);
    $thmb = $attachment->guid;
    $subtitle = $content['facts_section_subtitle'];
    $title = $content['facts_section_title'];
    $facts_list = $content['facts_list'];
    $btn_txt = $content['facts_section_btn_txt'];
    $btn_lnk = $content['facts_section_btn_link'];

    $res = '<section class="facts-section" style="background-image: url('.$thmb.') ;">
    <div class="container mx-auto">
        <p class="section-subtitle">'.$subtitle.'</p>
        <h2 class="section-title">'.$title.'</h2>
        <div class="facts-wrap">';
            foreach ($facts_list as $fact):
       $res .= '<div class="txt-item">
                    <p class="section-subtitle">'.$fact["fact_value"].'</p>
                    <p class="section-txt">'.$fact["facts_title"].'</p>
                </div>';
            endforeach;
$res .= '</div>
         <a href="'.$btn_lnk.'" class="btn shadow-lg mx-auto">'.$btn_txt.'</a>
    </div>
</section>';

return $res;
}

$html = '';
foreach ($def_page_content as $content):
    switch ($content["_type"]) {
        case "title":
            $html .= '<div class="container mx-auto">' .
                '<section class="def-title"><h2>' . $content["page_any_title"] . '</h2></section>' .
                '</div>';
            break;
        case "paragraph":
            $html .= '<div class="container mx-auto">' .
                '<section class="paragraph_content">' . wpautop($content["page_any_text"]) . '</section>' .
                '</div>';
            break;
        case "image_banner":
            $attachment = get_post($content["page_any_img"]);
            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
            $src = $attachment->guid;
            $html .= '<section class="tax_banner">' .
                '<picture>' .
                '<img src="' . $src . '" alt="' . $alt . '">' .
                '</picture>' .
                '</section>';
            break;
        case "duplex_paragraph":
            $html .= '<section class="container mx-auto">' .
                '<div class="single-post-cont flex">';
            $html .= '<div class="services_title">';
            if ($content['left_side_type'] == 'title'):
                $html .= '<h3>' . $content["page_any_paragraph_title"] . '</h3>';
            endif;
            if ($content['left_side_type'] == 'image'):
                $th_id = $content['portfolio_img'];
                $attachment = get_post($th_id);
                $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                $src = $attachment->guid;
                $html .= '<div class="veterinarians-item">';
                $html .= '<div class="photo">
                                    <picture>
                                        <img src="' . $src . '" alt="' . $alt . '">
                                    </picture>
                                </div>';
                if (!empty($content["main_text_portfolio"])):
                    $html .= '<div class="description p-5">
                                        <div class="item-title">' . $content["main_text_portfolio"] . '</div>';
                    if (!empty($content["additional_text_portfolio"])):
                        $html .= '<div>';
                        foreach ($content["additional_text_portfolio"] as $item):
                            $html .= '<p>' . $item["single_additional_text_portfolio"] . '</p>';
                        endforeach;
                        $html .= '</div>';
                    endif;
                    $html .= '</div>';
                    $html .= '</div>';

                    if($content["show_upload_button"]):
                        $html .= '<a href="'.$content["upload_file"].'" download class="download-btn">'.
                        $svg. '<span>'.__("Download Pdf").'</span></a>';
                        endif;
                endif;
            endif;
            $html .= '</div>' .
                '<div class="duplex_side_content">' . wpautop($content["page_duplex_paragraph_content"]). '</div>' .
                '</div>' .
                '</section>';
            break;
        case "form":
            $html .= '<section class="form-wrap" style="background-color: rgba(64,204,181,.1);">';
            if ($content["show_button"] !== false) {
                $class = 'application-form';
                $html .= '<p><a class="btn shadow-lg mx-auto more open-modal-form">' . __("Jetzt Bewerben") . '</a></p>';
            } else(
            $class = 'form-section'
            );

            $html .= '<div class="' . $class . '">' . do_shortcode($content["form_shortcode"]) . '</section>';
            $html .= '</section>';
            break;
        case "modules":
            if ($content["additional_modules"] == 'about') {
                $html .= '<section class="facts-section" style="background-image: url(' . carbon_get_theme_option("about_section_bg") . ') ;">
                            <div class="container mx-auto">
                                <p class="section-subtitle">' . carbon_get_theme_option("about_section_subtitle") . '</p>
                                <h2 class="section-title">' . carbon_get_theme_option('about_section_title') . '</h2>
                                <div class="facts-wrap">';
                foreach (carbon_get_theme_option('about_section_facts') as $fact):
                    $html .= '<div class="txt-item">
                                    <p class="section-subtitle">' . $fact["about_fact_val"] . '</p>
                                    <p class="section-txt">' . $fact["about_fact_title"] . '</p>
                                </div>';
                endforeach;
                $html .= '</div>
                    <a href="#" class="btn shadow-lg mx-auto">' . carbon_get_theme_option("about_section_btn_txt") . '</a>
                </div>
            </section>';
            };
            if ($content["additional_modules"] == 'contacts') {
                $img_id = carbon_get_theme_option('contacts_section_thumb');
                $attachment = get_post($img_id);
                $numbers = carbon_get_theme_option('contacts_section_phones');
                $schedules = carbon_get_theme_option('schedule');
                $networks = carbon_get_theme_option('networks_list');
                $copyright = carbon_get_theme_option('copyright');
                $info_mail = carbon_get_theme_option('info_mail');

                $emergency_title = carbon_get_theme_option('emergency_title');
                $emergency_phone = carbon_get_theme_option('emergency_phone');
                $emergency_add_txt = carbon_get_theme_option('emergency_substring');
                $emergency_link_text = carbon_get_theme_option('emergency_link_text');
                $emergency_link = carbon_get_theme_option('emergency_link');
                $html .= '<section class="contact-section">
                            <a href="" id="backtotop" class="backtop-btn"><i class="fas fa-arrow-up"></i></a>
                            <div class="contact-container container mx-auto">
                                <div class="contact-wrap">
                                     <div class="contact-col contact-img">
                                          <picture>
                                               <img src="' . $attachment->guid . '" alt="' . get_post_meta($attachment->ID, '_wp_attachment_image_alt.', true) . '">
                                          </picture>
                                     </div>
                                     
                                     <div class="contact-col">
                                        <h6 class="section-subtitle color-green order-1">' . __("Kontakt") . '</h6>
                                        <div class="mb-4 order-2">' . wpautop(carbon_get_theme_option("contacts_section_address")) . '</div>';

                foreach ($numbers as $number):

                    $html .= '<div class="md:mb-2 order-3 md:flex">
                                <span class="mr-8 hidden md:block">' . $number["contact_ph_desc"] . '</span>
                                <a href="' . str_replace(" ", "", $number["contact_ph_num"]) . '" class="mob-btn"> ' . $number["contact_ph_num"] . '</a>
                              </div>';

                endforeach;

                $html .= '<a href="tel: ' . str_replace(" ", "", $emergency_phone) . '" class="btn shadow-lg bg-red max-w-full my-6 order-5 emergency-btn">
                    <span class="mr-2">' . $emergency_title . ' ' . $emergency_phone . '</span>
                    <span class="text-xs">' . $emergency_add_txt . '</span>
                </a>';

                if (!empty($info_mail)):
                    $html .= '<a href="' . $info_mail . '" class="btn shadow-lg max-w-full order-6">' . $info_mail . '</a>';
                endif;
                $html .= '</div>
                        <div class="contact-col">
                        <h6 class="section-subtitle color-green">' . __("Öffnungszeiten") . '</h6>';
                foreach ($schedules as $schedule):
                    $html .= '<div class="mb-6">';
                    if (!empty($schedule['schedule_title'])):
                        $html .= '<p>' . $schedule["schedule_title"] . '</p>';
                    endif;

                    if (!empty($schedule['schedule_graphic'])):
                        $html .= '<p>' . $schedule["schedule_graphic"] . '</p>';
                    endif;

                    if (!empty($schedule['schedule_desc'])):

                        $html .= '<p class="font-light">' . $schedule["schedule_desc"] . '</p>';
                    endif;
                    $html .= '</div>';
                endforeach;

                if (!empty($networks)):
                    $html .= '<ul class="social-list flex mt-3">';
                    foreach ($networks as $network):
                        $html .= '<li><a href="' . $network["network_href"] . '"><i class="fab ' . $network["network_icon_class"] . '"></i></a></li>';
                    endforeach;
                    $html .= '</ul>';
                endif;
                $html .= '</div>
                                </div>
                            </div>
                          </section>';
            }
            if ($content["additional_modules"] == 'recruiting') {
                $html .= link_banner_block_double_generate();
            }
            break;
        case "veterinarians":
            include_once(get_template_directory() . '/template-parts/vet_posts/posts_data.php');
            $vets = new Veterinarians($post_id, null, null);
            $html .= '<section class="veterinarians-section pt-20 pb-32" style="background: #40ccb519">
    <div class="container mx-auto">';
            if (!empty($content['vet_cont_subtitle'])):

                $html .= '<h6 class="section-subtitle color-green">' . $content['vet_cont_subtitle'] . '</h6>';
            endif;

            if (!empty($content['vet_cont_title'])):
                $html .= '<h2 class="section-title">' . $content['vet_cont_title'] . '</h2>';
            endif;

            $html .= '<div class="veterinarians carousel">';
            foreach ($vets->query_posts as $post):

                $html .= '<div class="slider-item max-w-xs shadow-lg">
                <a href="' . $post['guid'] . '">
                    <div class="slider-photo">
                        <picture>
                            <img src="' . $post["thumbnail"]["src"] . '" alt="' . $post["thumbnail"]["alt"] . '">
                        </picture>
                    </div>

                    <div class="slider-description p-5">
                        <div class="item-title">' . $post["title"] . '</div>
                        <div>';
                if (!empty($post['rank'])):
                    $html .= '<p>' . $post["rank"] . '</p>';
                endif;

                if (!empty($post['diploma'])):
                    $html .= '<p>' . $post["diploma"] . '</p>';
                endif;
                $html .= '</div>
                    </div>
                </a>
            </div>';

            endforeach;
            $html .= '</div>
                </div>
            <a href="/team" class="btn shadow-lg mx-auto <?= $button_class?>">' . __("Alle Tierärzte") . '</a>
        </section>';
            break;
        case 'gallery':
            $html .= '<section class="galerie-section">
                        <div class="container mx-auto">
                            <p class="section-subtitle color-green">' . $content["cont_gallery_subtitle"] . '</p>
                            <h2 class="section-title">' . $content["cont_gallery_title"] . '</h2>
                            <div class="galerie-wrap">';

            foreach ($content["cont_gallery_items"] as $image):
                $attachment = get_post($image["cont_gallery_img"]);
                $src = $attachment->guid;
                $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
                $html .= '<div class="galerie-img">
                                        <picture>
                                            <img src="' . $src . '" alt="' . $alt . '">
                                        </picture>
                                    </div>';
            endforeach;
            $html .= '</div>
                                <a href="' . $content["cont_gallery_btn_link"] . '" class="btn shadow-lg mx-auto">' . __("zur Galerie") . '</a>
                            </div>
                        </section>';

            break;
        case 'quote':
            $html .= '<section class="aarau-west-section text-center">
                            <div class="container mx-auto">
                                <h3 class="section-title">«'.$content["slogan_content"].'»</h3>';
                                if(!empty($content["slogan_content"])):
                  $html .=    '<p class="section-subtitle">'.$content["slogan_author"].'</p>';
                                endif;
            $html .=       '</div>
                        </section>';
            break;
        case 'wissen':
            $w_array = $content['wissen_list'];
            $html .= '<section class="news-section" style="background: #40ccb519">
                            <div class="container mx-auto">
                                <div class="_news-wrap">
                                    <div class="title-wrap">
                                    <span class="title-section">wissen</span>
                                    <h2 style="text-align: center;">'.$content['wissen_block_title'].'</h2>
                                    </div>';
                                foreach($w_array as $w):
                                    $post = get_post($w);
                                    $th   = get_post_thumbnail_id($w);
                                    $attachment = get_post($th);
                                    $th_src = $attachment->guid;
                                    $alt    = get_post_meta($th, '_wp_attachment_image_alt', true);
                                    $html .= '<a href="'.get_post_permalink($w).'" class="news-item">
                                                    <picture>
                                                        <img src="'.$th_src.'" class="news-img" alt="'.$alt.'">
                                                    </picture>
                                                    <div class="news-description">
                                                        <p class="news-title">'.$post->post_title.'</p>
                                                    </div>
                                                    <div class="arrow">'.$svg_arrow_to_right.'</div>
                                                </a>';
                                endforeach;
                $html .=        '</div>
                            </div>
                      </section>';
                break;
        case 'link_banner_block_double':
            $html .= link_banner_block_double_generate($content);
            break;
        case 'vacancies':
            $html .= vacancies_block_generate($content, $svg_arrow_to_right);
            break;
        case 'facts_section':
            $html = facts_section_generate($content);
            break;
    }
endforeach;

echo $html;

include_once(get_template_directory() . '/template-parts/go_home_btn/index.php');