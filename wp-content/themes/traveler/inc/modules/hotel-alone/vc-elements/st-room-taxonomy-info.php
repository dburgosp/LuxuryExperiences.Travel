<?php
if(!function_exists('hotel_alone_vc_room_taxonomy_info') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_room_taxonomy_info($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'title' => '',
            'number_of_row' => '4',
            'extra_class' => '',
            'choose_taxonomy' => 'room_type',
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-room-taxonomy-info/info', false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_room_taxonomy_info', 'hotel_alone_vc_room_taxonomy_info');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Room Taxonomy Info', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_room_taxonomy_info',
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
                'heading' => esc_html__('Choose taxonomy ',ST_TEXTDOMAIN),
                'param_name' => 'choose_taxonomy',
                'value' => hotel_alone_list_taxonomy()
            ),
            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__('Number item/row ',ST_TEXTDOMAIN),
                'param_name' => 'number_of_row',
                'value' => array(
                    esc_html__('4 Item',ST_TEXTDOMAIN) => '4',
                    esc_html__('3 Item',ST_TEXTDOMAIN) => '3',
                ),
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
