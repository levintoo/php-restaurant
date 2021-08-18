<?php

include('../../config/constants.php');
//get id of category to delete


    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_category WHERE id =$id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $image_name = $row['image_name'];

        $path = "../../images/category/".$image_name;
        if (file_exists($path)) {
        $remove = unlink($path);

        if($remove===false){
            $_SESSION['deletecateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">Failed to remove image name</strong>
                </div>';
                
                header('location: http://localhost:7882/wowfood/admin/manage-category.php');
                
        }else{
            $query = "DELETE FROM tbl_category WHERE id =$id";
            $result = mysqli_query($db, $query);
            if($result ==true) {
                
                $_SESSION['deletecateg'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">category successfully deleted</strong>
                </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-category.php');
            }
            else{
             
                $_SESSION['deletecateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="me-5">Failed to delete category</strong>
            
            </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-category.php');
            
            }
        }
    }else{
        $query = "DELETE FROM tbl_category WHERE id =$id";
        $result = mysqli_query($db, $query);
        if($result ==true) {
            
            $_SESSION['deletecateg'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">category successfully deleted</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-category.php');
        }
        else{
         
            $_SESSION['deletecateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Failed to delete category</strong>
        
        </div>';
            header('location: http://localhost:7882/wowfood/admin/manage-category.php');
        
        }
        }





