<?php 

include("includes/init.php"); 

if(!$session->is_signed_in()){
     redirect("login.php");
}

// If for some reason the GET request is empty will redirect back to index
if(empty($_GET['id'])){
    redirect("../photos");
}


$photo = Photo::find_by_id($_GET['id']); // Finding the photo by id

if($photo){ // If we have the photo then we will delete it
    $photo->delete_photo();
    redirect("photos");
    $session->message("The photo has been deleted");
} else {
    redirect("photos"); // Id we haven't the photo it will redirect to photos.php
}

?>

        