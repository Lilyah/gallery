<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}


if(empty($_GET['id'])){
    redirect("photos.php");
} else {
    $photo = Photo::find_by_id($_GET['id']); // Instantiating class Photo and getting the photo id from the url

    if(isset($_POST['update'])){
        if($photo){
            $photo->photo_title = $_POST['photo_title'];
            $photo->photo_caption = $_POST['photo_caption'];
            $photo->photo_alternate_text = $_POST['photo_alternate_text'];
            $photo->photo_description = $_POST['photo_description'];

            $photo->save(); // Method in class Db_object
        }


    }
}




//$photos = Photo::find_all(); // Instantiating class Photo

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
                            Photos
                            <small>Subheading</small>
                        </h1>

                        <form action="" method="POST">

                            <h2>

                                <?php

                                /*** Testing find_all() method of class Photo extends Db_object ***/
                                // $photos = Photo::find_all();
                                // foreach($photos as $photo){
                                // echo $photo->photo_title;
                                // };

                                /*** Testing create() method of class Photo extends Db_object ***/
                                // $photo = new Photo();

                                // Entering some static info for our properties
                                // $photo->photo_title = "photo test title 2";
                                // $photo->photo_description = "photo test description";
                                // $photo->photo_filename = "photo.png";
                                // $photo->photo_type = "image";
                                // $photo->photo_size = '15';
                                
                                //Calling create method for testing
                                // $photo->create();

                                ?>

                            </h2>

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="photo_title" class="form-control" value="<?php echo $photo->photo_title; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="caption">Caption</label>
                                    <input type="text" name="photo_caption" class="form-control" value="<?php echo $photo->photo_caption; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="caption">Alternate Text</label>
                                    <input type="text" name="photo_alternate_text" class="form-control" value="<?php echo $photo->photo_alternate_text; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="caption">Description</label>
                                    <textarea class="form-control" name="photo_description" id="" cols="30" rows="10"><?php echo $photo->photo_description; ?></textarea>
                                </div>

                            </div>


                            <div class="col-md-4">

                                <div  class="photo-info-box">

                                    <div class="info-box-header">
                                       <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                    </div>

                                    <div class="inside">
                                        <div class="box-inner">
                                            <p class="text">
                                                <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                            </p>
                                            <p class="text">
                                                Photo Id: <span class="data photo_id_box"><?php echo $photo->id; ?></span>
                                            </p>
                                            <p class="text">
                                              Filename: <span class="data"><?php echo $photo->photo_filename; ?></span>
                                            </p>
                                            <p class="text">
                                             File Type: <span class="data"><?php echo $photo->photo_type; ?></span>
                                            </p>
                                            <p class="text">
                                              File Size: <span class="data"><?php echo $photo->photo_size; ?></span>
                                            </p>
                                        </div>

                                        <div class="info-box-footer clearfix">
                                            <div class="info-box-delete pull-left">
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                                                <!-- <a href="#" class="btn btn-danger btn-lg">Delete</a> -->
                                            </div>

                                            <div class="info-box-update pull-right">
                                                <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
                                            </div>   
                                        </div>
                                    </div>   

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