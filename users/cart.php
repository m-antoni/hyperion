<?php
    session_start();
    include '../connections.php';

    $receiptNo = md5(rand(1,9));

    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'product_id');
            if (!in_array($_GET['id'], $item_array_id)) {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_GET['id'],
                    'item_name' => $_POST['hidden_name'],
                    'product_price' => $_POST['hidden_price'],
                    'receipt_no' => $_POST['hidden_receipt'],
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
                'receipt_no' => $_POST['hidden_receipt'],
                'item_quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }

//    if(isset($_GET['action'])){
//        if($_GET['action'] == 'delete'){
//            foreach ($_SESSION['cart'] as $keys => $value){
//                if($value['product_id'] == $_GET['id']){
//                    unset($_SESSION['cart'][$keys]);
//
////                    echo "<script>alert('Product has been removed...!')</script>";
////                    echo "<script>window.location='cart.php'</script>";
//
//                }
//            }
//        }
//    }

    include 'header.php';
    include 'navigation.php';

?>

<script type="text/javascript">

        //this code will prevent from pressing strings on keyboard
        function isNumberKey(evt){

            var charcode =(evt.which) ? evt.which : evt.keycode

            if (charcode > 31 && (charcode < 48 || charcode > 57))

                return false;

            return true;
        }
    
</script>
<body>
<div id="addToCart">
    <h2 align="center"><i class="fa fa-laptop"></i> <b>LAPTOP GALLERY SECTION</b></h2>
    <div class="container">
        <div id="cart" class="row justify-content-center no-gutters">
                <?php
                    //display in ascending order
                    $query = "SELECT * FROM product ORDER BY id ASC "; 
                    $result = mysqli_query($cn,$query);
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_array($result)){
                ?>  
                    <div class="col-lg-6">
                        <div class="cart-inside">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <h3><?php echo $row['pname']; ?></h3>
                                    <img class="img-fluid" src="<?php echo $row['image']; ?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="specs">
                                        <?php echo $row['details']; ?>
                                    </div><!--specs-->

                                    <p class="cart_price">Price: <?php echo number_format($row['price']) . '.00'; ?></p>
                                    <form method="POST" action="cart.php?action=add&&id=<?php echo $row['id']; ?>">
                                        <input type="text" class="form-control form-control-sm" type="text" name="quantity" value="1" maxlength="2" onkeypress="return isNumberKey(event)">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row['pname']; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                                        <input type="hidden" name="hidden_receipt" value="<?php echo $receiptNo; ?>">
                                        <button type="submit" name="add" class="btn btn-outline-primary btn-block btn-sm">
                                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                                        </button>
                                    </form><!--form add to cart-->
                                </div>    
                            </div><!--row-->
                        </div><!--cart-inside-->
                    </div><!--col-->   

                <?php
                        }//while loop
                    }//if 
                ?>

        </div><!--row-->
    </div><!--container-->
</div>        


<?php

    include 'footer.php';

?>


