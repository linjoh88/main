<?php if ( apply_filters( 'inventor_metabox_allowed', true, 'location', get_the_author_meta('ID') ) ): ?>
    <?php $map_latitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'map_location_latitude', true );?>
    <?php $map_longitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'map_location_longitude', true );?>
    <?php $map_polygon = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'map_location_polygon', true );?>
    <?php $map_location_address = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'map_location_address', true );?>
    <?php $map_type = get_theme_mod( 'inventor_general_listing_map_type', 'ROADMAP' );?>
    <?php $map = ! empty( $map_latitude ) || ! empty ( $map_longitude ); ?>

    <?php $street_view = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view', true );?>
    <?php $inside_view = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view', true );?>

    <?php if ( class_exists( 'Inventor_Google_Map' ) && ( ! empty ( $map ) || ! empty ( $street_view ) ) ) : ?>
        <div class="listing-detail-section"  id="listing-detail-section-location">
            <h4 class="test"><?php echo $section_title; ?></h4>

            <div class="listing-detail-location-wrapper">
                <!-- Nav tabs -->
                <div class="col-md-6">   

                <!-- Tab panes -->
                <div class="tab-content">
                    <?php if ( ! empty( $map ) ) : ?>
                        <div role="tabpanel" class="tab-pane fade in active" id="simple-map-panel">
                            <div class="detail-map">
                                <div class="map-position">
                                    <div id="listing-detail-map"
                                         data-transparent-marker-image="<?php echo get_template_directory_uri(); ?>/assets/img/transparent-marker-image.png"
                                         data-latitude="<?php echo esc_attr( $map_latitude ); ?>"
                                         data-longitude="<?php echo esc_attr( $map_longitude ); ?>"
                                         data-polygon-path="<?php echo esc_attr( $map_polygon ); ?>"
                                         data-zoom="15"
                                         data-fit-bounds="false"
                                         data-marker-style="simple"
                                         <?php if ( ! empty( $map_location_address ) ): ?>data-marker-content='<span class="marker-content"><?php echo $map_location_address; ?></span>'<?php endif; ?>
                                         data-map-type="<?php echo esc_attr( $map_type ); ?>">
                                    </div><!-- /#map-property -->
                                </div><!-- /.map-property -->
                            </div><!-- /.detail-map -->
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $street_view ) ) : ?>
                        <?php $street_view_latitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view_location_latitude', true );?>
                        <?php $street_view_longitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view_location_longitude', true );?>
                        <?php $street_view_heading = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view_location_heading', true );?>
                        <?php $street_view_pitch = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view_location_pitch', true );?>
                        <?php $street_view_zoom = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'street_view_location_zoom', true );?>

                        <div role="tabpanel" class="tab-pane fade<?php echo empty( $map ) ? ' in active' : ''; ?>" id="street-view-panel">
                            <div id="listing-detail-street-view"
                                 data-latitude="<?php echo esc_attr( $street_view_latitude ); ?>"
                                 data-longitude="<?php echo esc_attr( $street_view_longitude ); ?>"
                                 data-heading="<?php echo esc_attr( $street_view_heading ); ?>"
                                 data-pitch="<?php echo esc_attr( $street_view_pitch ); ?>"
                                 data-zoom="<?php echo esc_attr( $street_view_zoom ); ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $inside_view ) ) : ?>
                        <?php $inside_view_latitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view_location_latitude', true );?>
                        <?php $inside_view_longitude = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view_location_longitude', true );?>
                        <?php $inside_view_heading = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view_location_heading', true );?>
                        <?php $inside_view_pitch = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view_location_pitch', true );?>
                        <?php $inside_view_zoom = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'inside_view_location_zoom', true );?>

                        <div role="tabpanel" class="tab-pane fade<?php echo ( empty( $map ) && empty( $street_view ) ) ? ' in active' : ''; ?>" id="inside-view-panel">
                            <div id="listing-detail-inside-view"
                                 data-latitude="<?php echo esc_attr( $inside_view_latitude ); ?>"
                                 data-longitude="<?php echo esc_attr( $inside_view_longitude ); ?>"
                                 data-heading="<?php echo esc_attr( $inside_view_heading ); ?>"
                                 data-pitch="<?php echo esc_attr( $inside_view_pitch ); ?>"
                                 data-zoom="<?php echo esc_attr( $inside_view_zoom ); ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
			</div><!-- /.col-* -->
        </div><!-- /.listing-detail-section -->
    <?php endif; ?>
