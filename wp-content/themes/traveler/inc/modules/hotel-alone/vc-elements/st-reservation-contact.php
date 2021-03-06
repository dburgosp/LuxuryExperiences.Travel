<?php
if(!function_exists('hotel_alone_vc_reservation_contact') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_reservation_contact($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'title' => '',
            'description' => '',
            'phone' => '',
            'email' => '',
            'extra_class' => ''
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-reservation-contact/content', false, array(
            'atts' => $atts
        ));

        return $output;
    }
    st_reg_shortcode('hotel_alone_reservation_contact', 'hotel_alone_vc_reservation_contact');
    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Reservation Contact', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_reservation_contact',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Icon and information', ST_TEXTDOMAIN),
        'params' => array(
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
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Phone', ST_TEXTDOMAIN),
                'param_name' => 'phone',
                'description' => esc_html__('Enter a phone', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Email', ST_TEXTDOMAIN),
                'param_name' => 'email',
                'description' => esc_html__('Enter a email', ST_TEXTDOMAIN)
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
