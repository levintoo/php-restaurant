<?php include('./partials/menu.php');;
$id = $_GET['id'];
if ($id == false) {
    $_SESSION['nocateg'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">Category Not available</strong>
    </div>';
    header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
}else{
    
}

$query = "SELECT * FROM tbl_category WHERE id =$id";
$result = mysqli_query($db, $query);
if ($result == true) {
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        $_SESSION['nocateg'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">Category Not available</strong>
    </div>';
        header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
    } else {
        $data = mysqli_fetch_assoc($result);
        $title = $data['title'];
        $image_name = $data['image_name'];
        $featured = $data['featured'];
        $active = $data['active'];
    }
} else {
    $_SESSION['nocateg'] = '<div class="alert text-warning alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">no match on db</strong>
    </div>';
        header("Location: http://localhost:7882/wowfood/admin/manage-category.php");
}
?>

<style>
    .food-search {
        height: 110vh;
    }
</style>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Edit category</h2>

        <form action="http://localhost:7882/wowfood/admin/action/update-categ.php?id=<?php echo $id; ?>" method="POST" class="order" enctype="multipart/form-data">
            <fieldset>
                <legend></legend>

                <div class="order-label">Title</div>
                <input type="text" name="title" placeholder="" value="<?php echo $title; ?>" class="input-responsive">

                <div class="order-label">Image</div>
                <img src="../images/category/<?php echo $image_name; ?>" alt="Unavailable" height="100px">
                <div class="order-label">Image</div>
                <input type="file" name="image" placeholder="" class="input-responsive">

                <!-- //featured -->
                <div class="order-label text-danger">Featured :</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Yes" type="radio" name="featured" placeholder="" class="mx-4" 
                    <?php if ($featured == "Yes") {
                            echo "checked";
                        } else {} ?>>

                    No
                    <input value="No" type="radio" name="featured" placeholder="" class="mx-2" 
                    <?php if ($featured == "No") {
                                echo "checked";
                         } else {} ?>>
                </div>
                <!-- //end of featured -->
                <!-- //active -->
                <div class="order-label text-danger">Active :</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Yes" type="radio" name="active" placeholder="" class="mx-4" 
                    <?php if ($active == "Yes") {
                        echo "checked";
                            } else {} ?>>

                    No
                    <input value="No" type="radio" name="active" placeholder="" class="mx-2" 
                    <?php if ($active == "No") {
                        echo "checked";
                            } else {} ?>>
                </div>
                <!-- //end of active -->
                <input type="hidden" name="image_name"  value="<?php echo $image_name; ?>" class="input-responsive">
                <input type="submit" name="submit" value="Add category" class="btn my-2 btn-primary px-2">
            </fieldset>
        </form>


    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<?php include('./partials/footer.php'); ?>