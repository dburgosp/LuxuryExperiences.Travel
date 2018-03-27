<?php
if(!function_exists('hotel_alone_vc_room_meta') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_room_meta($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'title' => '',
            'meta' => 'room_description',
            'extra_class' => '',
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-room-meta/info', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_room_meta', 'hotel_alone_vc_room_meta');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Room Meta', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_room_meta',
        'icon' => 'icon-st',
        'category' => array("Hotel Single"),
        'description' => esc_html__('Room information', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'title',
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Meta', ST_TEXTDOMAIN),
                'param_name' => 'meta',
                'description' => esc_html__('Select a meta', ST_TEXTDOMAIN),
                'value' => array(
                    esc_html__('Room Description', ST_TEXTDOMAIN) => 'room_description',
                ),
                'std' => 'room_description'
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
