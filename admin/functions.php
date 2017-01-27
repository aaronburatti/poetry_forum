<?php

function confirm($result) {

  global $connection;

  if(!$result){
    die("No!!" . mysqli_error($connection));
  }
}


function insert_categories() {

  global $connection;

  if(isset($_POST['submit'])){                                          #on pressing submit
    $cat_title = $_POST['cat_title'];                                   #get the text field

    if($cat_title == "" || empty($cat_title)){                          #if the field is empty
      echo "This should be filled out";                                 #display error message
    } else {                                                            #otherwise
      $query = "INSERT INTO categories(cat_title) ";  #                 #Place the category into the database
      $query .= "VALUE('{$cat_title}') ";

      $create_category_query = mysqli_query($connection, $query);        #db connection function

      if(!$create_category_query) {                                      #if the doesn't work end ops and display error
        die('Query fail' . mysqli_error($connection));
      }
    }
  }
}

function findAllCategories() {

  global $connection;

  //find all categories query
  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

  //as all are gotten store them
  while($row = mysqli_fetch_assoc($select_categories)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];

      //then display them as table data
      echo "<tr>";
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_title}</td>";
      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>"; //delete link setting the key=>value pairing
      echo "<td><a href='categories.php?update={$cat_id}'>Edit</a></td>"; //edit link setting the key=>value pairing
      echo "</tr>";
    }
}

function deleteCategory() {

  global $connection;

  //DELETE QUERY
   if(isset($_GET['delete'])){//if delete is used

     $the_cat_id = $_GET['delete'];//get delete info
     $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";//delete query matching table and database data
     $delete_query = mysqli_query($connection,$query);//connect to db
     header("Location: categories.php");//refresh without displaying data in url
   }
}



 ?>
