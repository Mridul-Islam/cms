<div class="form-group">
            <label for="cat" >Edit Category</label>
            

            <?php // Bring the cat_title into input query  for editing

            if(isset($_GET['edit'])){
                $edit_cat_id = $_GET['edit'];

                $query = "SELECT * FROM categories WHERE cat_id = {$edit_cat_id} ";
                $selected_cat_id = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($selected_cat_id)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
            ?>
                    <input value="<?php if(isset($cat_title)) {
                        echo $cat_title;
                    } ?>" type="text" name="cat_title" class="form-control" >
                <?php }
            }

            ?>


            <?php  // Update query 

            if(isset($_POST['update'])){
                $the_cat_title = $_POST['cat_title'];

                $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                $update_query_result = mysqli_query($connection, $query);
                if(!$update_query_result){
                    die("Qeury Failed" . mysqli_error($connection));
                }
            }


            ?>
        

        </div>
        <div class="form-group">
            <input type="submit" name="update" value="Update Category" class="btn btn-primary">
        </div>
    </form>