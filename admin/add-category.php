<?php include "header.php"; 

    include "config.php"; // database configuration
    
    if(isset($_POST['save'])){      // when clicks on save button 
        $category = $_POST['cat'];

    /* query for check input value exists in category table or not*/
    $sql = "SELECT category_name FROM categories WHERE category_name='{$category}'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
         // if input value exists
         echo "<p style = 'color:red;text-align:center;margin: 10px 0';> Category already exists.</p>";
    }else{
        // if category does not exist insert into database
       $sql = "INSERT INTO categories (category_name) 
                VALUES ('{$category}')";

        if(mysqli_query($conn, $sql)){
        header("Location: {$hostname}/admin/category.php");
        }else{
            echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
        }
    }
}
    mysqli_close($conn);
    

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
