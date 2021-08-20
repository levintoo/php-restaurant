<?php
include('../partials/login-check.php');
include('../../config/constants.php');
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);

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

    if (isset($_FILES['image']['name'])){
        $image_id = 0;

        $query = "SELECT * FROM tbl_category WHERE id ='$image_id'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);

        do{
            $image_id = $image_id + 1;
            $query = "SELECT * FROM tbl_category WHERE id ='$image_id'";
            $result = mysqli_query($db, $query);
            $count = mysqli_num_rows($result);    
            echo $image_id;
        }while($count ==1);
        // name change alt 
        // $image_name = $_FILES['image']['name'];
        // $ext = end(explode('.',$image_name));
        // $image_name = "FOod_categ".rand(000, 999).'.'.$ext;
        // end of name change alt
        $image_name = $image_id.'.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../../images/category/".$image_name;

        $upload = move_uploaded_file($source_path, $destination_path);
    
        if ($upload==false) {
        }else{

        }
    }else{
        $image_name= "";
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

        
        $query = "INSERT into tbl_category (id, title, image_name, featured, active) VALUES ('$image_name','$title', '$image_name', '$featured', '$active')";
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