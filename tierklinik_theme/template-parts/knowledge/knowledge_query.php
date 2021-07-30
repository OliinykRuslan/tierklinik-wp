<?php

class Knowledge
{
    public $query_knowledge;

    function __construct(){
        $this->query_knowledge = $this->get_tax();
    }

    private function get_tax(){
        $terms = get_terms([
            'taxonomy' => 'knowledge_area',
            'hide_empty' => false,
        ]);

        $res = array();
        foreach($terms as $key => $term){
            $thmb_id = get_term_meta($term->term_id, '_tax_thumbnail', true);
            $i = array(
                'id'    => $term->term_id,
                'url'   => get_term_link($term->term_id),
                'name'  => $term->name,
                'thumb_src' => wp_get_attachment_image_url($thmb_id),
                'thumb_alt' => get_post_meta($term->term_id, '_wp_attachment_image_alt', true),
            );
            array_push($res, $i);
        }

        return $res;
    }


}
