<?php 

include("includes/header.php"); 

if(!$session->is_signed_in()){
     redirect("login.php");
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

            <?php 
            
            include("includes/admin_content.php"); 
            
            ?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>