<?php
include('../../config/constants.php');


if (isset($_GET['id']) && isset($_GET['image_name'])) {
        echo $id = $_GET['id'];
        echo $image_name = $_GET['image_name'];
        
        $query = "SELECT * FROM tbl_food WHERE id =$id";
        $result = mysqli_query($db, $query);
}
