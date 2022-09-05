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
<body onload="startTime()" >
    <div class="navbar my-color sticky-top">
        <h5 class="my-font"><u>Event Registration System</u><br><p style="font-size: 9px;">Semicolon;</p></h5>
        <h5 class="my-font-2" id="title_"><u>Event Registration System</u><br><p style="font-size: 9px;">Semicolon;</p></h5>
        <div id="profile">
           <p id="acrnym" class="dropdown"><?php echo $_SESSION['acro'];?></p>
           <p id="name" class="dropdown-toggle" data-toggle="dropdown">Good day!<u><br><?php echo $_SESSION['fullname'];?></u></p>
                <div class="dropdown-menu border-0 trans_1" id="drpm">
                    <a class="dropdown-item" href="<?php echo base_url().'index.php/dashboard/myprofile'?>" id="lgt">Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url().'index.php/dashboard/notifications'?>" id="lgt">notifications  <span class="badge bg-danger"> <?php echo $_SESSION["no_notification"];?></span></a>
                  <a class="dropdown-item" href="<?php echo base_url().'index.php/auth/logout'?>" id="lgt">Sign out account</a>
                </div>
        </div>
    </div>
    <ul>
        <li><a  href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a class="active" href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/myprofile'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>News feed</h6>
            <div class="row">     
                <button class="btn-post" data-toggle="modal" data-target="#myModal">Post something</button>  
            </div>
            <p>date:</p>
            <?php if($this->session->flashdata('true')){?>
                <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Information!</strong> <?php echo $this->session->flashdata('true');?>
                </div>
            <?php } ?> 
            <?php if($this->session->flashdata('login_f')){?>
                <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Information!</strong> <?php echo $this->session->flashdata('login_f');?>
                </div>
            <?php } ?> 
            <hr>
            <p id="txt"></p>
            <div id="divf">

            </div>
            <script>
                
                function loadDoc(url) {
                  var xhttp;
                  xhttp=new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("divf").innerHTML =
                        xhttp.responseText;
                    }
                  };
                  xhttp.open("GET", url, true);
                  xhttp.send();
                }
                function startTime() {
                    var today = new Date();
                    document.getElementById('txt').innerHTML =
                    today.toLocaleTimeString();

                    var t = setTimeout(startTime, 500);
                    var l = setInterval(loadDoc('<?php echo base_url().'index.php/dashboard/loadfeed'?>'),500);
                }
                function check_form()
                {
                    var div_form = document.getElementById('d_form');
                    var ck = document.getElementById('ck');

                    if(ck.checked)
                    {
                      ck.value = "checked";
                      div_form.style.display = "block";
                    }
                    else
                    {
                      ck.value = "not checked";
                      div_form.style.display = "none";
                    }
                    
                }
            </script>
            
        </div>
    </div>
    <div class="container">
            <!-- The Modal -->
            <div class="modal trans_1" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content  my-card">
                
                  <!-- Modal Header -->
                  <div class="modal-header bg-violet text-white">
                    <h4 class="modal-title pt-1">Compose</h4>
                    <div class="bulletx"></div>
                    <div class="bulletxx"></div>
                    <div class="bulletxx2"></div>
                    <div class="bulletxxx"></div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <p class="lbl_">Reminder : please be careful on your posts.</p>
                                        <form action="<?php echo base_url().'index.php/dashboard/post'?>" method="post">
                                        <textarea id="txtpost" placeholder="what's on your mind?" name="txtcontent"></textarea>
                                        <br>
                                        <hr>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"  id="ck" onclick="check_form()" name="check_box">Make this post an scheduled event.
                                          </label>
                                        </div>
                                        <br>
                                        <div id="d_form" style="display:none;">
                                        Event info<br>Title/Date/where/duration
                                          <div class="col-sm-12">
                                              <input type="text" class="my-control" placeholder="Title" name="title" autocomplete="off" />
                                          </div>
                                          <br>
                                          <div class="col-sm-12">
                                              <input type="date" class="my-control" id="pwd" name="date" autocomplete="off" />
                                          </div>
                                          <br>  
                                          <div class="col-sm-12">
                                              <input type="text" class="my-control" placeholder="where" name="place" autocomplete="off" />
                                          </div>
                                          <br>  
                                          <div class="row">
                                            <div class="col-sm-2">
                                            <span>From <input type="time" class="tmi" placeholder="duration" name="from" autocomplete="off" /></span>
                                            </div>

                                            <div class="col-sm-2">
                                            <span>To <input type="time" class="tmi" placeholder="duration" name="to" autocomplete="off" /></span>
                                            </div>
                                          </div>
                                          <hr>
                                        </div>
                                         <input type="submit" class="btn-view_p" value="post"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
</body>
</html>