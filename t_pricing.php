<?php
/*
Template Name: Pricing + Features
*/
get_header( '', array( 'transparent' => true ) ); ?>
	
	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <?php $pricing_content = get_field( 'pricing_content' ); if ( $pricing_content['title'] || $pricing_content['description'] ): ?>
	    <section class="pricing-features">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="pricing-features__content">
	                    	<?php
	                    		if ( $pricing_content['title'] ) 
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', $pricing_content['title'] );
	                    		}
	                    		else
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', get_the_title() );
	                    		}

	                    		if ( $pricing_content['description'] ) 
	                    		{
	                    			printf( '<div class="description lg">%s</div>', $pricing_content['description'] );
	                    		}
	                    	?>
	                    </div> 
	                </div>
	            </div> 
	        </div>
	    </section><!-- /pricing-features --> 

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>
	    <?php endif;

	    if ( $pricing_content['small_title'] || $pricing_content['note'] || $pricing_content['monthly_label'] || $pricing_content['yearly_label'] || $pricing_content['pricing_table'] ): ?>
	    <section class="pricing pb-0">
	        <div class="container"> 
	        	<?php if ( $pricing_content['small_title'] || $pricing_content['note'] || $pricing_content['monthly_label'] || $pricing_content['yearly_label'] ): ?>
	            <div class="row"> 
	            	<?php if ( $pricing_content['small_title'] || $pricing_content['note'] ): ?>
	                <div class="col-lg-8">
	                    <div class="pricing__content">
	                    	<?php
	                    		if ( $pricing_content['small_title'] ) 
	                    		{
	                    			printf( '<h5 class="title">%s</h5>', $pricing_content['small_title'] );
	                    		}

	                    		if ( $pricing_content['note'] ) 
	                    		{
	                    			printf( '%s', $pricing_content['note'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	            	<?php endif; ?>

	                <div class="col-lg-4 text-right">
	                    <div class="pricing__controller">
	                    	<?php
	                    		if ( $pricing_content['monthly_label'] ) 
	                    		{
	                    			printf( '<label>%s</label>', $pricing_content['monthly_label'] );
	                    		}
	                    	?>
	                        <div class="toggle">
	                            <input type="checkbox" id="switcher" class="check">
	                            <b class="b switch"></b>
	                        </div>
	                        <?php
	                        	if ( $pricing_content['yearly_label'] ) 
	                        	{
	                        		printf( '<label>%s</label>', $pricing_content['yearly_label'] );
	                        	}
	                        ?>
	                    </div>
	                </div>
	            </div>
	            <?php endif;

	            if ( $pricing_content['pricing_table'] ): ?>
	            <div class="pricing-item-wraper">
	                <div class="row mb-30 align-items-end" id="monthly">
	                	<?php foreach ( $pricing_content['pricing_table'] as $monthly ): if ( $monthly['type'] == 'free' ): ?>
	                	<div class="col-12">
	                	    <div class="pricing-bottom d-flex align-items-center flex-wrap justify-content-between">
	                	    	<?php
	                	    		if ( $monthly['title'] || $monthly['monthly_price'] || $monthly['monthly_billed'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content">';

	                	    				if ( $monthly['title'] ) 
	                	    				{
	                	    					printf( '<h6 class="sub-title">%s</h6>', $monthly['title'] );
	                	    				}

	                	    				if ( $monthly['monthly_price'] ) 
	                	    				{
	                	    					printf( '<h3 class="title">%s</h3>', $monthly['monthly_price'] );
	                	    				}

	                	    				if ( $monthly['monthly_billed'] ) 
	                	    				{
	                	    					printf( '<p><strong>%s</strong></p>', $monthly['monthly_billed'] );
	                	    				}
	                	    			echo '</div>';
	                	    		}

	                	    		if ( $monthly['monthly_description'] || $monthly['monthly_features'] || $monthly['button'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content">';

	                	    				if ( $monthly['monthly_description'] ) 
	                	    				{
	                	    					printf( '%s', $monthly['monthly_description'] );
	                	    				}

	                	    				if ( $monthly['monthly_features'] ) 
	                	    				{
	                	    					echo '<div class="pricing-bottom__content-ul-wraper d-flex flex-wrap">';
	                	    						echo '<ul>';

	                	    							foreach ( $monthly['monthly_features'] as $feature ) 
	                	    							{
	                	    								printf( '<li>%s</li>', $feature['text'] );
	                	    							}

	                	    						echo '</ul>';
	                	    					echo '</div>';
	                	    				}
	                	    			echo '</div>';
	                	    		}

	                	    		if ( $monthly['button'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content-btn">';

	                	    				acfButton( $monthly, 'btn btn-border' );

	                	    			echo '</div>';
	                	    		}
	                	    	?>
	                	    </div>
	                	</div>
	                	<?php else: ?>
	                    <div class="col-lg-4 col-sm-6">
	                        <div class="pricing__card <?php if ( $monthly['type'] == 'popular' ) { echo 'popuar'; } elseif ( $monthly['type'] == 'enterprise' ) { echo 'varies'; } ?>">
	                        	<?php
	                        		if ( $monthly['type'] == 'popular' ) 
	                        		{
	                        			printf( '<span class="popuar__text">%s</span>', 'Most Popular' );
	                        		}

	                        		if ( $monthly['title'] || $monthly['monthly_price'] || $monthly['monthly_billed'] || $monthly['monthly_description'] ) 
	                        		{
		                        		echo '<div class="pricing__card-header">';

		                        			if ( $monthly['title'] ) 
		                        			{
		                        				printf( '<h6 class="sub-title">%s</h6>', $monthly['title'] );
		                        			}

		                        			if ( $monthly['monthly_price'] ) 
		                        			{
		                        				if ( $monthly['type'] == 'enterprise' ) 
		                        				{
		                        					printf( '<h3 class="title">%s</h3>', $monthly['monthly_price'] );
		                        				}
		                        				else
		                        				{
		                        					printf( '<h6 class="title"><span class="h3">%s</span> per month</h6>', $monthly['monthly_price'] );
		                        				}
		                        			}

		                        			if ( $monthly['monthly_billed'] ) 
		                        			{
		                        				printf( '<p><strong>%s</strong></p>', $monthly['monthly_billed'] );
		                        			}

		                        			if ( $monthly['monthly_description'] ) 
		                        			{
		                        				printf( '%s', $monthly['monthly_description'] );
		                        			}

		                        		echo '</div>';
	                        		}

	                        		if ( $monthly['monthly_features'] || $monthly['button'] ) 
	                        		{
	                        			echo '<div class="pricing__card-body">';

	                        				if ( $monthly['monthly_features'] ) 
	                        				{
	                        					echo '<ul>';

	                        						foreach ( $monthly['monthly_features'] as $feature ) 
	                        						{
	                        							printf( '<li>%s</li>', $feature['text'] );
	                        						}

	                        					echo '</ul>';
	                        				}

	                        				acfButton( $monthly, 'btn btn-border' );

	                        			echo '</div>';
	                        		}
	                        	?>
	                        </div>
	                    </div><!-- /pricing__card -->
	                    <?php endif; endforeach; ?>
	                </div>
	                <div class="row mb-30 align-items-end hide" id="yearly">
	                	<?php foreach ( $pricing_content['pricing_table'] as $yearly ): if ( $yearly['type'] == 'free' ): ?>
	                	<div class="col-12">
	                	    <div class="pricing-bottom d-flex align-items-center flex-wrap justify-content-between">
	                	    	<?php
	                	    		if ( $yearly['title'] || $yearly['yearly_price'] || $yearly['yearly_billed'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content">';

	                	    				if ( $yearly['title'] ) 
	                	    				{
	                	    					printf( '<h6 class="sub-title">%s</h6>', $yearly['title'] );
	                	    				}

	                	    				if ( $yearly['yearly_price'] ) 
	                	    				{
	                	    					printf( '<h3 class="title">%s</h3>', $yearly['yearly_price'] );
	                	    				}

	                	    				if ( $yearly['yearly_billed'] ) 
	                	    				{
	                	    					printf( '<p><strong>%s</strong></p>', $yearly['yearly_billed'] );
	                	    				}
	                	    			echo '</div>';
	                	    		}

	                	    		if ( $yearly['yearly_description'] || $yearly['yearly_features'] || $yearly['button'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content">';

	                	    				if ( $yearly['yearly_description'] ) 
	                	    				{
	                	    					printf( '%s', $yearly['yearly_description'] );
	                	    				}

	                	    				if ( $yearly['yearly_features'] ) 
	                	    				{
	                	    					echo '<div class="pricing-bottom__content-ul-wraper d-flex flex-wrap">';
	                	    						echo '<ul>';

	                	    							foreach ( $yearly['yearly_features'] as $feature ) 
	                	    							{
	                	    								printf( '<li>%s</li>', $feature['text'] );
	                	    							}

	                	    						echo '</ul>';
	                	    					echo '</div>';
	                	    				}
	                	    			echo '</div>';
	                	    		}

	                	    		if ( $yearly['button'] ) 
	                	    		{
	                	    			echo '<div class="pricing-bottom__content-btn">';

	                	    				acfButton( $yearly, 'btn btn-border' );

	                	    			echo '</div>';
	                	    		}
	                	    	?>
	                	    </div>
	                	</div>
	                	<?php else: ?>
	                    <div class="col-lg-4 col-sm-6">
	                        <div class="pricing__card <?php if ( $yearly['type'] == 'popular' ) { echo 'popuar'; } elseif ( $yearly['type'] == 'enterprise' ) { echo 'varies'; } ?>">
	                        	<?php
	                        		if ( $yearly['type'] == 'popular' ) 
	                        		{
	                        			printf( '<span class="popuar__text">%s</span>', 'Most Popular' );
	                        		}

	                        		if ( $yearly['title'] || $yearly['yearly_price'] || $yearly['yearly_billed'] || $yearly['yearly_description'] ) 
	                        		{
		                        		echo '<div class="pricing__card-header">';

		                        			if ( $yearly['title'] ) 
		                        			{
		                        				printf( '<h6 class="sub-title">%s</h6>', $yearly['title'] );
		                        			}

		                        			if ( $yearly['yearly_price'] ) 
		                        			{
		                        				if ( $yearly['type'] == 'enterprise' ) 
		                        				{
		                        					printf( '<h3 class="title">%s</h3>', $yearly['yearly_price'] );
		                        				}
		                        				else
		                        				{
		                        					printf( '<h6 class="title"><span class="h3">%s</span> per year</h6>', $yearly['yearly_price'] );
		                        				}
		                        			}

		                        			if ( $yearly['yearly_billed'] ) 
		                        			{
		                        				printf( '<p><strong>%s</strong></p>', $yearly['yearly_billed'] );
		                        			}

		                        			if ( $yearly['yearly_description'] ) 
		                        			{
		                        				printf( '%s', $yearly['yearly_description'] );
		                        			}

		                        		echo '</div>';
	                        		}

	                        		if ( $yearly['yearly_features'] || $yearly['button'] ) 
	                        		{
	                        			echo '<div class="pricing__card-body">';

	                        				if ( $yearly['monthly_features'] ) 
	                        				{
	                        					echo '<ul>';

	                        						foreach ( $yearly['yearly_features'] as $feature ) 
	                        						{
	                        							printf( '<li>%s</li>', $feature['text'] );
	                        						}

	                        					echo '</ul>';
	                        				}

	                        				acfButton( $yearly, 'btn btn-border' );

	                        			echo '</div>';
	                        		}
	                        	?>
	                        </div>
	                    </div><!-- /pricing__card -->
	                    <?php endif; endforeach; ?>
	                </div>
	            </div> 
	            <?php endif; ?>
	        </div>
	    </section><!-- /pricing -->
		<?php endif;

		$apply_creator = get_field( 'pricing_apply_creator' ); if ( !empty( $apply_creator ) && array_filter( $apply_creator ) ): ?>
	    <section class="fine-print">
	        <div class="container">
	            <div class="row">
	            	<?php if ( $apply_creator['title'] || $apply_creator['sub_title'] || $apply_creator['button'] ): ?>
	                <div class="<?php if ( $apply_creator['image'] ) { echo 'col-md-8'; } else { echo 'col-md-12 fluid'; }; ?>">
	                    <div class="fine-print__content entry-title">
	                    	<?php
	                    		if ( $apply_creator['title'] ) 
	                    		{
	                    			printf( '<h2 class="title h1">%s</h2>', $apply_creator['title'] );
	                    		}

	                    		if ( $apply_creator['sub_title'] ) 
	                    		{
	                    			printf( '<h3 class="sub-title color-secondary">%s</h3>', $apply_creator['sub_title'] );
	                    		}

	                    		acfButton( $apply_creator );
	                    	?>
	                    </div>
	                </div>
	            	<?php endif;

	            	if ( $apply_creator['image'] ): ?>
	                <div class="col-md-4">
	                    <div class="fine-print__media">
	                    	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $apply_creator['image']['url'] ), $apply_creator['image']['alt'] ); ?>
	                    </div>
	                </div>
	            	<?php endif; ?>
	            </div>
	        </div>
	    </section><!-- /fine-print -->
	    <?php endif; 

	    $pricing_contact = get_field( 'pricing_contact' ); if ( !empty( $pricing_contact ) && array_filter( $pricing_contact ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div> 

	    <section class="questions">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact">
	                    	<?php
	                    		if ( $pricing_contact['title'] || $pricing_contact['description'] ) 
	                    		{
	                    			echo '<div class="contact__text text-center">';

	                    				if ( $pricing_contact['title'] ) 
	                    				{
	                    					printf( '<h3 class="title">%s</h3>', $pricing_contact['title'] );
	                    				}

	                    				if ( $pricing_contact['description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $pricing_contact['description'] );
	                    				}

	                    			echo '</div>';
	                    		}

	                    		if ( $pricing_contact['form_type'] ) 
	                    		{
									echo '<div class="contact__form">';

		                    		if ( $pricing_contact['form_type'] == 'embed' && $pricing_contact['embed_code'] ) 
		                    		{
		                    			printf('<div class="embed_code">%s</div>', $pricing_contact['embed_code']);
		                    		}
		                    		elseif( $pricing_contact['form_type'] == 'form' && $pricing_contact['select_form'] )
		                    		{
		                    			echo do_shortcode('[gravityform id="'. $pricing_contact['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
		                    		} 

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /questions -->
	    <?php endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>