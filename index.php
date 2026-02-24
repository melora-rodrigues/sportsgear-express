<?php
include './config.php';
$admin = new Admin();
if (isset($_SESSION["c_id"])) {
    $cid = $_SESSION['c_id'];
    $stt = $admin->ret("SELECT * FROM `customers` where `c_id` ='$cid'");
    $customer = $stt->fetch(PDO::FETCH_ASSOC);
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
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <?php include './includes/header.php'; ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `sub_categories`");
                            while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <li><a href="./products.php?sc_id=<?php echo $category['sc_id']; ?>">
                                        <?php echo $category['sc_title']; ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="./products.php?">
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                                <input class="w-100 form-control" name="search" type="text"
                                    placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>

                        <?php
                        if (isset($_SESSION["c_id"])) { ?>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <img src="./controller/<?php echo $customer['c_profile']; ?>"
                                        style="width:50px;height:50px;object-fit:cover;border-radius:50%" alt="">
                                </div>
                                <div class="hero__search__phone__text" style="margin-top:15px">
                                    <h5>Hy,
                                        <?php echo $customer['c_name']; ?>
                                    </h5>
                                    <!-- <span>support 24/7 time</span> -->
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="hero__item set-bg" data-setbg="img/slider/banner.avif" style="background-size: auto;">
                        <div class="hero__text">
                            <span>PERFORMANCE GEAR</span>
                            <h2>Top-Quality <br />Sports Equipment</h2>
                            <p>Gear Up for Excellence – Fast Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                    $stmt = $admin->ret("SELECT * FROM `sub_categories`");
                    while ($subCategory = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg"
                                data-setbg="./admin/controller/<?php echo $subCategory['sc_picture']; ?>"
                                style="background-size:140% 100%">
                                <h5><a href="./products.php?sc_id=<?php echo $subCategory['sc_id']; ?>">
                                        <?php echo $subCategory['sc_title']; ?>
                                    </a></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">

    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/bnr1.jpg" style="height: 300px;width:100%" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/bnr3.jpg" style="height: 300px;width:100%;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <div class="d-flex justify-content-around flex-wrap">
                                    <?php
                                    $stmt = $admin->ret("SELECT * FROM `products` 
                                        INNER JOIN `sub_categories` ON sub_categories.sc_id = products.sc_id 
                                        WHERE `pd_status` = 'Active' AND `pd_id` % 2 = 0 
                                        ORDER BY `pd_id` ASC LIMIT 4");

                                    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <a href="view-products.php?pd_id=<?php echo $product['pd_id']; ?>"
                                            class="latest-product__item w-50">
                                            <div class="latest-product__item__pic">
                                                <img style="object-fit:cover;width:100px;"
                                                    src="./admin/controller/<?php echo $product['pd_picture']; ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <!-- <a href="./view-products.php"> -->
                                                    <?php echo $product['pd_title']; ?>
                                                    <!-- </a> -->
                                                </h6>
                                                <small>₹<?php echo $product['pd_price']; ?>
                                                    per <?php echo $product['pd_unit_of_measure']; ?> / Day
                                                </small>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <div class="d-flex justify-content-around flex-wrap">
                                    <?php
                                    $stmt = $admin->ret("SELECT * FROM `products` 
                                        INNER JOIN `sub_categories` ON sub_categories.sc_id = products.sc_id 
                                        WHERE `pd_status` = 'Active' AND `pd_id` % 2 <> 0 
                                        ORDER BY `pd_id` ASC LIMIT 4");

                                    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <a href="#" class="latest-product__item w-50">
                                            <div class="latest-product__item__pic">
                                                <img style="object-fit:cover;width:100px;"
                                                    src="./admin/controller/<?php echo $product['pd_picture']; ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo $product['pd_title']; ?>
                                                </h6>
                                                <small>₹<?php echo $product['pd_price']; ?>
                                                    per <?php echo $product['pd_unit_of_measure']; ?> / Day
                                                </small>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Major Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $stmt = $admin->ret("SELECT * FROM `categories` where `ct_status`='Active' ORDER BY `ct_id` ASC LIMIT 3");
                while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img style="object-fit:cover;width:100%;height:300px"
                                    src="./admin/controller/<?php echo $category['ct_picture']; ?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                
                                <h5><a href="./sub-categories.php?ct_id=<?php echo $category['ct_id']; ?>">
                                        <?php echo $category['ct_title']; ?>
                                    </a></h5>
                                <p>
                                    <?php echo $category['ct_caption']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->

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