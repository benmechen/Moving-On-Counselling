<?php

$responsiveboat_parent_theme = get_template();
	
/**********************************/
/**********	Zerif PRO *************/
/**********************************/
if( !empty($responsiveboat_parent_theme) && ($responsiveboat_parent_theme == 'zerif-pro') ):

		global $wp_customize;
			
		$zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

		zerif_before_testimonials_trigger();
				
		if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):
		
			echo '<section class="testimonial" id="testimonials">';
		
		elseif ( isset( $wp_customize ) ):
		
			echo '<section class="testimonial zerif_hidden_if_not_customizer" id="testimonials">';
		
		endif;

		zerif_top_testimonials_trigger();

		if( (isset($zerif_testimonials_show) && $zerif_testimonials_show != 1) || isset( $wp_customize ) ):	

				echo '<div class="container">';

					echo '<div class="section-header">';

						/* title */
					
						$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title','Testimonials');
						
						if( !empty($zerif_testimonials_title) ):
					
							echo '<h2 class="white-text">'.$zerif_testimonials_title.'</h2>';
							
						elseif ( isset( $wp_customize ) ):
						
							echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
							
						endif;

						$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

						if( !empty($zerif_testimonials_subtitle) ):

							echo '<h6 class="white-text">'.$zerif_testimonials_subtitle.'</h6>';

						elseif ( isset( $wp_customize ) ):
						
							echo '<h6 class="white-text zerif_hidden_if_not_customizer"></h6>';
							
						endif;


					echo '</div>';


					echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';


						echo '<div class="col-md-12">';

							$pinterest_style = '';
							$zerif_testimonials_pinterest_style = get_theme_mod('zerif_testimonials_pinterest_style');
							
							if( isset($zerif_testimonials_pinterest_style) && $zerif_testimonials_pinterest_style != 0 ) {
								$pinterest_style = 'testimonial-masonry';
							}
							
							echo '<div id="client-feedbacks" class="' . $pinterest_style . ' owl-carousel owl-theme">';

									if(is_active_sidebar( 'sidebar-testimonials' )):

										dynamic_sidebar( 'sidebar-testimonials' );

									else:
									
										the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );
										the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );
										the_widget( 'zerif_testimonial_widget','title=John Dow&text=Add a testimonial widget in the "Widgets: Testimonials section" in Customizer' );
									
									endif;								

							echo '</div>';


						echo '</div>';


					echo '</div>';


				echo '</div>';

				zerif_bottom_testimonials_trigger();

			echo '</section>';

		endif;

		zerif_after_testimonials_trigger();
	
/*********************************************/
/*******	Other theme then Zerif PRO *******/
/*********************************************/
else:

	if( function_exists('zerif_before_testimonials_trigger') ):
		zerif_before_testimonials_trigger();
	endif;	

	echo '<section class="testimonial" id="testimonials">';

		if( function_exists('zerif_top_testimonials_trigger') ):
			zerif_top_testimonials_trigger();
		endif;	

		echo '<div class="container">';

			echo '<div class="section-header">';

				/* title */
				$zerif_testimonials_title = get_theme_mod('zerif_testimonials_title',__('Testimonials','responsiveboat'));

				if( !empty($zerif_testimonials_title) ):
					echo '<h2 class="black-text">'.esc_attr( $zerif_testimonials_title ).'</h2>';
				endif;

				/* subtitle */
				$zerif_testimonials_subtitle = get_theme_mod('zerif_testimonials_subtitle');

				if( !empty($zerif_testimonials_subtitle) ):
					echo '<h6 class="black-text">'.esc_attr( $zerif_testimonials_subtitle ).'</h6>';
				endif;

			echo '</div><!-- .section-header -->';

			echo '<div class="row" data-scrollreveal="enter right after 0s over 1s">';

				echo '<div class="col-md-12">';

					echo '<div id="client-feedbacks" class="owl-carousel owl-theme">';

						if(is_active_sidebar( 'sidebar-testimonials' )) {
							dynamic_sidebar( 'sidebar-testimonials' );
						} elseif ( current_user_can( 'edit_theme_options' ) ) {
							if ( is_customize_preview() ) {
								printf( __( 'Add widgets in this area by going to the %s','responsiveboat' ), __( 'Testimonials section','responsiveboat' ) );
							} else {
								printf( __( 'Add widgets in this area by going to the %s','responsiveboat' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;section&#93;=sidebar-widgets-sidebar-testimonials' ) ), __( 'Testimonials section','responsiveboat' ) ) );
							}
						}

					echo '</div><!-- #client-feedbacks -->';

				echo '</div><!-- .col-md-12 -->';
				
			echo '</div><!-- .row -->';

		echo '</div><!-- .container -->';

		if( function_exists('zerif_bottom_testimonials_trigger') ):
			zerif_bottom_testimonials_trigger();
		endif;

	echo '</section>';

endif;	
?>