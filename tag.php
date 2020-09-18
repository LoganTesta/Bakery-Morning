<?php
//This is a special page just for showing all posts with a given tag.
get_header();
$withcomments = "1";
?>
            <div class="inner-wrapper">
                <div class="content page-content">
                    <div class="content-row">
                        <div class="col-sma-12">
                            <div class="content__body">
                                <?php
                                echo "<div class='archive-page-heading'><h3 class='archive-page-heading__title'>Show all posts for the tag: <span class='archive-page-heading__name'>" . get_queried_object()->slug . "</span></h3></div>";
                                while (have_posts()) : the_post(); ?>
                                    <div class="blog">
                                        <div class="blog__header">
                                            <div class="blog__title"><?php the_title(); ?></div>
                                            <div class="blog__author">-- <?php the_author(); ?>,</div>
                                            <div class="blog__date"><?php echo get_the_date(); ?></div>
                                        </div>
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
                                        <?php if( has_post_thumbnail() ) { echo "<div class='blog__image' style=\"background-image: url('" . get_the_post_thumbnail_url() . "')\"></div>"; } ?>
                                        <div class="blog__content"><?php the_excerpt(); ?><a class="read-more" href="<?php echo get_permalink( get_the_ID() ); ?>">Read More</a></div>
                                        <div class="clear-both"></div>
                                    </div>
                                <?php endwhile; ?>
                            </div>  
                        </div>
                    </div>  
                </div>
            </div>
            <?php get_footer(); ?>
