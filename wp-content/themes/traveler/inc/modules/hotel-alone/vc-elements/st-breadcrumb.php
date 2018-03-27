<?php
if(!function_exists('hotel_alone_vc_breadcrumb') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_vc_breadcrumb($atts, $content = false){
        $output = $title_source = $title =  $title_color =   '';
        extract(shortcode_atts(array(
            'title_source' => 'custom_title',
            'title' => '',
            'title_color' => '',
        ),$atts));
        if($title_source == 'get_title' && !empty(get_the_ID())){
            $title = get_the_title(get_the_ID());
        }
        if(!empty($title_color)){
            $title_color = Hotel_Alone_Helper::inst()->build_css(' color: '.$title_color.' !important ');
        }
        $output .= '<div class="helios-breadcrumb">
                        <div class="center text-center">';
        $output .= '<h3 class="title '.esc_attr($title_color).'">'.esc_html($title).'</h3>';
        $output .= '<div class="helios-breadcrumb text-color">' . hotel_alone_display_breadcrumbs() . '</div>';
        $output .= '</div></div>';
        return $output;
    }
}
st_reg_shortcode('hotel_alone_breadcrumb', 'hotel_alone_vc_breadcrumb');
vc_map(array(
    'name' => esc_html__('[Hotel Single] ST Breadcrumb',ST_TEXTDOMAIN),
    'base' => 'hotel_alone_breadcrumb',
    'description' => esc_html__('ST Breadcrumb',ST_TEXTDOMAIN),
    'icon' => 'icon-st',
    'category' => 'Hotel Single',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__('Title Source',ST_TEXTDOMAIN),
            'param_name' => 'title_source',
            'description' => esc_html__('Select title source',ST_TEXTDOMAIN),
            'value' => array(
                esc_html__('Custom Title',ST_TEXTDOMAIN) => 'custom_title',
                esc_html__('Post or page,... title',ST_TEXTDOMAIN) => 'get_title'
            ),
            'std' => 'custom_title'
        ),
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => esc_html__('Title',ST_TEXTDOMAIN),
            'param_name' => 'title',
            'description' => esc_html__('Enter a text for title',ST_TEXTDOMAIN),
            'dependency' => array(
                'element' => 'title_source',
                'value' => array('custom_title')
            )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color',ST_TEXTDOMAIN),
            'param_name' => 'title_color',
            'description' => esc_html__('Choose color for text',ST_TEXTDOMAIN),
            'edit_field_class' => 'vc_column vc_col-sm-6'
        ),
    )
));