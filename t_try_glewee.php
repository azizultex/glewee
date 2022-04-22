<?php
/*
Template Name: Try Glewee
*/
get_header(); ?>

	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <?php $try_content = get_field( 'try_content' ); if ( !empty( $try_content ) && array_filter( $try_content ) ): ?>
	    <section class="try-glewee">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                	<?php
	                		if ( $try_content['title'] || $try_content['description'] ) 
	                		{
	                			echo '<div class="try-glewee__content text-center">';

	                				if ( $try_content['title'] ) 
	                				{
	                					printf( '<h1 class="title lg">%s</h1>', $try_content['title'] );
	                				}
	                				else
	                				{
	                					printf( '<h1 class="title lg">%s</h1>', get_the_title() );
	                				}

	                				if ( $try_content['description'] ) 
	                				{
	                					printf( '<div class="description">%s</div>', $try_content['description'] );
	                				}

	                			echo '</div>';
	                		}

	                		if ( $try_content['form_title'] || $try_content['form_description'] || $try_content['form_type'] ) 
	                		{
	                			echo '<div class="contact">';

	                    		if ( $try_content['form_title'] || $try_content['form_description'] ) 
	                    		{
	                    			echo '<div class="contact__text text-center">';

	                    				if ( $try_content['form_title'] ) 
	                    				{
	                    					printf( '<h3 class="title">%s</h3>', $try_content['form_title'] );
	                    				}

	                    				if ( $try_content['form_description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $try_content['form_description'] );
	                    				}

	                    			echo '</div>';
	                    		}

	                    		if ( $try_content['form_type'] ) 
	                    		{
									echo '<div class="contact__form">';

		                    		if ( $try_content['form_type'] == 'embed' && $try_content['embed_code'] ) 
		                    		{
		                    			printf('<div class="embed_code">%s</div>', $try_content['embed_code']);
		                    		}
		                    		elseif( $try_content['form_type'] == 'form' && $try_content['select_form'] )
		                    		{
		                    			echo do_shortcode('[gravityform id="'. $try_content['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
		                    		} 

	                    			echo '</div>';
	                    		}

	                    		echo '</div>';
	                		}
	                	?>
	                </div>
	            </div>
	        </div>
	    </section><!-- /try-glewee -->
	    <?php endif;

    	$brands_type = get_field( 'trusted_brands_type' );

    	get_template_part( 
    		'template-parts/content', 'brands', 
    		array( 
    			'class' => 'trusted-brands pt-0',
    			'type' => $brands_type, 
    			'id' => get_the_ID(),
    		) 
    	); 
	    
	    $ebook_offer = get_field( 'try_ebook_offer' ); if ( !empty( $ebook_offer ) && array_filter( $ebook_offer ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

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

	                    				acfButton( $ebook_offer, 'btn-glowing' );

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /ebook-offer -->
		<?php endif;

        $call_action = get_field( 'call_action', 'options' ); 
        if ( $call_action ): ?>
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <hr>
		            </div>
		        </div>
		    </div>

	    	<?php 
	    	get_template_part( 'template-parts/call', 'action' ); 
			
		endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>