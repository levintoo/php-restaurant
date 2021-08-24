<?php include('./partials/menu.php') ?>

<div class="main-content">
<div class="wrapper row py-lg-4 py-md-3 col-md-12">
            <p class="fs-2"><strong>Manage Order</strong></p>

            <div class="mb-3">
        </div>
        <table class="">
            <tr class="border-bottom ">
            <th class="p-2 ">S.N.</th>
            <th class="p-2">Food</th>
            <th class="p-2">Price</th>
            <th class="p-2">Qty.</th>
            <th class="p-2">Total</th>
            <th class="p-2">Order Date</th>
            <th class="p-2">Order Type</th>
            <th class="p-2">delivery date</th>
            <th class="p-2">Status</th>
            <th class="p-2">Customer Name</th>
            <th class="p-2">Contact</th>
            <th class="p-2">Address</th>
            <th class="p-2">Email</th>
            <th class="p-2">Actions</th>
            </tr>
            <?php 
                $query = "SELECT * FROM tbl_order ORDER BY delivery_status ASC , id DESC ";
                $result = mysqli_query($db,$query);
                $count = mysqli_num_rows($result);
                $sn=1;
                while ($row= mysqli_fetch_assoc($result)){
                    $food= $row['food'];
                    $price = $row['price'];
                    $qty = $row['quantity'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $order_type = $row['order_type'];
                    $delivery_date = $row['delivery_date'];
                    $status = $row['delivery_status'];
                    $customer_name = $row['customer_name'];
                    $contact = $row['customer_contact'];
                    $address = $row['customer_address'];
                    $email = $row['customer_email'];

                    ?>
            <tr>
                <td class="p-2"><?php echo $sn++ ;?></td>
                <td class="p-2"><?php echo $food;?></td>
                <td class="p-2"><?php echo $price;?></td>
                <td class="p-2"><?php echo $qty;?></td>
                <td class="p-2"><?php echo $total;?></td>
                <td class="p-2"><?php echo $order_date;?></td>
                <td class="p-2"><?php echo $order_type;?></td>
                <td class="p-2"><?php echo $delivery_date;?></td>
                <td class="p-2"><?php
                 if($status ==0){
                     echo "Received";
                 }else if ($status ==1){
                    echo "Pending";
                 }else if ($status ==2){
                    echo "Scheduled";
                 }else if ($status ==3){
                    echo "Cancelled";
                 }else if ($status ==4){
                    echo "Delivered";
                 }
                 ?>
            </td>
                <td class="p-2"><?php echo $customer_name;?></td>
                <td class="p-2"><?php echo $contact;?></td>
                <td class="p-2"><?php echo $address;?></td>
                <td class="p-2"><?php echo $email;?></td>
                <td class="p-2 flex-wrap d-flex">
                    <a href="" class="btn-sm btn-danger p-2">Cancel Order</a>
                </td>
            </tr>
                    <?php
                }
            
            ?>


        </table>
        </div>
</div>

<?php include('./partials/footer.php') ?>