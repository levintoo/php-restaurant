<?php include('./main-partials/nav.php');
include('./main-partials/customer-login.php');

$email = $_SESSION['customer'];

$query = "SELECT * FROM tbl_customer WHERE email= '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$fullname = $row['full_name'];
$contact = $row['contact'];
$address = $row['address'];

?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">


        <form action="" class="order" method="POST">
            <fieldset>

                <legend class="text-center">User</legend>

                <div class="order-label">Full Name: <span class="input-responsive text-success"><?php echo $fullname; ?></span></div>

                <input type="hidden" name="full_name" value="<?php echo $fullname; ?>">

                <div class="order-label">Email: <span class="input-responsive text-success"><?php echo $email; ?></span></div>

                <input type="hidden" name="email" value="<?php echo $email; ?>">

                <div class="order-label">Phone Number: <span class="input-responsive text-success"><?php echo $contact; ?></span></div>

                <input type="hidden" value="<?php echo $contact; ?>" name="contact">

                <div class="order-label">Adress : <span class="input-responsive text-success"><?php echo $address; ?></span></div>

                <input type="hidden" value="<?php echo $address; ?>" name="contact">
<br>
                <input type="submit" name="submit" value="edit details" class="btn btn-primary">
                <a type="submit" href="#"value="" class="btn btn-warning">check orders</a>


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