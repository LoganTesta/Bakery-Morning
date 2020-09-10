<?php

/*Prevent non-logged in users from accessing the site's user and post data using the WordPress REST API.*/
add_filter( 'rest_authentication_errors', function( $result ) {
   if ( !empty( $result ) ) {
       return $result;
   } 
   if( !is_user_logged_in() ) {
       return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );    
   }
   return $result;
});




//Theme setup and support.
if ( function_exists( 'bakery_morning_setup' ) === false ) {
    function bakery_morning_setup() {
        add_theme_support( "post-thumbnails" ); //Allow image thumbnails in pages and posts.
        add_theme_support( "post-formats", array( 'aside', 'gallery', 'quote', 'image', 'video' ) ); //Let user customize the post format.  
        add_theme_support( "custom-logo", array ( 'width' => 200, 'height' => 200 ) );   //Let user upload the logo.
        add_theme_support( "custom-background" );
        add_theme_support( "custom-header" );
        add_theme_support( "title-tag");
        add_theme_support( "automatic-feed-links" ); //Add default post and comment RSS links to head.

        //Allow cropping for medium thumbnail images.
        if(false === get_option( "medium_crop" )) {
            add_option( "medium_crop", "1" );
        } else {
            update_option( "medium_crop", "1" );
        }
        
        //Add support for additional nav menus.
        register_nav_menus(
            array(
                'main-nav' => __( 'Main Nav', 'bakery-morning' ),
                'footer-nav' => __( 'Footer Nav', 'bakery-morning' )
            )
        );
        
        //Enable theme translation.
        load_theme_textdomain( 'bakery-morning', get_template_directory() . '/languages' );
        
        if( !isset( $content_width ) ){
            $content_width = 1920;            
        };
    }
}
add_action( 'after_setup_theme', 'bakery_morning_setup' );


