<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
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
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Alternate Text</label>
                                <input type="text" name="alternate_text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>

                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>