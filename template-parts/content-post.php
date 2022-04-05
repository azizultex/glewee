<?php
$categories = get_the_category( get_the_ID() );

$cpost_link = get_field( 'custom_link' );
$cpost_link_target = $cpost_link['type'] == 'external' && !$cpost_link['target'] ? '_blank' : '_self';
$cpost_link_url = $cpost_link['type'] == 'internal' && !empty( $cpost_link['internal_url'] ) ? $cpost_link['internal_url'] : ( $cpost_link['type'] == 'external' && !empty( $cpost_link['external_url'] ) ? $cpost_link['external_url'] : get_the_permalink() );	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post d-flex align-items-center' ); ?>>
	<?php
		echo '<div class="media float-left">';
			echo '<a href="'.esc_url( $cpost_link_url ).'" target="'.$cpost_link_target.'">';

				if ( has_post_thumbnail() ) 
				{
					the_post_thumbnail( 'post_thumb', array( 'class' => 'img-fluid' ) );
				}
				else
				{
					printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/placeholder-post-thumb.jpg' ) ), get_the_title() );
				}

			echo '</a>';

			if ( $categories ) 
			{
				echo '<ul class="categories list-inline">';

					foreach ( $categories as $cat ) 
					{
						printf( '<li><a href="%s">%s</a></li>', esc_url( get_category_link( $cat ) ), $cat->name );

						break;
					}

				echo '</ul>';
			}

		echo '</div>';

		echo '<div class="text">';
			echo '<a href="'.esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ).'" class="date text-uppercase">'.get_the_date('F j, Y').'</a>';

			echo '<a href="'.esc_url( $cpost_link_url ).'" target="'.$cpost_link_target.'">';

				the_title( '<h4 class="title">', '</h4>' );

			echo '</a>';

			if ( has_excerpt() ) 
			{
				echo '<div class="excerpt">';

					the_excerpt();

				echo '</div>';
			}
		echo '</div>';
	?>
</article>