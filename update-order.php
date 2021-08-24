<?php include('./main-partials/nav.php'); 
 include('./main-partials/customer-login.php'); 
if (isset($_GET['id'])) {
    $orderid = $_GET['id'];
} else {
    header('location: ' . SITEURL . 'foods.php');
}
$query = "SELECT * FROM tbl_order WHERE id ='$orderid' and delivery_status !>3";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

echo $row['delivery_status'] ;
?>

<?php
            // $mail = $_SESSION['customer'];
            // $query = "SELECT * FROM tbl_customer WHERE email = '$mail'";
            // $result = mysqli_query($db, $query);
            // $row = mysqli_fetch_assoc($result);
            // $user_id = $row['id'];
            // $fullname = $row['full_name'];
            // $contact = $row['contact'];
            // $mail = $row['email'];
            // $address = $row['address'];


            ?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                <?php if ($food_image_name !== ""){ echo '<img src="'.SITEURL.'images/food/'.$food_image_name.'" alt="'.$food_name.'" class="img-responsive img-curve">'; }else{ echo "No image";} ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $food_name; ?></h3>
                    <input name="food" type="hidden" value="<?php echo $food_name; ?>">
                    
                    <p class="food-price">$<?php echo $food_price; ?></p>
                    <input name="food_price" type="hidden" value="<?php echo $food_price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" id="qty" name="qty" class="input-responsive" value="1" required>
                    <p class="food-price" id="total">$10000</p>


                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <p  class="input-responsive"><?php echo $fullname; ?></p>
                <input type="hidden" name="full_name" value="<?php echo $fullname; ?>">

                <div class="order-label">Email</div>
                <p class="input-responsive"><?php echo $mail; ?></p>
                <input type="hidden" name="email" value="<?php echo $mail;?>">

                <div class="order-label">Phone Number</div>
                <p class="input-responsive"><?php echo $contact; ?></p>
                <input type="hidden" value="<?php echo $contact; ?>" name="contact">

                <div class="order-label">Delivery type</div>
                <select name="delivery_type" class="input-responsive" required>
                    <option value="1" selected>Instant delivery</option>
                    <option value="2">Scheduled delivery</option>
                </select>

                <div class="order-label">Preferred Delivery date</div>
                <input  type="date" name="delivery_date" placeholder="" class="input-responsive">

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