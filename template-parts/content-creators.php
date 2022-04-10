<?php
$class = $args['class'];

if ( $args['type'] == 'custom' ) 
{
    $trusted_creators = get_field( 'trusted_creators', $args['id'] );
}
else 
{
    $trusted_creators = get_field( 'trusted_creators', 'options' );
}

$creators_link = get_field( 'trusted_creators_link' );

if ( $trusted_creators['title'] || $trusted_creators['description'] || $trusted_creators['creators'] ): ?>
<section class="<?php echo $class; ?>">
	<?php if ( $trusted_creators['title'] || $trusted_creators['description'] ): ?>
    <div class="container">
        <div class="row">
            <div class="col-12"> 
                <div class="trusted-brands__content text-center">
                	<?php
                		if ( $trusted_creators['title'] ) 
                		{
                			printf( '<h2 class="title">%s</h2>', $trusted_creators['title'] );
                		}

                		if ( $trusted_creators['description'] )
                		{
                			printf( '<div class="description">%s</div>', $trusted_creators['description'] );
                		}
                	?>
                </div>
            </div>
        </div> 
    </div>
    <?php endif;

    if ( $trusted_creators['creators'] ): ?>
    <div class="container-fluid pl-0 pr-0">
        <div class="row">
            <div class="col-12">
                <div class="trusted-brands-slider-wrapper"> 
                	<?php foreach ( $trusted_creators['creators'] as $creator ): $link = $creator['link'] ? 'href="'.$creator['link']['url'].'" target="'.$creator['link']['target'].'"' : ''; ?>
                    <div class="slider-item">
                        <a <?php echo $link; ?> class="trusted-brands__item text">
                        	<?php
                        		if ( $creator['image'] ) 
                        		{
                        			printf( '<div class="trusted-brands__item-media">
                                        <img src="%s" class="img-fluid" alt="%s">
                                    </div>', esc_url( $creator['image']['url'] ), $creator['image']['alt'] );
                        		}

                        		if ( $creator['name'] ) 
                        		{
                        			printf( '<div class="trusted-brands__item-client-logo">
                                        <h6 class="title">@%s</h6>
                                    </div>', $creator['name'] );
                        		}
                        	?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;

    if ( $creators_link ): ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="join-creators text-center">
                	<?php printf( '<a href="%s" class="title h5" target="%s">%s <i class="icon-arrow-right"></i></a>', esc_url( $creators_link['url'] ), $creators_link['target'], htmlspecialchars_decode( $creators_link['title'] ) ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section><!-- /trusted-brands -->
<?php endif; ?>