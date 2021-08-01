<?php

class Vacancies
{

    public $terms;

    function __construct($limit=-1){
        $this->terms = $this->get_spec($limit);
    }

    private function get_spec($limit){
        $terms = get_terms( [
            'taxonomy' => 'speciality',
            'hide_empty' => false,
            'limit'     => $limit
        ] );

        $res = array();
        foreach ($terms as $term){
            $count = $term->count;
            $max_personal = +(carbon_get_term_meta($term->term_id, 'max_personal_num'));
            $percent = (100/$max_personal)*$count;
            if($max_personal-$count > 0){
                $res[] = array(
                    'id'                                => $term->term_id,
                    'url'                               => get_term_link($term->term_id),
                    'name'                              => $term->name,
                    'max_personal'                      => $max_personal,
                    'count'                             => $count,
                    'free_places_num'                   => $max_personal-$count,
                    'percentage_of_occupied_places'     => number_format($percent, 0)
                );
            }
        }
        return $res;
    }
}