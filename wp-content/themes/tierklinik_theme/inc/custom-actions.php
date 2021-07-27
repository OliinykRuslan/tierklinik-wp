<?php

class CustomActions
{
    function __construct(){
        add_action( 'init', array($this, 'register_post_types') );
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
            'supports'            => [ 'title', 'editor', 'thumbnail', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
            'taxonomies'          => [],
            'has_archive'         => false,
            'rewrite'             => true,
            'query_var'           => true,
        ] );
    }
}
new CustomActions();