<?php endif; ?>

<?php if ( apply_filters( 'inventor_metabox_allowed', true, 'contact', get_the_author_meta('ID') ) && isset( $fields ) ): ?>
    <?php $predefined_fields = array(
        INVENTOR_LISTING_PREFIX . 'email',
        INVENTOR_LISTING_PREFIX . 'website',
        INVENTOR_LISTING_PREFIX . 'phone',
        INVENTOR_LISTING_PREFIX . 'person',
        INVENTOR_LISTING_PREFIX . 'address'
    ); ?>
    <?php $custom_fields = array_diff( array_keys( $fields ), $predefined_fields ); ?>

    <?php $email = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'email', true ); ?>
    <?php $website = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'website', true ); ?>
    <?php $phone = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'phone', true ); ?>
    <?php $person = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'person', true ); ?>
    <?php $address = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'address', true ); ?>

    <?php if ( ! empty( $email ) || ! empty( $website ) || ! empty( $phone ) || ! empty( $person ) || ! empty( $address ) ) : ?>


            <div class="listing-detail-contact">
                <div class="row">
                    <div class="col-md-6 right-contact">
                        <ul>
                            <?php if ( ! empty( $email ) ): ?>
                                <li class="email">
                                    <strong class="key"><?php echo __( 'E-mail', 'inventor' ); ?></strong>
                                    <span class="value">
                                        <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a>
                                    </span>
                                </li>
                            <?php endif; ?>
                            <?php if ( ! empty( $website ) ): ?>
                                <?php if ( strpos( $website, 'http' ) !== 0 ) $website = sprintf( 'http://%s', $website ); ?>

                                <li class="website">
                                    <strong class="key"><?php echo __( 'Website', 'inventor' ); ?></strong>
                                    <span class="value">
                                        <a href="<?php echo esc_attr( $website ); ?>" target="_blank"><?php echo esc_attr( $website ); ?></a>
                                    </span>
                                </li>
                            <?php endif; ?>
                            <?php if ( ! empty( $phone ) ): ?>
                                <li class="phone">
                                    <strong class="key"><?php echo __( 'Phone', 'inventor' ); ?></strong>
                                    <span class="value"><a href="tel:<?php echo wp_kses( str_replace(' ', '', $phone), wp_kses_allowed_html( 'post' ) ); ?>"><?php echo wp_kses( $phone, wp_kses_allowed_html( 'post' ) ); ?></a></span>
                                </li>
                            <?php endif; ?>

                            <?php foreach( $custom_fields as $custom_field ): ?>
                                <?php if ( ! empty( $fields[ $custom_field ]['skip'] ) ) continue; ?>

                                <?php $value = get_post_meta( get_the_ID(), $custom_field, true ); ?>
                                <?php if ( ! empty( $value ) ): ?>
                                    <li class="<?php echo str_replace( INVENTOR_LISTING_PREFIX, '', esc_attr( $custom_field ) ); ?>">
                                        <strong class="key"><?php echo $fields[ $custom_field ]['name']; ?></strong>
                                        <span class="value"><?php echo esc_attr( $value ); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    
                        <ul>
                            <?php if ( ! empty( $person ) ): ?>
                                <li class="person">
                                    <strong class="key"><?php echo __( 'Person', 'inventor' ); ?></strong>
                                    <span class="value"><?php echo wp_kses( $person, wp_kses_allowed_html( 'post' ) ); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if ( ! empty( $address ) ): ?>
                                <li class="address">
                                    <strong class="key"><?php echo __( 'Address', 'inventor' ); ?></strong>
                                    <span class="value"><?php echo wp_kses( nl2br( $address ), wp_kses_allowed_html( 'post' ) ); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
    <?php endif; ?>
<?php endif; ?>