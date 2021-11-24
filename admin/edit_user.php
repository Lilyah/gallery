<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}


if(empty($_GET['id'])){
    redirect("users.php");
} else {
    $user = User::find_by_id($_GET['id']); // Instantiating class User and getting the user id from the url

    if(isset($_POST['update'])){
        if($user){
            $user->username = $_POST['username'];
            $user->user_first_name = $_POST['user_first_name'];
            $user->user_last_name = $_POST['user_last_name'];
            $user->user_password = $_POST['user_password'];

            $user->set_file($_FILES['user_photo']);

            $user->save_user_photo(); // Method in class User; will save only the photo
            $user->save(); // Method in class User; will save the data from inputs without photo 
        
        }
    }
}

?>


<!-- Modal START -->

<div class="modal fade" id="photo-library">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Gallery System Library</h4>
            </div>

            <div class="modal-body">

                <div class="col-md-9">
                    <div class="thumbnails row">

                        <!-- PHP LOOP HERE CODE HERE-->

                        <div class="col-xs-2">

                            <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                            <img class="modal_thumbnails img-responsive" src="<!-- PHP LOOP HERE CODE HERE-->" data="<!-- PHP LOOP HERE CODE    HERE-->">
                            </a>

                            <div class="photo-id hidden"></div>

                        </div>

                        <!-- PHP LOOP HERE CODE HERE-->

                    </div>
                </div><!--col-md-9 -->

                <div class="col-md-3">
                    <div id="modal_sidebar"></div>
                </div>

            </div><!--Modal Body-->

            <div class="modal-footer">
                <div class="row">
                    <!--Closes Modal-->
                    <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
                </div>
            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
    
</div><!-- /.modal -->


<!-- Modal END -->



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
                            Edit User
                        </h1>

                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group">
                                    <a class="thumbnail" href="#" data-toggle="modal" data-target="#photo-library">
                                        <img src="<?php echo $user->photo_path_placeholder(); ?>">
                                    </a>
                                </div>

                                <div class="form-group">
                                    <label for="username">User Photo</label>
                                    <input type="file" name="user_photo">
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user first name">First Name</label>
                                    <input type="text" name="user_first_name" class="form-control" value="<?php echo $user->user_first_name; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user last name">Last Name</label>
                                    <input type="text" name="user_last_name" class="form-control" value="<?php echo $user->user_last_name; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user password">Password</label>
                                    <input type="password" name="user_password" class="form-control" value="<?php echo $user->user_password; ?>">
                                </div>

                                <div class="form-group">
                                    <a class="btn btn-danger pull-left" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                    <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
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