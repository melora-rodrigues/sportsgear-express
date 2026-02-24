<?php
include './config.php';
$admin = new Admin();
if (isset($_SESSION["c_id"])) {
    $cid = $_SESSION['c_id'];
    $st = $admin->ret("SELECT * FROM `customers` where `c_id` ='$cid'");
    $customer = $st->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: ./index.php");
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
    <!-- Hero Section Begin -->
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Bookings</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>My Bookings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad" id="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Items</th>
                                    <!-- <th>Delivery Status</th> -->
                                    <th>Status</th>
                                    <th>View more</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandtotal = 0;
                                $total = 0;
                                $num = 0;
                                $st = $admin->ret("SELECT * FROM `orders` inner join `products` on products.pd_id=orders.pd_id where `c_id`='$cid' GROUP BY `or_key` order by `or_id` DESC");
                                $num = $st->rowCount();
                                if ($num > 0) {
                                    while ($order = $st->fetch(PDO::FETCH_ASSOC)) {
                                        $orkey = $order['or_key'];
                                        ?>
                                        <tr>
                                            <td>
                                                <h5>
                                                    <?php echo $order['or_created_date']; ?>
                                                </h5>
                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `products` ON products.pd_id=orders.pd_id INNER JOIN `customers` ON customers.c_id=orders.c_id where `or_key`='$orkey' and `or_item_status`='Confirmed'");
                                                while ($or = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $total = $total + $or['or_amount'];
                                                } ?>

                                                <span>
                                                    ₹
                                                    <?php echo $total ?>
                                                </span>
                                            </td>

                                            <td>
                                                <?php
                                                $items = $admin->ret("SELECT * FROM `orders` inner join `products` on products.pd_id=orders.pd_id where `c_id`='$cid' and `or_key`='$orkey'");
                                                $noi = $items->rowCount();
                                                ?>
                                                <?php echo $noi; ?>
                                            </td>
                                            <!-- <td>
                                                <?php if ($order['dl_id'] == "0") { ?>
                                                    <span class="alert text-info">Not Assigned</span>
                                                <?php } else { ?>
                                                    <span class="alert text-success">Assigned
                                                    </span>
                                                <?php } ?>
                                            </td> -->
                                            <td>
                                                <?php if ($order['or_status'] == "Cancelled") { ?>
                                                    <span class="text-danger"><?php echo $order['or_status']; ?></span>
                                                <?php } else { ?>
                                                                <span class="text-info">
                                                        <?php echo $order['or_status']; ?>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="./view-order-details.php?or_key=<?php echo $order['or_key']; ?>"
                                                    class="primary-btn ">
                                                    <i class="fa fa-eye fs-8"></i>
                                                </a>
                                            </td>

                                        </tr>

                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="6" class="shoping__cart__item table-danger text-center">
                                            <h5 style="font-weight:bolder;">
                                                No orders found!
                                            </h5>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./all-products.php" class="primary-btn ">CONTINUE SHOPPING</a>
                        <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

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