<?php

class CustomActions
{
    function __construct(){
        add_action( 'init'                          , array($this, 'register_post_types') );
        add_action( 'init'                          , array($this, 'create_taxonomy') );
        add_filter('get_fist_letter'                , array($this, 'get_fist_letter'));
        add_filter('news_posts_query'               , array($this, 'news_posts_query'));
        add_filter('vocabulary_posts_query'         , array($this, 'vocabulary_posts_query'));
        add_filter('alphabet_HTML_generation'       , array($this, 'alphabet_HTML_generation'));
        add_filter('vocabulary_list_HTML_generate'  , array($this, 'vocabulary_list_HTML_generate'));
    }

    function create_taxonomy(){
        register_taxonomy( 'branch', [ 'veterinarians' ], [
            'label'                 => __('Branch'),
            'labels'                => [
                'name'              => __('Branch'),
                'singular_name'     => __('Branch'),
                'search_items'      => __('Search Branches'),
                'all_items'         => __('All Branches'),
                'view_item '        => __('View Branch'),
                'parent_item'       => __('Parent Branch'),
                'parent_item_colon' => __('Parent Branch:'),
                'edit_item'         => __('Edit Branch'),
                'update_item'       => __('Update Branch'),
                'add_new_item'      => __('Add New Branch'),
                'new_item_name'     => __('New Branch Name'),
                'menu_name'         => __('Branch'),
            ],
            'description'           => '',
            'public'                => true,
            'hierarchical'          => true,
            'show_ui'               => true,
            'rewrite'               => true,
            'capabilities'          => array(),
            'meta_box_cb'           => 'post_categories_meta_box', // `post_categories_meta_box` или `post_tags_meta_box`. false
            'show_admin_column'     => true,
            'show_in_rest'          => null,
            'rest_base'             => null,
        ] );

        register_taxonomy( 'knowledge_area', [ 'veterinarians' ], [
            'label'                 => __('Knowledge'),
            'labels'                => [
                'name'              => __('Knowledge'),
                'singular_name'     => __('Knowledge'),
                'search_items'      => __('Search Knowledge'),
                'all_items'         => __('All Knowledge'),
                'view_item '        => __('View Knowledge'),
                'parent_item'       => __('Parent Knowledge'),
                'parent_item_colon' => __('Parent Knowledge:'),
                'edit_item'         => __('Edit Knowledge'),
                'update_item'       => __('Update Knowledge'),
                'add_new_item'      => __('Add New Knowledge'),
                'new_item_name'     => __('New Knowledge Name'),
                'menu_name'         => __('Knowledge'),
            ],
            'description'           => '',
            'public'                => true,
            'hierarchical'          => true,
            'show_ui'               => true,
            'rewrite'               => true,
            'capabilities'          => array(),
            'meta_box_cb'           => 'post_categories_meta_box', // `post_categories_meta_box` или `post_tags_meta_box`. false
            'show_admin_column'     => true,
            'show_in_rest'          => null,
            'rest_base'             => null,
        ] );
    }

