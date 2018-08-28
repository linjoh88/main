<?php $featured = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'featured', true ); ?>
<?php $reduced = get_post_meta( get_the_ID(), INVENTOR_LISTING_PREFIX . 'reduced', true ); ?>

<?php if ( has_post_thumbnail() ) : ?>
    <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
    <?php $image = $thumbnail[0]; ?>
<?php else: ?>
    <?php $image = esc_attr( plugins_url( 'inventor' ) ) . '/assets/img/default-item.png'; ?>
<?php endif; ?>

<?php $image = apply_filters( 'inventor_listing_featured_image', $image, get_the_ID() ); ?>

<div class="listing-row <?php if ( $featured ) : ?>featured<?php endif; ?>">
    <div class="listing-row-image" style="background-image: url('<?php echo esc_attr( $image ); ?>');">
        <a href="<?php the_permalink() ?>" class="listing-row-image-link"></a>

        

        <?php if ( $featured ) : ?>
            <div class="listing-row-label-top listing-row-label-top-left"><?php echo esc_attr__( 'Featured', 'inventor' ); ?></div><!-- /.listing-row-label-top-left -->
        <?php endif; ?>

        <?php if ( $reduced ) : ?>
            <div class="listing-row-label-top listing-row-label-top-right"><?php echo esc_attr__( 'Reduced', 'inventor' ); ?></div><!-- /.listing-row-label-top-right -->
        <?php endif; ?>

        
    </div><!-- /.listing-row-image -->

    <div class="listing-row-body">
        <h2 class="listing-row-title"><a href="<?php the_permalink(); ?>"><?php echo Inventor_Utilities::excerpt( get_the_title(), 50 ); ?></a></h2>
        <?php $location = Inventor_Query::get_listing_location_name( get_the_ID(), '/', false ); ?>
            <?php if ( ! empty( $location ) ) : ?>
                
                <dd><?php echo wp_kses( $location, wp_kses_allowed_html( 'post' ) ); ?></dd>
            <?php endif; ?>
		<div class="listing-row-content">
            <?php the_excerpt(); ?>

            <p>
                <a class="read-more-link" href="<?php echo esc_attr( get_permalink( get_the_ID() ) ); ?>"><?php echo esc_attr__( 'Read More', 'inventor' ); ?><i class="fa fa-chevron-right"></i></a>
            </p>
        </div><!-- /.listing-row-content -->
    </div><!-- /.listing-row-body -->


</div><!-- /.listing-row -->
