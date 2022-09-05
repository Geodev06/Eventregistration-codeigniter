<!DOCTYPE html>
<title>Forgot password</title>
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
                        <form action="<?php echo base_url();?>index.php/forgot/verify" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>E.R.M.S</h2>
                                    <p>Forgot password<p>
                                        <p style="font-size: 10px; color:rgb(90,90,90)">(let us verify first if the corresponding username and email will match to your account).</p>
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
                                    <input type="email" placeholder="e.g agnoteageo@yahoo.com" class="my-control" id="eml" name="email" autocomplete="off"/>
                                </div>
                                <div class="col-sm-12 col-md-12 pt-2">
                                        <input type="text" placeholder="username" name="user" autocomplete="off" class="my-control" id="usr" oninput="Show_Pass()"/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <p>not our member? <a href="<?php echo base_url();?>index.php/auth/register_form">Sign up here</a></p>
                                <p style="margin-top:-10px;">already member? <a href="<?php echo base_url();?>index.php/auth/login">login now</a></p>
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" value="Verify" class="my-btn"/>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>