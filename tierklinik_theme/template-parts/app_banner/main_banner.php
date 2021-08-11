<?php

/**
 * Class MainBanner
 */
class MainBanner
{
    public $title;
    public $subtitle;
    public $button;
    public $background;
    public $right_side_img;
    public $is_emergency;
    public $emergency_title;
    public $emergency_phone;
    public $emergency_add_txt;
    public $banner_background_type;
    public $banner_bg_img;

    /**
     * MainBanner constructor.
     * @param $id
     */
    function __construct($id){
        $this->title                    = $this->get_banner_title($id);
        $this->subtitle                 = $this->get_field_value($id, 'banner_page_subtitle');
        $this->button                   = $this->get_btn($id);
        $this->right_side_img           = $this->get_attachment($id, 'banner_image');
        $this->is_emergency             = $this->get_field_value($id, 'show_emergency_block');
        $this->emergency_title          = $this->get_field_value($id, 'emergency_title');
        $this->emergency_phone          = $this->get_field_value($id, 'emergency_phone');
        $this->emergency_add_txt        = $this->get_field_value($id, 'emergency_substring');
        $this->banner_background_type   = $this->get_field_value($id, 'banner_background_type');
        $this->banner_bg_img            = $this->get_field_value($id, 'banner_background_img');
        $this->background               = $this->get_background($id);
    }

    /**
     * @param $id
     * @param $field_name
     * @return mixed
     */
    private function get_field_value($id, $field_name){
        $res = '';
        if(function_exists('carbon_get_post_meta')){
            if(!empty(carbon_get_post_meta($id, $field_name))){
                $res = carbon_get_post_meta($id, $field_name);
            }
        }
        return $res;
    }

    /**
     * @param $id
     * @return mixed|string
     */
    private function get_banner_title($id){
        $t = carbon_get_post_meta($id, 'banner_title');
        if(empty($t)){
            $t = get_the_title($id);
        }
        return $t;
    }

    /**
     * @param $id
     * @return array
     */
    private function get_btn($id){
        $btn_txt ='';
        $btn_lnk = '';

        if(!empty(carbon_get_post_meta($id, 'banner_button_text'))){
            $btn_txt =  carbon_get_post_meta($id, 'banner_button_text');
        }
        if(!empty(carbon_get_post_meta($id, 'banner_button_link'))){
            $btn_lnk =  carbon_get_post_meta($id, 'banner_button_link');
        }

        return [
            'txt' => $btn_txt,
            'lnk' => $btn_lnk
        ];
    }

    /**
     * @param $id
     * @return string
     */
    private function get_background($id){
        if($this->banner_background_type === "gradient"){
            $from = '#3fc7b1';
            $to   = '#36637a';
            if(!empty(carbon_get_post_meta($id, 'banner_gradient_start'))){
                $from = carbon_get_post_meta($id, 'banner_gradient_start');
            }

            if(!empty(carbon_get_post_meta($id, 'banner_gradient_end'))){
                $to = carbon_get_post_meta($id, 'banner_gradient_end');
            }

            return sprintf("style='background: linear-gradient(45deg,%s,%s)'", $from, $to);

        }elseif($this->banner_background_type === "image"){
            if(!empty($this->banner_bg_img)){
                $att = $this->get_attachment($id, 'banner_background_img');
                return sprintf("style='background: no-repeat center url(%s); background-size: cover;'", $att['src']);
            }
        }
    }

    /**
     * @param $post_id
     * @param $field_name
     * @return array
     */
    function get_attachment($post_id, $field_name)
    {
        $attachment_id = carbon_get_post_meta($post_id, $field_name);
        if(!empty($attachment_id)){
            $attachment = get_post($attachment_id);
            return array(
                'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                'caption' => $attachment->post_excerpt,
                'description' => $attachment->post_content,
                'href' => get_permalink($attachment->ID),
                'src' => $attachment->guid,
                'title' => $attachment->post_title
            );
        }
    }

}
