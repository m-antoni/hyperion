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
                <h1><i class="fa fa-truck"></i> Cash On Delivery</h1><hr>
                <form method="POST">
                <table class="table table-hover table-responsive">
                <tr class="table-info">
                    <td width="40%"><b>Brand</b></td>
                    <td width="15%"><b>Quantity</b></td>
                    <td width="15%"><b>Details</b></td>
                    <td width="20%"><b>Total Price</b></td>
                    <td width="40%"><b>Action</b></td>
                </tr>

                <?php
                if(!empty($_SESSION['cart'])){

                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value){

                        ?>
                        <tr>
                            <td><?php echo $value['item_name']; ?></td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td name='price'><?php echo number_format($value['product_price']) . '.00'; ?></td>
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
                </form>
                <hr>

                <?php

                    if(isset($_GET['getAvail'])){

                        echo "<form method='POST'>";

                        echo "<table class='table table-hover table-responsive'>";

                        echo "<tr>
                                   <td width='100%'><b>Final Summary</b></td>
                                   <td></td>
                              </tr>";

                         echo "<tr>
                                    <td><h4 align='right'>Here's your Receipt <i class='fa fa-arrow-circle-right'></i></h4></td>
                                    <td ><a href='TCPDF/User/blank.php' class='btn btn-outline-danger' target='_blank'><i class='fa fa-sticky-note-o'></i> <b>Download Receipt</b></a></td>
                               </tr>";
                        }

                        echo "</table>
                              </form>";

                        echo "<p>Receipt No: <b>" . $value['receipt_no'] . "</b></p>"
                    ?>
            </div><!--col-->
        </div><!--row-->
    </div><!--container-->
</div><!--check_out-->


<?php

    include 'footer.php';

?>