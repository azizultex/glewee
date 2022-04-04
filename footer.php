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

                <div class="col-xl-6 col-lg-7">
                    <div class="row mb-30">
                        <div class="col-sm-6">
                            <a href="brands.html" class="footer__item">
                                <div class="footer__item-media">
                                    <img src="<?php echo get_theme_file_uri(); ?>/images/for-brands.png" class="img-fluid" alt="">
                                </div>
                                <div class="footer__item-text entry-title">
                                    <h6 class="sub-title secondary">Glewee</h6>
                                    <h5 class="title">For Brands</h5>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6">
                            <a href="creators.html" class="footer__item small">
                                <div class="footer__item-media">
                                    <img src="<?php echo get_theme_file_uri(); ?>/images/for-creators.png" class="img-fluid" alt="">
                                </div>
                                <div class="footer__item-text entry-title">
                                    <h6 class="sub-title secondary">Glewee</h6>
                                    <h5 class="title">For Creators</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="row">
                <div class="offset-xl-2 col-xl-10"> 
                    <div class="footer-bottom d-flex align-items-center justify-content-between flex-wrap flex-sm-row flex-column">
                        <div class="footer-bottom__btn-group">
                            <a href="#" class="btn follow" style="background: #7558F2;">
                                <div class="icon float-left">
                                    <i class="icon-instagram"></i>
                                </div>
                                <div class="text">
                                    <span class="sub-title">Follow us on</span>
                                    <span class="title">Instagram</span>
                                </div>
                            </a>

                            <a href="#" class="btn follow" style="background: #286290;">
                                <div class="icon float-left">
                                    <i class="icon-linkedin-in"></i>
                                </div>
                                <div class="text">
                                    <span class="sub-title">Follow us on</span>
                                    <span class="title">LinkedIn</span>
                                </div>
                            </a>
                        </div>

                        <div class="footer-bottom__btn-group">
                            <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/app-store.png" class="img-fluid" alt=""></a>
                            <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/google-play.png" class="img-fluid" alt=""></a>
                        </div>

                        <div class="footer-bottom__privacy">
                            <?php
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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- /footer -->
    <?php wp_footer(); ?>
</body>
</html>