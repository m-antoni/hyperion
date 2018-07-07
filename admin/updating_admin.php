<?php
    include '../connections.php';
    include 'header.php';

	$id_user = $_GET['id_user'];

	$get_record = mysqli_query($cn,"SELECT * FROM tbl_user WHERE id_user='$id_user'");

	while($get = mysqli_fetch_assoc($get_record)){

		$db_first_name = $get['first_name'];
		$db_last_name = $get['last_name'];
		$db_gender = $get['gender'];
		$db_address = $get['address'];
		$db_email = $get['email'];
		$db_password = $get['password'];
	}
        $new_first_name = "";
        $new_last_name = "";
        $new_gender = "";
        $new_address = "";
        $new_email = "";
        $new_password = "";

        $new_first_nameErr = "";
        $new_last_nameErr = "";
        $new_genderErr = "";
        $new_addressErr = "";
        $new_emailErr = "";
        $new_passwordErr = "";


	if (isset($_POST['btnUpdate'])){

		if(empty($_POST['new_first_name'])){

			$new_first_nameErr = "This field must not be empty!";
		}else{

			$new_first_name = $_POST['new_first_name'];
			$db_first_name = $new_first_name;
		}

		if(empty($_POST['new_last_name'])){

			$new_last_nameErr = "This field must not be empty!";
		}else{

			$new_last_name = $_POST['new_last_name'];
			$db_last_name = $new_last_name;
		}

		if(empty($_POST['new_address'])){

			$new_addressErr = "This field must not be empty!";
		}else{

			$new_address = $_POST['new_address'];
			$db_address = $new_address;
		}

		if(empty($_POST['new_email'])){

			$new_emailErr = "This field must not be empty!";
		}else{

			$new_email = $_POST['new_email'];
			$db_email = $new_email;
		}

        if(empty($_POST['new_password'])){

            $new_passwordErr = "This field must not be empty!";

        }else{

            $new_password = $_POST['new_password'];
            $db_password = $new_password;
        }


		if($new_first_name && $new_last_name && $new_address && $new_email && $new_password){

			if(!preg_match("/^[a-zA-Z]*$/", $new_first_name)){

				$new_first_nameErr = "Please enter characters only";

			}else{

				$count_new_firstname_string = strlen($new_first_name);

				if ($count_new_firstname_string < 2){

					$new_first_nameErr = "Your first name is too short!";
				}else{

                    $count_new_lastname_string = strlen($new_last_name);

                    if ($count_new_lastname_string < 2){

                        $new_last_nameErr = "Your last name is too short!";
                    }else{

                        if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)){

                            $new_emailErr = "Invalid email format!";
                        }else{

                            mysqli_query($cn,"UPDATE tbl_user SET 

									  first_name = '$db_first_name',
									  last_name = '$db_last_name',
									  gender = '$db_gender',
									  address = '$db_address',
									  email = '$db_email',
									  password = '$db_password' WHERE id_user='$id_user'
										");

                                 $encrypted = md5(rand(1,9));

                                 echo "<script>window.location.href='setting?encrypted=$encrypted';</script>";

                        }
                    }
				}
			}
		} // if input fields has a value
    } // isset btnUpdate

?>

<style>
.ui.icon.header:first-child{
    font-size: 1.2em;
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
<div id="update-setting">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-8">
                <div class="ui modal">
                    <div id="ui-header" class="ui icon header">
                        <p><i class="fa fa-gears"></i> Admin Information Setting</p>
                    </div>
                    <div class="content">
                        <div class="ui form">       
                            <form  method="POST">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>First Name:</label>
                                    <input type="text" name="new_first_name" placeholder="first name" value="<?php echo $db_first_name; ?>">
                                    <span class="error"><?php echo $new_first_nameErr; ?></span>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Last Name:</label>
                                    <input type="text" name="new_last_name" value="<?php echo $db_last_name; ?> ">
                                    <span class="error"><?php echo $new_last_nameErr; ?></span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-3">
                                     <label>Select Gender:</label>
                                    <select name="new_gender">
                                        <option name="new_gender" value="Male" <?php if($db_gender == 'Male'){ echo 'selected'; } ?> >Male</option>
                                        <option name="new_gender" value="Female" <?php if($db_gender == 'Female'){ echo 'selected'; } ?> >Female</option>
                                    </select>
                                    <span class="error"><?php echo $new_genderErr; ?></span>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Address:</label>
                                    <textarea type="text" name="new_address" rows="3"><?php echo $db_address;?></textarea>
                                    <span class="error"><?php echo $new_addressErr; ?></span>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Email:</label>
                                    <input type="text" name="new_email" value="<?php echo $db_email;?>">
                                    <span class="error"><?php echo $new_emailErr; ?></span>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Password:</label>
                                    <input type="password" name="new_password" value="<?php echo $db_password;?>">
                                    <span class="error"><?php echo $new_passwordErr; ?></span>
                                </div>
                                <br>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="submit" name="btnUpdate" value="update" class="btn btn-outline-primary">&nbsp;&nbsp;
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
