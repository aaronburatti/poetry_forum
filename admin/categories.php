<?php include "includes/admin_header.php" ?>
    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom to the Admin Section!
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

                          <?php insert_categories(); ?>

                          <form class="" action="" method="post">
                            <div class="form-group">
                              <input type="text" class="form-control" name="cat_title" value="">
                            </div>
                            <div class="form-group">
                              <label for="cat_title">Add Category</label>
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form>

                          <?php //Update and include query

                          if(isset($_GET['update'])) {

                            $cat_id = $_GET['update'];
                            include "includes/update_categories.php";

                          }

                           ?>

                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <th>ID</th>
                              <th>Category Title</th>
                            </thead>
                            <tbody>

                              <?php findAllCategories(); ?>

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

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>
