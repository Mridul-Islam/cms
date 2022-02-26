<?php include "./includes/admin_header.php"; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <!-- Top Menu Items -->
    <?php include "./includes/admin_top_nav.php"; ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "./includes/admin_side_nav.php"; ?>

</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin
                    <small>Mridul Islam</small>
                </h1>

                <!-- Add Category form -->
                <div class=" col-md-6">

                    <?php

                        insertCategory();

                    ?>

                    <!-- Create category form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Category Title:</label>
                            <input type="text" name="cat_title" id="cat_title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="create_category" value="Add Category" class="btn btn-primary" >
                        </div>
                    </form><hr>

                    <!-- Update Category form -->
                    <?php

                    // Pull out the information of category and show the form
                    global $connection;
                    if(isset($_GET['cat_edit_id'])){
                        $the_cat_id = $_GET['cat_edit_id'];
                        $query = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
                        $query_result = mysqli_query($connection, $query);
                        confirm_query($query_result);
                        while($row = mysqli_fetch_assoc($query_result)){
                            $the_cat_title = $row['cat_title'];
                    ?>

                            <?php

                            // Update category code
                            global $connection;
                            if(isset($_POST['update_category'])){
                                $update_cat_title = $_POST['cat_title'];
                                if(empty($update_cat_title) || $update_cat_title == ''){
                                    echo "<ul class='text-danger bg-warning'><li>Field Can not be empty.</li></ul>";
                                }
                                else{
                                    $update_category_query = "UPDATE categories SET cat_title = '$update_cat_title' WHERE cat_id = $the_cat_id";
                                    $update_category_result = mysqli_query($connection, $update_category_query);
                                    if(!$update_category_result){
                                        die("Query Failed The category can not be update" . mysqli_error($connection));
                                    }
                                    header("Location: categories.php?cat_edit_id={$the_cat_id}");
                                }
                            }

                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Category Title:</label>
                                    <input type="text" name="cat_title" id="cat_title" class="form-control" value="<?php echo $the_cat_title; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update_category" value="Update Category" class="btn btn-primary" >
                                </div>
                            </form>

                    <?php

                        }
                    }

                    ?>

                </div>
                <!-- ./ Add and Edit Category form -->

                <!-- Show All Categories table -->
                <div class="col-md-6">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Category Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                        <?php

                            showAllCategories();

                            deleteCategory();

                         ?>

                        </tbody>
                    </table>
                </div>
                <!-- Show All Categories table -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<?php include "./includes/admin_footer.php"; ?>
