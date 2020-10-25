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
            <?php
            $themeColor1;
            if ( get_theme_mod( 'theme_color_1' ) !== "" ) { 
                $themeColor1 = esc_html ( get_theme_mod( 'theme_color_1' ) );
            } else {
                $themeColor1 = "#64460e";
            }
            ?>
            
            h1, h2, h3, h4, h5, h6 { color: <?php echo $themeColor1; ?>; }
            a:link, a:visited { color: <?php echo $themeColor1; ?>; }
            input::placeholder, textarea::placeholder { color: <?php echo $themeColor1; ?>; }
            th { color: <?php echo $themeColor1; ?>; }
                
                
            /* Header styles */
            .header { 
                <?php if ( get_header_image() ) { ?> 
                    background: url('<?php echo esc_url( header_image() ); ?>') 50% 50%/cover no-repeat; 
                <?php } else { ?> 
                    background: linear-gradient(#fbe3b7, #f3f3f3);    
                <?php } ?>
            }
            .header__subtitle { color: <?php echo $themeColor1; ?>; }
            .header__phone { color: <?php echo $themeColor1; ?>; }
             
             
            /*Additional WordPress generated classes.*/
            .wp-block-button__link.is-style-outline { color: <?php echo $themeColor1; ?>; }

            
            /* Nav styles */
            .nav { background-color: <?php echo $themeColor1; ?>; }
            
            
            /*Footer Styles*/
            .footer__subheader { color: <?php echo $themeColor1; ?>; }
            
            .footer__social a { color: <?php echo $themeColor1; ?>; }
            .footer__location-phone__phone { color: <?php echo $themeColor1; ?>; }
            
            
            /*Comments*/
            .comment-form label { color: <?php echo $themeColor1; ?>; }
            
            .comments .fn { color: <?php echo $themeColor1; ?>; }
            
            
            /*Search*/
            #searchsubmit { background-color: <?php echo $themeColor1; ?>; }
            
            
            /*General styles*/
            
            .body-wrapper .read-more { background-color: <?php echo $themeColor1; ?>; }
            
            .wp-block-button__link { background-color: <?php echo $themeColor1; ?>; }
            
            
            /*Index page*/
            
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
                    <?php if ( esc_html( get_theme_mod( 'index_show_search_code' ) ) !== "" ) { 
                        get_search_form(); ?>
                            <?php if ( trim( get_theme_mod ( 'phone_code' ) ) !== "" ){ ?>
                            <div class="header__phone" style="<?php if ( get_header_image() ) { echo "color: #ffffff;"; } ?>"><?php echo esc_html( get_theme_mod( 'phone_code' ) ); ?></div>
                        <?php } 
                    } ?>
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