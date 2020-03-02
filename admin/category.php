<?php include "header.php"; 

    include "config.php"; // database configuration 
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <?php
                    // Pagination Offset
                    $limit = 3;
                    if(isset($_GET["page"])){
                        $page = $_GET["page"];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    /* select query with offset and limit */
                    $sql = "SELECT * FROM  categories ORDER BY category_id DESC Limit $offset,$limit";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) > 0){
                       echo '<table class="content-table">
                            <thead>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>No. of Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>';
                            $serial = $offset + 1;
                            while($row = mysqli_fetch_assoc($result)){
                           echo     "<tr>
                                    <td class='id'>{$serial}</td>
                                    <td>{$row["category_name"]}</td>
                                    <td>{$row["post"]}</td>
                                    <td class='edit'><a href='update-category.php?id={$row['category_id']}' ><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-category.php?id={$row['category_id']}'><i class='fa fa-trash-o'></i></a></td>
                                </tr>";
                                $serial++;
                            }
                           echo '</tbody></table>';
                    }else{
                        echo "<h3>No Results Found.</h3>";
                    }
                    
                ?>

                <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
