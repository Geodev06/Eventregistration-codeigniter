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
        <li><a  href="<?php echo base_url().'index.php/dashboard'?>" id="home" data-toggle="tooltip" title="Dashboard" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/newsfeed'?>" id="news" data-toggle="tooltip" title="News feed" data-placement="right"></a></li>
        <li><a  class="active" href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard/Events</h6>
            <hr>
            <div class="row">
                <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Event Id</th>
                        <th>Event title</th>
                        <th>Target date</th>
                        <th>venue</th>
                        <th>Time duration</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  
                        $server ='127.0.0.1';
                        $user = 'root';
                        $pass = '';
                        $dbname = 'event_reg';
                        $db = mysqli_connect($server, $user, $pass, $dbname);
                        $qry ="SELECT event_id,title,target_date,place,duration from tbl_events where user_id = '".$_SESSION["user_id"]."'";
                        $result = mysqli_query($db, $qry);
                        if ($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr id='row'>
                            <td>". $row["event_id"]. "</td>
                            <td>". $row["title"]. "</td>
                            <td>" . $row["target_date"]. "</td>
                            <td> " . $row["place"]. "</td>
                            <td>" . $row["duration"]. "</td>
                            <td><form action =".base_url().'index.php/dashboard/cancel_evt'." method='post'>
                            <input type='hidden' value = '".$row["event_id"]."' name='txtid'>
                            " ."<input type='submit' class='btn btn-sm btn-danger' value='cancel'/>."."
                            </form></td>
                            </tr>";
                        }
                        } else {
                        echo "No Records found!";
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>