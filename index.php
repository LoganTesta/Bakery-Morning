
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo get_theme_mod( "meta_settings_code" ); ?>" />
        <meta name="keywords" content="<?php echo get_theme_mod( "meta_keywords_code" ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if( get_the_title() !== "Index" && get_the_title() !== "Home" ) { echo get_the_title() . " | "; } ?><?php echo get_bloginfo( 'name' ); ?></title>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="body-wrapper">
            <header>
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
                    <h1 class="main-title"><a class="main-title__title" href="index"><?php echo get_bloginfo( 'name' ); ?></a></h1>
                    <h2 class="header__subtitle"><?php the_title(); ?></h2>
                </div>
            </header>
            <nav class="nav desktop-nav" id="desktop-nav">
                <div class="inner-wrapper">
                    <?php
                        wp_nav_menu();
                    ?>
                </div>
            </nav>
            <nav class="nav mobile-nav">
                <div id="dropdownButton"></div>
                <div id="dropdownContent">
                    <?php
                        wp_nav_menu();
                    ?>
                </div>
            </nav>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="content__body">
                            <?php
                            while (have_posts()) : the_post(); //You need a while loop to call the_content(). 
                                ?>
                                <?php the_content(); ?>
                                <?php
                            endwhile;
                            wp_reset_query(); //Reset the page query
                            ?>
                        </div>
                        <div class="content__featured-image <?php if(trim(the_post_thumbnail_url()) === "") { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
                    </div>
                </div>
            </div>
            <div class="message"></div>
            <footer>
                <div class="content-wrapper inner-wrapper">     
                    <div class="content-row">
                        <div class="footer__copyright">
                            <p>&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. All Rights Reserved.</p>
                        </div>
                        <div class="footer__social col-sma-4">
                            <h4 class="footer__subheader">Social</h4>
                            <div class="footer__social-logo facebook">
                                <a href=""><i class="fab fa-facebook-f fa-2x social-icon"><span class="sr-only">Facebook</span></i>
                                </a>
                            </div>
                            <div class="footer__social-logo instagram">
                                <a href=""><i class="fab fa-instagram fa-2x social-icon"><span class="sr-only">Instagram</span></i></a>
                            </div>
                            <div class="footer__social-logo twitter">
                                <a href=""><i class="fab fa-twitter fa-2x social-icon"><span class="sr-only">Twitter</span></i></a>
                            </div>
                        </div>
                        <div class="footer__location col-sma-4">
                            <h4 class="footer__subheader">Location</h4>
                            <div>3388 SW Wilsonville Road, Wilsonville, Oregon 97070</div>
                        </div>
                        <div class="footer__hours col-sma-4">
                            <h4 class="footer__subheader">Hours</h4>
                            <div class="footer__hours__day">Monday-Friday 7:00 AM-8:00 PM</div>
                            <div class="footer__hours__day">Saturday 8:00 AM-8:00 PM</div>
                            <div class="footer__hours__day">Sunday 8:00 AM-5:00 PM</div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <?php wp_footer(); ?>
</html>