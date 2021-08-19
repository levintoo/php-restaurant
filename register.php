<?php include('./main-partials/nav.php') ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Create account</h2>

            <form action="http://localhost:7882/wowfood/php/insert-user.php" class="order" method="POST">
                
                    <legend>User Details</legend>
                    <?php if (isset($_SESSION['emailtaken'])) {
                        echo $_SESSION['emailtaken'];
                        unset($_SESSION['emailtaken']);
                    } ?>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <input name="address" rows="10" placeholder="" class="input-responsive" required></input>

                    <div class="order-label">Password</div>
                    <input type="password" name="password" placeholder="" class="input-responsive" required>

                    <div class="order-label">Re-enter password</div>
                    <input type="password" name="passwordCheck" placeholder="" class="input-responsive" required>

                    <div class="order-label">Already have an ccount? <a href="http://localhost:7882/wowfood/login.php">login</a> </div>

                    <input type="submit" name="submit" value="Create account" class="btn btn-primary">
                

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
    <?php include('./main-partials/footer.php')?>