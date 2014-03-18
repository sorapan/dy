<!DOCTYPE html>
<html>
<head>
<title>Hi,<?php echo $this->session->userdata('username')?></title>

    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/fontface.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/layout2/css/layout2.css"/>

    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url();?>asset/layout2/js/page_control.js"></script>
    <script src="<?php echo base_url();?>asset/layout2/js/ajax_upload.js"></script>

</head>
<body>

<script>

    $(document).on('click',' .rm_btn',function(){

        var r_u_ok = confirm("Are you sure?");
        if(r_u_ok) return true;
        else return false;

    });

</script>

<div id="sidebar">
    <a id="menu_button" style="font-size: 14px;color:lightblue;">Hello, <?php echo $this->session->userdata('username')?></a>
    <a id="menu_button" class="" href="<?php echo base_url()?>profile">- Profile</a>
    <a id="menu_button" class="upload_btn" href="">- Upload</a>
<!--    <a id="menu_button" href="">> Profile</a>-->
    <a id="menu_button" href="<?php echo base_url()?>filepage/logout">- Logout</a>
</div>
<div id="content">
<!--    <div id="header">File</div>-->

    <div id="filelist">

        <div id="header">
            <a style="float:left;color:lightblue;text-decoration:none;font-size: 30px;">BluCloud.com</a>
        </div>
<!--        <br><br><br>-->
        <table id="filelist_table">
            <tr>
                <th>Filename</th>
                <th>Filesize</th>
                <th>Date</th>
                <th>Remove</th>
            </tr>
        <?php

        if(!empty($fetchfile)){
            foreach($fetchfile as $row){

                echo "<tr>";
                echo "<td class='filename'>".str_replace('%20',' ',$row->filename)."<br>";
                echo "<a href='".base_url()."dl/".$row->hash."'  target='_blank' style='color:grey;font-size:10px'>Link to Download</a></td>";
                echo "<td>".$row->filesize."</td>";
                echo "<td>".date("H:i:s - d/M/Y",$row->date)."</td>";
                echo "<td><a class='rm_btn' style='color:red' href='".base_url()."delFile/".$row->id."'>Remove</a></td>";
                echo "</tr>";

            }
        }else{

            echo "<tr><td>NOTHING</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td></tr>";

        }

        ?>
        </table>

    </div>

</div>
<div id="upload_box">

    <div id="upload_header">
        <span id="close_upload_box" >Close</span>
    </div>


    <div id="upload_middle">
        <input type="file" class="file" multiple="multiple" style="display:none">
            <div id="upload_display">
                <div id="upload_list"></div>
            </div>
        </div>


    <div id="upload_bottom">
        <a href="" id="xcancel" style="background-color:darkred;float: right;margin-right: 250px;" class="button_style1">xCancel</a>
        <a href="" id="upload_btn" class="button_style1">^Upload</a>
        <a href="" id="add_btn" class="button_style1" onclick="$(' .file').click()">+Add</a>
    </div>

</div>
<div id="modal"></div>

</body>
</html>
