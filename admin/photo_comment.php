<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
    redirect("login.php");
}

if(empty($_GET['id'])){
    redirect("photos.php");
}

// Instantiating class Comment and using method find_the_comments for this specific id
$comments = Comment::find_the_comments($_GET['id']); 

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
                            <small>Subheading</small>
                        </h1>

                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo ID</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        <th></th>
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
                                                <?php echo $comment->author; ?>
                                            </td>                                    
                                            <td>
                                                <?php echo $comment->body; ?>
                                            </td>                                                                     
                                            <td>
                                                <a class="btn btn-danger" href="delete_photo_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
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