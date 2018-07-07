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


<body>

<div id="orders">

</div>

<?php

    include 'navigation.php';

?>





<?php

include 'footer.php';

?>



