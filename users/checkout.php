<?php
session_start();
include '../connections.php';

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], 'product_id');
        if (!in_array($_GET['id'], $item_array_id)) {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'product_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][$count] = $item_array;
            echo "<script>alert('Product has been added to cart.')</script>";
            //echo "<script>window.location='cart.php'</script>";
        }else{
            echo "<script>alert('Product is already Added to Cart!')</script>";
            //echo "<script>window.location='cart.php'</script>";
        }
    }else{

        $item_array = array(
            'product_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'product_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'],
        );
        $_SESSION['cart'][0] = $item_array;
    }
}


include 'header.php';
include 'navigation.php';

?>
<body>
<div id="checkOut">
    <div class="container">
        <h1 class="display-4"><b><i class="fa fa-truck"></i> | <i class="fa fa-credit-card-alt"></i> Choose your Payment transaction</b></h1><hr><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 col-12">
                <a href="cash_on_delivery.php" class="btn btn-outline-primary btn-lg">
                    <i class="fa fa-truck"></i> CASH ON DELIVERY</a><br><br>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <a href="pay_with_card.php" class="btn btn-outline-danger btn-lg">
                    <i class="fa fa-credit-card-alt"></i> PAYMENT USING CARD</a>
            </div>
        </div>
        <hr>
    </div>







</div>


<?php

    include 'footer.php';

?>
