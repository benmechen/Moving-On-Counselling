<?php

$zerif_total_posts = get_option('posts_per_page'); /* number of latest posts to show */

if( !empty($zerif_total_posts) && ($zerif_total_posts > 0) ):

	if( function_exists('zerif_before_latest_news_trigger') ):
		zerif_before_latest_news_trigger();
	endif;

	$responsiveboat_parent_theme = get_template();
	
	/**********************************/
	/**********	Zerif PRO *************/
	/**********************************/
	
	if( !empty($responsiveboat_parent_theme) && ($responsiveboat_parent_theme == 'zerif-pro') ):
	
		global $wp_customize;
		
		$zerif_latest_news_show = get_theme_mod('zerif_latest_news_show');
				
		if( !empty($zerif_latest_news_show) ):
			echo '<section class="latest-news" id="latestnews">';	
		elseif ( isset( $wp_customize ) ):
			echo '<section class="latest-news zerif_hidden_if_not_customizer" id="latestnews">';	
		endif;
		
		zerif_top_latest_news_trigger();
	
		if( !empty($zerif_latest_news_show) || isset( $wp_customize ) ):
			
			/* SECTION HEADER */
			echo '<div class="section-header">';
			
				$zerif_latestnews_title = get_theme_mod('zerif_latestnews_title',__('LATEST NEWS','responsiveboat'));
				/* title */
				if( !empty($zerif_latestnews_title) ):
					echo '<h2 class="dark-text">' . $zerif_latestnews_title . '</h2>';
				elseif ( isset( $wp_customize ) ):
					echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
				endif;
				
				/* subtitle */
				$zerif_latestnews_subtitle = get_theme_mod('zerif_latestnews_subtitle',__('Add a subtitle in Customizer, "Latest news section"','responsiveboat'));
				if( !empty($zerif_latestnews_subtitle) ):
					echo '<h6 class="dark-text" id="zerif_latestnews_subtitle">'.$zerif_latestnews_subtitle.'</h6>';
				elseif ( isset( $wp_customize ) ):
					echo '<h6 class="dark-text zerif_hidden_if_not_customizer"></h6>';
				endif;
				
			echo '</div><!-- END .section-header -->';
			echo '<div class="clear"></div>';
				
			$zerif_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC','ignore_sticky_posts' => true ) );
			if( $zerif_latest_loop->have_posts() ):

				echo '<div class="rb-latest-news-container">';

					while ( $zerif_latest_loop->have_posts() ) : $zerif_latest_loop->the_post();

						if ( has_post_thumbnail() ) :
							echo '<div class="rb-latest-news">';
						else:
							echo '<div class="rb-latest-news rb-latest-news-content-open">';
						endif;

							echo '<div class="rb-latest-news-image-holder">';

								echo '<a href="'.get_permalink().'">';

									echo '<span class="rb-latest-news-image">';
										echo '<img width="480" height="442" src="'.get_theme_mod('rb_latestnews_image', get_stylesheet_directory_uri().'/images/map.jpg').'-480x442.png" class="attachment-rb_latest_news_photo size-rb_latest_news_photo wp-post-image" alt="">';
								// 		if ( has_post_thumbnail() ) :
								// 			the_post_thumbnail('rb_latest_news_photo');
								// 		else:
								// 			echo responsiveboat_get_first_image_from_post();
								// 		endif;

									echo '</span>';

								echo '</a>';

								echo '<span class="rb-latest-news-content">';
									echo '<div class="rb-latest-news-content-outer">';
										echo '<div class="rb-latest-news-content-inner">';
											echo '<h3>'.get_the_title().'</h3>';
											echo '<a href="'.get_theme_mod('rb_latestnews_link', '').'" class="rb-latest-news-read-more">'.__('Read full article','responsiveboat').'</a>';
										echo '</div>';
									echo '</div>';
								echo '</span>';

							echo '</div><!-- .rb-latest-news-image-holder -->';

						echo '</div><!-- .rb-latest-news -->';

					endwhile;
					
				echo '</div><!-- .rb-latest-news-container -->';	
				
				wp_reset_postdata();

				endif;	
			
				zerif_bottom_latest_news_trigger();
				
			echo '</section>';
		endif;
	
	/*********************************************/
    /*******	Other theme then Zerif PRO *******/
    /*********************************************/	
	else:

		echo '<section class="latest-news" id="latestnews">';
		
			if( function_exists('zerif_top_latest_news_trigger') ):
				zerif_top_latest_news_trigger();
			endif;	

			/* SECTION HEADER */

			echo '<div class="section-header">';

				$zerif_latestnews_title = get_theme_mod('zerif_latestnews_title');

				/* title */
				if( !empty($zerif_latestnews_title) ):
					echo '<h2 class="dark-text">' . $zerif_latestnews_title . '</h2>';
				else:
					echo '<p class="dark-text">' . __('Latest news','responsiveboat') . '</p>';
				endif;

				/* subtitle */
				$zerif_latestnews_subtitle = get_theme_mod('zerif_latestnews_subtitle');

				if( !empty($zerif_latestnews_subtitle) ):
					echo '<p class="dark-text">'.$zerif_latestnews_subtitle.'</p>';
				endif;

			echo '</div><!-- END .section-header -->';

			echo '<div class="clear"></div>';

