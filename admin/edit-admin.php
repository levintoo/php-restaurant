<?php include('./partials/menu.php');
$id = $_GET['id']; ?>

<section class="main-content">
    <div class="wrapper">

        <form action="" class="order" method="POST">

            <!-- <legend class="">Add admin</legend> -->
            <p class="fs-2"><strong>Edit Details</strong></p>

            <div class="order-label">Full Name</div>
            <input type="text" name="full-name" class="input-responsive" value=
            "<?php if (isset($_SESSION['fullname'])) {
                echo $_SESSION['fullname'];
                unset($_SESSION['fullname']);
            } ?>">

            <div class="order-label">Username</div>
            <input type="text" name="username" class="input-responsive" value=
            "<?php if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
                unset($_SESSION['username']);
            } ?>">

            <div class="order-label">Not seeing your data?<a href="" >update</a> </div>

            <input type="submit" name="submit" value="Update" class="btn btn-info text-white">



        </form>

    </div>
</section>

<?php include('./partials/footer.php'); ?>
<?php


$query = "SELECT * FROM tbl_admin WHERE id=$id";

$result = mysqli_query($db, $query);

if($result == true){
   $count = mysqli_num_rows($result);
    if($count ==1){
        //get admin details
        $data = mysqli_fetch_assoc($result);

        $_SESSION['fullname'] =($full_name = $data['full_name']);
        $_SESSION['username'] =($username = $data['username']);
        // header("location: http://localhost:7882/wowfood/admin/edit-admin.php?id=$id");

        
    }else{
        $_SESSION['update'] = '<div class="alert alert-warning alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="me-5">Admin not found!</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-admin.php');
    }
}
else{
    
}
?>