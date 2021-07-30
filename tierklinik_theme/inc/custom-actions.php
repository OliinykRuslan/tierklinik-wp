<?php

class CustomActions
{
    function __construct(){
        add_action( 'init', array($this, 'register_post_types') );
        add_action( 'init', array($this, 'create_taxonomy') );
        add_filter('news_posts_query', array($this, 'news_posts_query'));
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
}
new CustomActions();
