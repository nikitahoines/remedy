<?php 

function load_custom_css(){
    wp_enqueue_style('custom-css', get_template_directory_uri() . "/css/formative.css", array(), "1.0.0");
}

add_action('wp_enqueue_scripts', 'load_custom_css', 1000);

function my_scripts() {
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function theme_setup(){

    register_nav_menus(
            array(
                'menu-1' => __( 'Primary', 'formative' ),
                'footer' => __( 'Footer Menu', 'formative' ),
                'social' => __( 'Social Links Menu', 'formative' ),
            )
        );

    }

    function formative_theme_setup(){
        // Add theme support for selective refresh for widgets.
            add_theme_support( 'customize-selective-refresh-widgets' );
            
            // Add support for Block Styles.
            add_theme_support( 'wp-block-styles' );
            
            // Add support for full and wide align images.
            add_theme_support( 'align-wide' );
            
            // Add support for editor styles.
            add_theme_support( 'editor-styles' );
            
            // Enqueue editor styles.
            add_editor_style( 'style-editor.css' ); 
            
            add_theme_support('custom-background', array());
            
            add_theme_support('editor-color-palette', array(
                array(
                    'name' =>'PINK',
                    'slug' => 'pink',
                    'color' => '#e91e63'
                ),
                array(
                    'name' =>'GREY',
                    'slug' => 'grey',
                    'color' => '#efefef'
                    )
            ));
            
            // Add custom editor font sizes.
            add_theme_support(
                'editor-font-sizes',
                array(
                    array(
                        'name'      => __( 'Small', 'formativetheme' ),
                        'shortName' => __( 'S', 'formativetheme' ),
                        'size'      => 19.5,
                        'slug'      => 'small',
                    ),
                    array(
                        'name'      => __( 'Normal', 'formativetheme' ),
                        'shortName' => __( 'M', 'formativetheme' ),
                        'size'      => 22,
                        'slug'      => 'normal',
                    ),
                    array(
                        'name'      => __( 'Large', 'formativetheme' ),
                        'shortName' => __( 'L', 'formativetheme' ),
                        'size'      => 26.5,
                        'slug'      => 'large',
                    ),
                    array(
                        'name'      => __( 'Huge', 'formativetheme' ),
                        'shortName' => __( 'XL', 'formativetheme' ),
                        'size'      => 49.5,
                        'slug'      => 'huge',
                    ),
                )
            );
        
        }
   add_action('after_setup_theme', 'formative_theme_setup');

add_action( 'after_setup_theme', 'theme_setup' );

//top 10 post type

function my_top6_post_type()
{

// go to codex

    $labels = array(
    'name' => 'Top 6',
    'singular_name' => 'New Item',
	'add_new' => 'Add New' ,
);



$args = array('labels' => $labels,

'hierarchical' => true,
'publicly_queryable' => true,
'public' => true,
'has_archive' => false,
'menu_icon'=> 'dashicons-buddicons-buddypress-logo',
'rewrite' => array('slug' => 'top6'),
'show_in_rest' => true,
'show_in_nav_menus' => true,
'supports' => array('title') );

register_post_type('top6', $args);
}

add_action('init', 'my_top6_post_type');

// employee css

function add_top6_styles(){
	if ( is_singular( array( 'top6' )) || is_page('top6')) {
		wp_enqueue_style('top6-styles', get_template_directory_uri() . '/css/top6.css', array(), '1.0.0');
	} 
}

add_action('wp_enqueue_scripts', 'add_top6_styles');

// adding image

function configure_image_sizes(){
	add_image_size( 'top6-thumbnail', 100 );
}

add_action('after_setup_theme', 'configure_image_sizes');

// employee taxonomy (grouping e.g. department)

function top6_department_taxonomy()
{
    $args = array(
'label' => 'Department',
'public' => true,
'rewrite' => array( 'slug' => 'top-6/department' ),
'hierarchical' => true,
'show_in_rest' => true
);

    register_taxonomy('department', 'top6', $args);
}


add_action('init', 'top6_department_taxonomy');

// linking the customizer php file
require_once( dirname(__FILE__) . '/mycustomiser.php' );

?>