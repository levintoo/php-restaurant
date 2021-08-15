<?php include('./partials/menu.php') ?>
<style>
    .food-search {
        height: 100vh;
    }
</style>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Add category</h2>

        <form action="http://localhost:7882/wowfood/admin/action/add-category.php" method="POST" class="order">
            <fieldset>
                <legend></legend>
                <div class="order-label">Title</div>
                <input type="text" name="title" placeholder="" class="input-responsive" >

                <div class="order-label">Image</div>
                <input type="file" name="image" placeholder="" class="input-responsive" >
               
                <!-- //featured -->
                <div class="order-label text-danger">Featured</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="yes" type="radio" name="featured" placeholder="" class="mx-4">

                    No
                    <input value="no" type="radio" name="featured" placeholder="" class="mx-2">
                </div>
                <!-- //end of featured -->
                <!-- //active -->
                <div class="order-label text-danger">Active</div>
                <div class="order-label input-responsive">
                    Yes
                    <input value="yes" type="radio" name="active" placeholder="" class="mx-4">

                    No
                    <input value="no" type="radio" name="active" placeholder="" class="mx-2">
                </div>
                <!-- //end of active -->
                <input type="submit" name="submit" value="Add category" class="btn my-2 btn-primary px-2">
            </fieldset>
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<?php include('./partials/footer.php'); ?>