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
            $themeColor0;
            $themeColor1;
            $themeColor2;
            
            $themeColor0RGB;
            $themeColor1RGB;
            $themeColor2RGB;
               
            if ( trim( get_theme_mod( 'theme_color_0' ) ) !== "" ) { 
                $themeColor0 = substr( esc_html( trim( get_theme_mod( 'theme_color_0' ) ) ), 1 );
                $themeColor0Hex = str_split( $themeColor0, 2);
                $themeColor0RGB = array( hexdec( $themeColor0Hex[0] ), hexdec( $themeColor0Hex[1] ), hexdec( $themeColor0Hex[2] ) );
            } else {
                $themeColor0 = "#ac8949";
                $themeColor0RGB = array(172, 137, 73);
            }
                           
            if ( trim( get_theme_mod( 'theme_color_1' ) ) !== "" ) { 
                $themeColor1 = substr( esc_html( trim( get_theme_mod( 'theme_color_1' ) ) ), 1 );
                $themeColor1Hex = str_split( $themeColor1, 2);
                $themeColor1RGB = array( hexdec( $themeColor1Hex[0] ), hexdec( $themeColor1Hex[1] ), hexdec( $themeColor1Hex[2] ) );
            } else {
                $themeColor1 = "#64460e";
                $themeColor1RGB = array(100, 74, 14); 
            }
            
            if ( trim( get_theme_mod( 'theme_color_2' ) ) !== "" ) { 
                $themeColor2 = substr( esc_html( trim( get_theme_mod( 'theme_color_2' ) ) ), 1 );
                $themeColor2Hex = str_split( $themeColor2, 2);
                $themeColor2RGB = array( hexdec( $themeColor2Hex[0] ), hexdec( $themeColor2Hex[1] ), hexdec( $themeColor2Hex[2] ) );
            } else {
                $themeColor2 = "#fbe3b7";
                $themeColor2RGB = array(251, 227, 183);
            }
            ?>
            
            h1, h2, h3, h4, h5, h6 { color: <?php echo $themeColor1; ?>; }
            .body-wrapper a:link, .body-wrapper a:visited { color: <?php echo $themeColor1; ?>; }
            a:hover { color: <?php echo $themeColor0; ?>; }
            .body-wrapper input:focus, textarea:focus { box-shadow: 0px 0px 3px 3px rgba(<?php echo $themeColor0RGB[0]; ?>, <?php echo $themeColor0RGB[1]; ?>, <?php echo $themeColor0RGB[2]; ?>, 0.6); }
            input::placeholder, textarea::placeholder { color: <?php echo $themeColor1; ?>; }
            th { color: <?php echo $themeColor1; ?>; }
               
                
            /* Header styles */
            .header { 
                <?php if ( get_header_image() ) { ?> 
                    background: url('<?php echo esc_url( header_image() ); ?>') 50% 50%/cover no-repeat; 
                <?php } else { ?> 
                    background: linear-gradient(<?php echo $themeColor2; ?>, #f3f3f3);    
                <?php } ?>
            }
            .main-title .main-title__title { color: <?php echo $themeColor0; ?>; }
            .header__subtitle { color: <?php echo $themeColor1; ?>; }
            .header__phone { color: <?php echo $themeColor1; ?>; }
             
            
            /*Message styles*/
            .message { background-color: <?php echo $themeColor0; ?>; }
            
             
            /*Additional WordPress generated classes.*/
            .wp-block-button__link.is-style-outline { color: <?php echo $themeColor1; ?>; }

            
            /* Nav styles */
            .nav { background-color: <?php echo $themeColor1; ?>; }
            .nav a:hover { color: <?php echo $themeColor2; ?>; }
            
            
            /*Footer Styles*/
            .footer { background-color: <?php echo $themeColor2; ?>; }
            .footer__subheader { color: <?php echo $themeColor1; ?>; }
            
            .footer__social a { color: <?php echo $themeColor1; ?>; }
            .footer__location-phone__phone { color: <?php echo $themeColor1; ?>; }
            
            
            /*Comments*/
            .comment-form label { color: <?php echo $themeColor1; ?>; }
            
            .comments .fn { color: <?php echo $themeColor1; ?>; }
            
            
            /*Search*/
            #searchsubmit { background-color: <?php echo $themeColor1; ?>; color: <?php echo $themeColor2; ?>; }
            
            
            /*General styles*/
            
            .body-wrapper .read-more { background-color: <?php echo $themeColor1; ?>; color: <?php echo $themeColor2; ?>; }
            
            .wp-block-button__link { background-color: <?php echo $themeColor1; ?>; color: <?php echo $themeColor2; ?>; }
            
            
            /*Index page*/
            .index__blog__categories { color: <?php echo $themeColor1; ?>; }
            .index__blog__author { color: <?php echo $themeColor1; ?>; }
            .index__blog__date { color: <?php echo $themeColor1; ?>; } 
                 
                                 
            /*Blog*/
            
            .blog__featured { background-color: <?php echo $themeColor1; ?>; }
            .blog__title { color: <?php echo $themeColor1; ?>; }
            .blog__author { color: <?php echo $themeColor1; ?>; }
            .blog__author a { color: <?php echo $themeColor1; ?>; }
            .blog__date { color: <?php echo $themeColor1; ?>; }
            .blog__categories { color: <?php echo $themeColor1; ?>; }
            .blog__tags { color: <?php echo $themeColor1; ?>; }
            .blog__number-of-comments { color: <?php echo $themeColor1; ?>; }



            @media only screen and (min-width: 1200px){ 
                /* Nav styles */
                 .nav li:hover > ul { background-color: #64460e; }
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