<?php get_header( '', array( 'transparent' => false, 'sticky' => true ) ); ?>
	
	<div id="primary" class="content-area"> 

	    <section class="blog-details-page">
	        <div class="container">
	            <div class="row" data-sticky_parent> 
	                <div class="col-xl-7 offset-xl-2 offset-lg-1" data-sticky_column>
	                    <main class="main-content">
	                    	<?php
	                    		echo '<div class="blog-post-top">';
	                    			echo '<a href="'.esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ).'" class="date text-uppercase">'.get_the_date('F j, Y').'</a>';

	                    			the_title( '<h1 class="title">', '</h1>' );
	                    		echo '</div>';

	                    		echo '<article class="blog-post">';

	                    			if ( has_post_thumbnail() ) 
	                    			{
	                    				echo '<div class="entry-media">';

	                    					the_post_thumbnail( 'post_large', array( 'class' => 'img-fluid' ) );

	                    				echo '</div> ';
	                    			}

                					if( '' !== get_post()->post_content )
                			        {
                			        	echo '<div class="entry-content">';

                			        		the_content();

                			        	echo '</div>';
                			        }

                			        echo '<hr>';

    						        $cta_switcher = get_field( 'bottom_cta_option' );
                                	$embed_source_code = get_field('embed_source_code');
                                	$cta_options = $cta_switcher == 'default' ? get_field( 'blog_cta_options', 'options' ) : get_field('cta_options');

    						        if ( $cta_switcher == 'cta_custom' || $cta_switcher == 'default' && !empty( $cta_options ) ) 
                                	{
                                		echo '<div class="entry-footer">';
                                			echo '<div class="entry-title">';

	                                			if ( $cta_options['title'] ) 
	                                			{
	                                				printf( '<h2 class="title">%s</h2>', $cta_options['title'] );
	                                			}

    	                                		if ( $cta_options['sub_title'] ) 
    	                                		{
    	                                			printf( '<h5 class="sub-title">%s</h5>', $cta_options['sub_title'] );
    	                                		}

    	                                		if ( $cta_options['description'] ) 
    	                                		{
    	                                			printf( '%s', $cta_options['description'] );
    	                                		}

    	                                		acfButton( $cta_options, 'secondary-btn' );

                                    		echo '</div>';

                                    		printf( '<div class="photo">
                                    			<img src="%s" alt="%s">
                                    		</div>', esc_url( get_theme_file_uri( 'images/blog-entry-footer.png' ) ), get_the_title() );
                                    		
                                		echo '</div>';
                                	}
                                	elseif ( $cta_switcher == 'embed' )
                                	{
                                		echo '<div class="blog-action embed mt-5">';

                                			printf('<div class="blog-post-ccta">%s</div>', $embed_source_code);

                                		echo '</div>';
                                	}

                                	echo '<div class="share-wrapper">';
                                	    echo '<div class="share" data-sticky_column>';
                                	        echo sharethis_inline_buttons();
                                	    echo '</div>';
                                	echo '</div>';

	                    		echo '</article>';
	                    	?>
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