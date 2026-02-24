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
    <!-- Hero Section Begin -->
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
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
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Days</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandtotal = 0;
                                $total = 0;
                                $num = 0;
                                $st = $admin->ret("SELECT * FROM `cart` inner join `products` on products.pd_id=cart.pd_id where `c_id`='$cid'");
                                $num = $st->rowCount();
                                if ($num > 0) {
                                    while ($cart = $st->fetch(PDO::FETCH_ASSOC)) {
                                        $qty = $cart['cr_quantity'];
                                        $days = $cart['cr_days'];
                                        $price = $cart['pd_price'];
                                        $total = ($qty * $days) * $price;
                                        $grandtotal = $grandtotal + $total;
                                        ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img style="width:100px;height:100px;object-fit:cover"
                                                    src="./admin/controller/<?php echo $cart['pd_picture']; ?>" alt="pic" />
                                                <h5>
                                                    <?php echo $cart['pd_title']; ?>
                                                </h5>
                                            </td>
                                            <td class="shoping__cart__price">₹
                                                <?php echo $cart['pd_price']; ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="d-flex">
                                                        <?php
                                                        if ($cart['cr_quantity'] > 1) {
                                                            ?>
                                                            <input type="button" class="btn primary-btn text-white"
                                                                style="width:1px;height:40px;"
                                                                onclick="decrement(<?php echo $cart['cr_id']; ?>)" value="-" />

                                                            <?php
                                                        }
                                                        ?>
                                                        <input class="form-control w-25" id="cr_id"
                                                            value="<?php echo $cart['cr_quantity']; ?>" />
                                                        <?php
                                                        if ($qty < $cart['pd_quantity']) {
                                                            ?>
                                                            <button class="btn primary-btn text-white" style="height:40px;"
                                                                onclick="increment(<?php echo $cart['cr_id']; ?>)">+</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <samp class="m-1 text-danger">Out of stock</samp>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="d-flex">
                                                        <?php
                                                        if ($cart['cr_days'] > 1) {
                                                            ?>
                                                            <input type="button" class="btn primary-btn text-white"
                                                                style="width:1px;height:40px;"
                                                                onclick="decrementDays(<?php echo $cart['cr_id']; ?>)" value="-" />

                                                            <?php
                                                        }
                                                        ?>
                                                        <input class="form-control w-25" id="days_id"
                                                            value="<?php echo $cart['cr_days']; ?>" />

                                                        <button class="btn primary-btn text-white" style="height:40px;"
                                                            onclick="incrementDays(<?php echo $cart['cr_id']; ?>)">+</button>


                                                    </div>
                                                </div>
                                            </td>

                                            <td class="shoping__cart__total">
                                                ₹
                                                <?php echo $total; ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <!-- <a href="./remove-from-cart.php?cr_id=<?php echo $cart['cr_id']; ?>"> -->
                                                <span onclick="removeFromCart(<?php echo $cart['cr_id']; ?>)"
                                                    class="icon_close"></span>
                                                <!-- </a> -->
                                            </td>
                                        </tr>

                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="4" class="shoping__cart__item table-danger text-center">
                                            <h5 style="font-weight:bolder;">
                                                Your cart is empty
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
                <!-- <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code" />
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>₹
                                    <?php echo $grandtotal; ?>
                                </span></li>
                            <li>Total <span>₹
                                    <?php echo $grandtotal; ?>
                                </span></li>
                        </ul>
                        <?php if ($num > 0) { ?>
                            <a href="./check-out.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include './includes/footer.php'; ?>
    <!-- Footer Section End -->
    <script>
        function increment(crt_id) {
            // alert(crt_id)
            var qty = document.getElementById('cr_id').value;
            document.getElementById('cr_id').value = qty;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./update_cart.php?cr_id=" + crt_id + '&action=increment', true);
            xmlhttp.send();
        }
        function incrementDays(crt_id) {
            // alert(crt_id)
            var days = document.getElementById('days_id').value;
            document.getElementById('days_id').value = days;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./update_cart.php?cr_id=" + crt_id + '&action=incrementDays', true);
            xmlhttp.send();
        }
        function decrement(crt_id) {
            // alert(crt_id)
            var qty = document.getElementById('cr_id').value;
            document.getElementById('cr_id').value = qty;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./update_cart.php?cr_id=" + crt_id + '&action=decrement', true);
            xmlhttp.send();
        }
        function decrementDays(crt_id) {
            // alert(crt_id)
            var days = document.getElementById('days_id').value;
            document.getElementById('days_id').value = days;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./update_cart.php?cr_id=" + crt_id + '&action=decrementDays', true);
            xmlhttp.send();
        }
        function removeFromCart(crt_id) {
            // alert(crt_id)
            var qty = document.getElementById('cr_id').value;
            document.getElementById('cr_id').value = qty;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cart").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./remove-from-cart.php?cr_id=" + crt_id, true);
            xmlhttp.send();
        }

    </script>
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