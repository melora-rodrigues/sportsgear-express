<?php
include './config.php';
$admin = new Admin();
if (isset($_SESSION["c_id"])) {
    $cid = $_SESSION['c_id'];
    $st = $admin->ret("SELECT * FROM `customers` where `c_id` ='$cid'");
    $customer = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location:./login.php");
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
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>
                            My Profile
                        </h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>
                                My Profile
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
                                src="./controller/<?php echo $customer['c_profile']; ?>" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form ">
                        <div class="container p-3" style="margin-top:-10%">
                            <form action="./controller/profile.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <input name="name" value="<?php echo $customer['c_name']; ?>" type="text"
                                            placeholder="Your name"/>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input name="email" value="<?php echo $customer['c_email']; ?>" type="email"
                                            placeholder="Your Email" />
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input name="phone" value="<?php echo $customer['c_phone']; ?>" type="number"
                                            placeholder="Your Contact number" />
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input name="profile" type="file" class="p-2"  required/>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <textarea name="address"
                                            placeholder="Your Address"><?php echo $customer['c_address']; ?></textarea>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input name="npass" type="text" placeholder="Enter new password" required/>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input name="cpass" type="password" placeholder="Confirm password" required  />
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <button name="update_profile" type="submit"
                                            class="site-btn w-100">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
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