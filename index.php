<?php 
get_header(); 

$latest_news = get_field( 'latest_news', get_option('page_for_posts') ); ?>

	<div id="primary" class="content-area"> 

	    <div class="blog-page-wraper">
	        <div class="container"> 
	            <div class="blog-page-wraper__overly">
	                <img src="<?php echo get_theme_file_uri( 'images/blog-page-ball-all.png' ); ?>" alt="Blog">
	            </div> 
	        </div>

	        <section class="featured-blog-posts<?php if ( $latest_news['disable_latest_news'] ) echo ' pb-0'; ?>">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12">
	                    	<?php
	                    		echo '<div class="entry-title">';

	                    			if ( $latest_news['title'] ) 
	                    			{
	                    				printf( '<h1 class="title lg">%s</h1>', $latest_news['title'] );
	                    			}
	                    			else
	                    			{
	                    				printf( '<h1 class="title lg">%s</h1>', get_the_title( get_option('page_for_posts') ) );
	                    			}

	                    			if ( $latest_news['description'] ) 
	                    			{
	                    				printf( '<div class="description lg">%s</div>', $latest_news['description'] );
	                    			}

	                    		echo '</div>';

                    			$args = array(
                    				'post_type' => 'post',
                    				'posts_per_page' => 1,
                    			);

                    			$latest_posts_query = new WP_Query( $args );

                    			if ( !$latest_news['disable_latest_news'] && $latest_posts_query->have_posts() ):
	                    			
	                    			while ( $latest_posts_query->have_posts() ): $latest_posts_query->the_post();
	                    				
	                    				get_template_part( 'template-parts/content', 'post', array( 'latest' => true ) );

	                    			endwhile;

	                    		endif;
	                    	?>
	                    </div>
	                </div>
	            </div>
	        </section><!-- /featured-blog-posts -->
	        
	        <?php $recommended_reading = get_field( 'recommended_reading', get_option('page_for_posts') ); if ( !empty( $recommended_reading ) && array_filter( $recommended_reading ) ): ?>
	        <section class="recommended-blog-posts pt-0">
	            <div class="container">
	            	<?php if ( $recommended_reading['title'] || $recommended_reading['description'] ): ?>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="entry-title"> 
	                        	<?php
	                        		if ( $recommended_reading['title'] ) 
	                        		{
	                        			printf( '<h2 class="title">%s</h2>', $recommended_reading['title'] );
	                        		}

	                        		if ( $recommended_reading['description'] ) 
	                        		{
	                        			printf( '%s', $recommended_reading['description'] );
	                        		}
	                        	?>
	                        </div>
	                    </div>
	                </div>
	                <?php endif;

	                if ( $recommended_reading['type'] == 'custom' ) 
	                {
	                	$left_args = array(
	                		'post_type' => 'post',
	                		'posts_per_page' => 2,
	                		'orderby' => 'post__in',
	                		'post__in' => $recommended_reading['select_posts'],
	                	);

	                	$right_args = array(
	                		'post_type' => 'post',
	                		'posts_per_page' => 5,
	                		'orderby' => 'post__in',
	                		'post__in' => $recommended_reading['select_posts'],
	                	);
	                }
	                elseif ( $recommended_reading['type'] == 'featured' ) 
	                {
	                	$left_args = array(
	                		'post_type' => 'post',
	                		'meta_value' => 'yes',
	                		'posts_per_page' => 2,
	                		'meta_key' => '_is_ns_featured_post', 
	                	);

	                	$right_args = array(
	                		'offset' => 1,
	                		'post_type' => 'post',
	                		'meta_value' => 'yes',
	                		'posts_per_page' => 5,
	                		'meta_key' => '_is_ns_featured_post', 
	                	);
	                }
	                else
	                {
	                	$left_args = array(
	                		'posts_per_page' => 2,
	                		'meta_key' => 'my_post_viewed',
	                		'orderby' => 'meta_value_num',
	                	);

	                	$right_args = array(
	                		'posts_per_page' => 5,
	                		'meta_key' => 'my_post_viewed',
	                		'orderby' => 'meta_value_num',
	                	);
	                }

	                $counter = 1;
	                $recommended_left_posts_query = new WP_Query( $left_args );
	                $recommended_right_posts_query = new WP_Query( $right_args );

	                if ( $recommended_left_posts_query->have_posts() || $recommended_right_posts_query->have_posts() ): ?>
	                <div class="row mb-30">
	                	<?php if ( $recommended_left_posts_query->have_posts() ): ?>
	                    <div class="col-xl-6">
	                        <div class="row">
	                        	<?php
	                        		while ( $recommended_left_posts_query->have_posts() ): $recommended_left_posts_query->the_post();
	                        			echo '<div class="col-xl-12">';

	                        				get_template_part( 'template-parts/content', 'post' );

	                        			echo '</div>';
	                        		endwhile;
	                        	?>
	                        </div>
	                    </div>
	                	<?php endif; 

	                	if ( $recommended_right_posts_query->have_posts() ): ?>
	                    <div class="col-xl-6">
	                        <div class="row">
	                        	<?php
	                        		while ( $recommended_right_posts_query->have_posts() ): $recommended_right_posts_query->the_post();
	                        			if ( $counter !== 1 && $counter !== 2 ) 
	                        			{
		                        			echo '<div class="col-xl-12 col-lg-6">';

		                        				get_template_part( 'template-parts/content', 'post', array( 'recommended' => true ) );

		                        			echo '</div>';
	                        			}

	                        			$counter++;
	                        		endwhile;
	                        	?> 
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div>
	                <?php endif; ?>
	            </div>
	        </section><!-- /recommended-blog-posts -->

	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <hr>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>

	        <section class="search-bar">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12">
	                       <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-bar__form" method="get">
	                            <div class="form-group">
	                                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search the Blog">
	                                <button type="submit"><i class="icon-search"></i></button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </section>

	        <section class="blog-page pt-0">
	            <div class="container">
	                <div class="row" data-sticky_parent>
	                    <div class="col-xl-9" data-sticky_column>
	                        <main class="main-content">
	                            <h5 class="main-title">All Posts</h5>

	                            <?php
	                            	if ( have_posts() ): 
	                            		while ( have_posts() ): the_post(); 

	                            			get_template_part( 'template-parts/content', 'post' ); 
	                            		
	                            		endwhile;
	                            	endif;

	                            	if ( get_previous_posts_link() || get_next_posts_link() ): ?>
	                            	<div class="pagination">
	                            	    <div class="float-left">
	                            	    	<?php 
	                            	    		if ( get_previous_posts_link() ) 
	                            	    		{
	                            	    			previous_posts_link('<i class="icon-arrow-left"></i> Previous Posts');
	                            	    		}
	                            	    	?>
	                            	    </div>

	                            	    <div class="float-right">
	                            	    	<?php 
	                            	    		if ( get_next_posts_link() ) 
	                            	    		{
	                            	    			next_posts_link('Next Posts<i class="icon-arrow-right"></i>');
	                            	    		}
	                            	    	?>
	                            	    </div>
	                            	</div>
	                            <?php endif; ?>
	                        </main>
	                    </div>

	                    <?php get_sidebar(); ?>
	                </div>
	            </div>
	        </section> <!-- /blog-page -->
	    </div> 

	</div><!-- /content-area -->

<?php get_footer(); ?>