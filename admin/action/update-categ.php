<?php
include('../../config/constants.php');
include('../partials/login-check.php');
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

if (isset($_FILES['image']['name'])) {
    $destination_path = "../../images/category/" . $image_name;

    if (file_exists($destination_path)) {
        unlink($destination_path);
        $source_path = $_FILES['image']['tmp_name'];

        $image_id = $id;
        $image_name = $image_id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $upload = move_uploaded_file($source_path, $destination_path);
        if ($upload == true) {
        } else {
        }
    } else {
        $source_path = $_FILES['image']['tmp_name'];

        $image_id = $id;
        $image_name = $image_id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $upload = move_uploaded_file($source_path, $destination_path);
        if ($upload == true) {
        } else {
        }
    }
} else {
    $image_name = "";
}

$query = "UPDATE tbl_category  SET title='$title', featured='$featured', active='$active', image_name='$image_name' WHERE id=$id";
$result = mysqli_query($db, $query);

if ($result == true) {
    $_SESSION['updatedcateg'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="mx-2">Category updated</strong>
            </div>';
    header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
} else {
    $_SESSION['updatedcateg'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">Failed to update categoryed</strong>
    </div>';
header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
}
