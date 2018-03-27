<?php
if(!function_exists('hotel_alone_vc_room_info') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_room_info($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'extra_class' => '',
            'style' => 'style-1',
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-room-info/'.$style, false, array(
            'atts' => $atts
        ));

        return $output;
    }

    st_reg_shortcode('hotel_alone_room_info', 'hotel_alone_vc_room_info');

    vc_map(array(
        'name' => esc_html__('[Hotel Single] ST Room Info', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_room_info',
        'icon' => 'icon-st',
        'category' => array("Hotel Single","Single"),
        'description' => esc_html__('Room information', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type'        => 'radio_image' ,
                'admin_label' => true ,
                'heading'     => esc_html__( 'Style Options' , ST_TEXTDOMAIN ) ,
                'param_name'  => 'style' ,
                'std'         => 'style-1' ,
                'value'       => array(
                    'style-1' => array(
                        'title' => esc_html__( 'Style 1' , ST_TEXTDOMAIN ) ,
                        'image' => st_hotel_alone_load_assets_dir() . '/images/st-room-info/style-1.jpg' ,
                    ) ,
                    'style-2' => array(
                        'title' => esc_html__( 'Style 2' , ST_TEXTDOMAIN ) ,
                        'image' => st_hotel_alone_load_assets_dir() . '/images/st-room-info/style-2.jpg' ,
                    ) ,
                )
            ) ,
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', ST_TEXTDOMAIN),
                'param_name' => 'extra_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', ST_TEXTDOMAIN)
            )
        )
    ));
}
