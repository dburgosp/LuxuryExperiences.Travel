<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/15/2017
 * Version: 1.0
 */

if(!function_exists('hotel_alone_vc_list_offers') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_vc_list_offers($atts, $content = false){
        $output = $order_by = $order = $number_items = $style = '';
        $atts = shortcode_atts(array(
            'style' => 'style-1',
            'list_offfer' => '',
            'title' => '',
            'sub_title' => '',
            'description' => ''
        ),$atts);

        extract($atts);
        wp_enqueue_script('hotel-alone-slick-js');
        wp_enqueue_style('hotel-alone-slick-css');


        $output .= st_hotel_alone_load_view('elements/st-list-offers/offer-'.$style, false, array(
            'atts' => $atts
        ));

        return $output;
    }
}

st_reg_shortcode('hotel_alone_list_offers','hotel_alone_vc_list_offers');

vc_map(array(
    'name' => esc_html__('[Hotel Single] ST List Offers',ST_TEXTDOMAIN),
    'base' => 'hotel_alone_list_offers',
    'icon' => 'icon-st',
    'category' => 'Hotel Single',
    'description' => esc_html__('List offers', ST_TEXTDOMAIN),
    'params' => array(
        array(
            'type' => 'radio_image',
            'admin_label' => true,
            'heading' => esc_html__('Style',ST_TEXTDOMAIN),
            'param_name' => 'style',
            'std' => 'style-1',
            'value' => array(
                'style-1'=> array(
                    'title'=>esc_html__('Style 1',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-list-offers/o-style-1.png',
                ),
                'style-2'=> array(
                    'title'=>esc_html__('Style 2',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-list-offers/o-style-2.png',
                ),
                'style-3'=> array(
                    'title'=>esc_html__('Style 3',ST_TEXTDOMAIN),
                    'image'=>st_hotel_alone_load_assets_dir().'/images/st-list-offers/o-style-3.png',
                )
            ),
            'w' => 'w320'
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', ST_TEXTDOMAIN),
            'param_name' => 'title',
            'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub Title', ST_TEXTDOMAIN),
            'param_name' => 'sub_title',
            'description' => esc_html__('Enter a text for sub title', ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', ST_TEXTDOMAIN),
            'param_name' => 'description',
            'description' => esc_html__('Enter a text for description', ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style-1')
            )
        ),

        array(
            'type' => 'param_group',
            "heading" => esc_html__("List Offer", ST_TEXTDOMAIN),
            "param_name" => "list_offfer",
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Offer Image', ST_TEXTDOMAIN),
                    'param_name' => 'image',
                    'description' => esc_html__('Image of this offer', ST_TEXTDOMAIN),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'description' => esc_html__('Name of offer', ST_TEXTDOMAIN)
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', ST_TEXTDOMAIN),
                    'param_name' => 'desc',
                    'description' => esc_html__('Description to this offer', ST_TEXTDOMAIN)
                ),
                array(
                    'type' => 'st_number',
                    'heading' => esc_html__('Price per person', ST_TEXTDOMAIN),
                    'param_name' => 'price',
                    'min' => 0,
                    'max' => 200,
                    'prefix' => ''
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('Link', ST_TEXTDOMAIN),
                    'param_name' => 'link',
                    'description' => esc_html__('Custom link of service', ST_TEXTDOMAIN)
                )
            )
        ),

    )
));
