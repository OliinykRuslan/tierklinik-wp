<?php

class Branches
{
    public $branches_q;

    function __construct()
    {
        $this->branches_q = $this->get_branches();
    }

    private function get_branches()
    {
        $terms = get_terms([
            'taxonomy' => 'branch',
            'hide_empty' => false,
            'limit' => -1
        ]);

        $res = array();
        foreach ($terms as $term) {
            $thmb_id = carbon_get_term_meta($term->term_id, 'tax_thumbnail');
            $attachment = get_post($thmb_id);
            $res[] = array(
                'id' => $term->term_id,
                'url' => get_term_link($term->term_id),
                'name' => $term->name,
                'thumbnail' => array(
                    'src' => $attachment->guid,
                    'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)
                )
            );

        }
        return $res;
    }
}
