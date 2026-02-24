<?php
include './config.php';
$admin = new Admin();
if (isset($_GET['cr_id'])) {
    $cid = $_SESSION['c_id'];
    $crid = $_GET['cr_id'];
    $stmt = $admin->cud("DELETE FROM `cart` WHERE `cr_id`= '$crid'", "saved");
}
?>
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
                                $price = $cart['pd_price'];
                                $total = $qty * $price;
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
                                    <td class="shoping__cart__total">
                                        ₹
                                        <?php echo $total; ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <!-- <a href="./remove-from-cart.php?cr_id=<?php echo $cart['cr_id']; ?>"> -->
                                        <span onclick="removeFromCart(<?php echo $cart['cr_id']; ?>)" class="icon_close"></span>
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