<?php include('./partials/menu.php'); ?>

<!-- main content section start  -->
<section class="main-content">
    <?php if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    } ?>
    <div class="wrapper row py-lg-4 py-md-3 col-md-12 ">
        <p class="fs-2"><strong>Manage Admin</strong></p>


        <?php if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        } ?>
        <?php if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        } ?>
        <?php if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        } ?>
        <?php if (isset($_SESSION['password-change'])) {
            echo $_SESSION['password-change'];
            unset($_SESSION['password-change']);
        } ?>
        <?php if (isset($_SESSION['newuser'])) {
            echo $_SESSION['newuser'];
            unset($_SESSION['newuser']);
        } ?>

        <div class="mb-3">
            <a href="add-admin.php" class="btn-sm btn-info text-light p-2">Add Admin</a>
        </div>
        <table>
            <tr class="border-bottom">
                <th class="p-2">ID</th>
                <th class="p-2">Full Name</th>
                <th class="p-2">Username</th>
                <th class="p-2">Actions</th>
            </tr>



            <?php

            // get all admin
            $query = "SELECT * FROM tbl_admin";
            $result = mysqli_query($db, $query);
            if ($result == true) {
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $username = $row['username'];


            ?>


                        <tr>
                            <td class="p-2"><?php echo $row['id']; ?></td>
                            <td class="p-2"><?php echo $row['full_name']; ?></td>
                            <td class="p-2"><?php echo $row['username']; ?></td>
                            <td class="p-2 flex-wrap d-flex">
                                <a href="http://localhost:7882/wowfood/admin/update-password.php?id=<?php echo $id; ?>" class="btn-sm me-2 btn-info  text-light p-2">Change password</a>
                                <a href="http://localhost:7882/wowfood/admin/edit-admin.php?id=<?php echo $id; ?>" class="me-2 btn-sm btn-success p-2">Update Admin</a>
                                <a href="http://localhost:7882/wowfood/admin/action/delete-admin.php?id=<?php echo $id; ?>" class="me-2 btn-sm btn-danger p-2">Delete Admin</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                }
            } else {
            }
            ?>
        </table>
    </div>
</section>
<!-- main content section end  -->

<?php include('./partials/footer.php') ?>