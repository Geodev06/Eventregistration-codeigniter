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
                        <form action="<?php echo base_url();?>index.php/forgot/verifyanswer" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>E.R.M.S</h2>
                                    <p>Forgot password<p>
                                    <h6 style="font-size: 12px; color :rgb(55,55,55)">Username : <?php echo $_SESSION["user_name"]?><h6>
                                    <p style="font-size: 12px; color :rgb(55,55,55)">Account Id : <?php echo $_SESSION["user_id_forgot"]?></p>
                                        <p style="font-size: 12px; color:rgb(90,90,90)">(We've detected that the account is existing please answer the security question now of this account).</p>
                                        <p style="font-size: 10px; color:rgb(90,90,90)">Security question : <?php echo $_SESSION["security_question"]?></p>
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
                                    <input type="text" placeholder="security answer" class="my-control" id="ans_r" name="answer" autocomplete="off"/>
                                </div>
                            </div>
                            <hr>
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