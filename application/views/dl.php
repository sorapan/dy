

<div id="middle_box">
    <span>Filename : <?php echo str_replace('%20',' ',$name);?></span><br>
    <span>Author : <?php echo $username;?></span><br>
    <span>Size : <?php echo $filesize;?></span><br>
    <span>On : <?php echo date("d/M/Y",$date);?></span><br>
    <br>
<a href="<?php echo base_url().'tofile/'.$hash.'/'.$filepath?>">Download</a>
</div>
