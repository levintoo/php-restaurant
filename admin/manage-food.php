<?php include('./partials/menu.php') ?>

<div class="main-content">
<div class="wrapper row py-lg-4 py-md-3 col-md-12">
            <p class="fs-2"><strong>Manage Food</strong></p>
            <?php if (isset($_SESSION['addfood'])) {
                echo $_SESSION['addfood'];
                unset($_SESSION['addfood']);
            } 
            if (isset($_SESSION['deletefood'])) {
                echo $_SESSION['deletefood'];
                unset($_SESSION['deletefood']);
            } ?>
            <div class="mb-3">
        <a href="<?php SITEURL ?>add-food.php" class="btn-sm btn-info text-light p-2">Add Food</a>
        </div>
        <table>
            <tr class="border-bottom">
            <th class="p-2">S.N.</th>
            <th class="p-2">Title</th>
            <th class="p-2">Image</th>
            <th class="p-2">Price</th>
            <th class="p-2">Featured</th>
            <th class="p-2">Active</th>
            <th class="p-2">Action</th>
            </tr>
            <?php 
            $query = "SELECT * FROM tbl_food";
            $result = mysqli_query($db, $query);
            if ($result == true){
                $count = mysqli_num_rows($result);
                if ($count == 0){
                    // if food not found on db
                    echo '<p class="text-danger">error no food found</p>';
                }else{
                    // if food found on db
                    $sn =1;

                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        <tr>
                <td class="p-2"><?php echo $sn++; ?></td>
                <td class="p-2"><?php echo $title; ?></td>
                <td class="p-2"><?php
                    if (!$image_name== ""){
                        echo '<img src="'.SITEURL.'images/food/'.$image_name.'" width="100px" alt="'.$image_name.'">';
                    }else{
                        echo '<p class="text-danger">Unavailable</p>';
                    }   
                ?></td>
                <td class="p-2"><?php echo $price; ?></td>
                <td class="p-2"><?php echo $featured; ?></td>
                <td class="p-2"><?php echo $active; ?></td>
                <td class="p-2 ">
                    <span class="flex-wrap d-flex">
                    <a href="" class="btn-sm btn-success p-2">Update Food</a>
                    <a href="<?php SITEURL?>action/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-sm btn-danger p-2">Delete Food</a>
                    </span>
                </td>
            </tr>
                        <?php
                    }
                }
            }
            ?>
            
        </table>
        </div>
</div>

<?php include('./partials/footer.php') ?>