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
<body onload="startTime()">
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
        <li><a href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a class="active"  href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard/View Profile</h6>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12">
                <p>You are now connected with : <b><?php echo $_SESSION["iddy"]; ?></b> <?php echo $_SESSION['s_fname'];?> <?php echo $_SESSION['s_mname'];?> <?php echo $_SESSION['s_lname'];?></p>    
                <div class="msg-box" id="divbox">
               
                </div>
                <script>
                
                function loadDoc(url) {
                  var xhttp;
                  xhttp=new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("divbox").innerHTML =
                        xhttp.responseText;
                    }
                  };
                  xhttp.open("GET", url, true);
                  xhttp.send();
                }
                function startTime() {
                    var div = document.getElementById('divbox');
                    div.scrollTop = 99999;
                    var t = setTimeout(startTime, 500);
                    var l = setInterval(loadDoc('<?php echo base_url().'index.php/dashboard/loadchats'?>'),500);
                }
            </script>
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border-0">
                                    <div class="pt-4">
                                        <form action="<?php echo base_url().'index.php/dashboard/send'?>" method="post">
                                        <textarea id="txtmessage" placeholder="Your message here" name="txtmessage"></textarea>
                                        <br>
                                         <input type="submit" class="btn-view_p" value="send"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <a id="btn_set" href="<?php echo base_url().'index.php/dashboard/accountsetting'?>">Go to my account privacy setting</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>