<?php include('./partials/menu.php') ?>
<style>
    .food-search {
        height: 100vh;
    }
</style>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Add category</h2>

        <form action="" method="post" class="order">
            <fieldset>
                <legend></legend>

                <?php if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                } ?>
                <div class="order-label">Title</div>
                <input type="text" name="title" placeholder="" class="input-responsive" required>

                <div class="order-label ">Image</div>
                <input type="file" name="image" placeholder="" class="input-responsive">
               
                <!-- //featured -->
                <div class="order-label text-danger">Featured</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="yes" type="radio" name="featured" placeholder="" class="mx-4">

                    No
                    <input value="no" type="radio" name="featured" placeholder="" class="mx-2">
                </div>
                <!-- //end of featured -->
                <!-- //active -->
                <div class="order-label text-danger">Active</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="yes" type="radio" name="active" placeholder="" class="mx-4">

                    No
                    <input value="no" type="radio" name="active" placeholder="" class="mx-2">
                </div>
                <!-- //end of active -->
                <input type="submit" name="submit" value="Add category" class="btn my-2 btn-primary px-2">
            </fieldset>

        </form>
        <?php
            if (isset($_POST['submit'])){
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $image = mysqli_real_escape_string($db, $_POST['image']);

                if (isset($_POST['featured'])){
                    $featured = mysqli_real_escape_string($db, $_POST['featured']);
                }else{
                    $featured = "no";
                }
                if (isset($_POST['active'])){
                    $active = mysqli_real_escape_string($db, $_POST['active']);
                }else{
                    $active = "no";
                }
                $query = "INSERT into tbl_category (title, image_name, featured, active) VALUES ('$title', '$image', '$featured', '$active')";
                $result = mysqli_query($db, $query);

                if ($result == true){
                    echo "addd sucesfully";
                }else{
                    echo "error";
                }
            }else{
                
            }
        ?>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<?php include('./partials/footer.php'); ?>