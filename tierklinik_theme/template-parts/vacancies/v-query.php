<?php

class Vacancies
{

    public $vacancies_data;

    function __construct($term_data=null, $limit=-1){
        $this->vacancies_data = $this->get_spec($term_data, $limit);
    }

    /**
     * @param $limit
     * @param $term_data
     * @return WP_Query
     */
    private function get_spec($term_data, $limit){
        $args = array(
            'post_type' => 'vacancies',
            'limit'     => $limit,
        );

        if($term_data){
            $args['tax_query'] = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => "branch",
                    'field'    => 'id',
                    'terms'    => $term_data->term_id
                ),
            );
        }

        $query = new WP_Query($args);

        return $query;
    }
}