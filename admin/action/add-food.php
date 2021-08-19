<?php
include('../../config/constants.php');

$title = mysqli_real_escape_string($db, $_POST['title']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$price = mysqli_real_escape_string($db, $_POST['price']);

if (isset($_POST['featured'])) {
    $featured = mysqli_real_escape_string($db, $_POST['featured']);
} else {
    $featured = "No";
}
if (isset($_POST['active'])) {
    $active = mysqli_real_escape_string($db, $_POST['active']);
} else {
    $active = "No";
}

$query = "SELECT * FROM tbl_food WHERE title ='$title'";
$result = mysqli_query($db, $query);

if ($result == true) {
    $count = mysqli_num_rows($result);
    if ($count >0) {
        $_SESSION['addfood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Food already exists</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php');
    }else{
        $query = "INSERT INTO tbl_food (title , description , price, active ,featured) VALUES ('$title', '$description', $price, '$active', '$featured')";
        $result = mysqli_query($db, $query);

        if ($result == true) {
            $_SESSION['addfood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Food added successfully</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php'); 
        }else{

        }
    }
}else{

}


?>