<?php 

include("includes/header.php"); 

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

//$photos = Photo::find_all(); 

// Instantiating class Paginate
$paginate = new Paginate($page, $items_per_page, $items_total_count);

// Query
$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql); // executing the query


?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

                    <div class="row">

                        <?php foreach ($photos as $photo) : ?>

                        <div class="col-xs-6 col-md-3">
                            <a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                                <img class="img-responsive home-page-photo" src="admin/<?php echo $photo->picture_path(); ?>">           
                            </a>                 
                        </div>

                        <?php endforeach;?>

                    </div>

                    <div class="row">

                            <ul class="pager">

                                <?php

                                // If we have more than 1 page then will be displayed Next and Previous btns
                                if($paginate->page_total() > 1){

                                    // If we have next page then will be displayed the Next btn
                                    if($paginate->has_next()){
                                        echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>"; // Classes and hrefs are with single quotes because we are using them with php
                                    }

                                    // Loop for displaying the numbers of the pages
                                    for ($i=1; $i <= $paginate->page_total() ; $i++){

                                        if($i == $paginate->current_page){
                                            echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                        } else {
                                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                        }

                                    }
                   

                                    // If we have previous page then will be displayed the Previous btn
                                    if($paginate->has_previous()){
                                        echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>"; // Classes and hrefs are with single quotes because we are using them with php
                                    }

                                }

                                
                                ?>

                            </ul>

                    </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->

            
                 <?php //include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
