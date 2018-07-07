<?php
    if (isset($_SESSION['email'])){

    $email = $_SESSION['email'];

    $query = mysqli_query($cn,"SELECT * FROM tbl_user WHERE email='$email' and account_type='2'");
    $result = mysqli_fetch_assoc($query);

    $db_first = $result['first_name'];

    }else{
        echo "<script>window.location.href='../login.php';</script>";
    }
?>

  <style>
      /* DESKTOP STYLE */
      #user_sidebar1{
          background-color: #00acc1;
      }
      #user_sidebar1 a:hover{
          background-color: crimson;
      }
      /* MOBILE STYLE */
      #user_sidebar2{
          background-color: #ffff00;
      }
      #user_sidebar2 a{
          color: black;
      }
      #user_sidebar2 a:hover{
          background-color: crimson;
      }
  </style>

  <div id="user_navigation">
        <div id="user_sidebar1" class='ui sidebar inverted vertical menu'>
            <img src="../img/user.gif" alt="" class="ui image">
            <a href='user_index.php' class='item'><i class="fa fa-home"></i> HOME</a>
            <a href='cart.php' class='item'><i class="fa fa-laptop"></i> LAPTOPS</a>
            <a href='checkout.php' class='item'><i class="fa fa-shopping-cart"></i> CHECK OUT</a>
            <a href='services.php' class='item'><i class="fa fa-phone"></i> SERVICES</a>
            <a href='../logout.php' class='item'><i class="fa fa-sign-out"></i> SIGN OUT</a>
        </div>

        <!--TOP FIXED NAVIGATION BAR -->
        <div id='user_navigation_top' class='ui basic icon top fixed inverted menu'>
            <a id='toggle_user01' class='item'>
                <i class='fa fa-bars'> MENU</i>
            </a>
            <a id="user_name" href="../logout.php" class='right item'>
                <i class="fa fa-sign-out"> <b>SIGN OUT</b></i>
            </a>
        </div>
  </div>

  <!--NAVIGATION ON MOBILE AND TABLETS-->

  <div id="user_navigation02">
        <div id="user_sidebar2" class='ui sidebar inverted vertical menu tiny'>
            <img src="../img/user.gif" alt="" class="ui image">
            <a href='user_index.php' class='item'><i class="fa fa-home"></i> HOME</a>
            <a href='cart.php' class='item'><i class="fa fa-laptop"></i> GALLERY</a>
            <a href='checkout.php' class='item'><i class="fa fa-shopping-cart"></i> CHECK OUT</a>
            <a href='services.php' class='item'><i class="fa fa-phone"></i> SERVICES</a>
            <a href='../logout.php' class='item'><i class="fa fa-sign-out"></i> SIGN OUT</a>
        </div>

        <!--TOP FIXED NAVIGATION BAR -->
        <div id='user_navigation_top' class='ui basic icon top fixed inverted menu'>
            <a id='toggle_user02' class='item'>
                <i class='fa fa-bars'> MENU</i>
            </a>
            <a id="user_name" href="../logout.php" class='right item'>
                <i class="fa fa-sign-out"><b>SIGN OUT</b></i>
            </a>
        </div>
  </div>


