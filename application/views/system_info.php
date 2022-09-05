<!DOCTYPE html>
<title>Account login</title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/index.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/vendor/fontawesome-free/css/all.min.css"/>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/popper.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/login.js"></script>
    <style>
    /* Center website */
.main {
    max-width: 1000px;
    margin: auto;
}

h1 {
    font-size: 50px;
    word-break: break-all;
}

.row {
    margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
    padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
}

/* Clear floats after rows */ 
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Content */
.content {
    background-color: white;
    padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
    .column {
        width: 50%;
    }
}
* {
    box-sizing: border-box;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}
</style>
</head>
<body>
    <div class="navbar my-color sticky-top">
        <div class="container">
            <div class="">
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
        <li><a href="<?php echo base_url().'index.php/dashboard/myevents'?>" id="events" data-toggle="tooltip" title="Events" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/friendlist'?>" id="chats" data-toggle="tooltip" title="Message" data-placement="right"></a></li>
        <li><a href="<?php echo base_url().'index.php/dashboard/accountsetting'?>" id="setting" data-toggle="tooltip" title="Account setting" data-placement="right"></a></li>
        <li><a href="#about" id="info" data-toggle="tooltip" title="System information" data-placement="right"></a></li>
      </ul>
    <div style="margin-left:50px;padding:5px 16px; width:auto;">
        <div class="p-5" id="dash_panel">
            <h6>Dashboard</h6>
            <hr>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-lg-12 ">
                    <div class="main">

                    <h3>Creator</h3>
                    <hr>
                    <!-- Portfolio Gallery Grid -->
                    <div class="row">
                    <div class="column">
                        <div class="content">
                        <img src="<?php echo base_url().'css/ageo1.jpg'?>"  style="max-width:100%; max-height: 100%; ">
                        <p>Ageo agnote vallar</p>
                        <p><u>Laguna state polytechnic university san pablo city campus</u><br>Bachelor of science in computer science</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fas fa-fire fa-4x text-danger"></p>
                        <h3>Framework used</h3>
                        <p>Codeigniter 3.0 </p>
                        <p>CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fab fa-bootstrap fa-4x text-danger"></p>
                        <h3>Framework used</h3>
                        <p>Bootstrap 4 </p>
                        <p>Bootstrap is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first websites.<br>
                        Bootstrap is completely free to download and use!</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="content">
                        <p class="fab fa-html5 fa-5x text-danger"></p>
                        <h3>HTML5</h3>
                        <p>HTML is the standard markup language for creating Web pages.
                        HTML stands for Hyper Text Markup Language
                        HTML describes the structure of Web pages using markup
                        HTML elements are the building blocks of HTML pages
                        HTML elements are represented by tags
                        HTML tags label pieces of content such as "heading", "paragraph", "table", and so on
                        Browsers do not display the HTML tags, but use them to render the content of the page</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fab fa-css3 fa-5x text-danger"></p>
                        <h3>CSS3</h3>
                        <p>CSS stands for Cascading Style Sheets
                        CSS describes how HTML elements are to be displayed on screen, paper, or in other media
                        CSS saves a lot of work. It can control the layout of multiple web pages all at once
                        External stylesheets are stored in CSS files</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fab fa-js fa-5x text-danger"></p>
                        <h3>JAVASCRIPT</h3>
                        <p>Why Study JavaScript?
                            JavaScript is one of the 3 languages all web developers must learn:<BR>
                            1. HTML to define the content of web pages<br>
                            2. CSS to specify the layout of web pages<br>
                            3. JavaScript to program the behavior of web pages<br><hr>
                            JavaScript and Java are completely different languages, both in concept and design.
                            JavaScript was invented by Brendan Eich in 1995, and became an ECMA standard in 1997.
                            ECMA-262 is the official name of the standard. ECMAScript is the official name of the language.</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fab fa-php fa-5x text-danger"></p>
                        <h3>PHP</h3>
                        <p>
                        PHP is an acronym for "PHP: Hypertext Preprocessor"
                        PHP is a widely-used, open source scripting language
                        PHP scripts are executed on the server
                        PHP is free to download and use.<BR>
                        HP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.
                        PHP is a widely-used, free, and efficient alternative to competitors such as Microsoft's ASP.</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <p class="fas fa-database fa-5x text-danger"></p>
                        <h3>SQL</h3>
                        <p>
                        SQL is a standard language for storing, manipulating and retrieving data in databases.
                        Our SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems</p>
                        </div>
                    </div>
                    
                    <!-- END GRID -->
                    </div>

                    <div class="content">
                    <div class="column">
                        <div class="content">
                        <img src="<?php echo base_url().'css/ageo.jpg'?>"  style="max-width:100%; max-height: 100%;">
                        <p>Ageo agnote vallar</p>
                        <p><u>Laguna state polytechnic university san pablo city campus</u><br>Bachelor of science in computer science</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <img src="<?php echo base_url().'css/1.jpg'?>"  style="max-width:100%; max-height: 100%;">
                        <p>Ageo agnote vallar</p>
                        <p><u>Laguna state polytechnic university san pablo city campus</u><br>Bachelor of science in computer science</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <img src="<?php echo base_url().'css/2.jpg'?>"  style="max-width:100%; max-height: 100%;">
                        <p>Ageo agnote vallar</p>
                        <p><u>Laguna state polytechnic university san pablo city campus</u><br>Bachelor of science in computer science</p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                        <img src="<?php echo base_url().'css/3.jpg'?>"  style="max-width:100%; max-height: 100%;">
                        <p>Ageo agnote vallar</p>
                        <p><u>Laguna state polytechnic university san pablo city campus</u><br>Bachelor of science in computer science</p>
                        </div>
                    </div>
                   
                    </div>

                    <!-- END MAIN -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>