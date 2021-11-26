<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}

$photos = Photo::find_all(); // Instantiating class Photo

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
                        </h1>

                        <p class="bg-success"><?php echo $message; ?></p>

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

                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>ID</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php foreach ($photos as $photo) : ?>

                                        <tr>
                                            <td>
                                                <img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>">
                                                <div class="action_links">
                                                    <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                                    <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                    <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $photo->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $photo->photo_filename; ?>
                                            </td>
                                            <td>
                                                <?php echo $photo->photo_title; ?>
                                            </td>                                    
                                            <td>
                                                <?php echo $photo->photo_size; ?>
                                            </td>                                    
                                            <td>
                                                <?php 

                                                // Instantiating class Comment and using method find_the_comments for this specific id
                                                $comments = Comment::find_the_comments($photo->id); ?>

                                                <div class="action_links">
                                                    <a href="photo_comment.php?id=<?php echo $photo->id; ?>"><?php echo count($comments)?></a>
                                                </div>
                                            
                                            </td>                                    
                                        </tr>

                                    <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>