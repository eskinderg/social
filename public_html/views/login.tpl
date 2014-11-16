<?php echo $header; ?>



<div id="content">
    <div id='login'>
        <form action="<?php echo $action; ?>" method="post" >

            <table style="margin: auto; padding-top:8%" >
                <tr>
                    <td></td><td style='text-align: center; font-size: 23px;'>Login</td> <td></td>
                </tr>
                
                <tr>
                    <td>Username</td><td><input type="text" name="username" value = "<?php echo $username; ?>"></td> <td style='width:100px;'><span class='error'> <?php if($login_username_error){echo $login_username_error;} ?> </span></td>
                </tr>
                <tr>
                    <td>Password</td>   <td><input type="password" name="password"></td><td><span class='error'> <?php if($login_password_error){echo $login_password_error;} ?></span></td>
                </tr>
                <tr style="text-align: center;"><td colspan="3"><button type="submit" style='margin-left:-20px;width:120px;'>Login</button></td></tr>
                <tr><td colspan="3"  style='text-align: center;'><span class="error"> <?php if($error_warning){echo $error_warning;} ?> </span></td></tr>
            </table>


        </form>
    </div>
</div>

<?php echo $footer; ?>