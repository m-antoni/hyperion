<?php

	$id_user = $_GET['id_user'];

	$query_name = mysqli_query($cn, "SELECT * FROM tbl_user WHERE id_user='$id_user'");

	$row_ = mysqli_fetch_assoc($query_name);

	$db_first_name = $row_['first_name'];
	$db_last_name = $row_['last_name'];
	$db_gender = $row_['gender'];

	$gender_prefix = "";

	//getting the gender value to output MR. or Ms.
	if($db_gender == 'Male'){

		$gender_prefix = "Mr. ";

	}else{

		$gender_prefix = "Ms. ";

	}

	$full_name = $gender_prefix . " " . ucfirst($db_first_name) . " " . ucfirst($db_last_name);

	include '../connections.php';

    if (isset($_POST['btnDelete'])){

        $jScript = md5(rand(1,9));

        $newScript = md5(rand(1,9));

        $success = md5(rand(1,9));

        mysqli_query($cn, "DELETE FROM tbl_user WHERE id_user='$id_user'");

        echo "<script>window.location.href='retriever?jScript=$jScript&&new=$newScript&&success=$success';</script>";

    }
?>

<div class="ui basic modal">
    <div class="ui icon header">
        <h2><i class="fa fa-warning fa-2x"></i> Warning</h2>
    </div>
    <div class="content">
        <form method="POST">
            <h2 align="center">You are about to delete this user: <font color="yellow"><?php echo $full_name?></font></h2>
            <br>
            <div align="center">
                <input type="submit" name="btnDelete" value="Confirm" class="ui inverted blue button"> &nbsp;&nbsp;
                <a href="?" class="ui inverted red button">Cancel</a>
            </div>
        </form>
    </div>
</div>

