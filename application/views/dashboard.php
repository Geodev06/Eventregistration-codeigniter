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
        <li><a class="active" href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/sysinfo'?>" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard</h6>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    Search User Id E.g 1234-0987
                    <form action="<?php echo base_url();?>index.php/dashboard/search" method="post">
                        <input type ="text" placeholder="Search ID" id="txtsearch" name="txtsearch">
                        <input type="submit" id="btn_go" value="Go">
                    </form>
                </div>
                <div class="col-lg-6">
 
                </div>
                <br>
                <div class="col-sm-6 col-md-3">
                    <div class="card  my-card">
                        <div class="card-header text-white bg-violet">
                            <p>Announcements</p>
                            <div class="bullet"></div>
                            <div class="bullet_2"></div>
                        </div>
                        <div class="card-body">
                            <p class="lbl_">Total number of posts :<span class="no_">  <?php echo $_SESSION["post_count"];?></span></p>
                            <hr>
                            <a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>"><input type="button" class="btn-view" value="view"></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card my-card">
                        <div class="card-header text-white bg-violet">
                            <p>My Schedule</p>
                            <div class="bullet"></div>
                            <div class="bullet_3"></div>
                        </div>
                        <div class="card-body">
                            <p class="lbl_">Total number of sched :<span class="no_"> <?php  echo $_SESSION["my_sched"];?></span></p>
                            <hr>
                            <a href="<?php echo base_url().'index.php/dashboard/myevents'?>"><input type="button" class="btn-view" value="view"></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card my-card">
                        <div class="card-header text-white bg-violet">
                            <p>Friends</p>
                            <div class="bullet"></div>
                            <div class="bullet_4"></div>
                        </div>
                        <div class="card-body">
                            <p class="lbl_">Total number of my friends :<span class="no_"> <?php echo $_SESSION["friend_count"];?></span></p>
                            <hr>
                            <a href="<?php echo base_url().'index.php/dashboard/friendlist'?>"><input type="button" class="btn-view" value="view"></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card my-card">
                        <div class="card-header text-white bg-violet">
                            <p>Notification</p>
                            <div class="bullet"></div>
                            <div class="bullet_5"></div>
                        </div>
                        <div class="card-body">
                            <p class="lbl_">Total number of notifications :<span class="no_"> <?php echo $_SESSION["no_notification"];?></span></p>
                            <hr>
                            <a href="<?php echo base_url().'index.php/dashboard/notifications'?>"><input type="button" class="btn-view" value="view"></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>