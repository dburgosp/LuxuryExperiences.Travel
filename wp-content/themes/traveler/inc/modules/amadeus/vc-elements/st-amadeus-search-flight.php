<?php
if(function_exists('vc_map')){
    vc_map( array(
        "name" => __("ST Search Flight", ST_TEXTDOMAIN),
        "base" => "st_amadeus_search_flight",
        "content_element" => true,
        "icon" => "icon-st",
        "category"=>"Amadeus",
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Title form search", ST_TEXTDOMAIN),
                "param_name" => "st_title_search",
                "description" =>"",
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __("Form's direction", ST_TEXTDOMAIN),
                "param_name" => "st_direction",
                "description" =>"",
                'value'=>array(
                    __('--Select--',ST_TEXTDOMAIN)=>'',
                    __('Vertical form',ST_TEXTDOMAIN)=>'vertical',
                    __('Horizontal form',ST_TEXTDOMAIN)=>'horizontal'
                ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __("Style", ST_TEXTDOMAIN),
                "param_name" => "st_style_search",
                "description" =>"",
                'value'=>array(
                    __('--Select--',ST_TEXTDOMAIN)=>'',
                    __('Large',ST_TEXTDOMAIN)=>'style_1',
                    __('Normal',ST_TEXTDOMAIN)=>'style_2',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __("Show border box", ST_TEXTDOMAIN),
                "param_name" => "st_box_shadow",
                "description" =>"",
                'value'=>array(
                    __('--Select--',ST_TEXTDOMAIN)=>'',
                    __('No',ST_TEXTDOMAIN)=>'no',
                    __('Yes',ST_TEXTDOMAIN)=>'yes'
                ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __("Field Size", ST_TEXTDOMAIN),
                "param_name" => "field_size",
                "description" =>"",
                'value'=>array(
                    __('--Select--',ST_TEXTDOMAIN)=>'',
                    __('Large',ST_TEXTDOMAIN)=>'lg',
                    __('Normal',ST_TEXTDOMAIN)=>'sm',
                )
            ),
        )
    ) );
}

if(!function_exists('st_vc_amadeus_search_flight')){
    function st_vc_amadeus_search_flight($attr,$content=false)
    {
        $data = shortcode_atts(
            array(
                'st_style_search' =>'style_1',
                'st_direction'=>'horizontal',
                'st_box_shadow'=>'no',
                'st_search_tabs'=>'yes',
                'st_title_search'=>'',
                'field_size'    =>'lg',
                'active'            =>1
            ), $attr, 'st_single_search' );
        extract($data);
        $txt = st_amadeus_load_view('elements/st-amadeus-search-flight/search','form',array('data'=>$data));
        return $txt;
    }
}
st_reg_shortcode('st_amadeus_search_flight','st_vc_amadeus_search_flight');