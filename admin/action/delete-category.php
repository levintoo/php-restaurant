<?php

include('../../config/constants.php');
//get id of admin to delete
$id = $_GET['id'];
//query to delete
$query = "DELETE FROM tbl_category WHERE id =$id";
$result = mysqli_query($db, $query);
// check query excution succesful or not
if($result ==true) {
    //succesful
    // echo "admin deleted";
    //create session to display message
    $_SESSION['deletecateg'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">category successfully deleted</strong>
    </div>';
    header('location: http://localhost:7882/wowfood/admin/manage-category.php');
}
else{
    //filed
    //echo "filed";
    $_SESSION['deletecateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="me-5">Failed to delete category</strong>

</div>';
    header('location: http://localhost:7882/wowfood/admin/manage-category.php');

}
//redirect to manage admin with message success or failed
