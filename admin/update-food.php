<?php 
include('./partials/menu.php'); 
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $query = "SELECT * FROM tbl_food WHERE id =$id";
    $result = mysqli_query($db, $query);
    if($result == true){
        $count = mysqli_num_rows($result);
        if($count ==1){
            $row = mysqli_fetch_assoc($result);
            $title= $row['title'];
            $description= $row['description'];
            $price= $row['price'];
            $image_name= $row['image_name'];
            $category_id= $row['category_id'];
            $featured = $row['featured'];
            $active = $row['active'];
        }else{
            $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">food not found</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php');
        }
    }else{
        $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">failed to connect to db</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-food.php');
    }
} else{
    $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">Must include id</strong>
    </div>';
    header('location: http://localhost:7882/wowfood/admin/manage-food.php');
}  
?>
<style>
    .food-search {
        min-height: 120vh;
    }
</style>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="">

        <h2 class="text-center text-white">Edit Food</h2>

        <form action="" method="POST" class="order" enctype="multipart/form-data">
            <fieldset>
                <legend></legend>
                <div class="order-label">Title</div>
                <input type="text" value="<?php echo $title; ?>" name="title" placeholder="" class="input-responsive" required>

                <div class="order-label">Description</div>
                <textarea type="text" name="description" placeholder="" class="input-responsive rounded-1" required><?php echo $description; ?></textarea>

                <div class="order-label">Categories</div>
                <select type="text"  name="category" placeholder="" class="input-responsive" required>
                    <?php 
                    $query = "SELECT * FROM tbl_category WHERE active ='Yes'";
                    $result = mysqli_query($db, $query);
                    if ($result == true){
                        while($row = mysqli_fetch_array($result)){
                            $categid= $row['id'];
                            $categ= $row['title'];
                            ?>
                            <option <?php if($categid = $category_id){echo "selected";} ?> value="<?php echo $categid;?>"><?php echo $categ; ?></option><?php 
                        }
                    }
                    ?>
                </select>
                <div class="order-label">Price</div>
                <input type="text" value="<?php echo $price; ?>" name="price" placeholder="" class="input-responsive" required>

                <div class="order-label">Current Image</div>
                <img src="../images/food/<?php echo $image_name; ?>" alt="Unavailable" height="100px">
                <input type="file" name="image" placeholder="" class="input-responsive">

                <!-- //featured -->
                <div class="order-label text-danger">Featured</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Yes" <?php if($featured= "Yes"){  echo"checked";} ?> type="radio" name="featured" placeholder="" class="mx-4">

                    No
                    <input value="No" <?php if($featured= "No"){  echo"checked";} ?> type="radio" name="featured" placeholder="" class="mx-2">
                </div>
                <!-- //end of featured -->
                <!-- //active -->
                <div class="order-label text-danger">Active</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Yes" type="radio" <?php if($active= "Yes"){  echo"checked";} ?> name="active" placeholder="" class="mx-4">

                    No
                    <input value="No" type="radio" <?php if($active= "No"){  echo"checked";} ?> name="active"  placeholder="" class="mx-2">
                </div>
                <!-- //end of active -->
                <input type="submit" name="submit" value="Add category" class="btn my-2 btn-primary px-2">
            </fieldset>
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<?php include('./partials/footer.php'); ?>