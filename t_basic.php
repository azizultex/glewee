<?php 
/*
Template Name: Basic Flex
*/
get_header(); 

	if ( post_password_required() ): 

		echo get_the_password_form();

	else: ?>

	<div id="primary" class="content-area">

		<?php if( !get_field( 'banner_disable' ) ): ?>

		<section class="first-section">
			<div class="container new pt-90">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<div class="entry-title">
								<?php
									$custom_title = get_field('title');

									if ( get_field( 'sub_title' ) ) 
									{
										printf( '<h5 class="sub-title">%s</h5>', get_field( 'sub_title' ) );
									}

									if ($custom_title) 
									{
										printf('<h1 class="title">%s</h1>', $custom_title);
									}
									else
									{
										printf('<h1 class="title base">%s</h1>', get_the_title());
									}

									if (get_field( 'banner_desc' )) 
									{
										printf( '<p>%s</p>', get_field( 'banner_desc' ) );
									}
								?>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</section>
		<?php endif;

		//basic Page Layouts
		$all_layouts = get_field('all_layout');
		if($all_layouts):
			$section_id = 1;
			while ( have_rows('all_layout') ) : the_row();
				// 1 column layout 
				if( get_row_layout() == '1_column_layout' ):
			?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-1-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 1; $x++) {
								$col_data = get_sub_field('column_'.$x); ?>
							<div class="col-md-12 basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; // END 1 col
			//2 column 1:1 layout
			if( get_row_layout() == '2_column_layout_m1' ): ?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-2-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 2; $x++) {
								$col_data = get_sub_field('column_'.$x);
						?>
							<div class="col-md-6 basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; //End 2 column 1:1 layout

			//2 column 2:1 layout
			if( get_row_layout() == '2_column_layout_m2' ): ?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-2-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 2; $x++) {
								$col_data = get_sub_field('column_'.$x);
						?>
							<div class="col-md-<?php echo ( $x == 1 )?'8':'4'; ?> basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; //End 2 column 2:1 layout

			//2 column 2:1 layout
			if( get_row_layout() == '2_column_layout_m3' ): ?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-2-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 2; $x++) {
								$col_data = get_sub_field('column_'.$x);
						?>
							<div class="col-md-<?php echo ( $x == 1 )?'4':'8'; ?> basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; //End 2 column 2:1 layout

			// 3 column layout
			if( get_row_layout() == '3_column_layout' ): ?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-3-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 3; $x++) {
								$col_data = get_sub_field('column_'.$x);
						?>
							<div class="col-md-4 basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; // END 3 col layout

			// 4 column layout
			if( get_row_layout() == '4_column_layout' ): ?>
			<section id="content-section-<?php echo $section_id; ?>" class="basic basic-4-col">
				<div class="container new">
					<div class="row basic-parent">
						<?php 
							for ($x = 1; $x <= 4; $x++) {
								$col_data = get_sub_field('column_'.$x);
						?>
							<div class="col-md-3 basic-child">
								<?php 													
									basic_content($col_data);						
								?>
							</div>
						<?php 
							}
						?>
					</div>
				</div>
			</section>
			<?php endif; // END 4 col layout
			$section_id++;
			endwhile;
		endif; // END ALL LAYOUTS
	?>
	
	</div><!-- /primary -->

<?php endif;
 
get_footer(); ?>