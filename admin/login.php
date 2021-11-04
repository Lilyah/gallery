<?php

include("includes/header.php");

//session_unset();

// If there is a session the user will be redirected to admin/index
if($session->is_signed_in()){
    redirect("index");
}

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);


    // Method to check database for user
    $user_found = User::verify_user($username, $user_password); // Calling static method from class User

    // If the user exists in the database it will be redirected to admin/index
    if($user_found){
        $session->login($user_found);
        redirect("index");
    } else {
        $the_message = "Your login information is incorect";
    }
} else {
    $username = "";
    $user_password = "";
    $the_message = "";
}


?>



<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?php echo $the_message ?></h4>
	
    <form id="login-id" action="" method="post">
	
        <div class="form-group">
        	<label for="username">Username</label>
        	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
        </div>

        <div class="form-group">
        	<label for="password">Password</label>
        	<input type="password" class="form-control" name="user_password" value="<?php echo htmlentities($user_password); ?>">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>

    </form>

</div>