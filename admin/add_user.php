<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}


    $user = new User; // Instantiating class User

    if(isset($_POST['create'])){
        if(!empty(trim($_POST['username'])) & !empty(trim($_POST['user_password']))){
        if($user){
            $user->username = $_POST['username'];
            $user->user_first_name = $_POST['user_first_name'];
            $user->user_last_name = $_POST['user_last_name'];
            $user->user_password = $_POST['user_password'];

            $user->set_file($_FILES['user_photo']);

            $user->save_user_photo(); // Method in class User; will save only the photo
            $user->save(); // Method in class User; will save the data from inputs without photo

            redirect("users");
            $session->message("The user has be created");
        }
    } else { 
        $session->message("Username and Password cannot be empty");
    }
    }

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
            <?php 
            
            // Brand and toggle get grouped for better mobile display
            include("includes/top_nav.php");

            // Sidebar Menu Items - These collapse to the responsive navigation menu on small screens
            include("includes/side_nav.php"); 
            
            ?>

        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add User
                        </h1>

                        <p class="bg-danger"><?php echo $message; ?></p>

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group">
                                    <label for="username">User Photo</label>
                                    <input type="file" name="user_photo">
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="user first name">First Name</label>
                                    <input type="text" name="user_first_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="user last name">Last Name</label>
                                    <input type="text" name="user_last_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="user password">Password</label>
                                    <input type="password" name="user_password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="create" class="btn btn-primary pull-right">
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>