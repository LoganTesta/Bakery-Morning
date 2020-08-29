<?php

?>

            <div class="message">
                <?php if( trim(get_bloginfo( 'description' )) !== "") { ?>
                    <div class="message__text"><?php echo get_bloginfo( 'description' ); ?></div>
                <?php } ?>
            </div>
            <footer>
                <div class="inner-wrapper">   
                    <div class="content-row">
                        <div class="footer__copyright col-sma-12">&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. All Rights Reserved.</div>
                    </div>
                    <?php if ( is_active_sidebar( 'widgetized-area' ) ) : ?>
                    <div class="content-row">                   
                         <div class="col-sma-12">
                            <div class="footer__widgets">
                                <?php dynamic_sidebar( 'widgetized-area' ); ?>
                            </div>
                        </div>    
                    </div>
                    <?php endif; ?>
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
                                    <a href="<?php echo get_theme_mod ( 'twitter_code' ); ?>" target="_blank"><i class="fab fa-twitter fa-2x social-icon"><span class="sr-only">Twitter</span></i>
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