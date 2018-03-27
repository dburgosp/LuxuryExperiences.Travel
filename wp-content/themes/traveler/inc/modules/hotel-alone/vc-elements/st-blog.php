<?php
/**
 * Created by ShineTheme.
 * Developer: sejuani37
 * Date: 8/15/2017
 * Version: 1.0
 */

if(!function_exists('hotel_alone_vc_blog') && function_exists('vc_map') && function_exists('st_reg_shortcode') && st_check_service_available('st_hotel')){
    function hotel_alone_vc_blog($atts, $content = false){
        $output = $style = $number_items = $select_category = $order_by = $order = $show_load_more = $type = $carousel_style = $isotope_style = $load_more = '';
        $atts = shortcode_atts(array(
            'type' => 'grid',
            'style' => 'style-1',
            'carousel_style' => 'style-1',
            'isotope_style' => 'style-1',
            'load_more' => 'yes',
            'number_items' => '3',
            'select_category' => '',
            'order_by' => 'ID',
            'order' => 'DESC'
        ),$atts);
        extract($atts);

        $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
        if (is_front_page()) {
            $paged = (get_query_var('page')) ? absint(get_query_var('page')) : 1;
        }

        $args = array(
            'post_type' => 'post',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => (int)$number_items,
            'paged' => $paged,
        );

        $list_cat = '';
        if (!empty($select_category)) {
            $list_cat = explode(",", $select_category);
            $args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $list_cat,
            );
        }
        $blog_query = new WP_Query($args);
        if($blog_query->have_posts()) {
            if ($type == 'grid') {
                $output .= '<div class="st-posts post-row '.($style=='style-2'?'no-padding':'').'">';
                $index = 1;
                while($blog_query->have_posts()) {
                    $blog_query->the_post();
                    $class = 'col-3';
                    if($style == 'style-2'){
                        $class = 'col-4';
                    }
                    $output .= '<div class="'.$class.'">';
                    $output .= st_hotel_alone_load_view('blog/item-style/grid-' . $style, false, array(
                        'index' => $index
                    ));
                    $output .= '</div>';
                    $index++;
                }
                $output .= '</div>';
            } elseif ($type == 'list') {
                $style = 'style-1';
                echo '<div class="st-posts">';
                while($blog_query->have_posts()) {
                    $blog_query->the_post();
                    $output .= st_hotel_alone_load_view('blog/item-style/list-' . $style, false, array());
                }
                echo '</div>';
            } elseif ($type == 'carousel'){
                $item = 3;
                if($carousel_style == 'style-2'){
                    $item = 1;
                }

                $output .= '<div class="st-posts post-carousels"><div class="st-post-carousel owl-carousel '.$carousel_style.'" data-item="'.$item.'">';
                while($blog_query->have_posts()) {
                    $blog_query->the_post();
                    $output .= st_hotel_alone_load_view('blog/item-style/carousel-' . $carousel_style, false, null);
                }
                $output .= '</div></div>';
            }
            elseif ($type == 'isotope'){
                $output .= st_hotel_alone_load_view('elements/st-blog/isotope/isotope-control',false,array(
                    'list_cat' => $list_cat
                ));
                $index = 1;
                $output .= '<div class="row '.$isotope_style.'">
                    <div class="st-posts post-isotope '.$isotope_style.'">';
                    while($blog_query->have_posts()){
                        $blog_query->the_post();
                        $output .= st_hotel_alone_load_view('blog/item-style/isotope-'.$isotope_style,false,array(
                            'index' => $index
                        ));
                        $index++;
                    }
                $output .= '</div></div>';
                if($load_more == 'yes'){
                    $output .= '<div class="control-loadmore text-center">';
                    $text = array(
                        'loading' => esc_html__('Loading ...', ST_TEXTDOMAIN),
                        'load_more' => esc_html__('Load more', ST_TEXTDOMAIN),
                        'no_more' => esc_html__('No more', ST_TEXTDOMAIN)
                    );
                    $output .= '<a href="#"
                                    class="load_more_post '.($blog_query->max_num_pages == 1?'disabled':'').'"
                                    id="load_more_post"
                                    data-text=\''.json_encode($text).'\'
                                    data-posts-per-page = "'.$number_items.'"
                                    data-paged = "1"
                                    data-order = "'.$order.'"
                                    data-order-by = "'.$order_by.'"
                                    data-tax-query = "'.esc_attr($select_category).'"
                                    data-max-num-page = "'.$blog_query->max_num_pages.'"
                                    data-style = "'.$isotope_style.'"
                                    data-index = "'.$index.'"
                                    >
                                    '.(((int)$blog_query->max_num_pages == 1)? esc_html__(  'No More' , ST_TEXTDOMAIN ): esc_html__(  'Load More' ,ST_TEXTDOMAIN )).'
                                </a>
                                ';
                    $output .= '</div>';
                }
            }
        }
        wp_reset_postdata();

        return $output;
    }
}

