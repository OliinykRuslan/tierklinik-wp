<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'custom_theme_options' );
function custom_theme_options() {
    Container::make('theme_options', __('Theme options'))
        ->add_fields(array(
            Field::make('separator', 'crtxt', __('Copyright')),
            Field::make('text', 'copyright', __('Copyright text')),
            Field::make('separator', 'im', __('Info mail')),
            Field::make('text', 'info_mail', __('Mail')),
            Field::make('separator', 'emrgnc', __('Emergency')),
            Field::make('text', 'emergency_title', __('Title'))
                ->set_width(50)
                ->set_default_value('Notfall'),
            Field::make('text', 'emergency_phone', __('Phone number'))
                ->set_width(50)
                ->set_attribute('placeholder', __('Sample format XXXX XXX XXX')),
            Field::make('text', 'emergency_link_text', __('Link text'))
                ->set_width(25),
            Field::make('text', 'emergency_link', __('Link href'))
                ->set_width(25),
            Field::make('text', 'emergency_substring', __('Additional text'))
                ->set_width(25),
        ));
    Container::make( 'theme_options', __( 'Recruiting Section Preview' ) )
        ->add_fields( array(
            Field::make('image', 'recruiting_img', __('Thumbnail'))
                ->set_value_type('url'),
            Field::make( 'text', 'recruiting_slogan', __('Slogan') )
                ->set_default_value('Komptenz und Herz')
                ->set_width(50),
            Field::make( 'text', 'recruiting_tile', __('Title') )
                ->set_width(50)
                ->set_default_value('Ihre Karrierechancen in der Tierklinik Aarau West'),
            Field::make('text', 'recruiting_btn_txt', __('Button text'))
                ->set_width(50)
                ->set_default_value('Mehr erfahren'),
            Field::make('color', 'recruiting_container_bg', __('Container background'))
                ->set_width(50)
                ->set_default_value('#40ccb519')
                ->set_alpha_enabled( true )
        ) );

    Container::make('theme_options', __('About section'))
        ->add_fields(array(
            Field::make('text', 'about_section_subtitle', __('Subtitle'))
                ->set_width(50)
                ->set_default_value('Tierklinik Aarau West'),
            Field::make('text', 'about_section_title', __('Title'))
                ->set_width(50)
                ->set_default_value('Fakten über uns'),
            Field::make('text', 'about_section_btn_txt', __('Button text'))
                ->set_width(50)
                ->set_default_value('Mehr erfahren'),
            Field::make('image', 'about_section_bg', __('Background section'))
                ->set_width(50)
                ->set_value_type('url'),
            Field::make('complex', 'about_section_facts', __('Facts list'))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'about_fact_title', __('Fact title'))
                        ->set_width(50),
                    Field::make('text', 'about_fact_val', __('Fact value'))
                        ->set_width(50)
                ))
        ));

    Container::make('theme_options', __('Contacts section'))
        ->add_fields( array(
            Field::make('image', 'contacts_section_thumb', __('Thumbnail')),
            Field::make('separator', 'contacts', __('Contacts')),
            Field::make('textarea', 'contacts_section_address', __('Address')),
            Field::make('complex', 'contacts_section_phones', __('Phone numbers'))
                ->set_classes(true)
                ->add_fields(array(
                    Field::make('text', 'contact_ph_num', __('Phone (fax) number'))
                        ->set_width(50),
                    Field::make('text', 'contact_ph_desc', __('Description'))
                        ->set_width(50)
                )),
            Field::make('separator', 'schdl', __('Schedule')),
            Field::make('complex', 'schedule', __('Schedule list'))
                ->set_classes(true)
                ->add_fields(array(
                    Field::make('text', 'schedule_title', __('Title'))
                        ->set_width(33),
                    Field::make('text', 'schedule_graphic', __('Graphic'))
                        ->set_width(33),
                    Field::make('text', 'schedule_desc', __('Description'))
                        ->set_width(33),
                )),
            Field::make('separator', 'networks', __('Networks')),
            Field::make('complex', 'networks_list', __('Networks list'))
                ->set_classes(true)
                ->add_fields(array(
                    Field::make('text', 'network_icon_class', __('Icon class'))
                        ->set_width(50),
                    Field::make('text', 'network_href', __('Href'))
                        ->set_width(50)
                ))
        ) );
}
