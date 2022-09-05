<!DOCTYPE html>
<title>Account login</title>
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
        <li><a class="" href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="#news" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard</h6>
            <p>POST ID: <?php echo $_SESSION["post_id"];?></p>
            <b>Sender : <span class="text-success"><?php echo $_SESSION["post_sender"]?></span></b>
            <hr>
            <p>content :</p>
            <p><?php echo $_SESSION["post_content"];?></p>
            <hr>
            <P>comments : </p>
            <?php if($_SESSION["going"] == "pending"){?>
                <form action="<?php echo base_url();?>index.php/dashboard/joinevent" method="post">
                  <input type="hidden" value="accepted" name="request">
                    <input type="submit" value ="Going to this event" class="btn btn-sm btn-info mb-2">
                </form>  
            <?php } ?>
            <?php if($_SESSION["going"] == "yes"){?>
              <div class="alert alert-success alert-dismissible fade show">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Information!</strong> You already joined this event.
               </div>
            <?php } ?>
            <?php if($this->session->flashdata('true')){?>
               <div class="alert alert-success alert-dismissible fade show">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Information!</strong> <?php echo $this->session->flashdata('true');?>
               </div>
            <?php } ?> 
            <div id="comment_section" class="msg-box">
            </div>
            
            <script>
                
                function loadDoc(url) {
                  var xhttp;
                  xhttp=new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("comment_section").innerHTML =
                        xhttp.responseText;
                    }
                  };
                  var div = document.getElementById('comment_section');
                    div.scrollTop = 99999;
                  xhttp.open("GET", url, true);
                  xhttp.send();
                }
                function startTime() {
                    var t = setTimeout(startTime, 500);
                    var l = setInterval(loadDoc('<?php echo base_url().'index.php/dashboard/loadcomments'?>'),500);
                }
            </script>
            <div>
                <br>
                <form action="<?php echo base_url().'index.php/dashboard/insertcomment'?>" method="post">
                <input type="text" class="cmt" placeholder="comment here..." name="txtcomments" autocomplete="off"/>
                <input type="hidden" value="<?php echo $_SESSION["post_id"]?>" name="post_id" />
                <input type="submit" value ="go" class="btn-cmt"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>