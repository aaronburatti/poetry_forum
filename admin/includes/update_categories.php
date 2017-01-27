<form class="" action="" method="post">
  <div class="form-group">
    <label for="">Edit Category</label>
    <?php

    if(isset($_GET['update'])){
      $cat_id = $_GET['update'];


    //find all categories query
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $select_categories_id = mysqli_query($connection, $query);

    //as all are gotten store them
    while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        ?>

        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title" >

      <?php  }} ?>

      <?php

      //////////////UPDATE QUERY

      if(isset($_POST['update_category'])){//if edit button is used

        $the_cat_title = $_POST['cat_title'];//get edit info
        $query = "UPDATE categories SET cat_title = '{$the_cat_title}'  WHERE cat_id = {$cat_id} ";//update query matching table and database data
        $update_query = mysqli_query($connection,$query);//connect to db
          if(!$update_query){
            die("No!!" . mysqli_error($connection));
          }
      }

       ?>
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
  </div>
</form>
