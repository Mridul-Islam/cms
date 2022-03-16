<h2 class="text-center bg-info">Edit Post</h2>
<hr>

<?php

// Bring all information about the edit post and show those in the edit form
global $connection;
if(isset($_GET['edit_id'])){
    $the_edit_id = $_GET['edit_id'];

    $edit_post_query = "SELECT * FROM posts WHERE post_id = $the_edit_id";
    $edit_post_query_result = mysqli_query($connection, $edit_post_query);
    confirm_query($edit_post_query_result);
    while($row = mysqli_fetch_assoc($edit_post_query_result)){
        $db_post_title   = $row['post_title'];
        $db_post_author  = $row['post_author'];
        $db_post_cat_id  = $row['post_category_id'];
        $db_post_tags    = $row['post_tags'];
        $db_post_status  = $row['post_status'];
        $db_post_image   = $row['post_image'];
        $db_post_content = $row['post_content'];

?>

        <?php
            // Edit post code
            update_post($the_edit_id, $db_post_image);
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Left col-lg-6 -->
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="post_title">Post Title:</label>
                    <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $db_post_title; ?>" />
                </div>
                <div class="form-group">
                    <label for="post_author">Post Author:</label>
                    <input type="text" name="post_author" id="post_author" class="form-control" value="<?php echo $db_post_author; ?>" />
                </div>
                <div class="form-group">
                    <label for="post_image">Post Image:</label>
                    <img src="../images/<?php echo $db_post_image; ?>" width="300px" class="img-responsive img-thumbnail"/>
                    <input type="file" name="post_image" id="post_image" class="form-control">
                </div>
            </div>
            <!-- ./Left col-lg-6 -->

            <!-- Right col-lg-6 -->
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="post_title">Select Category:</label>
                    <select name="post_category" class="form-control">

                        <?php

                        // show current category of this post
                        $category_query = "SELECT * FROM categories WHERE cat_id = $db_post_cat_id";
                        $category_query_result = mysqli_query($connection, $category_query);
                        confirm_query($category_query_result);
                        while($row = mysqli_fetch_assoc($category_query_result)){
                            $the_post_cat_title = $row['cat_title'];
                            echo "<option value='$db_post_cat_id'> {$the_post_cat_title} </option>";
                        }


                        // Bring all categories to show in the options
                        global $connection;
                        $query = "SELECT * FROM categories";
                        $all_categories = mysqli_query($connection, $query);
                        confirm_query($all_categories);
                        while($row = mysqli_fetch_assoc($all_categories)){
                            $db_cat_id = $row['cat_id'];
                            $db_cat_title = $row['cat_title'];
                            if($db_post_cat_id != $db_cat_id){
                                echo "<option value='{$db_cat_id}'> {$db_cat_title} </option>";
                            }
                        }

                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="post_tags">Post Tags:</label>
                    <input type="text" name="post_tags" id="post_tags" class="form-control" value="<?php echo $db_post_tags; ?>" />
                </div>
                <div class="form-group">
                    <label for="post_status">Post Status:</label>
                    <select name="post_status" class="form-control">
                        <option value="<?php echo $db_post_status; ?>"> <?php echo $db_post_status; ?> </option>
                        <?php

                        if($db_post_status == 'published'){
                            echo "<option value='draft'> draft </option>";
                        }
                        else{
                            echo "<option value='published'> publish </option>";
                        }

                        ?>


                    </select>
                </div>
                <div class="form-group">
                    <label>Post Content:</label>
                    <textarea name="post_content" class="form-control" rows="5" id="body"><?php echo $db_post_content; ?></textarea>
                </div><hr>
                <div class="form-group">
                    <input type="submit" name="edit_post" value="Update" class="btn btn-primary" />
                    <a href="./posts.php" class="btn btn-primary"> Cancel </a>
                </div>
            </div>
            <!-- ./ Right col-lg-6 -->
        </form>

<?php

    } // End of while loop
} // End of if(isset($_GET['edit_id'])) loop

?>

