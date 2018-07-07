<?php

    include '../connections.php';
    include 'header.php';

    $id_name = $_GET['id'];

    $edit_query = mysqli_query($cn,"SELECT * FROM product WHERE id='$id_name'");

    while($get = mysqli_fetch_assoc($edit_query)){

        $db_pname = $get['pname'];
        $db_details = $get['details'];
        $db_price = $get['price'];
        $db_stock = $get['stock'];
    }

    $new_pname = "";
    $new_details  = "";
    $new_price = "";
    $new_stock = "";

    //error handling
    $editError = "";

    if(isset($_POST['btnEdit'])){

        if(empty($_POST['laptop_brands'])){

            $editError = "fields must not be empty!";
        }else{

            $new_pname = $_POST['laptop_brands'];
            $db_pname = $new_pname;
        }

        if(empty($_POST['details'])){

            $editError = "fields must not be empty!";
        }else{

            $new_details  = $_POST['details'];
            $db_details = $new_details;
        }

        if(empty($_POST['price'])){

            $editError = "fields must not be empty!";
        }else{

            $new_price = $_POST['price'];
            $db_price = $new_price;
        }

        if(empty($_POST['stock'])){

            $editError = "fields must not be empty!";
        }else{

            $new_stock = $_POST['stock'];
            $db_stock = $new_stock;
        }

        if($new_pname && $new_details && $new_price && $new_stock){

            mysqli_query($cn,"UPDATE product SET

                     pname = '$db_pname',
                     details = '$db_details',
                     price = '$db_price',
                     stock = '$db_stock' WHERE id='$id_name'");

            $encrypted = md5(rand(1,9));

            $success = md5(rand(1,9));

            echo "<script>window.location.href='inventory?encrypted=$encrypted&&success=$success';</script>";

        }

    }

    
?>

<style>
    .ui.icon.header:first-child{
        font-size: 1.4em;
    }
    .ui.modal>.icon:first-child+*, .ui.modal>:first-child:not(.icon){
        background-color: #1d2129;
        padding: 1.2em;
        border-radius: 0;
    }
    .ui.form input:not([type]), .ui.form input[type=date], .ui.form input[type=datetime-local], .ui.form input[type=email], .ui.form input[type=file], .ui.form input[type=number], .ui.form input[type=password], .ui.form input[type=search], .ui.form input[type=tel], .ui.form input[type=text], .ui.form input[type=time], .ui.form input[type=url]{
        background-color: dimgrey;
        color: navajowhite;
    }
    .ui.form select {
        background-color: dimgrey;
        color: navajowhite;
    }
    .ui.form input[type=checkbox], .ui.form textarea{
        background-color: dimgrey;
        color: navajowhite;
    }
    label{
        color: white;
        font-weight: 600;
    }
</style>
<body>
<div id="edit-inventory">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-8">    
                <div class="ui modal">
                    <div class="ui icon header">
                        <p><i class="fa fa-table"></i> Inventory Details</p>
                    </div>
                    <div class="content">
                        <div class="ui form">
                            <form method="POST">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Laptop Brand:</label>
                                    <input type="text" name="laptop_brands" value="<?php echo $db_pname; ?>">
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Details:</label>
                                    <textarea type="text" name="details"><?php echo $db_details; ?></textarea>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Price:</label>
                                    <input type="text" name="price" value="<?php echo $db_price; ?>">
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Availability of Stock:</label>
                                    <input type="text" name="stock" value="<?php echo $db_stock; ?>">
                                </div>
                                <span class="error"><?php echo $editError; ?></span><br>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                <input type="submit" name="btnEdit" value="Update" class="btn btn-outline-primary">&nbsp;&nbsp;
                                <a href="?" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>
                        </div><!--ui form-->
                    </div><!--modal content-->
                </div><!--uimodal-->
            </div><!--col-->
        <div><!--row-->
    </div><!--container-->
</div><!--update-setting-->

<?php

    include 'footer.php';

?>

<script>

    $('.ui.modal').modal('show');

</script>
