<?php
/**
 * Created by ShineTheme.
 * Developer: nasanji
 * Date: 8/14/2017
 * Version: 1.0
 */

if(!function_exists('hotel_alone_vc_testimonials') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_testimonials($atts, $content = false)
    {
        $output = '';

        $atts = shortcode_atts(array(
            'style' => 'style-1',
            'show_nav' => 1,
            'show_pagi' => 1,
            'v_style' => 'light',
            'lists' => '',
            'extra_class' => ''
        ),$atts);

        $output .= st_hotel_alone_load_view('elements/st-testimonials/st-testimonials', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_testimonials', 'hotel_alone_vc_testimonials');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Testimonials', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_testimonials',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Customer review', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Style', ST_TEXTDOMAIN),
                'param_name' => 'style',
                'description' => esc_html__('Select a style', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Style 1 (full width)', ST_TEXTDOMAIN) => 'style-1',
                    esc_html__('Style 2 (small)', ST_TEXTDOMAIN) => 'style-2'
                ),
                'std' => 'style-1'
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Show Navigation', ST_TEXTDOMAIN),
                'param_name' => 'show_nav',
                'description' => esc_html__('Show navigation for slide',ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 1,
                    esc_html__('No', ST_TEXTDOMAIN) => 0
                ),
                'std' => 1
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Show Pagination', ST_TEXTDOMAIN),
                'param_name' => 'show_pagi',
                'description' => esc_html__('Show pagination for slide',ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 1,
                    esc_html__('No', ST_TEXTDOMAIN) => 0
                ),
                'std' => 1
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Version Style', ST_TEXTDOMAIN),
                'param_name' => 'v_style',
                'value' => array(
                    esc_html__('Light', ST_TEXTDOMAIN) => 'light',
                    esc_html__('Dark', ST_TEXTDOMAIN) => 'dark'
                ),
                'std' => 'light',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('List Reviews', ST_TEXTDOMAIN),
                'param_name' => 'lists',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Name', ST_TEXTDOMAIN),
                        'param_name' => 'name',
                        'description' => esc_html__('Name of customer', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Position', ST_TEXTDOMAIN),
                        'param_name' => 'position',
                        'description' => esc_html__('Position of customer', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Avatar', ST_TEXTDOMAIN),
                        'param_name' => 'avatar',
                        'description' => esc_html__('Upload avatar for customer', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Content Review', ST_TEXTDOMAIN),
                        'param_name' => 'content_review',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Review Stars',ST_TEXTDOMAIN),
                        'param_name' => 'stars',
                        'value' => array(
                            esc_html__('5 stars', ST_TEXTDOMAIN) => 5,
                            esc_html__('4 stars', ST_TEXTDOMAIN) => 4,
                            esc_html__('3 stars', ST_TEXTDOMAIN) => 3,
                            esc_html__('2 stars', ST_TEXTDOMAIN) => 2,
                            esc_html__('1 stars', ST_TEXTDOMAIN) => 1
                        ),
                        'std' => 5
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