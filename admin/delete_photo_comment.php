<?php 

include("includes/init.php"); 

if(!$session->is_signed_in()){
     redirect("login.php");
}

// If for some reason the GET request is empty will redirect back to index
if(empty($_GET['id'])){
    redirect("comments");
}

$comment = Comment::find_by_id($_GET['id']); // Finding the user by id

if($comment){ // If we have the comment then we will delete it
    $comment->delete();
    redirect("photo_comment.php?id={$comment->photo_id}");
    $session->message("The comment has been deleted");
} else {
    redirect("photo_comment.php?id={$comment->photo_id}"); // If we haven't the comment it will redirect to comments.php
}

?>

        