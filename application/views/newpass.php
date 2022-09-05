<!DOCTYPE html>
<title>Setting new password</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/login_style.css');?>"/>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/login.js"></script>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4 col-sm-8 pt-5">
            </div>
            <div class="col-md-5 col-lg-4 pt-5 ">
                <div class="card shadow-lg">
                    <div class="card-header border-0 color_top">
                    </div>
                    <div class="card-body border-0 bg-dark text-white">
                        <form action="<?php echo base_url();?>index.php/forgot/resetpassword" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 style="color:gainsboro">Setting up with your new password</h6>
                                        <p>Please provide new password</p>
                                        <hr>
                                        <h6 style="font-size: 12px; color : springgreen">Username : <?php echo $_SESSION["user_name"]?><h6>
                                    <p style="font-size: 12px; color : springgreen">Account Id : <?php echo $_SESSION["user_id_forgot"]?></p>
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
                                    <input type="password" placeholder="New password" class="my-control" id="pwd" name="Npass" autocomplete="off"/>
                                </div>
                                <div class="col-sm-12 col-md-12 pt-2">
                                        <input type="password" placeholder="Confirm password" name="Cpass" autocomplete="off" class="my-control" id="pwd" oninput="Show_Pass()"/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6">
                                <input type="submit" value="Save changes" class="my-btn"/>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>