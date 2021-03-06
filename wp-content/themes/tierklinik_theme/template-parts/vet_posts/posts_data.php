<?php

class Veterinarians
{
    public $query_posts;
    public $container_settings;

    /**
     * Veterinarians constructor.
     * @param null $id
     * @param false $single
     */
    function __construct($id=null, $single=false){
        $this->query_posts          = $this->get_veterinarians_posts($id,$single);
        $this->container_settings   = $this->get_container_settings($id,$single);
    }

    /**
     * @param $id
     * @param $single
     * @return array
     */
    private function get_veterinarians_posts($id,$single){
        $query = new WP_Query;

        $args = array(
            'post_type' => 'veterinarians'
        );

        if($single){
            $args['p'] = $id;
        }
        $myposts = $query->query($args);

        $res = array();

        foreach($myposts as $post){
            $attachment_id  = get_post_thumbnail_id($post->ID);
            $attachment     = get_post($attachment_id);
            $rank           = carbon_get_post_meta($post->ID, 'rank');
            $diploma        = carbon_get_post_meta($post->ID, 'diploma');
            $resume         = carbon_get_post_meta($post->ID, 'resume');
            $res[] = array(
                'id'        => $post->ID,
                'post_date' => $post->post_date,
                'title'     => $post->post_title,
                'guid'      => $post->guid,
                'rank'      => $rank,
                'diploma'   => $diploma,
                'resume'    => $resume,
                'thumbnail' => array(
                    'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                    'src' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
                )
            );
        }
        $myposts = null;
//        wp_reset_postdata();
        return $res;
    }

    /**
     * @param $id
     * @param $single
     * @return array
     */
    private function get_container_settings($id,$single){
        $show = carbon_get_post_meta($id, 'show_vet_list');
        if(!$single && $show){
            return array(
                'show'          => $show,
                'class'         => carbon_get_post_meta($id, 'vet_list_format'),
                'bg'            => carbon_get_post_meta($id, 'vet_list_wrap_bg'),
                'title'         => carbon_get_post_meta($id, 'title_vet_list'),
                'subtitle'      => carbon_get_post_meta($id, 'subtitle_vet_list'),
                'button_txt'    => carbon_get_post_meta($id, 'button_text_vet_list')
            );
        }
    }

}