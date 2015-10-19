<?php

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function bootville_theme_customizer( $wp_customize ) {


/**
 * Adds the main theme options to the customizer
 */

$wp_customize->add_section( 'bootville_theme_options' , array(
	'title'       => __( 'Theme Options', 'bootville-lite' ),
	'priority'    => 30,
	'description' => 'Configure your theme.',
) );

// add color picker setting
$wp_customize->add_setting( 'main_color', array(
	'default' => '#3f51b5'
) );

// add color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
	'label' => 'Main Color',
	'description' => 'Controls Menu and Primary Button colours',
	'section' => 'bootville_theme_options',
	'settings' => 'main_color',
) ) );

// Add Sidebar Layout settings
$wp_customize->add_setting( 'bootville_sidebar_layout', array(
	'default'	        => 'option1',
	'sanitize_callback' => 'bootville_sanitize_sidebar_layout',
) );
// Add Sidebar Layout control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bootville_sidebar_layout', array(
	'label'    => __( 'Post Content Layout', 'bootville-lite' ),
	'section'  => 'bootville_theme_options',
	'settings' => 'bootville_sidebar_layout',
	'type'     => 'radio',
	'choices'  => array(
		'option1' => 'Left Sidebar',
		'option2' => 'Right Sidebar',
		),
) ) );

/**
 * Adds the Homepage Template options to theme customizer
 */
// add homepage template section
$wp_customize->add_section( 'bootville_hometemplate_section' , array(
	'title'       => __( 'Homepage Template Options', 'bootville-lite' ),
	'priority'    => 30,
	'description' => 'Homepage Template Options.',
) );
// Latest Posts Section Title
	$wp_customize->add_setting(
		'latest_posts_textbox',
		array(
			'default' => 'Latest Posts',
    )
);

	$wp_customize->add_control(
		'latest_posts_textbox',
		array(
			'label' => 'Latest Posts Section Title',
			'section' => 'bootville_hometemplate_section',
			'type' => 'text',
    )
);
// add homepage latest posts section template setting
$wp_customize->add_setting( 'bootville_latest_posts', array(
	'default'	        => 'option1',
	'sanitize_callback' => 'bootville_sanitize_latest_posts',
) );
// add homepage latest posts section control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bootville_latest_posts', array(
	'label'    => __( 'Display Latest Posts', 'bootville-lite' ),
	'section'  => 'bootville_hometemplate_section',
	'settings' => 'bootville_latest_posts',
	'type'     => 'radio',
	'choices'  => array(
		'option1' => 'Latest On',
		'option2' => 'Latest Off',
		),
) ) );

// Portfolio Section Title
	$wp_customize->add_setting(
		'portfolio_title_textbox',
		array(
			'default' => 'TwentyFifteen Plus',
    )
);

	$wp_customize->add_control(
		'portfolio_title_textbox',
		array(
			'label' => 'Portfolio Section Title',
			'section' => 'bootville_hometemplate_section',
			'type' => 'text',
    )
);
// Add portfolio section toggle
$wp_customize->add_setting( 'bootville_portfolio_section', array(
	'default'	        => 'option1',
	'sanitize_callback' => 'bootville_sanitize_portfolio_section',
) );
// add homepage portfolio section control
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bootville_portfolio_section', array(
	'label'    => __( 'Display Latest Portfolio Items', 'bootville-lite' ),
	'section'  => 'bootville_hometemplate_section',
	'settings' => 'bootville_portfolio_section',
	'type'     => 'radio',
	'choices'  => array(
		'option1' => 'Portfolio Sectiont On',
		'option2' => 'Portfolio Section Off',
		),
) ) );
	

// Add back to top on/off option
	$wp_customize->add_setting(
		'hide_backtotop'
	);
	$wp_customize->add_control(
		'hide_backtotop',
		array(
			'type' => 'checkbox',
			'label' => 'Hide Back to Top Link',
			'section' => 'bootville_layout_section',
		)
	);

}	

// end main function
add_action('customize_register', 'bootville_theme_customizer');





/**
 * Sanitizes our sidebar layout.
 */
function bootville_sanitize_sidebar_layout( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}
/**
 * Sanitizes our latest posts switch.
 */
function bootville_sanitize_latest_posts( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}
/**
 * Sanitizes our portfolio witch.
 */
function bootville_sanitize_portfolio_section( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}



// Add customizer styles to head
function bwpy_customizer_head_styles() {
	$main_color = get_theme_mod( 'main_color' ); 
	
	if ( $main_color != '#3f51b5' ) :
	?>
		<style type="text/css">
.navbar-default {
	background-color: <?php echo $main_color; ?> ;
	border-color: <?php echo $main_color; ?> ;
}
.navbar-default .navbar-toggle { border-color: #ccc; }
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus,
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
	background-color: <?php echo $main_color; ?> ;
}
.btn-primary {
	background-color: <?php echo $main_color; ?> ;
	border-color: <?php echo $main_color; ?> !important;
}
.btn-primary:hover,
.btn-primary:active,
.btn-primary:focus {
	background-color: <?php echo $main_color; ?> ; opacity: .85;
	border-color: <?php echo $main_color; ?> !important;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
	background-color: <?php echo $main_color; ?>;
	border-color: <?php echo $main_color; ?>;
}

/* add icons here */
#menu-social li a[href$="/feed/"] {  color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href$="/feed/"]:before { content: "\f09e"; }

#menu-social li a[href*="plus.google.com"] { color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="plus.google.com"]:before { content: "\f0d5"; }

#menu-social li a[href*="instagram.com"] {  color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="instagram.com"]:before { content: "\f16d"; }

#menu-social li a[href*="linkedin.com"] { color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="linkedin.com"]:before { content: "\f0e1"; }

#menu-social li a[href*="pinterest.com"] { color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="pinterest.com"]:before { content: "\f0d2"; }

#menu-social li a[href*="twitter.com"] { color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="twitter.com"]:before { content: "\f099"; }

#menu-social li a[href*="github.com"] { color: <?php echo $main_color; ?>; background: transparent;}
#menu-social li a[href*="github.com"]:before { content: "\f09b"; }

#menu-social li a[href*="mailto:"] { color: <?php echo $main_color; ?>; background: transparent; }
#menu-social li a[href*="mailto:"]:before { content: "\f0e0";}

#menu-social li a[href*="wordpress.com"] { color: <?php echo $main_color; ?>; background: transparent;}
#menu-social li a[href*="wordpress.com"]:before { content: "\f19a"; }

#menu-social li a[href*="facebook.com"] { color: <?php echo $main_color; ?>; background: transparent;;}
#menu-social li a[href*="facebook.com"]:before { content: "\f09a"; }

#menu-social li a[href*="youtube.com"] { color: <?php echo $main_color; ?>; background: transparent;}
#menu-social li a[href*="youtube.com"]:before { content: "\f167"; }
		</style>
	<?php
	endif;
}
add_action( 'wp_head', 'bwpy_customizer_head_styles' );