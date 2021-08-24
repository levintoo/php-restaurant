<?php
include('../config/constants.php') ;
// food detaisl
    $food_id = $_GET['foodid'];
    $food = $_POST['food'];
    $food_price = $_POST['food_price'];
    $quantity = $_POST['qty'];
// customer details
    $customer_id = $_GET['userid'];
    $customer_name = $_POST['full_name'];
    $customer_email = $_POST['email'];
    $customer_contact = $_POST['contact'];
    $customer_address = $_POST['address'];
   // order detaisl
   $order_type = $_POST['delivery_type'];
   $order_date = date('Y-m-d h:i:s');
   $delivery_date = $_POST['delivery_date'];

   if ($order_type ==1){
    $delivery_date = "";
    $status = "Ordered";
   }else if ($order_type ==2){
    $delivery_date = $_POST['delivery_date'];
    $status = "Scheduled order";
   }

   if($delivery_date == ""){
    $delivery_date = "";
    $status = "Ordered";
   }else{
    $delivery_date = $_POST['delivery_date'];
    $status = "Scheduled order";
   }

    $vat = $food_price * 0.12;
    $subtotal = $food_price * $quantity;
    $total = $vat + $subtotal ;

    $query = "INSERT into tbl_order (food,price,quantity,order_type,delivery_date,subtotal,vat,total,order_date,delivery_status,customer_name,customer_contact,customer_email,customer_address) VALUES ($food_id,$food_price,$quantity,$order_type,'$delivery_date',$subtotal,$vat,$total,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
    $result = mysqli_query($db, $query);

    if($result == true){
        $_SESSION['foodorder'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="me-5">Successful</strong>
        </div>';
        header('location: '.SITEURL.'index.php');
    }else{
        $_SESSION['foodorder'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="me-5">failed to order</strong>
        </div>';
        header('location: '.SITEURL.'index.php');
    }
?>