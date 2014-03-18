<!DOCTYPE html>
<html>
<head>
    <title>bluCloud</title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/layout1/css/rb04.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/layout1/css/style1.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/layout1/css/animate.css">
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url();?>asset/layout1/js/rb04.js"></script>
    <script src="<?php echo base_url();?>asset/layout1/js/index.js"></script>
    <script src="<?php echo base_url();?>asset/layout1/js/animate.js"></script>
    <script>
        $(function(){

            $.rbscroll({
                pageType : ".section",
                timer : 800
            });

        });

    </script>
</head>
<body>

<div id="header">

    <div id="head">
        bluCloud.com
    </div>

    <div id="menu">

        <a href="" class="button1 signup">Sign up</a>
        <a href="" class="button1 signin">Log in</a>

    </div>


    <script>
        $(" #submit").click(function(e){
            e.preventDefault();
            window.location = "/filepage";
        });
    </script>

</div>
<section class="section" id="page1">

    <div id="window"></div>
    <span class="txt">Welcome to bluCloud</span>

</section>
<section class="section" id="page2">

    <div class="uploadpage">

        <div class="uu" id="u6" style="left:500%;background-image:url('asset/layout1/img/u1.png')"></div>
        <div class="uu" id="u5" style="left:400%;background-image:url('asset/layout1/img/u5.png')"></div>
        <div class="uu" id="u4" style="left:300%;background-image:url('asset/layout1/img/u4.png')"></div>
        <div class="uu" id="u3" style="left:200%;background-image:url('asset/layout1/img/u3.png')"></div>
        <div class="uu" id="u2" style="left:100%;background-image:url('asset/layout1/img/u2.png')"></div>
        <div class="uu" id="u1" style="left:0;background-image:url('asset/layout1/img/u1.png')"></div>

    </div>

    <span class="txt">Easily to Upload</span>

</section>
<section class="section" id="page3">

    <span class="txt">Join us now! ><a href="" onclick="event.preventDefault();" class="signup">Click here</a><</span>

</section>

<div id="login_window">
    <a id="signup_back" href="" style="font-size:12px;white-space: nowrap;color:#003366;margin: 5px">Back >></a>
    <h2 style="position:absolute;white-space: nowrap;margin-left:20px;top:50px">Login</h2>

    <?php echo form_open('checklogin'); ?>

        <div style="width:150px;position:absolute;top: 150px;margin-left: 20px">
        <label for="login_user">Username :</label><br>
        <label for="login_pass">Password :</label><br>
        </div>
        <div style="position:absolute;top: 150px;margin-left: 170px">
        <input name="lg_user" type="text" id="login_user"><br>
        <input name="lg_pass" type="password" id="login_pass"><br>
        </div>
        <button style="position:absolute;top:250px;margin-left:20px;" id="submit" type="submit">Submit</button>

    </form>

</div>

<div id="signup_window">
    <a id="signup_back" href="" style="font-size:12px;white-space: nowrap;color:#003366;margin: 5px">Back >></a>
    <h2 style="position:absolute;white-space: nowrap;margin-left:20px;top:50px">Create Your Account</h2>

    <?php echo form_open('created_user'); ?>
        <div style="width:150px;position:absolute;top: 150px;margin-left: 20px">
        <label for="user">Username :</label><br>
        <label for="pass">Password :</label><br>
        <label for="retry_pass">Retry Password :</label><br>
        <label for="email">Email :</label><br>
        </div>
        <div style="position:absolute;top: 150px;margin-left: 170px">
        <input name="user" type="text" id="user"><br>
        <input name="pass" type="password" id="pass"><br>
        <input name="pass2"  type="password" id="retry_pass"><br>
        <input name="email" type="email" id="email"><br>
        </div>
        <button id="create_id" style="position:absolute;top:300px;margin-left:20px;" type="submit">Submit</button>
    </form>
</div>

<div id="alertbox_x">x</div>
<div id="alertbox">
    <span style="color:<?php echo $this->session->flashdata('color')?>"><?php echo $this->session->flashdata('alertbox')?></span>
</div>


</body>
</html>