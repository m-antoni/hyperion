<?php
    include '../connections.php';
    include 'header.php';

    $id_user = $_GET['id'];

    $query_name = mysqli_query($cn, "SELECT * FROM comments WHERE id='$id_user'");

    $rows_del = mysqli_fetch_assoc($query_name);

    $db_name = $rows_del['name'];
    $db_email = $rows_del['email'];
    $db_message = $rows_del['message'];
    $db_date = $rows_del['date_now'];

    if (isset($_POST['btnDelete'])){

        $jScript = md5(rand(1,9));

        $newScript = md5(rand(1,9));

        $success = md5(rand(1,9));

        mysqli_query($cn, "DELETE FROM comments WHERE id='$id_user'");

        echo "<script>window.location.href='com_records?jScript=$jScript&&new=$newScript&&success=$success'</script>";
    }
?>
<body>
<div class="ui basic modal">
    <div class="ui icon header">
        <h2><i class="fa fa-warning"></i> Warning</h2>
    </div>
    <div id="deleteContent" class="content">
        <form method="POST">
            <h2 align="center">You are about to delete this user's comments: <font color="yellow"><?php echo $db_name; ?></font></h2>
            <br>
            <div align="center">
                <input type="submit" name="btnDelete" value="Confirm" class="ui inverted blue button"> &nbsp;&nbsp;
                <a href="?" class="ui inverted red button">Cancel</a>
            </div>
        </form>
    </div>
</div>


<?php

     include 'footer.php';

?>

<script>    

        $('.ui.modal').modal('show');

</script>



