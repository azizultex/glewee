<?php
/*
Template Name: Contact Us
*/
get_header(); ?>
	
	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <?php $contact_content = get_field( 'contact_content' ); if ( !empty( $contact_content ) ): ?>
	    <section class="contact-us">
	        <div class="container">
	        	<?php if ( $contact_content['title'] || $contact_content['sub_title'] || $contact_content['description'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact-us__content">
	                    	<?php
	                    		if ( $contact_content['title'] ) 
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', $contact_content['title'] );
	                    		}
	                    		else
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', get_the_title() );
	                    		}

	                    		if ( $contact_content['sub_title'] ) 
	                    		{
	                    			printf( '<h4 class="sub-title">%s</h4>', $contact_content['sub_title'] );
	                    		}

	                    		if ( $contact_content['description'] ) 
	                    		{
	                    			printf( '<div class="description">%s</div>', $contact_content['description'] );
	                    		}
	                    	?>
	                    </div> 
	                </div>
	            </div>
	            <?php endif;

	            if ( $contact_content['contact_options'] ): ?>
	            <div class="row mb-30 js-masonry" data-masonry-options='{ "itemSelector": ".item", "columnWidth": ".column" }'>
	            	<?php
	            		foreach ( $contact_content['contact_options'] as $key => $option ) 
	            		{
	            			$big = $key == 0 ? ' big' : '';

	            			$target = $option['link']['type'] == 'external' && $option['link']['target'] ? '_self' : '_blank';
	            			$link = $option['link']['type'] == 'internal' ? 'href="'.esc_url( $field['button']['internal_url'] ).'"' : ( $option['link']['type'] == 'external' ? 'href="'.esc_url( $option['link']['external_url'] ).'"' : '');

	            			echo '<div class="col-lg-4 item">';
	            				echo '<a '.$link.' class="contact-us__item smoothScroll'.$big.'" target="'.$target.'">';

	            					if ( $option['icon'] ) 
	            					{
	            						printf( '<div class="contact-us__item-icon">
				                            <img src="%s" class="img-fluid" alt="%s">
				                        </div>', esc_url( $option['icon']['url'] ), $option['icon']['alt'] );
	            					}

	            					if ( $option['title'] || $option['sub_title'] ) 
	            					{
	            						echo '<div class="contact-us__item-text">';

	            							if ( $option['title'] ) 
	            							{
	            								if ( $key == 0 ) 
	            								{	
	            									printf( '<h3 class="title">%s</h3>', $option['title'] );
	            								}
	            								else
	            								{
	            									printf( '<h4 class="title">%s</h4>', $option['title'] );
	            								}
	            							}

	            							if ( $option['sub_title'] ) 
	            							{
	            								printf( '<h6 class="sub-title color-secondary">%s</h6>', $option['sub_title'] );
	            							}

	            							if ( $link ) 
	            							{
	            								echo '<div class="read-more">
					                                <i class="icon-arrow-down"></i>
					                            </div>';
	            							}

	            						echo '</div>';
	            					}
	            				echo '</a>';
	            			echo '</div>';
	            		}
	            	?>
	                <div class="col-lg-4 column"></div>
	            </div>
	            <?php endif; ?>
	        </div>
	    </section><!-- /contact-us -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>
	    <?php endif;

	    $contact_form = get_field( 'contact_form' ); if ( !empty( $contact_form ) && array_filter( $contact_form ) ): ?>
	    <section id="contact" class="look-forward">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact">
		                    <?php
	                    		if ( $contact_form['title'] || $contact_form['description'] ) 
	                    		{
	                    			echo '<div class="contact__text text-center">';

	                    				if ( $contact_form['title'] ) 
	                    				{
	                    					printf( '<h3 class="title">%s</h3>', $contact_form['title'] );
	                    				}

	                    				if ( $contact_form['description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $contact_form['description'] );
	                    				}

	                    			echo '</div>';
	                    		}

	                    		if ( $contact_form['form_type'] ) 
	                    		{
									echo '<div class="contact__form">';

		                    		if ( $contact_form['form_type'] == 'embed' && $contact_form['embed_code'] ) 
		                    		{
		                    			printf('<div class="embed_code">%s</div>', $contact_form['embed_code']);
		                    		}
		                    		elseif( $contact_form['form_type'] == 'form' && $contact_form['select_form'] )
		                    		{
		                    			echo do_shortcode('[gravityform id="'. $contact_form['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
		                    		} 

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /look-forward -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>
	    <?php endif;

	    $social_media = get_field( 'social_media', 'options' ); $apps_store = get_field( 'apps_store', 'options' ); if ( !empty( $social_media ) && array_filter( $social_media ) || !empty( $apps_store ) && array_filter( $apps_store ) ): ?>
	    <section class="follow-us-share">
	        <div class="container">
	            <div class="row mb-30">
	            	<?php if ( !empty( $social_media ) && array_filter( $social_media ) ): ?>
	                <div class="col-lg-6">
	                    <div class="follow-us-share__content d-flex justify-content-between flex-column">
	                    	<?php
	                    		if ( $social_media['title'] || $social_media['description'] ) 
	                    		{
	                    			echo '<div class="text">';

	                    				if ( $social_media['title'] ) 
	                    				{
	                    					printf( '<h2 class="title">%s</h2>', $social_media['title'] );
	                    				}

	                    				if ( $social_media['description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $social_media['description'] );	                    					
	                    				}
	                    			echo '</div>';
	                    		}

	                    		if ( $social_media['social'] ) 
	                    		{
	                    			echo '<div class="follow-us-share__content-btn-group">';

	                    				foreach ( $social_media['social'] as $social ) 
	                    				{
	                    					printf( '<a href="%s" class="btn follow background-%s" target="_blank">
				                                <div class="icon float-left">
				                                    <i class="%s"></i>
				                                </div>
				                                <div class="text">
				                                    <span class="sub-title">%s</span>
				                                    <span class="title">%s</span>
				                                </div>
				                            </a>', esc_url( $social['url'] ), $social['icon']['value'], $social['icon']['value'], $social['label'], $social['icon']['label'] );
	                    				}

	                    			echo '</div>';
	                    		}
	                    	?>	                        
	                    </div>
	                </div>
	                <?php endif;

	                if ( !empty( $apps_store ) && array_filter( $apps_store ) ): ?>
	                <div class="col-lg-6">
	                    <div class="follow-us-share__content entry-title d-flex justify-content-between flex-column">
	                    	<?php
	                    		if ( $apps_store['title'] || $apps_store['description'] ) 
	                    		{
	                    			echo '<div class="text">';

	                    				if ( $apps_store['title'] ) 
	                    				{
	                    					printf( '<h3 class="title">%s</h3>', $apps_store['title'] );
	                    				}

	                    				if ( $apps_store['description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $apps_store['description'] );
	                    				}

	                    			echo '</div>';
	                    		}

	                    		if ( $apps_store['apple_store'] || $apps_store['google_play'] ) 
	                    		{
	                    			echo '<div class="follow-us-share__content-btn-group get-app">';

	                    				if ( $apps_store['apple_store'] ) 
	                    				{
	                    					printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['apple_store'] ), esc_url( get_theme_file_uri( 'images/app-store-white.png' )) );
	                    				}

	                    				if ( $apps_store['google_play'] ) 
	                    				{
	                    					printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="Apple Store"></a>', esc_url( $apps_store['google_play'] ), esc_url( get_theme_file_uri( 'images/google-play-white.png' )) );
	                    				}

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	                <?php endif; ?>
	            </div>
	        </div>
	    </section><!-- /follow-us-share -->
	    <?php endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>