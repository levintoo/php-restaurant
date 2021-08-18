<?php
include('../../config/constants.php');
$id = $_GET['id'];

$title = mysqli_real_escape_string($db, $_POST['title']);
$image_name = mysqli_real_escape_string($db, $_POST['image_name']);

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

$query = "SELECT * FROM tbl_category WHERE title='$title'";
$result = mysqli_query($db, $query);
if ($result == true) {
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
        $_SESSION['nocateg'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">Category already exists</strong>
        </div>';
    } else {
        

        $query = "UPDATE tbl_category  SET title='$title', featured='$featured', active='$active' WHERE id=$id";
        $result = mysqli_query($db, $query);

        if ($result == true) {
            $_SESSION['updatedcateg'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">Category updated</strong>
            </div>';
            header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
        } else {

        }
    }
}
