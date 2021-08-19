<?php include('./partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper row py-lg-4 py-md-3 col-md-12">
        <p class="fs-2"><strong>Manage Category</strong></p>
        <div class="mb-3">
            <?php if (isset($_SESSION['addcateg'])) {
                echo $_SESSION['addcateg'];
                unset($_SESSION['addcateg']);
            } ?>
            <?php if (isset($_SESSION['nocateg'])) {
                echo $_SESSION['nocateg'];
                unset($_SESSION['nocateg']);
            } ?>
            <?php if (isset($_SESSION['deletecateg'])) {
                echo $_SESSION['deletecateg'];
                unset($_SESSION['deletecateg']);
            } ?>
             <?php if (isset($_SESSION['updatedcateg'])) {
                echo $_SESSION['updatedcateg'];
                unset($_SESSION['updatedcateg']);
            } ?>
            <a href="http://localhost:7882/wowfood/admin/add-category.php" class="btn-sm btn-info text-light p-2">Add Category</a>
        </div>
        <table>
            <tr class="border-bottom">
                <th class="p-2">S.N.</th>
                <th class="p-2">Title</th>
                <th class="p-2">Image</th>
                <th class="p-2">Featured</th>
                <th class="p-2">Active</th>
                <th class="p-2">Actions</th>
            </tr>

            <?php
            $query = "SELECT * FROM tbl_category";
            $result = mysqli_query($db, $query);
            if ($result == true) {
                $count = mysqli_num_rows($result);

                $sn = 1;
                if ($count = 0) {
                    $_SESSION['nocateg'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                    <strong class="mx-2">No categries found</strong>
                    </div>';
                } else {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $active = $row['active'];
                        $featured = $row['featured'];

            ?>
                        <tr>
                            <td class="p-2"><?php echo $sn++ ?></td>
                            <td class="p-2"><?php echo $title; ?></td>

                            <td class="p-2">
                                <?php
                                if (!$image_name == "") {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px" alt="<?php echo $image_name; ?>">
                                <?php
                                } else {
                                    echo '<span class="text-danger">No image available</span>';
                                }
                                ?>
                            </td>

                            <td class="p-2"><?php echo $featured; ?></td>
                            <td class="p-2"><?php echo $active; ?></td>
                            <td class="p-2 ">
                                <span class="d-flex flex-wrap">
                                    <a href="http://localhost:7882/wowfood/admin/update-category.php?id=<?php echo $id ?>" class="btn-sm btn-success p-2">Update Category</a>
                                    <a href="http://localhost:7882/wowfood/admin/action/delete-category.php?id=<?php echo $id; ?>" class="me-2 btn-sm btn-danger p-2 " disabled>Delete Category</a>

                                </span>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>

        </table>

    </div>
</div>

<?php include('./partials/footer.php') ?>