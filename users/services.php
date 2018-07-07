<?php
    session_start();
    include '../connections.php';
    include 'header.php';
    include 'navigation.php';

    if(empty($_GET['appointment'])){

        // do nothing here...
    }else{

        include 'services_tech.php';

    }
    //random numbers
    $jScript = md5(rand(1,9));

    $appointment = md5(rand(1,9));


?>
<body>


<div id="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php
                    if(isset($_GET['success'])){

                        echo "<div class='alert alert-success' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <h4 class='alert-heading'><i class='fa fa-check-square-o'></i> Appointment has been sent successfully</h4>
                                <h6>Please wait for confirmation through SMS, Thank You.</h6>
                            </div>";
                    }
                ?>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-info" role="alert">
                    <h1 class="alert-heading">Customer Service</h1><br>
                    <p>
                        <img src="../img/services/customer.jpg" class="img-fluid" alt="call">
                    </p>
                    <hr>
                    <h4>Call us: <i class="fa fa-phone"></i> 1800-1651-0525 </h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-info" role="alert">
                    <h1 class="alert-heading">Technical Support</h1><br>
                    <img src="../img/services/tech.jpg" class="img-fluid" alt="tech">
                    <hr>
                    <h4 class="mb-0">Make an appointment
                        <a href="?jScript=$jScript && appointment=$appointment">Here</a>
                    </h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-info" role="alert">
                    <h1 class="alert-heading">International Shipping</h1><br>
                    <img src="../img/services/shipment.jpg" class="img-fluid" alt="tech">
                    <hr>
                    <h4>Call us: <i class="fa fa-phone"></i> 1800-0525 </h4>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="alert alert-info" role="alert">
                    <h1 class="alert-heading">Local Delivery</h1><br>
                    <img src="../img/services/delivery.jpg" class="img-fluid" alt="tech">
                    <hr>
                    <h4>Call us: <i class="fa fa-phone"></i> 1800-0525-3245 </h4>
                </div>
            </div>
        </div>
    </div>





<?php

    include 'footer.php';

?>



