<?php
if(!class_exists('ST_Amadeus_Controller')){
    class ST_Amadeus_Controller{
        static $_inst;
        public $asset_url;

        public function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, '_load_amadeus_scripts'), 10);
            add_action('wp_head', array($this, '_show_custom_css'), 100);

            add_action('wp_ajax_st_get_airport_data', array($this, 'get_airport_data'));
            add_action('wp_ajax_nopriv_st_get_airport_data', array($this, 'get_airport_data'));
        }

        public function get_airport_data(){
            $fcode = STInput::request('fcode');
            $data = $this->data_fcode();
            $arr = [];
            if(!empty($fcode)){
                foreach ($fcode as $k => $v){
                    $arr[$v] = $data[$v];
                }
            }
            echo json_encode($arr);
            die;
        }

        public function data_fcode(){
            return array(
                'BER' => array(
                    'airport' => 'Berlin AP',
                    'country' => 'Berlin'
                ),
                'JFK' => array(
                    'airport' => 'Jon.K AP',
                    'country' => 'New York'
                ),
                'LON' => array(
                    'airport' => 'London AP',
                    'country' => 'London'
                ),
                'TXL' => array(
                    'airport' => 'Travel.X AP',
                    'country' => 'Travel'
                ),
                'FRA' => array(
                    'airport' => 'Frans AP',
                    'country' => 'Fransh'
                ),
                'LIS' => array(
                    'airport' => 'Lisbon AP',
                    'country' => 'Lisbon'
                ),
            );
        }

        public function _show_custom_css(){
            $style = st_amadeus_load_view('custom_css', false);
            ?>
            <style id="amadeus_cutom_css">
                <?php echo ($style);?>
            </style>
            <?php
            echo "\n";
        }

        public function _load_amadeus_scripts(){
            wp_register_style('amadeus-flight-css', get_template_directory_uri() . '/inc/modules/amadeus/assets/css/amadeus_flight.css');
            wp_register_script('moment-flight-js', get_template_directory_uri() . '/inc/modules/amadeus/assets/js/moment.min.js', array('jquery'), null, true);
            wp_register_script('amadeus-flight-js', get_template_directory_uri() . '/inc/modules/amadeus/assets/js/amadeus_flight.js', array('jquery', 'moment-flight-js'), null, true);

            wp_register_script( 'st.amadeus', get_template_directory_uri() . '/js/amadeus/custom-amadeus.js', [ 'jquery' ], null, true );
            wp_localize_script( 'jquery', 'st_amadeus', [
                'apikey'        => st()->get_option('amadeus_apikey', 'aGwB9fXobnFiLYgemETf4dXbr7On0C4X'),
                'currency'      => st()->get_option('amadeus_currency_default', 'USD'),
                'currency_symbol' => st()->get_option('amadeus_currency_symbol', '$'),
                'currency_symbol_pos' => st()->get_option('amadeus_currency_pos', 'left'),
                'target' => st()->get_option('amadeus_target', 'on'),
            ] );
            wp_localize_script( 'jquery', 'st_amadeus_text', [
                'departure' => esc_html('Departure', ST_TEXTDOMAIN),
                'to' => esc_html('to', ST_TEXTDOMAIN),
                'result' => esc_html('result(s)', ST_TEXTDOMAIN),
                'book' => esc_html('Book now', ST_TEXTDOMAIN),
                'airport' => esc_html('Airport', ST_TEXTDOMAIN),
                'layover' => esc_html('Layover', ST_TEXTDOMAIN),
                'travel_class' => esc_html('Travel class', ST_TEXTDOMAIN),
                'cabin_code' => esc_html('Cabin code', ST_TEXTDOMAIN),
                'fare_family' => esc_html('Fare family', ST_TEXTDOMAIN),
                'on' => esc_html('on', ST_TEXTDOMAIN),
                'h' => esc_html('h', ST_TEXTDOMAIN),
                'm' => esc_html('m', ST_TEXTDOMAIN),
                'stop_at' => esc_html('Stop at', ST_TEXTDOMAIN),
                'flight_number' => esc_html('Flight number', ST_TEXTDOMAIN),
                'aircraft' => esc_html('Aircraft', ST_TEXTDOMAIN),
                'no_more' => esc_html('No more', ST_TEXTDOMAIN),
                'load_more' => esc_html('Load more', ST_TEXTDOMAIN),
                'error_text' => esc_html('Have an error occurs!', ST_TEXTDOMAIN),
                'no_result' => esc_html('No results.', ST_TEXTDOMAIN),
                'jan' => esc_html('Jan', ST_TEXTDOMAIN),
                'feb' => esc_html('Feb', ST_TEXTDOMAIN),
                'mar' => esc_html('Mar', ST_TEXTDOMAIN),
                'apr' => esc_html('Apr', ST_TEXTDOMAIN),
                'may' => esc_html('May', ST_TEXTDOMAIN),
                'jun' => esc_html('Jun', ST_TEXTDOMAIN),
                'jul' => esc_html('Jul', ST_TEXTDOMAIN),
                'aug' => esc_html('Aug', ST_TEXTDOMAIN),
                'sep' => esc_html('Sep', ST_TEXTDOMAIN),
                'oct' => esc_html('Oct', ST_TEXTDOMAIN),
                'nov' => esc_html('Nov', ST_TEXTDOMAIN),
                'dec' => esc_html('Dec', ST_TEXTDOMAIN),
                'api_key' => esc_html('API Key', ST_TEXTDOMAIN),
                'origin' => esc_html('Origin', ST_TEXTDOMAIN),
                'destination' => esc_html('Destination', ST_TEXTDOMAIN),
                'departure_date' => esc_html('Departure date', ST_TEXTDOMAIN),
                'return_date' => esc_html('Return date', ST_TEXTDOMAIN),
                'adults' => esc_html('Adults', ST_TEXTDOMAIN),
                'children' => esc_html('Children', ST_TEXTDOMAIN),
                'infants' => esc_html('Infants', ST_TEXTDOMAIN),
                'currency' => esc_html('Currency', ST_TEXTDOMAIN),
                'other' => esc_html('Other', ST_TEXTDOMAIN),
            ] );

            if(is_page_template('template-amadeus-flights-search.php')) {
                wp_enqueue_style('amadeus-flight-css');
                wp_enqueue_script('amadeus-flight-js');
            }
        }

        static function inst(){
            if(!self::$_inst)
                self::$_inst = new self();

            return self::$_inst;
        }
    }
    ST_Amadeus_Controller::inst();
}