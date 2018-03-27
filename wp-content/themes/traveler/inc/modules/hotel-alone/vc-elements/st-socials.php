<?php
/**
 * Created by ShineTheme.
 * Developer: nasanji
 * Date: 8/14/2017
 * Version: 1.0
 */

if(!function_exists('st_vc_socials') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function st_vc_socials($atts, $content = false)
    {
        $output = '';

        $atts = shortcode_atts(array(
            'align' => 'text-left',
            'follow_us' => '',
            'list_social' => '',
            'extra_class' => ''
        ),$atts);

        $output .= st_hotel_alone_load_view('elements/st-socials/st-socials', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    if(st_check_service_available( 'st_hotel' )) {
        st_reg_shortcode('st_socials', 'st_vc_socials');
    }

    vc_map(array(
        'name' => esc_html__('ST Socials', ST_TEXTDOMAIN),
        'base' => 'st_socials',
        'icon' => 'icon-st',
        'category' => 'Shinetheme',
        'description' => esc_html__('List socials', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Align', ST_TEXTDOMAIN),
                'param_name' => 'align',
                'description' => esc_html__('Select a style', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Left', ST_TEXTDOMAIN) => 'text-left',
                    esc_html__('Center', ST_TEXTDOMAIN) => 'text-center',
                    esc_html__('Right', ST_TEXTDOMAIN) => 'text-right'
                ),
                'std' => 'text-left'
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show Follow us text', ST_TEXTDOMAIN),
                'param_name' => 'follow_us',
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 'yes'
                )
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('List Socials', ST_TEXTDOMAIN),
                'param_name' => 'list_social',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        'admin_label' => true,
                        'heading' => esc_html__('Icon', ST_TEXTDOMAIN),
                        'param_name' => 'icon',
                        'description' => esc_html__('Choose a icon', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link Social', ST_TEXTDOMAIN),
                        'param_name' => 'link',
                        'description' => esc_html__('Insert a link for social', ST_TEXTDOMAIN)
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
