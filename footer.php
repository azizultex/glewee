    <footer class="footer">
        <div class="container"> 
            <div class="row">
                <div class="col-xl-2 col-lg-12 col-md-4">
                    <div class="footer__logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        	<?php
	                            $footer_logo = get_field( 'footer_logo', 'options' );

	                            if ( $footer_logo ) 
	                            {
	                                printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $footer_logo['url'] ), $footer_logo['alt'] );
	                            }
	                            else
	                            {
	                                printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/footer-logo.svg' ) ), get_bloginfo( 'name' ) );
	                            }
	                        ?>
                        </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 col-md-8"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="footer__widget">
                                <?php
                                    wp_nav_menu( array(
                                        'menu'               => 'Footer Menu 1',
                                        'theme_location'     => 'menu-3',
                                        'depth'              => 1,
                                        'container'          => false,
                                        'menu_class'         => 'footer__widget-menu list-unstyled text-capitalize',
                                        'menu_id'            => '',
                                        'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                        'walker'             => new wp_bootstrap_navwalker(),
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="footer__widget">
                                <?php
                                    wp_nav_menu( array(
                                        'menu'               => 'Footer Menu 2',
                                        'theme_location'     => 'menu-4',
                                        'depth'              => 1,
                                        'container'          => false,
                                        'menu_class'         => 'footer__widget-menu list-unstyled text-capitalize',
                                        'menu_id'            => '',
                                        'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                        'walker'             => new wp_bootstrap_navwalker(),
                                    ));
                                ?>
                            </div>
                        </div>
                    </div> 
                </div> 

                <?php $action_box = get_field( 'footer_action_box', 'options' ); if ( $action_box ): ?>
                <div class="col-xl-6 col-lg-7">
                    <div class="row mb-30">
                        <?php
                            foreach ( $action_box as $key => $box ) 
                            {
                                $style = $key % 2 ? ' small' : '';
                                $column = count( $action_box ) > 1 ? 'col-sm-6' : 'col-sm-12';
                                $link = $box['link'] ? 'href="'.esc_url( $box['link']['url'] ).'" target="'.$box['link']['target'].'"' : '';

                                echo '<div class="'.$column.'">';
                                    echo '<a '.$link.' class="footer__item'.$style.'">';

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
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>  

            <div class="row">
                <div class="offset-xl-2 col-xl-10"> 
                    <div class="footer-bottom d-flex align-items-center justify-content-between flex-wrap flex-sm-row flex-column">
                        <?php
                            $apps_store = get_field( 'apps_store', 'options' );
                            $social_media = get_field( 'social_media', 'options' );

                            if ( $social_media['social'] ) 
                            {
                                echo '<div class="footer-bottom__btn-group">';

                                    foreach ( $social_media['social'] as $social ) 
                                    {
                                        printf( '<a href="%s" class="btn follow background-%s" targe="_blank">
                                            <div class="icon float-left">
                                                <i class="%s"></i>
                                            </div>
                                            <div class="text">
                                                <span class="sub-title">%s</span>
                                                <span class="title">%s</span>
                                            </div>
                                        </a>', esc_url( $social['url'] ), $social['icon']['value'], $social['icon']['value'], $social['label'], $social['icon']['label']  );
                                    }

                                echo '</div>';
                            }

                            if ( !$apps_store['apple_store'] || $apps_store['google_play'] ) 
                            {
                                echo '<div class="footer-bottom__btn-group">';

                                    if ( $apps_store['apple_store'] ) 
                                    {
                                        $as_logo_alt = $apps_store['apple_store_logo'] ? $apps_store['apple_store_logo']['alt'] : 'Apple Store';
                                        $as_logo_url = $apps_store['apple_store_logo'] ? $apps_store['apple_store_logo']['url'] : get_theme_file_uri( 'images/app-store.png' );

                                        printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="%s"></a>', esc_url( $apps_store['apple_store'] ), esc_url( $as_logo_url ), $as_logo_alt );
                                    }

                                    if ( $apps_store['google_play'] ) 
                                    {
                                        $gp_logo_alt = $apps_store['google_play_logo'] ? $apps_store['google_play_logo']['alt'] : 'Google Play';
                                        $gp_logo_url = $apps_store['google_play_logo'] ? $apps_store['google_play_logo']['url'] : get_theme_file_uri( 'images/google-play.png' );

                                        printf( '<a href="%s" class="btn bg-white" target="_blank"><img src="%s" class="img-fluid" alt="%s"></a>', esc_url( $apps_store['google_play'] ), esc_url( $gp_logo_url ), $gp_logo_alt );
                                    }

                                echo '</div>';
                            }

                            echo '<div class="footer-bottom__privacy">';

                                wp_nav_menu( array(
                                    'menu'               => 'Privacy Menu',
                                    'theme_location'     => 'menu-5',
                                    'depth'              => 1,
                                    'container'          => false,
                                    'menu_class'         => 'footer-bottom__privacy-menu list-unstyled d-flex last_no_bullet',
                                    'menu_id'            => '',
                                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                    'walker'             => new wp_bootstrap_navwalker(),
                                ));

                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- /footer -->
    <?php wp_footer(); ?>
</body>
</html>