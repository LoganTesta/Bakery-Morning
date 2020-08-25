
<?php get_header(); ?>

            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <p>It looks like that page or link is not found.  Please select one of the links in the navbar to get to
                                    another page in our site.</p>
                                <div class="content__featured-image <?php if( trim(the_post_thumbnail_url() ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
                            </div>  
                        </div>
                    </div>  
                    <?php 
                    //Show most recent blog posts on index page only.
                    if ( is_front_page() && get_theme_mod( 'index_show_blog_code' ) ) { ?>                     
                        <div class="content-row">
                            <h3 class="index-content__subheading"><?php echo get_theme_mod( 'index_blog_heading_code' ); ?></h3>
                            <?php global $post;
                            if( get_theme_mod( 'index_blog_order_code' ) === 'desc' ) {
                                $args = array( 'posts_per_page' => 4, 'offset' => 0, 'orderBy' => 'date', 'order' => get_theme_mod( 'index_blog_order_code' ) ); 
                            } else {
                                $args = array( 'posts_per_page' => 4, 'offset' => wp_count_posts( 'post' )->publish - 4, 'orderBy' => 'date', 'order' => get_theme_mod( 'index_blog_order_code' ) );     
                            }
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
                                        <div class="index__blog__author">By <?php the_author(); ?><span class="index__blog__author__extra-text">, </span></div>
                                        <div class="index__blog__date"><?php echo get_the_date(); ?></div>
                                        <div class="index__blog__image"><a href="blog#<?php the_title(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a> 
                                            <div class="clear-both"></div>
                                        </div>
                                        <div class="index__blog__content"><?php the_excerpt(); ?></div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>  
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php get_footer(); ?>
