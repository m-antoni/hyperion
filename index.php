<?php
    $title = 'homepage';
    include 'connections.php';
    include 'header.php';

   // SET THE TIMEZONE
    date_default_timezone_set('Asia/Manila');
    $date = date("d/m/Y - h:i:a");

    $nameCom = "";
    $emailCom = "";
    $messageCom = "";

    $nameComErr = "";
    $emailComErr = "";
    $messageComErr = "";

    if(isset($_POST['btnCom'])){

        if(empty($_POST['nameCom'])){
            $nameComErr ='name required';
            echo "<script>window.location.href='#comment-section'</script>";

        }else{
            $nameCom = $_POST['nameCom'];
            echo "<script>window.location.href='#comment-section'</script>";
        }

        if(empty($_POST['emailCom'])){
            $emailComErr ='email required';
            echo "<script>window.location.href='#comment-section'</script>";

        }else{
            $emailCom = $_POST['emailCom'];
            echo "<script>window.location.href='#comment-section'</script>";
        }

        if(empty($_POST['messageCom'])){
            $messageComErr ='message required';
            echo "<script>window.location.href='#comment-section'</script>";

        }else{
            $messageCom = $_POST['messageCom'];
            echo "<script>window.location.href='#comment-section'</script>";
        }

        // checking the the user inputs
        if($nameCom && $emailCom && $messageCom){

            if(!preg_match("/^[a-z A-Z]*$/", $nameCom)){

                $nameComErr = "Please enter characters only!";
                echo "<script>window.location.href='#comment-section'</script>";

            }else{

                $count_nameCom = strlen($nameCom);

                if($count_nameCom <= 2){

                    $nameComErr = "Name is too short!";
                    echo "<script>window.location.href='#comment-section'</script>";

                }else{

                    if(!filter_var($emailCom,FILTER_VALIDATE_EMAIL)){

                        $emailComErr = "Invalid email format";

                    }else{

                        $count_message_com = strlen($messageCom);

                        if($count_message_com < 10){

                            $messageComErr = "Message is too short!";
                            echo "<script>window.location.href='#comment-section'</script>";

                        }else{

                            mysqli_query($cn, "INSERT INTO comments(name, email, message, date_now) 
                                          VALUES('$nameCom','$emailCom','$messageCom','$date')");

                            $nameCom = "";
                            $emailCom = "";
                            $messageCom = "";

                            echo "<script>window.location.href='#comment-section'</script>";
                            echo "<script>alert('comment has been submitted.');</script>";
                        }

                    }
                }
            }
        }

    }//isset btnCom


//    if(empty($_GET['signup'])){
//
//    // do nothing here...
//
//    }else{
//
//        include 'signup.php';
//
//    }
//
//    $jScript = md5(rand(1,9));
//
//    $signup = md5(rand(1,9));

?>

<body id="index_page">

<nav id="navbar-site" class="fixed-top navbar navbar-expand-lg navbar-toggleable-sm navbar-inverse">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myContent">
        <i class="fa fa-bars"></i>
    </button>
    <a  href="#" class="navbar-brand hidden-lg-down"><i class="fa fa-laptop"></i></a>
    <div class="collapse justify-content-center navbar-collapse" id="myContent">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index">Home</a>
            <a class="nav-item nav-link" href="#feed">Feed</a>
            <a class="nav-item nav-link" href="#products">Products</a>
            <a class="nav-item nav-link" href="#events">Events</a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item nav-link" href="#comment-section">Contact</a>
        </div>
    </div>
</nav>


<div id="header_index">
    <div class="bg-wrap overlay">
        <video autoplay loop muted>
            <source src="videos/advertise.MP4"> VIDEO NOT SUPORTED
        </video>

    </div>

       <!-- HEADER BACKGROUND TAKES HERE ONLY FOR MOBILE VIEW PORT!! -->

</div>


<div class="text-center headerText">
    <div class="container">
        <h1 class="display-4" id="welcome">Welcome to  <span class="welcome_brand"><b>Hyperion</b></span></h1><br>
        <p class="lead">powerful and high-perfomance Laptops,<br>
            in just a few clicks.</p>
        <div class="btnHomepage">
            <a href="signup" class="ui inverted orange button signup">Sign up now</a>
            <a href="login" class="ui inverted blue button">Sign In here</a>
        </div>
    </div>
</div>



<div id="feed"><!-- ONLY FOR NAVIGATION OF CONTENT --></div>

<div id="customer_needs" class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="img/customers.jpg" class="img-fluid">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h1 class="display-4">We use an Integrated approach with Customer Needs at the Core.</h1>
           <div class="side_border">
               <p>
                   Philippine multinational technology company headquartered in North America that designs,
                   develops, and sells Laptop, and online services. The company's hardware products software
                   includes the macOS and windows operating systems.
               </p>
               <a href="#" class="btn btn-outline-primary">Learn more</a>
           </div>
        </div>
    </div>
</div>



<div id="products"><!-- ONLY FOR NAVIGATION OF CONTENT --></div>

<div id="gallery_section">
    <div class="row justify-content-center no-gutters">
         <div class="col-sm-6">
             <a href="#" class="gallery-01"><img id="imgOne" src="img/gallery/alienware.jpg" class="img-fluid"></a>
             <p id="img-1">Php 129,799.00</p>
         </div>
        <div class="col-sm-6">
            <a href="#" class="gallery-02"><img id="imgTwo" src="img/gallery/gigabyte.jpg" class="img-fluid"></a>
            <p id="img-2">Php 89,999.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-03"><img id="imgThree" src="img/gallery/asus_chromebook.jpg" class="img-fluid"></a>
            <p id="img-3">Php 50,899.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-04"><img id="imgFour" src="img/gallery/asus_zenbook.jpg" class="img-fluid"></a>
            <p id="img-4">Php 45,899.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-05"><img id="imgFive" src="img/gallery/dell_xps.jpg" class="img-fluid"></a>
            <p id="img-5">Php 69,799.00</p>
        </div>
        <div class="col-sm-6">
            <a href="#" class="gallery-06"><img id="imgSix" src="img/gallery/hp_omen.jpg" class="img-fluid"></a>
            <p id="img-6">Php 90,599.00</p>
        </div>
        <div class="col-sm-6">
            <a href="#" class="gallery-07"><img id="imgSeven" src="img/gallery/hp_spectre360.jpg" class="img-fluid"></a>
            <p id="img-7">Php 69,600.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-08"><img id="imgEight" src="img/gallery/lenovo_yoga.jpg" class="img-fluid"></a>
            <p id="img-8">Php 70,000.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-09"><img id="imgNine" src="img/gallery/razerblade.jpg" class="img-fluid"></a>
            <p id="img-9">Php 120,000.00</p>
        </div>
        <div class="col-sm-4">
            <a href="#" class="gallery-10"><img id="imgTen" src="img/gallery/microsoft.jpg" class="img-fluid"></a>
            <p id="img-10">Php 75,999.00</p>
        </div>
        <div class="col-sm-6">
            <a href="#" class="gallery-11"><img id="imgEleven" src="img/gallery/macbook_air.jpg" class="img-fluid"></a>
            <p id="img-11">Php 76,899.00</p>
        </div>
        <div class="col-sm-6">
            <a href="#" class="gallery-12"><img id="imgTwelve" src="img/gallery/macbook_pro.jpg" class="img-fluid"></a>
            <p id="img-12">Php 163,999.00</p>
        </div>
    </div>
</div>


<?php include 'modal-gallery.php';?>


<div id="companyLogos" class="container">
    <div class="row justify-content-center no-gutters">
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/alienware.png" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/ibm.png" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/gigabyte.png" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/asus.jpg" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/microsoft.png" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/unity.jpg" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/mac.jpg" class="img-fluid">
        </div>
        <div class="col-6 col-sm-4 col-md-3">
            <img src="img/logos/ea.png" class="img-fluid">
        </div>
    </div>
</div>



<div id="carouselFeatured" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselFeatured" data-slide-to="0" class="active"></li>
        <li data-target="#carouselFeatured" data-slide-to="1"></li>
        <li data-target="#carouselFeatured" data-slide-to="2"></li>
        <li data-target="#carouselFeatured" data-slide-to="3"></li>
        <li data-target="#carouselFeatured" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/carousel/slideOne.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>High-end Laptops</h1>
                <p class="carousel-para">Premium design with a powerful processing introduces new core technologies
                                            that improves the most important functions of your Laptop. .</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel/slideTwo.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Intel Core i7 Series</h1>
                <p class="carousel-para">Improving the efficiency of video streaming to unleashing the full power of your graphics processor.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel/slideThree.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Worldwide Shipping</h1>
                <p class="carousel-para">Hyperion partnership with FedEx Express Company, deliver to
                                         more than 220 countries and territories worldwide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel/slideFour.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Online Payment is Secured</h1>
                    <p class="carousel-para">We always make that every transaction is secured all over the world.</p>
                </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel/slideFive.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>Gaming Laptop</h1>
                <p class="carousel-para">Hardcore Gaming is not just on PC but for Laptops nowadays.</p>
            </div>
        </div>
    </div><!-- CAROUSEL INNER -->
    <!-- LEFT AND RIGHT ARROWS OF CAROUSEL -->
    <a class="carousel-control-prev" href="#carouselFeatured" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselFeatured" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- EVENT SECTION HERE -->

<div id="events"><!-- ONLY FOR NAVIGATION OF CONTENT --></div>

<div id="event-section" class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h4 align="center" class="display-4"><span class="ea-h4">E3 2018</span> is the must-attend event
                to see and experience the future of video games.</h4>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p align="justify">E3 is the world's premier event for computer and video games and related products. The show is owned
                by the Entertainment Software Association (ESA), the U.S. association dedicated to serving the business
                and public affairs needs of the companies, publishing interactive games for video game consoles,
                handheld devices, personal computers, and the Internet. For more information,
                please visit <a class="events-links" href="https://www.e3expo.com/" target="_blank">www.E3Expo.com</a> or
                <a class="events-links" href="www.theESA.com" target="_blank">www.theESA.com</a>
            </p>

            <p>check out last year's happenings <a href="#" class="events-links trigger-event">Here.</a></p>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-12">
            <a href="img/event/event_img.jpg" data-lightbox="event">
                <img src="img/event/event_img.jpg" class="img-thumbnail img-responsive center-block" alt="event">
            </a>
            <a href="img/event/event_1.jpg" data-lightbox="event"></a>
            <a href="img/event/event_2.jpg" data-lightbox="event"></a>
        </div>
    </div>
</div>

<!-- iziMODAL SECTION -->

<div id="modal-event" data-iziModal-title="Last year's E3 Expo 2017." data-iziModal-subtitle="Hyperion"
     data-iziModal-icon="icon-home"
     data-izimodal-transitionin="bounceInDown"
     data-izimodal-transitionout="fadeOutDown">
    <div class="modal-inside">
        <div class="embed-responsive embed-responsive-16by9">
             <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/225159738?color=fcd647&title=0&byline=0&portrait=0" allowfullscreen></iframe>
         </div>
        <!--FOR LOCALHOST-->
       <!--  <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" controls>
                <source src="videos/ea2017.MP4"  type="video/mp4">
            </video>
        </div> -->
    </div>
</div><!--iziModal -->



<div id="paymentTerms" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img src="img/logos/visacard.jpg" class="img-fluid card_1">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img src="img/logos/mastercard.jpg" class="img-fluid card_2">
        </div>
        <div id="payments_para" class="col-lg-3 col-md-4 col-sm-12">
            <h1 class="display-4">Shop with confidence and satisfaction in just a few clicks.</h1>
            <div id="btn-payment" class="ui animated button" tabindex="0">
                <div class="visible content">Learn more.</div>
                <div class="hidden content trigger">
                    <i class="fa fa-credit-card-alt"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- iziMODAL PAYMENT SECTION -->
<div id="modal" data-iziModal-title="Online Payment is made so easy." data-iziModal-subtitle="Hyperion"
     data-iziModal-icon="icon-home"
     data-izimodal-transitionin="flipInX"
     data-izimodal-transitionout="comingOut">
    <div class="modal-inside">
        <p>Hyperion Company has been very trusted by many clients all over the world,
            we make sure that every transaction is secured.
        </p>
        <h6>&raquo; We accept only the following credit cards</h6>
        <ul>
            <li>Visa Card</li>
            <li>Visa (debit)</li>
            <li>Mastercard Card</li>
            <li>Mastercard (debit)</li>
            <li>Mastercard (prepaid)</li>
        </ul>
    </div>
</div><!--iziModal -->


<div id="fedex">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12 col-sm-12 fedexDetails">
                <p>
                    <span id="fed_word">Fedex</span> is one of the best partnership we had for distributing and delivering our
                    purchase items from single items up to a wholesaller company we could accept it
                    bravely with our best teams on board. because Fedex Express had the most wide
                    connection of delivery from trucks to Airplanes and they do it 24/7
                    they said the most busy airport in the world.
                </p>
                <p>
                    The FedEx strategy to compete collectively and operate independently
                    provides a competitive advantage for our company. Our broad portfolio of
                    services allows us to meet the needs of our customers, most of whom use
                    services from two or more of our operating companies. FedEx Express invented
                    express distribution and remains the industry's global leader, providing rapid,
                    reliable, time-definite delivery to more than 220 countries and territories.
                </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img src="img/logos/fedex_logo.png" alt="logo" class="img-fluid">
                <img src="img/fedex_trucks.jpg" alt="trucks" class="img-fluid">
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img src="img/gif/airplane.gif" alt="airplane" class="img-fluid">
                <p class="fedexLinks">You can visit the official website here
                    <a href="www.fedex.com" target="_blank">www.fedex.com</a>
                </p>
            </div>
        </div>
    </div>
</div>



<div id="storeMap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="img/map.jpg" class="img-fluid">
                <div class="mapText">
                    <h4>Visit our store:</h4>
                    <p><i class="fa fa-map-marker"></i> Fairview Terraces 3rd flr. Quirino Hi-way, Novaliches,
                        <br> Quezon City, 1118 Metro Manila
                    </p>
                    <p><i class="fa fa-phone"></i> (02) 956 3888</p>
                </div>
            </div>
             <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- MOBILE VIEWPORT ONLY-->
                <div id="smallMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.5847730828546!2d121.0582675701132!3d14.736052277212986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b068fbc84615%3A0x3b73d5e307721e90!2sFairview+Terraces!5e0!3m2!1sen!2sph!4v1519526458259" width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>    
                <!-- TABLET VIEWPORT ONLY-->
                <div id="mediumMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.5847730828546!2d121.0582675701132!3d14.736052277212986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b068fbc84615%3A0x3b73d5e307721e90!2sFairview+Terraces!5e0!3m2!1sen!2sph!4v1519526458259" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>    
                <!--LARGE VIEWPORT ONLY-->
                <div id="largeMap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.5884591098893!2d121.05797931408601!3d14.73584417770035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b068fbc84615%3A0x3b73d5e307721e90!2sFairview+Terraces!5e0!3m2!1sen!2sph!4v1519523641436" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- CONTACT SECTION HERE -->

<div id="comment-section">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <form id="form-comment" method="post">
                <div class="form-group">
                    <label><i class="fa fa-user-circle-o"></i> Name</label>
                    <input name="nameCom" type="text" class="form-control" value="<?php echo $nameCom; ?>">
                    <span class="error"><?php echo $nameComErr; ?></span>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input name="emailCom" type="email" class="form-control" value="<?php echo $emailCom; ?>">
                    <span class="error"><?php echo $emailComErr; ?></span>
                </div>

                <div class="form-group">
                    <label><i class="fa fa-comment"></i> Leave your comments here.</label>
                    <textarea name="messageCom" class="form-control" rows="4" value="<?php echo $messageCom; ?>"></textarea>
                    <span class="error"><?php echo $messageComErr; ?></span>
                </div>
                <input type="submit" name="btnCom" class="btn btn-outline-info btn-block btnCom" value="submit">
            </form>
        </div>
    </div>
</div>


<!--- FOOTER SECTION OF THE PAGE -->
<div id="footer">
    <div class="container-fluid footerIcons">
        <div class="row justify-content-center">
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://ph.linkedin.com/" target="_blank"><i class="fa fa-linkedin-square fa-3x"></i><p>Linkedin</p></a>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play fa-3x"></i><p>YouTube</p></a>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-square fa-3x"></i><p>Facebook</p></a>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-twitter fa-3x"></i><p>Twitter</p></a>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i><p>Pinterest</p></a>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6">
                <a href="https://www.instagram.com/?hl=en" target="_blank"><i class="fa fa-instagram fa-3x"></i><p>Instagram</p></a>
            </div>
        </div>
    </div>

    <div class="container-fluid footerInfo">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12 footerAddress">
                <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;21 Riverdale Town<br>
                    &nbsp;&nbsp; &nbsp;Zabarte, Philippines
                </p>
                <p><i class="fa fa-phone"></i>&nbsp;1800-1651-0525</p>
                <p><i class="fa fa-envelope"></i>&nbsp;info@hyperioncompany.com</p>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12 footerEmail">
                <p>&raquo; Be first to hear about our offers<br> and annoucements</p>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control" name="footerMail" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container rightsReserved">
        <div class="row">
            <div class="col-12">
                <p>Copyright &copy; 2018 Hyperion Company. All Rights Reserved | Developed by the Team of Programmers</p>
            </div>
        </div>
    </div>
</div><!-- FOOTER -->


<?php

    include 'footer.php';

?>


<script>

    // iziMODAL FOR GALLERY SECTION
    $("#gallery-01").iziModal();
    $(document).on('click', '.gallery-01', function (event) {
        event.preventDefault();
        $('#gallery-01').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-01').iziModal('setWidth', 800);
        $('#gallery-01').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-02").iziModal();
    $(document).on('click', '.gallery-02', function (event) {
        event.preventDefault();
        $('#gallery-02').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-02').iziModal('setWidth', 800);
        $('#gallery-02').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-03").iziModal();
    $(document).on('click', '.gallery-03', function (event) {
        event.preventDefault();
        $('#gallery-03').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-03').iziModal('setWidth', 800);
        $('#gallery-03').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-04").iziModal();
    $(document).on('click', '.gallery-04', function (event) {
        event.preventDefault();
        $('#gallery-04').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-04').iziModal('setWidth', 800);
        $('#gallery-04').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-05").iziModal();
    $(document).on('click', '.gallery-05', function (event) {
        event.preventDefault();
        $('#gallery-05').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-05').iziModal('setWidth', 800);
        $('#gallery-05').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-06").iziModal();
    $(document).on('click', '.gallery-06', function (event) {
        event.preventDefault();
        $('#gallery-06').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-06').iziModal('setWidth', 800);
        $('#gallery-06').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-07").iziModal();
    $(document).on('click', '.gallery-07', function (event) {
        event.preventDefault();
        $('#gallery-07').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-07').iziModal('setWidth', 800);
        $('#gallery-07').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-08").iziModal();
    $(document).on('click', '.gallery-08', function (event) {
        event.preventDefault();
        $('#gallery-08').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-08').iziModal('setWidth', 800);
        $('#gallery-08').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-09").iziModal();
    $(document).on('click', '.gallery-09', function (event) {
        event.preventDefault();
        $('#gallery-09').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-09').iziModal('setWidth', 800);
        $('#gallery-09').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-10").iziModal();
    $(document).on('click', '.gallery-10', function (event) {
        event.preventDefault();
        $('#gallery-10').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-10').iziModal('setWidth', 800);
        $('#gallery-10').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-11").iziModal();
    $(document).on('click', '.gallery-11', function (event) {
        event.preventDefault();
        $('#gallery-11').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-11').iziModal('setWidth', 800);
        $('#gallery-11').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });

    $("#gallery-12").iziModal();
    $(document).on('click', '.gallery-12', function (event) {
        event.preventDefault();
        $('#gallery-12').iziModal('open');
        //$('#gallery-01').iziModal('setZindex', 99999);
        //$('#gallery-01').iziModal('open', { zindex: 99999 });
        $('#gallery-12').iziModal('setWidth', 800);
        $('#gallery-12').iziModal('setHeaderColor', '#ea454b');
        //$('#gallery-01').iziModal('setBackground', 'dimgrey');
    });


    // MODAL FOR PAYMENT TERMS
    $("#modal").iziModal();
        $(document).on('click', '.trigger', function (event) {
            event.preventDefault();
            $('#modal').iziModal('open');
            $('#modal').iziModal('setZindex', 99999);
            $('#modal').iziModal('open', { zindex: 99999 });
            $('#modal').iziModal('setHeaderColor','#ea454b');
            //$('#modal').iziModal('setHeaderColor', '#ffe21f');
        });

    // MODAL FOR EVENT VIDEO
    $("#modal-event").iziModal();
    $(document).on('click', '.trigger-event', function (event) {
        event.preventDefault();
        $('#modal-event').iziModal('open');
        $('#modal-event').iziModal('setZindex', 99999);
        $('#modal-event').iziModal('open', { zindex: 99999 });
        $('#modal-event').iziModal('setHeaderColor', 'black');
    });

</script>

