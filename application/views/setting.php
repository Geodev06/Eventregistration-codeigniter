<!DOCTYPE html>
<title>E.R.M.S</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/index.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/effects.css"/>
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
                    <a class="dropdown-item" href="<?php echo base_url().'index.php/dashboard/notifications'?>" id="lgt">notifications</a>
                  <a class="dropdown-item" href="<?php echo base_url().'index.php/auth/logout'?>" id="lgt">Sign out account</a>
                </div>
        </div>
    </div>
    <ul>
        <li><a  href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a  class="active" href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Profile/Account setting</h6>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12 ">
                <p>I want to change my password</p>
                <form action="<?php echo base_url();?>index.php/dashboard/changepass" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                        <hr>
                                        <?php if($this->session->flashdata('true')){?>
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Information!</strong> <?php echo $this->session->flashdata('true');?>
                                            </div>
                                        <?php } ?> 
                                       <div class="container">
                                       <?php if($this->session->flashdata('false')){?>
                                                <div class="my-div-error" id="my_div_error">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="mdl-container " id="mdl">
                                                                    <div class="text-center">
                                                                        <h1 class="pt-3 err_">Oops!</h1>
                                                                        <span class="cls-btn" id="cls_btn">&times;</span>
                                                                        <span class="circle_"></span>
                                                                        <div class="card border-0">
                                                                            <P class="msg-p pt-2"><?php echo $this->session->flashdata('false');?></p>
                                                                        </div>
                                                                        <div class="bg_plus">
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                            <span></span><span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                       </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <input type="password" placeholder="Old password" class="my-control" id="pwd" name="oldpass" autocomplete="off" />
                                </div>
                                <div class="col-sm-12 col-md-12 pt-2">
                                        <p id="show_pass" class="trans_1" style="display:none; padding-left:10px; margin:0; color:dodgerblue;" onclick="See_pass()">show</p>
                                        <input type="password" placeholder="New password" name="npass" autocomplete="off" class="my-control" id="pwd" oninput="Show_Pass()"/>
                                </div>
                                <div class="col-sm-12 col-md-12 pt-2">  
                                        <input type="password" placeholder="Confirmpassword" name="cpass" autocomplete="off" class="my-control" id="cpwd" oninput="checkpass()"/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6 pb-5">
                                <input type="submit" value="Save changes" class="btn btn-sm btn-success"/>
                            </div>
                </form>
         
                <a id="btn_set" href="<?php echo base_url().'index.php/dashboard/myprofile'?>">Back to profile</a> |  <a id="btn_set" href="<?php echo base_url().'index.php/dashboard'?>">Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>