<?php include('./partials/menu.php');
$id = $_GET['id'];
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Admin </h2>

        <form action="<?php echo SITEURL; ?>/admin/action/cancel-delivery.php?id=<?php echo $id; ?>" method="post" class="order">
            <fieldset>
                <legend>Cancelled by admin</legend>

                <div class="order-label">Reason for cancellation</div>
                <textarea type="text" name="coment" placeholder="" class="input-responsive" required></textarea>

                <div class="order-label">Input password to confirm</div>
                <input type="password" name="password" placeholder="" class="input-responsive" required>

                <div class="order-label">Not made up to cancel? <a href="<?php echo SITEURL; ?>admin/manage-order.php"> Click here</a> </div>

                <input type="submit" name="submit" value="Confrim" class="btn btn-primary px-2">
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
    <div class="container wrapper text-center">
        <p>All rights reserved. Designed By <a class="text-secondary" target="_blank" href="https://levintoo.me/">levin</a></p>
    </div>
</section>
<!-- social Section Ends Here -->

