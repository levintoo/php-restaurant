<?php include('./partials/menu.php');
$id = $_GET['id']; 


$query = "SELECT * FROM tbl_admin WHERE id=$id";

$result = mysqli_query($db, $query);

if($result == true){
   $count = mysqli_num_rows($result);
    if($count ==1){
        //get admin details
        $data = mysqli_fetch_assoc($result);

        $full_name = $data['full_name'];
        $username = $data['username'];
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

<section class="main-content">
    <div class="wrapper">

        <form action="" class="order" method="POST">

            <!-- <legend class="">Add admin</legend> -->
            <p class="fs-2"><strong>Edit Details</strong></p>

            <div class="order-label">Full Name</div>
            <input type="text" name="full-name" class="input-responsive" value="<?php echo  $full_name; ?>">

            <div class="order-label">Username</div>
            <input type="text" name="username" class="input-responsive" value="<?php echo  $username; ?>">

            <div class="order-label">Not seeing your data?<a href="" > submit</a> </div>

            <input type="submit" name="submit" value="update" class="btn btn-info text-white">
            <input type="hidden" name="id" value="<?php echo $id; ?>" class="btn btn-info text-white">



        </form>
    </div>
</section>



<?php 
if (isset($_POST['full-name'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full-name'];
    $username = $_POST['username'];

    $query = "UPDATE tbl_admin SET full_name='$full_name',username='$username', id='$id' WHERE id='$id' ";
    $result = mysqli_query($db, $query);

    if($result == true){
        $_SESSION['update'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">Updated successfully</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-admin.php');
    }
    else{
        $_SESSION['update'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">Failed to edit admin details</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-admin.php');
    }
}
else{
    
}    
?>
<?php include('./partials/footer.php'); ?>


