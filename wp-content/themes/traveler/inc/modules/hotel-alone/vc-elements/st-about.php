<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/14/2017
 * Version: 1.0
 */
if(!function_exists('hotel_alone_vc_about') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_about($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'style' => 'style-1',
            'icon' => '',
            'title' => '',
            'description' => '',
            'link' => '',
            'extra_class' => ''
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-about/about-'.$style, false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_about', 'hotel_alone_vc_about');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] About', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_about',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Icon and information', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'radio_image',
                'admin_label' => true,
                'heading' => esc_html__('Style',ST_TEXTDOMAIN),
                'param_name' => 'style',
                'std' => 'style-1',
                'value' => array(
                    'style-1'=> array(
                        'title'=>esc_html__('Style 1',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir() .'/images/st-about/a-style-1.png',
                    ),
                    'style-2'=> array(
                        'title'=>esc_html__('Style 2',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir() . '/images/st-about/a-style-2.png',
                    )
                ),
                'w' => 'w320'
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', ST_TEXTDOMAIN),
                'param_name' => 'icon',
                'description' => esc_html__('Choose a icon', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'title',
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Description', ST_TEXTDOMAIN),
                'param_name' => 'description',
                'description' => esc_html__('Enter description', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Enter a link',ST_TEXTDOMAIN),
                'param_name' => 'link',
                'description' => esc_html__('Enter a link for element', ST_TEXTDOMAIN)
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
