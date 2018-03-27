<?php
if(!function_exists( 'hotel_alone_vc_booking_room' ) && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_booking_room( $atts , $content = false )
    {
        extract( $data = shortcode_atts( array(
            'style'             => 'style-1' ,
            'title'             => '' ,
            'phone'        => '' ,
            'hotel_room_fields' => '' ,
        ) , $atts ) );
        $output          = st_hotel_alone_load_view('elements/st-booking-room/'.$style , false , array( 'data' => $data ) );
        return $output;
    }
}
st_reg_shortcode( 'hotel_alone_booking_room' , 'hotel_alone_vc_booking_room' );
vc_map( array(
    'name'        => esc_html__( '[Hotel Single] ST Booking Room' , ST_TEXTDOMAIN ) ,
    'base'        => 'hotel_alone_booking_room' ,
    'description' => esc_html__( 'ST Booking Room' , ST_TEXTDOMAIN ) ,
    'icon'        => 'icon-st' ,
    'category'    => array('Hotel Single') ,
    'params'      => array(
        array(
            'type'        => 'radio_image' ,
            'admin_label' => true ,
            'heading'     => esc_html__( 'Style Options' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'style' ,
            'std'         => 'style-1' ,
            'value'       => array(
                'style-1' => array(
                    'title' => esc_html__( 'Style 1' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-booking-room/style-1.jpg' ,
                ) ,
                'style-2' => array(
                    'title' => esc_html__( 'Style 2' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-booking-room/style-2.jpg' ,
                ) ,
            )
        ) ,
        array(
            'type'        => 'textfield' ,
            'admin_label' => true ,
            'heading'     => esc_html__( 'Title' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'title' ,
            'description' => esc_html__( 'Enter a text for title' , ST_TEXTDOMAIN ) ,
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-2')
            )
        ) ,
        array(
            'type'        => 'textfield' ,
            'admin_label' => true ,
            'heading'     => esc_html__( 'Reservation Hotline' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'phone' ,
            'description' => esc_html__( 'Reservation Hotline' , ST_TEXTDOMAIN ) ,
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ) ,
        array(
            'type'       => 'param_group' ,
            'heading'    => esc_html__( 'Hotel Room Fields Search' , ST_TEXTDOMAIN ) ,
            'param_name' => 'hotel_room_fields' ,
            'params'     => array(
                array(
                    'type'        => 'textfield' ,
                    'admin_label' => true ,
                    'heading'     => esc_html__( 'Label' , ST_TEXTDOMAIN ) ,
                    'param_name'  => 'label'
                ) ,
                array(
                    'type'       => 'dropdown' ,
                    'heading'    => esc_html__( 'Field Attribute' , ST_TEXTDOMAIN ) ,
                    'param_name' => 'field_attribute' ,
                    'value'      => hotel_alone_vc_convert_array( st_hotel_alone_get_search_fields_for_element() ) ,

                ) ,
                array(
                    'type'       => 'dropdown' ,
                    'heading'    => esc_html__( 'Layout Normal Size' , ST_TEXTDOMAIN ) ,
                    'param_name' => 'layout_size' ,
                    'value'      => array(
                        esc_html__( '1 column' , ST_TEXTDOMAIN )   => '1' ,
                        esc_html__( '2 columns' , ST_TEXTDOMAIN )  => '2' ,
                        esc_html__( '3 columns' , ST_TEXTDOMAIN )  => '3' ,
                        esc_html__( '4 columns' , ST_TEXTDOMAIN )  => '4' ,
                        esc_html__( '5 columns' , ST_TEXTDOMAIN )  => '5' ,
                        esc_html__( '6 columns' , ST_TEXTDOMAIN )  => '6' ,
                        esc_html__( '7 columns' , ST_TEXTDOMAIN )  => '7' ,
                        esc_html__( '8 columns' , ST_TEXTDOMAIN )  => '8' ,
                        esc_html__( '9 columns' , ST_TEXTDOMAIN )  => '9' ,
                        esc_html__( '10 columns' , ST_TEXTDOMAIN ) => '10' ,
                        esc_html__( '11 columns' , ST_TEXTDOMAIN ) => '11' ,
                        esc_html__( '12 columns' , ST_TEXTDOMAIN ) => '12' ,
                    ) ,
                    'std'        => '12'
                ) ,
            ) ,
            'callbacks'  => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ) ,
        ) ,
    )
) );