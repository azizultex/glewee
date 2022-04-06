<?php
/*
Template Name: Customer Story
*/
get_header(); ?>

	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <?php $customer_banner = get_field( 'customer_banner' ); $customer_content = get_field( 'customer_content' ); if ( !empty( $customer_banner ) && array_filter( $customer_banner ) || !empty( $customer_content ) && array_filter( $customer_content ) ): ?>
	    <section class="customer-story">
	        <div class="container">
	        	<?php if ( $customer_banner['color'] || $customer_banner['logo'] || $customer_banner['image'] || $customer_banner['title'] || $customer_banner['sub_title'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <article class="featured-story d-flex" style="background: <?php echo $customer_banner['color']; ?>;">
	                    	<?php if ( $customer_banner['logo'] || $customer_banner['title'] || $customer_banner['sub_title'] ): ?>
	                        <div class="d-flex flex-column justify-content-between">
	                        	<?php
	                        		if ( $customer_banner['logo'] ) 
	                        		{
	                        			printf( '<div class="client-log">
			                                <img src="%s" class="img-fluid" alt="%s">
			                            </div>', esc_url( $customer_banner['logo']['url'] ), $customer_banner['logo']['alt'] );
	                        		}

	                        		if ( $customer_banner['title'] || $customer_banner['sub_title'] ) 
	                        		{
	                        			echo '<div class="text">';

	                        				if ( $customer_banner['title'] ) 
	                        				{
	                        					printf( '<h3 class="title">%s</h3>', $customer_banner['title'] );
	                        				}

	                        				if ( $customer_banner['sub_title'] ) 
	                        				{
	                        					printf( '<h4 class="sub-title">%s</h4>', $customer_banner['sub_title'] );
	                        				}

	                        			echo '</div>';
	                        		}
	                        	?>
	                        </div>
	                        <?php endif;

	                        if ( $customer_banner['image'] ): ?>
	                        <div class="media float-left">
	                        	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $customer_banner['image']['url'] ), $customer_banner['image']['alt'] ); ?>
	                        </div>
	                        <?php endif; ?>
	                    </article>

	                    <div class="share-wrapper custom-share">
	                        <div class="share">
	                            <div class="sharethis-inline-share-buttons"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <?php endif;

	            if ( $customer_content['title'] || $customer_content['content'] || $customer_content['button']['text'] ): ?>
	            <div class="row">
	            	<?php if ( $customer_content['title'] || $customer_content['content'] || $customer_content['button']['text'] ): ?>
	                <div class="<?php if ( $customer_content['features'] ) { echo 'col-xl-6'; } else { echo 'col-xl-12 fluid'; }; ?>">
	                    <div class="customer-story__content">
	                    	<?php
	                    		if ( $customer_content['title'] ) 
	                    		{
	                    			printf( '<h1 class="title h2">%s</h1>', $customer_content['title'] );
	                    		}

	                    		if ( $customer_content['content'] ) 
	                    		{
	                    			printf( '<div class="description readmore">%s</div>', $customer_content['content'] );
	                    		}

	                    		if ( $customer_content['button']['text']) 
	                    		{
	                    			if ( $customer_content['button']['type'] == 'internal' ) 
	                    			{
	                    				printf( '<a href="%s" class="view-gallery h5 smoothScroll"><span class="icon-arrow-down"></span> %s</a>', esc_url( $customer_content['button']['internal_url'] ), $customer_content['button']['text'] );
	                    			}
	                    			elseif ( $customer_content['button']['type'] == 'external' )
	                    			{
	                    				$target = $customer_content['button']['target'] ? '_self' : '_blank';

	                    				printf( '<a href="%s" class="view-gallery h5 smoothScroll" target="%s"><span class="icon-arrow-down"></span> %s</a>', esc_url($customer_content['button']['external_url']), $target, $customer_content['button']['text'] );
	                    			}
	                    		}
	                    	?>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $customer_content['features'] ): ?>
	                <div class="col-xl-6">
	                    <div class="row mb-30">
	                    	<?php
	                    		foreach ( $customer_content['features'] as $key => $feature ) 
	                    		{
	                    			$big = $key == 0 ? ' big' : '';

	                    			echo $key == 0 ? '<div class="col-12">' : '<div class="col-sm-6">';

                    					echo $feature['type'] == 'gredient' ? '<div class="story-post border'.$big.'" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">' : ( $feature['type'] == 'blue' ? '<div class="story-post border'.$big.'" style="background: #001179">' : '<div class="story-post text-primary'.$big.'" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">');
                    						echo '<div class="text d-flex flex-column justify-content-between">';

                    							if ( $feature['sub_title'] ) 
                    							{
                    								printf( '<h6 class="sub-title">%s</h6>', $feature['sub_title'] );
                    							}

                    							if ( $feature['title'] ) 
                    							{
                    								if ( $key == 0 ) 
                    								{
                    									printf( '<h3 class="title h1">%s</h3>', $feature['title'] );
                    								}
                    								else
                    								{
                    									printf( '<h3 class="title">%s</h3>', $feature['title'] );
                    								}
                    							}
                    						echo '</div>';
                    					echo '</div>';
	                    				
	                    			echo '</div>';
	                    		}
	                    	?>
	                        <!-- <div class="col-12">
	                            <div class="story-post border big" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">  
	                                <div class="text d-flex flex-column justify-content-between">
	                                    <h6 class="sub-title">Total Impressions Generated from the Campaign</h6>
	                                    <h1 class="title"><span class="counter d-block">412,555</span></h1>
	                                </div> 
	                            </div>
	                        </div>

	                        <div class="col-sm-6">
	                            <a class="story-post text-primary" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">  
	                                <div class="text d-flex flex-column justify-content-between">
	                                    <h6 class="sub-title">Campaign Timeline</h6>
	                                    <h3 class="title"><span class="counter d-block">30</span> Days</h3> 
	                                </div>
	                            </a>
	                        </div>

	                        <div class="col-sm-6">
	                            <a class="story-post border" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">  
	                                <div class="text d-flex flex-column justify-content-between">
	                                    <h6 class="sub-title">Total Number of Creators</h6>
	                                    <h3 class="title"><span class="counter d-block">20</span> Creators</h3> 
	                                </div>
	                            </a>
	                        </div>

	                        <div class="col-sm-6">
	                            <a class="story-post border" style="background: #001179">  
	                                <div class="text d-flex flex-column justify-content-between">
	                                    <h6 class="sub-title">Primary Social Media Utilized</h6>
	                                    <h3 class="title">Instagram + TikTok</h3> 
	                                </div>
	                            </a>
	                        </div>

	                        <div class="col-sm-6">
	                            <a class="story-post text-primary" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">  
	                                <div class="text d-flex flex-column justify-content-between">
	                                    <h6 class="sub-title">Total # Social Media Posts</h6>
	                                    <h3 class="title"><span class="counter d-block">40</span> Posts</h3> 
	                                </div>
	                            </a>
	                        </div> -->
	                    </div>
	                </div>
	                <?php endif; ?>
	            </div>
	            <?php endif; ?>
	        </div>
	    </section><!-- /customer-story -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>
		<?php endif;

	    $campaign_gallery = get_field( 'campaign_gallery' ); if ( !empty( $campaign_gallery ) && array_filter( $campaign_gallery ) ): ?>
	    <section id="campaign-gallery" class="campaign-gallery">
	        <div class="container">
	        	<?php if ( $campaign_gallery['title'] || $campaign_gallery['description'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="campaign-gallery__content">
	                    	<?php
	                    		if ( $campaign_gallery['title'] ) 
	                    		{
	                    			printf( '<h4 class="title">%s</h4>', $campaign_gallery['title'] );
	                    		}

	                    		if ( $campaign_gallery['description'] ) 
	                    		{
	                    			printf( '%s', $campaign_gallery['description'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div> 
	        	<?php endif;

	        	if ( $campaign_gallery['gallery'] ): ?>
	            <div class="row story-gallery mb-30">
	            	<?php foreach ( $campaign_gallery['gallery'] as $key => $gallery ): ?>
	                <div class="col-lg-4 col-sm-6">
	                    <a href="#cgs-<?php echo $key+1; ?>" class="gallery-item" data-effect="mfp-move-from-top">
	                    	<?php
	                    		if ( $gallery['image'] ) 
	                    		{
	                    			printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $gallery['image']['url'] ), $gallery['image']['alt'] );
	                    		}
	                    		else
	                    		{
	                    			printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/placeholder-post-thumb.jpg' ) ), $gallery['image']['alt'] );
	                    		}
	                    	?>
	                        <div class="icon"><i class="icon-plus"></i></div>
	                    </a>

	                    <?php if ( $gallery['image'] || $gallery['creator'] || $gallery['socials_posted'] || $gallery['impressions'] || $gallery['likes'] ): ?>
	                    <div id="cgs-<?php echo $key+1; ?>" class="mfp-with-anim mfp-hide gallery-modal" data-effect="mfp-move-from-top">
	                        <div class="container">
	                            <div class="row align-items-center">
	                            	<?php if ( $gallery['image'] ): ?>	
	                                <div class="col-md-6 offset-xl-1">
	                                    <div class="gallery-modal__media">
	                                    	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $gallery['image']['url'] ), $gallery['image']['alt'] ); ?>
	                                    </div>
	                                </div>
	                            	<?php endif;

	                            	if ( $gallery['creator'] || $gallery['socials_posted'] || $gallery['impressions'] || $gallery['likes'] ): ?>
	                                <div class="col-xl-5 col-md-6">
	                                    <div class="gallery-modal__content">
	                                    	<?php
	                                    		if ( $gallery['creator'] ) 
	                                    		{
	                                    			printf( '<div class="gallery-modal__item">
			                                            <h6 class="sub-title color-secondary">Creator</h6>
			                                            <h3 class="title">@%s</h3>
			                                         </div>', $gallery['creator'] );
	                                    		}

	                                    		if ( $gallery['socials_posted'] ) 
	                                    		{
	                                    			printf( '<div class="gallery-modal__item">
			                                            <h6 class="sub-title color-secondary">Social’s Posted to:</h6>
			                                            <h3 class="title">%s</h3>
			                                         </div>', $gallery['socials_posted'] );
	                                    		}

	                                    		if ( $gallery['impressions'] ) 
	                                    		{
	                                    			printf( '<div class="gallery-modal__item">
			                                            <h6 class="sub-title color-secondary">Total Impressions</h6>
			                                            <h3 class="title">%s</h3>
			                                         </div>', $gallery['impressions'] );
	                                    		}

	                                    		if ( $gallery['likes'] ) 
	                                    		{
	                                    			printf( '<div class="gallery-modal__item">
			                                            <h6 class="sub-title color-secondary">Total Likes</h6>
			                                            <h3 class="title">%s</h3>
			                                         </div>', $gallery['likes'] );
	                                    		}
	                                    	?>
	                                    </div>
	                                </div>
	                                <?php endif; ?>
	                            </div>
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div><!-- /gallery-modal -->
	                <?php endforeach; ?>
	            </div>
	            <?php endif; ?>
	        </div>
	    </section>
	    <?php endif; ?>

        <?php 
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