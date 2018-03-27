<?php
    global $post;

    wp_enqueue_script( 'magnific.js' );

    $link = st_get_link_with_search( get_permalink(), [ 'start', 'end', 'transfer_from', 'transfer_to', 'passenger' ], $_GET );

    $transfer = STCarTransfer::inst();

    $thumb_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    $check_in  = '';
    $check_out = '';

    if ( !isset( $_REQUEST[ 'start' ] ) || empty( $_REQUEST[ 'start' ] ) ) {
        $check_in = date( 'm/d/Y', strtotime( "now" ) );
    } else {
        $check_in = TravelHelper::convertDateFormat( STInput::request( 'start' ) );
    }

    if ( !isset( $_REQUEST[ 'end' ] ) || empty( $_REQUEST[ 'end' ] ) ) {
        $check_out = date( 'm/d/Y', strtotime( "+1 day" ) );
    } else {
        $check_out = TravelHelper::convertDateFormat( STInput::request( 'end' ) );
    }
?>
<li <?php post_class( 'booking-item' ) ?>>
    <div class="overlay-form" style="display: none;"><i class="fa fa-refresh text-color"></i></div>
    <?php echo STFeatured::get_featured(); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="booking-item-img-wrap st-popup-gallery">
                <a href="<?php echo esc_url( $thumb_url ) ?>" class="st-gp-item">
                    <?php if ( has_post_thumbnail() and get_the_post_thumbnail() ) {
                        the_post_thumbnail( [ 360, 270 ], [ 'alt' => TravelHelper::get_alt_image( get_post_thumbnail_id( get_the_ID() ) ) ] );
                    } else {
                        echo st_get_default_image();
                    } ?>
                </a>
                <?php
                    $count   = 0;
                    $gallery = get_post_meta( get_the_ID(), 'gallery', true );

                    $gallery = explode( ',', $gallery );


                    if ( !empty( $gallery ) and $gallery[ 0 ] ) {
                        $count += count( $gallery );
                    }

                    if ( has_post_thumbnail() ) {
                        $count++;
                    }


                    if ( $count ) {
                        echo '<div class="booking-item-img-num"><i class="fa fa-picture-o"></i>';
                        echo esc_attr( $count );
                        echo '</div>';
                    }
                ?>
                <div class="hidden">
                    <?php if ( !empty( $gallery ) and $gallery[ 0 ] ) {
                        $count += count( $gallery );
                        foreach ( $gallery as $key => $value ) {
                            $img_link = wp_get_attachment_image_src( $value, [ 800, 600, 'bfi_thumb' => true ] );
                            if ( isset( $img_link[ 0 ] ) )
                                echo "<a class='st-gp-item' href='{$img_link[0]}'></a>";
                        }

                    } ?>
                </div>
                <?php
                    echo st_get_avatar_in_list_service( get_the_ID(), 35 );
                ?>
            </div>
        </div>
        <form action="" method="post" class="form-booking-car-transfer">
            <div class="col-md-6">
                <h5 class="booking-item-title"><?php the_title() ?></h5>
                <ul class="icon-group booking-item-rating-stars">
                    <?php
                        $avg = STReview::get_avg_rate();
                        echo TravelHelper::rate_to_string( $avg );
                    ?>
                </ul>
                <span
                    class="booking-item-rating-number"><b><?php echo esc_html( $avg ) ?></b> <?php st_the_language( 'of_5' ) ?></span>
                <small>
                    (<?php comments_number( st_get_language( 'no_review' ), st_get_language( '1_review' ), st_get_language( 's_reviews' ) ); ?>
                    )
                </small>
                <ul class="booking-item-features booking-item-features-small clearfix mt20">
                    <?php
                        $passenger = (int)STInput::get( 'passengers', 0 );
                        if ( $passenger > 0 ):
                            ?>
                            <li title="" data-placement="top" rel="tooltip"
                                data-original-title="<?php echo $passenger . ' ' . __( 'Passengers', ST_TEXTDOMAIN ) ?>">
                                <i class="fa fa-users"></i>
                            </li>
                            <?php
                            $transfer_from = (int)STInput::get( 'transfer_from', '' );
                            $transfer_to   = (int)STInput::get( 'transfer_to', '' );
                            $roundtrip     = STInput::get( 'roundtrip', '' );
                            $time          = STCarTransfer::inst()->get_driving_distance( $transfer_from, $transfer_to, $roundtrip );
                            ?>
                            <li title="" data-placement="top" rel="tooltip"
                                data-original-title="<?php
                                    echo esc_attr( $time[ 'distance' ] ) . ' ' . __( 'Km', ST_TEXTDOMAIN );
                                ?>">
                                <i class="fa fa-clock-o mr5"></i>
                            </li>
                            <?php
                        endif;
                    ?>
                </ul>
            </div>
            <div class="col-md-3">
                <span class="booking-item-price-from"><?php _e( "Price from", ST_TEXTDOMAIN ) ?></span>
                <?php
                    $minmax = STAdminCars::inst()->get_min_max_price_transfer( get_the_ID() );
                ?>
                <span class="booking-item-price">
                    <?php echo TravelHelper::format_money( $minmax[ 'min_price' ] ) ?></span>/
                <?php echo $transfer->get_transfer_unit( get_the_ID() ); ?>
                <span>
                    <br/>
                    <?php
                        $start      = STInput::get( 'start', '' );
                        $start_time = STInput::get( 'start-time', '' );
                        $end        = STInput::get( 'end', '' );
                        $end_time   = STInput::get( 'end-time', '' );

                        $transfer_from = (int)STInput::get( 'transfer_from' );
                        $transfer_to   = (int)STInput::get( 'transfer_to' );
                        $roundtrip     = STInput::get( 'roundtrip', '' );
                        $passengers    = (int)STInput::get( 'passengers' );
                    ?>
                    <input type="hidden" name="transfer_from" value="<?php echo esc_attr( $transfer_from ); ?>">
                <input type="hidden" name="transfer_to" value="<?php echo esc_attr( $transfer_to ); ?>">
                <input type="hidden" name="roundtrip" value="<?php echo esc_attr( $roundtrip ); ?>">
                <input type="hidden" name="passengers" value="<?php echo esc_attr( $passengers ); ?>">
                <input type="hidden" name="start" value="<?php echo esc_attr( $start ); ?>">
                <input type="hidden" name="start-time" value="<?php echo esc_attr( $start_time ); ?>">
                <input type="hidden" name="end" value="<?php echo esc_attr( $end ); ?>">
                <input type="hidden" name="end-time" value="<?php echo esc_attr( $end_time ); ?>">
                <input type="hidden" name="action" value="add_to_cart_transfer">
                <input type="hidden" name="car_id" value="<?php echo get_the_ID(); ?>">
                    <?php
                    $external_book = get_post_meta(get_the_ID(), 'st_car_external_booking', true);
                    if($external_book == 'on'){
                        $external_link = get_post_meta(get_the_ID(), 'st_car_external_booking_link', true);
                        ?>
                            <a href="<?php echo esc_url($external_link); ?>" class="btn btn-primary"><?php echo __('Book Now', ST_TEXTDOMAIN); ?></a>
                        <?php
                    }else{
                        ?>
                        <input type="submit" name="booking_car_transfer" class="btn btn-primary"
                               value="<?php echo __( 'Book Now', ST_TEXTDOMAIN ); ?>">
                    <?php
                    }
                    ?>
            </div>
        </form>
    </div>
    <div class="message alert"></div>
</li>