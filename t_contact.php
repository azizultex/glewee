<?php
/*
Template Name: Contact Us
*/
get_header( '', array( 'transparent' => true ) ); ?>
	
	<div id="primary" class="content-area">
	    <div class="overlay"></div>
	    
	    <section class="contact-us">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact-us__content">
	                        <h1 class="title lg">Contact Us</h1>
	                        <h4 class="sub-title">Get in touch. We’re excited to connect with you.</h4>
	                        <div class="description">
	                            <p>Reach out with application inquiries, special interests, and any other ideas you might have in mind</p>
	                        </div>
	                    </div> 
	                </div>
	            </div>

	            <div class="row mb-30 js-masonry" data-masonry-options='{ "itemSelector": ".item", "columnWidth": ".column" }'>
	                <div class="col-lg-4 item">
	                    <a href="#" class="contact-us__item big">
	                        <div class="contact-us__item-icon">
	                            <img src="<?php echo get_theme_file_uri(); ?>/images/message-pen.png" class="img-fluid" alt="">
	                        </div>
	                        <div class="contact-us__item-text">
	                            <h3 class="title">Send us <br>a Messages</h3>
	                            <h6 class="sub-title color-secondary">Complete the form below</h6>
	                            <div class="read-more">
	                                <i class="icon-arrow-down"></i>
	                            </div>
	                        </div>
	                    </a> 
	                </div>

	                <div class="col-lg-4 item">
	                     <a href="#" class="contact-us__item">
	                        <div class="contact-us__item-text">
	                            <h4 class="title">Join as a Brand</h4>
	                            <h6 class="sub-title color-secondary">Begin application</h6>
	                            <div class="read-more">
	                                <i class="icon-arrow-right"></i>
	                            </div>
	                        </div>
	                    </a>
	                </div> 

	                <div class="col-lg-4 item">
	                     <a href="#" class="contact-us__item">
	                        <div class="contact-us__item-text">
	                            <h4 class="title">Join as a Creator</h4>
	                            <h6 class="sub-title color-secondary">Begin application</h6>
	                            <div class="read-more">
	                                <i class="icon-arrow-right"></i>
	                            </div>
	                        </div>
	                    </a>
	                </div> 

	                <div class="col-lg-4 item">
	                     <a href="#" class="contact-us__item">
	                        <div class="contact-us__item-text">
	                            <h4 class="title">View our FAQs</h4>
	                            <h6 class="sub-title color-secondary">Frequently Asked Questions</h6>
	                            <div class="read-more">
	                                <i class="icon-arrow-right"></i>
	                            </div>
	                        </div>
	                    </a>
	                </div> 

	                <div class="col-lg-4 item">
	                     <a href="#" class="contact-us__item">
	                        <div class="contact-us__item-text">
	                            <h4 class="title">Career Opportunities</h4>
	                            <h6 class="sub-title color-secondary">View current positions</h6>
	                            <div class="read-more">
	                                <i class="icon-arrow-right"></i>
	                            </div>
	                        </div>
	                    </a>
	                </div> 

	                <div class="col-lg-4 column"></div>
	            </div>
	        </div>
	    </section><!-- /contact-us -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <section class="look-forward">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="contact">
	                        <div class="contact__text text-center">
	                            <h3 class="title">We look forward to hearing from you.</h3>
	                            <div class="description">
	                                <p>Fill out the form below and we will respond within 1 business day.</p>
	                            </div>
	                        </div>

	                        <div class="contact__form">
	                            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" tabindex="10" ajax="true"]'); ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /look-forward -->

	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <hr>
	            </div>
	        </div>
	    </div>

	    <section class="follow-us-share">
	        <div class="container">
	            <div class="row mb-30">
	                <div class="col-lg-6">
	                    <div class="follow-us-share__content d-flex justify-content-between flex-column">
	                        <div class="text">
	                            <h2 class="title">Follow us</h2>
	                            <div class="description">
	                                <p>Subtext goes here for this section</p>
	                            </div>
	                        </div>

	                        <div class="follow-us-share__content-btn-group">
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
	                    </div>
	                </div>

	                <div class="col-lg-6">
	                    <div class="follow-us-share__content entry-title d-flex justify-content-between flex-column">
	                        <div class="text">
	                            <h3 class="title">Get the App</h3>
	                            <p>Subtext goes here for this section</p>
	                        </div>
	                        
	                        <div class="follow-us-share__content-btn-group get-app">
	                            <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/app-store-white.png" class="img-fluid" alt=""></a>
	                            <a href="#" class="btn bg-white"><img src="<?php echo get_theme_file_uri(); ?>/images/google-play-white.png" class="img-fluid" alt=""></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section><!-- /follow-us-share -->

	</div><!-- /content-area -->

<?php get_footer(); ?>