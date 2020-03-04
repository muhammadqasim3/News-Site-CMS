<?php include "config.php";

$category_id = $_GET['id'];

$sql = "DELETE FROM categories WHERE category_id = '{$category_id}'";
if(mysqli_query($conn, $sql)){
    header ("Location: {$hostname}/admin/category.php");
}

mysqli_close($conn);
?>