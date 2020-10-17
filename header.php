<?php
//Header template.  
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo esc_html( get_theme_mod( "meta_description_code" ) ); ?>" />
        <meta name="keywords" content="<?php echo esc_html( get_theme_mod( "meta_keywords_code" ) ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .header { 
                <?php if ( get_header_image() ) { ?> 
                    background: url('<?php echo esc_url( header_image() ); ?>') 50% 50%/cover no-repeat; 
                <?php } else { ?> 
                    background: linear-gradient(#fbe3b7, #f3f3f3);    
                <?php } ?>
            }
        </style>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( strtolower( single_post_title( "", false ) ) ); ?>>
        <?php wp_body_open(); ?>
        <div class="body-wrapper">
            <header class="header">
                <div class="inner-wrapper">  
                    <?php if ( has_custom_logo() ) { ?>
                        <div class="logo">
                            <a href="<?php echo esc_url( get_home_url() ); ?>">
                                <?php
                                    $logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $logo_id, 'full' );
                                ?>
                                <img src="<?php echo esc_attr( $logo[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo">
                            </a>
                        </div>
                    <?php } ?>
                    <h1 class="main-title"><a class="main-title__title" href="<?php echo esc_url( get_home_url() ); ?>" style="<?php if ( esc_attr( get_header_image() ) ) { echo "color: #ffffff;"; } ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
                    <h2 class="header__subtitle" style="<?php if ( get_header_image() ) { echo "color: #ffffff;"; } ?>"><?php if ( !is_404() ) { single_post_title(); } else { echo "404 Error"; } ?></h2>
                    <?php get_search_form(); ?>
                        <?php if ( trim( get_theme_mod ( 'phone_code' ) ) !== "" ){ ?>
                        <div class="header__phone" style="<?php if ( get_header_image() ) { echo "color: #ffffff;"; } ?>"><?php echo esc_html( get_theme_mod( 'phone_code' ) ); ?></div>
                    <?php } ?>
                </div>
            </header>
            <nav class="nav desktop-nav" id="desktop-nav">
                <div class="inner-wrapper">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'main-nav' ) );
                    ?>
                </div>
            </nav>
            <nav class="nav mobile-nav">
                <div id="dropdownButton"></div>
                <div id="dropdownContent">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'main-nav' ) );
                    ?>
                </div>
            </nav>