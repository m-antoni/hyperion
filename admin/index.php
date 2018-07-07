<?php

    session_start();

    include '../connections.php';

    include 'header.php';

    if(isset($_SESSION['email'])){

        $email = $_SESSION['email'];

        $authentic = mysqli_query($cn, "SELECT * FROM tbl_user WHERE email='$email'");
        $fetch = mysqli_fetch_assoc($authentic);
        $account_type = $fetch['account_type']; //getting the account_type value in database

        if($account_type !=1){	//if not match in value

            echo "<script>window.location.href='../forbidden';</script>";
        }
    }
?>


<body id="admin">

<?php

    include 'navigation.php';
?>

<style>
    .zc-ref {
        display: none;
    }
    #myChart{
        width: 100%;

    }
</style>

<div class="div" id="admin-cms">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-2">
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="alert-heading">Welcome Back Admin!</h1>
                </div><br>

                <img src="../img/gif/hyperion.gif" alt="hyperion" class="img-fluid">

            </div>
        </div>
    </div>
</div>




















<?php

    include 'footer.php';

?>



