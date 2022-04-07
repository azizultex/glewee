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
                $all_active = is_home() ? ' class="active"' : '';

                echo '<div class="widget">';
                    printf( '<h5 class="widget-title text-capitalize">%s</h5>', 'Categories' );

                    echo '<ul class="categories list-unstyled">';
                        echo '<li'.$all_active.'><a href="'.esc_url( get_permalink( get_option( 'page_for_posts' ) ) ).'">All Articles <i class="icon-arrow-right-1"></i></a></li>';

                        foreach ( $categories as $cat ) 
                        {
                            $active = $current_cat == $cat->term_id ? ' class="active"' : '';
                            $name = $cat->name == 'Brands' ? 'For Brands' : ( $cat->name == 'Creators' ? 'For Creators' : $cat->name );

                            printf( '<li%s><a href="%s">%s</a></li>', $active, esc_url( get_category_link( $cat ) ), $name );
                        }

                    echo '</ul>';
                echo '</div>';
            }

            // Start Recommended Widget
            $rc_args = array(
                'order'=> 'DESC',
                'posts_per_page' => 3,
                'meta_key' => 'my_post_viewed',
                'orderby' => 'meta_value_num',
            );

            $recommended_query = new WP_Query( $rc_args );

            if ( $recommended_query->have_posts() ):
                echo '<div class="widget widget__recommended">';
                    echo '<h4 class="widget-title">Recommended Reading</h4>';

                    echo '<div class="row mb-30">';

                        while ( $recommended_query->have_posts() ): $recommended_query->the_post(); 
                            echo '<div class="col-xl-12 col-md-4 col-sm-6">';

                                get_template_part( 'template-parts/content', 'post', array( 'sidebar_recommended' => true ) ); 
                            
                            echo '</div>';
                        endwhile;

                    echo '</div>';
                echo '</div>';
            endif; wp_reset_query();

            $action_box = get_field( 'footer_action_box', 'options' );
            $blog_call_action = get_field( 'blog_call_action', get_option('page_for_posts') );

            if ( !empty( $blog_call_action ) && array_filter( $blog_call_action ) || $action_box ) 
            {
                echo '<div class="widget">';
                    echo '<h5 class="widget-title text-capitalize">Try these!</h5>';

                    echo '<div class="row mb-30">';

                        foreach ( $action_box as $key => $box ) 
                        {
                            $style = $key % 2 ? ' small' : '';
                            $link = $box['link'] ? 'href="'.esc_url( $box['link']['url'] ).'" target="'.$box['link']['target'].'"' : '';

                            echo '<div class="col-xl-12 col-sm-6">';
                                echo '<a '.$link.' class="footer__item'.$style.'" style="background: linear-gradient(135deg, #fff7fc 0%, #edf0ff 49.75%, #f8feff 100%);">';

                                    if ( $box['image'] ) 
                                    {
                                        printf( '<div class="footer__item-media">
                                            <img src="%s" class="img-fluid" alt="%s">
                                        </div>', esc_url( $box['image']['url'] ), $box['image']['alt'] );
                                    }

                                    if ( $box['sub_title'] || $box['title'] ) 
                                    {
                                        echo '<div class="footer__item-text entry-title">';

                                            if ( $box['sub_title'] ) 
                                            {
                                                printf( '<h6 class="sub-title secondary">%s</h6>', $box['sub_title'] );
                                            }

                                            if ( $box['title'] ) 
                                            {
                                                printf( '<h5 class="title">%s</h5>', $box['title'] );
                                            }
                                        echo '</div>';
                                    }
                                echo '</a>';
                            echo '</div>';
                        }

                        if ( $blog_call_action['image'] || $blog_call_action['title'] || $blog_call_action['description'] ) 
                        {
                            $link = $blog_call_action['link'] ? 'href="'.esc_url( $blog_call_action['link']['url'] ).'" target="'.$blog_call_action['link']['target'].'"' : '';

                            echo '<div class="col-xl-12 col-sm-6">';
                                echo '<a '.$link.' class="footer__item footer__item-demo" style="background: linear-gradient(135deg, #ef66c5 0%, #364ddd 49.75%, #00bfe8 100%);">';

                                    if ( $blog_call_action['image'] ) 
                                    {
                                        printf( '<div class="footer__item-media">
                                            <img src="%s" class="img-fluid" alt="%s">
                                        </div>', esc_url( $blog_call_action['image']['url'] ), $blog_call_action['image']['alt'] );
                                    }

                                    if ( $blog_call_action['title'] || $blog_call_action['description'] ) 
                                    {
                                        echo '<div class="footer__item-text entry-title">';

                                            if ( $blog_call_action['title'] ) 
                                            {
                                                printf( '<h6 class="title secondary">%s</h6>', $blog_call_action['title'] );
                                            }

                                            if ( $blog_call_action['description'] ) 
                                            {
                                                printf( '%s', $blog_call_action['description'] );                                                
                                            }

                                            if ( $link ) 
                                            {
                                                echo '<span class="link"><i class="icon-arrow-right"></i></span>';
                                            }

                                        echo '</div>';
                                    }

                                echo '</a>';
                            echo '</div>';
                        }

                    echo '</div>';
                echo '</div>';
            }
        ?>
    </aside>
</div>