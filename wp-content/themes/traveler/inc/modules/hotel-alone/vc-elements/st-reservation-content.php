<?php
if(!function_exists( 'hotel_alone_vc_reservation_content' ) && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_reservation_content( $atts , $content = false )
    {
        extract( $data = shortcode_atts( array(
            'service_id' => '' ,
            'style'      => 'style-1' ,
        ) , $atts ) );
        $output = st_hotel_alone_load_view('elements/st-reservation-content/reservation-content' , false , array( 'data' => $data ) );
        return $output;
    }
}
st_reg_shortcode( 'hotel_alone_reservation_content' , 'hotel_alone_vc_reservation_content' );
vc_map( array(
    'name'        => esc_html__( '[Hotel Single] ST Reservation Content' , ST_TEXTDOMAIN ) ,
    'base'        => 'hotel_alone_reservation_content' ,
    'description' => esc_html__( 'ST Reservation Content' , ST_TEXTDOMAIN ) ,
    'icon'        => 'icon-st' ,
    'category'    => 'Hotel Single' ,
    'params'      => array(
        array(
            'type'        => 'autocomplete' ,
            'class'       => '' ,
            'heading'     => esc_html__( 'Select Hotel' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'service_id' ,
            'settings'    => array(
                'multiple'      => false ,
                'sortable'      => true ,
                'unique_values' => true ,
                'values'        => st_hotel_alone_get_type_services_data('st_hotel') ,
            ) ,
            'description' => esc_html__( 'Enter List of Services' , ST_TEXTDOMAIN ) ,
        ) ,
        array(
            'type'        => 'radio_image' ,
            'admin_label' => true ,
            'heading'     => esc_html__( 'Style Options' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'style' ,
            'std'         => 'style-1' ,
            'value'       => array(
                'style-1' => array(
                    'title' => esc_html__( 'Style List' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-reservation-content/style-1.jpg' ,
                ) ,
                'style-2' => array(
                    'title' => esc_html__( 'Style Grid' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-reservation-content/style-2.jpg' ,
                ) ,
            )
        ) ,
    )
) );