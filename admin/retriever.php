<?php

	include '../connections.php';
	
   
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
    if(empty($_GET['getDelete'])){

	     // do nothing here...
    }else{

        include 'confirm_delete.php';
    }

	include 'header.php';
	include 'navigation.php';
?>
<body>

<div id="view_record">
<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-2 offset-lg-0 col-md-12">
			<h1><i class="fa fa-users"></i> User's Accounts</h1>
                <?php
                    if(isset($_GET['success'])){

                        echo "<div class='alert alert-success' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                        <p class='alert-heading'><i class='fa fa-check-square-o'></i> <b>User's account deleted successfully.</b></p>
                                    </div>";
                    }
                ?>
			<table class="table table-hover table-responsive table-striped table-bordered">
				<tr class="tableTitle">
					<td width="15%"><b>Name</b></td>
					<td><b>Gender</b></td>
					<td class="user_address"><b>Address</b></td>
					<td><b>Email</b></td>
					<td><b>Action</b></td>
				</tr>
				<?php
					$retrieve_query = mysqli_query($cn, "SELECT * FROM tbl_user WHERE account_type='2'");

					while($row_users = mysqli_fetch_assoc($retrieve_query)){

						$id_user = $row_users['id_user'];
				
						$db_first_name = $row_users['first_name'];
						$db_last_name = $row_users['last_name'];	
						$db_gender = $row_users['gender'];	
						$db_address = $row_users['address'];
						$db_email = $row_users['email'];
																	// error is [0]
						$full_name = ucfirst($db_first_name) . " " . ucfirst($db_last_name);

						// for random characters on the address bar
						$jScript = md5(rand(1,9));

						$getUpdate = md5(rand(1,9));

						$getDelete = md5(rand(1,9));

						echo "<tr class='tableRows'>
								<td>$full_name</td>
								<td>$db_gender</td>
								<td class='user_address'>$db_address</td>
								<td>$db_email</td>
								<td>
									<a href='?jScript=$jScript && getDelete=$getDelete && id_user=$id_user'
										class='btn btn-outline-danger'>delete</a>
								</td>
							</tr>";
					}//while loop
				?>
			</table>
			</div><!--col-->
		</div><!--row-->
	</div><!-- container -->
</div><!--view_record-->
	


<?php

	include 'footer.php';

?>

<script>

    // modal for confirm delete
    $('.ui.modal').modal('show');

</script>