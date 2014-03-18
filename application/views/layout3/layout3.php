<!DOCTYPE html>
<html>
<head>
    <title><?php echo str_replace('%20',' ',$name);?></title>

    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/layout3/css/layout3.css">
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>

</head>
<body>

<div id="header">
<a href="<?php echo base_url();?>" style="font-size: 30px;margin:20px">BluCloud.com</a>
</div>


<?php $this->load->view($page) ?>


</body>
</html>