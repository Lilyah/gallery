            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Dashboard</small>
                        </h1>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">

                                    <div class="panel-heading">
                                        <div class="row">

                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>

                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo $session->count; ?></div>
                                                <div>New Views</div>
                                            </div>

                                        </div>
                                    </div>

                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span> 
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">

                                   <div class="panel-heading">
                                       <div class="row">

                                           <div class="col-xs-3">
                                               <i class="fa fa-photo fa-5x"></i>
                                           </div>

                                           <div class="col-xs-9 text-right">
                                               <div class="huge"><?php echo Photo::count_all(); ?></div>
                                               <div>Photos</div>
                                           </div>

                                       </div>
                                   </div>

                                    <a href="photos">
                                        <div class="panel-footer">
                                            <span class="pull-left">Go to Photos</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>

                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">

                                    <div class="panel-heading">
                                        <div class="row">

                                            <div class="col-xs-3">
                                               <i class="fa fa-user fa-5x"></i>
                                            </div>

                                            <div class="col-xs-9 text-right">
                                               <div class="huge"><?php echo User::count_all(); ?></div>
                                               <div>Users</div>
                                            </div>

                                        </div>
                                    </div>

                                    <a href="users">
                                        <div class="panel-footer">
                                            <span class="pull-left">Go to Users</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">

                                            <div class="col-xs-3">
                                                <i class="fa fa-support fa-5x"></i>
                                            </div>

                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><?php echo Comment::count_all(); ?></div>
                                                <div>Comments</div>
                                            </div>

                                        </div>
                                    </div>

                                    <a href="comments">
                                        <div class="panel-footer">
                                            <span class="pull-left">Go to Comments</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>                        
                </div>


                <div class="row">
                    <!-- Google Pie Chart -->
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                </div>

            </div>
            <!-- /.container-fluid -->


