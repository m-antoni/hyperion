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


	if (empty($_GET['getUpdate'])){


	}else{

			include 'updating_admin.php';
	}

?>

<body>
<div id="setting">
<div class="container">
	<div class="row">
		<div class="col-lg-10 offset-lg-2">
            <h1><img id="settingImg" src="../img/gif/gears.gif"> Admin Setting</h1>
				<table class="table table-responsive table-hover table-dark">
						<?php

							$retrieve_query = mysqli_query($cn, "SELECT * FROM tbl_user WHERE account_type='1'");

							while($row_users = mysqli_fetch_assoc($retrieve_query)){

									$id_user = $row_users['id_user'];

									$db_first_name = $row_users['first_name'];
									$db_last_name = $row_users['last_name'];
									$db_gender = $row_users['gender'];
									$db_address = $row_users['address'];
									$db_email = $row_users['email'];
									$db_password = $row_users['password'];
									// error is [0]
									$full_name = ucfirst($db_first_name) . " " . ucfirst($db_last_name);

									// for random characters on the address bar
									$jScript = md5(rand(1,9));

									$getUpdate = md5(rand(1,9));

									echo "<tr>
									<td><i class='fa fa-building-o'></i><b> OWNER</b></td>
									<td>$full_name</td>
									</tr>
									<tr>
										<td><i class='fa fa-user-circle'></i><b> Gender</b></td>
										<td>$db_gender</td>
									</tr>
									<tr>
										<td><i class='fa fa-home'></i><b> Office Address</b></td>
										<td>$db_address</td>
									</tr>
									<tr>
										<td><i class='fa fa-envelope'></i><b> Email</b></td>
										<td>$db_email</td>
									</tr>
									<tr>
										<td><i class='fa fa-lock'></i><b> Password</b></td>
										<td>*********</td>
									</tr>
									<tr>
										<td><i class='fa fa-gears'></i><b> ACTION</b></td>
										<td>
										<a href='?jScript=$jScript&&getUpdate=$getUpdate && id_user=$id_user' class='btn btn-outline-primary'>update</a>
									</td>
									</tr>  	
								";
							}//while loop
						?>
				</table>
			</div><!--col-->
		</div><!--row-->      
  </div><!--container-->	
</div><!--setting-->

<?php

    include 'footer.php';

?>

