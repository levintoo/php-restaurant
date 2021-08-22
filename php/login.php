 <?php

include('../config/constants.php') ;
$email = mysqli_real_escape_string($db, $_POST['email']);
$pass = mysqli_real_escape_string($db, $_POST['password']);
$pass = md5($pass);

$query = "SELECT id FROM tbl_customer WHERE email= '$email' AND password= '$pass'";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) == 1){
    $_SESSION['customer'] = $email;
    $_SESSION['loginuser'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="me-5">Login to order food</strong>
    </div>';
    header('location: '.SITEURL.'index.php'); 
}
else{
    $_SESSION['customerlogin'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="me-5">Error check the details</strong>
    </div>';
    header('location: '.SITEURL.'login.php');
}
?>