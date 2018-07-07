<!-- ADMINISTRATOR NAVIGATION BAR  -->
<style>
    /* DESKTOP NAVIGATION */
    #admin-navigation .menu{
        background-color: #000000;
    }
    #admin-navigation .menu a{
        color: #ffff00;
    }
    #admin-navigation .menu a:hover{
        background-color:  #ffff00;
        font-weight: 600;
        color: black;
    }
    /* TABLETS NAVIGATION */
    #sidebar-02{
        width: 200px;
        background-color: #00acc1;
    }

    #sidebar-02 a:hover{
        background-color: #1d2129;
    }
    /* MOBILE NAVIGATION */
    #sidebar-03{
        background-color: #db4437;
    }
    #sidebar-03 a:hover{
        background-color: #1d2129;
    }

    /* SMS DROPDOWN STYLE */
    #dropdownSMS button:nth-child(1){
        color: white;
        text-decoration: none;
        font-weight: 600;
    }
    #dropdownSMS button:nth-child(1):hover{
        text-decoration: none;
        color: #ffff00;
    }
    #dropdownSMS .dropdown-menu{
        border-radius: 0 0 10px 10px;
        color:  #ffff00;
        background-color: rgba(0,0,0,.7);
        padding: 15px;
        width: 240px;
    }
    #dropdownSMS .dropdown-menu form label{
        font-weight: 600;
    }
</style>

<!-- TOP NAVIGATION BAR -->
<nav id="admin-top-nav" class="fixed-top navbar navbar-expand-lg navbar-toggleable-sm navbar-inverse">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myContent">
        <i class="fa fa-bars"></i>
    </button>
    <a  href="#" class="navbar-brand hidden-md-down"><i class="fa fa-user-circle-o"></i> ADMINISTRATOR</a>

    <div class="collapse justify-content-end navbar-collapse" id="myContent">
        <div class="navbar-nav">
            <?php
                //SMS DROPDOWN
                if(isset($sendingSMSDropdown)){

                      echo  $sendingSMSDropdown;
                }
            ?>
            <a class="nav-item nav-link" href="setting"><i class="fa fa-gears"></i> setting</a>
            <a class="nav-item nav-link" href="../logout.php"><i class="fa fa-sign-out"></i> log out</a>
        </div>
    </div>
</nav>


<!-- FOR DESKTOP VIEWPORT-->
<div id="admin-navigation">
    <div class="ui visible sidebar inverted vertical fixed menu">
        <a href="index" class="item"><i class="fa fa-home"></i></a>
        <img src="../img/laptop.gif" alt="" class="ui image">
        <a href="index" class="item"><i class="fa fa-home"></i> HOME</a>
        <a href="inventory" class="item"><i class="fa fa-table"></i> INVENTORY</a>
        <a href="retriever" class="item"><i class="fa fa-users"></i> USERS</a>
        <a href="tech_support" class="item"><i class="fa fa-gears"></i> TECH SUPPORT</a>
        <a href="com_records" class="item"><i class="fa fa-commenting"></i> COMMENTS</a>
        <a href="orders" class="item"><i class="fa fa-bar-chart"></i> ORDERS</a>
    </div>
</div>


<!-- FOR TABLETS  VIEWPORT-->
<div id="admin-navigation-02">
    <div id="sidebar-02" class="ui sidebar inverted vertical fixed menu">
        <img src="../img/logos/logo.jpg" alt="" class="ui image">
        <a href="index" class="item"><i class="fa fa-home"></i> HOME</a>
        <a href="inventory" class="item"><i class="fa fa-table"></i> INVENTORY</a>
        <a href="retriever" class="item"><i class="fa fa-users"></i> USERS</a>
        <a href="tech_support" class="item"><i class="fa fa-gears"></i> TECH SUPPORT</a>
        <a href="com_records" class="item"><i class="fa fa-commenting"></i> COMMENTS</a>
        <a href="orders" class="item"><i class="fa fa-bar-chart"></i> ORDERS</a>
        <a href="setting" class="item"><i class="fa fa-gears"></i> SETTING</a>
        <a href="../logout.php" class="item"><i class="fa fa-sign-out"></i> LOG OUT</a>
    </div>

    <!--TOP FIXED NAVIGATION BAR -->
    <div id='user_navigation_top' class='ui basic icon top fixed inverted menu mini'>
        <a id='toggle-02' class='item'>
            <i class='fa fa-bars'> MENU</i>
        </a>
        <a id="user_name" class='active right item'>
            <i class='fa fa-user-circle-o'></i>
        </a>
    </div>
</div>

<!-- FOR MOBILE VIEWPORT-->

<div id="admin-navigation-03">
    <div id="sidebar-03" class="ui sidebar inverted vertical fixed menu mini">
        <img src="../img/logos/logo.jpg" alt="" class="ui image">
        <a href="index" class="item"><i class="fa fa-home"></i> HOME</a>
        <a href="inventory" class="item"><i class="fa fa-table"></i> INVENTORY</a>
        <a href="retriever" class="item"><i class="fa fa-users"></i> USERS</a>
        <a href="tech_support" class="item"><i class="fa fa-gears"></i> TECH SUPPORT</a>
        <a href="com_records" class="item"><i class="fa fa-commenting"></i> COMMENTS</a>
        <a href="retriever" class="item"><i class="fa fa-gears"></i> SERVICES</a>
        <a href="orders" class="item"><i class="fa fa-bar-chart"></i> ORDERS</a>
        <a href="setting" class="item"><i class="fa fa-gears"></i> SETTING</a>
        <a href="../logout.php" class="item"><i class="fa fa-sign-out"></i> LOG OUT</a>
    </div>

    <!--TOP FIXED NAVIGATION BAR -->
    <div id='user_navigation_top' class='ui basic icon top fixed inverted menu mini'>
        <a id='toggle-03' class='item'>
            <i class='fa fa-bars'> MENU</i>
        </a>
        <a id="user_name" class='active right item'>
            <i class='fa fa-user-circle-o'></i>
        </a>
    </div>
</div>


