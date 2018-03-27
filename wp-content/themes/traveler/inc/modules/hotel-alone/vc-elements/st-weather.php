<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/16/2017
 * Version: 1.0
 */
if(!function_exists('st_vc_weather') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function st_vc_weather($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'location_id' => '',
            'show_time' => '',
            'extra_class' => ''
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-weather/weather', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    if(st_check_service_available( 'st_hotel' )) {
        st_reg_shortcode('st_weather', 'st_vc_weather');
    }

    vc_map(array(
        'name' => esc_html__('ST Weather', ST_TEXTDOMAIN),
        'base' => 'st_weather',
        'icon' => 'icon-st',
        'category' => 'Shinetheme',
        'description' => esc_html__('Icon and information', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'param_name'          => 'location_id',
                'heading'       => esc_html__( 'Location', ST_TEXTDOMAIN ),
                'type' => 'dropdown',
                'value' => st_hotel_alone_get_list_all_services('location'),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show time now', ST_TEXTDOMAIN),
                'param_name' => 'show_time',
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 'yes'
                ),
                'std' => ''
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
