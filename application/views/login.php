<!DOCTYPE html>
<title>Account login</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/login_style.css');?>"/>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/login.js"></script>
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4 col-sm-8 pt-5">

            </div>
            <div class="col-md-5 col-lg-4 pt-5 ">
                <div class="card shadow-lg">
                    <div class="card-header border-0 color_top">
                    </div>
                    <div class="card-body border-0">
                        <form action="<?php echo base_url();?>index.php/auth/login_process" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>E.R.M.S</h2>
                                    <p>Member login<p>
                                        <hr>
                                        <?php if($this->session->flashdata('true')){?>
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Information!</strong> <?php echo $this->session->flashdata('true');?>
                                            </div>
                                        <?php } ?> 
                                        <?php if($this->session->flashdata('login_f')){?>
                                            <div class="alert alert-danger shadow-lg alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>Information!</strong> <?php echo $this->session->flashdata('login_f');?>
                                            </div>
                                        <?php } ?> 
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" placeholder="username" class="my-control" id="usr" name="user" autocomplete="off"/>
                                </div>
                                <div class="col-sm-12 col-md-12 pt-2">
                                        <p id="show_pass" class="trans_1" onclick="See_pass()">show</p>
                                        <input type="password" placeholder="password" name="pass" autocomplete="off" class="my-control" id="pwd" oninput="Show_Pass()"/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                            <label class="container-c">remember me
                            <input type="checkbox"  name="remember_me">
                            <span class="checkmark"></span>
                            </label>
                            </div>
                            <div class="col-sm-12">
                                <p>not our member? <a href="<?php echo base_url();?>index.php/auth/register_form">Sign up here</a></p>
                                <p style="margin-top: -10px;"><a  href="<?php echo base_url();?>index.php/forgot/">I forgot my password</a></p>
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" value="login" class="my-btn"/>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>