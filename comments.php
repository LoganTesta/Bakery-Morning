<?php

comment_form();

$args = array(
    'status' => 'approve'
);

$comments_query = new WP_Comment_Query;
$selected_comments = $comments_query->query( $args );

if ( $selected_comments && have_comments() ) {
    echo "<div class='comments'>";
        echo "<h3 class='comments__header'>Comments</h3>";
        wp_list_comments( array( 'per_page' => '6' ) );
        the_comments_pagination( array( 'prev_text' => __( '<< Prev', 'bakery-morning' ), 'next_text' => __( 'Next >>', 'bakery-morning' ) ) );
    echo "</div>";
} else {
    echo "<div class='comments'>No comments yet.</div>"; 
}
