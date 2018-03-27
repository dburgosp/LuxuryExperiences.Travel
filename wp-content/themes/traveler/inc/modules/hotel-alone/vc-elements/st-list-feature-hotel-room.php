<?php
if(!function_exists('hotel_alone_func_list_feature_hotel_room') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_func_list_feature_hotel_room($atts, $content = false){
        $data = shortcode_atts(array(
            'style' => 'style-1',
            'service_id' => '',
            'select_category' => '',
            'number_post' => '2',
            'order_by' => 'ID',
            'order' => 'DESC',
            'use_ids' => 'no',
            'service_ids' => '',
            'title' => '',
            'description' => '',
        ), $atts);
        extract($data);
        $output = st_hotel_alone_load_view( 'elements/st-list-feature-hotel-room/'.$style , false , array( 'data' => $data ) );
        return $output;
    }
}
if(st_check_service_available( 'st_hotel' )) {
    st_reg_shortcode('hotel_alone_list_feature_hotel_room', 'hotel_alone_func_list_feature_hotel_room');
}
vc_map(array(
    'name' => esc_html__('ST List Carousel Hotel Room', ST_TEXTDOMAIN),
    'base' => 'hotel_alone_list_feature_hotel_room',
    'icon' => 'icon-st',
    'category' => 'Hotel Single',
    'params' => array(
        array(
            'type' => 'radio_image',
            'admin_label' => true,
            'heading' => esc_html__('List Style Options',ST_TEXTDOMAIN),
            'param_name' => 'style',
            'std' => 'style-1',
            'value' => array(
                'style-1'=> array(
                    'title'=>esc_html__('Style 1',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir() .'/images/st-list-feature-hotel-room/style-1.jpg',
                ),
                'style-2'=> array(
                    'title'=>esc_html__('Style 2',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-list-feature-hotel-room/style-2.jpg',
                ),
                'style-3'=> array(
                    'title'=>esc_html__('Style 3',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-list-feature-hotel-room/style-3.jpg',
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title', ST_TEXTDOMAIN),
            'param_name' => 'title',
            'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', ST_TEXTDOMAIN),
            'param_name' => 'description',
            'description' => esc_html__('Enter description', ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),
        array(
            'type' 			=> 'autocomplete',
            'class' 		=> '',
            'heading' => esc_html__( 'Select Hotel', ST_TEXTDOMAIN ),
            'param_name' => 'service_id',
            'settings' 		=> array(
                'multiple' 		=> false,
                'sortable' 		=> true,
                'unique_values' => true,
                'values'		=> st_hotel_alone_get_type_services_data('st_hotel'),
            ),
            'description' => esc_html__( 'Enter List of Services', ST_TEXTDOMAIN ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Select Categories',ST_TEXTDOMAIN),
            'param_name' => 'select_category',
            'desc' => esc_html__('Check the box to choose category',ST_TEXTDOMAIN),
            'value' => st_hotel_alone_vc_list_taxonomy('room_type'),
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__('Number Items',ST_TEXTDOMAIN),
            'param_name' => 'number_post',
            'description' => esc_html__('Number services', ST_TEXTDOMAIN),
            'value' => array(
                esc_html__('2 Item', ST_TEXTDOMAIN) => '2',
                esc_html__('3 Item', ST_TEXTDOMAIN) => '3',
                esc_html__('4 Item', ST_TEXTDOMAIN) => '4',
                esc_html__('6 Item', ST_TEXTDOMAIN) => '6',
            ),
            'prefix' => esc_html__('service', ST_TEXTDOMAIN),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By', ST_TEXTDOMAIN),
            'param_name' => 'order_by',
            'value' => hotel_alone_vc_convert_array(hotel_alone_get_order_list()),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'std' => 'ID'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order', ST_TEXTDOMAIN),
            'param_name' => 'order',
            'value' => array(
                esc_html__('ASC', ST_TEXTDOMAIN) => 'ASC',
                esc_html__('DESC', ST_TEXTDOMAIN) => 'DESC'
            ),
            'std' => 'DESC',
            'edit_field_class' => 'vc_column vc_col-sm-6'
        ),
    )
));