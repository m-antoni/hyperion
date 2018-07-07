<?php
	
	session_start(); //session 	
	include 'connections.php';

	if (isset($_SESSION['email'])){

		$email = $_SESSION['email'];

		$query_account_type = mysqli_query($cn, "SELECT * tbl_user WHERE email='$email'");

		$get_account_type = mysqli_fetch_assoc($query_account_type);

		if ($account_type == 1){

			echo "<script>window.location.href='admin';</script>";
		}else{

			echo "<script>window.location.href='user_index.php';</script>";
		}

	}

    date_default_timezone_set('Asia/Manila');
	$date_now = date('m/d/Y'); // get the date
	$time_now = date('h:i a'); // get the time

	$notify = "";
	$attempt = "";
	$log_time = "";

	$end_time = date('h:i A', strtotime('+15 minutes', strtotime($time_now)));

	$email = "";
	$password = "";
	
	$emailErr = ""; // for error handling
	$passwordErr = ""; // for error handling


	if (isset($_POST['btnLogin'])){

		if(empty($_POST['email'])){

			$emailErr = "email is required!";
		}else{

			$email = $_POST['email'];
		}

		if(empty($_POST['password'])){

			$passwordErr = "password is required!";
		}else{

			$password = $_POST['password'];
		}


		if ($email && $password){

			$check_email = mysqli_query($cn, "SELECT * FROM tbl_user WHERE email='$email'");
			$check_row = mysqli_num_rows($check_email);
			// if true
			if ($check_row > 0){
					// get the data of login
					$fetch = mysqli_fetch_assoc($check_email);

					$db_password = $fetch['password'];
					$db_attempt = $fetch['attempt'];
					$db_log_time = strtotime($fetch['log_time']);
					$my_log_time = $fetch['log_time'];
					$new_time = strtotime($time_now);

					$account_type = $fetch['account_type'];

					if ($account_type == '1'){

						if($db_password == $password){

							$_SESSION['email'] = $email; //admin session
							//go to admin section
							echo "<script>window.location.href='admin';</script>";
						}else{

							$passwordErr = "Hi Admin! Your password is incorrect!";
						}

					}else{

						if($db_log_time <= $new_time){

							if($db_password == $password){

								$_SESSION['email'] = $email; //users session

								mysqli_query($cn, "UPDATE tbl_user SET attempt='', log_time='' WHERE email='$email'");

								echo "<script>window.location.href='users/user_index';</script>";

							}else{

								$attempt = $db_attempt + 1;

									if($attempt >= 3){

										$attempt = 3;

										mysqli_query($cn, "UPDATE tbl_user SET attempt='$attempt', log_time='$end_time' WHERE  email='$email'");

										$notify = "You already reach the three (3) times attempt to login. Please Login after 15 minutes: <span style='color','red'><b>$end_time</b></span>";

									}else{

										mysqli_query($cn, "UPDATE tbl_user SET attempt='$attempt' WHERE email='$email'");

										$passwordErr = "Password is incorrect!";
									
										$notify = "Login Attempt: <b>$attempt</b>";	
									}
							}
						}else{

							$notify = "I'm Sorry, You have to wait until: <b>$my_log_time</b> before login";
						}
					}
			}else{

				$emailErr = "Email is not registered!";	
			}	
		}
	}// isset btnLogin
?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title></title>
</head>
<body id="login">

<div id="login-nav">
    <ul>
        <li>
            <a class="btn btn-outline-warning" href="index">
                <i class="fa fa-arrow-left"></i> back
            </a>
        </li>
    </ul>
    <ul class="rightSide">
        <li><img class="img-fluid" src="img/gif/rotatingGlobe.gif"></li>
        <li class="time"><?php echo  $time_now; ?></li>
    </ul>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-9 col-xs-10">
            <form id="login_form" method="POST" class="z-depth-5">
                <center><img id="login_img" src="img/logos/logo2.png"></center>
                <div class="input-field">
                    <input type="text" name="email" value="<?php echo $email;?>">
                    <label><i class="fa fa-envelope"></i> email address </label>
                    <span class="error"><?php echo $emailErr?></span>
                </div>

                <div class="input-field">
                    <input type="password" name="password" value="">
                    <label><i class="fa fa-key"></i> password</label>
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>

                <button type="submit" name="btnLogin" class="btn btn-outline-warning btn-block"><i class="fa fa-sign-in"></i> Sign In</button>
                <br>
                <span class="error"><?php echo $notify; ?></span>
                <br>
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
                <p>Don't have an account yet?<a href="signup?signup=<?php echo md5(rand(1,9)); ?>"><br>create your account.</a></p>
                <!-- <a href="?forgot=--><?php //echo md5(rand(1,9)); ?><!--">Forgot Password?</a>-->
            </form>
        </div>
    </div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>


