<?php include "header.php"; 

if(isset($_POST['save'])){
    include "config.php";

    // mysqli_real_escape_string is a php function just like html special 
    // characters which checks the validity of function es function sy ye hoga k agar koi input field m script ya 
    // special character save karny ki try kary ga to script run nahi hogi
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $user = mysqli_real_escape_string($conn,$_POST['user']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $role = mysqli_real_escape_string($conn,$_POST['role']);

    // checks if the username already exists in the database
$sql = "SELECT username FROM user WHERE username = '{$user}'";
// echo $sql;
// die();
// For running $sql query (connection, query)
$result = mysqli_query($conn, $sql) or die("Query Failed");

// if blocks run if username already exist else create username 
if(mysqli_num_rows($result > 0)){
    echo "<p style='color: red; text-align: center; margin: 10px 0'> Username already exist. </p>";
}else{
    $sql1 = "INSERT INTO user (first_name, last_name, username, password, role)
            VALUES ('{$fname}', '{$lname}', '{$user}', '{$password}', '{$role}')";

    // if block executes if query runs 
    if(mysqli_query($conn, $sql1)){
        header("Location: http://localhost/news-site/admin/users.php");
    }
}

}
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <!-- PHP_SELF means that action page is same page which we are working on right now  -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
