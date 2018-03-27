<?php
/**
 * Created by ShineTheme.
 * Developer: nasanji
 * Date: 8/14/2017
 * Version: 1.0
 */

if(!function_exists('st_vc_clients') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function st_vc_clients($atts, $content = false)
    {
        $output = '';

        $atts = shortcode_atts(array(
            'list_clients' => '',
            'items' => 4,
            'extra_class' => ''
        ),$atts);

        $output .= st_hotel_alone_load_view('elements/st-clients/st-clients', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    if(st_check_service_available( 'st_hotel' )) {
        st_reg_shortcode('st_clients', 'st_vc_clients');
    }

    vc_map(array(
        'name' => esc_html__('ST Clients', ST_TEXTDOMAIN),
        'base' => 'st_clients',
        'icon' => 'icon-st',
        'category' => 'Shinetheme',
        'description' => esc_html__('List clients', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('No of items', ST_TEXTDOMAIN),
                'param_name' => 'items',
                'description' => esc_html__('Number item to display in element', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('3 items', ST_TEXTDOMAIN) => 3,
                    esc_html__('4 items', ST_TEXTDOMAIN) => 4,
                ),
                'std' => 4
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('List Clients', ST_TEXTDOMAIN),
                'param_name' => 'list_clients',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'admin_label' => true,
                        'heading' => esc_html__('Logo', ST_TEXTDOMAIN),
                        'param_name' => 'logo',
                        'description' => esc_html__('Upload an image for logo', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link Social', ST_TEXTDOMAIN),
                        'param_name' => 'link',
                        'description' => esc_html__('Insert a link for client', ST_TEXTDOMAIN)
                    )
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', ST_TEXTDOMAIN),
                'param_name' => 'extra_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', ST_TEXTDOMAIN)
            )

        )
    ));
}
