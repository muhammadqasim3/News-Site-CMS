<?php include "config.php";

// check for the non admin user if not admin redirects to post
if($_SESSION["user_role"] == '0'){
    header("Location: {$hostname}/admin/post.php");
  }

$category_id = $_GET['id'];

$sql = "DELETE FROM categories WHERE category_id = '{$category_id}'";
if(mysqli_query($conn, $sql)){
    header ("Location: {$hostname}/admin/category.php");
}

mysqli_close($conn);
?>