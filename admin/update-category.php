<?php include('./partials/menu.php');;
$id = $_GET['id'];


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

        <form action="" method="POST" class="order" enctype="multipart/form-data">
            <fieldset>
                <legend></legend>

                <div class="order-label">Title</div>
                <input type="text" name="title" placeholder="" value="<?php echo $title; ?>" class="input-responsive">

                <div class="order-label">Image</div>
                <img src="../images/category/<?php echo $image_name; ?>" alt="Unavailable" height="100px">
                <div class="order-label">Image</div>
                <input type="file" name="image" placeholder="" class="input-responsive">

                <!-- //featured -->
                <div class="order-label text-danger">Featured : <span class="text-secondary"><?php echo $featured; ?></span></div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Nes" type="radio" name="featured" placeholder="" class="mx-4">

                    No
                    <input value="No" type="radio" name="featured" placeholder="" class="mx-2">
                </div>
                <!-- //end of featured -->
                <!-- //active -->
                <div class="order-label text-danger">Active : <span class="text-secondary"><?php echo $featured; ?></span></div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="Yes" type="radio" name="active" placeholder="" class="mx-4">

                    No
                    <input value="No" type="radio" name="active" placeholder="" class="mx-2">
                </div>
                <!-- //end of active -->
                <input type="submit" name="submit" value="Add category" class="btn my-2 btn-primary px-2">
            </fieldset>
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<?php include('./partials/footer.php'); ?>