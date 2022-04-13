<?php include("includes/admin_header.php"); ?>

<?php include("includes/delete_modal.php"); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin_navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat" >Add Category</label>
                                    <input type="text" id="cat" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary" >
                                </div>
                            </form>


                            <form action="" method="post">
                                <?php

                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];

                                    include"includes/update_categories.php";
                                }


                                ?>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php showAllCategories(); ?>


                                    <?php deleteCategory(); ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/admin_footer.php"); ?>


<script>

    $(document).ready(function(){
        
        $(".delete_link").on('click', function(){

            var id = $(this).attr("rel");

            var delete_url = "categories.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#myModal").modal('show');

        });

    });


</script>
