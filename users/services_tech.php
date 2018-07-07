<?php
    include '../connections.php';

    // SET THE TIMEZONE
    date_default_timezone_set('Asia/Manila');
    $date = date("d/m/Y - h:i:a");

    $name = "";
    $contact = "";
    $device = "";
    $message = "";

    $nameErr = "";
    $contactErr = "";
    $messageErr = "";
    $deviceErr = "";


    if(isset($_POST['btnSubmit'])){

        if(empty($_POST['name'])){

            $nameErr = "required field";
        }else{
            $name = $_POST['name'];
        }

        if(empty($_POST['device'])){

            $deviceErr = "required field";
        }else{
            $device = $_POST['device'];
        }

        if(empty($_POST['message'])){

            $messageErr = "required field";
        }else{
            $message = $_POST['message'];
        }

        if(empty($_POST['contact'])){

            $contactErr = "required field";
        }else{
            $contact = $_POST['contact'];
        }

        if($name && $device && $message && $contact){

            $jScript = md5(rand(1,9));
            $success = md5(rand(1,9));

            $query = mysqli_query($cn,"INSERT INTO appointment(name, device, message, contact, date) 
                     VALUES ('$name','$device','$message','$contact','$date')");

            

            echo "<script>window.location.href='services.php?jScript=$jScript&&success=$success'</script>";

        }

    }//btnSubmit

?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <title></title>
    <style>
        .error{
            color: yellow;
        }
        .ui.modal>.icon:first-child+*, .ui.modal>:first-child:not(.icon){
            background-color: #1d2129;
            padding: 1.2em;
            border-radius: 0;
        }

        .ui.form input:not([type]), .ui.form input[type=date], .ui.form input[type=datetime-local], .ui.form input[type=email], .ui.form input[type=file], .ui.form input[type=number], .ui.form input[type=password], .ui.form input[type=search], .ui.form input[type=tel], .ui.form input[type=text], .ui.form input[type=time], .ui.form input[type=url]{
            background-color: dimgrey;
            color: navajowhite;
            font-size: 1.2em;
        }
        .ui.form select{
            background-color: dimgrey;
            color: navajowhite;
        }
        .ui.form input[type=checkbox], .ui.form textarea{
            background-color: dimgrey;
            color: navajowhite;
            font-size: 1.2em;
        }
        label{
            font-weight: 600;
            color: white;
        }

    </style>
</head>
<body>

<script type="text/javascript">

    // blocking your keypress for characters

    function isNumberKey(evt){

        var charcode =(evt.which) ? evt.which : evt.keycode

        if (charcode > 31 && (charcode < 48 || charcode > 57))

            return false;

        return true;
    }
</script>

<div id="services_message">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 offset-lg-8">
                <div class="ui modal">
                    <div id="ui-header" class="ui icon header">
                        <p><i class="fa fa-pencil"></i> Set an appointment</p>
                    </div>
                    <div class="content">
                        <div class="ui form">
                            <form  method="POST">
                                <div class="col-lg-6">
                                    <label>Name:</label>
                                    <input type="text" name="name" value="<?php echo $name; ?>">
                                    <span class="error"><?php echo $nameErr;?></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Your Laptop / Device here:</label>
                                    <select name="device" class="browser-default">
                                        <option name="device" value="" disabled selected >Choose here...</option>
                                        <option name="device" value="Windows" <?php if($device === "Windows"){ echo "selected"; }?> >Windows</option>
                                        <option name="device" value="Mac Os" <?php if($device === "Mac Os"){ echo "selected"; }?> >Mac Os</option>
                                        <option name="device" value="Linux" <?php if($device === "Linux"){ echo "selected"; }?> >Linux</option>
                                        <option name="device" value="Chromebook" <?php if($device === "Chromebook"){ echo "selected"; }?> >Chromebook</option>
                                        <option name="device" value="HDD/SSD/External" <?php if($device === "HDD/SSD/External"){ echo "selected"; }?> >HDD/SSD/External</option>
                                        <option name="device" value="XBOX-360" <?php if($device === "XBOX-360"){ echo "selected"; }?> >XBOX-360</option>
                                        <option name="device" value="PS4" <?php if($device === "PS4"){ echo "selected"; }?> >PS4</option>
                                        <option name="device" value="other devices" <?php if($device === "other devices"){ echo "selected"; }?> >other devices</option>
                                    </select>
                                    <span class="error"><?php echo $deviceErr; ?></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Problem:</label>
                                    <textarea type="text" name="message" rows="3"><?php echo $message; ?></textarea>
                                    <span class="error"><?php echo $messageErr;?></span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Contact:</label>
                                    <input type="text" name="contact" value="<?php echo $contact; ?>"
                                           maxlength="11" onkeypress="return isNumberKey(event)">
                                    <span class="error"><?php echo $contactErr?></span>
                                </div>
                                <br>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-outline-info"
                                            name="btnSubmit">Submit
                                    </button>
                                    &nbsp;
                                    <a href="?" class="btn btn-outline-danger">Cancel</a>
                                </div>
                            </form>
                        </div><!--ui form-->
                    </div><!--modal content-->
                </div><!--uimodal-->
            </div><!--col-->
        <div><!--row-->
    </div><!--container-->
  </div><!--service_message-->




        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/tether.min.js"></script>
        <script src ="../js/bootstrap.min.js"></script>
        <script src="../js/semantic.min.js"></script>
        <script src="../js/script.js"></script>
</body>
</html>


<script>

    $('.ui.modal').modal('show');

</script>