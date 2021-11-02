            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <h2>

                            <?php

                                /* Displaying all users
                                */
                                // $result_set = User::find_all_users();
                                // while($row = mysqli_fetch_array($result_set)){
                                // echo $row['username'] . "<br>";
                                // }

                                /* Displaying user byt id
                                */
                                // $user, $found_user, find_users_by_id, instantiation 
                                // comes from class User (look file /gallery/admin/includes/user.php)
                                // $found_user = User::find_users_by_id(1);
                                // $user = User::instantiation($found_user);

                                // echo $user->user_id;
                                // echo $user->user_last_name;
                                // echo $user->username;

                                // $users = User::find_all_users();
                                // foreach($users as $user){
                                //     echo $user->username . "<br>";
                                // }
                                
                                $found_user = User::find_users_by_id(1);
                                echo $found_user->username;
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