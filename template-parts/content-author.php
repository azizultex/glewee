<?php

$author = $args['author_id'];
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $author ), 'thumbnail' );
$content = get_field( 'content', $author );

echo '<li class="d-flex align-items-center">';

	echo '<div class="media float-left">';
		echo '<a href="'.esc_url( get_the_permalink( $author ) ).'">';

			if ( has_post_thumbnail( $author ) ) 
			{
				printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $featured_image[0] ), get_the_title( $author ) );
			}
			else
			{
				printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/placeholder-author.jpg' ) ), get_the_title( $author ) );
			}

		echo '</a>';
	echo '</div>';

	echo '<div class="text">';

		printf( '<a href="%s"><h6 class="name">%s</h6></a>', esc_url( get_the_permalink( $author ) ), get_the_title( $author ) );
        $social_media = $content['social_media'];

        if ( $social_media ) 
        {   
            echo '<ul class="social-media list-inline d-flex">';

                foreach ( $social_media as $social ) 
                {
                    printf( '<li><a href="%s" class="%s" target="_blank"></a></li>', esc_url( $social['url'] ), $social['icon'] );
                }

            echo '</ul>';
        }

	echo '</div>';
echo '</li>';

