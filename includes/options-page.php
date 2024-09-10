<?php

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action('after_setup_theme', 'load_carbon_fields_rp');
add_action('carbon_fields_register_fields', 'create_options_page_rp');



function load_carbon_fields_rp()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

function create_options_page_rp()
{

    Container::make('theme_options', __('Ratelink Pro'))
        ->set_page_parent('tools.php')
        ->set_icon('dashicons-carrot')
        ->set_page_menu_position(30)
        ->add_fields(array(

            Field::make('checkbox', 'ratelink_pro_plugin_active', __('Active')),

        ));
}
