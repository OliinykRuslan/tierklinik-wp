<?php
$def_page_content = carbon_get_post_meta($post_id, 'def_page_content');

$html = '';
foreach($def_page_content as $content):

    switch ($content["_type"]) {
        case "title":
            $html .= '<div class="container mx-auto">'.
                        '<div class="def-title"><h2>'.$content["page_any_title"].'</h2></div>'.
                     '</div>';
            break;
        case "paragraph":
            $html .= '<div class="container mx-auto">'.
                        '<div class="paragraph_content">'.wpautop($content["page_any_text"]).'</div>'.
                    '</div>';
            break;
        case "image_banner":
            $attachment = get_post($content["page_any_img"]);
            $alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
            $src = $attachment->guid;
            $html .= '<section class="tax_banner">'.
                        '<picture>'.
                            '<img src="'.$src.'" alt="'.$alt.'">'.
                        '</picture>'.
                    '</section>';
            break;
        case "duplex_paragraph":
            $html .= '<div class="container mx-auto">'.
                        '<div class="single-post-cont">'.
                            '<div class="services_title">'.$content["page_any_paragraph_title"].'</div>'.
                            '<div class="duplex_side_content">'.$content["page_duplex_paragraph_content"].'</div>'.
                        '</div>'.
                     '</div>';
            break;
        case "modules":
            if(array_search('about', $content["additional_modules"]) !== false)
                $html .= include_once(get_template_directory().'/template-parts/about_section/index.php');
            if(array_search('contacts', $content["additional_modules"]) !== false)
                $html .= include_once(get_template_directory().'/template-parts/contacts_section/index.php');
            if(array_search('recruiting', $content["additional_modules"]) !== false)
                $html .= include_once(get_template_directory().'/template-parts/recruiting_&_career_sections/index.php');
            break;
    }
endforeach;

echo $html;