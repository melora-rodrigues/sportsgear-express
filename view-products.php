<?php
include './config.php';
$admin = new Admin();
if (isset($_SESSION["c_id"])) {
    $cid = $_SESSION['c_id'];
    $st = $admin->ret("SELECT * FROM `customers` where `c_id` ='$cid'");
    $customer = $st->fetch(PDO::FETCH_ASSOC);
}
$pdid = $_GET['pd_id'];
$st2 = $admin->ret("SELECT * FROM `products` INNER JOIN `sub_categories` ON sub_categories.sc_id = products.sc_id INNER JOIN `categories` ON categories.ct_id=sub_categories.ct_id WHERE `pd_id`='$pdid'");
$products = $st2->fetch(PDO::FETCH_ASSOC);
$scid = $products['sc_id'];
$pdid = $products['pd_id'];
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
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>
                            <?php echo $products['pd_title']; ?>
                        </h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="./products.php?sc_id=<?php echo $products['sc_id']; ?>">
                                <?php echo $products['sc_title']; ?>
                            </a>
                            <span>
                                <?php echo $products['pd_title']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="./admin/controller/<?php echo $products['pd_picture']; ?>" alt="" />
                        </div>
                        <!-- <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="" />
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="" />
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="" />
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="" />
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>
                            <?php echo $products['pd_title']; ?>
                        </h3>
                        <!-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> -->
                        <div class="product__details__price">₹
                            <?php echo $products['pd_price']; ?> per
                            <?php echo $products['pd_unit_of_measure']; ?> / Day
                        </div>
                        <p>
                            <?php echo $products['pd_caption']; ?>
                        </p>
                        <!-- <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" />
                                </div>
                            </div>
                        </div> -->
                        <?php
                        if (isset($_SESSION["c_id"])) { ?>
                            <a href="./controller/cart.php?pd_id=<?php echo $products['pd_id']; ?>" class="primary-btn">ADD
                                TO CARD</a>
                        <?php } else { ?>
                            <a href="./login.php" class="primary-btn">ADD
                                TO CARD</a>
                        <?php } ?>

                        <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        <ul>
                            <li><b>Availability</b>
                                <?php $products['pd_quantity'] > 0 ? print("<span style='color:green;font-weight:bolder'>In Stock</span>") : print("<span style='color:red;font-weight:bolder'>Out of Stock</span>"); ?>
                            </li>
                            <li>
                                <b>Shipping</b>
                                <span>01 day shipping. <samp>Free pickup today</samp></span>
                            </li>
                            <li><b>Weight</b> <span>1
                                    <?php echo $products['pd_unit_of_measure']; ?>
                                </span></li>
                            <li><b>Time</b> <span>1
                                    Day
                                </span></li>
                            <!-- <li>
                                <b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>
                                        Vestibulum ac diam sit amet quam vehicula elementum sed
                                        sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                                        Proin eget tortor risus. Vivamus suscipit tortor eget
                                        felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue
                                        leo eget malesuada. Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Curabitur arcu erat, accumsan id
                                        imperdiet et, porttitor at sem. Praesent sapien massa,
                                        convallis a pellentesque nec, egestas non nisi. Vestibulum
                                        ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae; Donec velit neque, auctor
                                        sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                                        eget tortor risus.
                                    </p>
                                    <p>
                                        Praesent sapien massa, convallis a pellentesque nec,
                                        egestas non nisi. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Mauris blandit aliquet elit, eget
                                        tincidunt nibh pulvinar a. Cras ultricies ligula sed magna
                                        dictum porta. Cras ultricies ligula sed magna dictum
                                        porta. Sed porttitor lectus nibh. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Proin eget tortor
                                        risus.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>
                                        Vestibulum ac diam sit amet quam vehicula elementum sed
                                        sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                                        Proin eget tortor risus. Vivamus suscipit tortor eget
                                        felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue
                                        leo eget malesuada. Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Curabitur arcu erat, accumsan id
                                        imperdiet et, porttitor at sem. Praesent sapien massa,
                                        convallis a pellentesque nec, egestas non nisi. Vestibulum
                                        ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae; Donec velit neque, auctor
                                        sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                                        eget tortor risus.
                                    </p>
                                    <p>
                                        Praesent sapien massa, convallis a pellentesque nec,
                                        egestas non nisi. Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Mauris blandit aliquet elit, eget
                                        tincidunt nibh pulvinar a. Cras ultricies ligula sed magna
                                        dictum porta. Cras ultricies ligula sed magna dictum
                                        porta. Sed porttitor lectus nibh. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>
                                        Vestibulum ac diam sit amet quam vehicula elementum sed
                                        sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                                        Proin eget tortor risus. Vivamus suscipit tortor eget
                                        felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue
                                        leo eget malesuada. Vivamus suscipit tortor eget felis
                                        porttitor volutpat. Curabitur arcu erat, accumsan id
                                        imperdiet et, porttitor at sem. Praesent sapien massa,
                                        convallis a pellentesque nec, egestas non nisi. Vestibulum
                                        ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Vestibulum ante ipsum primis in faucibus orci luctus et
                                        ultrices posuere cubilia Curae; Donec velit neque, auctor
                                        sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                                        eget tortor risus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $stmt = $admin->ret("SELECT * FROM `products` 
                INNER JOIN `sub_categories` ON sub_categories.sc_id = products.sc_id 
                WHERE `pd_status` = 'Active' AND products.sc_id='$scid' AND products.pd_id!='$pdid'  ORDER BY `pd_id` DESC LIMIT 4");
                while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="./admin/controller/<?php echo $product['pd_picture']; ?>">
                                <ul class="product__item__pic__hover">
                                    <!-- <li>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </li> -->
                                    <li>
                                        <a href="./view-products.php?pd_id=<?php echo $product['pd_id']; ?>"><i
                                                class="fa fa-retweet"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">
                                        <?php echo $product['pd_title']; ?>
                                    </a></h6>
                                <h5>₹
                                    <?php echo $product['pd_price']; ?> per
                                    <?php echo $product['pd_unit_of_measure']; ?> / Day
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
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