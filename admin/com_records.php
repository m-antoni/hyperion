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

    // this will trigger the delete button
    if(empty($_GET['getDelete'])){

        // do nothing here...
    }else{
        include 'delete_com.php';
    }

?>


<body>
<div id="comments-records">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-2 offset-lg-0 col-md-12">
                <h1><i class="fa fa-comments"></i> Comments Records</h1>
                <?php
                    if(isset($_GET['success'])){

                        echo "<div class='alert alert-success' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <p class='alert-heading'><i class='fa fa-check-square-o'></i> <b>Comment has been deleted successfully.</b></p>
                                </div>";
                    }
                ?>
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <tr class="tableTitle">
                        <td width="15%"><b>Name</b></td>
                        <td width="10%" class="comments_email"><b>Email</b></td>
                        <td width="45%"><b>Message</b></td>
                        <td width="20%"><b>Date</b></td>
                        <td width="5"><b>Action</b></td>
                    </tr>

                    <?php

                        $retrieve_query = mysqli_query($cn, "SELECT * FROM comments ORDER BY date_now DESC");

                        while($row = mysqli_fetch_assoc($retrieve_query)){

                            $id_user = $row['id'];

                            $db_name = $row['name'];
                            $db_email = $row['email'];
                            $db_message = $row['message'];
                            $db_date = $row['date_now'];

                            // for random characters on the address bar
                            $jScript = md5(rand(1,9));

                            //this is for action variables
                            $getReply = md5(rand(1,9));
                            $getDelete = md5(rand(1,9));

                            echo "<tr class='tableRows'>
                                        <td>$db_name</td>
                                        <td class='comments_email'>$db_email</td>
                                        <td>$db_message</td>
                                        <td>$db_date</td>
                                        <td>
                                             <a class='btn btn-outline-danger' href='?jScript=$jScript && getDelete=$getDelete && id=$id_user'>Delete</a>
                                        </td>
                                    </tr>";
                        } // while loop
                    ?>
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--container-->   
</div><!--com-records-->
 

<?php

    include 'footer.php';

?>