st_reg_shortcode('hotel_alone_blog','hotel_alone_vc_blog');

vc_map(array(
    'name' => esc_html__('[Hotel Single] ST Blog',ST_TEXTDOMAIN),
    'base' => 'hotel_alone_blog',
    'icon' => 'icon-st',
    'category' => 'Hotel Single',
    'description' => esc_html__('List blog', ST_TEXTDOMAIN),
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__('Type',ST_TEXTDOMAIN),
            'param_name' => 'type',
            'value' => array(
                esc_html__('Grid',ST_TEXTDOMAIN) => 'grid',
                esc_html__('List',ST_TEXTDOMAIN) => 'list',
                esc_html__('Carousel',ST_TEXTDOMAIN) => 'carousel',
                esc_html__('Isotope',ST_TEXTDOMAIN) => 'isotope',
            ),
            'std' => 'grid'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style',ST_TEXTDOMAIN),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1',ST_TEXTDOMAIN) => 'style-1',
                esc_html__('Style 2',ST_TEXTDOMAIN) => 'style-2',
            ),
            'std' => 'style-1',
            'dependency' => array(
                'element' => 'type',
                'value' => array('grid')
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style',ST_TEXTDOMAIN),
            'param_name' => 'carousel_style',
            'value' => array(
                esc_html__('Style 1',ST_TEXTDOMAIN) => 'style-1',
                esc_html__('Style 2',ST_TEXTDOMAIN) => 'style-2',
            ),
            'std' => 'style-1',
            'dependency' => array(
                'element' => 'type',
                'value' => array('carousel')
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style',ST_TEXTDOMAIN),
            'param_name' => 'isotope_style',
            'value' => array(
                esc_html__('Style 1',ST_TEXTDOMAIN) => 'style-1',
                esc_html__('Style 2',ST_TEXTDOMAIN) => 'style-2',
            ),
            'std' => 'style-1',
            'dependency' => array(
                'element' => 'type',
                'value' => array('isotope')
            )
        ),
        array(
            'type' => 'st_number',
            'admin_label' => true,
            'heading' => esc_html__('Number Post Items',ST_TEXTDOMAIN),
            'param_name' => 'number_items',
            'description' => esc_html__('Enter number post items',ST_TEXTDOMAIN)
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Select Categories',ST_TEXTDOMAIN),
            'param_name' => 'select_category',
            'desc' => esc_html__('Check the box to choose category',ST_TEXTDOMAIN),
            'value' => st_hotel_alone_vc_list_taxonomy(false),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By',ST_TEXTDOMAIN),
            'param_name' => 'order_by',
            'value' => array_flip(hotel_alone_get_order_list()),
            'std' => 'ID'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order',ST_TEXTDOMAIN),
            'param_name' => 'order',
            'value' => array(
                esc_html__('Descending',ST_TEXTDOMAIN) => 'DESC',
                esc_html__('Ascending',ST_TEXTDOMAIN) => 'ASC',
            ),
            'std' => 'DESC'
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Show Load More',ST_TEXTDOMAIN),
            'param_name' => 'load_more',
            'desc' => esc_html__('Choose yes to show load more button in type isotope',ST_TEXTDOMAIN),
            'value' => array(
                esc_html__('Yes' ,ST_TEXTDOMAIN) => 'yes'
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => array('isotope')
            )
        ),
    )
));

// ajax default
if (!function_exists('hotel_alone_load_more_post')){
    function hotel_alone_load_more_post()
    {
        $posts_per_page = STInput::request('posts_per_page');
        $st_paged          = STInput::request('paged') + 1;
        $order          = STInput::request('order');
        $order_by       = STInput::request('order_by');
        $select_category      = STInput::request('tax_query');
        $isotope_style      = STInput::request('style');
        $index      = STInput::request('index');

        $args = array(
            'post_type' => 'post',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => (int)$posts_per_page,
            'paged' => $st_paged,
        );
        if (!empty($select_category)) {
            $st_list_cat = explode(",", $select_category);
            $args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $st_list_cat,
            );
        }
        $return = array(
            'status' => 0
        );
        $return['paged'] = $st_paged ;
        $return['html'] = "" ;
        $st_pride_query = new WP_Query($args);
        while($st_pride_query->have_posts()) {
            $st_pride_query->the_post();
            $return['html'] .= st_hotel_alone_load_view('blog/item-style/isotope-'.$isotope_style,false, array('index' => $index));
            $index = intval($index) + 1;
        }
        $return['index'] = $index ;
        $return['status'] = 1;
        wp_reset_postdata();
        wp_send_json($return);
        die();
    }
    add_action('wp_ajax_st_hotel_alone_load_more_post','hotel_alone_load_more_post');
    add_action('wp_ajax_nopriv_st_hotel_alone_load_more_post','hotel_alone_load_more_post');
}
