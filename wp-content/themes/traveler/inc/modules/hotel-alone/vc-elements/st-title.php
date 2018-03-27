<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/15/2017
 * Version: 1.0
 */
if(!function_exists('hotel_alone_vc_title') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')) {
    function hotel_alone_vc_title($atts, $content = false){
        $output = $title_link = $text_align = $extra_class = $heading = $title_font = $separator = '';
        $atts = shortcode_atts(array(
            'sub_title' => '',
            'title' => '',
            'separator' => 'yes',
            'title_link' => '',
            'heading' => 'h3',
            'title_font_size' => '',
            'title_line_height' => '',
            'title_font_weight' => '400',
            'text_align' => 'center',
            'title_color' => '',
            'title_font_style' => '',
            'title_font' => '',
            'm_bottom' => 0,
            'extra_class' => ''
        ), $atts);
        extract($atts);

        if(empty($title)){
            return '';
        }

        $link = vc_build_link($title_link);

        $style_str = $title_new = $link_color = '';
        if(!empty($title_font_size)){
            $style_str .= 'font-size: '.$title_font_size.'px !important;';
        }
        if(!empty($title_line_height)){
            $style_str .= 'line-height: '.$title_line_height.'px !important;';
        }
        if(!empty($title_font_weight)){
            $style_str .= 'font-weight: '.$title_font_weight.' !important;';
        }
        if(!empty($title_font_style)){
            $style_str .= 'font-style: '.$title_font_style.' !important;';
        }
        if(!empty($title_color)){
            $style_str .= 'color: '.$title_color.' !important;';
            $link_color = Hotel_Alone_Helper::inst()->build_css('color: '.$title_color.' !important');
        }

        if(!empty($sub_title)){
            $sub_title = '<p class="sub-title">'.$sub_title.'</p>';
        }

        $style_str .= 'text-align: '.$text_align.' !important;';
        $align = Hotel_Alone_Helper::inst()->build_css('text-align: '.$text_align.' !important;');

        $style_class = Hotel_Alone_Helper::inst()->build_css($style_str);

        if(!empty($link['url'])){
            $title_new = '<a class="'.$link_color.'" href="'.$link['url'].'" '.(isset($link['title'])?'title="'.$link['title'].'"':'').' '.(isset($link['target'])?'target="'.$link['target'].'"':'').' '.(isset($link['rel'])?'rel="'.$link['rel'].'"':'').'>'.$title.'</a>';
        }else{
            $title_new = $title;
        }

        $margin_css = '';
        if(!empty($m_bottom)){
            $margin_css = Hotel_Alone_Helper::inst()->build_css('margin-bottom: '.$m_bottom.'px');
        }

        $output .= '<div class="helios-heading '.$align.' '.$extra_class.' '.$margin_css.' '.$text_align.' '.$separator.'">';
        $output .= $sub_title;
        $title_new = str_replace('{','[',$title_new);
        $title_new = str_replace('}',']',$title_new);
        $output .= '<'.$heading.' class="helios-title '.$style_class.' '.$title_font.'">'.do_shortcode($title_new).'</'.$heading.'>';
        $output .= '</div>';

        return $output;
    }

    st_reg_shortcode('hotel_alone_title', 'hotel_alone_vc_title');

    vc_map(array(
        'base' => 'hotel_alone_title',
        'name' => esc_html__('ST Title', ST_TEXTDOMAIN),
        'icon' => 'icon-st',
        'category' => 'Hotel Single',
        'description' => esc_html__('Customize text', ST_TEXTDOMAIN),
        'params' => array(
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Title', ST_TEXTDOMAIN),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter a text for title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Sub Title', ST_TEXTDOMAIN),
                'param_name' => 'sub_title',
                'description' => esc_html__('Enter a sub title', ST_TEXTDOMAIN)
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Title Link', ST_TEXTDOMAIN),
                'param_name' => 'title_link'
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show Separator', ST_TEXTDOMAIN),
                'param_name' => 'separator',
                'value' => array(
                    esc_html__('Yes', ST_TEXTDOMAIN) => 'yes'
                ),
                'std' => 'yes'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading', ST_TEXTDOMAIN),
                'param_name' => 'heading',
                'std' => 'h3',
                'value' => array(
                    esc_html__('Heading 1', ST_TEXTDOMAIN) => 'h1',
                    esc_html__('Heading 2', ST_TEXTDOMAIN) => 'h2',
                    esc_html__('Heading 3', ST_TEXTDOMAIN) => 'h3',
                    esc_html__('Heading 4', ST_TEXTDOMAIN) => 'h4',
                    esc_html__('Heading 5', ST_TEXTDOMAIN) => 'h5',
                    esc_html__('Heading 6', ST_TEXTDOMAIN) => 'h6'
                )
            ),
            array(
                'type' => 'st_number',
                'heading' => esc_html__('Font Size(title)', ST_TEXTDOMAIN),
                'param_name' => 'title_font_size',
                'min' => 1,
                'max' => 200,
                'prefix' => 'px',
                'edit_field_class' => 'vc_column vc_col-sm-6'
            ),
            array(
                'type' => 'st_number',
                'heading' => esc_html__('Line Height(title)', ST_TEXTDOMAIN),
                'param_name' => 'title_line_height',
                'min' => 1,
                'max' => 200,
                'prefix' => 'px',
                'edit_field_class' => 'vc_column vc_col-sm-6'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Font Weight(title)', ST_TEXTDOMAIN),
                'param_name' => 'title_font_weight',
                'std' => '400',
                'value' => array(
                    esc_html__('100' ,ST_TEXTDOMAIN) => 100,
                    esc_html__('200' ,ST_TEXTDOMAIN) => 200,
                    esc_html__('300' ,ST_TEXTDOMAIN) => 300,
                    esc_html__('400' ,ST_TEXTDOMAIN) => 400,
                    esc_html__('500' ,ST_TEXTDOMAIN) => 500,
                    esc_html__('600' ,ST_TEXTDOMAIN) => 600,
                    esc_html__('700' ,ST_TEXTDOMAIN) => 700,
                    esc_html__('800' ,ST_TEXTDOMAIN) => 800,
                    esc_html__('900' ,ST_TEXTDOMAIN) => 900,
                    esc_html__('Bold' ,ST_TEXTDOMAIN) => 'bold',
                    esc_html__('Normal' ,ST_TEXTDOMAIN) => 'normal',
                ),
                'edit_field_class' => 'vc_column vc_col-sm-6'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text Align', ST_TEXTDOMAIN),
                'param_name' => 'text_align',
                'std' => 'center',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'value' => array(
                    esc_html__('Left' ,ST_TEXTDOMAIN) => 'left',
                    esc_html__('Center' ,ST_TEXTDOMAIN) => 'center',
                    esc_html__('Right' ,ST_TEXTDOMAIN) => 'right',
                )
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', ST_TEXTDOMAIN),
                'param_name' => 'title_color',
                'edit_field_class' => 'vc_column vc_col-sm-6'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Font Style (title)', ST_TEXTDOMAIN),
                'param_name' => 'title_font_style',
                'std' => 'normal',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'value' => array(
                    esc_html__('Normal' ,ST_TEXTDOMAIN) => 'normal',
                    esc_html__('Italic' ,ST_TEXTDOMAIN) => 'italic',
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Title Font', ST_TEXTDOMAIN),
                'param_name' => 'title_font',
                'value' => array(
                    esc_html__('Playfair Display', ST_TEXTDOMAIN) => 'playfair',
                    esc_html__('Lato', ST_TEXTDOMAIN) => 'st_lato',
                    esc_html__('AmaticSC', ST_TEXTDOMAIN) => 'st_amatic'
                )
            ),
            array(
                'type' => 'st_number',
                'heading' => esc_html__('Margin Bottom', ST_TEXTDOMAIN),
                'param_name' => 'm_bottom',
                'value' => 0,
                'min' => 0,
                'prefix' => 'px',
                'edit_field_class' => 'vc_column vc_col-sm-6'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', ST_TEXTDOMAIN),
                'param_name' => 'extra_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', ST_TEXTDOMAIN)
            ),
        )
    ));
}

