<?php include('./partials/menu.php'); ?>

<section class="main-content">
    <div class="wrapper">

    <form action="http://localhost:7882/wowfood/admin/action/register-admin.php" class="order" method="POST">
                
                <!-- <legend class="">Add admin</legend> -->
        <p class="fs-2"><strong>Add Admin</strong></p>

                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                <div class="order-label">Username</div>
                <input type="text" name="username" placeholder="" class="input-responsive" required>

                <div class="order-label">Password</div>
                <input type="password" name="password" placeholder="" class="input-responsive" required>

                <div class="order-label">Re-enter password</div>
                <input type="password" name="passwordCheck" placeholder="" class="input-responsive" required>

                <div class="order-label">Already have an account? <a href="http://localhost:7882/wowfood/login.php">login</a> </div>

                <input type="submit" name="submit" value="Add admin" class="btn btn-success">
            

        </form>

    </div>
</section>
    
<?php include('./partials/footer.php'); ?>

