
<?php get_header(); ?>

            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php
                                //Output the page content for the posts page here.
                                the_content();
                                
                                if( comments_open() ) {
                                    comments_template();
                                }
                                ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <?php get_footer(); ?>
