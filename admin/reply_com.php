<?php

    include '../connections.php';
    include 'header.php';

    $id_user = $_GET['id'];

    $query_reply = mysqli_query($cn,"SELECT * FROM comments WHERE id=$id_user");

    while($get_reply = mysqli_fetch_assoc($query_reply)){

        $db_name = $get_reply['name'];
        $db_contact = $get_reply['contact'];
        $db_message = $get_reply['message'];
        $db_date_now = $get_reply['date_now'];

    }

        $messageErr = "";

    if(isset($_POST['btnSend'])){

        if(empty($_POST['messageReply'])){

            $messageErr = "Message is Required Here!!!";

        }else{

            $contactNumber = $_POST['new_contact'];

            $messageReply = $_POST['messageReply'];

            function itextmo($contactNumber, $messageReply,$apicode){
                $url = 'https://www.itexmo.com/php_api/api.php';

                $apicode = "TR-LAPTO199839_QFP9E";

                $itextmo = array('1'=>$contactNumber, '2' =>  $messageReply, '3' => $apicode);
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

            $result = itextmo("$contactNumber","$messageReply","API_CODE");

            if($result == ""){

                echo "Message Not Sent";
            }else{

                echo "Message Sent";
            }

        }//empty

    }//btnreply

?>
<style>
.ui.form input:not([type]), .ui.form input[type=date], .ui.form input[type=datetime-local], .ui.form input[type=email], .ui.form input[type=file], .ui.form input[type=number], .ui.form input[type=password], .ui.form input[type=search], .ui.form input[type=tel], .ui.form input[type=text], .ui.form input[type=time], .ui.form input[type=url]{
    background-color: #333;
    color: navajowhite;
}
.ui.form select{
    background-color: #333;
    color: navajowhite;
}
.ui.form input[type=checkbox], .ui.form textarea{
    background-color: #333;
    color: navajowhite;
}
label{
    font-weight: 600;
    color: white;
}
#reply_comments table{
    margin-bottom: 100px;
}
</style>

<body>
<div id="reply_comments">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-8">
                <div class="ui basic modal">
                    <div class="ui icon header">
                        <p id="r-para"><i class="fa fa-mobile-phone"></i> Sending SMS</p>
                    </div>
                    <div id="replyContent" class="content">
                        <div class="ui form">
                            <form method="POST">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>From:</label>
                                    <input type="text" name="new_first_name" placeholder="first name" disabled value="<?php echo "Hyperion Company"; ?>">
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Send To:</label>
                                    <input type="text" name="new_contact" disabled value="<?php echo $db_contact;?>">
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <label>Message:</label>
                                    <textarea name="messageReply" rows="4"></textarea>
                                    <span class="error"><?php echo $messageErr?></span>
                                </div>
                                <br>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="submit" name="btnSend" value="Send" class="ui inverted blue button">&nbsp;&nbsp;
                                    <a href="?" class="ui inverted red button">Cancel</a>
                                </div>
                            </form>
                        </div><!--ui form-->
                    </div><!--modal content-->
                </div><!--uimodal-->
            </div><!--col-->
        </div><!--row-->
    </div><!--container-->
</div><!--reply_com-->

<?php

     include 'footer.php';

?>

<script>    

        $('.ui.modal').modal('show');

</script>
