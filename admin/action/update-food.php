<?php
include('../../config/constants.php');
include('../partials/login-check.php');
$id = $_GET['id'];
$query = "SELECT * FROM tbl_food WHERE id =$id";
$result = mysqli_query($db, $query);
if ($result == true) {
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($count == 1) {
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $categoryid = mysqli_real_escape_string($db, $_POST['category']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $featured = mysqli_real_escape_string($db, $_POST['featured']);
        $active = mysqli_real_escape_string($db, $_POST['active']);
        $current_image = $row['image_name'];
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
        $query = "UPDATE tbl_food SET description= '$description',price= $price,category_id= $categoryid,featured='$featured',active='$active' WHERE id =$id ";
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
        if ($current_image === ""){
            $image_name = $id.'.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    
            $source_path = $_FILES['image']['tmp_name'];
        
            $destination_path = "../../images/food/".$image_name;
        
            $upload = move_uploaded_file($source_path, $destination_path);
            if ($upload == true){
                $query = "UPDATE tbl_food SET description= '$description',price= $price,category_id= $categoryid,featured='$featured',active='$active', image_name ='$image_name' WHERE id =$id ";
                $result = mysqli_query($db, $query);
                $_SESSION['updatefood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">Updated successfully</strong>
                </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-food.php');  

            }else{
                $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">Failed to update image</strong>
                </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-food.php');  
            }
        }else{
            $path = "../../images/food/$current_image";
            if (file_exists($path)) {
                $remove =unlink($path);
                if ($remove == true) {
                    $image_name = $id.'.' . pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    
                    $source_path = $_FILES['image']['tmp_name'];
                
                    $destination_path = "../../images/food/".$image_name;
                
                    $upload = move_uploaded_file($source_path, $destination_path);
                    if ($upload == true){
                        $query = "UPDATE tbl_food SET description= '$description',price= $price,category_id= $categoryid,featured='$featured',active='$active', image_name ='$image_name' WHERE id =$id ";
                        $result = mysqli_query($db, $query);
                        $_SESSION['updatefood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="mx-2">Updated successfully</strong>
                        </div>';
                        header('location: http://localhost:7882/wowfood/admin/manage-food.php');  
    
                    }else{
                        $_SESSION['updatefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="mx-2">Failed to update image</strong>
                        </div>';
                        header('location: http://localhost:7882/wowfood/admin/manage-food.php');  
                    }
                }
            }else{
               
            }
        }
        
    }
