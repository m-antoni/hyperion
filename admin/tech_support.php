<?php
    session_start();
    include '../connections.php';

    include 'header.php';
    // SMS DROPDOWN FORM
    $sendingSMSDropdown =  "<div id='dropdownSMS' class='btn-group'>
                                <button type='button' class='btn btn-link dropdown-toggle dropdown-toggle-split' data-toggle='dropdown'>
                                    <i class='fa fa-envelope'></i><span class='sr-only'>Toggle Dropdown</span>
                                </button>
                                <div class='dropdown-menu'>
                                    <form method='post'>
                                        <p><i class='fa fa-envelope'></i><b> Sending SMS</b></p>
                                        <div class='form-group'>
                                            <label>Contact:</label>
                                            <input type='text' maxlength='11' name='contactSMS' class='form-control'>
                                        </div>
                                        <div class=form-group>
                                            <label>Message:</label>
                                            <textarea class=form-control name=messageSMS rows=3></textarea>
                                        </div>
                                        <button type='submit' name='btnSMS' class='btn btn-outline-info btn-block'>submit</button>
                                    </form>
                                </div>
                            </div>&nbsp;&nbsp;&nbsp;";

if(isset($_SESSION['email'])){

        $email = $_SESSION['email'];

        $authentic = mysqli_query($cn, "SELECT * FROM tbl_user WHERE email='$email'");
        $fetch = mysqli_fetch_assoc($authentic);
        $account_type = $fetch['account_type']; //getting the account_type value in database

        if($account_type !=1){	//if not match in value

            echo "<script>window.location.href='../forbidden';</script>";
        }
    }


    if(empty($_GET['getDelete'])){

        // do nothing
    }else{

        include 'tech_confirm.php';
    }

    include 'navigation.php';

    if(isset($_POST['btnSMS'])){


        $contact = $_POST['contactSMS'];

        $message = $_POST['messageSMS'];

        $jScript = md5(rand(1,9));

        $smsSend = md5(rand(1,9));

        function itextmo($contact,$message,$apicode){
            $url = 'https://www.itexmo.com/php_api/api.php';

            $apicode = "TR-ARJHA287239_NK9XL";

            $itextmo = array('1'=>$contact, '2' => $message, '3' => $apicode);
            $param = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content'=> http_build_query($itextmo),
                ),
            );

            $context = stream_context_create($param);
            return file_get_contents($url, false, $context);
        }

        $result = itextmo("$contact","$message","API_CODE");

        if($result == ""){

            echo "<script>alert('Message not Send!')</script>";
        }else{

            echo "<script>window.location.href='?jScript=$jScript&&smsSend=$smsSend'</script>";
        }
    }



?>
<body>
<div id="tech_support">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 offset-lg-2 offset-lg-0 col-md-12">
                <h1><i class="fa fa-gears"></i> Client Appointment List</h1>
                <?php
                if(isset($_GET['success'])){

                    echo "<div class='alert alert-success' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <p class='alert-heading'><i class='fa fa-check-square-o'></i> <b>Appointment request has been deleted successfully</b></p>
                            </div>";
                }
                if(isset($_GET['smsSend'])){

                    echo "<div class='alert alert-success' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <p class='alert-heading'><i class='fa fa-check-square-o'></i> <b>Message Sent Successfully</b></p>
                            </div>";
                }

                ?>
                <table class="table table-hover table-responsive table-striped table-bordered">
                    <tr class="tableTitle">
                        <td width="15%"><b>Customer</b></td>
                        <td width="10%"><b>Laptop/Device</b></td>
                        <td width="35%"><b>Problem</b></td>
                        <td width="12%"><b>Contact</b></td>
                        <td width="20%"><b>Date</b></td>
                        <td width=""><b>Action</b></td>
                    </tr>
                    <?php

                        $query = mysqli_query($cn,"SELECT * FROM appointment ORDER BY date DESC");

                        while ($row = mysqli_fetch_assoc($query)){

                            $id_user = $row['id'];
                            $db_name = $row['name'];
                            $db_device = $row['device'];
                            $db_message = $row['message'];
                            $db_contact = $row['contact'];
                            $db_date = $row['date'];

                            $jScript = md5(rand(1,9));

                            $getReply = md5(rand(1,9));
                            $getDelete = md5(rand(1,9));

                            echo "
                                <tr>
                                      <td>$db_name</td>
                                      <td>$db_device</td>
                                      <td>$db_message</td> 
                                      <td>$db_contact</td>
                                      <td>$db_date</td>
                                      <td>               
                                        <a class='btn btn-outline-danger' href='?jScript=$jScript && getDelete=$getDelete && id=$id_user'>Delete</a>     
                                      </td>
                                </tr>";
                        }//while loop
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php

    include 'footer.php';

?>



<script>

    $('.ui.modal').modal('show');

</script>
