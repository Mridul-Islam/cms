<div class="form-group">
            <label for="cat" >Edit Category</label>
            

            <?php // Bring the cat_title into input query  for editing

            if(isset($_GET['edit'])){
                $edit_cat_id = escape($_GET['edit']);

                //$query = "SELECT * FROM categories WHERE cat_id = {$edit_cat_id} ";
                //$selected_cat_id = mysqli_query($connection, $query);

                $statement = mysqli_prepare($connection, "SELECT cat_id, cat_title FROM categories WHERE cat_id = ? ");
                mysqli_stmt_bind_param($statement, "i", $edit_cat_id);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $cat_id, $cat_title);

                //while($row = mysqli_fetch_assoc($selected_cat_id)){
                    //$cat_title = $row['cat_title'];
                    //$cat_id = $row['cat_id'];
                while(mysqli_stmt_fetch($statement)):
            ?>
                    <input value="<?php if(isset($cat_title)) {
                        echo $cat_title;
                    } ?>" type="text" name="cat_title" class="form-control" >
                <?php //}

                endwhile;
            }

            ?>


            <?php  // Update query 

            if(isset($_POST['update'])){
                $the_cat_title = escape($_POST['cat_title']);

                // $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                // $update_query_result = mysqli_query($connection, $query);
                // confirmQuery($update_query_result);

                //use prapare statement
                $statement = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ?");
                confirmQuery($statement);
                mysqli_stmt_bind_param($statement, "si", $the_cat_title, $cat_id);
                mysqli_stmt_execute($statement);

                redirect("categories.php");

                mysqli_stmt_close($statement);
            }


            ?>
        

        </div>
        <div class="form-group">
            <input type="submit" name="update" value="Update Category" class="btn btn-primary">
        </div>
    </form>