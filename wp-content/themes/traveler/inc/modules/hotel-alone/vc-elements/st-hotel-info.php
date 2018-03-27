<?php
if(!function_exists('hotel_alone_vc_el_hotel_info') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_el_hotel_info($atts, $content = false)
    {
        $output = '';

        $atts = shortcode_atts(array(
            'logo' => '',
            'title' => '',
            'sub_title' => '',
            'star' => 5,
            'hotline' => '',
            'description' => '',
            'extra_class' => ''
        ), $atts);

        $output = st_hotel_alone_load_view('elements/st-hotel-info/hotel-info', false, array('atts' => $atts));

        return $output;
    }

    st_reg_shortcode('hotel_alone_el_hotel_info', 'hotel_alone_vc_el_hotel_info');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Hotel Info', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_el_hotel_info',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Add info for hotel', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Hotel Logo', ST_TEXTDOMAIN),
                'param_name' => 'logo',
                'description' => esc_html__('Upload an image for logo of hotel', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'title',
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Sub Title', ST_TEXTDOMAIN),
                'param_name' => 'sub_title',
                'description' => esc_html__('Enter a text for sub title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Hotel Stars', ST_TEXTDOMAIN),
                'param_name' => 'star',
                'value' => array(
                    esc_html__('5 stars', ST_TEXTDOMAIN) => 5,
                    esc_html__('4 stars', ST_TEXTDOMAIN) => 4,
                    esc_html__('3 stars', ST_TEXTDOMAIN) => 3,
                    esc_html__('2 stars', ST_TEXTDOMAIN) => 2,
                    esc_html__('1 stars', ST_TEXTDOMAIN) => 1
                ),
                'std' => 5
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Reservation Hotline',ST_TEXTDOMAIN),
                'param_name' => 'hotline',
                'description' => esc_html__('Reservation Hotline', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Description', ST_TEXTDOMAIN),
                'param_name' => 'description',
                'description' => esc_html__('Enter description', ST_TEXTDOMAIN)
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
