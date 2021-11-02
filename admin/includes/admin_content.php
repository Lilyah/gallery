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
                                $result_set = User::find_all_users();
                                while($row = mysqli_fetch_array($result_set)){
                                    echo $row['username'] . "<br>";
                                }

                                /* Displaying user byt id
                                */
                                // $user and find_users_by_id comes from instantiating class User (look file /gallery/admin/includes/user.php)
                                $found_user = User::find_users_by_id(1);

                                $user->user_id = $found_user['user_id'];
                                $user->username = $found_user['username'];
                                $user->user_password = $found_user['user_password'];
                                $user->user_first_name = $found_user['user_first_name'];
                                $user->user_last_name = $found_user['user_last_name'];
                                
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