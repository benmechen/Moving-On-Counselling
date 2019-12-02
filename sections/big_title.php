<?php

$zerif_slider_shortcode = get_theme_mod( 'zerif_bigtitle_slider_shortcode' );

echo '<div class="' . ( !empty( $zerif_slider_shortcode ) ? 'home-slider-plugin' : '' ) . ' home-header-wrap">';

	$zerif_parallax_img1 = get_theme_mod( 'zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg' );
	$zerif_parallax_img2 = get_theme_mod( 'zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png' );
	$zerif_parallax_use = get_theme_mod( 'zerif_parallax_show' );

	if ( ! empty( $zerif_slider_shortcode ) ) {
		echo do_shortcode( $zerif_slider_shortcode );
	} else {

		if ( $zerif_parallax_use == 1 && ( ! empty( $zerif_parallax_img1 ) || ! empty( $zerif_parallax_img2 ) ) ) {
			echo '<ul id="parallax_move">';

			if ( ! empty( $zerif_parallax_img1 ) ) {
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . esc_url( $zerif_parallax_img1 ) . ');"></li>';
			}
			if ( ! empty( $zerif_parallax_img2 ) ) {
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . esc_url( $zerif_parallax_img2 ) . ');"></li>';
			}

			echo '</ul>';

		}

		$zerif_bigtitle_show = get_theme_mod( 'zerif_bigtitle_show' );

		if ( isset( $zerif_bigtitle_show ) && $zerif_bigtitle_show != 1 ):

			echo '<div class="header-content-wrap">';

		elseif ( is_customize_preview() ):

			echo '<div class="header-content-wrap zerif_hidden_if_not_customizer">';

		endif;

		if ( ( isset( $zerif_bigtitle_show ) && $zerif_bigtitle_show != 1 ) || is_customize_preview() ):

			echo '<div class="container big-title-container">';

			$rb_bigtitle_logo = get_theme_mod( 'rb_bigtitle_logo', get_stylesheet_directory_uri() . '/images/logo-small.png' );

			if ( ! empty( $rb_bigtitle_logo ) ):

// 				echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="">';

				echo '<img src="' . esc_url( $rb_bigtitle_logo ) . '" alt="' . get_bloginfo( 'title' ) . '" class="rb_logo">';

				echo '</a>';

			endif;

			/* Big title */
			$responsiveboat_parent_theme = get_template();

			if ( ! empty( $responsiveboat_parent_theme ) && ( $responsiveboat_parent_theme == 'zerif-pro' ) ) {

				$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title_2', __( 'To add a title here please go to Customizer, "Big title section"', 'responsiveboat' ) );

			} else {

				$zerif_bigtitle_title_default = get_theme_mod( 'zerif_bigtitle_title' );
				if( ! empty ( $zerif_bigtitle_title_default ) ) {
					$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title_2', $zerif_bigtitle_title_default );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					$zerif_bigtitle_title = get_theme_mod ( 'zerif_bigtitle_title_2', sprintf( __( 'This piece of text can be changed in %s','responsiveboat' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>',esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_title_2' ) ), __( 'Big title section','responsiveboat' ) ) ) );
				} else {
					$zerif_bigtitle_title = get_theme_mod ( 'zerif_bigtitle_title_2' );
				}

			}

			if ( ! empty( $zerif_bigtitle_title ) ):

				echo '<p class="intro-text">' . $zerif_bigtitle_title . '</p>';

			elseif ( is_customize_preview() ):

				echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';

			endif;

			/* Buttons */

			if ( ! empty( $responsiveboat_parent_theme ) && ( $responsiveboat_parent_theme == 'zerif-pro' ) ) {
				$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2', __( 'One button', 'responsiveboat' ) );
				$zerif_bigtitle_redbutton_url   = get_theme_mod( 'zerif_bigtitle_redbutton_url', '#' );

				$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label', __( 'Another button', 'responsiveboat' ) );
				$zerif_bigtitle_greenbutton_url   = get_theme_mod( 'zerif_bigtitle_greenbutton_url', '#' );
			} else {
				$zerif_bigtitle_redbutton_label_default = get_theme_mod( 'zerif_bigtitle_redbutton_label' );
				if ( ! empty ( $zerif_bigtitle_redbutton_label_default ) ) {
					$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2', $zerif_bigtitle_redbutton_label_default );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2', __( 'Customize this button', 'responsiveboat' ) );
				} else {
					$zerif_bigtitle_redbutton_label = get_theme_mod( 'zerif_bigtitle_redbutton_label_2' );
				}
				if ( current_user_can( 'edit_theme_options' ) ) {
					$zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url', admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_redbutton_url' ) );
					$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label', __( "Customize this button", 'responsiveboat' ) );
					$zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_bigtitle_greenbutton_url' ) ) );
				} else {
					$zerif_bigtitle_redbutton_url = get_theme_mod( 'zerif_bigtitle_redbutton_url' );
					$zerif_bigtitle_greenbutton_label = get_theme_mod( 'zerif_bigtitle_greenbutton_label' );
					$zerif_bigtitle_greenbutton_url = get_theme_mod( 'zerif_bigtitle_greenbutton_url' );
				}
			}

			if ( ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ) ||

			     ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) )
			):


// 				echo '<div class="buttons">';
// 				if ( function_exists( 'zerif_big_title_buttons_top_trigger' ) ):
// 					zerif_big_title_buttons_top_trigger();
// 				endif;

// 				/* Red button */

// 				if ( ! empty( $zerif_bigtitle_redbutton_label ) && ! empty( $zerif_bigtitle_redbutton_url ) ):

// 					echo '<a href="' . $zerif_bigtitle_redbutton_url . '" class="btn btn-primary custom-button red-btn">' . $zerif_bigtitle_redbutton_label . '</a>';

// 				elseif ( is_customize_preview() ):

// 					echo '<a href="" class="btn btn-primary custom-button red-btn zerif_hidden_if_not_customizer"></a>';

// 				endif;

// 				/* Green button */

// 				if ( ! empty( $zerif_bigtitle_greenbutton_label ) && ! empty( $zerif_bigtitle_greenbutton_url ) ):

// 					echo '<a href="' . $zerif_bigtitle_greenbutton_url . '" class="btn btn-primary custom-button green-btn">' . $zerif_bigtitle_greenbutton_label . '</a>';

// 				elseif ( is_customize_preview() ):

// 					echo '<a href="" class="btn btn-primary custom-button green-btn zerif_hidden_if_not_customizer"></a>';

// 				endif;

// 				if ( function_exists( 'zerif_big_title_buttons_bottom_trigger' ) ):
// 					zerif_big_title_buttons_bottom_trigger();
// 				endif;

// 				echo '</div>';


			endif;

			echo '</div>';

			echo '</div><!-- .header-content-wrap -->';

		endif;

		echo '<div class="clear"></div>';
	}

?>

</div><!--.home-header-wrap -->