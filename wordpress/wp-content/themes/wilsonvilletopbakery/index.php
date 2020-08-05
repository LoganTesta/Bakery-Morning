

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Delicius baked goods featured including bread, cookies, pastries, pies, cakes, and more." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="bakery, bread, whole wheat, cookies, scones, pastries, cupcakes, cakes, pies, Oregon" />
        <title>Wilsonville Top Bakery</title>
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
        <link rel="icon" type="image/png" href="<?php echo "" . get_template_directory_uri(); ?>/assets/images/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 

        <?php
        wp_head();
        ?>

    </head>
    <body>
        <header>
            <div class="inner-wrapper">
                <div class="logo">
                    <a href="index"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Wilsonville Top Bakery Logo."></a>
                </div>
                <h1 class="main-title"><a class="main-title__title" href="index">Wilsonville Top Bakery</a></h1>
                <h2 class="header__subtitle"><?php the_title(); ?></h2>
            </div>
        </header>
        <nav class="nav desktop-nav" id="desktop-nav">
            <div class="inner-wrapper">
                <ul>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="index">Home</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="about">About</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="products">Products</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="careers">Careers</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="blog">Blog</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="contact-us">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <nav class="nav mobile-nav">
            <div id="dropdownButton"></div>
            <div id="dropdownContent">
                <ul>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="index">Home</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="about">About</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="products">Products</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="careers">Careers</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="blog">Blog</a></li>
                    <li class="nav__nav-item"><a class="nav__nav-link" href="contact-us">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="content">
            <div class="inner-wrapper">
                <?php
                while (have_posts()) : the_post(); //You need a while loop to call the_content(). 
                    ?>

                    <?php the_content(); ?>

                    <?php
                endwhile;
                wp_reset_query(); //Reset the page query
                ?>
            </div>
        </div>
        <div class="message" v-on:mouseover="changeText" v-on:mouseout="changeText" v-bind:style="message"></div>
        <footer>
            <div class="content-wrapper inner-wrapper">     
                <div class="content-row">
                    <div class="footer__copyright">
                        <p>&copy; <?php echo date("Y"); ?> Wilsonville Top Bakery. All Rights Reserved.</p>
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
        <script>
            document.addEventListener("DOMContentLoaded", function () {                
                let pageNumber = <?php echo get_the_ID(); ?>;
                if(pageNumber === 11){
                      setCurrentPage(0);
                } else if(pageNumber === 46){
                      setCurrentPage(1);
                } else if(pageNumber === 50){
                      setCurrentPage(2);
                } else if(pageNumber === 14){
                      setCurrentPage(3);
                } else if(pageNumber === 44){
                      setCurrentPage(4);
                }  
            });
        </script> 
    </body>
    <?php
    wp_footer();
    ?>
</html>