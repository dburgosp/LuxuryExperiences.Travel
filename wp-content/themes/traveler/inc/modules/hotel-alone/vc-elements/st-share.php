<?php
if(!function_exists('st_vc_share') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function st_vc_share($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'title' => '',
            'extra_class' => '',
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-share/share', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('st_share', 'st_vc_share');

    vc_map(array(
        'name' => esc_html__('ST Share', ST_TEXTDOMAIN),
        'base' => 'st_share',
        'icon' => 'icon-st',
        'category' => array("Shinetheme","Single"),
        'description' => esc_html__('Share Service', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'title',
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN)
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