    function register_post_types(){
        register_post_type( 'veterinarians', [
            'label'  => null,
            'labels' => [
                'name'               => __('Veterinarians'),
                'singular_name'      => __('Vet'),
                'add_new'            => __('Add a new veterinarian'),
                'add_new_item'       => __('Add a new veterinarian'),
                'edit_item'          => __('Edit veterinarian'),
                'new_item'           => __('New veterinarian'),
                'view_item'          => __('View Veterinarians'),
                'search_items'       => __('Search'),
                'not_found'          => __('Not found'),
                'not_found_in_trash' => __('Not found in the cart'),
                'parent_item_colon'  => '',
                'menu_name'          => __('Veterinarians'),
            ],
            'description'         => '',
            'public'              => true,
            'show_in_menu'        => null,
            'show_in_rest'        => null,
            'rest_base'           => null,
            'menu_position'       => null,
            'menu_icon'           => null,
            'hierarchical'        => false,
            'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => ['branch', 'knowledge_area'],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ] );

        register_post_type( 'news', [
            'label'  => null,
            'labels' => [
                'name'               => __('News'),
                'singular_name'      => __('News'),
                'add_new'            => __('Add a new News'),
                'add_new_item'       => __('Add a new News'),
                'edit_item'          => __('Edit News'),
                'new_item'           => __('New News'),
                'view_item'          => __('View News'),
                'search_items'       => __('Search'),
                'not_found'          => __('Not found'),
                'not_found_in_trash' => __('Not found in the news'),
                'parent_item_colon'  => '',
                'menu_name'          => __('News'),
            ],
            'description'         => '',
            'public'              => true,
            'show_in_menu'        => null,
            'show_in_rest'        => null,
            'rest_base'           => null,
            'menu_position'       => null,
            'menu_icon'           => null,
            'hierarchical'        => false,
            'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => [],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ] );

        register_post_type( 'vocabulary', [
            'label'  => null,
            'labels' => [
                'name'               => __('Vocabulary'),
                'singular_name'      => __('Vocabulary'),
                'add_new'            => __('Add a new Vocabulary'),
                'add_new_item'       => __('Add a new Vocabulary'),
                'edit_item'          => __('Edit Vocabulary'),
                'new_item'           => __('New Vocabulary'),
                'view_item'          => __('View Vocabulary'),
                'search_items'       => __('Search'),
                'not_found'          => __('Not found'),
                'not_found_in_trash' => __('Not found in the Vocabulary'),
                'parent_item_colon'  => '',
                'menu_name'          => __('Vocabulary'),
            ],
            'description'         => '',
            'public'              => true,
            'show_in_menu'        => null,
            'show_in_rest'        => null,
            'rest_base'           => null,
            'menu_position'       => null,
            'menu_icon'           => null,
            'hierarchical'        => false,
            'supports'            => [ 'title', 'editor', ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => [],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ] );
    }

    /**
     * @param int $limit
     * @param string $orderby
     * @param string $order
     * @return WP_Query
     */
    function news_posts_query($limit=-1,$orderby='date', $order='DESC'){
        $args = array(
            'post_type' => 'news',
            'status'    => 'publish',
            'limit'     =>  $limit,
            'orderby'   =>  $orderby,
            'order'     =>  $order,
        );

        $posts = new WP_Query($args);
        return $posts;
    }

    /**
     * @param $str
     * @return string
     */
    function get_fist_letter($str){
        return strtolower(substr($str, 0, 1));
    }

    /**
     * @return int[]|WP_Post[]
     */
    function vocabulary_posts_query(){
        $query = new WP_Query;

        $q_args = array(
            'post_per_page' => -1,
            'post_type' => 'vocabulary',
            'orderby'   => 'name',
            'order'     => 'ASC'
        );
        wp_reset_postdata();
        return $query->query($q_args);
    }

    /**
     * @return string
     */
    function alphabet_HTML_generation(){
        $letters_arr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $list_items = '<ul class="alphabet">';
        $container_wrap_end     = '</ul>';

        foreach($letters_arr as $item){
            $href = 'let_'.apply_filters('get_fist_letter', $item);
            $list_items .= sprintf('<li><a href="#%s">%s</a></li>', $href, $item);
        }

        $list_items .= $container_wrap_end;

        return $list_items;
    }

    /**
     * @param $vocabulary_q
     * @return string
     */
    function vocabulary_list_HTML_generate($vocabulary_q){
        $html = '';
        $container_id = null;
        $before = '</div>';
        $next_post = false;
        $prev_post = false;
        $previous_letter = null;
        $cont = count($vocabulary_q);
        foreach($vocabulary_q as $key => $item){
            $current_title = $item->post_title;
            $first_letter = substr($current_title, 0, 1);
            $container_id = 'let_'.apply_filters('get_fist_letter', $current_title);
            $after = sprintf('<div class="vocabulary_single_group" id="%s">', $container_id);
            $letter_container = sprintf('<div class="letter_container">%s</div>', $first_letter);
            $cont = '<div class="vocabulary_item"><h3 class="vocabulary_item_title">'.$current_title.'</h3>'.$item->post_content.'</div>';
            if (is_null($previous_letter)) {
                $previous_letter = apply_filters('get_fist_letter',$current_title);
                $html = $after;
                $html .= $letter_container;
                $html .= '<div class="voc_items">';
                $html .= $cont;
            }elseif($previous_letter !== apply_filters('get_fist_letter',$current_title)){
                $previous_letter = apply_filters('get_fist_letter',$current_title);
                $html .= $before;
                $html .= $before;
                $html .= $after;
                $html .= $letter_container;
                $html .= '<div class="voc_items">';
                $html .= $cont;
            }elseif($previous_letter == apply_filters('get_fist_letter',$current_title)){
                $html .= $cont;
            }
            if($cont == $key+1){
                $html .= $before;
            }
        }
        return $html;
    }
}
new CustomActions();
