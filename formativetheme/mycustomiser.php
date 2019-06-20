<?php
//customizer

function customizer_image($wp_customize){

    $wp_customize->add_setting('header_image', array(
        'default'     => '',
        'transport'   => 'refresh',
    ));


    $wp_customize->add_section('yoobee_image_header_section', array(
        'title'      => 'Header Image',
        'priority'   => 30,
    ));



    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'my-header_image', array(
        'label'      => 'Header Image',
        'section'    => 'yoobee_image_header_section',
        'settings'   => 'header_image',
    )));

}

add_action("customize_register", "customizer_image");

function apply_theme_background_mod(){
?>  
     <style type="text/css"> 
         .div-image { 
            background-image: url( <?php echo get_theme_mod('header_image'); ?> );   
            height: 300px;
            background-size: cover;
         } 
     </style>
<?php
 }
 
 add_action('wp_head','apply_theme_background_mod');

?>
<?php 

// adding header colour to customizer
function customizer_settings($wp_customize){

    $wp_customize->add_setting('body_color', array(
        'default'     => '#000000',
        'transport'   => 'refresh',
    ));


    $wp_customize->add_section('yoobee_color_body_section', array(
        'title'      => 'Body Color',
        'priority'   => 30,
    ));



    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my-header_color', array(
        'label'      => 'Body Color',
        'section'    => 'yoobee_color_body_section',
        'settings'   => 'body_color',
    )));

}

add_action("customize_register", "customizer_settings");

// getting that setting to actually work on the page
function apply_theme_color_mod(){
?>  
    <style type="text/css"> 
        p { 
            color: <?php echo get_theme_mod('body_color', '0x000000'); ?> ; 
        } 
    </style>
<?php
}

add_action('wp_head','apply_theme_color_mod');


// adding theme logo
function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

// putting theme on the page

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}