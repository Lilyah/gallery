<?php

include("init.php");

// If there is a session the user will be redirected to admin/index
if($session->is_signed_in()){
    redirect("index.php");
}

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);


    // Method to check database for user

    // If the user exists in the database it will be redirected to admin/index
    if($user_found){
        $session->login($user_found);
        redirect("../index.php");
    } else {
        $the_message = "Your login information is incorect";
    }
} else {
    $username = "";
    $user_password = "";
}






?>