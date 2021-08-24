<?php include('./main-partials/nav.php') ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
            
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods </h2>

            <?php
        $query = "SELECT * FROM tbl_category WHERE featured='Yes' LIMIT  3 ";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                echo '<a href="' . SITEURL . 'category-foods.php?id=' . $id . '">
                <div class="box-3 float-container">
                    <img  src="images/category/' . $image_name . '" alt="' . $title . '" class="img-responsive img-curve">
                    <h3 class="float-text text-white">' . $title . '</h3>
                </div>
            </a>';
            }
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">No categories</strong>
                </div>';
        }
        ?>
        
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
        $query = "SELECT * FROM tbl_food WHERE featured='Yes' LIMIT 6";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $description = $row['description'];
                $active = $row['active'];
                $featured = $row['featured'];
                echo '<div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="'.SITEURL.'images/food/'.$image_name.'" alt="'.$image_name.'" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>'.$title.'</h4>
                    <p class="food-price">$'.$price.'</p>
                    <p class="food-detail">'.$description.'</p>
                    <br>

                    <a href="'.SITEURL.'order.php?id='.$id.'" class="btn btn-primary">Order Now</a>
                </div>
            </div>
    ';
            }
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="mx-2">No food found</strong>
                </div>';
        }
        ?>


            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
    <?php include('./main-partials/footer.php') ?>