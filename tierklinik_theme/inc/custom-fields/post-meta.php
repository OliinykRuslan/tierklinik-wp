<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields(){
    Container::make('post_meta', __('Main banner'))
        ->where( 'post_type', '=', 'page')
        ->or_where('post_type', '=', 'news')
        ->or_where('post_type', '=', 'veterinarians')
        ->add_fields(array(
            Field::make('image', 'banner_image', 'Left side image')
                ->set_width(33),
            Field::make('radio', 'banner_background_type', __('Background type'))
                ->set_width(33)
                ->help_text(__('You can choose the option of the banner background you need from the list.'))
                ->set_options(array(
                    'gradient'  => __('Gradient'),
                    'image'     => __('Image')
                )),
            Field::make('color', 'banner_gradient_start')
                ->set_default_value('#3fc7b1')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'banner_background_type',
                        'value' => 'gradient',
                        'compare' => '=',
                    )
                ))
                ->help_text(__('Installed by default "#3fc7b1".'))
                ->set_width(50),
            Field::make('color', 'banner_gradient_end')
                ->set_default_value('#36637a')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'banner_background_type',
                        'value' => 'gradient',
                        'compare' => '=',
                    )
                ))
                ->help_text(__('Installed by default "#36637a".'))
                ->set_width(50),
            Field::make('image', 'banner_background_img', __('Background image'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'banner_background_type',
                        'value' => 'image',
                        'compare' => '=',
                    )
                ))
                ->set_width(33),
            Field::make('text', 'banner_title')
                ->set_width(50)
                ->set_default_value(__('Mit Kompetenz und Herz'))
                ->set_attribute( 'placeholder', __('Title') ),
            Field::make('textarea', 'banner_page_subtitle')
                ->set_width(50),
            Field::make('text', 'banner_button_text')
                ->set_width(50)
                ->set_default_value(__('Unsere Fachgebiete')),
            Field::make('text', 'banner_button_link')
                ->set_width(50),
            Field::make('checkbox', 'show_emergency_block', 'Show emergency block? Yes/No'),
        ));

    Container::make('post_meta', 'vet_list',__('Veterinarians list'))
        ->where( 'post_type', '=', 'page' )
        ->add_fields(array(
            Field::make('checkbox', 'show_vet_list', __('Show list? Yes/No'))
                ->set_width(50),
            Field::make('radio', 'vet_list_format', __('Format view list'))
                ->set_width(25)
                ->add_options(array(
                        'carousel'  => __('Slider'),
                        'gallery'     => __('Gallery')
                    ))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_vet_list',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('color', 'vet_list_wrap_bg', __('Background section'))
                ->set_alpha_enabled( true )
                ->set_width(25)
                ->set_default_value('#ooo')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_vet_list',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'subtitle_vet_list', __('Subtitle'))
                ->set_default_value('Tierärzte')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_vet_list',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33),

            Field::make('text', 'title_vet_list', __('Title'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_vet_list',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33),
            Field::make('text', 'button_text_vet_list', __('Button text'))
                ->set_default_value('Alle Tierärzte')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_vet_list',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33),
        ));

    Container::make('post_meta', 'page_gallery', __('Page gallery'))
        ->add_fields(array(
            Field::make('checkbox', 'show_gallery', __('Show gallery? Yes/No')),
            Field::make('text', 'gallery_subtitle', __('Subtitle'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_gallery',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33)
                ->set_default_value('Galerie'),
            Field::make('text', 'gallery_title', __('Title'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_gallery',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33)
                ->set_default_value('Rund um unsere Klinik'),
            Field::make('text', 'gallery_btn_txt', __('Button text'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_gallery',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(33)
                ->set_default_value('zur Galerie'),
            Field::make('complex', 'gallery_images', __('Images'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_gallery',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('image', 'gallery_img', __('Gallery image'))
                ))
        ));

    Container::make('post_meta', __('Additional sections'))
        ->where( 'post_type', '=', 'page' )
        ->add_fields(array(
            Field::make('multiselect', 'additional_sections', __('Sections list'))
                ->add_options(array(
                    'recruiting' => __('Recruiting'),
                    'career'     => __('Career'),
                    'about'      => __('About section'),
                    'contacts'   => __('Contacts section')
                ))
        ));


    Container::make('post_meta', __('Content'))
        ->where( 'post_type', '=', 'veterinarians' )
        ->add_fields(array(
            Field::make('text', 'rank', __('Rank'))
                ->set_width(50),
            Field::make('text', 'diploma', __('Diploma'))
                ->set_width(50),
            Field::make('checkbox', 'is_resume', __('Upload resume? Yes/No'))
                ->set_width(50),
            Field::make('file', 'resume', __('Upload resume'))
                ->set_value_type( 'url' )
                ->set_width(50)
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'is_resume',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('checkbox', 'show_slogan', 'Show slogan? Yes/No'),
            Field::make('textarea', 'single_vet_slogan', __('Slogan'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_slogan',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'single_vet_slogan_author', __('Author'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_slogan',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('checkbox', 'customise_link_to_branch', __('Customise link to Branch block')),
            Field::make('textarea', 'link_to_branch_text', __('Block text'))
                ->set_default_value('Erfahren Sie mehr über den Fachbereich von')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'customise_link_to_branch',
                        'value' => true,
                        'compare' => '=',
                    )
                )),
            Field::make('image', 'link_to_branch_tmb', __('Image'))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'customise_link_to_branch',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_value_type('url')
                ->set_width(50),
            Field::make('text', 'link_to_branch_btn_txt', __('Button text'))
                ->set_default_value('Mehr erfahren')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'customise_link_to_branch',
                        'value' => true,
                        'compare' => '=',
                    )
                ))
                ->set_width(50)
        ));

    Container::make( 'term_meta', __('Taxonomy Properties') )
        ->where( 'term_taxonomy', '=', 'knowledge_area' )
        ->add_fields( array(
            Field::make( 'image', 'tax_thumbnail', __('Thumbnail') ),
        ) );
}