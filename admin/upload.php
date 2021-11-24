<?php include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}

$message = "";
// Checking for $_POST['submit]
if(isset($_POST['submit'])){
    $photo = new Photo(); // Instantiate the object
    $photo->photo_title = $_POST['photo_title']; // Assigning $_POST['photo_title] to $photo
    $photo->set_file($_FILES['file_upload']);

    if($photo->save()){
        $message = "Photo uploaded Succesfully"; // If method save() returns true it will return this message

    } else {
        $message = join("<br>", $photo->errors); // If method save() returns false it will return errors from errors array in class Photo 
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
                            Upload
                        </h1>
                        
                        <div class="col-md-6">
                            <?php echo $message; ?>
                            <form method="post" action="upload.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text" name="photo_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="file" name="file_upload">
                                </div>

                                <input type="submit" name="submit">

                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>