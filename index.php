
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php echo get_theme_mod( "meta_description_code" ); ?>" />
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
                    <h2 class="header__subtitle"><?php single_post_title(); ?></h2>
                    <?php if( trim( get_theme_mod ( 'phone_code' ) ) !== "" ){ ?>
                        <div class="header__phone"><?php echo get_theme_mod( 'phone_code' ); ?></div>
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
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php
                                //Output the page content for the posts page here.
                                if( is_home() ){ 
                                    global $post;
                                    $blog_page_id = get_option( 'page_for_posts' );
                                    if ( $blog_page_id ) {
                                        $post = get_page( $blog_page_id );
                                        setup_postdata( $post );
                                        ?>
                                            <div class="content__featured-image <?php if(trim(the_post_thumbnail_url()) === "") { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>    
                                        <?php
                                        the_content();
                                        rewind_posts();
                                    }
                                } else {
                                    ?>
                                        <div class="content__featured-image <?php if(trim(the_post_thumbnail_url()) === "") { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>    
                                    <?php
                                }
                                
                                //Show all pages' (besides the posts page) content, and on every page including the posts page, show any posts on that page.
                                while (have_posts()) : the_post(); //You need a while loop to call the_content().
                                    if( is_home() === false ){
                                        the_content(); 
                                    } else {
                                        ?>
                                        <div class="blog">
                                            <div class="blog__title"><?php the_title(); ?></div>
                                            <div class="blog__categories">
                                                <?php
                                                $categories = get_the_category();
                                                $h = 0;
                                                foreach ( $categories as $category ) {
                                                    $h++;
                                                }
                                                $h = $h - 1;
                                                $i = 0;
                                                foreach ( $categories as $category ) {
                                                    $result = "";
                                                    if ( $i < $h ) {
                                                        $result .= $category->name . ", ";
                                                    } else {
                                                        $result .= $category->name;
                                                    }
                                                    echo $result;
                                                    $i++;
                                                }
                                            ?>
                                            </div>
                                            <div class="blog__date"><?php the_date(); ?></div>
                                            <div class="blog__content"><?php the_content(); ?></div>
                                            <?php if( has_post_thumbnail() ) { echo "<div class='blog__image' style=\"background-image: url('" . get_the_post_thumbnail_url() . "')\"></div>"; } ?>
                                       </div>
                                       <?php
                                    }
                                endwhile;
                                wp_reset_query(); //Reset the page query
                                ?>
                            </div>  
                        </div>
                    </div>                   
                    <div class="content-row">
                        <?php
                        //Show top blog posts on index page only.
                        if ( is_front_page() ) { ?>
                            <h3 class="index-content__subheading">Recent Blog Posts</h3>
                            <?php global $post;
                            $args = array( 'posts_per_page' => 4, 'orderBy' => 'date', 'order' => 'asc' );
                            $postsToDisplay = get_posts( $args );
                            foreach ( $postsToDisplay as $post ) : setup_postdata( $post );
                                ?>      
                                <div class="col-sma-3">
                                    <div class="index__blog">
                                        <h4 class="index__blog__title"><a href="blog#<?php the_title(); ?>" class="index__blog__title__link"><?php the_title(); ?></a></h4>
                                        <div class="index__blog__categories"><?php
                                            $categories = get_the_category();
                                            $h = 0;
                                            foreach ( $categories as $category ) {
                                                $h++;
                                            }
                                            $h = $h - 1;
                                            $i = 0;
                                            foreach ( $categories as $category ) {
                                                $result = "";
                                                if ( $i < $h ) {
                                                    $result .= $category->name . ", ";
                                                } else {
                                                    $result .= $category->name;
                                                }
                                                echo $result;
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                        <div class="index__blog__date"><?php the_date(); ?></div>
                                        <div class="index__blog__image"><a href="blog#<?php the_title(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a> 
                                            <div class="clear-both"></div>
                                        </div>
                                        <div class="index__blog__content"><?php the_excerpt(); ?></div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            <?php 
                            endforeach;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="message">
                <?php if( trim(get_bloginfo( 'description' )) !== "") { ?>
                    <div class="message__text"><?php echo get_bloginfo( 'description' ); ?></div>
                <?php } ?>
            </div>
            <footer>
                <div class="content-wrapper inner-wrapper">   
                    <div class="content-row">
                        <div class="footer__copyright">&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. All Rights Reserved.</div>
                    </div>
                    <div class="content-row">
                        <div class="footer__nav col-sma-2">
                            <h4 class="footer__subheader">Links</h4>
                            <?php wp_nav_menu( array( 'theme_location'=>'footer-nav' ) ); ?>
                        </div>
                        <div class="footer__social col-sma-4">
                            <h4 class="footer__subheader">Social</h4>
                            <?php if( trim( get_theme_mod ( 'pinterest_code' ) ) !== "" ){ ?>
                                <div class="footer__social-logo pinterest">
                                    <a href="<?php echo get_theme_mod ( 'pinterest_code' ); ?>" target="_blank"><i class="fab fa-pinterest-p fa-2x social-icon"><span class="sr-only">Pinterest</span></i>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if( trim( get_theme_mod ( 'instagram_code' ) ) !== "" ){ ?>
                                <div class="footer__social-logo instagram">
                                    <a href="<?php echo get_theme_mod ( 'instagram_code' ); ?>" target="_blank"><i class="fab fa-instagram fa-2x social-icon"><span class="sr-only">Instagram</span></i>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if( trim( get_theme_mod ( 'facebook_code' ) ) !== "" ){ ?>
                                <div class="footer__social-logo facebook">
                                    <a href="<?php echo get_theme_mod ( 'facebook_code' ); ?>" target="_blank"><i class="fab fa-facebook fa-2x social-icon"><span class="sr-only">Facebook</span></i>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if( trim( get_theme_mod ( 'twitter_code' ) ) !== "" ){ ?>
                                <div class="footer__social-logo twitter">
                                    <a href="<?php echo get_theme_mod ( 'twitter_code' ); ?>" target="_blank"><i class="fab fa-twitter  fa-2x social-icon"><span class="sr-only">Twitter</span></i>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if( trim( get_theme_mod ( 'youtube_code' ) ) !== "" ){ ?>
                                <div class="footer__social-logo youtube">
                                    <a href="<?php echo get_theme_mod ( 'youtube_code' ); ?>" target="_blank"><i class="fab fa-youtube fa-2x social-icon"><span class="sr-only">Youtube</span></i>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="footer__location-phone col-sma-3">
                            <h4 class="footer__subheader">Location</h4>
                            <?php if( trim( get_theme_mod ( 'location_code' ) ) !== "" ){ ?>
                                <div class="footer__location-phone__location"><?php echo get_theme_mod( 'location_code' ); ?></div>
                            <?php } ?>
                            <?php if( trim( get_theme_mod ( 'phone_code' ) ) !== "" ){ ?>
                                <div class="footer__location-phone__phone"><?php echo get_theme_mod( 'phone_code' ); ?></div>
                            <?php } ?>
                        </div>
                        <div class="footer__hours col-sma-3">
                            <h4 class="footer__subheader">Hours</h4>     
                            <?php if( trim( get_theme_mod ( 'hours_code0' ) ) !== "" ) { echo "<div class='footer__hours__day'>" . get_theme_mod( 'hours_code0' ) . "</div>"; } ?>
                            <?php if( trim( get_theme_mod ( 'hours_code1' ) ) !== "" ) { echo "<div class='footer__hours__day'>" . get_theme_mod( 'hours_code1' ) . "</div>"; } ?>
                            <?php if( trim( get_theme_mod ( 'hours_code2' ) ) !== "" ) { echo "<div class='footer__hours__day'>" . get_theme_mod( 'hours_code2' ) . "</div>"; } ?>
                            <?php if( trim( get_theme_mod ( 'hours_code3' ) ) !== "" ) { echo "<div class='footer__hours__day'>" . get_theme_mod( 'hours_code3' ) . "</div>"; } ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <?php wp_footer(); ?>
</html>