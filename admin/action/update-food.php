<?php
include('../../config/constants.php');
include('../partials/login-check.php');
$id = $_GET['id'];
$query = "SELECT * FROM tbl_food WHERE id =$id";
$result = mysqli_query($db, $query);
if ($result == true) {
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $categoryid = mysqli_real_escape_string($db, $_POST['category']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $featured = mysqli_real_escape_string($db, $_POST['featured']);
        $active = mysqli_real_escape_string($db, $_POST['active']);
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
        }
    } else {
        $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">food not found</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-food.php');
    }
} else {
    $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">failed to connect to db</strong>
    </div>';
    header('location: http://localhost:7882/wowfood/admin/manage-food.php');
}
if ($image_name == ""){
        $query = "UPDATE tbl_food SET title='$title' ,description= '$description',price= $price,category_id= $categoryid,featured='$featured',active='$active' WHERE id =$id ";
        $result = mysqli_query($db, $query);

        if ($result == true) {
            $_SESSION['updatefood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">Updated successfully</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php');
        }else{
            $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">Failed to update food</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-food.php');
        }
    }else{
        echo $image_name;
    }
?>