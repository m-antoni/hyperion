<?php
    session_start();
    include '../connections.php';
    include 'header.php';
    include 'navigation.php';

?>

<body>
    <div id="user-index">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h1 class="alert-heading">Welcome <?php echo ucfirst($db_first); ?></h1>
                        <p>
                            Thank You for trusting and our services
                        </p>
                        <hr>
                        <p class="mb-0"> <p>Copyright &copy; 2018 Hyperion Company. All Rights Reserved | Developed by the Team of Programmers</p></p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div id="alert-mac" class="alert alert-info" role="alert">
                        <h4 class="alert-heading">All new MacBook Pro w/ Touch ID</h4>
                        <p>The best selling on our list since it's launch</p>
                        <hr>
                        <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4BkskUE8_hA" allowfullscreen></iframe>
                        </div>
                        <!-- FOR LOCALHOST-->
                        <!-- <div class="embed-responsive embed-responsive-16by9">
                            <video class="embed-responsive-item" controls autoplay loop muted>
                                <source src="videos/macbookpro.MP4"  type="video/mp4">
                            </video>
                        </div> -->
                        <br>
                        <p class="mb-0">You can visit the official website <b><a href="https://www.apple.com/ph/macbook-pro/" target="_blank">here</a></b></p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div id="alert-alienware" class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Hardcore Gaming only on <span style="color: crimson">ALIENWARE 17</span></h4>
                        <p>The most epic gaming laptop for hardcore gamers out there.</p>
                        <hr>
                         <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8jKH25r9JK0" allowfullscreen></iframe>
                        </div>       
                        <!--FOR LOCALHOST ONLY-->
                        <!-- <div class="embed-responsive embed-responsive-16by9">
                            <video class="embed-responsive-item" controls autoplay loop muted>
                                <source src="videos/alienware.MP4"  type="video/mp4">
                            </video>
                        </div> -->
                        <br>
                        <p class="mb-0">You can visit the official website <b><a href="http://www.alienware.co.in/" target="_blank">here</a></b></p>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="../img/gif/shipping.gif" alt="shipping" class="img-fluid">
                </div>

                <div class="col-lg-4 col-md-12 shipping">
                     <h1 class="display-4">We always make sure your item is secured.</h1><br><br>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="ui blue large tag label">CASH ON DELIVERY</div>
                    <div class="ui teal tag label">PAYMENT USING CREDIT CARD</div>
                </div>
                <br>
                <br>
                <div class="col-12">
                    <div id="alert-info" class="alert alert-info" role="alert">
                        <p class="mb-0"><b>Copyright &copy; 2018 Hyperion Company. All Rights Reserved | Developed by the Team of Programmers</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    include 'footer.php';
?>