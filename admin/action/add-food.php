<?php
include('../../config/constants.php');
include('../partials/login-check.php');
$title = mysqli_real_escape_string($db, $_POST['title']);
$description = mysqli_real_escape_string($db, $_POST['description']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$category = mysqli_real_escape_string($db, $_POST['category']);

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


if(isset($_FILES['image']['name'])){
    $image_name = $title.'.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

    $source_path = $_FILES['image']['tmp_name'];

    $destination_path = "../../images/food/".$image_name;

    $upload = move_uploaded_file($source_path, $destination_path);
    if ($upload == true){
        echo $image_name;
    }else{

        $image_name = "";
    }
}else{
    $image_name = "";
}






        $query = "INSERT INTO tbl_food (title , description , price, active ,featured, image_name, category_id) VALUES ('$title', '$description', $price, '$active', '$featured','$image_name', '$category')";
        $result = mysqli_query($db, $query);

        if ($result == true) {
            $_SESSION['addfood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Food added successfully</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php'); 
        }else{
            $_SESSION['addfood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Failed to add food</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php'); 
        }
    }
}else{

}


?>