<?php
$class = $args['class'];

if ( $args['type'] == 'custom' ) 
{
    $trusted_brands = get_field( 'trusted_brands', $args['id'] );
}
else 
{
    $trusted_brands = get_field( 'trusted_brands', 'options' );
}

if ( $trusted_brands['title'] || $trusted_brands['description'] || $trusted_brands['brands'] ): ?>
<section class="<?php echo $class; ?>">
    <?php if ( $trusted_brands['title'] || $trusted_brands['description'] ): ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trusted-brands__content text-center">
                    <?php
                        if ( $trusted_brands['title'] ) 
                        {
                            printf( '<h2 class="title">%s</h2>', $trusted_brands['title'] );
                        }

                        if ( $trusted_brands['description'] ) 
                        {
                            printf( '<div class="description">%s</div>', $trusted_brands['description'] );
                        }
                    ?>
                </div>
            </div>
        </div> 
    </div>
    <?php endif;

    if ( $trusted_brands['brands'] ): ?>
    <div class="container-fluid pl-0 pr-0">
        <div class="row">
            <div class="col-12">
                <div class="trusted-brands-slider-wrapper">
                    <?php 
                        foreach ( $trusted_brands['brands'] as $brand ) 
                        {
                            $link = $brand['link'] ? 'href="'.esc_url( $brand['link']['url'] ).'" target="'.$brand['link']['target'].'"' : '';

                            echo '<div class="slider-item">';
                                echo '<a '.$link.' class="trusted-brands__item">';
                                    if ( $brand['image'] ) 
                                    {
                                        printf( '<div class="trusted-brands__item-media">
                                            <img src="%s" class="img-fluid" alt="%s">
                                        </div>', esc_url( $brand['image']['url'] ), $brand['image']['alt'] );
                                    }

                                    if ( $brand['logo'] ) 
                                    {
                                        printf( '<div class="trusted-brands__item-client-logo">
                                            <img src="%s" class="img-fluid" alt="%s">
                                        </div>', esc_url( $brand['logo']['url'] ), $brand['logo']['alt'] );
                                    }
                                echo '</a>';
                            echo '</div>';
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section><!-- /trusted-brands -->
<?php endif; ?>