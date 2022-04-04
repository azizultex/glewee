<div class="col-xl-3">
    <aside class="sidebar" data-sticky_column> 
        <?php 
            // Start Tags Widget
            $current_cat = get_queried_object_id();

            $categories = get_tags( array(
                'order'   => 'ASC',
                'orderby' => 'name', 
                'taxonomy' => 'category',
            ));

            if ( $categories ) 
            {
                $all_active = !is_category() ? ' class="active"' : '';

                echo '<div class="widget">';
                    printf( '<h5 class="widget-title text-capitalize">%s</h5>', 'Categories' );

                    echo '<ul class="categories list-unstyled">';
                        echo '<li'.$all_active.'><a href="'.esc_url( get_permalink( get_option( 'page_for_posts' ) ) ).'">All Articles <i class="icon-arrow-right-1"></i></a></li>';

                        foreach ( $categories as $cat ) 
                        {
                            $active = $current_cat == $cat->term_id ? ' class="active"' : '';

                            printf( '<li%s><a href="%s">%s</a></li>', $active, esc_url( get_category_link( $cat ) ), $cat->name  );
                        }

                    echo '</ul>';
                echo '</div>';
            } 
        ?>

        <div class="widget widget__recommended">
            <h5 class="widget-title text-capitalize">Recommended Reading</h5>

            <div class="row mb-30">
                <div class="col-xl-12 col-md-4 col-sm-6">
                    <article class="blog-post d-flex flex-column blog-post-sm">
                        <div class="media float-left">
                            <a href="blog-details.html">
                                <img src="<?php echo get_theme_file_uri(); ?>/images/recommended-post-1.jpg" class="img-fluid" alt="">
                            </a> 
                        </div>

                        <div class="text">
                            <a href="#" class="date">NOVEMBER 19, 2021</a>
                            <a href="#"><h5 class="title">The Best Branded Twitter Moments from Instagram’s Day Offline</h5></a>
                        </div>
                    </article>
                </div> 

                <div class="col-xl-12 col-md-4 col-sm-6">
                    <article class="blog-post d-flex flex-column blog-post-sm">
                        <div class="media float-left">
                            <a href="blog-details.html">
                                <img src="<?php echo get_theme_file_uri(); ?>/images/recommended-post-1.jpg" class="img-fluid" alt="">
                            </a> 
                        </div>

                        <div class="text">
                            <a href="#" class="date">NOVEMBER 19, 2021</a>
                            <a href="#"><h5 class="title">The Best Branded Twitter Moments from Instagram’s Day Offline</h5></a>
                        </div>
                    </article>
                </div> 

                <div class="col-xl-12 col-md-4 col-sm-6">
                    <article class="blog-post d-flex flex-column blog-post-sm">
                        <div class="media float-left">
                            <a href="blog-details.html">
                                <img src="<?php echo get_theme_file_uri(); ?>/images/recommended-post-1.jpg" class="img-fluid" alt="">
                            </a> 
                        </div>

                        <div class="text">
                            <a href="#" class="date">NOVEMBER 19, 2021</a>
                            <a href="#"><h5 class="title">The Best Branded Twitter Moments from Instagram’s Day Offline</h5></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <div class="widget">
            <h5 class="widget-title text-capitalize">Try these!</h5>

            <div class="row mb-30">
                <div class="col-xl-12 col-sm-6">
                    <a href="brands.html" class="footer__item" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">
                        <div class="footer__item-media">
                            <img src="<?php echo get_theme_file_uri(); ?>/images/for-brands.png" class="img-fluid" alt="">
                        </div>
                        <div class="footer__item-text entry-title">
                            <h6 class="sub-title secondary">Glewee</h6>
                            <h5 class="title">For Brands</h5>
                        </div>
                    </a> 
                </div>

                <div class="col-xl-12 col-sm-6">
                    <a href="creators.html" class="footer__item small" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">
                        <div class="footer__item-media">
                            <img src="<?php echo get_theme_file_uri(); ?>/images/for-creators.png" class="img-fluid" alt="">
                        </div>
                        <div class="footer__item-text entry-title">
                            <h6 class="sub-title secondary">Glewee</h6>
                            <h5 class="title">For Creators</h5>
                        </div>
                    </a>
                </div>

                <div class="col-xl-12 col-sm-6">
                    <a href="#" class="footer__item footer__item-demo" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">
                        <div class="footer__item-media">
                            <img src="<?php echo get_theme_file_uri(); ?>/images/call-action.png" class="img-fluid" alt="">
                        </div>
                        <div class="footer__item-text entry-title">
                            <h6 class="title secondary">Request a Demo</h6>
                            <p>Book a live demo and unlock Creator Marketing today.</p>
                            <span class="link"><i class="icon-arrow-right-1"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </aside>
</div>