<?php
add_action( 'vc_before_init', 'alispx_post_finder_multiple_integrateWithVC' );

if(!function_exists('hotel_alone_vc_slider') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_vc_slider($atts, $content = false){

        extract($data = shortcode_atts(array(
            'style' => 'style-1',
            'form_search' => '',
            'list_item_slider' => '',
            'st_title' => '',
            'st_content' => '',
            'st_sub_title' => '',
            'list_images' => '',
            'st_link_viewmore' => '',
            'link_scroll' => '#',
            'text_sroll_1' => '',
            'text_sroll_2' => '',
        ), $atts));

        $html = st_hotel_alone_load_view('elements/st-slider/st-slider', false,array('data'=>$data));

        return $html;
    }
}
if(st_check_service_available( 'st_hotel' )) {
    st_reg_shortcode('hotel_alone_slider', 'hotel_alone_vc_slider');
}

vc_map(array(
    'name' => esc_html__('[Hotel Single] Slider', ST_TEXTDOMAIN),
    'base' => 'hotel_alone_slider',
    'icon' => 'icon-st',
    'category' => 'Hotel Single',
    'description' => esc_html__('Create slider',ST_TEXTDOMAIN),
    'params' => array(
        array(
            'type' => 'radio_image',
            'admin_label' => true,
            'heading' => esc_html__('Style Option',ST_TEXTDOMAIN),
            'param_name' => 'style',
            'std' => 'style-1',
            'value' => array(
                'style-1'=> array(
                    'title'=>esc_html__('Style 1',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir() .'/images/st-slide/style-1.jpg',
                ),
                'style-2'=> array(
                    'title'=>esc_html__('Style 2',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-slide/style-2.jpg',
                ),
                'style-3'=> array(
                    'title'=>esc_html__('Style 3',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-slide/style-3.jpg',
                ),
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title',ST_TEXTDOMAIN),
            'param_name' => 'st_title',
            'description' => esc_html__('Input a text for title',ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1','style-2','style-3')
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Content',ST_TEXTDOMAIN),
            'param_name' => 'st_content',
            'description' => esc_html__('Input a text for sub title',ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1','style-2','style-3')
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub Title',ST_TEXTDOMAIN),
            'param_name' => 'st_sub_title',
            'description' => esc_html__('Input a text for sub title',ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Link ViewMore',ST_TEXTDOMAIN),
            'param_name' => 'st_link_viewmore',
            'description' => esc_html__('Link ViewMore',ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-2','style-3')
            )
        ),
        array(
            'type' => 'attach_images',
            'heading' => esc_html__('List Feature Images',ST_TEXTDOMAIN),
            'param_name' => 'list_images',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1','style-2','style-3')
            )
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('#scroll',ST_TEXTDOMAIN),
            'param_name' => 'link_scroll',
            'description' => esc_html__('Enter a ID for scroll',ST_TEXTDOMAIN),
            'std' => '',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1','style-2')
            )
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Text scroll 1',ST_TEXTDOMAIN),
            'param_name' => 'text_sroll_1',
            'description' => esc_html__('Enter a text for scroll',ST_TEXTDOMAIN),
            'std' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-2')
            )
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Text scroll 2',ST_TEXTDOMAIN),
            'param_name' => 'text_sroll_2',
            'description' => esc_html__('Enter a text for scroll',ST_TEXTDOMAIN),
            'std' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-2')
            )
        ),
    )
));
