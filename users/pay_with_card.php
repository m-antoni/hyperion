<?php
    session_start();
    include '../connections.php';

if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        foreach ($_SESSION['cart'] as $keys => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$keys]);

//                  echo "<script>alert('Product has been removed...!')</script>";
//                  echo "<script>window.location='cart.php'</script>";

            }
        }
    }
}

    $getAvail = md5(rand(1,9));

    $jScript = md5(rand(1,9));

    include 'header.php';
    include 'navigation.php';

?>


<body>
<div id="cash_on_delivery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1><i class="fa fa-credit-card-alt"></i> Credit Card</h1><hr>
                <table class="table table-hover table-responsive">
                <tr class="table-info">
                    <td width="40%">Brand</td>
                    <td width="15%">Quantity</td>
                    <td width="15%">Details</td>
                    <td width="20%">Total Price</td>
                    <td width="40%">Action</td>
                </tr>

                <?php
                if(!empty($_SESSION['cart'])){

                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value){

                        ?>
                        <tr>
                            <td><?php echo $value['item_name']; ?></td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td><?php echo number_format($value['product_price']) . '.00'; ?></td>
                            <!--//converting into numbers here and make a computation-->
                            <td><?php echo number_format($value['item_quantity'] * $value['product_price']) . '.00'; ?></td>
                            <td><a id="btnDelete" href="cash_on_delivery.php?action=delete&id=<?php echo $value['product_id']; ?>"><span>Remove Item</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($value['item_quantity'] * $value['product_price']);

                        }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total Price:</b></td>
                        <td><b> <?php echo number_format($total,2);?> </b></td>
                        <td><a href="?jScript=$jScript&&getAvail=$getAvail" class="btn btn-primary">Avail Now</a></td>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <hr>

                <?php

                    if(isset($_GET['getAvail'])){

                      require_once 'app/init.php'; 

                        echo "<form method='POST' action='payment.php'>";    

                        echo "<table class='table table-hover table-responsive'>";

                        echo "<tr>
                                  <td width='80%'><b>Final Summary</b></td>
                                  <td width='20%'><b>Price</b></td>               
                              </tr>";

                         echo "<tr>
                                   <td><b>Total</b></td>
                                   <td>P " . number_format($total) . ".00</td>
                               </tr>";

                        echo "<tr>
                                  <td><h4 align='right'>Here's your Receipt <i class='fa fa-arrow-circle-right'></i></h4></td>
                                  <td><a href='TCPDF/User/blank02.php' class='btn btn-outline-danger' target='_blank'><i class='fa fa-sticky-note-o'></i> <b>Download Receipt</b></a></td>
                              </tr>";
                        } 

                        ?>


                        <tr>
                            <td></td>
                            <td>

                                <input type="hidden" name="total" value="<?php echo $total * 100; ?>">

                                   <script
                                   
                                   src ="https://checkout.stripe.com/checkout.js" class="stripe-button"

                                   data-key="<?php echo $stripe['pub_key']; ?>"

                                   data-amount="<?php echo $total * 100; ?>"

                                   data-name="HYPERION"

                                   data-description="Full Payment"

                                   data-email="<?php echo $email; ?>"

                                   data-currency="php"

                                   data-image="img/logos/modal.jpg"

                                   data-locale="auto"> 

                               </script>     
                            </td>
                        </tr>    

                    <?php

                        echo "</table>";

                        echo "</form>";

                    echo "<p>Receipt No: <b>" . $value['receipt_no'] . "</b></p>";

                    ?>
            </div><!--col-->
        </div><!--row-->
    </div><!--container-->
</div><!--check_out-->


<?php

    include 'footer.php';

?>
