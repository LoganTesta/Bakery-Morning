<?php

comment_form();

$args = array(
    'status' => 'approve'
);

$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

if ( $comments ) {
    echo "<div class='comments'>";
    foreach ( $comments as $comment ) {
        echo "<div class='comments__comment'>" . $comment->comment_content . '</div>';
    }  
    echo "</div>";
} else {
    echo "<div class='comments'>No comments yet.</div>"; 
}
