
<?php
get_header();
$withcomments = "1";
?>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php
                                //General layout.  Show content on all pages.  For the blog page, extra code to show the post page's content, and then
                                //show the blog posts.
                                if( is_home() === false ){
                                    the_content(); ?>
                                    <div class="content__featured-image <?php if( trim( the_post_thumbnail_url() ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>    
                                    <?php
                                 } else if( is_home() ){ 
                                    global $post;
                                    $blog_page_id = get_option( 'page_for_posts' );
                                    if ( $blog_page_id ) {
                                        $post = get_page( $blog_page_id );
                                        setup_postdata( $post );
                                        ?>
                                        <div class="content__featured-image <?php if( trim( the_post_thumbnail_url() ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>    
                                        <?php
                                        the_content();
                                        rewind_posts();
                                    }
                                    
                                    while (have_posts()) : the_post(); //You need a while loop to call the_content(). ?>
                                        <div id="<?php the_title(); ?>" class="blog">
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
                                            <div class="blog__tags"><?php the_tags(); ?></div>
                                            <div class="blog__author">By: <?php the_author(); ?></div>
                                            <div class="blog__date"><?php echo get_the_date(); ?></div>
                                            <div class="blog__content"><?php the_content(); ?></div>
                                            <?php if( has_post_thumbnail() ) { echo "<div class='blog__image' style=\"background-image: url('" . get_the_post_thumbnail_url() . "')\"></div>"; } ?>
                                            <?php 
                                                if( comments_open() ) {
                                                    comments_template();
                                                } 
                                            ?>
                                        </div>
                                    <?php endwhile; ?>
                                        <div class="posts__navigation">
                                            <?php the_posts_pagination( 
                                                array( 'mid_size' => 2, 'prev_text' => __( '<< Prev', 'bakery-morning' ), 'next_text' => __( 'Next >>', 'bakery-morning' ) )
                                            ); ?>
                                        </div>    
                                    <?php wp_reset_query(); //Reset the page query
                                } ?>
                            </div>  
                        </div>
                    </div>  
                    <?php 
                    //Index page only: show most recent blog posts.
                    if ( is_front_page() && get_theme_mod( 'index_show_blog_code' ) ) { ?>                     
                        <div class="content-row">
                            <h3 class="index-content__subheading"><?php echo esc_html( get_theme_mod( 'index_blog_heading_code' ) ); ?></h3>
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
                                        <?php if( has_post_thumbnail() ) { echo "<div class='index__blog__image' style=\"background-image: url('" . get_the_post_thumbnail_url() . "')\"><a class='index__blog__link' href='blog#" . get_the_title() . "'></a></div>"; } ?>
                                        <div class="index__blog__content"><?php echo wp_trim_words( get_the_excerpt(), 40 ); ?></div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>  
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php get_footer(); ?>
