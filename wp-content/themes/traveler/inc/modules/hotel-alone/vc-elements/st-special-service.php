<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/14/2017
 * Version: 1.0
 */
if(!function_exists('hotel_alone_vc_special_services') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_special_services($atts, $content = false)
    {
        $output = $style = '';

        $atts = shortcode_atts(array(
            'style' => 'style-1',
            'list_style_1' => '',
            'list_style_2' => ''
        ),$atts);
        extract($atts);

        $output .= st_hotel_alone_load_view('elements/st-special-services/special-services-'.$style, false, array(
            'atts' => $atts
        ));

        return $output;
    }
    if(st_check_service_available( 'st_hotel' )) {
        st_reg_shortcode('hotel_alone_special_services', 'hotel_alone_vc_special_services');
    }

    vc_map(array(
        'name' => esc_html__('ST Special Services', ST_TEXTDOMAIN),
        'base' => 'hotel_alone_special_services',
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('List our services', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'radio_image',
                'admin_label' => true,
                'heading' => esc_html__('Style',ST_TEXTDOMAIN),
                'param_name' => 'style',
                'std' => 'style-1',
                'value' => array(
                    'style-1'=> array(
                        'title'=>esc_html__('Style 1 (carousel)',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir().'/images/st-special-services/s-style-1.png',
                    ),
                    'style-2'=> array(
                        'title'=>esc_html__('Style 2',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir().'/images/st-special-services/s-style-2.png',
                    ),
                    'style-3'=> array(
                        'title'=>esc_html__('Style 3',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir().'/images/st-special-services/s-style-3.png',
                    ),
                    'style-4'=> array(
                        'title'=>esc_html__('Style 4',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir().'/images/st-special-services/s-style-4.png',
                    ),
                    'style-5'=> array(
                        'title'=>esc_html__('Style 5',ST_TEXTDOMAIN),
                        'image'=>st_hotel_alone_load_assets_dir().'/images/st-special-services/s-style-5.png',
                    ),
                ),
                'w' => 'w320'
            ),
            array(
                'type' => 'param_group',
                "heading" => esc_html__("List Services", ST_TEXTDOMAIN),
                "param_name" => "list_style_1",
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Service Image', ST_TEXTDOMAIN),
                        'param_name' => 'image',
                        'description' => esc_html__('Image of this service', ST_TEXTDOMAIN),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Name of service', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', ST_TEXTDOMAIN),
                        'param_name' => 'desc',
                        'description' => esc_html__('Description to this service', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link', ST_TEXTDOMAIN),
                        'param_name' => 'link',
                        'description' => esc_html__('Custom link of service', ST_TEXTDOMAIN)
                    )
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-1')
                )

            ),
            array(
                'type' => 'param_group',
                "heading" => esc_html__("List Services", ST_TEXTDOMAIN),
                "param_name" => "list_style_2",
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', ST_TEXTDOMAIN),
                        'param_name' => 'icon',
                        'description' => esc_html__('Choose a icon', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Service Image', ST_TEXTDOMAIN),
                        'param_name' => 'image',
                        'description' => esc_html__('Image of this service', ST_TEXTDOMAIN),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => esc_html__('Name of service', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', ST_TEXTDOMAIN),
                        'param_name' => 'desc',
                        'description' => esc_html__('Description to this service', ST_TEXTDOMAIN)
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link', ST_TEXTDOMAIN),
                        'param_name' => 'link',
                        'description' => esc_html__('Custom link of service', ST_TEXTDOMAIN)
                    )
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('style-2', 'style-3', 'style-4', 'style-5')
                )

            ),
        )
    ));
}
