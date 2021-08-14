<?php include('./partials/menu.php')?>

    <!-- main content section start  -->
    <section class="main-content">
    <?php if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    } ?>
        <div class="wrapper row py-lg-4 py-md-3 col-md-12">
            <p class="fs-2"><strong>Dashboard</strong></p>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

            <div class="pb-3 col-lg-3 col-md-6">
                <div class=" bg-white p-3 text-center">
                    <h1>5</h1>

                    Category
                </div>
            </div>

        </div>

    </section>
    <!-- main content section end  -->
    <?php include('./partials/footer.php')?>
