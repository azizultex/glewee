<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
    <?php $favicon = get_field( 'favicon', 'options' ); if ($favicon && isset($favicon)): ?>
    <link rel="icon" type="image/png" href="<?php echo $favicon['url']; ?>" sizes="32x32">
    <?php else: ?>
    <link rel="icon" type="image/png" href="<?= get_theme_file_uri(); ?>/images/icon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= get_theme_file_uri(); ?>/images/icon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" sizes="192x192" href="<?= get_theme_file_uri(); ?>/images/icon/touch-icon-192x192.png">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-180x180-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-152x152-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-120x120-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-76x76-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= get_theme_file_uri(); ?>/images/icon/apple-touch-icon-precomposed.png">
    <?php endif;
    wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>
    <div id="sidr">
        <div class="mobile-header d-none">
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                            $logo = get_field( 'logo', 'options' );

                            if ( $logo ) 
                            {
                                printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo['url'] ), $logo['alt'] );
                            }
                            else
                            {
                                printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/logo.svg' ) ), get_bloginfo( 'name' ) );
                            }
                        ?>
                    </a>
                </div>

                <button class="navbar-toggle in" type="button">
                    <span class="icon-bar"><span class="inner"></span></span>
                    <span class="icon-bar"><span class="inner"></span></span>
                    <span class="icon-bar"><span class="inner"></span></span>
                </button>
            </div>

            <div class="navigation">
                <?php
                    wp_nav_menu( array(
                        'menu'               => 'Secondary Menu',
                        'theme_location'     => 'menu-2',
                        'depth'              => 1,
                        'container'          => false,
                        'menu_class'         => 'navbar-nav',
                        'menu_id'            => '',
                        'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                        'walker'             => new wp_bootstrap_navwalker(),
                    ));
                ?>

                <ul class="navbar-nav">
                    <?php
                        $buttons = get_field( 'buttons', 'options' );

                        if ( $buttons ) 
                        { 
                            foreach ( $buttons as $key => $button ) 
                            {
                                $style = $key % 2 ? ' border-pink' : ' border-green';

                                printf( '<li class="btn-menu%s"><a href="%s" target="%s">%s</a></li>', $style, esc_url( $button['button']['url'] ), $button['button']['target'], $button['button']['title'] );
                            }                                
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div><!-- /mobile-header -->
    
    <header class="header<?php if ( $args['transparent'] !== false ) echo ' transparent'; if ( $args['sticky'] ) echo ' sticky'; ?>">
        <nav class="navbar navbar-expand">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="navbar-header">
                    <div class="logo">
                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php
                                if ( $logo ) 
                                {
                                    printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo['url'] ), $logo['alt'] );
                                }
                                else
                                {
                                    printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/logo.svg' ) ), get_bloginfo( 'name' ) );
                                }
                            ?>
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse">
                    <?php
                        wp_nav_menu( array(
                            'menu'               => 'Primary Menu',
                            'theme_location'     => 'menu-1',
                            'depth'              => 1,
                            'container'          => false,
                            'menu_class'         => 'navbar-nav',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker(),
                        ));
                    ?>

                    <ul class="navbar-nav navbar-right">
                        <?php
                            if ( $buttons ) 
                            { 
                                foreach ( $buttons as $key => $button ) 
                                {
                                    $style = $key % 2 ? ' border-pink' : ' border-green';

                                    printf( '<li class="btn-menu%s"><a href="%s" target="%s">%s</a></li>', $style, esc_url( $button['button']['url'] ), $button['button']['target'], $button['button']['title'] );
                                }                                
                            }
                        ?> 
                        <li class="mobile-navbar-toggler">
                            <button class="navbar-toggle" type="button">
                                <span class="icon-bar"><span class="inner"></span></span>
                                <span class="icon-bar"><span class="inner"></span></span>
                                <span class="icon-bar"><span class="inner"></span></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- /nav -->
    </header><!-- /header -->
    <?php 
        if ( !is_front_page() && !is_home() && !is_page_template( 't_about.php' ) && !is_category() && !is_tag() && !is_search() ) 
        {
            echo '<div class="header-gutter"></div>';
        } 
    ?>