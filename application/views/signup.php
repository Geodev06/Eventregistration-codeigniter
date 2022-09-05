<!DOCTYPE html>
<title>Account registration</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/login_style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/effects.css"/>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/login.js"></script>
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-3 col-sm-8 pt-5">
            </div>
            <div class="col-md-12 col-lg-5 pt-5">
                <div class="card shadow-lg">
                    <div class="card-header border-0 color_top">
                    </div>
                    <div class="card-body border-0">
                        <form action="<?php echo base_url();?>index.php/auth/register_process" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Member registration<p>
                                        <hr>
                                        <p>Personal information</p>
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
                                <div class="col-sm-4">
                                    <p class="lbl-frm1">Firstname</p>
                                    <input type="text" placeholder="e.g juan" class="my-control-signup" id="fn" autocomplete="off" name="fn" value="<?php echo $this->session->flashdata('fname');?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <p class="lbl-frm2">Middlename</p>
                                    <input type="text" placeholder="(optional)" class="my-control-signup" id="mn" autocomplete="off" name="mn" value="<?php echo $this->session->flashdata('mname');?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <p class="lbl-frm3">Lastname</p>
                                    <input type="text" placeholder="e.g dela cruz" class="my-control-signup" id="ln" autocomplete="off" name="ln" value="<?php echo $this->session->flashdata('lname');?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <p class="lbl-frm4">Gender</p>
                                </div>
                                <div class="col-sm-4">
                                    <label class="container-r">Male
                                        <input type="radio" checked="checked" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                        <label class="container-r">Female
                                            <input type="radio" name="gender" value="Female">
                                                <span class="checkmark"></span>
                                        </label>
                                </div>
                                <div class="col-sm-4 pic1">
                                </div>
                                <div class="col-sm-8">
                                    <p class="lbl-frm5">Mobile number</p>
                                    <input type="number" placeholder="e.g +63278032797" class="my-control-signup" id="no_" autocomplete="off" name="no_" value="<?php echo $this->session->flashdata('contact');?>"/>
                                </div>
                                <div class="col-sm-4 pic2"></div>
                                <div class="col-sm-8">
                                    <p class="lbl-frm6">Email address</p>
                                    <input type="email" placeholder="e.g juan_delacruz@gmail.com" class="my-control-signup" id="email_" autocomplete="off" name="email" value="<?php echo $this->session->flashdata('email');?>"/>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    Account information
                                </div>
                                <div class="col-sm-4 user"></div>
                                <div class="col-sm-8">
                                    <p class="lbl-frm7">Username</p>
                                    <input type="text" placeholder="e.g juan_delacruz123" class="my-control-signup" id="user" autocomplete="off" name="user" value="<?php echo $this->session->flashdata('user');?>"/>
                                </div>
                                <div class="col-sm-4 pass"></div>
                                <div class="col-sm-8">
                                    <p class="lbl-frm8">Password</p>
                                    <input type="password" placeholder="" class="my-control-signup" id="pass" autocomplete="off" name="pass" value="<?php echo $this->session->flashdata('pass');?>"/>
                                </div>
                                <div class="col-sm-4 pass2"></div>
                                <div class="col-sm-8">
                                    <p class="lbl-frm9">Confirm-password</p>
                                    <input type="password" placeholder="" class="my-control-signup" id="cpass" autocomplete="off" name="cpass" value="<?php echo $this->session->flashdata('cpass');?>"/>
                                </div>
                                <div class="col-sm-12">
                                        <p class="lbl-frm10">Security question</p>
                                        <select class="my-control-signup" id="cbq" name="cbq">
                                            <option>Choose one</option>
                                            <option>Who is your father?</option>
                                            <option>What is your mother's nickname?</option>
                                            <option>What is your childhood's nickname?</option>
                                            <option>Where is your birthplace</option>
                                            <option>What is favorite programming language?</option>
                                            <option>What is your strengh?</option>
                                            <option>What is your weakness?</option>
                                            <option>What is your favorite actor?</option>
                                            <option>Backup string.</option>  
                                        </select>
                                </div>
                                <div class="col-sm-12">
                                        <p class="lbl-frm11">Answer</p>
                                        <input type="text" placeholder="" class="my-control-signup" id="ans" autocomplete="off" name="ans" value="<?php echo $this->session->flashdata('ans');?>"/>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <p>already a member? <a href="<?php echo base_url();?>index.php/auth/login">login now</a></p>
                            </div>
                            <div class="col-sm-6">
                            
                                <input type="submit" value="Sign up" class="my-btn"/>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="footer p-5">

        </div>
    </div>
</body>
</html>