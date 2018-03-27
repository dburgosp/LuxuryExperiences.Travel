<?php
/**
 * Created by ShineTheme.
 * Developer: nasanji
 * Date: 8/24/2017
 * Version: 1.0
 */

if(!function_exists('hotel_alone_vc_signature') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_signature($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'sig_image' => '',
            'name' => '',
            'position' => '',
            'align' => 'left',
            'extra_class' => ''
        ),$atts);

        $output .= st_hotel_alone_load_view('elements/st-signature/signature', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_signature', 'hotel_alone_vc_signature');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Signature', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_signature',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Create signature', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Signature Image', ST_TEXTDOMAIN),
                'param_name' => 'sig_image',
                'description' => esc_html__('Upload an image', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Name', ST_TEXTDOMAIN),
                'param_name' => 'name',
                'description' => esc_html__('Enter a name', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Position', ST_TEXTDOMAIN),
                'param_name' => 'position',
                'description' => esc_html__('Enter position', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Signature Align', ST_TEXTDOMAIN),
                'param_name' => 'align',
                'description' => esc_html__('Select a align', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Left', ST_TEXTDOMAIN) => 'left',
                    esc_html__('Center', ST_TEXTDOMAIN) => 'center'
                ),
                'std' => 'style-1'
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
