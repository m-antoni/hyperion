<?php

include 'connections.php';

$first_name = "";
$last_name = "";
$gender = "";
$address = "";
$email = "";
$password = "";
$confirm_password = "";

$first_nameErr = "";
$last_nameErr = "";
$genderErr = "";
$addressErr = "";
$emailErr = "";
$passwordErr = "";
$confirm_passwordErr = "";

date_default_timezone_set('Asia/Manila');
$time_now = date('h:i a'); // get the time


if(isset($_POST['btnRegister'])){

    if(empty($_POST['first_name'])){

        $first_nameErr = "Required";
    }else{
        $first_name = $_POST['first_name'];
    }

    if(empty($_POST['last_name'])){

        $last_nameErr = "Required";
    }else{
        $last_name = $_POST['last_name'];
    }

    if(empty($_POST['gender'])){

        $genderErr = "Required";
    }else{
        $gender = $_POST['gender'];
    }

    if(empty($_POST['address'])){

        $addressErr = "Required";
    }else{
        $address = $_POST['address'];
    }

    if(empty($_POST['email'])){

        $emailErr = "Required";
    }else{

        $email = $_POST['email'];
    }

    if(empty($_POST['password'])){

        $passwordErr = "Required";
    }else{

        $password = $_POST['password'];
    }

    if(empty($_POST['confirm_password'])){

        $confirm_passwordErr = "Required";
    }else{

        $confirm_password = $_POST['confirm_password'];
    }


    if($first_name && $last_name && $gender && $address && $email && $password && $confirm_password){

        if(!preg_match("/^[a-zA-Z]*$/", $first_name)){

            $first_nameErr = "Please enter characters only";

        }else{

            $count_firstname_string = strlen($first_name);

            if($count_firstname_string < 2){

                $first_nameErr = "first name is too short";

            }else{

                $count_lastname_string = strlen($last_name);

                if($count_lastname_string < 2){

                    $last_nameErr = "last name is too short";

                }else{

                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                        $emailErr = "invalid email format!";
                    }else{

                        $count_address_string = strlen($address);

                        if($count_address_string < 10){

                            $addressErr = "Your address is too short!";
                        }else{

                            if ($confirm_password != $password){

                                $confirm_passwordErr = "password do not match!";

                            }else{

                                $sql = "SELECT email FROM tbl_user WHERE email='$email'";
                                $result = $cn->query($sql);
                                $email_check = mysqli_num_rows($result);

                                if($email_check > 0){

                                    $emailErr = "Email has already in taken";

                                }else{

                                    mysqli_query($cn, "INSERT INTO tbl_user(first_name, last_name, gender, address, email, password, account_type)
                                         VALUES ('$first_name','$last_name','$gender','$address','$email','$password', '2')");

                                    echo "<script>window.location.href='login';</script>";

                                }

                            }

                        }

                    }

                }

            }

        }

    } // if all fields are not empty

}//btnRegister

?>
<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title></title>
    <style>
        .error{
            color: red;
            font-weight: 600;
        }
    </style>
</head>
<body id="signup">

<div id="signup-nav">
    <ul>
        <li>
            <a id="leftSide" class="btn btn-outline-warning" href="index">
                <i class="fa fa-arrow-left"></i> BACK
            </a>
        </li>
    </ul>
    <ul class="rightSide">
        <li><img class="img-fluid" src="img/gif/rotatingGlobe.gif"></li>
        <li class="time"><?php echo  $time_now; ?></li>
    </ul>
</div>

<div id="signup_form" class="container">
    <div class="row">
        <form method="post" class="z-depth-5">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label><i class="fa fa-user-circle"></i> First Name</label>
                    <input type="text" name="first_name"  class="form-control" value="<?php echo $first_name; ?>"> 
                    <span class="error"><?php echo $first_nameErr; ?></span>
                </div>

                <div class="form-group col-lg-6">
                    <label><i class="fa fa-user-circle"></i> Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $last_name;?>">
                    <span class="error"><?php echo $last_nameErr; ?></span>
                </div>
            </div><!-- form-row-->

            <div class="form-group">
                <label>Select Gender</label>
                <select name="gender" class="form-control col-5">
                    <option name="gender" value="" disabled selected >Gender</option>
                    <option name="gender" value="Male" <?php if($gender === "Male"){ echo "selected"; }?> >Male</option>
                    <option name="gender" value="Female" <?php if($gender === "Female"){ echo "selected"; }?> >Female</option>
                </select>
                <span class="error"><?php echo $genderErr; ?></span>
            </div>

            <div class="form-group">
                <label><i class="fa fa-home"></i> Home Address</label>
                <textarea type="text"  class="form-control" name="address" class="materialize-textarea"><?php echo $address;?></textarea>
                <span class="error"><?php echo $addressErr; ?></span>
            </div>


            <div class="div form-group">
                <label><i class="fa fa-key"></i> Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password;?>">
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>

            <div class="form-group">
                <label><i class="fa fa-key"></i> Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password;?>">
                <span class="error"><?php echo $confirm_passwordErr; ?></span>
            </div>

            <div class="form-group">
                <label><i class="fa fa-envelope"></i> Email Address</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>

            <div class="clearfix"></div><br>
            <button type="submit" id="register" name="btnRegister" class="btn btn-outline-primary btn-block" value="Register">
                <i class="fa fa-sign-in"></i> Sign up
            </button>
            <a href="login" class="btn btn-danger btn-block"><i class="fa fa-user"></i> Login</a>
        </form>
    </div><!--row-->
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>




