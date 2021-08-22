<?php include('./main-partials/nav.php') ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
        $query = "SELECT * FROM tbl_food WHERE active='Yes'";
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
    <?php include('./main-partials/footer.php') ?>