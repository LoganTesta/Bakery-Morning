<?php
//The default page layout and template.  
get_header();
?>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <div class="search-results-statement">Search results for: <span class="search-query"><?php echo get_search_query(); ?></span></div> 
                                <div class="blog-posts">
                                    <?php while ( have_posts()) : the_post(); //You need a while loop to call the_content(). ?>
                                        <div id="<?php the_title(); ?>" <?php echo esc_attr( post_class( "blog" ) ); ?>>
                                            <?php if ( is_sticky() ) {
                                                echo "<div class='blog__featured'>" . esc_html( _x( "Featured ", "post", "bakery-morning" ) ) . "</div>";
                                            } ?>
                                            <div class="blog__title"><a class="blog__title__link" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"><?php the_title(); ?></a></div>
                                            <div class="blog__author">By: <?php the_author_posts_link(); ?></div>
                                            <div class="blog__date">
                                                <a class="blog__date__link" href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">
                                                    <?php echo get_the_date(); ?>
                                                </a>
                                            </div>
                                            <div class="blog__categories">
                                                <?php
                                                if ( has_category() ) { echo "<i class=\"folder fa fa-folder-open\"></i>"; }
                                                $categories = get_the_category();
                                                $h = 0;
                                                foreach ( $categories as $category ) {
                                                    $h++;
                                                }
                                                $h = $h - 1;
                                                $i = 0;
                                                echo "<div class=\"category__names\">";
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
                                                echo "</div>";
                                                ?>
                                            </div>
                                            <div class="blog__tags">
                                                <?php if ( has_tag() ) { ?>
                                                    <i class="tags fa fa-tag"></i>
                                                    <?php the_tags("<div class=\"tag__names\">", ", ", "</div>"); ?>
                                                <?php } ?>
                                            </div>
                                            <?php if ( has_post_thumbnail() ) { 
                                                echo "<div class='blog__image'>";
                                                    echo "<div class='blog__image__background' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"></div>"; 
                                                    echo "<span class='blog__image__caption'> " . esc_html( get_the_post_thumbnail_caption() ) . "</span>";
                                                    echo "<div class='clear-both'></div>";
                                                echo "</div>";
                                            } ?>
                                            <div class="blog__content"><?php the_content(); ?></div>    
                                            <div class="blog__number-of-comments">
                                                <?php 
                                                    if ( get_comments_number() > 0 ) {
                                                        echo "<a class='blog__number-of-comments__link' href='" . esc_url( get_permalink( get_the_ID() ) ) . "#comments'>" . esc_html( get_comments_number() );
                                                    } else {
                                                        echo "<a class='blog__number-of-comments__link' href='" . esc_url( get_permalink( get_the_ID() ) ) . "#respond'>Leave a Comment";
                                                    }
                                                    if ( get_comments_number() === "1" ){
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
                                </div> 
                            </div>  
                        </div>
                    </div>  
                </div>
            </div>
            <?php get_footer(); ?>
