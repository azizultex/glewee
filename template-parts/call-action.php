<?php $call_action = get_field( 'call_action', 'options' ); if ( $call_action ): ?>
<section class="call-action">
    <div class="container">
        <div class="row mb-30">
            <?php foreach ( $call_action as $key => $action ): $class = $key % 2 ? ' left-image' : ''; ?>
            <div class="col-sm-6">
                <a <?php if ( $action['link'] ) echo 'href="'.$action['link']['url'].'" target="'.$action['link']['target'].'"'; ?> class="call-action__item d-flex flex-column justify-content-between<?php echo $class; ?>">
                    <?php
                        if ( $action['image'] ) 
                        {
                            printf( '<div class="call-action__item-media">
                                <img src="%s" class="img-fluid" alt="%s">
                            </div>', esc_url( $action['image']['url'] ), $action['image']['alt'] );
                        }

                        if ( $action['sub_title'] || $action['title'] || $action['link'] ) 
                        {
                            echo '<div class="call-action__item-text">';

                                if ( $action['sub_title'] ) 
                                {
                                    printf( '<h4 class="sub-title h1">%s</h4>', $action['sub_title'] );
                                }

                                if ( $action['title'] ) 
                                {
                                    printf( '<h2 class="title">%s</h2>', $action['title'] );
                                }

                                if ( $action['link'] ) 
                                {
                                    printf( '<h6 class="link">%s <i class="icon-arrow-right"></i></h6>', $action['link']['title'] );
                                }
                            echo '</div>';
                        }
                    ?>
                </a>
            </div><!-- /call-action__item -->
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- /call-action -->
<?php endif; ?>