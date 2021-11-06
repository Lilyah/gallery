<?php include("includes/header.php"); ?>

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
                            Users
                            <small>Subheading</small>
                        </h1>

                        <h2>
                        <?php

                            /*** Testing find_all() method of class User extends Db_object ***/
                            // $users = User::find_all();
                            // foreach($users as $user){
                            //     echo $user->username;
                            // };

                            /*** Testing create() method of class User extends Db_object ***/
                            // $user = new User();

                            // Entering some static info for our properties
                            // $user->username = "SamJ";
                            // $user->user_password = "123";
                            // $user->user_first_name = "Sam";
                            // $user->user_last_name = "Johnes";

                            //Calling create method for testing
                            //$user->create();

                            /*** Testing update() method of class User extends Db_object ***/
                            // $user = User::find_users_by_id(3);
                            // $user->user_last_name = "Updated last name";
                            // $user->update();

                            /*** Testing delete() method of class User extends Db_object ***/
                            // $user = User::find_users_by_id(3);
                            // $user->delete();

                            /*** Testing save() method of class User extends Db_object ***/
                            /* 1 */
                            // $user = User::find_users_by_id(2);
                            // $user->username= "Maya-2";
                            // $user->save(); // Check if the user exists. If the user exists it will update it, if doesn't exist will create it

                            /* 2 */
                            // $user = new User;
                            // $user->username= "Maya-3";
                            // $user->save(); // Check if the user exists. If the user exists it will update it, if doesn't exist will create it


                        ?>

                        </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>