<?php
if(!function_exists('hotel_alone_vc_room_related') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_room_related($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'number_post' => '3',
            'extra_class' => '',
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-room-related/list-room', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_room_related', 'hotel_alone_vc_room_related');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Related Room', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_room_related',
        'icon' => 'icon-st',
        'category' => array("Hotel Single","Single"),
        'description' => esc_html__('Related Room', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => esc_html__('Number Items',ST_TEXTDOMAIN),
                'param_name' => 'number_post',
                'description' => esc_html__('Number services', ST_TEXTDOMAIN),
                'value' => '3',
                'prefix' => esc_html__('service', ST_TEXTDOMAIN),
                'edit_field_class' => 'vc_column vc_col-sm-12',
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
