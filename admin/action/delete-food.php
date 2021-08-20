<?php
include('../../config/constants.php');
include('../partials/login-check.php');

if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    $query = "SELECT * FROM tbl_food WHERE id =$id";
    $result = mysqli_query($db, $query);
    if ($result == true) {
        if ($image_name == "") {
            $query = "DELETE FROM tbl_food WHERE id =$id";
            $result = mysqli_query($db, $query);
            if ($result == true) {
                $_SESSION['deletefood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                    <strong class="mx-2">Food successfully deleted</strong>
                    </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-food.php');
            } else {
                $_SESSION['deletefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                    <strong class="mx-2">Failed to remove food</strong>
                    </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-food.php');
            }
        } else {
            $path = "../../images/food/$image_name";
            $remove = unlink($path);
            if ($remove == true) {
                $query = "DELETE FROM tbl_food WHERE id =$id";
                $result = mysqli_query($db, $query);

                if ($result == true) {
                    $_SESSION['deletefood'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="mx-2">Food successfully deleted</strong>
                        </div>';
                    header('location: http://localhost:7882/wowfood/admin/manage-food.php');
                } else {
                    $_SESSION['deletefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                        <strong class="mx-2">Failed to remove food</strong>
                        </div>';
                    header('location: http://localhost:7882/wowfood/admin/manage-food.php');
                }
            } else {
                $_SESSION['deletefood'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                    <strong class="mx-2">Failed to remove image</strong>
                    </div>';
                header('location: http://localhost:7882/wowfood/admin/manage-food.php');
            }
        }
    }
} else {
    header('location: http://localhost:7882/wowfood/admin/manage-food.php');
}
