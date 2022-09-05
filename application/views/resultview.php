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
            <h6>Dashboard/View Profile</h6>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12 ">
                <h1 id="avatar" class="shadow"><?php echo $_SESSION['s_acro'];?></h1>
                <p>Personal information</p><hr>
                <p>Name : <?php echo $_SESSION['s_fname'];?> <?php echo $_SESSION['s_mname'];?> <?php echo $_SESSION['s_lname'];?></p>
                <p>Gender : <?php echo $_SESSION['s_gender'];?></p>
                <p>contact no : <?php echo $_SESSION['s_contact'];?></p>
                <p>Email address : <?php echo $_SESSION['s_email'];?></p>
                <br>
                <p>Account information</p>
                <hr>
                <p>Account Id : <?php echo $_SESSION['s_id'];?></p>
                <hr>
                <?php if($_SESSION["status_"] == ""){?>
                    <form action="<?php echo base_url();?>index.php/dashboard/sendrequest" method="post">
                        <input type="hidden" value="pending" name="request">
                        <input type="submit" value ="Send friend request" class="btn btn-sm btn-primary">
                    </form>    
                <?php } ?>
                <?php if($_SESSION["friend_request_sent"] == "yes"){?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Information!</strong> Friend request sent!
                    </div> 
                <?php } ?>
                <?php if($_SESSION["accept_request"] == "yes"){?>
                    <form action="<?php echo base_url();?>index.php/dashboard/accept" method="post">
                        <input type="hidden" value="accepted" name="request">
                        <input type="submit" value ="Accept friend request" class="btn btn-sm btn-success">
                    </form>  
                <?php } ?>
                <?php if($_SESSION["accepted"] == "yes"){?>
                    <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Information!</strong> Your are already friends.
                    </div>  
                <?php } ?>
                
                <a id="btn_set" href="<?php echo base_url().'index.php/dashboard/accountsetting'?>">Go to my account privacy setting</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>