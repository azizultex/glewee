<?php
/*
Template Name: Home
*/
get_header(); 
	
	$banner = get_field( 'home_banner' ); 
	$apps_store = get_field( 'apps_store', 'options' ); ?>

	<div class="banner">
	    <div class="container"> 
	        <div class="row">
	            <div class="col-md-6 col-sm-7">
	                <div class="banner__content">
	                	<?php
	                		if ( !$apps_store['apple_store'] || $apps_store['google_play'] ) 
	                		{
	                		    echo '<div class="banner__content-btn-group white animated fadeInUp">';

	                		        if ( $apps_store['apple_store'] ) 
	                		        {
	                		            printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['apple_store'] ), esc_url( get_theme_file_uri( 'images/app-store.png' )) );
	                		        }

	                		        if ( $apps_store['google_play'] ) 
	                		        {
	                		            printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['google_play'] ), esc_url( get_theme_file_uri( 'images/google-play.png' )) );
	                		        }

	                		    echo '</div>';
	                		}

	                		echo '<div class="animated fadeInUp delay-2s">';

	                			if ( $banner['title'] ) 
	                			{
	                				printf( '<h1 class="title lg">%s</h1>', $banner['title'] );
	                			}
	                			else
	                			{
	                				printf( '<h1 class="title lg">%s</h1>', get_bloginfo( 'name' ) );
	                			}

	                			if ( $banner['description'] ) 
	                			{
	                				printf( '<div class="description">%s</div>', $banner['description'] );
	                			}
	                			else
	                			{
	                				printf( '<div class="description">%s</div>', get_bloginfo( 'description' ) );
	                			}

	                		echo '</div>';

	                		echo '<div class="banner__content-btn-group">';

	                			acfButton( $banner, 'animated fadeInUp delay-3s' );

	                			echo '<button class="scrollDown animated fadeInUp delay-4s" data-space="0">
		                            <i class="icon-arrow-down"></i> 
		                        </button>';

	                		echo '</div>';
	                	?>
	                </div>
	            </div>

	            <?php if ( $banner['image'] ): ?>
	            <div class="col-md-6 col-sm-5">
	                <div class="banner__media">
	                	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $banner['image']['url'] ), $banner['image']['alt'] ); ?>
	                </div>
	            </div>
	            <?php endif; ?>
	        </div>
	    </div>
	</div><!-- /banner -->
	
	<div id="primary" class="content-area">  

		<?php
			$brands_type = get_field( 'trusted_brands_type' );

			get_template_part( 
				'template-parts/content', 'brands', 
				array( 
					'class' => 'home-trusted-brands',
					'type' => $brands_type, 
					'id' => get_the_ID(),
				) 
			); 
		?>

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <?php $explore_more = get_field( 'explore_more' ); if ( $explore_more ): ?>
	    <section class="for-brands">
	        <div class="container"> 
	        	<?php foreach ( $explore_more as $key => $explore ): ?>
	            <div class="for-brands__item<?php echo $key % 2 ? ' creators' : ''; ?>">
	                <div class="row align-items-center flex-column-reverse<?php echo $key % 2 ? ' flex-lg-row-reverse' : ' flex-lg-row'; ?>">
	                	<?php if ( $explore['sub_title'] || $explore['title'] || $explore['small_title'] || $explore['description'] || $explore['button']['text'] ): ?>
	                    <div class="<?php echo $explore['image'] ? 'col-lg-4' : 'col-lg-12 fluid' ?>">
	                        <div class="for-brands__content"> 
	                        	<?php
	                        		if ( $explore['sub_title'] ) 
	                        		{
	                        			printf( '<h3 class="h2 transparent-text">%s</h3>', $explore['sub_title'] );
	                        		}

	                        		if ( $explore['title'] ) 
	                        		{
	                        			printf( '<h2 class="title h1">%s</h2>', $explore['title'] );
	                        		}

	                        		if ( $explore['small_title'] ) 
	                        		{
	                        			printf( '<h5 class="color-black sub-title font-prox">%s</h5>', $explore['small_title'] );
	                        		}

	                        		if ( $explore['description'] ) 
	                        		{
	                        			printf( '%s', $explore['description'] );
	                        		}

	                        		acfButton( $explore );
	                        	?>
	                        </div>
	                    </div>
	                	<?php endif;

	                    if ( $explore['image'] ): ?>
	                    <div class="col-lg-8">
	                        <div class="for-brands__media">
	                        	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $explore['image']['url'] ), $explore['image']['alt'] ); ?>
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	            <?php endforeach; ?>
	        </div>
	    </section><!-- /for-brands -->
	    <?php endif;

	    $request_demo = get_field( 'request_demo' ); if ( !empty( $request_demo ) && array_filter( $request_demo ) ): ?>
	    <section class="request-demo pt-0">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="request-demo__content<?php echo $request_demo['image'] ? '' : ' fluid'; ?>">
	                    	<?php
	                    		if ( $request_demo['image'] ) 
	                    		{
	                    			printf( '<div class="request-demo__media">
			                            <img src="%s" class="img-fluid" alt="%s">
			                        </div>', esc_url( $request_demo['image']['url'] ), $request_demo['image']['alt'] );
	                    		}

	                    		if ( $request_demo['title'] || $request_demo['sub_title'] || $request_demo['description'] || $request_demo['button'] ) 
	                    		{
	                    			echo '<div class="request-demo__text">';

	                    				if ( $request_demo['title'] ) 
	                    				{
	                    					printf( '<h2 class="title">%s</h2>', $request_demo['title'] );
	                    				}

	                    				if ( $request_demo['sub_title'] ) 
	                    				{
	                    					printf( '<h5 class="sub-title">%s</h5>', $request_demo['sub_title'] );
	                    				}

	                    				if ( $request_demo['description'] ) 
	                    				{
	                    					printf( '%s', $request_demo['description'] );
	                    				}

	                    				acfButton( $request_demo, 'primary-color' );

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /request-demo -->
	    <?php endif;

	    $why_glewee = get_field( 'why_glewee' ); if ( !empty( $why_glewee ) && array_filter( $why_glewee ) ): ?>
	    <section class="why-glewee">
	        <div class="container">
	        	<?php if ( $why_glewee['title'] || $why_glewee['sub_title'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="why-glewee__content">
	                    	<?php
	                    		if ( $why_glewee['title'] ) 
	                    		{
	                    			printf( '<h2 class="title h1 lg">%s</h2>', $why_glewee['title'] );
	                    		}

	                    		if ( $why_glewee['sub_title'] ) 
	                    		{
	                    			printf( '<h2 class="sub-title">%s</h2>', $why_glewee['sub_title'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	            <?php endif; ?>

	            <div class="row mb-30">
	                <div class="col-xl-7 col-lg-6">
	                    <a class="why-glewee__item boost-brand" style="background: white;">
	                        <div class="why-glewee__item-text">
	                            <h2 class="title">Boost Your Brand Awareness</h2>
	                        </div>
	                        <div class="why-glewee__item-media">
	                            <img src="<?php echo get_theme_file_uri(); ?>/images/boost-brand-1.png" alt="">
	                        </div>
	                    </a>
	                </div>

	                <div class="col-xl-5 col-lg-6">
	                    <div class="col-12"> 
	                        <a class="why-glewee__item expand" style="background: #001179;">
	                            <div class="why-glewee__item-text">
	                                <h2 class="title">Expand Your Social Engagment</h2>
	                            </div>
	                            <div class="why-glewee__item-media">
	                                <img src="<?php echo get_theme_file_uri(); ?>/images/like.png" alt="">
	                            </div>
	                        </a>
	                    </div>

	                    <div class="col-12">
	                        <a href="#" class="why-glewee__item glewee" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">
	                            <div class="why-glewee__item-text">
	                                <div class="number">25K</div>
	                                <h3 class="title">Glewee helped The Abby Co. gain over 25K followers in 1 week.</h3>
	                                <p>By leveraging our awesome platform The Abby Co. is now doing awesome stuff</p>
	                                <span class="btn">View Case Study</span> 
	                            </div> 
	                        </a>
	                    </div>
	                </div>

	                <div class="col-xl-5 col-lg-6">
	                    <a href="#" class="why-glewee__item glewee" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">
	                        <div class="why-glewee__item-text">
	                            <div class="number">1.5M</div>
	                            <h3 class="title">Glewee helped The Abby Co. gain over 25K followers in 1 week.</h3>
	                            <p>By leveraging our awesome platform The Abby Co. is now doing awesome stuff</p>
	                            <span class="btn">View Case Study</span> 
	                        </div> 
	                    </a>
	                </div>

	                <div class="col-xl-7 col-lg-6">
	                    <a class="why-glewee__item boost-brand drive" style="background: white;">
	                        <div class="why-glewee__item-text">
	                            <h2 class="title">Drive New Website Traffic</h2>
	                        </div>
	                        <div class="why-glewee__item-media">
	                            <img src="<?php echo get_theme_file_uri(); ?>/images/drive.png" alt="">
	                        </div>
	                    </a>
	                </div>

	                <div class="col-xl-7 col-lg-6">
	                    <a class="why-glewee__item expand expand-big" style="background: #001179;">
	                        <div class="why-glewee__item-text">
	                            <h2 class="title">Maximize Cost Per Impression</h2>
	                        </div>
	                        <div class="why-glewee__item-media">
	                            <img src="<?php echo get_theme_file_uri(); ?>/images/people.png" alt="">
	                        </div>
	                    </a>
	                </div>

	                <div class="col-xl-5 col-lg-6">
	                    <a class="why-glewee__item expand" style="background: #001179;">
	                        <div class="why-glewee__item-text">
	                            <h2 class="title">Increase Return on Investment</h2>
	                        </div>
	                        <div class="why-glewee__item-media">
	                            <img src="<?php echo get_theme_file_uri(); ?>/images/dolar.png" alt="">
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </section><!-- /why-glewee -->
		<?php endif;

		$how_works = get_field( 'how_works' ); if ( !empty( $how_works ) && array_filter( $how_works ) ): ?>
	    <div class="how-works home">
	        <div class="container">
	        	<?php if ( $how_works['sub_title'] || $how_works['title'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="how-works__content">
	                        <div class="how-works__content-text">
	                        	<?php
	                        		if ( $how_works['sub_title'] ) 
	                        		{
	                        			printf( '<h3 class="title h2">%s</h3> ', $how_works['sub_title'] );
	                        		}

	                        		if ( $how_works['title'] ) 
	                        		{
	                        			printf( '<h2 class="main-title color-secondary h1 lg">%s</h2>', $how_works['title'] );
	                        		}
	                        	?>
	                        </div> 
	                    </div>
	                </div>
	            </div>
	            <?php endif; ?>

	            <?php if ( $how_works['how_works'] ): ?>
	            <div class="row how-works-slider">
	            	<?php foreach ( $how_works['how_works'] as $how ): ?>
	                <div class="slider-item" data-title="<?php echo $how['nav']; ?>">
	                    <div class="how-works__item d-flex align-items-center flex-row"> 
	                    	<?php if ( $how['title'] || $how['sub_title'] || $how['description'] || $how['button']['text'] ): ?>
	                        <div class="how-works__item-text float-left">
	                        	<?php
	                        		if ( $how['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $how['title'] );
	                        		}

	                        		if ( $how['sub_title'] ) 
	                        		{
	                        			printf( '<h6 class="sub-title">%s</h6>', $how['sub_title'] );
	                        		}

	                        		if ( $how['description'] ) 
	                        		{
	                        			printf( '%s', $how['description'] );
	                        		}

	                        		acfButton( $how );
	                        	?>
	                        </div>
	                    	<?php endif;

	                        if ( $how['image'] ): ?>
	                        <div class="how-works__item-media">
	                        	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $how['image']['url'] ), $how['image']['alt'] ); ?>
	                        </div> 
	                        <?php endif; ?>
	                    </div>
	                </div> 
	            	<?php endforeach; ?>
	            </div>

	            <div class="row">
	                <div class="col-12">
	                    <div class="slider-controls d-flex align-items-center justify-content-between">
	                        <div class="slider-arrows d-flex align-items-center"></div> 
	                    </div>
	                </div>
	            </div>
	            <?php endif; ?>
	        </div>
	    </div><!-- /how-works -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>
	    <?php endif;

	    $our_network = get_field( 'our_network' ); if ( !empty( $our_network ) && array_filter( $our_network ) ): ?>
	    <section class="our-network home">
	        <div class="container">
	            <div class="row">
	            	<?php if ( $our_network['title'] || $our_network['sub_title'] ): ?>
	                <div class="col-lg-6">
	                    <div class="our-network__content">
	                    	<?php
	                    		if ( $our_network['title'] ) 
	                    		{
	                    			printf( '<h2 class="title color-secondary">%s</h2>', $our_network['title'] );
	                    		}

	                    		if ( $our_network['sub_title'] ) 
	                    		{
	                    			printf( '<h3 class="sub-title h2">%s</h3>', $our_network['sub_title'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $our_network['features'] ): ?>
	                <div class="col-lg-6">
	                	<?php
	                		foreach ( $our_network['features'] as $feature ) 
	                		{
	                			echo '<div class="our-network__item">';

	                				if ( $feature['title'] ) 
	                				{
	                					printf( '<h4 class="title">%s</h4>', $feature['title'] );
	                				}

	                				if ( $feature['description'] ) 
	                				{
	                					printf( '%s', $feature['description'] );
	                				}

	                				if ( $feature['link'] ) 
	                				{
	                					printf( '<a href="%s" class="read-more" target="%s">%s <i class="icon-arrow-right"></i></a>', $feature['link']['url'], $feature['link']['target'], $feature['link']['title'] );
	                				}
	                			echo '</div>';
	                		}
	                	?>
	                </div>
	                <?php endif; ?>
	            </div>
	        </div>
	    </section><!-- /our-network -->
	    <?php endif;

	    $pricing_features = get_field( 'pricing_features' ); if ( !empty( $pricing_features ) && array_filter( $pricing_features ) ): ?>
	    <section class="request-demo pt-0 pb-0">
	        <div class="container">
	            <div class="row"> 
	                <div class="col-12">
	                    <div class="request-demo__content pricing-text-white<?php echo $pricing_features['image'] ? '' : ' fluid'; ?>">
	                    	<?php
	                    		if ( $pricing_features['image'] ) 
	                    		{
	                    			printf( '<div class="request-demo__media">
			                            <img src="%s" class="img-fluid" alt="%s">
			                        </div>', esc_url( $pricing_features['image']['url'] ), $pricing_features['image']['alt'] );
	                    		}

	                    		if ( $pricing_features['title'] || $pricing_features['sub_title'] || $pricing_features['description'] || $pricing_features['button'] ) 
	                    		{
	                    			echo '<div class="request-demo__text">';

	                    				if ( $pricing_features['title'] ) 
	                    				{
	                    					printf( '<h2 class="title">%s</h2>', $pricing_features['title'] );
	                    				}

	                    				if ( $pricing_features['sub_title'] ) 
	                    				{
	                    					printf( '<h5 class="sub-title">%s</h5>', $pricing_features['sub_title'] );
	                    				}

	                    				if ( $pricing_features['description'] ) 
	                    				{
	                    					printf( '%s', $pricing_features['description'] );
	                    				}

	                    				acfButton( $pricing_features, 'primary-color' );

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /request-demo -->
	    <?php endif;

	    $latest_news = get_field( 'latest_news' ); if ( !empty( $latest_news ) && array_filter( $latest_news ) ): ?>
	    <section class="latest-news">
	        <div class="container">
	        	<?php if ( $latest_news['title'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="latest-news__content">
	                    	<?php
	                    		if ( $latest_news['title'] ) 
	                    		{
	                    			printf( '<h2 class="title h1 lg">%s</h2>', $latest_news['title'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        	<?php endif;

	        	if ( $latest_news['type'] == 'custom' ) 
	        	{
	        		$args = array(
	        			'post_type' => 'post',
	        			'posts_per_page' => 3,
	        			'orderby' => 'post__in',
	        			'post__in' => $latest_news['select_posts'],
	        		);
	        	}
	        	elseif ( $latest_news['type'] == 'featured' ) 
	        	{
	        		$args = array(
	        			'post_type' => 'post',
	        			'meta_value' => 'yes',
	        			'posts_per_page' => 3,
	        			'meta_key' => '_is_ns_featured_post', 
	        		);
	        	}
	        	else
	        	{
	        		$args = array(
	        			'posts_per_page' => 3,
	        			'meta_key' => 'my_post_viewed',
	        			'orderby' => 'meta_value_num',
	        		);
	        	}

	        	$counter = 1;
	        	$latest_posts_query = new WP_Query( $args );

	        	if ( $latest_posts_query->have_posts() ): ?>
	            <div class="row mb-30 js-masonry" data-masonry-options='{ "itemSelector": ".item", "columnWidth": ".column" }'>
	            	<?php
            			while ( $latest_posts_query->have_posts() ): $latest_posts_query->the_post();
            				echo '<div class="col-xl-6 item">';

            					if ( $counter == 1 ) 
            					{
            						get_template_part( 'template-parts/content', 'post', array( 'home_latest' => true ) );
            					}
            					else
            					{
            						get_template_part( 'template-parts/content', 'post', array( 'home_latest_small' => true ) );
            					}

            				echo '</div>';

            				$counter++;
            			endwhile;

            			wp_reset_query();

            			if ( $latest_news['call_action']['sub_title'] || $latest_news['call_action']['title'] || $latest_news['call_action']['link'] ) 
            			{
            				$link = $latest_news['call_action']['link'] ? 'href="'.esc_url( $latest_news['call_action']['link']['url'] ).'" target="'.$latest_news['call_action']['link']['target'].'"' : '';

            				echo '<div class="col-xl-6 item">';
            					echo '<a '.$link.' class="blog-post d-flex align-items-center blog-post-latest-xl">';
            						echo '<div class="text">';

            							if ( $latest_news['call_action']['sub_title'] ) 
            							{
            								printf( '<span class="date">%s</span>', $latest_news['call_action']['sub_title'] );
            							}

            							if ( $latest_news['call_action']['title'] ) 
            							{
            								printf( '<h4 class="title">%s</h4> ', $latest_news['call_action']['title'] );
            							}

            							if ( $latest_news['call_action']['link'] ) 
            							{
            								printf( '<div class="sub-title">%s <i class="icon-arrow-right"></i></div>', $latest_news['call_action']['link']['title'] );
            							}
            						echo '</div>';
            					echo '</a>';
            				echo '</div>';
            			}
	            	?>
	                <div class="col-xl-6 column"></div>
	            </div>
	            <?php endif; ?>
	        </div>
	    </section><!-- /latest-news -->
		<?php endif;
 
        $call_action = get_field( 'call_action', 'options' ); if ( $call_action ): ?>
    	    <div class="container">
    	        <div class="row">
    	            <div class="col-12">
    	                <hr>
    	            </div>
    	        </div>
    	    </div>

    	    <?php
    	    get_template_part( 'template-parts/call', 'action' ); 
    		
    		endif; 
    	?>

	</div><!-- /content-area -->

<?php get_footer(); ?>