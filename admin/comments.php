<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}

$comments = Comment::find_all(); // Instantiating class Photo

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
                            Comments
                        </h1>

                        <p class="bg-success"><?php echo $message; ?></p>

                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Comment ID</th>
                                        <th>Photo ID</th>
                                        <th>Photo</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php foreach ($comments as $comment) : ?>

                                        <tr>
                                            <td>
                                                <?php echo $comment->id; ?>
                                            </td>
                                            <td>
                                                <?php echo $comment->photo_id; ?>
                                            </td>
                                            <td>
                                                <?php  
                                                    // Instantiating class Photo and using method find_by_id and passing $comment->photo_id as an id
                                                    $photo = Photo::find_by_id($comment->photo_id);
                                                ?>
                                                <img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>">
                                            </td>
                                            <td>
                                                <?php echo $comment->author; ?>
                                            </td>                                    
                                            <td>
                                                <?php echo $comment->body; ?>
                                            </td>                                                                     
                                            <td>
                                                <!-- class="delete-link" is a custom class for detecting the button via jquery -->
                                                <a class="btn btn-danger delete-link" href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
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