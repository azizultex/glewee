<?php get_header( '', array( 'sticky' => true ) ); ?>
	
	<div id="primary" class="content-area"> 

	    <section class="blog-details-page">
	        <div class="container">
	            <div class="row" data-sticky_parent> 
	                <div class="col-xl-7 offset-xl-2 offset-lg-1" data-sticky_column>
	                    <main class="main-content">
	                        <div class="blog-post-top">
	                            <a href="#" class="date">NOVEMBER 19, 2021</a>
	                            <h1 class="title">Glewee is Now Available on iOS and Android!</h1>
	                        </div> 

	                        <article class="blog-post"> 
	                            <div class="entry-media"> 
	                                <img src="<?php echo get_theme_file_uri(); ?>/images/latest-news-post-1.png" class="img-fluid" alt=""> 
	                            </div> 

	                            <div class="entry-content">
	                                <p>After months of development, growth, and many many iterations of the idea boards – Glewee is now formally live on Web, iOS, and Android! With our Web app designed primarily for Brands to create campaigns, engage with Creators, and track post metrics; we focused our efforts on developing the iOS + Android version of Glewee exclusively for Creators. Creating a Glewee profile, linking social media accounts, applying for campaigns and staying organized while monetizing your following has never been easier.</p>
	                                
	                                <p>If you’re reading this on a mobile device, click the button below to see our live application on Apple’s App Store or The Google Play Store!</p>
	
	                                <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/app-store-big.png" class="img-fluid" alt=""></a>
	                                <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/google-play-big.png" class="img-fluid" alt=""></a>

	                                <h4>A Glimpse Of The Glewee App Capabilities</h4>

	                                <hr>

	                                <h5>Explore</h5>

	                                <p>After months of development, growth, and many many iterations of the idea boards – Glewee is now formally live on Web, iOS, and Android! With our Web app designed primarily for Brands to create campaigns, engage with Creators, and track post metrics; we focused our efforts on developing the iOS + Android version of Glewee exclusively for Creators. Creating a Glewee profile, linking social media accounts, applying for campaigns and staying organized while monetizing your following has never been easier.</p>

	                                <p>If you’re reading this on a mobile device, click the button below to see our live application on Apple’s App Store or The Google Play Store!</p>

	                                <figure class="wp-caption">
	                                    <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/images/explore-item-1.jpg" alt="Azizul Haque">  
	                                    <div class="text">
	                                        <h2>Explore</h2>
	                                        <h4>Brand Campaigns</h4>
	                                    </div>
	                                </figure>

	                                <h5>Creator Profiles</h5>

	                                <p>While setting up a Glewee Creator Account, each user must authenticate their social media accounts. This allows us to pull in profile metrics like follower count and engagement rates, as well as post metrics such as impressions, likes, comments, and shares. We use this data to display it back to the Brands that each Creator works with in order to show them how good the posts are doing in a campaign deployed by the Brand. For the Creator, this is the perfect page to display a users’ total follower count across all their social media accounts in real time. Once a Creator has worked with various Brands on the Glewee platform, this page will act as their portfolio – displaying total Estimated Content Value data points, total cross platform follower count, and showcasing the work the Creator has published to social media on behalf of brands on Glewee.</p>
	
	                                <figure class="wp-caption">
	                                    <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/images/explore-item-2.jpg" alt="Azizul Haque">  
	                                    <div class="text">
	                                        <h2>Explore</h2>
	                                        <h4>Brand Campaigns</h4>
	                                    </div>
	                                </figure>

	                                <h5>Creator Profiles</h5>

	                                <p>While setting up a Glewee Creator Account, each user must authenticate their social media accounts. This allows us to pull in profile metrics like follower count and engagement rates, as well as post metrics such as impressions, likes, comments, and shares. We use this data to display it back to the Brands that each Creator works with in order to show them how good the posts are doing in a campaign deployed by the Brand. For the Creator, this is the perfect page to display a users’ total follower count across all their social media accounts in real time. Once a Creator has worked with various Brands on the Glewee platform, this page will act as their portfolio – displaying total Estimated Content Value data points, total cross platform follower count, and showcasing the work the Creator has published to social media on behalf of brands on Glewee.</p>

	                                <figure class="wp-caption">
	                                    <img class="img-fluid" src="<?php echo get_theme_file_uri(); ?>/images/explore-item-1.jpg" alt="Azizul Haque">  
	                                    <div class="text">
	                                        <h2>Explore</h2>
	                                        <h4>Brand Campaigns</h4>
	                                    </div>
	                                </figure>
	                            </div>

	                            <hr>

	                            <div class="entry-footer">
	                                <div class="entry-title">
	                                    <h2 class="title">Request a Demo</h2>
	                                    <h5 class="sub-title">Let’s Start Building Campaigns</h5>
	                                    <p>Tired of getting no response from influencers online? Book a live demo and unlock Creator Marketing today.</p>
	                                    <a href="#" class="btn secondary-btn">Request a Demo</a>
	                                </div>

	                                <div class="photo">
	                                    <img src="<?php echo get_theme_file_uri(); ?>/images/blog-entry-footer.png" alt="">
	                                </div>
	                            </div>

	                            <div class="share-wrapper">
	                                <div class="share" data-sticky_column>
	                                    <div class="sharethis-inline-share-buttons"></div>
	                                </div>
	                            </div>
	                        </article>
	                    </main>
	                </div>

	                <?php get_sidebar(); ?>
	            </div>
	        </div>
	    </section><!-- /blog-page -->

	</div><!-- /content-area -->

