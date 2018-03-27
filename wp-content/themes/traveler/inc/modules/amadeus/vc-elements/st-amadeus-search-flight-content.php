<?php
if(function_exists('vc_map')){
    vc_map( array(
        "name" => __("ST Search Flight Result", ST_TEXTDOMAIN),
        "base" => "st_amadeus_search_flight_content",
        "content_element" => true,
        "icon" => "icon-st",
        "category"=>"Amadeus",
        "params" => array(
            array(
                "type"             => "textfield" ,
                'admin_label' => true,
                "heading"          => __( "Title" , ST_TEXTDOMAIN ) ,
                "param_name"       => "st_title" ,
                "description"      => "" ,
                "value"            => "" ,
                'edit_field_class' => 'vc_col-sm-6' ,
            ) ,
            array(
                "type"             => "dropdown" ,
                'admin_label' => true,
                "heading"          => __( "Font Size" , ST_TEXTDOMAIN ) ,
                "param_name"       => "st_font_size" ,
                "description"      => "" ,
                "value"            => array(
                    __('--Select--',ST_TEXTDOMAIN)=>'',
                    __( "H1" , ST_TEXTDOMAIN ) => '1' ,
                    __( "H2" , ST_TEXTDOMAIN ) => '2' ,
                    __( "H3" , ST_TEXTDOMAIN ) => '3' ,
                    __( "H4" , ST_TEXTDOMAIN ) => '4' ,
                    __( "H5" , ST_TEXTDOMAIN ) => '5' ,
                    __( "H6" , ST_TEXTDOMAIN ) => '6' ,
                ) ,
                'edit_field_class' => 'vc_col-sm-6' ,
            ) ,
            array(
                "type"        => "textfield" ,
                'admin_label' => true,
                "heading"     => __( "Number of flight" , ST_TEXTDOMAIN ) ,
                "param_name"  => "st_number_flight" ,
                "description" => "" ,
                'value'       => 10 ,
            )
        )
    ) );
}

if(!function_exists('st_vc_amadeus_search_flight_content')){
    function st_vc_amadeus_search_flight_content($attr,$content=false)
    {
        $data = array(
                'st_title'=> '',
                'st_font_size'=>'3',
                'st_number_flight' => 10
            );
        $attr    = wp_parse_args( $attr , $data );
        $txt = st_amadeus_load_view('elements/st-amadeus-search-flight-content/search','content',array('attr'=>$attr));
        return $txt;
    }
}
st_reg_shortcode('st_amadeus_search_flight_content','st_vc_amadeus_search_flight_content');