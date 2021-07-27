<?php

class Gallery
{
    public $title;
    public $subtitle;
    public $images;
    public $btn_txt;

    function __construct($id){
        $this->title    = $this->get_gallery_title($id);
        $this->subtitle = $this->get_gallery_subtitle($id);
        $this->images   = $this->get_gallery_imgs($id);
        $this->btn_txt  = $this->get_btn_txt($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    private function get_gallery_title($id){
        return carbon_get_post_meta($id, 'gallery_title');
    }

    /**
     * @param $id
     * @return mixed
     */
    private function get_gallery_subtitle($id){
        return carbon_get_post_meta($id, 'gallery_subtitle');
    }

    /**
     * @param $id
     * @return array
     */
    private function get_gallery_imgs($id){
        $images = carbon_get_post_meta($id, 'gallery_images');
        $res = array();
        foreach($images as $image){
            $attachment = get_post($image['gallery_img']);

            $res[] = array(
                'src'   => $attachment->guid,
                'alt'   => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)
            );
        }
        return $res;
    }

    /**
     * @param $id
     * @return mixed
     */
    private function get_btn_txt($id){
        return carbon_get_post_meta($id, 'gallery_btn_txt');
    }
}
