<?php
/*
Template Name: For Creators
*/
get_header(); 
	
	$banner = get_field( 'creators_banner' );
	$apps_store = get_field( 'apps_store', 'options' ); ?>
	
	<div id="primary" class="content-area">

	    <div class="brands-page-wraper">
	        <div class="overlay overlay-brands"></div>
	         
	        <section class="glewee-for-brands pb-0 creators">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12 text-center">
                        	<?php
	                    		echo '<div class="glewee-for-brands__content entry-title">';

		                    		if ( $banner['title'] ) 
		                    		{
		                    			printf( '<h1 class="title lg">%s</h1>', $banner['title'] );
		                    		}
		                    		else
		                    		{
		                    			printf( '<h1 class="title lg">%s</h1>', get_the_title() );
		                    		}

		                    		if ( $banner['sub_title'] ) 
		                    		{
		                    			printf( '<h4 class="sub-title">%s</h4>', $banner['sub_title'] );
		                    		}

		                    		if ( $banner['description'] ) 
		                    		{
		                    			printf( '<div class="description">%s</div>', $banner['description'] );
		                    		}

	                    		echo '</div>';

                        		if ( $banner['image'] ) 
                        		{
                        			$video = $banner['video'] ? 'href="'.esc_url( $banner['video'] ).'" class="popup-video"' : '';

                        			printf( '<figure class="media">
			                            <a %s data-effect="mfp-move-from-top">
			                                <img src="%s" class="img-fluid" alt="%s">
			                            </a>                                                    
			                        </figure>', $video, esc_url( $banner['image']['url'] ), $banner['image']['alt'] );
                        		}

                        		if ( $banner['buttons'] ) 
                        		{
                    				foreach ( $banner['buttons'] as $key => $button ) 
                    				{
                    					$btn_class = $key % 2 ? 'big-text secondary-btn' : 'btn-glowing big-text';

                    					acfButton( $button, $btn_class );
                    				}
                        		}

                        		if ( !$apps_store['apple_store'] || $apps_store['google_play'] ) 
		                		{
		                		    echo '<div class="glewee-for-brands__btn-group">';

		                		        if ( $apps_store['apple_store'] ) 
		                		        {
		                		            printf( '<a href="%s" class="btn bg-white black" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['apple_store'] ), esc_url( get_theme_file_uri( 'images/app-store-64.png' )) );
		                		        }

		                		        if ( $apps_store['google_play'] ) 
		                		        {
		                		            printf( '<a href="%s" class="btn bg-white black" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['google_play'] ), esc_url( get_theme_file_uri( 'images/google-play-64.png' )) );
		                		        }

		                		    echo '</div>';
		                		}
                        	?>             
	                    </div>
	                </div>
	            </div>
	        </section> <!-- /glewee-for-brands -->
	        
	        <?php $how_works = get_field( 'how_works' ); if ( $how_works ): ?>
	        <section class="your-marketing creators">
	            <div class="container">
            		<?php foreach ( $how_works as $key => $work ): ?>
            	    <div class="your-marketing__item<?php echo $key % 2 ? ' align-left' : ''; ?>">
            	        <div class="row align-items-center">
            	        	<?php if ( $work['title'] || $work['sub_title'] || $work['description'] || $work['button']['text'] ): ?>
            	            <div class="<?php echo $work['image'] ? 'col-lg-6' : 'col-lg-12 fluid'; ?>"> 
            	                <div class="your-marketing__item-text">
            	                	<?php
            	                		if ( $work['title'] ) 
            	                		{
            	                			printf( '<h2 class="title">%s</h2>', $work['title'] );
            	                		}

            	                		if ( $work['sub_title'] ) 
            	                		{
            	                			printf( '<h5 class="sub-title">%s</h5>', $work['sub_title'] );
            	                		}

            	                		if ( $work['description'] ) 
            	                		{
            	                			printf( '%s', $work['description'] );
            	                		}

            	                		acfButton( $work, 'btn-glowing' );
            	                	?>
            	                </div>  
            	            </div>
            	        	<?php endif;

            	            if ( $work['image'] ): ?>
            	            <div class="col-lg-6">
            	                <div class="your-marketing__item-media">
            	                	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $work['image']['url'] ), $work['image']['alt'] ); ?>
            	                </div>
            	            </div>
            	            <?php endif; ?>
            	        </div>
            	    </div>
            	    <?php endforeach; ?>
	            </div>
	        </section><!-- /your-marketing -->
	        <?php endif;

	        $creators_type = get_field( 'trusted_creators_type' );

	        get_template_part( 
	        	'template-parts/content', 'creators', 
	        	array( 
	        		'class' => 'trusted-brands pt-0 pb-0',
	        		'type' => $creators_type, 
	        		'id' => get_the_ID(),
	        	) 
	        ); 

	        $how_it_works = get_field( 'how_it_works' ); if ( !empty( $how_it_works ) && array_filter( $how_it_works ) ): ?>
	        <div class="how-works creators">
	            <div class="container">
	            	<?php if ( $how_it_works['title'] || $how_it_works['link'] ): ?>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="how-works__content entry-title d-flex align-items-end justify-content-between">
	                        	<?php
	                        		if ( $how_it_works['title'] ) 
	                        		{
	                        			printf( '<div class="how-works__content-text">
			                                <h2 class="title">%s</h2> 
			                            </div>', $how_it_works['title'] );
	                        		}

	                        		if ( $how_it_works['link'] ) 
	                        		{
	                        			$popup = $how_it_works['popup'] ? ' class="list-how-work" data-effect="mfp-work" ' : '';

	                        			printf( '<div class="how-works__content-view">
			                                <a href="%s"%starget="%s">%s <i class="icon-arrow-right"></i></a>
			                            </div>', $how_it_works['link']['url'], $popup, $how_it_works['link']['target'], $how_it_works['link']['title'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $how_it_works['how_works'] ): ?>
	                <div class="row how-works-slider">
                		<?php foreach ( $how_it_works['how_works'] as $how ): ?>
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

                	            		acfButton( $how, 'btn-glowing' );
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

                    <?php if ( $how_it_works['popup'] && $how_it_works['how_works'] || $how_it_works['call_action'] ): ?>
                    <div id="mfp-how-work" class="list-how-work-details mfp-with-anim mfp-hide">
                       
                       <?php if ( $how_it_works['how_works'] ): ?>
                       <section class="list-how-work__wraper">
                           <div class="container">
                           		<?php if ( $how_it_works['title'] || get_the_title() ): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="list-how-work-details__content">
                                        	<?php
                                        		if ( $how_it_works['title'] ) 
                                        		{
                                        			printf( '<h2 class="title color-secondary">%s</h2>', $how_it_works['title'] );
                                        		}

                                        		if ( get_the_title() ) 
                                        		{
                                        			printf( '<h2 class="sub-title h1">%s</h2>', get_the_title() );
                                        		}
                                        	?>
                                        </div>
                                    </div>
                                </div>
                           		<?php endif;

                           		if ( $how_it_works['how_works'] ): foreach ( $how_it_works['how_works'] as $key => $how ): ?>
                                <div class="list-work-item">
                                   <div class="row align-items-center<?php echo $key % 2 ? '' : ' flex-row-reverse'; ?>">
                                   		<?php if ( $how['image'] ): ?>
                                       	<div class="col-md-7">
                                           	<div class="list-work-item__media">
                                           		<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $how['image']['url'] ), $how['image']['alt'] ); ?>
                                           	</div>
                                       	</div>
                                       	<?php endif; ?>

                                       	<?php if ( $how['title'] || $how['sub_title'] || $how['description'] || $how['button']['text'] ): ?>
                                       	<div class="col-md-5">
                                           <div class="list-work-item__text">
    	                                       	<?php
    	                                       		if ( $how['title'] ) 
    	                                       		{
    	                                       			printf( '<h2 class="title">%s</h2>', $how['title'] );
    	                                       		}

    	                                       		if ( $how['sub_title'] ) 
    	                                       		{
    	                                       			printf( '<h6 class="sub-title color-secondary">%s</h6>', $how['sub_title'] );
    	                                       		}

    	                                       		if ( $how['description'] ) 
    	                                       		{
    	                                       			printf( '%s', $how['description'] );
    	                                       		}

    	                                       		acfButton( $how, 'btn-glowing' );
    	                                       	?>
                                            </div>
                                       	</div>
                                       	<?php endif; ?>
                                   </div>
                                </div>
                                <?php endforeach; endif; ?>
                           </div>
                       	</section>
                      	<?php endif;

                      	if ( $how_it_works['call_action'] ): ?>
                      	<section class="call-action pb-0">
                           <div class="container">
                               <div class="row mb-30">
                               	<?php
                               	    foreach ( $how_it_works['call_action'] as $key => $box ) 
                               	    {
                               	        $style = $key % 2 ? ' left-image' : '';
                               	        $column = count( $how_it_works['call_action'] ) > 1 ? 'col-sm-6' : 'col-sm-12';
                               	        $link = $box['link'] ? 'href="'.esc_url( $box['link']['url'] ).'" target="'.$box['link']['target'].'"' : '';

                               	        echo '<div class="'.$column.'">';
                               	            echo '<a '.$link.' class="call-action__item list-how d-flex flex-column justify-content-between smoothScroll'.$style.'">';

                               	                if ( $box['image'] ) 
                               	                {
                               	                    printf( '<div class="call-action__item-media">
                               	                        <img src="%s" class="img-fluid" alt="%s">
                               	                    </div>', esc_url( $box['image']['url'] ), $box['image']['alt'] );
                               	                }

                               	                if ( $box['sub_title'] || $box['link'] ) 
                               	                {
                               	                    echo '<div class="call-action__item-text">';

   	                            	                    if ( $box['title'] ) 
   	                            	                    {
   	                            	                        printf( '<h5 class="title">%s</h5>', $box['title'] );
   	                            	                    }

                               	                        if ( $box['link'] ) 
                               	                        {
                               	                            printf( '<h6 class="link">%s <i class="icon-arrow-right"></i></h6>', $box['link']['title'] );
                               	                        }

                               	                    echo '</div>';
                               	                }
                               	            echo '</a>';
                               	        echo '</div>';
                               	    }
                               	?>
                               	</div>
                           	</div>
                       	</section><!-- /call-action -->
                       	<?php endif; ?>

                    </div><!-- /mfp-join-detail -->
                	<?php endif; endif; ?>
	            </div>
	        </div><!-- /how-works -->
	    	<?php endif;

	    	$highlights = get_field( 'creators_highlights' ); if ( !empty( $highlights ) && array_filter( $highlights ) ): ?>
	        <section class="additional pt-0">
	            <div class="container">
	            	<?php if ( $highlights['title'] || $highlights['sub_title'] ): ?>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="additional__content">
	                        	<?php
	                        		if ( $highlights['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $highlights['title'] );
	                        		}

	                        		if ( $highlights['sub_title'] ) 
	                        		{
	                        			printf( '<h5 class="sub-title">%s</h5>', $highlights['sub_title'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $highlights['highlights'] ): ?>
	                <div class="row mb-55">
	                	<?php foreach ( $highlights['highlights'] as $key => $highlight ): $link = $highlight['link'] ? 'href="'.esc_url( $highlight['link']['url'] ).'" target="'.$highlight['link']['target'].'"' : ''; ?>
	                    <div class="col-lg-6">
	                        <a <?php echo $link; ?> class="additional-item">
	                        	<?php
	                        		if ( $highlight['image'] ) 
	                        		{
	                        			printf( '<div class="additional-item__media">
			                                <img src="%s" class="img-fluid" alt="%s">
			                            </div>', esc_url( $highlight['image']['url'] ), $highlight['image']['alt'] );
	                        		}

	                        		if ( $highlight['title'] || $highlight['description'] ) 
	                        		{
	                        			echo '<div class="additional-item__text">';

	                        				if ( $highlight['title'] ) 
	                        				{
	                        					if ( $key == 0 || $key == 1 ) 
	                        					{
	                        						printf( '<h4 class="title">%s</h4>', $highlight['title'] );
	                        					}
	                        					else
	                        					{
	                        						printf( '<h5 class="title">%s</h5>', $highlight['title'] );
	                        					}
	                        				}

	                        				if ( $highlight['description'] ) 
	                        				{
	                        					printf( '%s', $highlight['description'] );
	                        				}
	                        			echo '</div>';
	                        		}
	                        	?>
	                        </a>
	                    </div><!-- /additional-item -->
	                	<?php endforeach; ?>
	                </div>
	                <?php endif; ?>
	            </div>
	        </section><!-- /additional -->
            <?php endif;

            $application = get_field( 'creators_application' ); if ( !empty( $application ) && array_filter( $application ) ): ?>
            <section id="application" class="application pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12"> 
                            <div class="contact">
                            	<?php
                            		if ( $application['title'] ) 
                            		{
                            			printf( '<div class="contact__text text-center">
    		                                <h3 class="title">%s</h3>
    		                            </div>', $application['title'] );
                            		}

    	                    		if ( $application['form_type'] ) 
    	                    		{
    									echo '<div class="contact__form">';

    		                    		if ( $application['form_type'] == 'embed' && $application['embed_code'] ) 
    		                    		{
    		                    			printf('<div class="embed_code">%s</div>', $application['embed_code']);
    		                    		}
    		                    		elseif( $application['form_type'] == 'form' && $application['select_form'] )
    		                    		{
    		                    			echo do_shortcode('[gravityform id="'. $application['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
    		                    		} 

    	                    			echo '</div>';
    	                    		}
                            	?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
            </div>
	        <?php endif;

	        $pricing_features = get_field( 'pricing_features' ); if ( !empty( $pricing_features ) && array_filter( $pricing_features ) ): ?>
	        <section class="request-demo-brands creators">
	            <div class="container">
	                <div class="row"> 
	                    <div class="col-12">
    	                    <div class="request-demo__content pricing-text-white">
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

	        $our_network = get_field( 'our_network' ); if ( !empty( $our_network ) && array_filter( $our_network ) ): ?>
	        <section class="our-network brands creators pt-0">
	            <div class="container">
	                <div class="row">
                		<?php if ( $our_network['title'] || $our_network['sub_title'] ): ?>
                	    <div class="col-lg-5">
                	        <div class="our-network__content">
                	        	<?php
                	        		if ( $our_network['title'] ) 
                	        		{
                	        			printf( '<h2 class="title h1 lg color-secondary">%s</h2>', $our_network['title'] );
                	        		}
                	        	?>
                	        </div>
                	    </div>
                	    <?php endif;

                	    if ( $our_network['features'] ): ?>
                	    <div class="col-lg-7">
                	    	<div class="d-flex flex-wrap our-network__item-wraper">
	                	    	<?php
	                	    		foreach ( $our_network['features'] as $feature ) 
	                	    		{
	                	    			echo '<div class="our-network__item">';

	                	    				if ( $feature['number'] ) 
	                	    				{
	                	    					printf( '<h4 class="title">%s</h4>', $feature['number'] );
	                	    				}

	                	    				if ( $feature['title'] ) 
	                	    				{
	                	    					printf( '<h2 class="main-title">%s</h2>', $feature['title'] );
	                	    				}

	                	    				if ( $feature['description'] ) 
	                	    				{
	                	    					printf( '<div class="description">%s</div>', $feature['description'] );
	                	    				}
	                	    			echo '</div>';
	                	    		}
	                	    	?>
	                	    </div>
                	    </div>
                	    <?php endif; ?>
	                </div>
	            </div>
	        </section><!-- /our-network -->
	        <?php endif; ?>
	        
	    </div>

	</div><!-- /content-area -->

<?php get_footer(); ?>