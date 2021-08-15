<?php

include('../../config/constants.php');
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);


    if (isset($_POST['featured'])) {
        $featured = mysqli_real_escape_string($db, $_POST['featured']);
    } else {
        $featured = "no";
    }
    if (isset($_POST['active'])) {
        $active = mysqli_real_escape_string($db, $_POST['active']);
    } else {
        $active = "no";
    }

    if (isset($_FILES['image']['name'])){

        $image_name = $_FILES['image']['name'];

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../../images/category/".$image_name;

        $upload = move_uploaded_file($source_path, $destination_path);
    
        if ($upload==false) {
            $_SESSION['upload'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Failed to upload image</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/add-category.php');
      
        }else{
            die();
        }
    }else{
        $image_name = "";
    }

    $query = "SELECT * FROM tbl_category WHERE title ='$title'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['addcateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="me-5">Category already exists</strong></div>';
        header('location: http://localhost:7882/wowfood/admin/manage-category.php'); 
    }
    else {
        $query = "INSERT into tbl_category (title, image_name, featured, active) VALUES ('$title', '$image_name', '$featured', '$active')";
        $result = mysqli_query($db, $query);
    
        if ($result == true) {
            $_SESSION['addcateg'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="me-5">Added category successfully</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-category.php');
        } else {
            $_SESSION['addcateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="me-5">Failed to add category</strong></div>';
            header('location: http://localhost:7882/wowfood/admin/manage-category.php');
        }
    }
    
} 