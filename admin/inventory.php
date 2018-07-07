<?php
session_start();
include '../connections.php';
include 'header.php';
include 'navigation.php';

if(isset($_SESSION['email'])){

    $email = $_SESSION['email'];

    $authentic = mysqli_query($cn, "SELECT * FROM tbl_user WHERE email='$email'");
    $fetch = mysqli_fetch_assoc($authentic);
    $account_type = $fetch['account_type']; //getting the account_type value in database

    if($account_type !=1){	//if not match in value

        echo "<script>window.location.href='../forbidden';</script>";
    }
}

    // this will trigger the delete button
    if(empty($_GET['getEdit'])){

        // do nothing here...
    }else{

        include 'inventory_edit.php';
    }


?>

<body>
<div id="inventory">
    <div class="container-fluid">
        <div class="rows">
            <div class="col-lg-10 offset-lg-2 offset-lg-0 col-md-12">
            <h1><i class="fa fa-pencil"></i> Inventory Section</h1>
                <?php
                if(isset($_GET['success'])){
                    echo "<div class='alert alert-success' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <p class='alert-heading'><i class='fa fa-check-square-o'></i>
                                 <b>Database has been updated successfully.</b></p>
                            </div>";
                }
                ?>
            <table class="table table-md table-hover table-responsive table-striped table-bordered">
                <tr class="tableTitle">
                    <td width=""><b>ID #</b></td>
                    <td width=""><b>Laptop Brand</b></td>
                    <td class="details" width="40%"><b>Details</b></td>
                    <td width=""><b>Price</b></td>
                    <td width=""><b>Availability</b></td>
                    <td width=""><b>Action</b></td>
                </tr>
                <?php

                $query = mysqli_query($cn,"SELECT * FROM product");

                while($row = mysqli_fetch_assoc($query)){

                    $id_name = $row['id'];
                    $db_pname = $row['pname'];
                    $db_details = $row['details'];
                    $db_price = number_format($row['price']); //number format required!
                    $db_stock = $row['stock'];

                    $jScript = md5(rand(1,9));

                    $newScript = md5(rand(1,9));

                    $getEdit = md5(rand(1,9));

                    $getDelete = md5(rand(1,9));

                    echo "<tr class='tableRows'>
                            <td>$id_name</td>
                            <td>$db_pname</td>
                            <td class='details'>$db_details</td>
                            <td>Php $db_price.00</td>
                            <td>$db_stock pcs</td>
                            <td>
                                <a class='btn btn-outline-info' href='?jScript=$jScript&&
                                    newScript=$newScript&&getEdit=$getEdit&&id=$id_name'>
                                    UPDATE
                                </a>
                            </td>";
                }
                ?>

            </table>

                <div id="products-pdf" class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <a href="../TCPDF/User/blank.php" target="_blank" class="btn btn-outline-danger btn-lg">
                                Download PDF File
                            </a>
                        </div>
                    </div>
                </div><!--products-pdf-->
            </div>
        </div>
    </div>     
</div>       


<?php

    include 'footer.php';
?>


