<?php include "config.php";
    
$user_id = $_GET['id'];

$sql = "DELETE FROM users WHERE user_id = {$user_id}";

// If Query executes it will redirect to users.php else shows error 
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/users.php");
}else{
    echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete User</p>";
}

?>