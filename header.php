<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo get_theme_mod( "meta_description_code" ); ?>" />
        <meta name="keywords" content="<?php echo get_theme_mod( "meta_keywords_code" ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if( get_the_title() !== "Index" && get_the_title() !== "Home" ) { if( !is_404() ) { echo single_post_title(); } else { echo "404"; } echo " | "; } ?><?php echo get_bloginfo( 'name' ); ?></title>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
        <style type="text/css">
            .header { 
                <?php if( get_theme_mod( 'background_image' ) !== "" ) { ?> 
                    background: url('<?php echo get_theme_mod( 'background_image' ); ?>') 50% 50%/cover no-repeat; 
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
                    <div class="logo">
                        <a href="index">
                            <?php
                                $logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $logo_id, 'full' );
                            ?>
                            <img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?> logo">
                        </a>
                    </div>
                    <h1 class="main-title"><a class="main-title__title" href="index" style="<?php if( get_theme_mod( 'background_image' ) !== "") { echo "color: #ffffff;"; } ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                    <h2 class="header__subtitle" style="<?php if( get_theme_mod( 'background_image' ) !== "" ) { echo "color: #ffffff;"; } ?>"><?php if( !is_404() ) { single_post_title(); } else { echo "404 Error"; } ?></h2>
                    <?php if( trim( get_theme_mod ( 'phone_code' ) ) !== "" ){ ?>
                        <div class="header__phone" style="<?php if( get_theme_mod( 'background_image' ) !== "" ) { echo "color: #ffffff;"; } ?>"><?php echo get_theme_mod( 'phone_code' ); ?></div>
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