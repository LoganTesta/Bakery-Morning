<?php
//The default page layout and template.  
get_header();
?>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php
                                //General layout.  Show content on all pages.  For the blog page, extra code to show the post page's content, and then
                                //show the blog posts.
                                if( is_home() === false ){ ?>
                                    <div class="content__featured-image <?php if( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>')"></div>    
                                    <?php the_content(); 
                                 } else if( is_home() ){ 
                                    $blog_page_id = get_option( 'page_for_posts' );
                                    if ( $blog_page_id ) {
                                        $selected_post = get_page( $blog_page_id );
                                        setup_postdata( $selected_post );
                                        ?>
                                        <div class="content__featured-image <?php if( esc_url( trim( the_post_thumbnail_url() ) ) === "" ) { echo "hide"; } ?>" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url() ); ?>')"></div>    
                                        <?php
                                        the_content();
                                        rewind_posts();
                                    }
                                    while (have_posts()) : the_post(); //You need a while loop to call the_content(). ?>
                                        <div id="<?php the_title(); ?>" <?php echo esc_attr( post_class( "blog" ) ); ?>>
                                            <?php if ( is_sticky() ) {
                                                echo "<div class='blog__featured'>" . _x( "Featured ", "post", "bakery-morning" ) . "</div>";
                                            } ?>
                                            <div class="blog__title"><a class="blog__title__link" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php the_title(); ?></a></div>
                                            <div class="blog__categories">
                                                <?php
                                                if( has_category() ) { echo "Categories: "; }
                                                $categories = get_the_category();
                                                $h = 0;
                                                foreach ( $categories as $category ) {
                                                    $h++;
                                                }
                                                $h = $h - 1;
                                                $i = 0;
                                                foreach ( $categories as $category ) {
                                                    echo "<a href='" . esc_url( get_category_link( $category ) ) . "'>";
                                                    if ( $i < $h ) {
                                                        echo "" . esc_html( $category->name ) . ", ";
                                                    } else {
                                                        echo "" . esc_html( $category->name );
                                                    }
                                                    echo "</a>";
                                                    $i++;
                                                }
                                                ?>
                                            </div>
                                            <div class="blog__tags"><?php the_tags(); ?></div>
                                            <div class="blog__author">By: <?php the_author(); ?></div>
                                            <div class="blog__date"><?php echo get_the_date(); ?></div>
                                            <?php if( has_post_thumbnail() ) { echo "<div class='blog__image' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"></div>"; } ?>
                                            <div class="blog__content"><?php the_content(); ?></div>    
                                            <div class="blog__number-of-comments">
                                                <?php 
                                                    if( get_comments_number() > 0 ) {
                                                        echo "<a class='blog__number-of-comments__link' href='" . esc_url( get_permalink( get_the_ID() ) ) . "#comments'>" . esc_html( get_comments_number() );
                                                    } else {
                                                        echo "<a class='blog__number-of-comments__link' href='" . esc_url( get_permalink( get_the_ID() ) ) . "#respond'>Leave a Comment";
                                                    }
                                                    if( get_comments_number() === "1" ){
                                                        echo " Comment";
                                                    } else if ( get_comments_number() > "1" ){
                                                        echo " Comments";
                                                    }
                                                    echo "</a>";
                                                ?>
                                            </div>   
                                            <div class="clear-both"></div>
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
                            <?php
                            $index_page_query;
                            if( get_theme_mod( 'index_blog_order_code' ) === 'desc' ) {
                                $index_page_query = new WP_Query( 
                                    array( 'posts_per_page' => 4, 'offset' => 0, 'orderBy' => 'date', 'order' => get_theme_mod( 'index_blog_order_code' ) 
                                ) ); 
                            } else {
                                $index_page_query = new WP_Query( 
                                    array( 'posts_per_page' => 4, 'offset' => wp_count_posts( 'post' )->publish - 4, 'orderBy' => 'date', 'order' => get_theme_mod( 'index_blog_order_code' ) 
                                ) );     
                            }
                            if( $index_page_query->have_posts() ) {
                                while( $index_page_query->have_posts() ) : $index_page_query->the_post(); ?>   
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
                                                    echo esc_html( $result );
                                                    $i++;
                                                }
                                                ?>
                                            </div>
                                            <div class="index__blog__author">By <?php the_author(); ?></div>
                                            <div class="index__blog__date"><?php echo get_the_date(); ?></div>
                                            <?php if( has_post_thumbnail() ) { echo "<div class='index__blog__image' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"><a class='index__blog__link' href='blog#" . esc_url( get_the_title() ) . "'></a></div>"; } ?>
                                            <div class="index__blog__content"><?php the_excerpt(); ?></div>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                <?php endwhile;
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php get_footer(); ?>
