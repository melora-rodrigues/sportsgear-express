<?php
include './config.php';
$admin = new Admin();
if (isset($_SESSION["c_id"])) {
    $cid = $_SESSION['c_id'];
    $st = $admin->ret("SELECT * FROM `customers` where `c_id` ='$cid'");
    $customer = $st->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SportsGear Express</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php include './includes/header.php'; ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>
                            All Categories
                        </h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>
                                All Categories
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-7">
                    <div class="row">
                        <?php
                        $stmt = $admin->ret("SELECT * FROM `sub_categories` ");
                        while ($subCategory = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img style="width:100%;height: 250px;object-fir:cover"
                                            src="./admin/controller/<?php echo $subCategory['sc_picture']; ?>" alt="" />
                                    </div>
                                    <div class="blog__item__text">
                                        <h5><a>
                                                <?php echo $subCategory['sc_title']; ?>
                                            </a></h5>
                                        <p>
                                            <?php echo $subCategory['sc_caption']; ?>
                                        </p>
                                        <a href="./products.php?sc_id=<?php echo $subCategory["sc_id"]; ?>"
                                            class="blog__btn">View products <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->
    <?php include './includes/footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>