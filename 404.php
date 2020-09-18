<?php get_header(); ?>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <p>It looks like that page or link is not found.  Please select one of the links in the navbar to get to
                                    another page in our site.</p>
                                <div class="content__featured-image <?php if( trim( the_post_thumbnail_url() ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
                            </div>  
                        </div>
                    </div>  
                </div>
            </div>
            <?php get_footer(); ?>