<?php get_footer(); ?>

<script>
    jQuery(window).load(function() {

        // Append progress bar header
        jQuery( ".header" ).append( '<progress value="0" max="100" class="glewee-progress-bar" data-foreground="linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%)" data-background="linear-gradient(111deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%)" data-height="16" data-position="top"></progress>' );

        // Maximum value for the progressbar
        var winHeight = jQuery(window).height(),
        docHeight = jQuery(document).height();
        var max = docHeight - winHeight;
        jQuery('.glewee-progress-bar').attr('max', 100);
            
        var progressForeground = jQuery('.glewee-progress-bar').attr('data-foreground');
        var progressBackground = jQuery('.glewee-progress-bar').attr('data-background');
        var progressHeight = jQuery('.glewee-progress-bar').attr('data-height');
        var progressPosition = jQuery('.glewee-progress-bar').attr('data-position');
        var progressCustomPosition = jQuery('.glewee-progress-bar').attr('data-custom-position');
        var progressFixedOrAbsolute = 'fixed';

        // Custom position
        if (progressPosition == 'custom') {
            jQuery('.glewee-progress-bar').appendTo(progressCustomPosition);
            progressPosition = 'bottom';
            progressFixedOrAbsolute = 'absolute';
        }

        // Styles
        if ( progressPosition == 'top' ) {
            var progressTop = '0';
            var progressBottom = 'auto';
        } else {
            var progressTop = 'auto';
            var progressBottom = '0';
        }

        jQuery('.glewee-progress-bar').css({
            'background' : progressBackground,
            'color' :  progressForeground,
            'height' :  progressHeight + 'px',
            'top' : progressTop,
            'bottom' : progressBottom,
            'position' : progressFixedOrAbsolute,
            'display' : 'block',
            'width' : '100%',
            'transition' : 'all 0.3s ease',
        });

        jQuery('<style>.glewee-progress-bar::-webkit-progress-bar { background-color: transparent } .glewee-progress-bar::-webkit-progress-value { background: ' + progressForeground + ' } .glewee-progress-bar::-moz-progress-bar { background: ' + progressForeground + ' }</style>')
            .appendTo('head');

        // Inital value (if the page is loaded within an anchor)
        var value = jQuery(window).scrollTop();

        jQuery('.glewee-progress-bar').attr('value', (value/max)*100);
        // Maths & live update of progressbar value
        jQuery(document).on('scroll', function() {
            var value = jQuery(window).scrollTop();
            jQuery('.glewee-progress-bar').attr('value', (value/max)*100);
            // jQuery('.glewee-progress-bar').attr('style', '--progressbar:'+ (value/max)*100 + '%');
        });
    });
</script>