<?php 
//This template is for individual blog post pages.
get_header(); 

$format = get_post_format();

?>
            <div class="inner-wrapper">
                <div id="post_<?php the_ID(); ?>" <?php echo esc_attr( post_class( "content page-content" ) ); ?>>
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php while ( have_posts() ) : the_post(); //You need a while loop to call the_author(). ?>
                                <?php if ( $format === "standard" || ( $format !== "image" && $format !== "video" ) ) { ?>
                                <div class="blog">
                                    <div class="blog__title"><?php the_title(); ?></div>
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
                                        echo "<div class=\"blog__categories__names\">";
                                        foreach ( $categories as $category ) {
                                            echo "<a href='" . esc_url( get_category_link( $category ) ) . "'>";
                                            if ( $i < $h ) {
                                                echo esc_html( $category->name ) . ", ";
                                            } else {
                                                echo esc_html( $category->name );
                                            }
                                            echo "</a>";
                                            $i++;
                                        }
                                        echo "</div>";
                                    ?>
                                    </div>
                                    <div class="blog__tags">
                                        <i class="tags fa fa-tag"></i>
                                        <?php the_tags("<div class=\"blog__tags__names\">", ", ", "</div>"); ?>
                                    </div>
                                    <div class="blog__author">By: <?php the_author_posts_link(); ?></div>
                                    <div class="blog__date"><?php echo get_the_date(); ?></div>
                                    <div class="blog__content"><?php the_content(); ?></div>
                                    <?php if ( has_post_thumbnail() ) { 
                                        echo "<div class='blog__image'>";
                                            echo "<div class='blog__image__background' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"></div>"; 
                                            echo "<span class='blog__image__caption'> " . esc_html( get_the_post_thumbnail_caption() ) . "</span>";
                                            echo "<span class='blog__image__description'>" . esc_html( get_post( get_post_thumbnail_id() )->post_content ) . "</span>"; 
                                            echo "<div class='clear-both'></div>";
                                        echo "</div>";
                                    } ?>
                                    <?php 
                                        if ( comments_open() ) {
                                            comments_template();
                                        } 
                                    ?>
                                </div>
                                <?php } else if ( $format === "image" ) { ?>
                                <div class="blog">
                                    <div class="blog__title"><?php the_title(); ?></div>
                                    <?php if ( has_post_thumbnail() ) { 
                                        echo "<div class='blog__image'>";
                                            echo "<div class='blog__image__background' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"></div>"; 
                                            echo "<span class='blog__image__caption'> " . esc_html( get_the_post_thumbnail_caption() ) . "</span>";
                                            echo "<span class='blog__image__description'>" . esc_html( get_post( get_post_thumbnail_id() )->post_content ) . "</span>";
                                            echo "<div class='clear-both'></div>";
                                        echo "</div>";
                                    } ?>
                                    <div class="blog__author">By: <?php the_author_posts_link(); ?></div>
                                    <div class="blog__date"><?php echo get_the_date(); ?></div>
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
                                        echo "<div class=\"blog__categories__names\">";
                                        foreach ( $categories as $category ) {
                                            echo "<a href='" . esc_url( get_category_link( $category ) ) . "'>";
                                            if ( $i < $h ) {
                                                echo esc_html( $category->name ) . ", ";
                                            } else {
                                                echo esc_html( $category->name );
                                            }
                                            echo "</a>";
                                            $i++;
                                        }
                                        echo "</div>";
                                    ?>
                                    </div>
                                    <div class="blog__tags">
                                        <i class="tags fa fa-tag"></i>
                                        <?php the_tags("<div class=\"blog__tags__names\">", ", ", "</div>"); ?>
                                    </div>
                                    <div class="blog__content"><?php the_content(); ?></div>                           
                                    <?php 
                                        if ( comments_open() ) {
                                            comments_template();
                                        } 
                                    ?>
                                </div>
                                <?php } else if ( $format === "video" ) { ?>
                                <div class="blog">
                                    <div class="blog__title"><?php the_title(); ?></div>
                                    <div class="blog__content"><?php the_content(); ?></div>  
                                    <div class="blog__author">By: <?php the_author_posts_link(); ?></div>
                                    <div class="blog__date"><?php echo get_the_date(); ?></div>
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
                                        echo "<div class=\"blog__categories__names\">";
                                        foreach ( $categories as $category ) {
                                            echo "<a href='" . esc_url( get_category_link( $category ) ) . "'>";
                                            if ( $i < $h ) {
                                                echo esc_html( $category->name ) . ", ";
                                            } else {
                                                echo esc_html( $category->name );
                                            }
                                            echo "</a>";
                                            $i++;
                                        }
                                        echo "</div>";
                                    ?>
                                    </div>
                                    <div class="blog__tags">
                                        <?php the_tags("<div class=\"blog__tags__names\">", ", ", "</div>"); ?>
                                        <?php the_tags(""); ?>
                                    </div>
                                    <?php if ( has_post_thumbnail() ) { 
                                        echo "<div class='blog__image'>";
                                            echo "<div class='blog__image__background' style=\"background-image: url('" . esc_url( get_the_post_thumbnail_url() ) . "')\"></div>"; 
                                            echo "<span class='blog__image__caption'> " . esc_html( get_the_post_thumbnail_caption() ) . "</span>";
                                            echo "<span class='blog__image__description'>" . esc_html( get_post( get_post_thumbnail_id() )->post_content ) . "</span>";
                                            echo "<div class='clear-both'></div>";
                                        echo "</div>";
                                    } ?>
                                    <?php 
                                        if ( comments_open() ) {
                                            comments_template();
                                        } 
                                    ?>
                                    <div class="clear-both"></div>
                                </div>
                                <?php } ?>
                                <?php wp_link_pages( array( 'before' => '<div class="post-nav-links"><span class="post-page-numbers">' . __( 'Pages:', 'bakery-morning') . '</span>', 'after' => '</div>' ) ); ?>
                                <?php endwhile; ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <?php get_footer(); ?>
