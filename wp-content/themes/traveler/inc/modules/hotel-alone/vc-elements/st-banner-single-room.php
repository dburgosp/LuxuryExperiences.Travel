<?php
if(!function_exists('hotel_alone_vc_banner_single_room') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_vc_banner_single_room($atts, $content = false){
        $output = $title_source = $title =  $title_color =   '';
        extract($data = shortcode_atts(array(
            'style' => 'style-1',
            'link_scroll' => '',
        ),$atts));
        $output = st_hotel_alone_load_view( 'elements/st-banner-single-room/'.$style , false , array( 'data' => $data ) );
        return $output;
    }
}
st_reg_shortcode('hotel_alone_banner_single_room', 'hotel_alone_vc_banner_single_room');
vc_map(array(
    'name' => esc_html__('[Hotel Single] ST Banner Single Room',ST_TEXTDOMAIN),
    'base' => 'hotel_alone_banner_single_room',
    'description' => esc_html__('ST Banner Single Room',ST_TEXTDOMAIN),
    'icon' => 'icon-st',
    'category'    => array("Hotel Single") ,
    'params' => array(
        array(
            'type'        => 'radio_image' ,
            'admin_label' => true ,
            'heading'     => esc_html__( 'Style Options' , ST_TEXTDOMAIN ) ,
            'param_name'  => 'style' ,
            'std'         => 'style-1' ,
            'value'       => array(
                'style-1' => array(
                    'title' => esc_html__( 'Style Slide' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-banner-single-room/style-1.png' ,
                ) ,
                'style-2' => array(
                    'title' => esc_html__( 'Style Image' , ST_TEXTDOMAIN ) ,
                    'image' => st_hotel_alone_load_assets_dir() . '/images/st-banner-single-room/style-2.png' ,
                ) ,
            )
        ) ,
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('#scroll',ST_TEXTDOMAIN),
            'param_name' => 'link_scroll',
            'description' => esc_html__('Enter a ID for scroll',ST_TEXTDOMAIN),
            'std' => '',
            'edit_field_class' => 'vc_column vc_col-sm-12'
        ),
    )
));