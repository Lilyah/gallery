<?php 

include("includes/init.php"); 

if(!$session->is_signed_in()){
     redirect("login.php");
}

// If for some reason the GET request is empty will redirect back to index
if(empty($_GET['id'])){
    redirect("users");
}


$user = User::find_by_id($_GET['id']); // Finding the user by id

if($user){ // If we have the user then we will delete it
    $user->delete_user();
    redirect("users");
} else {
    redirect("users"); // If we haven't the user it will redirect to users.php
}

?>

        