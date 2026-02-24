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
$orkey = $_GET['or_key'];
$stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `products` ON products.pd_id=orders.pd_id WHERE `c_id`='$cid' And `or_key`='$orkey'");
$order = $stmt->fetch(PDO::FETCH_ASSOC)
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/order.css" type="text/css">

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
    <!-- Hero Section Begin -->
    <?php include './includes/sub-header.php'; ?>

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Booking details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Booking details</span>
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
                    <article class="card">
                        <header class="card-header" style="background: #FF0000;color:white;font-weight:bolder"> My
                            Booking / Tracking
                        </header>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Order Date:
                                            <?php echo $order['or_created_date'] ?>
                                        </th>
                                        <th>Total Amount:
                                            <?php
                                            $total = 0;
                                            $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `products` ON products.pd_id=orders.pd_id INNER JOIN `customers` ON customers.c_id=orders.c_id where `or_key`='$orkey'");
                                            while ($or = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $total = $total + $or['or_amount'];
                                            } ?>
                                            <span>₹
                                                <?php echo $total; ?>
                                            </span>
                                        </th>
                                        <th>Total Payable:
                                            <?php
                                            $total = 0;
                                            $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `products` ON products.pd_id=orders.pd_id INNER JOIN `customers` ON customers.c_id=orders.c_id where `or_key`='$orkey' and `or_item_status`='Confirmed'");
                                            while ($or = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $total = $total + $or['or_amount'];
                                            } ?>
                                            <span>₹
                                                <?php echo $total; ?>
                                            </span>
                                        </th>
                                        <th>
                                            <?php if ($order['or_status'] == 'Cancelled') { ?>
                                                <span class="text-danger font-weight-bolder">Order Cancelled</span>
                                            <?php } else if ($order['or_status'] == "Completed") { ?>
                                                    <span class="text-success font-weight-bolder">
                                                    <?php echo $order['or_status']; ?>
                                                    </span>
                                            <?php } else { ?>
                                                    <a onclick="return confirm('Are you sure, want to cancel this order?')"
                                                        href="./controller/cancel-order.php?or_key=<?php echo $order['or_key'] ?>"
                                                        class="btn btn-warning">Cancel Order</a>
                                            <?php } ?>
                                        </th>
                                    </tr>
                                </table>
                            </div>

                            <!-- </div> -->
                            <!-- <?php
                            if ($order['or_status'] == 'Placed') {
                                ?>
                                <div class="track">
                                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                        <span class="text">Order confirmed</span>
                                    </div>
                                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span
                                            class="text"> Picked by delivery Person</span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                            class="text"> On the
                                            way </span> </div>
                                    <div class="step"> <span class="icon"> <i class="fa-solid fa-box"></i> </span> <span
                                            class="text">Delivered</span> </div>
                                </div>
                            <?php } else if ($order['or_status'] == 'Picked by delivery Person') { ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                            <span class="text">Order confirmed</span>
                                        </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                            <span class="text">
                                                Picked by delivery Person</span>
                                        </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                                                class="text"> On the
                                                way </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                                class="text">Delivered</span> </div>
                                    </div>
                            <?php } else if ($order['or_status'] == 'On the way') { ?>
                                        <div class="track">
                                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                                <span class="text">Order confirmed</span>
                                            </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                                <span class="text">
                                                    Picked by delivery Person</span>
                                            </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                                <span class="text"> On
                                                    the way </span>
                                            </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span
                                                    class="text">Delivered</span> </div>
                                        </div>
                            <?php } else if ($order['or_status'] == 'Delivered') { ?>
                                            <div class="track">
                                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span>
                                                    <span class="text">Order confirmed</span>
                                                </div>
                                                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span>
                                                    <span class="text">
                                                        Picked by delivery Person</span>
                                                </div>
                                                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                                                    <span class="text"> On
                                                        the way </span>
                                                </div>
                                                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span>
                                                    <span class="text">Delivered</span>
                                                </div>

                                            </div>
                            <?php } ?> -->
                        </div>
                        <div class="table-responsive p-2">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Days</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $admin->ret("SELECT * FROM `payments` INNER JOIN `orders` ON orders.or_id=payments.or_id INNER JOIN `products` ON products.pd_id=orders.pd_id WHERE `c_id`='$cid' And payments.or_key='$orkey'");
                                    while ($orderItem = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        // $uid = $orderItem['unid'];
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex" style="align-items:center;gap:2%">
                                                    <div><img
                                                            style="width:70px;height:70px;border-radius:50%;object-fit:cover"
                                                            src="./admin/controller/<?php echo $orderItem['pd_picture']; ?>"
                                                            alt=""></div>
                                                    <div>
                                                        <span class="text-muted font-weight-bold">
                                                            <?php echo $orderItem['pd_title']; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $orderItem['pd_price']; ?> per
                                                <?php echo $orderItem['pd_unit_of_measure']; ?>
                                            </td>
                                            <td>
                                                <?php echo $orderItem['or_quantity']; ?>
                                                <?php echo $orderItem['pd_unit_of_measure']; ?>
                                            </td>
                                            <td>
                                                <?php echo $orderItem['or_days']; ?>
                                            </td>
                                            <td>
                                                <?php echo $orderItem['or_amount']; ?>
                                            </td>
                                            <td>
                                                <?php if ($orderItem['or_item_status'] == 'Cancelled') { ?>
                                                    <span class="text-muted font-weight-bold">
                                                        <?php echo $orderItem['or_item_status'] ?>
                                                    </span>
                                                <?php } else if ($order['or_status'] == "Completed") { ?>
                                                        <span class="text-success font-weight-bolder">
                                                        <?php echo $order['or_status']; ?>
                                                        </span>
                                                <?php } else { ?>
                                                        <a onclick="return confirm('Are you sure you want to cancel this order?')"
                                                            href="./controller/cancel-order.php?or_id=<?php echo $orderItem['or_id']; ?>">
                                                            <button class="btn btn-danger">Cancel Item</button>
                                                        </a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="row mt-1">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="./all-products.php" class="primary-btn ">CONTINUE SHOPPING</a>
                            <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                        </div>
                    </div>
                </div>
                <?php if ($order['or_status'] == 'Completed') { ?>
                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn btn-warning font-weight-bolder text-white w-100 ">Feedback</a>
                                <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> -->
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your valuable
                                                feedback</h1>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="./controller/feedback.php" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control w-100" name="orkey"
                                                    value="<?php echo $orkey; ?>" />
                                                <input type="hidden" class="form-control w-100" name="cid"
                                                    value="<?php echo $cid; ?>" />
                                                <textarea placeholder="type your feedback here..." id="message"
                                                    class="form-control w-100" name="message"></textarea>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button name="feedback" type="submit"
                                                    class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include './includes/footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>