function bakery_morning_enable_sidebars(){
    //Enable Widgets in theme.
    if ( function_exists( 'register_sidebar' ) ) {
        register_sidebar( array(
            'name' => 'Widgetized Area',
            'id' => 'widgetized-area',
            'description' => 'This is a widgetized area.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));
    } 
}
add_action( 'widgets_init', 'bakery_morning_enable_sidebars' );


add_action( 'admin_enqueue_scripts', function() { 
    wp_enqueue_style( 'admin-styles', "" . get_template_directory_uri() . '/assets/css/admin-styles.css?mod=08172020' );   
});

add_action( 'wp_enqueue_scripts', function() {   
    wp_register_script( 'html5-shiv', get_template_directory_uri() . '/assets/javascript/html5shiv.js.js' );
    wp_enqueue_script( 'html5-shiv', get_template_directory_uri() . '/assets/javascript/html5shiv.js.js' ); 
    wp_script_add_data( 'html5-shiv', 'conditional', 'lt IE 9' );
    
    if( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }
 
    wp_register_script( 'javascript-functions', get_template_directory_uri() . '/assets/javascript/javascript-functions.js' );
    wp_enqueue_script( 'javascript-functions', get_template_directory_uri() . '/assets/javascript/javascript-functions.js' );  
    wp_enqueue_style( 'styles', "" . get_template_directory_uri() . '/assets/css/main-styles.css?mod=09022020' );
    wp_enqueue_style( 'styles', "" . get_template_directory_uri() . '/assets/css/print-styles.css?mod=12202019' );   
});




//Add Theme Appearance Customization controls.
function bakery_morning_customize_register( $wp_customize ){
     
    //General Settings
    $wp_customize->add_section( "GeneralSettings", array(
        "title" => __("General Settings", "bakery-morning"),
        "priority" => 30,
    ));
       
    //Meta Description control.
    $wp_customize->add_setting( "meta_description_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "meta_description_code",
        array(
            "label" =>__( "Meta Description", "bakery-morning" ),
            "description" => __( '(Sitewide): add a short description of your site.', 'bakery-morning' ),
            "section" => "GeneralSettings",
            "settings" => "meta_description_code",
            "type" => "textarea",
        )
    ));   
    
    //Meta Keywords control.
    $wp_customize->add_setting( "meta_keywords_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "meta_keywords_code",
        array(
            "label" =>__( "Meta Keywords", "bakery-morning" ),
            "description" =>__( '(Sitewide): add several relevant words or short phrases.  Example: bakery, baked goods, fresh.', 'bakery-morning' ),
            "section" => "GeneralSettings",
            "settings" => "meta_keywords_code",
            "type" => "textarea",
        )
    )); 
    
   //Index Blog Heading text control.
    $wp_customize->add_setting( "index_blog_heading_code", array(
        "default" => "Recent Blog Posts",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "index_blog_heading_code",
        array(
            "label" =>__( "Index Blog Heading text.", "bakery-morning" ),
            "section" => "GeneralSettings",
            "settings" => "index_blog_heading_code",
            "type" => "text",
        )
    ));
    
    //Show/hide Index page blog posts.
    $wp_customize->add_setting( "index_show_blog_code", array(
        "default" => "checked",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "index_show_blog_code",
        array(
            "label" =>__( "Show most recent 4 blog posts on index page.", "bakery-morning" ),
            "section" => "GeneralSettings",
            "settings" => "index_show_blog_code",
            "type" => "checkbox",
        )
    ));
    
    //Set order of Index page blog posts.
    $wp_customize->add_setting( "index_blog_order_code", array(
        "default" => "asc",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh"
        )
    );
    $wp_customize->add_control( 'index_blog_order_code',
        array(
            'label' => __( 'Index Post Order', 'bakery-morning' ),
            'section' => 'GeneralSettings',
            'priority' => 10,
            'type' => 'radio',
            'choices' => array(
                'desc' => __( 'newest to oldest', 'bakery-morning' ),
                'asc' => __( 'oldest to newest', 'bakery-morning' )
            )
        )
    );
    
      
    //Business Info
    $wp_customize->add_section( "BusinessInfo", array(
        "title" => __("Business Info", "bakery-morning"),
        "priority" => 30,
    ));
        
    //Location control.
    $wp_customize->add_setting( "location_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "location_code",
        array(
            "label" =>__( "Location", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "location_code",
            "type" => "text",
        )
    ));   
    
    //Phone control.
    $wp_customize->add_setting( "phone_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "phone_code",
        array(
            "label" =>__( "Phone", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "phone_code",
            "type" => "text",
        )
    )); 
        
    //Hours controls.
    $wp_customize->add_setting( "hours_code0", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "hours_code0",
        array(
            "label" =>__( "Hours", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "hours_code0",
            "type" => "text",
        )
    )); 
    
    $wp_customize->add_setting( "hours_code1", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "hours_code1",
        array(
            "label" =>__( "Hours (2nd line, as needed)", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "hours_code1",
            "type" => "text",
        )
    )); 
    
    $wp_customize->add_setting( "hours_code2", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "hours_code2",
        array(
            "label" =>__( "Hours (3rd line, as needed)", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "hours_code2",
            "type" => "text",
        )
    )); 
    
    $wp_customize->add_setting( "hours_code3", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "hours_code3",
        array(
            "label" =>__( "Hours (4th line, as needed)", "bakery-morning" ),
            "section" => "BusinessInfo",
            "settings" => "hours_code3",
            "type" => "text",
        )
    )); 
    
    
    //Scoial Links
    $wp_customize->add_section( "SocialLinks", array(
        "title" => __("Social Links", "bakery-morning"),
        "priority" => 30,
    ));
       
    //Social Links controls.
    $wp_customize->add_setting( "pinterest_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "pinterest_code",
        array(
            "label" =>__( "Pinterest URL:", "bakery-morning" ),
            "section" => "SocialLinks",
            "settings" => "pinterest_code",
            "type" => "text",
        )
    ));
    
    //Social Links controls.
    $wp_customize->add_setting( "instagram_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "instagram_code",
        array(
            "label" =>__( "Instagram URL:", "bakery-morning" ),
            "section" => "SocialLinks",
            "settings" => "instagram_code",
            "type" => "text",
        )
    ));
    
    //Social Links controls.
    $wp_customize->add_setting( "facebook_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "facebook_code",
        array(
            "label" =>__( "Facebook URL:", "bakery-morning" ),
            "section" => "SocialLinks",
            "settings" => "facebook_code",
            "type" => "text",
        )
    ));
    
    //Social Links controls.
    $wp_customize->add_setting( "twitter_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "twitter_code",
        array(
            "label" =>__( "Twitter URL:", "bakery-morning" ),
            "section" => "SocialLinks",
            "settings" => "twitter_code",
            "type" => "text",
        )
    ));
    
    //Social Links controls.
    $wp_customize->add_setting( "youtube_code", array(
        "default" => "",
        "sanitize_callback" => "wp_filter_nohtml_kses", //Remove any user provided HTML tags
        "transport" => "refresh",
    ));
    $wp_customize->add_control( new WP_Customize_control(
        $wp_customize,
        "youtube_code",
        array(
            "label" =>__( "Youtube URL:", "bakery-morning" ),
            "section" => "SocialLinks",
            "settings" => "youtube_code",
            "type" => "text",
        )
    ));
    
}
add_action( 'customize_register', 'bakery_morning_customize_register' );



//Add About Theme tab in Admin Menu.
function add_about_theme_page(){
    ?>
<div class="wrap">
    <h1 class="wrap__title">About Bakery Morning</h1>
    <div class="wrap__content">
        <p>Use this fully responsive theme for your bakery website or for any other site you need.</p>
        <p>Looks great on phones, tablets, laptops, and desktops.  
            The color scheme is especially designed for bakery websites and you can always customize the CSS too.</p>
        <h2>Theme Customization Features</h2>
        <ul class="content__features-list">
            <li>Meta Description and Keywords.</li>
            <li>Location</li>
            <li>Store Hours</li>
            <li>Phone Number</li>
            <li>Social Media Links</li>
            <li>header and a footer nav menu</li>
            <li>... and more</li>
        </ul>
        <p>Enjoy using the Bakery Morning theme on your website!</li>
    </div>
</div>
    <?php
}


function add_about_theme_item(){
    add_theme_page( "About Bakery Morning", "About Theme", "manage_options", "theme-options", "add_about_theme_page", null, 99 ); 
}
add_action( "admin_menu", "add_about_theme_item" );
