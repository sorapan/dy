<style>


    #profile{

        position: relative;
        line-height: 30px;
        color: white;
        background-color: #2E3E4D;
        padding: 10px;
        width: 500px;
        font-size: 14px;
        margin: 200px auto auto auto;

    }

    input{

        position: absolute;
        left: 200px;
        width: 200px;
        margin-top: 4px;

    }

</style>

<div id="profile">

    Username : <?php echo $this->session->userdata('username')?>

    <br><br>
    <span>Change a password?</span>
    <div id="password_form">

        <form method="post" action="<?php echo base_url()?>chk_profile">
            <label for="pass">Old Password : </label><input type="password" name="pass" id="pass"><br>
            <label for="pass">New Password : </label><input type="password" name="npass" id="npass"><br>
            <label for="cpass">Confirm Password : </label><input type="password" name="cpass" id="cpass"><br><br>
            <button type="submit" id="submit">Change</button>
        </form>

    </div>
</div>
<br><br>

<a style="margin: 10px" href="<?php echo base_url()?>filepage">Back</a>

<script>

    $(function(){

        $(document).on('click','#submit',function(){

            if($(' #npass').val() != $(' #cpass').val() || $(' #npass').val() == ""){

                alert('Password not matched.');
                return false

            }else{

                return true;

            }

        })

    })

</script>