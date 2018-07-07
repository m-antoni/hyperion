<?php

    $id_user = $_GET['id'];

    $query = mysqli_query($cn,"SELECT * FROM appointment WHERE id=$id_user");

    $row_ = mysqli_fetch_assoc($query);

    $db_name = $row_['name'];
    $db_device = $row_['device'];
    $db_message = $row_['message'];
    $db_contact = $row_['contact'];
    $db_date = $row_['date'];


    if(isset($_POST['btnDelete'])){

        $jScript = md5(rand(1,9));

        $success = md5(rand(1,9));

        mysqli_query($cn,"DELETE FROM appointment WHERE id='$id_user'");

        echo "<script>window.location.href='?jScript=$jScript&&success=$success'</script>";
    }

    ?>


<div class="ui basic modal">
    <div class="ui icon header">
        <h2><i class="fa fa-warning fa-2x"></i> Warning</h2>
    </div>
    <div class="content">
        <form method="POST">
            <h2 align="center">You are about to delete this user: <font color="yellow"><?php echo $db_name; ?></font></h2>
            <br>
            <div align="center">
                <input type="submit" name="btnDelete" value="Confirm" class="ui inverted blue button"> &nbsp;&nbsp;
                <a href="?" class="ui inverted red button">Cancel</a>
            </div>
        </form>
    </div>
</div>
