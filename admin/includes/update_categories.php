<div class="col-xs-4">
                        <!-- EDIT CATEGORIES  START-->
                        <form action="" method="post"> <!-- Added on 13.9 lecture -->
                                <div class="form-group">
                                    <label for="cat_title">Edit category</label>
                                    <?php
                                    if(isset($_GET['edit'])){
                                      $cat_id = $_GET['edit'];
 
                                       //FIND ALL CATAGORIES
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_update = mysqli_query($connection, $query);
 
                                //FETCH CATEGORY ID & TITLE
                                    while($row = mysqli_fetch_assoc($select_categories_update)){
                                    $cat_id    = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    } // --> this is where you should close your while loop
                   ?>
 
                    <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
 
                                   <?php
 
                                    }
 
                                    ?>
 
                                    <?php
                                    //UPDATE CATEGORY                 //LECTURE 13.10
                                    if(isset($_POST['update_category'])){
 
                                      $the_cat_update = $_POST['cat_title']; // -> It should be cat_title
                                      $query = "UPDATE categories SET cat_title = '$the_cat_update' WHERE cat_id = {$cat_id} "; // -> I fixed the query
                                      $update_query = mysqli_query($connection ,$query);
                                      header("Location: categories.php");
                                      if(!$update_query){
                                        die("QUERY FAILED" . mysqli_error($connection));
                                      }
                                     }
 
                                     ?>
 
 
 
                                    <!-- <input type="text" class="form-control" name="cat_title"> THIS IS REDUNDANT!!!-->
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>