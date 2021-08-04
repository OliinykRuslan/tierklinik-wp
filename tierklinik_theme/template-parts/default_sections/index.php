<?php
$def_page_content = carbon_get_post_meta($post_id, 'def_page_content');

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
                '<section class="paragraph_content">' . $content["page_any_text"] . '</section>' .
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

                    if($content["show_upload_button"]):
                        $html .= '<a href="'.$content["upload_file"].'" download>'.__("Download Pdf").'</a>';
                        endif;
                endif;
            endif;
            $html .= '</div>' .
                '<div class="duplex_side_content">' . $content["page_duplex_paragraph_content"] . '</div>' .
                '</div>' .
                '</section>';
            break;
        case "form":
            $html .= '<section class="form-wrap">';
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
                $img = $img ?? carbon_get_theme_option('recruiting_img');
                $subtitle = $st ?? carbon_get_theme_option('recruiting_slogan');
                $content = $t ?? carbon_get_theme_option('recruiting_tile');
                $link = $l ?? '#';
                $button_text = $btn_txt ?? carbon_get_theme_option('recruiting_btn_txt');

                $html .= '<section class="competence-section" style="background: ' . carbon_get_theme_option("recruiting_container_bg") . '">
                            <div class="competence-wrap">
                                <div class="competence-img" style="background-image: url(' . $img . ');">
                                </div>
                                <div class="text-item">
                                    <p class="section-subtitle color-green">' . $subtitle . '</p>
                                    <h2 class="section-title">' . $content . '</h2>
                                    <a href="' . $link . '" class="btn shadow-lg">' . $button_text . '</a>
                                </div>
                            </div>
                        </section>';
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
    }
endforeach;

echo $html;

include_once(get_template_directory() . '/template-parts/go_home_btn/index.php');