// 			$zerif_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC','ignore_sticky_posts' => true ) );
// 			if( $zerif_latest_loop->have_posts() ):

// 				echo '<div class="rb-latest-news-container">';

// 					while ( $zerif_latest_loop->have_posts() ) : $zerif_latest_loop->the_post();

// 					if ( has_post_thumbnail() ) :
// 						echo '<div class="rb-latest-news">';
// 					else:
// 						echo '<div class="rb-latest-news rb-latest-news-content-open">';
// 					endif;

// 						echo '<div class="rb-latest-news-image-holder">';

// 							echo '<a href="'.get_permalink().'">';

// 								echo '<span class="rb-latest-news-image">';
// 									/* image */
// 									$rb_latestnews_image = get_theme_mod('rb_latestnews_image',get_stylesheet_directory_uri().'/images/map.jpg');

// 									if( !empty($rb_latestnews_image) ):

// // 										echo '<div class="col-lg-3 col-md-3 column" data-scrollreveal="enter bottom after 0s over 1s">';

// 											echo '<img src="'.esc_url( $rb_latestnews_image ).'">';

// // 										echo '</div>';

// 									endif;
// // 									if ( has_post_thumbnail() ) :
// // 										the_post_thumbnail('rb_latest_news_photo');
// // 									else:
// // 										echo responsiveboat_get_first_image_from_post();
// // 									endif;

// 								echo '</span>';

// 							echo '</a>';

// 							echo '<span class="rb-latest-news-content">';
// 								echo '<div class="rb-latest-news-content-outer">';
// 									echo '<div class="rb-latest-news-content-inner">';
// 										echo '<h3>'.get_the_title().'</h3>';
// 										echo '<a href="'.get_theme_mod('rb_latestnews_link', '').'" target="_blank" class="rb-latest-news-read-more">'.__('Click for Larger Map','responsiveboat').'</a>';
// 									echo '</div>';
// 								echo '</div>';
// 							echo '</span>';

// 						echo '</div><!-- .rb-latest-news-image-holder -->';

// 					echo '</div><!-- .rb-latest-news -->';

// 					endwhile;
					
// 					wp_reset_postdata();

// 				echo '</div><!-- .rb-latest-news-container -->';
				
// 			endif;	
			$zerif_latest_loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'order' => 'DESC','ignore_sticky_posts' => true ) );
			if( $zerif_latest_loop->have_posts() ):

				echo '<div class="rb-latest-news-container">';

					while ( $zerif_latest_loop->have_posts() ) : $zerif_latest_loop->the_post();

					if ( has_post_thumbnail() ) :
						echo '<div class="rb-latest-news" style="width: 90%; margin: 0 auto;">';
					else:
						echo '<div class="rb-latest-news rb-latest-news-content-open">';
					endif;

						echo '<div class="rb-latest-news-image-holder">';

							echo '<a href="'.get_permalink().'">';

								echo '<span class="rb-latest-news-image" style="height: 100%;">';
									/* image */
									dynamic_sidebar( 'rb_whenwhere_widget_1' );
// 									if ( has_post_thumbnail() ) :
// 										the_post_thumbnail('rb_latest_news_photo');
// 									else:
// 										echo responsiveboat_get_first_image_from_post();
// 									endif;

								echo '</span>';

							echo '</a>';

							echo '<span class="rb-latest-news-content">';
								echo '<div class="rb-latest-news-content-outer">';
									echo '<div class="rb-latest-news-content-inner">';
										echo '<h3 style="margin-bottom: 1%;">'.get_the_title().'</h3>';
										echo '<a href="'.get_theme_mod('rb_latestnews_link', '').'" target="_blank" class="rb-latest-news-read-more">'.__('Click for Larger Map','responsiveboat').'</a>';
									echo '</div>';
								echo '</div>';
							echo '</span>';

						echo '</div><!-- .rb-latest-news-image-holder -->';

					echo '</div><!-- .rb-latest-news -->';

					endwhile;
					
					wp_reset_postdata();

				echo '</div><!-- .rb-latest-news-container -->';
				
			endif;	
//             echo '<div class="rb-latest-news-container">';
//                 echo '<a href="'.get_permalink().'">';
//                 dynamic_sidebar( 'rb_whenwhere_widget_1' );
//                 echo '</a>';
                
//                 echo '<span class="rb-latest-news-content">';
//         			echo '<div class="rb-latest-news-content-outer">';
//         				echo '<div class="rb-latest-news-content-inner">';
//         					echo '<a href="'.get_theme_mod('rb_latestnews_link', '').'" target="_blank" class="rb-latest-news-read-more">'.__('Click for Larger Map','responsiveboat').'</a>';
//         				echo '</div>';
//         			echo '</div>';
//         		echo '</span>';
//             echo '</div><!-- .rb-latest-news-container -->';

// 			if( function_exists('zerif_bottom_latest_news_trigger') ):
// 				zerif_bottom_latest_news_trigger();
// 			endif;

		echo '</section>';
		
	endif;	
	
	if( function_exists('zerif_after_latest_news_trigger') ):
		zerif_after_latest_news_trigger();
	endif;	
	
endif; ?>