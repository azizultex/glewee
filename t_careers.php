<?php
/*
Template Name: Careers
*/
get_header(); 
	
	$careers_content = get_field( 'careers_content' ); ?>

	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <?php if ( !empty( $careers_content ) && array_filter( $careers_content ) ): ?>
	    <section class="careers">
	        <div class="container">
	        	<?php if ( $careers_content['title'] || $careers_content['description'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="careers__content entry-title">
	                    	<?php 
	                    		if ( $careers_content['title'] ) 
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', $careers_content['title'] );
	                    		}
	                    		else
	                    		{
	                    			printf( '<h1 class="title lg">%s</h1>', get_the_title() );
	                    		}

	                    		if ( $careers_content['description'] ) 
	                    		{
	                    			printf( '<div class="description lg">%s</div>', $careers_content['description'] );
	                    		}
	                    	?>
	                    </div> 
	                </div>
	            </div> 
	        	<?php endif;

	        	if ( $careers_content['small_title'] || $careers_content['sub_title'] || $careers_content['content'] || $careers_content['button'] || $careers_content['image'] ): ?>
	            <div class="row">
	            	<?php if ( $careers_content['small_title'] || $careers_content['sub_title'] || $careers_content['content'] || $careers_content['button'] ): ?>
	                <div class="<?php if ( $careers_content['image'] ) { echo 'col-lg-6'; } else { echo 'col-lg-12 fluid'; }; ?>">
	                    <div class="careers__content culture">
	                    	<?php
	                    		if ( $careers_content['small_title'] ) 
	                    		{
	                    			printf( '<h2 class="title">%s</h2>', $careers_content['small_title'] );
	                    		}

	                    		if ( $careers_content['sub_title'] ) 
	                    		{
	                    			printf( '<h5 class="sub-title">%s</h5>', $careers_content['sub_title'] );
	                    		}

	                    		if ( $careers_content['content'] ) 
	                    		{
	                    			printf( '%s', $careers_content['content'] );
	                    		}

	                    		acfButton( $careers_content, 'btn-red smoothScroll' );
	                    	?>
	                    </div>
	                </div>
	            	<?php endif;

	            	if ( $careers_content['image'] ): ?>
	                <div class="col-lg-6">
	                    <div class="careers__media">
	                    	<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $careers_content['image']['url'] ), $careers_content['image']['alt'] ); ?>
	                    </div>
	                </div>
	            	<?php endif; ?>
	            </div>
	            <?php endif; ?>
	        </div>
	    </section><!-- /careers -->
	    <?php endif;

	    $careers_highlights  = get_field( 'careers_highlights' ); if ( !empty( $careers_highlights ) && array_filter( $careers_highlights ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <section class="main-highlights">
	        <div class="container">
	            <div class="row align-items-center">
	            	<?php if ( $careers_highlights['title'] || $careers_highlights['content'] ): ?>
	                <div class="<?php if ( $careers_highlights['highlights'] ) { echo 'col-lg-5'; } else { echo 'col-lg-12 fluid'; }; ?>">
	                    <div class="main-highlights__content">
	                    	<?php
	                    		if ( $careers_highlights['title'] ) 
	                    		{
	                    			printf( '<h2 class="title">%s</h2>', $careers_highlights['title'] );
	                    		}

	                    		if ( $careers_highlights['content'] ) 
	                    		{
	                    			printf( '%s', $careers_highlights['content'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $careers_highlights['highlights'] ): ?>
	                <div class="col-lg-7">
	                    <ul class="main-highlights__list">
	                    	<?php
	                    		foreach ( $careers_highlights['highlights'] as $highlight ) 
	                    		{
	                    			echo '<li>';

	                    				if ( $highlight['icon'] ) 
	                    				{
	                    					printf( '<div class="icon" style="background: %s;"><i class="%s"></i></div>', $highlight['color'], $highlight['icon'] );
	                    				}

	                    				if ( $highlight['title'] || $highlight['description'] ) 
	                    				{
	                    					echo '<div class="text">';

	                    						if ( $highlight['title'] ) 
	                    						{
	                    							printf( '<h5 class="title">%s</h5>', $highlight['title'] );
	                    						}

	                    						if ( $highlight['description'] ) 
	                    						{
	                    							printf( '%s', $highlight['description'] );
	                    						}

	                    					echo '</div>';
	                    				}
	                    			echo '</li>';
	                    		}
	                    	?>
	                    </ul>
	                </div>
	                <?php endif; ?>
	            </div>
	        </div>
	    </section><!-- /main-highlights -->
	    <?php endif;

	    $careers_message = get_field( 'careers_message' ); if ( !empty( $careers_message ) && array_filter( $careers_message ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <section class="founders">
	        <div class="container">
	            <div class="row align-items-center">
	            	<?php if ( $careers_message['image'] ): ?>
	                <div class="col-lg-4">
	                    <div class="founders__media">
	                        <?php
	                        	if ( $careers_message['name'] || $careers_message['position'] ) 
	                        	{
	                        		echo '<div class="founders__media-text">';

	                        			if ( $careers_message['name'] ) 
	                        			{
	                        				printf( '<h5 class="title">%s</h5>', $careers_message['name'] );
	                        			}

	                        			if ( $careers_message['position'] ) 
	                        			{
	                        				printf( '<h6 class="sub-title">%s</h6>', $careers_message['position'] );
	                        			}

	                        		echo '</div>';
	                        	}

	                        	printf( '<div class="founders__media-img">
		                            <img src="%s" class="img-fluid" alt="%s">
		                        </div>', esc_url( $careers_message['image']['url'] ), $careers_message['image']['alt'] );
	                        ?>
	                    </div>
	                </div>
	            	<?php endif;

	            	if ( $careers_message['title'] || $careers_message['quote'] ): ?>
	                <div class="<?php if ( $careers_message['image'] ) { echo 'col-lg-8'; } else { echo 'col-lg-12 fluid'; }; ?>">
	                    <div class="founders__content">
	                    	<?php
	                    		if ( $careers_message['title'] ) 
	                    		{
	                    			printf( '<h2 class="title">%s</h2>', $careers_message['title'] );
	                    		}

	                    		if ( $careers_message['quote'] ) 
	                    		{
	                    			printf( '<blockquote><h5>%s</h5></blockquote>', $careers_message['quote'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	                <?php endif ?>
	            </div>
	        </div>
	    </section><!-- /founders -->
	    <?php endif;

	    $careers_opportunities = get_field( 'careers_opportunities' ); if ( !empty( $careers_opportunities ) && array_filter( $careers_opportunities ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <div id="opportunities" class="current-openings">
	        <div class="container">
	        	<?php if ( $careers_opportunities['title'] || $careers_opportunities['description'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="current-openings__content">
	                    	<?php
	                    		if ( $careers_opportunities['title'] ) 
	                    		{
	                    			printf( '<h2 class="title">%s</h2>', $careers_opportunities['title'] );
	                    		}

	                    		if ( $careers_opportunities['description'] ) 
	                    		{
	                    			printf( '%s', $careers_opportunities['description'] );
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	            <?php endif;

	            if ( $careers_opportunities['jobs_group'] ): ?>
	            <div class="row">
	                <div class="col-12">
	                	<?php
	                		foreach ( $careers_opportunities['jobs_group'] as $group ) 
	                		{
	                			echo '<div class="job__item">';

	                				if ( $group['name'] ) 
	                				{
	                					printf( '<h4 class="title">%s</h4>', $group['name'] );
	                				}

	                				if ( $group['jobs'] ) 
	                				{
	                					foreach ( $group['jobs'] as $job ) 
	                					{
	                						$link = $job['link'] ? 'href="'.esc_url( $job['link']['url'] ).'" target="'.$job['link']['target'].'"' : '';

	                						echo '<a '.$link.' class="job__item-card d-flex align-items-sm-center justify-content-between">';

		                						if ( $job['category'] || $job['title'] || $job['location'] ) 
		                						{
		                							echo '<div class="job__item-card-text">';

		                								if ( $job['category'] ) 
		                								{
		                									printf( '<h6 class="sub-title color-secondary">%s</h6>', $job['category'] );
		                								}

		                								if ( $job['title'] ) 
		                								{
		                									printf( '<h4 class="title">%s</h4>', $job['title'] );
		                								}

		                								if ( $job['location'] ) 
		                								{
		                									printf( '<h6 class="position color-black">%s</h6>', $job['location'] );
		                								}
		                							echo '</div>';
		                						}

	                							if ( $job['link'] ) 
	                							{
	                								printf( '<div class="job__item-card-button">
						                                <span class="btn">%s</span>
						                            </div>', $job['link']['title'] );
	                							}
	                						echo '</a>';
	                					}
	                				}
	                			echo '</div>';
	                		}
	                	?>
	                </div>
	            </div>
	            <?php endif; ?>
	        </div>
	    </div><!-- /current-openings -->
	    <?php endif;

	    $careers_contact = get_field( 'careers_contact' ); if ( !empty( $careers_contact ) && array_filter( $careers_contact ) ): ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <section class="chat">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact">
	                    	<?php
	                    		if ( $careers_contact['title'] || $careers_contact['description'] ) 
	                    		{
	                    			echo '<div class="contact__text text-center">';

	                    				if ( $careers_contact['title'] ) 
	                    				{
	                    					printf( '<h3 class="title">%s</h3>', $careers_contact['title'] );
	                    				}

	                    				if ( $careers_contact['description'] ) 
	                    				{
	                    					printf( '<div class="description">%s</div>', $careers_contact['description'] );
	                    				}

	                    			echo '</div>';
	                    		}

	                    		if ( $careers_contact['form_type'] ) 
	                    		{
									echo '<div class="contact__form">';

		                    		if ( $careers_contact['form_type'] == 'embed' && $careers_contact['embed_code'] ) 
		                    		{
		                    			printf('<div class="embed_code">%s</div>', $careers_contact['embed_code']);
		                    		}
		                    		elseif( $careers_contact['form_type'] == 'form' && $careers_contact['select_form'] )
		                    		{
		                    			echo do_shortcode('[gravityform id="'. $careers_contact['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
		                    		} 

	                    			echo '</div>';
	                    		}
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /chat -->
	    <?php endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>