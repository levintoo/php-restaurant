<?php include('./partials/menu.php'); ?>

<section class="main-content">
    <div class="wrapper">

        <?php
        $id = $_GET['id'];

        ?>
        <form action="" class="order" method="POST">

            <!-- <legend class="">Add admin</legend> -->
            <p class="fs-2"><strong>Update password</strong></p>

            <div class="order-label">Old Password</div>
            <input type="password" name="current_password" placeholder="old password" class="input-responsive" required>

            <div class="order-label">New Password</div>
            <input type="password" name="new_password" placeholder="new password" class="input-responsive" required>

            <div class="order-label">Re-enter password</div>
            <input type="password" name="confirm_password" placeholder="confirm password" class="input-responsive" required>

            <div class="order-label">Already have an account? <a href="http://localhost:7882/wowfood/login.php">login</a> </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="submit" class="btn btn-success">


        </form>

    </div>
</section>
<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = $_POST['current_password'];
    $current_password = hash('sha512', $current_password);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $query = "SELECT * FROM tbl_admin WHERE id =$id AND password='$current_password'";
    $result = mysqli_query($db, $query);

    if ($result == true) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            
        } else {
            $_SESSION['user-not-found'] = '<div class="alert alert-warning alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">User not found</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-admin.php');
        }
    } else {
    }
} else {
}

?>


<?php include('./partials/footer.php'); ?>