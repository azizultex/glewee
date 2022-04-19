<?php
/*
Template Name: About
*/
get_header(); ?>
	
	<div id="primary" class="content-area">

	    <div class="about-page-wraper">
	        <div class="container">
	            <div class="about-page-wraper__overly-1">
	                <img src="<?php echo get_theme_file_uri(); ?>/images/banner-overly-about.png" alt="">
	            </div>
	        </div>

			<?php $about_content = get_field( 'about_content' ); if ( !empty( $about_content ) && array_filter( $about_content ) ): ?>
	        <section class="banner about-glewee">
	            <div class="container"> 
            	<?php 
            		if ( $about_content['image'] ) 
            		{
            			printf( '<div class="about-glewee__media">
		                    <img src="%s" alt="%s">
		                </div>', esc_url( $about_content['image']['url'] ), $about_content['image']['alt'] );
            		}

	            	if ( $about_content['title'] || $about_content['description'] || $about_content['sub_title'] ): ?>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="banner__content entry-title">
	                        	<?php
	                        		if ( $about_content['title'] ) 
	                        		{
	                        			printf( '<h1 class="title lg">%s</h1>', $about_content['title'] );
	                        		}

	                        		if ( $about_content['description'] ) 
	                        		{
	                        			printf( '%s', $about_content['description'] );
	                        		}

	                        		if ( $about_content['sub_title'] ) 
	                        		{
	                        			printf( '<h4 class="sub-title">%s</h4>', $about_content['sub_title'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                </div> 
	            	<?php endif;

	            	if ( $about_content['call_action'] ): ?>
	                <div class="row mb-30">
	                	<?php foreach ( $about_content['call_action'] as $action ): $link = $action['link'] ? 'href="'.esc_url( $action['link']['url'] ).'" target="'.$action['link']['target'].'"' : ''; ?>
	                    <div class="col-lg-5 col-md-6">
	                        <a <?php echo $link; ?> class="about-glewee__item smoothScroll">
	                        	<?php
	                        		if ( $action['title'] || $action['sub_title'] ) 
	                        		{
	                        			echo '<div class="about-glewee__item-text">';

	                        				if ( $action['title'] ) 
	                        				{
	                        					printf( '<h4 class="title">%s</h4>', $action['title'] );
	                        				}

	                        				if ( $action['sub_title'] ) 
	                        				{
	                        					printf( '<h6 class="sub-title secondary">%s</h6>', $action['sub_title'] );
	                        				}

	                        			echo '</div>';
	                        		}

	                        		if ( $action['link'] ) 
	                        		{
	                        			printf( '<div class="about-glewee__item-icon">
			                                <i class="icon-arrow-down"></i>
			                            </div>', $action['link'] );
	                        		}
	                        	?>
	                        </a>
	                    </div><!-- /about-glewee__item -->
	                    <?php endforeach; ?>
	                </div>
	                <?php endif; ?>
	            </div>
	        </section><!-- /banner about-glewee -->
	    	<?php endif;

	        $social_campaigns = get_field( 'social_campaigns' ); if ( !empty( $social_campaigns ) && array_filter( $social_campaigns ) ): ?>
	        <div class="container">
	            <div class="about-page-wraper__overly"> 
	                <img src="<?php echo get_theme_file_uri( 'images/we-empower.png' ); ?>" alt="<?php echo $social_campaigns['title']; ?>"> 
	            </div>
	        </div>

	        <section class="we-empower pt-0">
	        	<a id="who-we-are" class="blankSpace"></a>
	            <div class="container">
	                <div class="row align-items-center">
	                	<?php if ( $social_campaigns['title'] || $social_campaigns['content'] ): ?>
	                    <div class="<?php echo $social_campaigns['campaigns'] ? 'col-xl-6' : 'col-xl-12 fluid'; ?>">
	                        <div class="we-empower__content entry-title">
	                        	<?php
	                        		if ( $social_campaigns['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $social_campaigns['title'] );
	                        		}

	                        		if ( $social_campaigns['content'] ) 
	                        		{
	                        			printf( '<div class="description">%s</div>', $social_campaigns['content'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                    <?php endif;

	                    if ( $social_campaigns['campaigns'] ): ?>
	                    <div class="col-xl-6">
	                        <div class="row mb-30 js-masonry" data-masonry-options='{ "itemSelector": ".item", "columnWidth": ".column" }'>
	                        	<?php foreach ( $social_campaigns['campaigns'] as $key => $campaign ): ?>
	                            <div class="<?php echo $key == 0 ? 'col-sm-8 ' : 'col-sm-4 '; ?>item">
	                                <a class="we-empower__item<?php if ( $key == 0 ) echo ' big'; ?>">
	                                	<?php
	                                		if ( $campaign['icon'] ) 
	                                		{
	                                			printf( '<div class="we-empower__item-icon">
			                                        <i class="%s"></i>
			                                    </div>', $campaign['icon'] );
	                                		}

	                                		if ( $campaign['title'] || $campaign['sub_title'] || $campaign['description'] ) 
	                                		{
	                                			echo '<div class="we-empower__item-text">';

	                                				if ( $campaign['title'] ) 
	                                				{
	                                					if ( $key == 0 ) 
	                                					{
	                                						printf( '<h3 class="title">%s</h3>', $campaign['title'] );
	                                					}
	                                					else
	                                					{
	                                						printf( '<h4 class="title">%s</h4>', $campaign['title'] );
	                                					}
	                                				}

	                                				if ( $campaign['sub_title'] ) 
	                                				{
	                                					printf( '<span class="sub-title">%s</span>', $campaign['sub_title'] );
	                                				}

	                                				if ( $campaign['description'] ) 
	                                				{
	                                					printf( '%s', $campaign['description'] );
	                                				}
	                                			echo '</div>';
	                                		}
	                                	?>
	                                </a>
	                            </div>
	                        	<?php endforeach; ?>
	                            <div class="col-sm-4 column"></div>
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </section><!-- /we-empower -->
	    	<?php endif;

	        $brand_awareness = get_field( 'brand_awareness' ); if ( !empty( $brand_awareness ) && array_filter( $brand_awareness ) ): ?>
	        <section id="brands" class="brand-awareness pt-0">
	            <div class="container">
	                <div class="row">
                		<?php if ( $brand_awareness['image'] ): ?>
                	    <div class="col-xl-8">
                	        <div class="brand-awareness__media">
                	        	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $brand_awareness['image']['url'] ), $brand_awareness['image']['alt'] ); ?>
                	        </div>
                	    </div>
                		<?php endif;

                		if ( $brand_awareness['sub_title'] || $brand_awareness['title'] || $brand_awareness['content'] || $brand_awareness['button']['text'] ): ?>
                	    <div class="col-xl-4">
                	        <div class="brand-awareness__content">
                	        	<?php
                	        		if ( $brand_awareness['sub_title'] ) 
                	        		{
                	        			printf( '<h5 class="sub-title color-secondary">%s</h5>', $brand_awareness['sub_title'] );
                	        		}

                	        		if ( $brand_awareness['title'] ) 
                	        		{
                	        			printf( '<h2 class="title">%s</h2>', $brand_awareness['title'] );
                	        		}

                	        		if ( $brand_awareness['content'] ) 
                	        		{
                	        			printf( '<div class="content-editor about-readmores">%s</div>', $brand_awareness['content'] );
                	        		}

                	        		acfButton( $brand_awareness );
                	        	?>
                	        </div>
                	    </div>
                	    <?php endif; ?>
	                </div>
	            </div>
	        </section><!-- /brand-awareness -->
	    	<?php endif;

        	$brands_type = get_field( 'trusted_brands_type' );

        	get_template_part( 
        		'template-parts/content', 'brands', 
        		array( 
        			'class' => 'about-trusted-brands pt-0',
        			'type' => $brands_type, 
        			'id' => get_the_ID(),
        		) 
        	); 
	        
	        $about_community = get_field( 'about_community' ); if ( !empty( $about_community ) && array_filter( $about_community ) ): ?>
	        <section id="creators" class="brand-awareness pt-0">
	            <div class="container">
	                <div class="row align-items-center">
	                	<?php if ( $about_community['image'] ): ?>
	                    <div class="col-xl-8 align-items-center">
	                        <div class="brand-awareness__media">
	                        	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $about_community['image']['url'] ), $about_community['image']['alt'] ); ?>
	                        </div>
	                    </div>
	                	<?php endif;

	                	if ( $about_community['sub_title'] || $about_community['title'] || $about_community['content'] || $about_community['button']['text'] ): ?>
	                    <div class="col-xl-4">
	                        <div class="brand-awareness__content">
	                        	<?php
	                        		if ( $about_community['sub_title'] ) 
	                        		{
	                        			printf( '<h5 class="sub-title color-secondary">%s</h5>', $about_community['sub_title'] );
	                        		}

	                        		if ( $about_community['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $about_community['title'] );
	                        		}

	                        		if ( $about_community['content'] ) 
	                        		{
	                        			printf( '<div class="content-editor about-readmores">%s</div>', $about_community['content'] );
	                        		}

	                        		acfButton( $about_community );
	                        	?>
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </section><!-- /join-community -->
	    	<?php endif;

	    	$creators_type = get_field( 'trusted_creators_type' );

	    	get_template_part( 
	    		'template-parts/content', 'creators', 
	    		array( 
	    			'class' => 'trusted-creators pt-0',
	    			'type' => $creators_type, 
	    			'id' => get_the_ID(),
	    		) 
	    	); 

	        $glewee_does = get_field( 'glewee_does' ); if ( !empty( $glewee_does ) && array_filter( $glewee_does ) ): ?>
	        <div class="overlay h-2442"></div>

	        <section id="what-we-do" class="what-glewee">
	            <div class="container">
	            	<?php if ( $glewee_does['title'] || $glewee_does['sub_title'] || $glewee_does['description'] ): ?>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="what-glewee__content">
	                        	<?php
	                        		if ( $glewee_does['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $glewee_does['title'] );
	                        		}

	                        		if ( $glewee_does['sub_title'] ) 
	                        		{
	                        			printf( '<span class="sub-title">%s</span>', $glewee_does['sub_title'] );
	                        		}

	                        		if ( $glewee_does['description'] ) 
	                        		{
	                        			printf( '%s', $glewee_does['description'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $glewee_does['tabs'] ): ?>
	                <div class="row">
	                    <div class="col-xl-2"> 
	                        <ul class="nav what-tabs__nav flex-xl-column" role="tablist">
	                        	<?php 
	                        		foreach ( $glewee_does['tabs'] as $key => $nav ) 
	                        		{
	                        			$active = $key == 0 ? 'active' : '';

	                        			printf( '<li><a data-toggle="tab"  role="tab" href="#tab-text-%s" aria-selected="false" aria-controls="tab-text-%s" class="%s">%s</a></li>', $key, $key, $active, $nav['title'] );
	                        		}
	                        	?>
	                        </ul> 
	                    </div>

	                    <div class="col-xl-10"> 
	                        <div class="what-tabs__body">
	                            <div class="tab-content">
	                            	<?php foreach ( $glewee_does['tabs'] as $key => $tab ): ?>
	                                <div id="tab-text-<?php echo $key; ?>" class="tab-pane what-tabs__item<?php if ( $glewee_does['animation'] ) echo ' animated '.$glewee_does['animation']; if ( $key == 0 ) echo ' active'; ?>" role="tabpanel">
	                                    <div class="what-tabs__item-text">
	                                        <div class="content">
	                                        	<?php
	                                        		if ( $tab['title'] ) 
	                                        		{
	                                        			printf( '<h3 class="title">%s</h3>', $tab['title'] );
	                                        		}

	                                        		if ( $tab['content'] ) 
	                                        		{
	                                        			printf( '<div class="content-editor">%s</div>', $tab['content'] );
	                                        		}
	                                        	?>
	                                        </div>
	                                    </div>

	                                    <?php if ( $tab['image'] ): ?>
	                                    <div class="what-tabs__item-media">
	                                    	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $tab['image']['url'] ), $tab['image']['alt'] ); ?>
	                                    </div>
	                                    <?php endif; ?>
	                                </div> 
	                                <?php endforeach; ?>
	                            </div> 
	                        </div> 
	                    </div> 
	                </div>
	                <?php endif; ?>
	            </div>
	        </section><!-- /what-glewee -->

	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <hr>
	                </div>
	            </div>
	        </div>
	    	<?php endif;

	        $ebook_offer = get_field( 'about_ebook_offer' ); if ( !empty( $ebook_offer ) && array_filter( $ebook_offer ) ): ?>
	        <section class="ebook-offer">
	            <div class="container">
	                <div class="row mb-60">
	                    <div class="col-12">
	                        <div class="ebook-offer__item d-flex flex-xl-row flex-column align-items-center">
    	                    	<?php
    	                    		$class = !$ebook_offer['image'] ? ' ml-0 fluid' : '';

    	                    		if ( $ebook_offer['image'] ) 
    	                    		{
    	                    			printf( '<div class="ebook-offer__item-media">
    			                            <img src="%s" class="img-fluid" alt="%s">
    			                        </div>', esc_url( $ebook_offer['image']['url'] ), $ebook_offer['image']['alt'] );
    	                    		}

    	                    		if ( $ebook_offer['title'] || $ebook_offer['content'] || $ebook_offer['button'] ) 
    	                    		{
    	                    			echo '<div class="ebook-offer__item-text'.$class.'">';

    	                    				if ( $ebook_offer['title'] ) 
    	                    				{
    	                    					printf( '<h4 class="title">%s</h4>', $ebook_offer['title'] );
    	                    				}

    	                    				if ( $ebook_offer['content'] ) 
    	                    				{
    	                    					printf( '<div class="description">%s</div>', $ebook_offer['content'] );
    	                    				}

    	                    				acfButton( $ebook_offer );

    	                    			echo '</div>';
    	                    		}
    	                    	?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section><!-- /ebook-offer -->

	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <hr>
	                </div>
	            </div>
	        </div>
	    	<?php endif;

	        $about_contact = get_field( 'about_contact' ); if ( !empty( $about_contact ) && array_filter( $about_contact ) ): ?>
	        <section class="about-contact">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12">
	                        <div class="contact">
    		                    <?php
    	                    		if ( $about_contact['title'] || $about_contact['description'] ) 
    	                    		{
    	                    			echo '<div class="contact__text text-center">';

    	                    				if ( $about_contact['title'] ) 
    	                    				{
    	                    					printf( '<h3 class="title">%s</h3>', $about_contact['title'] );
    	                    				}

    	                    				if ( $about_contact['description'] ) 
    	                    				{
    	                    					printf( '<div class="description">%s</div>', $about_contact['description'] );
    	                    				}

    	                    			echo '</div>';
    	                    		}

    	                    		if ( $about_contact['form_type'] ) 
    	                    		{
    									echo '<div class="contact__form">';

    		                    		if ( $about_contact['form_type'] == 'embed' && $about_contact['embed_code'] ) 
    		                    		{
    		                    			printf('<div class="embed_code">%s</div>', $about_contact['embed_code']);
    		                    		}
    		                    		elseif( $about_contact['form_type'] == 'form' && $about_contact['select_form'] )
    		                    		{
    		                    			echo do_shortcode('[gravityform id="'. $about_contact['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
    		                    		} 

    	                    			echo '</div>';
    	                    		}
    	                    	?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </section>
	        <?php endif; ?>
	    </div>

	</div><!-- /content-area -->

<?php get_footer(); ?>