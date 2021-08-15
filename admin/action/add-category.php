<?php 

include('../../config/constants.php');
if (isset($_POST['submit'])){
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $image = mysqli_real_escape_string($db, $_POST['image']);

                if (isset($_POST['featured'])){
                    $featured = mysqli_real_escape_string($db, $_POST['featured']);
                }else{
                    $featured = "no";
                }
                if (isset($_POST['active'])){
                    $active = mysqli_real_escape_string($db, $_POST['active']);
                }else{
                    $active = "no";
                }
                $query = "INSERT into tbl_category (title, image_name, featured, active) VALUES ('$title', '$image', '$featured', '$active')";
                $result = mysqli_query($db, $query);

                if ($result == true){
                    $_SESSION['addcateg'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                    <strong class="me-5">Added category successfully</strong></div>';
                    header('location: http://localhost:7882/wowfood/admin/manage-category.php');
                }else{
                    
                }
            }else{
                
            }?>