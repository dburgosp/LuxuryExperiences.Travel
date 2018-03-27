<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/15/2017
 * Version: 1.0
 */
if(!function_exists('st_vc_video') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function st_vc_video($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'style' => 'style-1',
            'link' => '',
            'background_image' => '',
            'title_color' => '',
            'label_color' => '',
            'extra_class' => '',
            'height' => '',
            'enable_label' => 'yes',
            'overlay' =>''
        ),$atts);

        wp_enqueue_script('mb-YTPlayer');

        $output .= st_hotel_alone_load_view('elements/st-video/st-video', false, array(
            'atts' => $atts,
            'content' => $content
        ));

        return $output;
    }

    st_reg_shortcode('st_video', 'st_vc_video');

    vc_map(array(
        'name' => esc_html__('ST Video', ST_TEXTDOMAIN),
        'base' => 'st_video',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Play video in page', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Style', ST_TEXTDOMAIN),
                'param_name' => 'style',
                'description' => esc_html__('Select a style', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Style 1', ST_TEXTDOMAIN) => 'style-1',
                    esc_html__('Style 2 (No Caption)', ST_TEXTDOMAIN) => 'style-2'
                ),
                'std' => 'style-1'
            ),
            array(
                'type' => 'textarea_html',
                'admin_label' => true,
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'content',
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Youtube ID',ST_TEXTDOMAIN),
                'param_name' => 'link',
                'description' => esc_html__('Enter a video id for element. Ex: gdXDJ9TIcZQ', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background Image', ST_TEXTDOMAIN),
                'param_name' => 'background_image'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', ST_TEXTDOMAIN),
                'param_name' => 'title_color',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Label Color', ST_TEXTDOMAIN),
                'param_name' => 'label_color',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Overlay', ST_TEXTDOMAIN),
                'param_name' => 'overlay',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Enable Label Text', ST_TEXTDOMAIN),
                'param_name' => 'enable_label',
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 'yes'
                ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Height Element (px)', ST_TEXTDOMAIN),
                'param_name' => 'height',
                'description' => esc_html__('Input height for element',ST_TEXTDOMAIN),
                'value' => '800'
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


