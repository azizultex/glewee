<?php get_header(); ?>

	<div id="primary" class="content-area"> 

	    <div class="blog-page-wraper">

	        <section class="featured-blog-posts pb-5">
	            <div class="container">
	                <div class="row">
	                    <div class="col-12">
	                    	<div class="entry-title mb-0">
	                    		<h1 class="title">Search Results for: <span style="color: #7D8FFA"><?php echo get_search_query(); ?></span></h1>
	                    	</div>
	                    </div>
	                </div>
	            </div>
	        </section><!-- /featured-blog-posts -->

	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <hr>
	                </div>
	            </div>
	        </div>

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