<?php include('./main-partials/nav.php') ?>
<?php if (isset($_GET['id'])) {
    $categ_id = $_GET['id'];
    $query = "SELECT * FROM tbl_category WHERE id = '$categ_id'";
    $result = mysqli_query($db, $query);
    if ($result == true){
        $count = mysqli_num_rows($result);
        if ($count == 0){
            echo "No such id";
            header('location: ' . SITEURL . 'categories.php');
        }else{
                
    $query = "SELECT title FROM tbl_category WHERE id = '$categ_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $categ_title= $row['title'];
        }
    }
    

} else {
    header('location: ' . SITEURL . 'categories.php');
} 

?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"<?php echo $categ_title ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
    <?php 
        $query = "SELECT * FROM tbl_food WHERE category_id=$categ_id";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        if ($count < 1){
            echo '<p class="text-danger">No food available for this category</p>';
        }
        if ($result == true){
            while ($row = mysqli_fetch_assoc($result)){
                $food_title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];


                ?>        <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php if ($image_name !== ""){ echo '<img src="images/food/'.$image_name.'" alt="'.$food_title.'" class="img-responsive img-curve">'; }else{ echo "No image";} ?>
                </div>
    
                <div class="food-menu-desc">
                    <h4><?php echo $food_title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                       <?php echo $description; ?>
                    </p>
                    <br>
    
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div><?php
            }
        }else{
            echo '<p class="text-danger">Not fetched from db</p>';
        }
    ?>


        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<!-- social Section Starts Here -->
<section class="social">
    <div class="container text-center">
        <ul>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
            </li>
        </ul>
    </div>
</section>
<!-- social Section Ends Here -->
<?php include('./main-partials/footer.php') ?>