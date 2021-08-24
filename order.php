<?php include('./main-partials/nav.php'); 
 include('./main-partials/customer-login.php'); 
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
} else {
    header('location: ' . SITEURL . 'index.php');
}
$query = "SELECT * FROM tbl_food WHERE id ='$food_id' and active='Yes'";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
    
if ($count == 0) {
    header('location: ' . SITEURL . 'index.php');
}else{
    $row = mysqli_fetch_assoc($result);
    $food_name = $row['title'];
    $food_price = $row['price'];
    $food_image_name = $row['image_name'];
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $food_image_name; ?>" alt="<?php echo $food_title; ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $food_name; ?></h3>
                    <p class="food-price">$<?php echo $food_price; ?></p>

                    <div class="order-label">Quantity</div>
                    <input type="number" id="qty" name="qty" class="input-responsive" value="1" required>
                    <p class="food-price" id="total">$10000</p>


                </div>

            </fieldset>
            <?php
            $mail = $_SESSION['customer'];
            $query = "SELECT * FROM tbl_customer WHERE email = '$mail'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['id'];
            $fullname = $row['full_name'];
            $contact = $row['contact'];
            $mail = $row['email'];
            $address = $row['address'];


            ?>
            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <p class="input-responsive"><?php echo $fullname; ?></p>

                <div class="order-label">Email</div>
                <p class="input-responsive"><?php echo $mail; ?></p>

                <div class="order-label">Phone Number</div>
                <p class="input-responsive"><?php echo $contact; ?></p>

                <div class="order-label">Delivery type</div>
                <select name="delivery_type" class="input-responsive" required>
                    <option value="1" selected>Instant delivery</option>
                    <option value="2">Scheduled delivery</option>
                </select>

                <div class="order-label">Preferred Delivery date</div>
                <input  type="date" name="email" placeholder="" class="input-responsive">

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="" class="input-responsive"><?php echo $address; ?></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

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