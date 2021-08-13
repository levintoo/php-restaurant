<?php

include('../../config/constants.php');
//get id of admin to delete
$id = $_GET['id'];
//query to delete
$query = "DELETE FROM tbl_admin WHERE id =$id";
$result = mysqli_query($db, $query);
// check query excution succesful or not
if($result ==true) {
    //succesful
    // echo "admin deleted";
    //create session to display message
    $_SESSION['delete'] = "Admin deleted";
    header('location: http://localhost:7882/wowfood/admin/manage-admin.php');
}
else{
    //filed
    //echo "filed";
    $_SESSION['delete'] = "Failed to delete admin";
    header('location: http://localhost:7882/wowfood/admin/manage-admin.php');

}
//redirect to manage admin with message success or failed

?>