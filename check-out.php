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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="./controller/place_order.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input name="name" required value="<?php echo $customer['c_name']; ?>"
                                            type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone" required type="number"
                                            value="<?php echo $customer['c_phone']; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input name="email" required value="<?php echo $customer['c_email']; ?>"
                                            type="email" />
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" required value="<?php echo $customer['c_address']; ?>" type="text"
                                    placeholder="Street Address" class="checkout__input__add" />
                                <input name="apart" type="text"
                                    placeholder="Apartment, suite, unite ect (optinal)" />
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input name="city" required type="text" />
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="zip" required type="text" />
                            </div>


                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="note" required type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery." />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">
                                    Products <span>Total</span>
                                </div>
                                <ul>
                                    <?php
                                    $grandtotal = 0;
                                    $total = 0;
                                    $num = 0;
                                    $stmt = $admin->ret("SELECT * FROM `cart` inner join `products` on products.pd_id=cart.pd_id where `c_id`='$cid'");
                                    while ($cart = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $num = $st->rowCount();
                                        $qty = $cart['cr_quantity'];
                                        $days = $cart['cr_days'];
                                        $price = $cart['pd_price'];
                                        $total = ($qty * $days) * $price;
                                        $grandtotal = $grandtotal + $total;
                                        ?>
                                        <li>
                                            <?php echo $cart['pd_title']; ?> -
                                            <?php echo $cart['cr_quantity']; ?>
                                            <?php echo $cart['pd_unit_of_measure']; ?> 
                                            X
                                            <?php echo $cart['cr_days']; ?> Days


                                            <span>₹
                                                <?php echo $total; ?>
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="checkout__order__subtotal">
                                    Subtotal <span>₹
                                        <?php echo $grandtotal; ?>
                                    </span>
                                </div>
                                <div class="checkout__order__total">
                                    Total <span>₹
                                        <?php echo $grandtotal; ?>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="">
                                <p class="h7 fw-bold mb-1">Payment</p>
                                <!-- <p class="textmuted h8 mb-2">Make payment for this invoice by filling in the details</p> -->
                                <div class="form">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                            value="upi" id="upi" onclick="cardform(this.value)" required>
                                        <label class="custom-control-label" for="credit">UPI/Netbanking</label>
                                        <div style="display: none;" id="upi_div">
                                            <div style="display: flex;justify-content:center">
                                                <img src="https://th.bing.com/th/id/OIP.-I8JMVhpM31DO8sqEGpocgHaHa?w=187&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                                                    class="mb-3">
                                            </div>
                                            <div class="text-center w-100">scan and pay</div>

                                            <!-- transaction id input form-->
                                            <div class="billing-address-form">
                                                <div class="col-12">
                                                    <div class="card border-0 mb-3"> <input class="form-control ps-5"
                                                            name="trans_id" type="text"
                                                            placeholder="Enter Transaction id">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                            value="cash" id="cash" onclick="cardform(this.value)" required>
                                        <label class="custom-control-label" for="debit">Cash on Delivery</label>
                                        <div style="display: none;" id="cash_div">
                                            <b>pay when your receive item</b>
                                        </div>
                                    </div>
                                </div>

                                <button name="place" type="submit" class="site-btn w-100 mt-2">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <script>
        function cardform(myvalue) {

            if (myvalue == 'upi') { //radio button id

                document.getElementById('upi_div').style.display = 'block';
                document.getElementById('cash_div').style.display = 'none';

            } else {

                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'block';
            }

        }
    </script>
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