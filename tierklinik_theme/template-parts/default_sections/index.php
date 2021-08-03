<?php
$def_page_content = carbon_get_post_meta($post_id, 'def_page_content');

$html = '';
foreach($def_page_content as $content):
    switch ($content["_type"]) {
        case "title":
            $html .= '<section class="def-title"><h2>'.$content["page_any_title"].'</h2></section>';
            break;
        case "paragraph":
            $html .= '<section class="paragraph_content">'.wpautop($content["page_any_text"]).'</section>';
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
            $html .= '<section class="container mx-auto">'.
                        '<div class="single-post-cont">'.
                            '<div class="services_title">'.$content["page_any_paragraph_title"].'</div>'.
                            '<div class="duplex_side_content">'.$content["page_duplex_paragraph_content"].'</div>'.
                        '</div>'.
                     '</section>';
            break;
        case "form":
            $html .= '<section class="form-wrap">';
            if($content["show_button"] !== false){
                $class = 'application-form';
                $html .= '<p><a class="btn shadow-lg mx-auto more open-modal-form">' . __("Jetzt Bewerben").'</a></p>';
            }else(
            $class = 'form-section'
            );

            $html .= '<div class="'.$class.'">'.do_shortcode($content["form_shortcode"]).'</section>';
            $html .= '</section>';
            break;
        case "modules":
            if($content["additional_modules"] == 'about')
                $html .= get_template_part('/template-parts/about_section/index');
            if( $content["additional_modules"] == 'contacts')
                $html .= get_template_part('/template-parts/contacts_section/index');
            if($content["additional_modules"] !== 'recruiting')
                $html .= get_template_part('/template-parts/recruiting_&_career_sections/index');
            break;
    }
endforeach;
?>
<div class="container mx-auto">
<?= $html; ?>
</div>
