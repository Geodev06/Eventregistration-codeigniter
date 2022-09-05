<!DOCTYPE html>
<title>E.R.M.S</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/index.css"/>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/popper.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/login.js"></script>
</head>
<body>
    <div class="navbar my-color sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <h5 class="my-font" id="title_"><u>Event Registration System</u><br><p style="font-size: 9px;">Semicolon;</p></h5>
                <h5 class="my-font-2" id="title_"><u>Event Registration System</u><br><p style="font-size: 9px;">Semicolon;</p></h5>
                </div>
            </div>
        </div>
        <div id="profile">
           <p id="acrnym" class="dropdown"><?php echo $_SESSION['acro'];?></p>
           <p id="name" class="dropdown-toggle" data-toggle="dropdown">Good day!<u><br><?php echo $_SESSION['fullname'];?></u></p>
                <div class="dropdown-menu border-0 trans_1" id="drpm">
                    <a class="dropdown-item" href="<?php echo base_url().'index.php/dashboard/myprofile'?>" id="lgt">Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url().'index.php/dashboard/notifications'?>" id="lgt">notifications <span class="badge bg-danger"> <?php echo $_SESSION["no_notification"];?></span></a>
                  <a class="dropdown-item" href="<?php echo base_url().'index.php/auth/logout'?>" id="lgt">Sign out account</a>
                </div>
        </div>
    </div>
    <ul>
        <li><a class="" href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard/Profile</h6>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12 ">
                <h1 id="avatar" class="shadow"><?php echo $_SESSION['acro'];?></h1>
                <p>Personal information</p><hr>
                <p>Name : <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['mname'];?> <?php echo $_SESSION['lname'];?></p>
                <p>Gender : <?php echo $_SESSION['gender'];?></p>
                <p>contact no : <?php echo $_SESSION['contact_no'];?></p>
                <p>Email address : <?php echo $_SESSION['email'];?></p>
                <br>
                <p>Account information</p>
                <hr>
                <p>My Account Id : <?php echo $_SESSION['user_id'];?></p>
                <hr>
                <a id="btn_set" href="<?php echo base_url().'index.php/dashboard/accountsetting'?>">Go to Account Privacy setting</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>