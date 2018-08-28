<div class="container">
    <div class="detail-banner-wrapper">

        <h1 class="detail-title">
            <?php echo apply_filters( 'inventor_listing_title', get_the_title(), get_the_ID() ); ?>
        </h1><!-- /.detail-title -->

        <?php do_action( 'inventor_listing_banner_title_after', get_the_ID() ); ?>

        <div class="detail-banner-meta">
            <?php do_action( 'inventor_listing_banner_meta', get_the_ID() ); ?>
        </div><!-- /.detail-banner-meta -->

        
    </div><!-- /.detail-banner-wrapper -->
</div><!-- /.container -->