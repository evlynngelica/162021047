<?php
session_start();

if (isset($_POST['order_pay_btn'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    $order_total_price = ($_POST['order_total_price']/15502);
}

?>

<?php
include('layouts/header.php');
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <a href="shop.php">Shop</a>
                            <a href="checkout.php">Checkout</a>
                            <span>Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span>
                                <?php if (isset($_POST['order_status'])) {
                                    echo $_POST['order_status'];
                                } ?>
                            </h6>

                            <?php if (isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
                                <?php $amount = strval($order_total_price); ?>
                                <?php $order_id = $_POST['order_id']; ?>
                                <h6 class="checkout__title">TOTAL PAYMENT: $<?php echo setRupiah(($_POST['order_total_price'] * $kurs_dollar)); ?></h6>
                                <!--<input type="submit" class="btn btn-primary" value="PAY NOW" />-->
                                <!-- Set up a container element for the button -->
                                <div id="paypal-button-container"></div>

                            <?php } else if (isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
                                <?php $amount = strval($_SESSION['total']); ?>
                                <?php $order_id = $_SESSION['order_id']; ?>
                                <h6 class="checkout__title">TOTAL PAYMENT: <?php echo setRupiah(($_SESSION['total'] * $kurs_dollar)); ?></h6>
                                <!--<input type="submit" class="btn btn-primary" value="PAY NOW" /> -->
                                <!-- Set up a container element for the button -->
                                <div id="paypal-button-container"></div>

                            <?php } else { ?>
                                <p>You don't have an order</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php
    include('layouts/footer.php');
    ?>